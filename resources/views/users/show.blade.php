@extends('layouts.dashboard')

@section('title', 'View User')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('users.index') }}" class="hover:text-brand-600">Users & Hierarchy</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">View New User</span>
    </nav>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">View User</h1>
            <p class="mt-1 text-slate-500">Configure user role, access levels, and financial parameters.</p>
        </div>
        <a href="{{ route('users.edit', $userId ?? 'jp89023') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            Edit User
        </a>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm lg:col-span-2">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start">
                <div class="relative shrink-0">
                    <img src="https://ui-avatars.com/api/?name=Vikram+Malhotra&size=120&background=7c3aed&color=fff" alt="" class="h-28 w-28 rounded-xl object-cover">
                    <span class="absolute bottom-1 right-1 h-4 w-4 rounded-full border-2 border-white bg-emerald-500"></span>
                </div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-2">
                        <h2 class="text-xl font-bold text-slate-900">Vikram Malhotra</h2>
                        <span class="rounded-full bg-brand-100 px-2.5 py-0.5 text-xs font-bold text-brand-700">ACTIVE STATUS</span>
                    </div>
                    <p class="mt-1 text-slate-600">Senior Administrator | Global Operations</p>
                    <div class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <p class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            vikram@jigropay.com
                        </p>
                        <p class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            +91 98765 43210
                        </p>
                        <p class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Bengaluru HQ, India
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-xl bg-brand-600 p-5 text-white shadow-lg">
            <p class="text-xs font-semibold uppercase tracking-wider opacity-80">Reports To</p>
            <div class="mt-3 flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name=Ananya+Singh&background=fff&color=7c3aed" alt="" class="h-10 w-10 rounded-full">
                <div>
                    <p class="font-semibold">Ananya Singh</p>
                    <p class="text-sm opacity-80">Chief Operations Officer</p>
                </div>
            </div>
            <p class="mt-6 text-xs font-semibold uppercase tracking-wider opacity-80">Direct Reports</p>
            <div class="mt-2 flex -space-x-2">
                @foreach (['AK', 'JS', 'RL', '+5'] as $r)
                    <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-brand-600 bg-white text-xs font-bold text-brand-700">{{ $r }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mb-4 border-b border-slate-200">
        <button type="button" class="border-b-2 border-brand-600 px-4 py-3 text-sm font-semibold text-brand-600">Profile Information</button>
    </div>

    <div class="space-y-6">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <h3 class="mb-4 text-lg font-semibold text-slate-900">General Information</h3>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach ([['Full Name', 'Vikram Malhotra'], ['Employee ID', 'JP-ADMIN-402'], ['Joining Date', 'March 12, 2021']] as [$label, $value])
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">{{ $label }}</p>
                        <p class="mt-1 font-medium text-slate-900">{{ $value }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <h3 class="mb-4 text-lg font-semibold text-slate-900">Notes & Internal Details</h3>
            <p class="text-sm leading-relaxed text-slate-600">Key stakeholder for Q3 Enterprise Rollout. Deep expertise in KYC verification protocols and distributor onboarding workflows. Primary contact for compliance escalations.</p>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
