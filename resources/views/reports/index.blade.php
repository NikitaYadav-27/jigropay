@extends('layouts.dashboard')

@section('title', 'Reports & Analytics')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Reports & Analytics</h1>
            <p class="mt-1 text-slate-500">Real-time platform revenue and performance insights.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">
                <svg class="h-4 w-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Oct 01 - Oct 31, 2023
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export Report
            </button>
        </div>
    </div>

  {{-- KPI cards --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="relative overflow-hidden rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="absolute right-4 top-4 opacity-10">
                <svg class="h-12 w-12 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-500">Total Revenue</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">₹12,84,500</p>
            <p class="mt-2 flex items-center gap-1 text-xs font-semibold text-emerald-600">
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                +14.2% from last month
            </p>
        </div>

        <div class="relative overflow-hidden rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="absolute right-4 top-4 opacity-10">
                <svg class="h-12 w-12 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-500">Transaction Volume</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">45,892</p>
            <p class="mt-2 flex items-center gap-1 text-xs font-semibold text-emerald-600">
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                +8.1% vs avg
            </p>
        </div>

        <div class="relative overflow-hidden rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="absolute right-4 top-4 opacity-10">
                <svg class="h-12 w-12 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-500">Partner Payouts</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">₹8,42,120</p>
            <p class="mt-2 text-xs text-slate-500">65.6% Payout Ratio</p>
        </div>

        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-brand-600 via-brand-700 to-fuchsia-600 p-5 text-white shadow-lg">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-white/10"></div>
            <div class="absolute bottom-0 right-0 opacity-20">
                <svg class="h-20 w-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
            </div>
            <p class="relative text-sm font-medium opacity-90">Net Earnings</p>
            <p class="relative mt-2 text-2xl font-bold">₹4,42,380</p>
            <span class="relative mt-3 inline-flex items-center gap-1 rounded-full bg-white/20 px-2.5 py-0.5 text-xs font-semibold">
                <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                New Monthly Record
            </span>
        </div>
    </div>

    {{-- Charts --}}
    <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm xl:col-span-2">
            <div class="mb-4 flex flex-wrap items-start justify-between gap-3">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Revenue Growth</h2>
                    <p class="text-sm text-slate-500">Comparative analysis of gross volume vs net earnings.</p>
                </div>
                <div class="inline-flex rounded-lg bg-slate-100 p-1 text-xs font-semibold">
                    <button type="button" class="rounded-md px-3 py-1 text-slate-600">Daily</button>
                    <button type="button" class="rounded-md bg-white px-3 py-1 text-brand-600 shadow-sm">Monthly</button>
                </div>
            </div>
            <div class="h-64 sm:h-72">
                <canvas id="chart-revenue-growth"></canvas>
            </div>
        </div>

        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Service Distribution</h2>
            <div class="relative mx-auto mt-4 h-44 w-44">
                <canvas id="chart-service-distribution"></canvas>
                <div class="pointer-events-none absolute inset-0 flex flex-col items-center justify-center">
                    <p class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Total</p>
                    <p class="text-lg font-bold text-slate-900">100%</p>
                </div>
            </div>
            <ul class="mt-6 space-y-2.5 text-sm">
                @php
                    $legend = [
                        ['label' => 'Mobile & DTH', 'pct' => '45.2%', 'color' => 'bg-blue-500'],
                        ['label' => 'AePS & DMT', 'pct' => '24.8%', 'color' => 'bg-emerald-500'],
                        ['label' => 'BBPS Utility', 'pct' => '15.0%', 'color' => 'bg-amber-400'],
                        ['label' => 'Other Services', 'pct' => '15.0%', 'color' => 'bg-red-400'],
                    ];
                @endphp
                @foreach ($legend as $item)
                    <li class="flex items-center justify-between">
                        <span class="flex items-center gap-2 text-slate-600">
                            <span class="h-2.5 w-2.5 rounded-full {{ $item['color'] }}"></span>
                            {{ $item['label'] }}
                        </span>
                        <span class="font-semibold text-slate-900">{{ $item['pct'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Top partners table --}}
    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-col gap-2 border-b border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Top Performing Partners</h2>
                <p class="text-sm text-slate-500">Distribution of revenue across major partner nodes.</p>
            </div>
            <a href="#" class="text-sm font-semibold text-brand-600 hover:text-brand-700">View Full Leaderboard</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Partner Name</th>
                        <th class="px-5 py-3">Transactions</th>
                        <th class="px-5 py-3">Total Value</th>
                        <th class="px-5 py-3">Net Commission</th>
                        <th class="px-5 py-3">Growth</th>
                        <th class="px-5 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $partners = [
                            ['init' => 'AK', 'name' => 'Aman Kumar Enterprises', 'role' => 'Super Distributor', 'txns' => '12,450', 'value' => '₹4,25,000', 'commission' => '+₹6,840', 'growth' => '+12%', 'growthUp' => true, 'status' => 'Top Tier', 'badge' => 'bg-emerald-100 text-emerald-700'],
                            ['init' => 'VD', 'name' => 'Vikas Digital Store', 'role' => 'Distributor', 'txns' => '8,230', 'value' => '₹2,84,100', 'commission' => '+₹4,120', 'growth' => '+8.4%', 'growthUp' => true, 'status' => 'Active', 'badge' => 'bg-emerald-100 text-emerald-700'],
                            ['init' => 'CP', 'name' => 'City Point Agency', 'role' => 'Distributor', 'txns' => '5,410', 'value' => '₹1,95,400', 'commission' => '+₹2,950', 'growth' => '-2.1%', 'growthUp' => false, 'status' => 'Neutral', 'badge' => 'bg-sky-100 text-sky-700'],
                        ];
                    @endphp
                    @foreach ($partners as $partner)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-100 text-sm font-bold text-brand-700">{{ $partner['init'] }}</span>
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $partner['name'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $partner['role'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 font-medium text-slate-700">{{ $partner['txns'] }}</td>
                            <td class="px-5 py-4 font-medium text-slate-700">{{ $partner['value'] }}</td>
                            <td class="px-5 py-4 font-semibold text-emerald-600">{{ $partner['commission'] }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-0.5 font-semibold {{ $partner['growthUp'] ? 'text-emerald-600' : 'text-red-600' }}">
                                    @if ($partner['growthUp'])
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                                    @else
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                                    @endif
                                    {{ $partner['growth'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4"><span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $partner['badge'] }}">{{ $partner['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 rounded-lg border border-sky-200 bg-sky-50 px-4 py-3 text-sm text-sky-900">
        <strong>Pro Tip:</strong> You can use the search bar above to drill down into specific partner nodes or service IDs for granular reporting.
    </div>
</main>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    if (typeof Chart === 'undefined') return;

    var revenue = document.getElementById('chart-revenue-growth');
    if (revenue) {
        new Chart(revenue, {
            type: 'bar',
            data: {
                labels: ['WK 39', 'WK 40', 'WK 41', 'WK 42', 'WK 43', 'WK 44'],
                datasets: [{
                    label: 'Revenue',
                    data: [820000, 910000, 880000, 1284500, 1050000, 1120000],
                    backgroundColor: function (ctx) {
                        return ctx.dataIndex === 3 ? '#7c3aed' : '#ddd6fe';
                    },
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: '#64748b', font: { size: 11 } } },
                    y: { grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', callback: function (v) { return '₹' + (v / 100000).toFixed(1) + 'L'; } } }
                }
            }
        });
    }

    var distribution = document.getElementById('chart-service-distribution');
    if (distribution) {
        new Chart(distribution, {
            type: 'doughnut',
            data: {
                labels: ['Mobile & DTH', 'AePS & DMT', 'BBPS Utility', 'Other Services'],
                datasets: [{
                    data: [45.2, 24.8, 15, 15],
                    backgroundColor: ['#3b82f6', '#10b981', '#fbbf24', '#f87171'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                plugins: { legend: { display: false } }
            }
        });
    }
})();
</script>
@endpush
@endsection
