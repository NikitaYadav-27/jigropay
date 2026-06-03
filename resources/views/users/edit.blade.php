@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('users.index') }}" class="hover:text-brand-600">Users & Hierarchy</a>
        <span class="mx-1">›</span>
        <a href="{{ route('users.show', $user['id']) }}" class="hover:text-brand-600">{{ $user['name'] }}</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Edit</span>
    </nav>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Edit User</h1>
            <p class="mt-1 text-slate-500">Update role, contact details, and wallet settings for {{ $user['name'] }}.</p>
        </div>
        <a href="{{ route('users.show', $user['id']) }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            View Profile
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <form action="{{ route('users.index') }}" method="get" class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-4">
                        <span class="flex h-14 w-14 items-center justify-center rounded-xl bg-brand-100 text-lg font-bold text-brand-700">{{ $user['init'] }}</span>
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">{{ $user['name'] }}</h2>
                            <p class="text-sm text-slate-500">UID: #{{ $user['uid'] }}</p>
                        </div>
                    </div>
                    <span class="inline-flex w-fit rounded-full bg-brand-100 px-3 py-0.5 text-xs font-semibold text-brand-700">Editing</span>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Select Role <span class="text-red-500">*</span></label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            @foreach (['Super Distributor', 'Distributor', 'Retailer'] as $role)
                                <option @selected($user['role'] === $role)>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Parent User <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" value="{{ $user['parent'] }}" class="w-full rounded-lg border border-slate-200 py-2.5 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" value="{{ $user['name'] }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Business Name <span class="text-red-500">*</span></label>
                        <input type="text" value="{{ $user['business'] }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Mobile Number <span class="text-red-500">*</span></label>
                        <input type="tel" value="{{ $user['mobile'] }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" value="{{ $user['email'] }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Street Address</label>
                        <input type="text" value="{{ $user['address'] }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">State <span class="text-red-500">*</span></label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            @foreach (['Karnataka', 'Gujarat', 'Uttar Pradesh', 'Telangana', 'Maharashtra'] as $state)
                                <option @selected($user['state'] === $state)>{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">City <span class="text-red-500">*</span></label>
                        <input type="text" value="{{ $user['city'] }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Pincode <span class="text-red-500">*</span></label>
                        <input type="text" value="{{ $user['pincode'] }}" maxlength="6" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Wallet Limit (₹) <span class="text-red-500">*</span></label>
                        <input type="text" value="{{ $user['wallet_limit'] }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Commission Plan <span class="text-red-500">*</span></label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            @foreach (['Gold Partner Plan', 'Silver Partner Plan', 'Retail Standard', 'Bronze Starter'] as $plan)
                                <option @selected($user['commission_plan'] === $plan)>{{ $plan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Account Status</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50">
                                <input type="radio" name="status" value="active" @checked($user['status'] === 'active') class="text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm font-medium text-slate-700">Active</span>
                            </label>
                            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 has-[:checked]:border-amber-500 has-[:checked]:bg-amber-50">
                                <input type="radio" name="status" value="pending" @checked($user['status'] === 'pending') class="text-amber-600 focus:ring-amber-500">
                                <span class="text-sm font-medium text-slate-700">Pending KYC</span>
                            </label>
                            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 has-[:checked]:border-red-500 has-[:checked]:bg-red-50">
                                <input type="radio" name="status" value="suspended" @checked($user['status'] === 'suspended') class="text-red-600 focus:ring-red-500">
                                <span class="text-sm font-medium text-slate-700">Suspended</span>
                            </label>
                        </div>
                    </div>
                </div>

                <label class="mt-6 flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                    Notify user about profile changes via Email & SMS
                </label>

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('users.index') }}" class="inline-flex justify-center rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                    <button type="submit" class="inline-flex justify-center rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">Save Changes</button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Account summary</p>
                <ul class="mt-4 space-y-3 text-sm">
                    <li class="flex justify-between gap-2">
                        <span class="text-slate-500">User ID</span>
                        <span class="font-mono font-medium text-slate-900">#{{ $user['uid'] }}</span>
                    </li>
                    <li class="flex justify-between gap-2">
                        <span class="text-slate-500">Role</span>
                        <span class="font-medium text-slate-900">{{ $user['role'] }}</span>
                    </li>
                    <li class="flex justify-between gap-2">
                        <span class="text-slate-500">Reports to</span>
                        <span class="font-medium text-slate-900">{{ $user['parent'] }}</span>
                    </li>
                </ul>
            </div>
            <div class="rounded-xl bg-amber-50 border border-amber-100 p-5">
                <p class="text-sm font-semibold text-amber-900">Before you save</p>
                <p class="mt-1 text-xs text-amber-800">Changing role or parent may affect commission hierarchy and wallet limits for downline users.</p>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
