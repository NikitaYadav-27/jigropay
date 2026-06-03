<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EasebuzzBbpsService;
use Illuminate\Http\Request;

class BbpsApiController extends Controller
{
    protected EasebuzzBbpsService $bbpsService;

    public function __construct(EasebuzzBbpsService $bbpsService)
    {
        $this->bbpsService = $bbpsService;
    }

    public function checkBalance()
    {
        try {
            return response()->json($this->bbpsService->checkAgentBalance());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getToken()
    {
        try {
            return response()->json([
                'success' => true,
                'token' => $this->bbpsService->getToken(),
                'expires_in' => 14300  
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCategories(Request $request)
    {
        try {
            return response()->json($this->bbpsService->getBillerCategories(
                $request->query('page', 1),
                $request->query('limit', 50),
                $request->query('search', '')
            ));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getBillersByCategory($category)
    {
        try {
            return response()->json($this->bbpsService->getBillersByCategory($category));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getRegions(Request $request)
    {
        try {
            return response()->json($this->bbpsService->getBillerRegions(
                $request->query('page', 1),
                $request->query('limit', 50),
                $request->query('search', '')
            ));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getBillersByRegion($regionCode)
    {
        try {
            return response()->json($this->bbpsService->getBillersByRegion($regionCode));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getAllBillers(Request $request)
    {
        try {
            return response()->json($this->bbpsService->getAllBillers(
                $request->query('page', 1),
                $request->query('limit', 20),
                $request->query('search', ''),
                $request->query('category', ''),
                $request->query('region', '')
            ));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getBillerById($billerId)
    {
        try {
            return response()->json($this->bbpsService->getBillerById($billerId));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function fetchPlans(Request $request)
    {
        $request->validate([
            'refId' => 'required|string|size:35',
            'search' => 'nullable|array',
        ]);

        try {
            return response()->json($this->bbpsService->fetchPlans(
                $request->input('refId'),
                $request->input('search', [])
            ));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function fetchBill(Request $request, $channel)
    {
        try {
            return response()->json($this->bbpsService->fetchBill($channel, $request->all()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function validateBill(Request $request)
    {
        try {
            return response()->json($this->bbpsService->validateBill($request->all()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function payBill(Request $request, $channel)
    {
        try {
            return response()->json($this->bbpsService->payBill($channel, $request->all()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getComplaintDispositions()
    {
        try {
            return response()->json($this->bbpsService->getComplaintDispositions());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function raiseComplaint(Request $request)
    {
        try {
            return response()->json($this->bbpsService->raiseComplaint($request->all()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkComplaintStatus(Request $request)
    {
        try {
            return response()->json($this->bbpsService->checkComplaintStatus($request->all()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkTransactionStatus(Request $request)
    {
        try {
            return response()->json($this->bbpsService->checkTransactionStatus($request->all()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
