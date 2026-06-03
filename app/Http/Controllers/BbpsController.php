<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BbpsController extends Controller
{
    private function serviceLabel(string $slug): string
    {
        return match ($slug) {
            'electricity' => 'Electricity',
            'mobile-prepaid' => 'Mobile Prepaid',
            'dth' => 'DTH',
            'water' => 'Water',
            'lpg' => 'LPG Gas',
            'broadband' => 'Broadband',
            'insurance' => 'Insurance',
            'municipal' => 'Municipal Taxes',
            'education' => 'Education',
            'credit-card' => 'Credit Card Bill',
            'loan' => 'Loan Repayment',
            default => ucfirst(str_replace('-', ' ', $slug)),
        };
    }

    public function index(): View
    {
        return view('bbps.index');
    }

    public function service(string $service): View
    {
        return view('bbps.service', [
            'service' => $service,
            'serviceLabel' => $this->serviceLabel($service),
        ]);
    }

    public function confirm(string $service): View
    {
        return view('bbps.confirm', [
            'service' => $service,
            'serviceLabel' => $this->serviceLabel($service),
        ]);
    }
}
