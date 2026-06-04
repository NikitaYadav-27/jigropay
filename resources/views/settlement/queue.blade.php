@extends('layouts.dashboard')

@section('title', 'Settlement History')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('settlement.index') }}" class="hover:text-brand-600">Settlements</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Queue</span>
    </nav>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Settlement History</h1>
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

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="border-b border-slate-100 p-4">
            <div class="relative max-w-xs">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="search" placeholder="Search..." class="w-full rounded-lg border border-slate-200 bg-slate-50 py-2 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">ID</th>
                        <th class="px-5 py-3">Merchant</th>
                        <th class="px-5 py-3">Amount</th>
                        <th class="px-5 py-3">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                      
                        $rows = [
                            ['id' => '10', 'merchant' => 'Arihant Enterprises', 'amount' => '₹12,500', 'date' => '2026-05-31'],
                            ['id' => '9', 'merchant' => 'Lakshmi Traders', 'amount' => '₹8,400', 'date' => '2026-05-30'],
                            ['id' => '8', 'merchant' => 'QuickBazaar', 'amount' => '₹5,200' ,'date' => '2026-05-29'],
                            ['id' => '7', 'merchant' => 'Vibgyor Retail', 'amount' => '₹15,000', 'date' => '2026-05-28'],
                            ['id' => '6', 'merchant' => 'PayMart Store', 'amount' => '₹3,800' ,'date' => '2026-05-27'],
                            ['id' => '5', 'merchant' => 'ShopEasy', 'amount' => '₹2,100', 'date' => '2026-05-26'],
                            ['id' => '4', 'merchant' => 'TechNova Solutions', 'amount' => '₹22,400', 'date' => '2026-05-25'],
                            ['id' => '3', 'merchant' => 'Rahul Kirana', 'amount' => '₹1,850' ,'date' => '2026-05-24'],
                            ['id' => '2', 'merchant' => 'City Point Agency', 'amount' => '₹9,200', 'date' => '2026-05-23'],
                            ['id' => '1', 'merchant' => 'Metro Mobile', 'amount' => '₹4,500' ,'date' => '2026-05-22'],
                        ];
                    @endphp
                    @foreach ($rows as $row)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-semibold text-brand-600">{{ $row['id'] }}</td>
                            <td class="px-5 py-4 font-medium text-slate-900">{{ $row['merchant'] }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-800">{{ $row['amount'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $row['date'] }}</td>
                             
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4 text-sm text-slate-500">
            <span>Showing 1-10 of 16</span>
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
