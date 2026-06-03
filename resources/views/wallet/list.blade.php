@extends('layouts.dashboard')

@section('title', 'Wallet List')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('wallet.index') }}" class="hover:text-brand-600">Wallet</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">List</span>
    </nav>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Wallet List</h1>
        <p class="mt-1 text-slate-500">All merchant wallets</p>
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-col gap-4 border-b border-slate-100 p-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="relative max-w-xs flex-1">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="search" placeholder="Search..." class="w-full rounded-lg border border-slate-200 bg-slate-50 py-2 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
            </div>
            <div class="flex gap-2">
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filters
                </button>
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Merchant</th>
                        <th class="px-5 py-3">Wallet ID</th>
                        <th class="px-5 py-3">Balance</th>
                        <th class="px-5 py-3">Last Recharge</th>
                        <th class="px-5 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $wallets = [
                            ['name' => 'Arihant Enterprises', 'mid' => 'MID100245', 'wid' => 'WLT700100', 'balance' => '₹12,450', 'recharge' => '₹5,000', 'date' => '2026-05-31', 'active' => true],
                            ['name' => 'Lakshmi Traders', 'mid' => 'MID100246', 'wid' => 'WLT700101', 'balance' => '₹8,200', 'recharge' => '₹2,000', 'date' => '2026-05-30', 'active' => true],
                            ['name' => 'QuickBazaar', 'mid' => 'MID100247', 'wid' => 'WLT700102', 'balance' => '₹1,120', 'recharge' => '₹1,000', 'date' => '2026-05-29', 'active' => false],
                            ['name' => 'Vibgyor Retail', 'mid' => 'MID100248', 'wid' => 'WLT700103', 'balance' => '₹25,800', 'recharge' => '₹10,000', 'date' => '2026-05-28', 'active' => true],
                            ['name' => 'PayMart Store', 'mid' => 'MID100249', 'wid' => 'WLT700104', 'balance' => '₹4,890', 'recharge' => '₹3,000', 'date' => '2026-05-27', 'active' => true],
                            ['name' => 'ShopEasy', 'mid' => 'MID100250', 'wid' => 'WLT700105', 'balance' => '₹650', 'recharge' => '₹500', 'date' => '2026-05-26', 'active' => false],
                            ['name' => 'TechNova Solutions', 'mid' => 'MID100251', 'wid' => 'WLT700106', 'balance' => '₹18,400', 'recharge' => '₹8,000', 'date' => '2026-05-25', 'active' => true],
                            ['name' => 'Rahul Kirana', 'mid' => 'MID100252', 'wid' => 'WLT700107', 'balance' => '₹2,340', 'recharge' => '₹1,500', 'date' => '2026-05-24', 'active' => true],
                            ['name' => 'City Point Agency', 'mid' => 'MID100253', 'wid' => 'WLT700108', 'balance' => '₹9,100', 'recharge' => '₹4,000', 'date' => '2026-05-23', 'active' => true],
                            ['name' => 'Metro Mobile', 'mid' => 'MID100254', 'wid' => 'WLT700109', 'balance' => '₹780', 'recharge' => '₹1,000', 'date' => '2026-05-22', 'active' => false],
                        ];
                    @endphp
                    @foreach ($wallets as $w)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-900">{{ $w['name'] }}</p>
                                <p class="text-xs text-slate-500">{{ $w['mid'] }}</p>
                            </td>
                            <td class="px-5 py-4 font-medium text-slate-700">{{ $w['wid'] }}</td>
                            <td class="px-5 py-4 font-bold text-slate-900">{{ $w['balance'] }}</td>
                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-800">{{ $w['recharge'] }}</p>
                                <p class="text-xs text-slate-500">{{ $w['date'] }}</p>
                            </td>
                            <td class="px-5 py-4">
                                @if ($w['active'])
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-0.5 text-xs font-semibold text-red-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span> Inactive
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4 text-sm text-slate-500">
            <span>Showing 1-10 of 18</span>
            <span class="flex items-center gap-2">
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50">&lsaquo;</button>
                <span>Page 1 of 2</span>
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50">&rsaquo;</button>
            </span>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
