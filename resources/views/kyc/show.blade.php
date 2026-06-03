@extends('layouts.dashboard')

@section('title', $merchant . ' — KYC')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('kyc.operations') }}" class="hover:text-brand-600">KYC Management</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">{{ $merchant }}</span>
    </nav>

    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">{{ $merchant }}</h1>
            <p class="mt-1 text-slate-500">Review the document details carefully before taking action.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('kyc.operations') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Back to list</a>
            <button type="button" class="inline-flex items-center gap-2 rounded-xl border-2 border-red-200 bg-white px-5 py-2.5 text-sm font-semibold text-red-600 hover:bg-red-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                Reject
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-xl bg-teal-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-teal-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Approved
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="space-y-6 xl:col-span-2">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="relative overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
                    <div class="flex min-h-[280px] items-center justify-center p-4">
                        <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=800&q=80" alt="PAN Card" class="max-h-[320px] w-full rounded-lg object-contain shadow-md">
                    </div>
                    <div class="absolute bottom-3 right-3 flex gap-1">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/90 text-sm text-slate-600 shadow">−</span>
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/90 text-sm text-slate-600 shadow">+</span>
                    </div>
                </div>
                <div class="mt-3 flex gap-2 overflow-x-auto">
                    @foreach ([1, 2, 3, 4, 5] as $i)
                        <div class="h-14 w-20 shrink-0 overflow-hidden rounded-lg border-2 {{ $i === 1 ? 'border-brand-500' : 'border-slate-200' }} bg-slate-200"></div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <label class="mb-1.5 block text-sm font-medium text-slate-700">Approval Note</label>
                <textarea rows="3" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">Document verified successfully. Details match submitted records.</textarea>
            </div>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="grid grid-cols-1 gap-4 text-sm">
                    <div>
                        <p class="text-slate-500">Company</p>
                        <p class="mt-0.5 font-semibold text-slate-900">TechPay Solutions</p>
                    </div>
                    <div>
                        <p class="text-slate-500">PAN Number</p>
                        <p class="mt-0.5 font-mono font-semibold text-slate-900">ABCDE1234F</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Document Type</p>
                        <p class="mt-0.5 font-semibold text-slate-900">PAN Card</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Submitted On</p>
                        <p class="mt-0.5 font-semibold text-slate-900">20 Jan, 2026</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Status</p>
                        <span class="mt-1 inline-flex rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">Verified</span>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-semibold text-slate-900">All documents</h3>
                <ul class="mt-3 divide-y divide-slate-100">
                    @foreach (['PAN Card', 'Aadhaar Card', 'GST Certificate', 'Bank Proof', 'Shop Photo'] as $doc)
                        <li class="flex items-center justify-between py-2.5 text-sm">
                            <span class="text-slate-700">{{ $doc }}</span>
                            <span class="text-xs font-semibold text-emerald-600">Verified</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
