@extends('layouts.dashboard')

@section('title', 'Commission Master')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <span>Masters</span>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Commission</span>
    </nav>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Commission Master</h1>
            <p class="mt-1 text-slate-500">Commission rates per service &amp; merchant tier</p>
        </div>
        <a href="{{ route('settings.commissions') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
            <svg class="h-4 w-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Category &amp; Role Settings
        </a>
    </div>

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
                <a href="{{ route('masters.commission.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add Rule
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">ID</th>
                        <th class="px-5 py-3">Service</th>
                        <th class="px-5 py-3">Tier</th>
                        <th class="px-5 py-3">Rate</th>
                        <th class="px-5 py-3">Min</th>
                        <th class="px-5 py-3">Max</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $rules = [
                            ['id' => 'CM-01', 'service' => 'UPI Transactions', 'tier' => 'Bronze', 'rate' => '0.40%', 'min' => '₹1', 'max' => '₹25', 'active' => true],
                            ['id' => 'CM-02', 'service' => 'UPI Transactions', 'tier' => 'Silver', 'rate' => '0.35%', 'min' => '₹1', 'max' => '₹20', 'active' => true],
                            ['id' => 'CM-03', 'service' => 'Credit Card', 'tier' => 'Gold', 'rate' => '1.85%', 'min' => '₹2', 'max' => '₹50', 'active' => true],
                            ['id' => 'CM-04', 'service' => 'Credit Card', 'tier' => 'All', 'rate' => '2.10%', 'min' => '₹2', 'max' => '—', 'active' => true],
                            ['id' => 'CM-05', 'service' => 'NetBanking', 'tier' => 'Bronze', 'rate' => '0.55%', 'min' => '₹1', 'max' => '₹30', 'active' => true],
                            ['id' => 'CM-06', 'service' => 'NetBanking', 'tier' => 'Silver', 'rate' => '0.50%', 'min' => '₹1', 'max' => '₹25', 'active' => true],
                            ['id' => 'CM-07', 'service' => 'Wallet Load', 'tier' => 'All', 'rate' => '0.25%', 'min' => '₹1', 'max' => '—', 'active' => false],
                        ];
                    @endphp
                    @foreach ($rules as $rule)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-medium text-slate-700">{{ $rule['id'] }}</td>
                            <td class="px-5 py-4 font-medium text-slate-900">{{ $rule['service'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $rule['tier'] }}</td>
                            <td class="px-5 py-4 font-bold text-brand-600">{{ $rule['rate'] }}</td>
                            <td class="px-5 py-4 text-slate-700">{{ $rule['min'] }}</td>
                            <td class="px-5 py-4 text-slate-700">{{ $rule['max'] }}</td>
                            <td class="px-5 py-4">
                                @if ($rule['active'])
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-semibold text-red-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span> Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <button type="button" class="text-sm font-semibold text-brand-600 hover:text-brand-700">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4 text-sm text-slate-500">
            <span>Showing 1-7 of 7</span>
            <span class="flex items-center gap-2">
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50 disabled:opacity-50" disabled aria-label="Previous page">&lsaquo;</button>
                <span class="rounded-lg border border-slate-200 px-3 py-1">Page 1 of 1</span>
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50 disabled:opacity-50" disabled aria-label="Next page">&rsaquo;</button>
            </span>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
