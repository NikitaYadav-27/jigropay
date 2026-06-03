@extends('layouts.dashboard')

@section('title', 'Commission Slab Settings')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('commission.index') }}" class="hover:text-brand-600">Commission & Earnings</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Slab Settings</span>
    </nav>

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Update Slab Settings</h1>
            <p class="mt-1 text-slate-500">Define amount-based commission slabs and channel payout split per service.</p>
        </div>
        <button type="submit" form="slab-form" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Save Slabs
        </button>
    </div>

    @if (request()->boolean('saved'))
        <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Slab settings saved. Changes apply to new transactions immediately.
        </div>
    @endif

    <form id="slab-form" action="{{ route('commission.slabs') }}" method="get" class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <input type="hidden" name="saved" value="1">

        <div class="space-y-6 xl:col-span-2">
            {{-- Service selector --}}
            <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm sm:p-5">
                <label class="mb-2 block text-sm font-medium text-slate-700">Service / category</label>
                <select id="service-select" class="w-full max-w-md rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-semibold text-slate-900 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    <option value="recharge">Mobile Recharge & DTH</option>
                    <option value="dmt">Domestic Money Transfer (DMT)</option>
                    <option value="aeps">AePS Cash Withdrawal</option>
                    <option value="bbps-electricity">BBPS — Electricity</option>
                    <option value="bbps-water">BBPS — Water Bill</option>
                    <option value="bbps-recharge">BBPS — Recharge</option>
                </select>
                <p class="mt-2 text-xs text-slate-500">Each service has its own slab table. Switching service loads that service’s saved slabs.</p>
            </div>

            {{-- Slab rows --}}
            <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
                <div class="flex flex-col gap-3 border-b border-slate-100 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Amount slabs</h2>
                        <p class="text-sm text-slate-500">Commission applied based on transaction value range.</p>
                    </div>
                    <button type="button" id="add-slab-row" class="inline-flex items-center gap-2 rounded-lg border border-dashed border-brand-300 px-3 py-2 text-sm font-semibold text-brand-600 hover:bg-brand-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Add slab
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px] text-left text-sm">
                        <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            <tr>
                                <th class="px-5 py-3">From (₹)</th>
                                <th class="px-5 py-3">To (₹)</th>
                                <th class="px-5 py-3">Commission</th>
                                <th class="px-5 py-3">Type</th>
                                <th class="px-5 py-3 w-16"></th>
                            </tr>
                        </thead>
                        <tbody id="slab-rows" class="divide-y divide-slate-100">
                            <tr class="slab-row">
                                <td class="px-5 py-3"><input type="number" name="from[]" value="0" min="0" class="w-28 rounded-lg border border-slate-200 px-2 py-1.5 text-sm"></td>
                                <td class="px-5 py-3"><input type="number" name="to[]" value="1000" min="0" class="w-28 rounded-lg border border-slate-200 px-2 py-1.5 text-sm"></td>
                                <td class="px-5 py-3"><input type="text" name="rate[]" value="2.5" class="w-24 rounded-lg border border-slate-200 px-2 py-1.5 text-sm font-semibold text-brand-600"></td>
                                <td class="px-5 py-3">
                                    <select name="type[]" class="rounded-lg border border-slate-200 px-2 py-1.5 text-sm">
                                        <option value="percent">%</option>
                                        <option value="flat">₹ flat</option>
                                    </select>
                                </td>
                                <td class="px-5 py-3">
                                    <button type="button" class="btn-remove-slab rounded-lg p-1.5 text-red-500 hover:bg-red-50" title="Remove" aria-label="Remove slab">&times;</button>
                                </td>
                            </tr>
                            <tr class="slab-row">
                                <td class="px-5 py-3"><input type="number" name="from[]" value="1001" min="0" class="w-28 rounded-lg border border-slate-200 px-2 py-1.5 text-sm"></td>
                                <td class="px-5 py-3"><input type="number" name="to[]" value="5000" min="0" class="w-28 rounded-lg border border-slate-200 px-2 py-1.5 text-sm"></td>
                                <td class="px-5 py-3"><input type="text" name="rate[]" value="2.0" class="w-24 rounded-lg border border-slate-200 px-2 py-1.5 text-sm font-semibold text-brand-600"></td>
                                <td class="px-5 py-3">
                                    <select name="type[]" class="rounded-lg border border-slate-200 px-2 py-1.5 text-sm">
                                        <option value="percent" selected>%</option>
                                        <option value="flat">₹ flat</option>
                                    </select>
                                </td>
                                <td class="px-5 py-3">
                                    <button type="button" class="btn-remove-slab rounded-lg p-1.5 text-red-500 hover:bg-red-50" title="Remove" aria-label="Remove slab">&times;</button>
                                </td>
                            </tr>
                            <tr class="slab-row">
                                <td class="px-5 py-3"><input type="number" name="from[]" value="5001" min="0" class="w-28 rounded-lg border border-slate-200 px-2 py-1.5 text-sm"></td>
                                <td class="px-5 py-3"><input type="text" name="to[]" value="∞" class="w-28 rounded-lg border border-slate-200 bg-slate-50 px-2 py-1.5 text-sm" readonly></td>
                                <td class="px-5 py-3"><input type="text" name="rate[]" value="1.5" class="w-24 rounded-lg border border-slate-200 px-2 py-1.5 text-sm font-semibold text-brand-600"></td>
                                <td class="px-5 py-3">
                                    <select name="type[]" class="rounded-lg border border-slate-200 px-2 py-1.5 text-sm">
                                        <option value="percent" selected>%</option>
                                        <option value="flat">₹ flat</option>
                                    </select>
                                </td>
                                <td class="px-5 py-3">
                                    <button type="button" class="btn-remove-slab rounded-lg p-1.5 text-red-500 hover:bg-red-50" title="Remove" aria-label="Remove slab">&times;</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Channel payout --}}
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="text-lg font-semibold text-slate-900">Channel payout split</h2>
                <p class="mt-1 text-sm text-slate-500">How earned commission is shared across the hierarchy for this service.</p>
                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Super Distributor (SD) %</label>
                        <input type="text" id="pct-sd" value="0.5" class="channel-pct w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-semibold text-brand-600 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Distributor (D) %</label>
                        <input type="text" id="pct-d" value="1.2" class="channel-pct w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-semibold text-brand-600 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">Retailer %</label>
                        <input type="text" id="pct-retailer" value="3.5" class="channel-pct w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-semibold text-brand-600 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-between rounded-lg bg-slate-50 px-4 py-3 text-sm">
                    <span class="font-medium text-slate-700">Total channel payout</span>
                    <span id="channel-total" class="text-lg font-bold text-brand-600">5.2%</span>
                </div>
                <p id="channel-warning" class="mt-2 hidden text-xs font-medium text-amber-700">Total exceeds recommended 6% — verify platform margin.</p>
            </div>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-semibold text-slate-900">Flow summary</h3>
                <ol class="mt-3 list-decimal space-y-2 pl-4 text-xs text-slate-600">
                    <li>Select a service category.</li>
                    <li>Define amount slabs (from → to → rate).</li>
                    <li>Set SD / D / Retailer payout split.</li>
                    <li>Save — applies to new transactions.</li>
                </ol>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-semibold text-slate-900">Slab preview</h3>
                <p class="mt-1 text-xs text-slate-500">Sample: ₹3,000 transaction</p>
                <p id="preview-commission" class="mt-3 text-2xl font-bold text-emerald-600">₹60.00</p>
                <p class="text-xs text-slate-500">Estimated gross commission</p>
                <ul id="preview-split" class="mt-4 space-y-2 border-t border-slate-100 pt-3 text-sm">
                    <li class="flex justify-between"><span class="text-slate-600">SD share</span><span class="font-medium">₹0.30</span></li>
                    <li class="flex justify-between"><span class="text-slate-600">D share</span><span class="font-medium">₹0.72</span></li>
                    <li class="flex justify-between"><span class="text-slate-600">Retailer share</span><span class="font-medium">₹2.10</span></li>
                </ul>
            </div>

            <div class="rounded-xl bg-sky-50 border border-sky-100 p-4 text-xs text-sky-900">
                <p class="font-semibold">Instant apply</p>
                <p class="mt-1">Changes reflect on all downline accounts upon save. Pending settlements use the previous slab until cleared.</p>
            </div>

            <a href="{{ route('settings.commissions') }}" class="block rounded-xl border border-slate-200 bg-white p-4 text-center text-sm font-semibold text-brand-600 shadow-sm hover:bg-slate-50">
                Open full Commission Settings →
            </a>

            <a href="{{ route('commission.index') }}" class="block text-center text-sm font-medium text-slate-500 hover:text-slate-700">Back to Commission & Earnings</a>
        </div>
    </form>
