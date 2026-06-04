@extends('layouts.dashboard')

@section('title', 'Transaction Details')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('transactions.index') }}" class="rounded-lg border border-slate-200 p-2 text-slate-500 hover:bg-slate-50">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-xl font-bold text-slate-900 sm:text-2xl">Transaction {{ $id }}</h1>
                <p class="mt-1 text-sm text-slate-500">View detailed information about this transaction.</p>
            </div>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                Print Receipt
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Raise Dispute
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 flex flex-col gap-6">
            <!-- Main Transaction Status -->
            <div class="rounded-xl border border-slate-100 bg-white p-6 shadow-sm relative overflow-hidden">
                <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-emerald-50 opacity-50"></div>
                
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Transaction Successful</h2>
                            <p class="text-sm text-slate-500">Processed on 02 Jun 2026, 14:32</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('BAssuredLogo.png') }}" alt="B Assured" class="hidden sm:block h-10 w-auto object-contain">
                        <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-sm font-semibold text-emerald-700">SUCCESS</span>
                    </div>
                </div>
                
                <div class="mt-6 border-t border-slate-100 pt-6">
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                        <div>
                            <p class="text-xs text-slate-500">Amount</p>
                            <p class="text-xl font-bold text-slate-900">₹2,450.00</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">CCF (Customer Convenience Fee)</p>
                            <p class="text-lg font-semibold text-slate-700">₹15.00</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Commission Earned</p>
                            <p class="text-lg font-semibold text-emerald-600">+₹4.50</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Total Settled</p>
                            <p class="text-lg font-semibold text-slate-900">₹2,460.50</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transaction Details List -->
            <div class="rounded-xl border border-slate-100 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-base font-bold text-slate-900">Transaction Info</h3>
                <dl class="divide-y divide-slate-100 text-sm">
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">Transaction ID</dt>
                        <dd class="font-semibold text-slate-900">{{ $id }}</dd>
                    </div>
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">B-Connect Txn ID</dt>
                        <dd class="font-semibold text-slate-900">BBC-1029384756</dd>
                    </div>
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">Service Category</dt>
                        <dd class="font-medium text-slate-900">Electricity Bill Payment</dd>
                    </div>
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">Operator/Biller</dt>
                        <dd class="font-medium text-slate-900">BSES Rajdhani Power Limited</dd>
                    </div>
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">Consumer Number</dt>
                        <dd class="font-medium text-slate-900">1029384756</dd>
                    </div>
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">Payment Method</dt>
                        <dd class="font-medium text-slate-900 flex items-center gap-2">
                            <span class="rounded bg-brand-50 px-1.5 py-0.5 text-xs text-brand-600">WALLET</span> Main Wallet
                        </dd>
                    </div>
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">Operator Ref ID</dt>
                        <dd class="font-medium text-slate-900">BBPS192837465</dd>
                    </div>
                    <div class="flex py-3 justify-between">
                        <dt class="text-slate-500">IP Address</dt>
                        <dd class="font-medium text-slate-900">103.11.22.33</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <!-- User Info -->
            <div class="rounded-xl border border-slate-100 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-base font-bold text-slate-900">Retailer Details</h3>
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-100 text-brand-600 font-bold">RR</div>
                    <div>
                        <p class="font-semibold text-slate-900">Rahul Retail</p>
                        <p class="text-xs text-slate-500">Retailer ID: RET9821</p>
                    </div>
                </div>
                <dl class="divide-y divide-slate-100 text-sm">
                    <div class="flex py-2 justify-between">
                        <dt class="text-slate-500">Phone</dt>
                        <dd class="font-medium text-slate-900">+91 9876543210</dd>
                    </div>
                    <div class="flex py-2 justify-between">
                        <dt class="text-slate-500">Email</dt>
                        <dd class="font-medium text-slate-900">rahul@retail.com</dd>
                    </div>
                     
                </dl>
                <div class="mt-4 border-t border-slate-100 pt-4">
                    <a href="#" class="text-sm font-semibold text-brand-600 hover:text-brand-700">View Full Profile &rarr;</a>
                </div>
            </div>

            <!-- SMS Receipt -->
            <div class="rounded-xl border border-slate-100 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-base font-bold text-slate-900">SMS Receipt Sent</h3>
                <div class="relative rounded-2xl rounded-bl-none border border-slate-200 bg-slate-50 p-4 text-sm text-slate-800 shadow-sm">
                    Your payment of Rs. 2450.00 for BESCOM has been successfully processed. 
                    <br><br>
                    B-Connect Txn ID: BBC-1029384756. 
                    <br>
                    CCF: Rs. 15.00.
                    <div class="mt-2 text-right text-[10px] text-slate-400">Sent at 14:32</div>
                </div>
                <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-emerald-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Delivered to +91 9876543210
                </div>
            </div>

           
        </div>
    </div>
</main>

@include('partials.admin-footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mogoAudio = new Audio("{{ asset('mogoAudio.wav') }}");
        // mogoAudio.play().catch(e => console.log('Audio playback prevented by browser policy:', e));
    });
</script>
@endsection
