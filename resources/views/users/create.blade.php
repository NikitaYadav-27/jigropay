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
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Business Name <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Legal Entity Name" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
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

                <label class="mt-6 flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                    Send login credentials to user via Email & SMS
                </label>

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('users.index') }}" class="inline-flex justify-center rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Discard</a>
                    <button type="submit" class="inline-flex justify-center rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-95">Create User</button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
            <div class="relative overflow-hidden rounded-xl bg-brand-700 p-5 text-white">
                <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'40\' height=\'40\' viewBox=\'0 0 40 40\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M20 20h20v20H20V20zm10 0V10H10v10h10z\' fill=\'%23fff\' fill-opacity=\'0.4\' fill-rule=\'evenodd\'/%3E%3C/svg%3E');"></div>
                <div class="relative">
                    <svg class="mb-3 h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <h3 class="font-bold">Security Note</h3>
                    <p class="mt-2 text-sm opacity-90">Ensure mobile and email are active — credentials are sent for 2FA verification.</p>
                </div>
            </div>
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
            <div class="rounded-xl bg-brand-50 p-5">
                <h3 class="flex items-center gap-2 font-semibold text-brand-800">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    Need Help?
                </h3>
                <p class="mt-2 text-sm text-brand-700">Hover over labels for hints, or contact support for onboarding assistance.</p>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
