@extends('layouts.dashboard')

@section('title', 'Instant Settlement')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('settlement.index') }}" class="hover:text-brand-600">Settlement & Payouts</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Instant Settlement</span>
    </nav>

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Instant Settlement</h1>
            <p class="mt-1 text-slate-500">Release funds immediately to a merchant or partner bank account.</p>
        </div>
        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
            IMPS live · 24×7
        </span>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <form action="{{ route('settlement.index') }}" method="get" class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Settlement details</h2>
                    </div>
                    <span class="rounded-full bg-brand-100 px-3 py-0.5 text-xs font-semibold text-brand-700">Instant</span>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Select recipient <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" id="recipient-search" placeholder="Search merchant name, MID or phone..." class="w-full rounded-lg border border-slate-200 py-2.5 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Role</label>
                        <input type="text" readonly value="Distributor" class="w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-700">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Available to settle</label>
                        <input type="text" readonly value="₹ 1,24,580.00" class="w-full rounded-lg border border-slate-200 bg-emerald-50 px-3 py-2.5 text-sm font-semibold text-emerald-800">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Settlement amount (₹) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 font-medium text-slate-500">₹</span>
                            <input type="text" id="settle-amount" value="45000" class="w-full rounded-lg border border-slate-200 py-2.5 pl-8 pr-3 text-sm font-semibold outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Payout method <span class="text-red-500">*</span></label>
                        <select id="payout-method" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option value="imps">IMPS (Instant)</option>
                            <option value="neft">NEFT (Same day)</option>
                            <option value="rtgs">RTGS (High value)</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Bank account</p>
                        <div class="mt-2 grid grid-cols-1 gap-2 text-sm sm:grid-cols-2">
                            <div><span class="text-slate-500">Account holder</span><p class="font-semibold text-slate-900">Arjun Reddy</p></div>
                            <div><span class="text-slate-500">Account number</span><p class="font-mono font-semibold text-slate-900">XXXX XX42 7890</p></div>
                            <div><span class="text-slate-500">IFSC</span><p class="font-mono font-semibold text-slate-900">HDFC0001234</p></div>
                            <div><span class="text-slate-500">Bank</span><p class="font-semibold text-slate-900">HDFC Bank</p></div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Remarks</label>
                        <textarea rows="2" placeholder="Optional note for audit trail..." class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"></textarea>
                    </div>
                </div>

                

                 

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('settlement.index') }}" class="inline-flex justify-center rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Settle Instantly
                    </button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
         

           

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-semibold text-slate-900">Recent settlements</h3>
                <ul class="mt-3 divide-y divide-slate-100">
                    @foreach ([
                        ['id' => '1', 'name' => 'Arjun Reddy', 'amt' => '₹45,000', 'ok' => true],
                        ['id' => '8', 'name' => 'Lakshmi Traders', 'amt' => '₹28,400', 'ok' => true],
                        ['id' => '5', 'name' => 'PayMart', 'amt' => '₹8,200', 'ok' => false],
                    ] as $item)
                        <li class="flex items-center justify-between py-3 text-sm">
                            <div>
                                <p class="font-medium text-slate-900">{{ $item['name'] }}</p>
                                <p class="text-xs text-slate-500">{{ $item['id'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-slate-900">{{ $item['amt'] }}</p>
                                <p class="text-xs font-semibold {{ $item['ok'] ? 'text-emerald-600' : 'text-red-600' }}">{{ $item['ok'] ? 'Success' : 'Failed' }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('settlement.queue') }}" class="mt-3 block text-center text-sm font-semibold text-brand-600 hover:underline">View settlement history</a>
            </div>

            
        </div>
    </div>
</main>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var amountInput = document.getElementById('settle-amount');
    var grossEl = document.getElementById('summary-gross');
    var feeEl = document.getElementById('summary-fee');
    var netEl = document.getElementById('summary-net');

    function formatInr(n) {
        return '₹' + n.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function updateSummary() {
        var gross = parseFloat(String(amountInput.value).replace(/,/g, '')) || 0;
        var fee = Math.round(gross * 0.0005 * 100) / 100;
        var net = gross - fee;
        grossEl.textContent = formatInr(gross);
        feeEl.textContent = formatInr(fee);
        netEl.textContent = formatInr(net);
    }

    amountInput.addEventListener('input', updateSummary);
    updateSummary();
})();
</script>
@endpush
@endsection
