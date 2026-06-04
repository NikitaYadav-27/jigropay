@extends('layouts.dashboard')

@section('title', 'Wallet Management')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Wallet Management</h1>
            <p class="mt-1 text-slate-500">Monitor liquidity, settlements, and commission structures.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('wallet.list') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Wallet List</a>
            <a href="{{ route('wallet.transfer') }}" class="inline-flex items-center gap-2 rounded-lg border-2 border-brand-600 px-4 py-2.5 text-sm font-semibold text-brand-600 hover:bg-brand-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Transfer to Downline
            </a>
            <a href="{{ route('wallet.add-fund') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Fund to Wallet
            </a>
        </div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @php
            $cards = [
                ['title' => 'Total Wallet Balance', 'value' => '₹ 34,82,451', 'sub' => 'Across 4.2k active merchant wallets', 'iconBg' => 'bg-brand-100', 'iconColor' => 'text-brand-600'],
            ];
        @endphp
        @foreach ($cards as $card)
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between">
                    <p class="text-sm font-medium text-slate-500">{{ $card['title'] }}</p>
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg {{ $card['iconBg'] }} {{ $card['iconColor'] }}">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-slate-900">{{ $card['value'] }}</p>
                <p class="mt-1 text-xs {{ $card['subClass'] ?? 'text-slate-500' }}">{{ $card['sub'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white shadow-sm xl:col-span-2">
            <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                <h2 class="text-lg font-semibold text-slate-900">Recent Wallet Entries</h2>
                <a href="#" class="text-sm font-semibold text-brand-600 hover:text-brand-700">Export CSV</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px] text-left text-sm">
                    <thead class="bg-brand-50 text-xs font-semibold uppercase tracking-wide text-slate-600">
                        <tr>
                            <th class="px-5 py-3">Request ID</th>
                            <th class="px-5 py-3">Merchant</th>
                            <th class="px-5 py-3">Amount</th>
                            <th class="px-5 py-3">Status</th>
                            <th class="px-5 py-3">Date</th>
                            <th class="px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                            $requests = [
                                ['id' => 'REQ-88421', 'init' => 'AM', 'name' => 'Aman Retail', 'mid' => 'VGN-9302-12', 'amount' => '₹ 25,000', 'status' => 'PENDING', 'badge' => 'bg-amber-100 text-amber-800', 'date' => '02 Jun, 2026'],
                                ['id' => 'REQ-88420', 'init' => 'SK', 'name' => 'ShopKart', 'mid' => 'VGN-9301-08', 'amount' => '₹ 50,000', 'status' => 'APPROVED', 'badge' => 'bg-brand-100 text-brand-700', 'date' => '02 Jun, 2026'],
                                ['id' => 'REQ-88419', 'init' => 'QB', 'name' => 'QuickBazaar', 'mid' => 'VGN-9298-44', 'amount' => '₹ 10,000', 'status' => 'FAILED', 'badge' => 'bg-red-100 text-red-700', 'date' => '01 Jun, 2026'],
                            ];
                        @endphp
                        @foreach ($requests as $req)
                            <tr class="hover:bg-slate-50/80">
                                <td class="px-5 py-4 font-medium text-brand-600">{{ $req['id'] }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-brand-100 text-xs font-bold text-brand-700">{{ $req['init'] }}</span>
                                        <div>
                                            <p class="font-semibold text-slate-900">{{ $req['name'] }}</p>
                                            <p class="text-xs text-slate-500">{{ $req['mid'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 font-semibold">{{ $req['amount'] }}</td>
                                <td class="px-5 py-4"><span class="inline-flex rounded-full px-2.5 py-0.5 text-[10px] font-bold tracking-wide {{ $req['badge'] }}">{{ $req['status'] }}</span></td>
                                <td class="px-5 py-4 text-slate-500">{{ $req['date'] }}</td>
                                <td class="px-5 py-4">
                                    <button type="button" class="text-brand-600 hover:text-brand-700" aria-label="View">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="mb-4 flex items-center gap-2">
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-100 text-red-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </span>
                <div>
                    <h2 class="font-semibold text-slate-900">Low Balance Alerts</h2>
                    <p class="text-xs text-slate-500">Merchants below threshold</p>
                </div>
            </div>
            <ul class="space-y-4">
                @php
                    $alerts = [
                        ['init' => 'RK', 'name' => 'Rahul Kirana', 'threshold' => '₹ 25,000', 'balance' => '₹ 12,400'],
                        ['init' => 'PM', 'name' => 'PayMart Store', 'threshold' => '₹ 50,000', 'balance' => '₹ 18,200'],
                        ['init' => 'VT', 'name' => 'Vijay Telecom', 'threshold' => '₹ 15,000', 'balance' => '₹ 4,890'],
                    ];
                @endphp
                @foreach ($alerts as $alert)
                    <li class="flex items-center justify-between gap-3 border-b border-slate-50 pb-4 last:border-0 last:pb-0">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">{{ $alert['init'] }}</span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $alert['name'] }}</p>
                                <p class="text-xs text-slate-500">Threshold: {{ $alert['threshold'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-red-600">{{ $alert['balance'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="mt-4 block text-center text-sm font-semibold text-brand-600 hover:underline">View Detailed Risk Map</a>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
