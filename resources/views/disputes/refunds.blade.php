@extends('layouts.dashboard')

@section('title', 'Refund Management')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('disputes.index') }}" class="hover:text-brand-600">Disputes</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Refunds</span>
    </nav>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Refund Management</h1>
            <p class="mt-1 text-slate-500">End-to-end refund processing workflow.</p>
        </div>
        <div class="flex gap-2">
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                Filters
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export
            </button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="border-b border-slate-100 p-4">
            <div class="relative max-w-sm">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="search" placeholder="Search refunds..." class="w-full rounded-lg border border-slate-200 py-2 pl-10 pr-3 text-sm">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Refund ID</th>
                        <th class="px-5 py-3">Transaction</th>
                        <th class="px-5 py-3">Merchant</th>
                        <th class="px-5 py-3">Amount</th>
                        <th class="px-5 py-3">Reason</th>
                        <th class="px-5 py-3">Requested By</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $refunds = [
                            ['id' => 'RFD99110', 'txn' => 'TRN2030452', 'merchant' => 'Vibgyor Retail', 'amount' => '₹1,853', 'reason' => 'Service not delivered', 'by' => 'Merchant', 'status' => 'Pending', 'badge' => 'bg-amber-100 text-amber-800', 'date' => '2026-06-02 14:20'],
                            ['id' => 'RFD99109', 'txn' => 'TRN2030451', 'merchant' => 'TechNova Solutions', 'amount' => '₹4,200', 'reason' => 'Duplicate charge', 'by' => 'Customer', 'status' => 'Approved', 'badge' => 'bg-emerald-100 text-emerald-700', 'date' => '2026-06-02 11:05'],
                            ['id' => 'RFD99108', 'txn' => 'TRN2030450', 'merchant' => 'QuickBazaar', 'amount' => '₹890', 'reason' => 'Wrong biller', 'by' => 'System', 'status' => 'Rejected', 'badge' => 'bg-red-100 text-red-700', 'date' => '2026-06-01 18:40'],
                            ['id' => 'RFD99107', 'txn' => 'TRN2030449', 'merchant' => 'PayMart Store', 'amount' => '₹2,100', 'reason' => 'Customer request', 'by' => 'Merchant', 'status' => 'Approved', 'badge' => 'bg-emerald-100 text-emerald-700', 'date' => '2026-06-01 09:15'],
                            ['id' => 'RFD99106', 'txn' => 'TRN2030448', 'merchant' => 'ShopEasy', 'amount' => '₹450', 'reason' => 'Bill not updated', 'by' => 'Customer', 'status' => 'Pending', 'badge' => 'bg-amber-100 text-amber-800', 'date' => '2026-05-31 16:22'],
                        ];
                    @endphp
                    @foreach ($refunds as $r)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-semibold text-brand-600">{{ $r['id'] }}</td>
                            <td class="px-5 py-4">{{ $r['txn'] }}</td>
                            <td class="px-5 py-4 font-medium">{{ $r['merchant'] }}</td>
                            <td class="px-5 py-4 font-bold">{{ $r['amount'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $r['reason'] }}</td>
                            <td class="px-5 py-4">{{ $r['by'] }}</td>
                            <td class="px-5 py-4"><span class="rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $r['badge'] }}">{{ $r['status'] }}</span></td>
                            <td class="px-5 py-4 text-slate-500">{{ $r['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4 text-sm text-slate-500">
            <span>Showing 1-10 of 10</span>
            <span class="flex items-center gap-2">&lt; Page 1 of 1 &gt;</span>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
