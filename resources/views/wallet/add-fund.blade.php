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
                 
                
            </div>

            

            <div class="mt-4">
                <label class="mb-1.5 block text-sm font-medium text-slate-700">Remarks</label>
                <textarea rows="3" placeholder="Additional notes about this transaction..." class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"></textarea>
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
