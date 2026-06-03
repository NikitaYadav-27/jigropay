@extends('layouts.dashboard')

@section('title', 'Add Fund')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Add Fund</h1>
        <p class="mt-1 text-slate-500">Review and manage merchant wallet funding requests.</p>
    </div>

    <div class="mx-auto max-w-3xl">
        <form class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-8">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Fund Request Details</h2>
                    <p class="text-sm text-slate-500">Complete the form to credit a user wallet.</p>
                </div>
                <span class="rounded-full bg-brand-100 px-3 py-0.5 text-xs font-semibold text-brand-700">Step 1 of 2</span>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Wallet Type</label>
                    <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm"><option>Admin Wallet</option></select>
                </div>
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Select User</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Search User by ID/Name" class="w-full rounded-lg border border-slate-200 py-2.5 pl-10 pr-3 text-sm">
                    </div>
                </div>
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Current Balance</label>
                    <input type="text" readonly value="₹1,24,500.00" class="w-full rounded-lg border border-slate-200 bg-sky-50 px-3 py-2.5 text-sm font-semibold">
                </div>
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Add Amount (₹)</label>
                    <input type="text" placeholder="Enter Amount" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm">
                </div>
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Payment Mode</label>
                    <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm"><option>UPI Transfer</option><option>Bank Transfer</option></select>
                </div>
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Reference Number (UTR)</label>
                    <input type="text" placeholder="TXN123456789" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm">
                </div>
            </div>

            <div class="mt-4">
                <label class="mb-1.5 block text-sm font-medium text-slate-700">Upload Payment Proof</label>
                <div class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 py-10 text-center">
                    <svg class="h-10 w-10 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    <p class="mt-2 text-sm font-medium text-slate-700">Click to upload or drag & drop</p>
                    <p class="text-xs text-slate-500">PNG, JPG or PDF (Max. 5MB)</p>
                </div>
            </div>

            <div class="mt-4">
                <label class="mb-1.5 block text-sm font-medium text-slate-700">Remarks</label>
                <textarea rows="3" placeholder="Additional notes about this transaction..." class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"></textarea>
            </div>

            <div class="mt-6 rounded-xl bg-sky-50 p-4">
                <div class="flex items-start gap-3">
                    <svg class="h-6 w-6 shrink-0 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-slate-900">Admin Authorization</p>
                        <p class="text-xs text-slate-500">Enter OTP sent to mobile ending in **** 9920</p>
                        <div class="mt-3 flex gap-2">
                            @for ($i = 0; $i < 6; $i++)
                                <input type="text" maxlength="1" class="h-11 w-11 rounded-lg border border-slate-200 text-center text-lg font-semibold">
                            @endfor
                        </div>
                        <button type="button" class="mt-2 text-sm font-semibold text-brand-600 hover:underline">Resend OTP</button>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('wallet.index') }}" class="inline-flex justify-center rounded-lg border border-red-200 px-5 py-2.5 text-sm font-semibold text-red-600 hover:bg-red-50">Cancel</a>
                <div class="flex flex-col gap-2 sm:flex-row">
                    <button type="button" class="inline-flex justify-center rounded-lg border-2 border-brand-600 px-5 py-2.5 text-sm font-semibold text-brand-600 hover:bg-brand-50">Save Draft</button>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-95">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Add Fund
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

@include('partials.admin-footer')
@endsection
