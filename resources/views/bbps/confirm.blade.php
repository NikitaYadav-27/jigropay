@extends('layouts.dashboard')

@section('title', 'Payment Confirmation')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    @include('partials.bbps-stepper', ['activeStep' => 3])

    <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div class="flex items-start gap-3">
            <a href="{{ route('bbps.service', $service) }}" class="mt-1 rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50" aria-label="Back">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Payment Confirmation</h1>
                <p class="mt-1 text-slate-500">Review and confirm the fetched bill details before proceeding.</p>
            </div>
        </div>
        <img src="{{ asset('BharatConnectPrimaryLogo.png') }}" alt="Bharat Connect" class="hidden sm:block h-12 w-auto object-contain">
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="flex flex-col gap-4 border-b border-slate-100 pb-5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-3">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-600 text-white text-xl">⚡</span>
                        <div>
                            <p class="text-lg font-bold text-slate-900">BESCOM</p>
                            <p class="text-sm text-slate-500">ELECTRICITY BILL — BANGALORE</p>
                        </div>
                    </div>
                    <span class="inline-flex self-start rounded-full bg-amber-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-amber-800">Bill Fetched Successfully</span>
                </div>
                <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-medium uppercase text-slate-500">Consumer Name</p>
                        <p class="mt-1 font-semibold text-slate-900">Rajesh Kumar</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase text-slate-500">Consumer ID</p>
                        <p class="mt-1 font-semibold text-slate-900">5492001837</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase text-slate-500">Bill Date</p>
                        <p class="mt-1 font-semibold text-slate-900">Oct 12, 2023</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase text-slate-500">Due Date</p>
                        <p class="mt-1 font-semibold text-red-600">Oct 28, 2023</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="mb-4 text-lg font-semibold text-slate-900">Payment Mode</h2>
                <div class="space-y-3">
                    <label class="flex cursor-pointer items-start gap-4 rounded-xl border-2 border-brand-600 bg-brand-50/50 p-4">
                        <input type="radio" name="payment_mode" checked class="mt-1 text-brand-600 focus:ring-brand-500">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        </span>
                        <span>
                            <span class="block font-semibold text-slate-900">Agent Wallet</span>
                            <span class="text-sm text-slate-500">Available Balance: ₹1,25,430.50</span>
                        </span>
                    </label>
                    <label class="flex cursor-pointer items-start gap-4 rounded-xl border border-slate-200 p-4 hover:border-slate-300">
                        <input type="radio" name="payment_mode" class="mt-1 text-brand-600 focus:ring-brand-500">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </span>
                        <span>
                            <span class="block font-semibold text-slate-900">Instant Settlement (Payout Account)</span>
                            <span class="text-sm text-slate-500">Direct deduction from payout</span>
                        </span>
                    </label>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="sticky top-24 rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Bill Summary</h2>
                <dl class="mt-4 space-y-3 text-sm">
                    <div class="flex justify-between"><dt class="text-slate-600">Bill Amount</dt><dd class="font-medium text-slate-900">₹1,200.00</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-600">Service Charge</dt><dd class="font-medium text-slate-900">₹25.00</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-600">Taxes (GST)</dt><dd class="font-medium text-slate-900">₹15.00</dd></div>
                </dl>
                <div class="my-4 border-t border-dashed border-slate-200"></div>
                <div class="flex justify-between">
                    <span class="font-semibold text-slate-900">Total Payable</span>
                    <span class="text-xl font-bold text-brand-600">₹1,240.00</span>
                </div>
                <a href="{{ route('transactions.show', 'TXN-88421092') }}" class="mt-6 flex w-full items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 py-3 text-sm font-semibold text-white shadow-sm hover:opacity-95">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Pay Now
                </a>
                <a href="{{ route('bbps.service', $service) }}" class="mt-3 flex w-full justify-center rounded-lg bg-slate-100 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-200">Cancel Payment</a>
                <p class="mt-4 flex gap-2 rounded-lg bg-brand-50 p-3 text-xs text-brand-800">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    This transaction is secured via BBPS. Funds will be settled to the biller instantly.
                </p>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
