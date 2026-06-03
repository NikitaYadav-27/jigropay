@extends('layouts.dashboard')

@section('title', 'Dispute Details')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <a href="{{ route('disputes.index') }}" class="mb-2 inline-flex items-center gap-1 text-sm font-medium text-slate-600 hover:text-brand-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back
            </a>
            <p class="text-sm text-slate-500">Dispute ID</p>
            <div class="flex items-center gap-2">
                <h1 class="text-2xl font-bold text-slate-900">{{ $disputeId }}</h1>
                <button type="button" class="rounded p-1 text-slate-400 hover:bg-slate-100" title="Copy">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </button>
            </div>
        </div>
        <div class="flex gap-2">
            <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Accept
            </button>
            <button type="button" class="rounded-lg border border-slate-200 px-3 py-2.5 text-slate-600 hover:bg-slate-50">⋯</button>
        </div>
    </div>

    <div class="space-y-6">
        <section class="rounded-xl border border-slate-100 bg-white shadow-sm">
            <button type="button" class="flex w-full items-center justify-between px-5 py-4 text-left">
                <h2 class="font-semibold text-brand-700">Transaction Details</h2>
                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
            </button>
            <div class="border-t border-slate-100 px-5 pb-5 pt-2">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <dl class="space-y-3 text-sm">
                        <div><dt class="text-slate-500">Dispute Type</dt><dd class="font-semibold">Fraud</dd></div>
                        <div><dt class="text-slate-500">Payment Method</dt><dd class="font-semibold">UPI (Google Pay)</dd></div>
                        <div><dt class="text-slate-500">Amount</dt><dd class="font-semibold">₹50,000</dd></div>
                    </dl>
                    <dl class="space-y-3 text-sm">
                        <div><dt class="text-slate-500">Raised On</dt><dd class="font-semibold">13 Apr 2026, 09:42 PM</dd></div>
                        <div><dt class="text-slate-500">Transaction ID</dt><dd class="font-semibold">TXN_54934525</dd></div>
                        <div><dt class="text-slate-500">Transaction Date</dt><dd class="font-semibold">12 Apr 2026, 09:42 PM</dd></div>
                    </dl>
                    <dl class="space-y-3 text-sm">
                        <div><dt class="text-slate-500">Raised by</dt><dd class="font-semibold">Operational Team</dd></div>
                        <div><dt class="text-slate-500">Merchant Name</dt><dd class="font-semibold">RazorEdge Tech Pvt. Ltd.</dd></div>
                    </dl>
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <h2 class="mb-3 font-semibold text-brand-700">Merchant Reply</h2>
            <p class="text-sm leading-relaxed text-slate-700">The transaction was successfully completed using OTP authentication. The service was delivered instantly after payment. No refund request was raised by the customer prior to this dispute.</p>
        </section>

        <section class="rounded-xl border border-slate-100 bg-white shadow-sm">
            <button type="button" class="flex w-full items-center justify-between px-5 py-4">
                <h2 class="font-semibold text-brand-700">Added Documents</h2>
                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4">
                <div class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-xs font-bold text-red-600">PDF</span>
                    <div>
                        <p class="font-semibold">Payment Proof</p>
                        <p class="text-xs text-slate-500">Screenshot.pdf · 2.4 MB</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500 hover:bg-slate-50" aria-label="Download">↓</button>
                    <button type="button" class="rounded-lg bg-brand-100 px-3 py-1.5 text-sm font-semibold text-brand-700">View</button>
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <h2 class="mb-3 flex items-center gap-2 font-semibold text-brand-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                Add Notes
            </h2>
            <input type="text" placeholder="Add a note for context, next steps, or internal escalation..." class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
        </section>

        <section class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <h2 class="mb-4 font-semibold text-brand-700">Timeline</h2>
            <ol class="relative space-y-6 border-l-2 border-slate-200 pl-6">
                <li><span class="absolute -left-[9px] h-4 w-4 rounded-full bg-brand-600"></span><p class="text-sm font-medium">12 Apr 2026, 10:05 PM</p><p class="text-sm text-slate-600">Dispute raised by customer</p></li>
                <li><span class="absolute -left-[9px] h-4 w-4 rounded-full bg-amber-500"></span><p class="text-sm font-medium">13 Apr 2026, 08:35 AM</p><p class="text-sm text-slate-600">Dispute assigned to review team</p></li>
                <li><span class="absolute -left-[9px] h-4 w-4 rounded-full bg-teal-500"></span><p class="text-sm font-medium">14 Apr 2026, 11:30 AM</p><p class="text-sm text-slate-600">Merchant submitted response</p></li>
            </ol>
        </section>
    </div>
</main>

@include('partials.admin-footer')
@endsection
