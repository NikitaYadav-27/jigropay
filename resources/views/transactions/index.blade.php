@extends('layouts.dashboard')

@section('title', 'Global Transactions')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Global Transactions</h1>
            <p class="mt-1 text-slate-500">Monitor and manage all system-wide financial movements in real-time.</p>
        </div>
        <div class="flex flex-wrap gap-2 items-center">
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export CSV
            </button>
            <img src="{{ asset('BharatConnectPrimaryLogo.png') }}" alt="Bharat Connect" class="hidden sm:block h-10 w-auto object-contain ml-2">
        </div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @php
            $stats = [
                ['label' => 'Total Volume (24H)', 'value' => '₹12,45,600', 'sub' => '+12.5%', 'subClass' => 'text-emerald-600', 'iconBg' => 'bg-brand-100', 'iconColor' => 'text-brand-600'],
                ['label' => 'Successful', 'value' => '8,432', 'sub' => '98.2% Success Rate', 'subClass' => 'text-slate-500', 'iconBg' => 'bg-emerald-100', 'iconColor' => 'text-emerald-600'],
                ['label' => 'Pending', 'value' => '142', 'sub' => 'Requires Attention', 'subClass' => 'text-amber-600', 'iconBg' => 'bg-amber-100', 'iconColor' => 'text-amber-600'],
                ['label' => 'Failed Txns', 'value' => '54', 'sub' => 'Check Logs', 'subClass' => 'text-red-600', 'iconBg' => 'bg-red-100', 'iconColor' => 'text-red-600'],
            ];
        @endphp
        @foreach ($stats as $stat)
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                        <p class="mt-1 text-2xl font-bold text-slate-900">{{ $stat['value'] }}</p>
                        <p class="mt-1 text-xs font-medium {{ $stat['subClass'] }}">{{ $stat['sub'] }}</p>
                    </div>
                    <span class="flex h-10 w-10 items-center justify-center rounded-full {{ $stat['iconBg'] }} {{ $stat['iconColor'] }}">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mb-4 rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
        <h2 class="mb-3 text-sm font-semibold text-slate-700">Search Transactions</h2>
        <form class="flex flex-col gap-4 md:flex-row md:items-end">
            <div class="flex-1 space-y-3 md:space-y-0 md:flex md:gap-3">
                <!-- Option 1: Mobile + Date -->
                <div class="flex-1 rounded-lg border border-slate-200 p-3 bg-slate-50/50">
                    <p class="mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wide text-center sm:text-left">Option 1: Mobile & Date</p>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input type="tel" placeholder="Mobile Number" class="w-full rounded-md border border-slate-200 px-3 py-1.5 text-sm focus:border-brand-500 focus:outline-none">
                        <input type="date" class="w-full rounded-md border border-slate-200 px-3 py-1.5 text-sm focus:border-brand-500 focus:outline-none">
                    </div>
                </div>
                
                <!-- Option 2: Txn Ref ID -->
                <div class="flex-1 rounded-lg border border-slate-200 p-3 bg-slate-50/50">
                    <p class="mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wide text-center sm:text-left">Option 2: Reference ID</p>
                    <input type="text" placeholder="Transaction Reference ID" class="w-full rounded-md border border-slate-200 px-3 py-1.5 text-sm focus:border-brand-500 focus:outline-none">
                </div>
            </div>
            
            <div class="flex gap-2">
                <button type="submit" class="rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">Search</button>
                <button type="button" class="rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Clear</button>
            </div>
        </form>
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">TXN ID</th>
                        <th class="px-5 py-3">Service Type</th>
                        <th class="px-5 py-3">User Details</th>
                        <th class="px-5 py-3">Amount</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Timestamp</th>
                        <th class="px-5 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $txns = [
                            ['id' => '#TXN-88421092', 'service' => 'Electricity', 'icon' => '⚡', 'user' => 'Rahul Retail', 'role' => 'Retailer · +91 98***210', 'amount' => '₹2,450.00', 'status' => 'SUCCESS', 'badge' => 'bg-emerald-100 text-emerald-700', 'time' => '02 Jun 2026, 14:32'],
                            ['id' => '#TXN-88421091', 'service' => 'Mobile Recharge', 'icon' => '📱', 'user' => 'Priya Store', 'role' => 'Distributor · +91 87***445', 'amount' => '₹299.00', 'status' => 'SUCCESS', 'badge' => 'bg-emerald-100 text-emerald-700', 'time' => '02 Jun 2026, 14:28'],
                            ['id' => '#TXN-88421090', 'service' => 'DTH Services', 'icon' => '📺', 'user' => 'Amit Kumar', 'role' => 'Retailer · +91 91***882', 'amount' => '₹450.00', 'status' => 'PENDING', 'badge' => 'bg-amber-100 text-amber-800', 'time' => '02 Jun 2026, 14:15'],
                            ['id' => '#TXN-88421089', 'service' => 'FASTag', 'icon' => '🚗', 'user' => 'QuickBazaar', 'role' => 'Merchant · +91 80***112', 'amount' => '₹500.00', 'status' => 'FAILED', 'badge' => 'bg-red-100 text-red-700', 'time' => '02 Jun 2026, 13:58'],
                            ['id' => '#TXN-88421088', 'service' => 'Payout', 'icon' => '💸', 'user' => 'Admin HQ', 'role' => 'Admin · System', 'amount' => '₹25,000.00', 'status' => 'SUCCESS', 'badge' => 'bg-emerald-100 text-emerald-700', 'time' => '02 Jun 2026, 13:40'],
                        ];
                    @endphp
                    @foreach ($txns as $txn)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-semibold text-brand-600">{{ $txn['id'] }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-2">
                                    <span class="text-base">{{ $txn['icon'] }}</span>
                                    {{ $txn['service'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-900">{{ $txn['user'] }}</p>
                                <p class="text-xs text-slate-500">{{ $txn['role'] }}</p>
                            </td>
                            <td class="px-5 py-4 font-bold text-slate-900">{{ $txn['amount'] }}</td>
                            <td class="px-5 py-4"><span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $txn['badge'] }}">{{ $txn['status'] }}</span></td>
                            <td class="px-5 py-4 text-slate-500">{{ $txn['time'] }}</td>
                            <td class="px-5 py-4">
                                <a href="{{ route('transactions.show', ltrim($txn['id'], '#')) }}" class="text-brand-600 hover:text-brand-700" aria-label="View">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-col gap-3 border-t border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-slate-500">Showing <span class="font-medium text-slate-700">1-10</span> of <span class="font-medium text-slate-700">1,245</span> transactions</p>
            <div class="flex items-center gap-1">
                <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500 hover:bg-slate-50">&lsaquo;</button>
                <button type="button" class="rounded-lg bg-brand-600 px-3 py-1.5 text-sm font-semibold text-white">1</button>
                <button type="button" class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm text-slate-600 hover:bg-slate-50">2</button>
                <button type="button" class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm text-slate-600 hover:bg-slate-50">3</button>
                <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500 hover:bg-slate-50">&rsaquo;</button>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
