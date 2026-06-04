@extends('layouts.dashboard')

@section('title', 'Settlement & Payouts')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Settlement & Payouts</h1>
            <p class="mt-1 text-slate-500">Manage liquidity distribution to your distribution network and retailers.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('settlement.queue') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Settlement History</a>
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border-2 border-brand-600 px-4 py-2.5 text-sm font-semibold text-brand-600 hover:bg-brand-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Generate Report
            </button>
            <a href="{{ route('settlement.instant') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Instant Settlement
            </a>
        </div>
    </div>

   

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white shadow-sm xl:col-span-2">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-5 py-4">
                <h2 class="text-lg font-semibold text-slate-900">Settlement History</h2>
                <div class="flex gap-2">
                    <button type="button" class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm">Filter</button>
                    <button type="button" class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm">May 2024</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs font-semibold uppercase text-slate-500">
                        <tr>
                            <th class="px-5 py-3">ID</th>
                            <th class="px-5 py-3">Recipient</th>
                            <th class="px-5 py-3">Amount</th>
                            <th class="px-5 py-3">Method</th>
                            <th class="px-5 py-3">Timestamp</th>
                            <th class="px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                            $payouts = [
                                ['id' => '1', 'init' => 'AR', 'name' => 'Arjun Reddy', 'role' => 'Distributor', 'amount' => '₹45,000', 'method' => 'IMPS', 'dot' => 'bg-emerald-500', 'text' => 'text-emerald-600', 'time' => '02 Jun, 14:00'],
                                ['id' => '0', 'init' => 'PK', 'name' => 'Priya Kumar', 'role' => 'Retailer', 'amount' => '₹12,500', 'method' => 'NEFT', 'dot' => 'bg-amber-500', 'text' => 'text-amber-600', 'time' => '02 Jun, 12:30'],
                                ['id' => '9', 'init' => 'VM', 'name' => 'Vijay Mart', 'role' => 'Retailer', 'amount' => '₹8,200', 'method' => 'IMPS', 'dot' => 'bg-red-500', 'text' => 'text-red-600', 'time' => '01 Jun, 18:15'],
                            ];
                        @endphp
                        @foreach ($payouts as $p)
                            <tr class="hover:bg-slate-50/80">
                                <td class="px-5 py-4 font-medium text-brand-600">{{ $p['id'] }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-brand-100 text-xs font-bold text-brand-700">{{ $p['init'] }}</span>
                                        <div><p class="font-semibold">{{ $p['name'] }}</p><p class="text-xs text-slate-500">{{ $p['role'] }}</p></div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 font-bold">{{ $p['amount'] }}</td>
                                <td class="px-5 py-4"><span class="rounded bg-sky-100 px-2 py-0.5 text-xs font-semibold text-sky-800">{{ $p['method'] }}</span></td>
                                <td class="px-5 py-4 text-slate-500">{{ $p['time'] }}</td>
                                <td class="px-5 py-4 text-brand-600">📄</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4 text-sm text-slate-500">
                <span>Showing 1-10 of 1,240 settlements</span>
                <div class="flex gap-1">
                    <button type="button" class="rounded-lg bg-brand-600 px-3 py-1 text-white">1</button>
                    <button type="button" class="rounded-lg border px-3 py-1">2</button>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="mb-3 flex items-center justify-between">
                    <h3 class="font-semibold text-slate-900">Commission Slabs</h3>
                    <a href="{{ route('commission.slabs') }}" class="rounded-lg p-1 text-slate-400 hover:bg-brand-50 hover:text-brand-600" title="Update slab settings" aria-label="Update slab settings">✎</a>
                </div>
                <ul class="space-y-2 text-sm">
                    <li class="flex justify-between"><span>⚡ Electricity</span><span class="font-medium">0.5% - 1.2%</span></li>
                    <li class="flex justify-between"><span>📱 Recharge</span><span class="font-medium">1.8% - 2.5%</span></li>
                    <li class="flex justify-between"><span>📺 DTH</span><span class="font-medium">1.2% - 1.8%</span></li>
                    <li class="flex justify-between"><span>💧 Water Bill</span><span class="font-medium">0.2% - 0.5%</span></li>
                </ul>
            </div>
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="font-semibold text-slate-900">Network Health</h3>
                <ul class="mt-3 space-y-3 text-sm text-slate-600">
                    <li class="flex gap-2"><span class="text-emerald-500">👥</span> 18,756 Active Partners (Growing 8% monthly)</li>
                </ul>
            </div>
            
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
