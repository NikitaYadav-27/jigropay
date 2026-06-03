@extends('layouts.dashboard')

@section('title', 'Offer & Refund Master')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <span>Masters</span>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Offers</span>
    </nav>
    <h1 class="mb-6 text-2xl font-bold text-slate-900 sm:text-3xl">Offer & Refund Master</h1>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-col gap-4 border-b border-slate-100 p-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="relative max-w-md flex-1">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="search" placeholder="Search..." class="w-full rounded-lg border border-slate-200 bg-slate-50 py-2 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filters
                </button>
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export
                </button>
                <a href="{{ route('masters.offers.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-95">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Create Offer
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">ID</th>
                        <th class="px-5 py-3">Offer Name</th>
                        <th class="px-5 py-3">Type</th>
                        <th class="px-5 py-3">Value</th>
                        <th class="px-5 py-3">Valid From</th>
                        <th class="px-5 py-3">Valid To</th>
                        <th class="px-5 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $offers = [
                            ['id' => 'OFR-101', 'name' => 'Diwali Cashback', 'type' => 'Cashback', 'value' => '2%', 'from' => '2026-10-01', 'to' => '2026-11-15', 'active' => true],
                            ['id' => 'OFR-102', 'name' => 'New Merchant Bonus', 'type' => 'Flat', 'value' => '₹500', 'from' => '2026-06-01', 'to' => '2026-12-31', 'active' => true],
                            ['id' => 'OFR-103', 'name' => 'BBPS Summer Offer', 'type' => 'Percentage', 'value' => '1.5%', 'from' => '2026-04-01', 'to' => '2026-06-30', 'active' => false],
                            ['id' => 'OFR-104', 'name' => 'Referral Refund', 'type' => 'Flat', 'value' => '₹100', 'from' => '2026-01-01', 'to' => '2026-03-31', 'active' => false],
                        ];
                    @endphp
                    @foreach ($offers as $offer)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-medium text-slate-700">{{ $offer['id'] }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-900">{{ $offer['name'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $offer['type'] }}</td>
                            <td class="px-5 py-4 font-semibold text-sky-600">{{ $offer['value'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $offer['from'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $offer['to'] }}</td>
                            <td class="px-5 py-4">
                                @if ($offer['active'])
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-semibold text-red-700">
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
            <span>Showing 1-4 of 4</span>
            <span class="flex items-center gap-2">
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50 disabled:opacity-50" disabled>&lsaquo;</button>
                <span class="rounded-lg border border-slate-200 px-3 py-1">Page 1 of 1</span>
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50 disabled:opacity-50" disabled>&rsaquo;</button>
            </span>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
