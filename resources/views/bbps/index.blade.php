@extends('layouts.dashboard')

@section('title', 'BBPS Services')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    @include('partials.bbps-stepper', ['activeStep' => 1])

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">BBPS Services</h1>
            <p class="mt-1 text-slate-500">Select a service to proceed with bill payment.</p>
        </div>
        <img src="{{ asset('BharatConnectPrimaryLogo.png') }}" alt="Bharat Connect" class="hidden sm:block h-12 w-auto object-contain">
    </div>

    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
        @php
            $services = [
                ['slug' => 'electricity', 'label' => 'Electricity', 'emoji' => '⚡', 'bg' => 'bg-amber-100'],
                ['slug' => 'mobile-prepaid', 'label' => 'Mobile Prepaid', 'emoji' => '📱', 'bg' => 'bg-sky-100'],
                ['slug' => 'dth', 'label' => 'DTH', 'emoji' => '📡', 'bg' => 'bg-violet-100'],
                ['slug' => 'water', 'label' => 'Water', 'emoji' => '💧', 'bg' => 'bg-cyan-100'],
                ['slug' => 'lpg', 'label' => 'LPG Gas', 'emoji' => '🔥', 'bg' => 'bg-orange-100'],
                ['slug' => 'broadband', 'label' => 'Broadband', 'emoji' => '📶', 'bg' => 'bg-pink-100'],
                ['slug' => 'insurance', 'label' => 'Insurance', 'emoji' => '🛡️', 'bg' => 'bg-emerald-100'],
                ['slug' => 'municipal', 'label' => 'Municipal Taxes', 'emoji' => '🏛️', 'bg' => 'bg-red-100'],
                ['slug' => 'education', 'label' => 'Education', 'emoji' => '🎓', 'bg' => 'bg-yellow-100'],
                ['slug' => 'credit-card', 'label' => 'Credit Card Bill', 'emoji' => '💳', 'bg' => 'bg-blue-200'],
                ['slug' => 'loan', 'label' => 'Loan Repayment', 'emoji' => '💵', 'bg' => 'bg-teal-100'],
                ['slug' => 'other', 'label' => 'Other Services', 'emoji' => '•••', 'bg' => 'bg-slate-100'],
            ];
        @endphp
        @foreach ($services as $svc)
            <a href="{{ $svc['slug'] === 'other' ? '#' : route('bbps.service', $svc['slug']) }}" class="group flex flex-col items-center rounded-xl border border-slate-100 bg-white p-4 shadow-sm transition hover:border-brand-200 hover:shadow-md">
                <span class="flex h-14 w-14 items-center justify-center rounded-2xl {{ $svc['bg'] }} text-2xl transition group-hover:scale-105">{{ $svc['emoji'] }}</span>
                <span class="mt-3 text-center text-sm font-semibold text-slate-700">{{ $svc['label'] }}</span>
            </a>
        @endforeach
    </div>
</main>

@include('partials.admin-footer')
@endsection
