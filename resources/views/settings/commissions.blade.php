@extends('layouts.dashboard')

@section('title', 'Commission Settings')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('settings.index') }}" class="hover:text-brand-600">Settings</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Commissions</span>
    </nav>

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Commission Settings</h1>
            <p class="mt-1 text-slate-500">Configure commission by service category and by user role.</p>
        </div>
        <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Save Changes
        </button>
    </div>

    <div class="mb-4 inline-flex rounded-lg border border-slate-200 bg-slate-100 p-1" role="tablist">
        <button type="button" id="tab-category" class="commission-tab rounded-md px-4 py-2 text-sm font-semibold bg-white text-brand-600 shadow-sm" data-panel="panel-category" aria-selected="true">
            Category-wise
        </button>
        <button type="button" id="tab-role" class="commission-tab rounded-md px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-900" data-panel="panel-role" aria-selected="false">
            Role-wise
        </button>
    </div>

    {{-- Category-wise --}}
    <div id="panel-category" class="commission-panel space-y-4">
        <div class="rounded-xl border border-brand-100 bg-brand-50/50 p-4 text-sm text-slate-700">
            <p class="font-semibold text-brand-900">Category defaults</p>
            <p class="mt-1 text-slate-600">These rates apply platform-wide unless overridden by a role-specific rule or commission master entry.</p>
        </div>

        <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
            <div class="flex flex-col gap-3 border-b border-slate-100 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">
                <div class="relative max-w-sm flex-1">
                    <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="search" placeholder="Search categories..." class="w-full rounded-lg border border-slate-200 py-2 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                </div>
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-dashed border-brand-300 px-4 py-2 text-sm font-semibold text-brand-600 hover:bg-brand-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add Category
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[900px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="px-5 py-3">Category</th>
                            <th class="px-5 py-3">Code</th>
                            <th class="px-5 py-3">Rate type</th>
                            <th class="px-5 py-3">Commission</th>
                            <th class="px-5 py-3">Min (₹)</th>
                            <th class="px-5 py-3">Max (₹)</th>
                            <th class="px-5 py-3">Active</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                            $categories = [
                                ['name' => 'BBPS Bill Pay', 'code' => 'BBPS', 'type' => 'percent', 'rate' => '0.35', 'min' => '1', 'max' => '25', 'active' => true],
                                ['name' => 'UPI Collect', 'code' => 'UPI', 'type' => 'percent', 'rate' => '0.40', 'min' => '1', 'max' => '20', 'active' => true],
                                ['name' => 'Wallet Load', 'code' => 'WLT', 'type' => 'percent', 'rate' => '0.25', 'min' => '1', 'max' => '15', 'active' => true],
                                ['name' => 'Card Payments', 'code' => 'CARD', 'type' => 'percent', 'rate' => '1.85', 'min' => '2', 'max' => '50', 'active' => true],
                                ['name' => 'NetBanking', 'code' => 'NB', 'type' => 'percent', 'rate' => '0.55', 'min' => '1', 'max' => '30', 'active' => true],
                                ['name' => 'IMPS / NEFT', 'code' => 'IMPS', 'type' => 'flat', 'rate' => '5', 'min' => '5', 'max' => '5', 'active' => true],
                                ['name' => 'AePS', 'code' => 'AEPS', 'type' => 'percent', 'rate' => '0.60', 'min' => '2', 'max' => '35', 'active' => false],
                                ['name' => 'DMT / Remittance', 'code' => 'DMT', 'type' => 'flat', 'rate' => '8', 'min' => '8', 'max' => '8', 'active' => true],
                            ];
                        @endphp
                        @foreach ($categories as $cat)
                            <tr class="hover:bg-slate-50/80">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">{{ $cat['code'] }}</span>
                                        <span class="font-semibold text-slate-900">{{ $cat['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 font-mono text-slate-600">{{ $cat['code'] }}</td>
                                <td class="px-5 py-3">
                                    <select class="rounded-lg border border-slate-200 px-2 py-1.5 text-sm">
                                        <option value="percent" @selected($cat['type'] === 'percent')>Percentage (%)</option>
                                        <option value="flat" @selected($cat['type'] === 'flat')>Flat (₹)</option>
                                    </select>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="relative w-28">
                                        <input type="text" value="{{ $cat['rate'] }}" class="w-full rounded-lg border border-slate-200 py-1.5 pl-3 pr-8 text-sm font-semibold text-brand-600 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                                        <span class="absolute right-2 top-1/2 -translate-y-1/2 text-xs text-slate-400">{{ $cat['type'] === 'percent' ? '%' : '₹' }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3">
                                    <input type="text" value="{{ $cat['min'] }}" class="w-20 rounded-lg border border-slate-200 px-2 py-1.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                                </td>
                                <td class="px-5 py-3">
                                    <input type="text" value="{{ $cat['max'] }}" class="w-20 rounded-lg border border-slate-200 px-2 py-1.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                                </td>
                                <td class="px-5 py-3">
                                    <label class="relative inline-flex cursor-pointer items-center">
                                        <input type="checkbox" class="peer sr-only" @checked($cat['active'])>
                                        <span class="h-6 w-11 rounded-full bg-slate-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all peer-checked:bg-brand-600 peer-checked:after:translate-x-full"></span>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Role-wise --}}
    <div id="panel-role" class="commission-panel hidden space-y-4">
        <div class="rounded-xl border border-brand-100 bg-brand-50/50 p-4 text-sm text-slate-700">
            <p class="font-semibold text-brand-900">Role commission</p>
            <p class="mt-1 text-slate-600">Set a single default commission rate (%) for each user role in the hierarchy.</p>
        </div>

        <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="px-5 py-3">Role</th>
                            <th class="px-5 py-3">Commission (%)</th>
                            <th class="px-5 py-3">Active</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                            $roles = [
                                ['name' => 'Super Admin', 'desc' => 'Platform', 'rate' => '0.10', 'active' => true],
                                ['name' => 'Super Distributor', 'desc' => 'L1 Partner', 'rate' => '0.25', 'active' => true],
                                ['name' => 'Distributor', 'desc' => 'L2 Partner', 'rate' => '0.30', 'active' => true],
                                ['name' => 'Retailer', 'desc' => 'L3 Partner', 'rate' => '0.35', 'active' => true],
                                ['name' => 'Merchant', 'desc' => 'End merchant', 'rate' => '0.00', 'active' => false],
                            ];
                        @endphp
                        @foreach ($roles as $role)
                            <tr class="hover:bg-slate-50/80">
                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-900">{{ $role['name'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $role['desc'] }}</p>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="relative w-32">
                                        <input type="text" value="{{ $role['rate'] }}" class="w-full rounded-lg border border-slate-200 py-2 pl-3 pr-8 text-sm font-semibold text-brand-600 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-slate-400">%</span>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <label class="relative inline-flex cursor-pointer items-center">
                                        <input type="checkbox" class="peer sr-only" @checked($role['active'])>
                                        <span class="h-6 w-11 rounded-full bg-slate-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all peer-checked:bg-brand-600 peer-checked:after:translate-x-full"></span>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var tabs = document.querySelectorAll('.commission-tab');
    var panels = document.querySelectorAll('.commission-panel');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var panelId = tab.getAttribute('data-panel');
            tabs.forEach(function (t) {
                var active = t === tab;
                t.setAttribute('aria-selected', active ? 'true' : 'false');
                t.classList.toggle('bg-white', active);
                t.classList.toggle('text-brand-600', active);
                t.classList.toggle('shadow-sm', active);
                t.classList.toggle('font-semibold', active);
                t.classList.toggle('text-slate-600', !active);
                t.classList.toggle('font-medium', !active);
            });
            panels.forEach(function (p) {
                p.classList.toggle('hidden', p.id !== panelId);
            });
        });
    });
})();
</script>
@endpush
@endsection
