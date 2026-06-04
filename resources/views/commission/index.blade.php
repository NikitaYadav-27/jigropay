@extends('layouts.dashboard')

@section('title', 'Commission & Earnings')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Commission & Earnings</h1>
            <p class="mt-1 text-slate-500">Real-time platform revenue and distribution performance.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('settings.commissions') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Commission Settings</a>
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">
                <svg class="h-4 w-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Oct 1 - Oct 31, 2023
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export Report
            </button>
        </div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-brand-600">Total Platform Commission</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">₹12,84,500</p>
            <span class="mt-2 inline-flex rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">+14.2% from last month</span>
        </div>
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-slate-500">Distributed to Partners (SD/D/R)</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">₹8,42,120</p>
            <p class="mt-2 text-sm text-slate-500">65.6% Payout Ratio</p>
        </div>
        <div class="rounded-xl bg-gradient-to-br from-brand-600 to-brand-800 p-5 text-white shadow-lg">
            <p class="text-sm font-medium opacity-90">Net Platform Earnings</p>
            <p class="mt-2 text-3xl font-bold">₹4,42,380</p>
        </div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm xl:col-span-2">
            <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-lg font-semibold text-slate-900">Service-wise Commission</h2>
                <div class="inline-flex rounded-lg bg-slate-100 p-1 text-xs font-semibold">
                    <button type="button" class="rounded-md bg-brand-600 px-3 py-1 text-white">Volume</button>
                    <button type="button" class="rounded-md px-3 py-1 text-slate-600">Count</button>
                </div>
            </div>
            <ul class="space-y-5">
                @php
                    $services = [
                        ['name' => 'Mobile Recharge & DTH', 'amount' => '₹5,20,000', 'comm' => '4.5% avg comm.', 'pct' => 90],
                        ['name' => 'Domestic Money Transfer (DMT)', 'amount' => '₹3,80,000', 'comm' => '1.2% flat comm.', 'pct' => 65],
                        ['name' => 'AePS Cash Withdrawal', 'amount' => '₹2,45,000', 'comm' => 'Slab based', 'pct' => 50],
                        ['name' => 'Utility Bills (BBPS)', 'amount' => '₹1,39,500', 'comm' => '₹2 per tx', 'pct' => 30],
                    ];
                @endphp
                @foreach ($services as $svc)
                    <li>
                        <div class="mb-1.5 flex justify-between text-sm">
                            <span class="font-medium text-slate-800">{{ $svc['name'] }}</span>
                            <span class="text-slate-600">{{ $svc['amount'] }} <span class="text-slate-400">({{ $svc['comm'] }})</span></span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-brand-600" style="width: {{ $svc['pct'] }}%"></div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

       
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
            <h2 class="text-lg font-semibold text-slate-900">Recent Commission Credits</h2>
            <div class="flex gap-2">
                <button type="button" class="rounded-lg p-2 text-slate-400 hover:bg-slate-100" aria-label="Filter">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                </button>
                <button type="button" class="rounded-lg p-2 text-slate-400 hover:bg-slate-100" aria-label="Refresh">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Transaction ID</th>
                        <th class="px-5 py-3">Service</th>
                        <th class="px-5 py-3">User Node</th>
                        <th class="px-5 py-3">Volume</th>
                        <th class="px-5 py-3">Commission Earned</th>
                        <th class="px-5 py-3">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $credits = [
                            ['id' => 'TXN_98234712', 'service' => 'Jio Prepaid', 'user' => 'Aman Retail (RET_402)', 'volume' => '₹499.00', 'earned' => '+₹17.46', 'badge' => 'bg-emerald-100 text-emerald-700', 'time' => '02 Jun, 14:20'],
                            ['id' => 'TXN_98234709', 'service' => 'Electricity Bill', 'user' => 'Karan Dist. (D_44)', 'volume' => '₹1,240.00', 'earned' => '+₹2.00','badge' => 'bg-amber-100 text-amber-800', 'time' => '02 Jun, 13:55'],
                            ['id' => 'TXN_98234705', 'service' => 'AePS Withdrawal', 'user' => 'Priya Store (RET_118)', 'volume' => '₹5,000.00', 'earned' => '+₹45.00', 'badge' => 'bg-emerald-100 text-emerald-700', 'time' => '02 Jun, 12:40'],
                        ];
                    @endphp
                    @foreach ($credits as $row)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-semibold text-brand-600">{{ $row['id'] }}</td>
                            <td class="px-5 py-4 text-slate-700">{{ $row['service'] }}</td>
                            <td class="px-5 py-4 text-slate-700">{{ $row['user'] }}</td>
                            <td class="px-5 py-4 font-medium">{{ $row['volume'] }}</td>
                            <td class="px-5 py-4 font-semibold text-emerald-600">{{ $row['earned'] }}</td>
                            <td class="px-5 py-4 text-slate-500">{{ $row['time'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4">
            <p class="text-sm text-slate-500">Showing 4 of 1,284 entries</p>
            <div class="flex gap-1">
                <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500">&lsaquo;</button>
                <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500">&rsaquo;</button>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
