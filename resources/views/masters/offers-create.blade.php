@extends('layouts.dashboard')

@section('title', 'Create Offer')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('masters.offers') }}" class="hover:text-brand-600">Masters</a>
        <span class="mx-1">›</span>
        <a href="{{ route('masters.offers') }}" class="hover:text-brand-600">Offers</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Create Offer</span>
    </nav>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Create Offer</h1>
        <p class="mt-1 text-slate-500">Set up cashback, refunds, or promotional incentives for merchants and end users.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <form action="{{ route('masters.offers') }}" method="get" class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Offer Details</h2>
                        <p class="text-sm text-slate-500">Fields marked with <span class="text-red-500">*</span> are required.</p>
                    </div>
                    <span class="rounded-full bg-gradient-to-r from-brand-600 to-fuchsia-500 px-3 py-0.5 text-xs font-semibold text-white">New offer</span>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Offer name <span class="text-red-500">*</span></label>
                        <input type="text" id="offer-name" placeholder="e.g. Diwali Cashback" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Offer type <span class="text-red-500">*</span></label>
                        <select id="offer-type" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option value="Cashback">Cashback</option>
                            <option value="Flat">Flat</option>
                            <option value="Percentage">Percentage</option>
                            <option value="Refund">Refund</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">
                            <span id="value-label">Offer value</span> <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="offer-value" placeholder="2" class="w-full rounded-lg border border-slate-200 py-2.5 pl-3 pr-10 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <span id="value-suffix" class="absolute right-3 top-1/2 -translate-y-1/2 text-sm font-medium text-slate-400">%</span>
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Valid from <span class="text-red-500">*</span></label>
                        <input type="date" id="offer-from" value="{{ date('Y-m-d') }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Valid to <span class="text-red-500">*</span></label>
                        <input type="date" id="offer-to" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Applicable service <span class="text-red-500">*</span></label>
                        <select id="offer-service" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option value="">All services</option>
                            <option>UPI Transactions</option>
                            <option>BBPS Bill Pay</option>
                            <option>Wallet Load</option>
                            <option>Credit / Debit Card</option>
                            <option>NetBanking</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Target audience</label>
                        <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option>All merchants</option>
                            <option>New merchants only</option>
                            <option>Gold tier & above</option>
                            <option>Retailers only</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Min. transaction (₹)</label>
                        <input type="number" min="0" step="1" placeholder="100" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Max. benefit per user (₹)</label>
                        <input type="number" min="0" step="1" placeholder="500" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Status</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50">
                                <input type="radio" name="status" value="active" checked class="text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm font-medium text-slate-700">Active</span>
                            </label>
                            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 has-[:checked]:border-slate-400 has-[:checked]:bg-slate-50">
                                <input type="radio" name="status" value="inactive" class="text-slate-600 focus:ring-slate-500">
                                <span class="text-sm font-medium text-slate-700">Inactive (draft)</span>
                            </label>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Terms &amp; description</label>
                        <textarea id="offer-terms" rows="3" placeholder="Describe eligibility, stacking rules, and payout timeline..." class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"></textarea>
                    </div>
                </div>

                <label class="mt-6 flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                    Auto-apply offer to eligible transactions during validity period
                </label>

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('masters.offers') }}" class="inline-flex justify-center rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-95">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Create Offer
                    </button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Card preview</h3>
                <div class="mt-4 rounded-xl border border-brand-100 bg-gradient-to-br from-brand-50 to-fuchsia-50 p-4">
                    <p id="preview-name" class="text-lg font-bold text-slate-900">Your offer name</p>
                    <p class="mt-1 text-sm text-slate-600">
                        <span id="preview-type" class="font-medium">Cashback</span>
                        · <span id="preview-value" class="font-bold text-sky-600">—</span>
                    </p>
                    <p id="preview-dates" class="mt-3 text-xs text-slate-500">Valid: —</p>
                    <p id="preview-service" class="mt-1 text-xs text-slate-500">Service: All services</p>
                    <span class="mt-4 inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active
                    </span>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Sample calculation</p>
                <p class="mt-1 text-xs text-slate-500">On ₹5,000 eligible transaction</p>
                <p id="preview-benefit" class="mt-3 text-2xl font-bold text-brand-600">₹0.00</p>
                <p class="mt-1 text-xs text-slate-500">Estimated user benefit</p>
            </div>

            <div class="rounded-xl bg-brand-50 border border-brand-100 p-5">
                <p class="text-sm font-semibold text-brand-900">Offer ID</p>
                <p class="mt-1 text-xs text-brand-800">After save, offers receive an auto ID such as <span class="font-mono font-semibold">OFR-105</span>.</p>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var sampleTxn = 5000;
    var typeEl = document.getElementById('offer-type');
    var valueEl = document.getElementById('offer-value');
    var valueLabel = document.getElementById('value-label');
    var valueSuffix = document.getElementById('value-suffix');
    var nameEl = document.getElementById('offer-name');
    var fromEl = document.getElementById('offer-from');
    var toEl = document.getElementById('offer-to');
    var serviceEl = document.getElementById('offer-service');

    function isPercentType() {
        var t = typeEl.value;
        return t === 'Cashback' || t === 'Percentage';
    }

    function updateValueUi() {
        var percent = isPercentType();
        valueLabel.textContent = percent ? 'Offer value (%)' : 'Offer value (₹)';
        valueSuffix.textContent = percent ? '%' : '₹';
        valueSuffix.classList.toggle('hidden', !percent);
        updatePreview();
    }

    function formatValue() {
        var v = valueEl.value.trim() || '—';
        if (v === '—') return v;
        return isPercentType() ? v + '%' : '₹' + v;
    }

    function calcBenefit() {
        var raw = parseFloat(valueEl.value) || 0;
        if (isPercentType()) return sampleTxn * raw / 100;
        return raw;
    }

    function formatInr(n) {
        return '₹' + n.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function updatePreview() {
        document.getElementById('preview-name').textContent = nameEl.value.trim() || 'Your offer name';
        document.getElementById('preview-type').textContent = typeEl.value;
        document.getElementById('preview-value').textContent = formatValue();
        var from = fromEl.value || '—';
        var to = toEl.value || '—';
        document.getElementById('preview-dates').textContent = 'Valid: ' + from + ' → ' + to;
        document.getElementById('preview-service').textContent = 'Service: ' + (serviceEl.value || 'All services');
        document.getElementById('preview-benefit').textContent = formatInr(calcBenefit());
    }

    typeEl.addEventListener('change', updateValueUi);
    [valueEl, nameEl, fromEl, toEl, serviceEl].forEach(function (el) {
        el.addEventListener('input', updatePreview);
        el.addEventListener('change', updatePreview);
    });

    updateValueUi();
})();
</script>
@endpush
@endsection
