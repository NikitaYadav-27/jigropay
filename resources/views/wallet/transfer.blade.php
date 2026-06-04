@extends('layouts.dashboard')

@section('title', 'Transfer to Downline')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Transfer to Downline</h1>
        <p class="mt-1 text-slate-500">Review and manage merchant wallet funding requests.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <form class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Initiate Fund Transfer</h2>
                        <p class="text-sm text-slate-500">Transfer funds to your downline network securely.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">From Wallet</label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm"><option>Admin Wallet</option></select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">To User Type</label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm"><option>Distributor</option><option>Retailer</option></select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Select Downline User</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" placeholder="Search by UID or Name" class="w-full rounded-lg border border-slate-200 py-2.5 pl-10 pr-3 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Transfer Amount</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 font-medium text-slate-500">₹</span>
                            <input type="text" placeholder="0.00" class="w-full rounded-lg border border-slate-200 py-2.5 pl-8 pr-3 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Receiver Current Balance</label>
                        <input type="text" readonly value="₹ 1,24,500.00" class="w-full rounded-lg border border-slate-200 bg-sky-50 px-3 py-2.5 text-sm font-semibold text-slate-800">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Transfer Reason</label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm"><option>Commission Payout</option><option>Wallet Top-up</option></select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Remarks</label>
                        <textarea rows="2" placeholder="Internal notes..." class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"></textarea>
                    </div>
                </div>

      

                <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row">
                    <a href="{{ route('wallet.index') }}" class="inline-flex justify-center rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                    <button type="submit" class="inline-flex flex-1 items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-95 sm:flex-none sm:px-8">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Transfer Now
                    </button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl bg-gradient-to-br from-brand-600 via-fuchsia-600 to-brand-700 p-5 text-white shadow-lg">
                <svg class="mb-3 h-8 w-8 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                <p class="text-sm opacity-90">Sender Wallet Status</p>
                <p class="mt-1 text-xs uppercase tracking-wide opacity-75">Current Balance</p>
                <p class="text-3xl font-bold">₹4,82,900.00</p>
                <p class="mt-2 text-xs opacity-80">+₹1.2L added today</p>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="font-semibold text-slate-900">Receiver Profile</h3>
                <div class="mt-4 flex flex-col items-center text-center">
                    <span class="flex h-16 w-16 items-center justify-center rounded-full bg-brand-100 text-xl font-bold text-brand-700">RK</span>
                    <p class="mt-3 font-semibold text-slate-900">Rahul Kumar</p>
                    <p class="text-sm text-slate-500">Distributor · DIST_4021</p>
                    <span class="mt-2 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Verified Active
                    </span>
                </div>
                <dl class="mt-4 space-y-2 border-t border-slate-100 pt-4 text-sm">
                    <div class="flex justify-between"><dt class="text-slate-500">Registered Node</dt><dd class="font-medium">Bengaluru</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Last Transaction</dt><dd class="font-medium">2 hrs ago</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Network Tier</dt><dd class="font-medium">Tier 2</dd></div>
                </dl>
            </div>

            <div class="rounded-xl border border-pink-200 bg-pink-50/80 p-5">
                <h3 class="font-semibold text-slate-900">Execution Summary</h3>
                <dl class="mt-3 space-y-2 text-sm">
                    <div class="flex justify-between"><dt class="text-slate-600">Requested Amount</dt><dd class="font-semibold">₹ 50,000.00</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-600">Transaction Fee</dt><dd class="font-semibold">₹ 0.00</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-600">Total Deduction</dt><dd class="font-semibold text-red-600">₹ 50,000.00</dd></div>
                    <div class="flex justify-between border-t border-pink-200 pt-2"><dt class="text-slate-600">Balance Post-Transfer</dt><dd class="font-bold text-brand-700">₹ 4,32,900.00</dd></div>
                </dl>
                <p class="mt-4 flex gap-2 rounded-lg bg-pink-100/80 p-3 text-xs text-pink-900">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Double-check receiver UID before confirming transfer.
                </p>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
