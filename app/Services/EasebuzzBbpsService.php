<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Log;

class EasebuzzBbpsService
{
    protected string $aiBaseUrl;
    protected string $ledgerBaseUrl;
    protected string $clientKey;
    protected string $clientSecret;
    protected string $xKey;
    protected string $agentId;
    protected string $salt;

    public function __construct()
    {
        $this->aiBaseUrl = config('services.easebuzz.ai_base_url');
        $this->ledgerBaseUrl = config('services.easebuzz.ledger_base_url');
        $this->clientKey = config('services.easebuzz.client_key');
        $this->clientSecret = config('services.easebuzz.client_secret');
        $this->xKey = config('services.easebuzz.x_key');
        $this->agentId = config('services.easebuzz.agent_id');
        $this->salt = config('services.easebuzz.salt');
    }



    public function getToken(): string
    {
        $response = Http::withOptions([
            'curl' => [
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            ],
        ])
            ->asJson()
            ->post('https://bbps-api.easebuzz.dev/v1/auth/token', [
                'clientKey' => '3a86a744-ee83-499b-b0f2-3fb9278db0d1',
                'clientSecret' => '$2b$10$E1EkU6p7h/iIyqn3DoBPjlGg6bN6xGWDn0bGWa45SGd2ezos/FBCL',
                'scopes' => 'check_balance read_bills read_plans read_packs read_billers read_regions bill_validate read_operators raise_complaint get_biller_plans read_transactions get_biller_status register_complain read_agent_balance create_transactions get_biller_by_region read_operator_circle check_complain_status get_biller_categories get_biller_by_category check_complaint_status read_biller_categories bill_payment_validation get_bill_payment_txn_status pay_bill_mob get_bill_mob pay_bill_int get_bill_int pay_bill_agt get_bill_agt prepaid_bill_payment_txn prepaid_bill_payment_txn_status prepaid_bill_complaint prepaid_bill_complaint_status prepaid_bill_check_operator prepaid_bill_get_operator prepaid_bill_fetch_plans prepaid_bill_get_regions prepaid_bill_agent_statements prepaid_bill_recharge_type'
            ]);



        if (!$response->successful()) {
            throw new \Exception(
                'Token API Failed: ' . $response->body()
            );
        }

        $data = $response->json();

        if (!isset($data['access_token'])) {
            throw new \Exception(
                'access_token not found. Response: ' . json_encode($data)
            );
        }

        return $data['access_token'];
    }


    protected function aiClient(): PendingRequest
    {
        return Http::withToken($this->getToken())
            ->baseUrl($this->aiBaseUrl)
            ->withOptions([
                'curl' => [
                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
                ],
            ]);
    }


    public function checkAgentBalance()
    {
        $hash = hash('sha512', "{$this->agentId}|{$this->xKey}|{$this->salt}");

        $response = Http::withHeaders([
            'x-key' => $this->xKey,
            'x-agent-id' => $this->agentId,
            'x-hash' => $hash,
        ])->get("{$this->ledgerBaseUrl}/api/v1/agent-ledger/transaction-limit/{$this->agentId}");

        return $response->json();
    }


    // public function getBillerCategories(int $page = 1, int $limit = 50, string $search = '')
    // {
    //     return $this->aiClient()->get('/api/v1/billers/categories/all', [
    //         'page' => $page,
    //         'limit' => $limit,
    //         'search' => $search,
    //     ])->json();
    // }
    public function getBillerCategories(int $page = 1, int $limit = 50, string $search = '')
    {
        $token = $this->getToken();

        return Http::withToken($token)
            ->baseUrl($this->aiBaseUrl)
            ->withOptions([
                'curl' => [
                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
                ],
            ])
            ->get('/api/v1/billers/categories/all', [
                'page' => $page,
                'limit' => $limit,
                'search' => $search,
            ])
            ->json();
    }

    public function getBillersByCategory(string $category)
    {
        return $this->aiClient()->get("/api/v1/billers/category/{$category}")->json();
    }

    public function getBillerRegions(int $page = 1, int $limit = 50, string $search = '')
    {
        return $this->aiClient()->get('/api/v1/billers/regions/all', [
            'page' => $page,
            'limit' => $limit,
            'search' => $search,
        ])->json();
    }

    public function getBillersByRegion(string $regionCode)
    {
        return $this->aiClient()->get("/api/v1/billers/region/{$regionCode}")->json();
    }

    public function getAllBillers(int $page = 1, int $limit = 20, string $search = '', string $category = '', string $region = '')
    {
        return $this->aiClient()->get('/api/v1/getAllBillers', [
            'page' => $page,
            'limit' => $limit,
            'search' => $search,
            'category' => $category,
            'region' => $region,
        ])->json();
    }

    public function getBillerById(string $billerId)
    {
        return $this->aiClient()->get("/api/v1/biller/{$billerId}")->json();
    }

    // --- PLANS API ---

    public function fetchPlans(string $refId, array $search = [])
    {
        return $this->aiClient()->post('/api/v1/plans/all', [
            'refId' => $refId,
            'search' => $search,
        ])->json();
    }


    public function fetchBill(string $channel, array $payload)
    {
        if (!in_array($channel, ['int', 'mob', 'agt'])) {
            throw new \InvalidArgumentException('Invalid channel. Use int, mob, or agt.');
        }

        return $this->aiClient()->post("/api/v1/bill/fetch/{$channel}", $payload)->json();
    }

    public function validateBill(array $payload)
    {
        return $this->aiClient()->post('/api/v1/bill/validate', $payload)->json();
    }


    public function payBill(string $channel, array $payload)
    {
        if (!in_array($channel, ['int', 'mob', 'agt'])) {
            throw new \InvalidArgumentException('Invalid channel. Use int, mob, or agt.');
        }

        return $this->aiClient()->post("/api/v1/bill/payment/{$channel}", $payload)->json();
    }


    public function getComplaintDispositions()
    {
        return $this->aiClient()->get('/api/v1/complaint/disposition')->json();
    }

    public function raiseComplaint(array $payload)
    {
        return $this->aiClient()->post('/api/v1/complaint/raise', $payload)->json();
    }

    public function checkComplaintStatus(array $payload)
    {
        return $this->aiClient()->post('/api/v1/complaint/status', $payload)->json();
    }

    public function checkTransactionStatus(array $payload)
    {
        return $this->aiClient()->post('/api/v1/complaint/transaction-status', $payload)->json();
    }
}