</main>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var tbody = document.getElementById('slab-rows');
    var addBtn = document.getElementById('add-slab-row');
    var sampleTxn = 3000;

    function parseNum(v) {
        return parseFloat(String(v).replace(/,/g, '')) || 0;
    }

    function updateChannelTotal() {
        var sd = parseNum(document.getElementById('pct-sd').value);
        var d = parseNum(document.getElementById('pct-d').value);
        var r = parseNum(document.getElementById('pct-retailer').value);
        var total = sd + d + r;
        document.getElementById('channel-total').textContent = total.toFixed(1) + '%';
        document.getElementById('channel-warning').classList.toggle('hidden', total <= 6);

        var gross = calcSlabCommission(sampleTxn);
        document.getElementById('preview-commission').textContent = '₹' + gross.toFixed(2);
        var split = document.getElementById('preview-split');
        split.innerHTML =
            '<li class="flex justify-between"><span class="text-slate-600">SD share</span><span class="font-medium">₹' + (gross * sd / 100).toFixed(2) + '</span></li>' +
            '<li class="flex justify-between"><span class="text-slate-600">D share</span><span class="font-medium">₹' + (gross * d / 100).toFixed(2) + '</span></li>' +
            '<li class="flex justify-between"><span class="text-slate-600">Retailer share</span><span class="font-medium">₹' + (gross * r / 100).toFixed(2) + '</span></li>';
    }

    function calcSlabCommission(amount) {
        var rows = tbody.querySelectorAll('.slab-row');
        for (var i = 0; i < rows.length; i++) {
            var inputs = rows[i].querySelectorAll('input, select');
            var from = parseNum(inputs[0].value);
            var toRaw = inputs[1].value;
            var to = toRaw === '∞' ? Infinity : parseNum(toRaw);
            var rate = parseNum(inputs[2].value);
            var type = rows[i].querySelector('select').value;
            if (amount >= from && amount <= to) {
                return type === 'percent' ? amount * rate / 100 : rate;
            }
        }
        return 0;
    }

    function bindRemove(btn) {
        btn.addEventListener('click', function () {
            if (tbody.querySelectorAll('.slab-row').length <= 1) return;
            btn.closest('.slab-row').remove();
            updateChannelTotal();
        });
    }

    tbody.querySelectorAll('.btn-remove-slab').forEach(bindRemove);

    addBtn.addEventListener('click', function () {
        var tr = document.createElement('tr');
        tr.className = 'slab-row';
        tr.innerHTML =
            '<td class="px-5 py-3"><input type="number" name="from[]" value="0" min="0" class="w-28 rounded-lg border border-slate-200 px-2 py-1.5 text-sm"></td>' +
            '<td class="px-5 py-3"><input type="number" name="to[]" value="0" min="0" class="w-28 rounded-lg border border-slate-200 px-2 py-1.5 text-sm"></td>' +
            '<td class="px-5 py-3"><input type="text" name="rate[]" value="0" class="w-24 rounded-lg border border-slate-200 px-2 py-1.5 text-sm font-semibold text-brand-600"></td>' +
            '<td class="px-5 py-3"><select name="type[]" class="rounded-lg border border-slate-200 px-2 py-1.5 text-sm"><option value="percent">%</option><option value="flat">₹ flat</option></select></td>' +
            '<td class="px-5 py-3"><button type="button" class="btn-remove-slab rounded-lg p-1.5 text-red-500 hover:bg-red-50" title="Remove" aria-label="Remove slab">&times;</button></td>';
        tbody.appendChild(tr);
        bindRemove(tr.querySelector('.btn-remove-slab'));
        tr.querySelectorAll('input, select').forEach(function (el) {
            el.addEventListener('input', updateChannelTotal);
            el.addEventListener('change', updateChannelTotal);
        });
        updateChannelTotal();
    });

    document.querySelectorAll('.channel-pct').forEach(function (el) {
        el.addEventListener('input', updateChannelTotal);
    });

    tbody.addEventListener('input', updateChannelTotal);
    tbody.addEventListener('change', updateChannelTotal);

    updateChannelTotal();
})();
</script>
@endpush
@endsection
