@extends('layouts.dashboard')

@section('title', 'Onboard New Partner')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('users.index') }}" class="hover:text-brand-600">Users & Hierarchy</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Add New User</span>
    </nav>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Onboard New Partner</h1>
        <p class="mt-1 text-slate-500">Configure user role, access levels, and financial parameters.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <form class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-900">User Information</h2>
                    <span class="rounded-full bg-sky-100 px-3 py-0.5 text-xs font-semibold text-sky-700">Step 1 of 1</span>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Select Role <span class="text-red-500">*</span></label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option>Super Distributor</option>
                            <option>Distributor</option>
                            <option>Retailer</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Search Parent User <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" placeholder="UID or Name" class="w-full rounded-lg border border-slate-200 py-2.5 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="As per PAN card" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Mobile Number <span class="text-red-500">*</span></label>
                        <input type="tel" placeholder="+91 XXXXX XXXXX" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" placeholder="example@domain.com" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Street Address</label>
                        <input type="text" placeholder="House/Shop No, Area, Locality" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">State <span class="text-red-500">*</span></label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm"><option>Karnataka</option></select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">City <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="City" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Pincode <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="6 Digits" maxlength="6" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Initial Wallet Limit (₹) <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="0.00" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Commission Plan <span class="text-red-500">*</span></label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm"><option>Choose a Plan</option></select>
                    </div>
                </div>

                

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('users.index') }}" class="inline-flex justify-center rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Discard</a>
                    <button type="submit" class="inline-flex justify-center rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-95">Create User</button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
            
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Onboarding Stats</p>
                <ul class="mt-4 space-y-3">
                    <li class="flex items-center justify-between text-sm">
                        <span class="flex items-center gap-2 text-slate-600"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">👤</span> Users Added Today</span>
                        <span class="font-bold text-slate-900">12</span>
                    </li>
                    <li class="flex items-center justify-between text-sm">
                        <span class="flex items-center gap-2 text-slate-600"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-100 text-sky-600">⏳</span> Pending KYC</span>
                        <span class="font-bold text-slate-900">05</span>
                    </li>
                </ul>
                <p class="mt-4 text-xs italic text-slate-500">Your hierarchy expands as you add more partners. More partners lead to higher commissions.</p>
            </div>
            
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
