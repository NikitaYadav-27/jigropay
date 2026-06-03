@extends('layouts.dashboard')

@section('title', $serviceLabel . ' — BBPS')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    @include('partials.bbps-stepper', ['activeStep' => 2])

    <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
        <nav class="text-sm text-slate-500">
            <a href="{{ route('bbps.index') }}" class="hover:text-brand-600">BBPS Services</a>
            <span class="mx-1">›</span>
            <span class="text-brand-600">{{ $serviceLabel }} Bill Payment</span>
        </nav>
        <img src="{{ asset('BharatConnectPrimaryLogo.png') }}" alt="Bharat Connect" class="hidden sm:block h-10 w-auto object-contain">
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex items-start gap-3">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl">⚡</span>
                    <div>
                        <h1 class="text-xl font-bold text-slate-900">Bill Details</h1>
                        <p class="text-sm text-slate-500">Enter consumer information to retrieve current outstanding dues.</p>
                    </div>
                </div>

                <form action="{{ route('bbps.confirm', $service) }}" method="get" class="space-y-4">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Select Electricity Board</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <select class="w-full appearance-none rounded-lg border border-slate-200 py-2.5 pl-10 pr-10 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                                <option>Search or select Biller</option>
                                <option>BESCOM - Bangalore</option>
                                <option>TANGEDCO - Tamil Nadu</option>
                                <option>MSEDCL - Maharashtra</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Consumer Number / RR Number</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 font-medium text-slate-400">#</span>
                            <input type="text" placeholder="e.g. 1234567890" class="w-full rounded-lg border border-slate-200 py-2.5 pl-8 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        </div>
                        <p class="mt-1.5 text-xs text-slate-500">Tip: You can find this on your previous electricity bill.</p>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Customer Mobile Number</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            <input type="tel" placeholder="10-digit mobile number" maxlength="10" class="w-full rounded-lg border border-slate-200 py-2.5 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        </div>
                    </div>
                    <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-600 py-3 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Fetch Bill
                    </button>
                    <p class="flex items-center justify-center gap-1.5 text-xs font-medium uppercase tracking-wide text-slate-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Secure Transaction
                    </p>
                </form>
            </div>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h2 class="flex items-center gap-2 font-semibold text-slate-900">
                    <svg class="h-5 w-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Biller Requirements
                </h2>
                <ul class="mt-4 space-y-4 text-sm">
                    <li class="flex gap-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-slate-900">BBPS Enabled</p>
                            <p class="text-slate-500">Real-time bill fetch and payment confirmation.</p>
                        </div>
                    </li>
                    <li class="flex gap-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-slate-900">Settlement Time</p>
                            <p class="text-slate-500">Bills are updated within 2–3 business days.</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="font-semibold text-slate-900">Recent Fetches</h2>
                    <a href="{{ route('transactions.index') }}" class="text-sm font-semibold text-brand-600">View All</a>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600">⚡</span>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-semibold text-slate-900">BESCOM - Bangalore</p>
                            <p class="text-xs text-slate-500">ID: 5492001837 · ₹2,450</p>
                        </div>
                        <span class="text-xs font-medium text-slate-400">3H AGO</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600">⚡</span>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-semibold text-slate-900">TANGEDCO - TN</p>
                            <p class="text-xs text-slate-500">ID: 882104455 · ₹890</p>
                        </div>
                        <span class="text-xs font-medium text-slate-400">YESTERDAY</span>
                    </li>
                </ul>
            </div>

            <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-brand-600 to-fuchsia-600 p-5 text-white shadow-lg">
                <span class="inline-flex rounded bg-white/20 px-2 py-0.5 text-xs font-bold">PROMO</span>
                <p class="relative mt-3 text-sm font-semibold leading-snug">Get 2% Extra Commission on BESCOM payments this month!</p>
                <div class="absolute -bottom-4 -right-4 h-24 w-24 rounded-full bg-white/10"></div>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
