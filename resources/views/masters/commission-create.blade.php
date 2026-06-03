@extends('layouts.dashboard')

@section('title', 'Add Commission Rule')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('masters.commission') }}" class="hover:text-brand-600">Masters</a>
        <span class="mx-1">›</span>
        <a href="{{ route('masters.commission') }}" class="hover:text-brand-600">Commission</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Add Rule</span>
    </nav>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Add Commission Rule</h1>
        <p class="mt-1 text-slate-500">Define commission rate, limits, and tier for a payment service.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <form action="{{ route('masters.commission') }}" method="get" class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Rule Details</h2>
                        <p class="text-sm text-slate-500">Fields marked with <span class="text-red-500">*</span> are required.</p>
                    </div>
                    <span class="rounded-full bg-brand-100 px-3 py-0.5 text-xs font-semibold text-brand-700">New rule</span>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Service <span class="text-red-500">*</span></label>
                        <select id="rule-service" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option value="">Select service</option>
                            <option>UPI Transactions</option>
                            <option>Credit Card</option>
                            <option>Debit Card</option>
                            <option>NetBanking</option>
                            <option>Wallet Load</option>
                            <option>BBPS Bill Pay</option>
                            <option>IMPS / NEFT</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Merchant tier <span class="text-red-500">*</span></label>
                        <select id="rule-tier" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option value="">Select tier</option>
                            <option>Bronze</option>
                            <option>Silver</option>
                            <option>Gold</option>
                            <option>All</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Rate type <span class="text-red-500">*</span></label>
                        <select id="rule-rate-type" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <option value="percent">Percentage (%)</option>
                            <option value="flat">Flat (₹ per txn)</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">
                            <span id="rate-label">Commission rate (%)</span> <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" id="rule-rate" step="0.01" min="0" placeholder="0.40" class="w-full rounded-lg border border-slate-200 py-2.5 pl-3 pr-10 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                            <span id="rate-suffix" class="absolute right-3 top-1/2 -translate-y-1/2 text-sm font-medium text-slate-400">%</span>
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Minimum fee (₹) <span class="text-red-500">*</span></label>
                        <input type="number" id="rule-min" min="0" step="1" placeholder="1" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Maximum fee (₹)</label>
                        <input type="number" id="rule-max" min="0" step="1" placeholder="25" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 disabled:bg-slate-50 disabled:text-slate-400">
                        <label class="mt-2 flex items-center gap-2 text-sm text-slate-600">
                            <input type="checkbox" id="rule-no-max" class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                            No maximum cap
                        </label>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Effective from <span class="text-red-500">*</span></label>
                        <input type="date" value="{{ date('Y-m-d') }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Effective to</label>
                        <input type="date" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        <p class="mt-1 text-xs text-slate-500">Leave empty if the rule has no end date.</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Status</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50">
                                <input type="radio" name="status" value="active" checked class="text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm font-medium text-slate-700">Active</span>
                            </label>
                            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 has-[:checked]:border-red-500 has-[:checked]:bg-red-50">
                                <input type="radio" name="status" value="inactive" class="text-red-600 focus:ring-red-500">
                                <span class="text-sm font-medium text-slate-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Internal notes</label>
                        <textarea rows="3" placeholder="Optional notes for audit trail..." class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"></textarea>
                    </div>
                </div>

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('masters.commission') }}" class="inline-flex justify-center rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Save Rule
                    </button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Live preview</h3>
                <p class="mt-1 text-xs text-slate-500">Sample commission on ₹10,000 transaction</p>
                <dl class="mt-4 space-y-3 text-sm">
                    <div class="flex justify-between gap-2">
                        <dt class="text-slate-500">Service</dt>
                        <dd id="preview-service" class="font-medium text-slate-900 text-right">—</dd>
                    </div>
                    <div class="flex justify-between gap-2">
                        <dt class="text-slate-500">Tier</dt>
                        <dd id="preview-tier" class="font-medium text-slate-900">—</dd>
                    </div>
                    <div class="flex justify-between gap-2">
                        <dt class="text-slate-500">Calculated fee</dt>
                        <dd id="preview-fee" class="font-bold text-brand-600">₹0.00</dd>
                    </div>
                    <div class="flex justify-between gap-2 border-t border-slate-100 pt-3">
                        <dt class="text-slate-500">After min / max</dt>
                        <dd id="preview-final" class="font-bold text-slate-900">₹0.00</dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-xl bg-brand-50 border border-brand-100 p-5">
                <div class="flex gap-3">
                    <svg class="h-5 w-5 shrink-0 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Rule priority</p>
                        <p class="mt-1 text-xs text-slate-600">Tier-specific rules override &ldquo;All&rdquo; for the same service. Conflicting active rules are resolved by the most recent effective date.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-slate-50 p-5 text-sm text-slate-600">
                <p class="font-semibold text-slate-800">Example IDs</p>
                <p class="mt-2 text-xs">New rules are auto-assigned IDs like <span class="font-mono text-brand-600">CM-08</span> after save.</p>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var sampleAmount = 10000;
    var rateType = document.getElementById('rule-rate-type');
    var rateInput = document.getElementById('rule-rate');
    var rateLabel = document.getElementById('rate-label');
    var rateSuffix = document.getElementById('rate-suffix');
    var minInput = document.getElementById('rule-min');
    var maxInput = document.getElementById('rule-max');
    var noMax = document.getElementById('rule-no-max');
    var service = document.getElementById('rule-service');
    var tier = document.getElementById('rule-tier');

    function formatInr(n) {
        return '₹' + n.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function updateRateUi() {
        var isPercent = rateType.value === 'percent';
        rateLabel.textContent = isPercent ? 'Commission rate (%)' : 'Flat fee (₹)';
        rateSuffix.textContent = isPercent ? '%' : '₹';
        rateSuffix.classList.toggle('hidden', !isPercent);
        updatePreview();
    }

    function updatePreview() {
        document.getElementById('preview-service').textContent = service.value || '—';
        document.getElementById('preview-tier').textContent = tier.value || '—';

        var rate = parseFloat(rateInput.value) || 0;
        var min = parseFloat(minInput.value) || 0;
        var max = noMax.checked ? Infinity : (parseFloat(maxInput.value) || Infinity);
        var raw = rateType.value === 'percent' ? (sampleAmount * rate / 100) : rate;
        var final = Math.min(Math.max(raw, min), max === Infinity ? raw : max);
        if (min > 0 && final < min) final = min;

        document.getElementById('preview-fee').textContent = formatInr(raw);
        document.getElementById('preview-final').textContent = formatInr(isFinite(final) ? final : raw);
    }

    noMax.addEventListener('change', function () {
        maxInput.disabled = noMax.checked;
        if (noMax.checked) maxInput.value = '';
        updatePreview();
    });

    [rateType, rateInput, minInput, maxInput, service, tier].forEach(function (el) {
        el.addEventListener('input', updatePreview);
        el.addEventListener('change', updatePreview);
    });
    rateType.addEventListener('change', updateRateUi);

    updateRateUi();
})();
</script>
@endpush
@endsection
