@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    @include('partials.topbar')

    <main class="p-4 sm:p-6">
        {{-- Page header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Welcome back, Admin</h1>
                <p class="mt-1 text-slate-500">Here's what's happening with your platform today.</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" class="inline-flex items-center gap-2 self-start rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg class="h-4 w-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    01 May 2024 - 31 May 2024
                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <a href="{{ route('bbps.index') ?? '#' }}" class="transition hover:scale-105" title="Go to Bharat Connect">
                    <img src="{{ asset('B_mnemonic.png') }}" alt="B Mnemonic" class="h-10 w-auto object-contain">
                </a>
                
            </div>
        </div>

        {{-- Stats --}}
        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @php
                $stats = [
                    ['label' => 'Total Transactions', 'value' => '12,548', 'change' => '↑ 18.41% vs Apr 2024', 'iconBg' => 'bg-brand-100', 'iconColor' => 'text-brand-600'],
                    ['label' => 'Total Collection', 'value' => '₹ 34,82,451', 'change' => '↑ 22.75% vs Apr 2024', 'iconBg' => 'bg-emerald-100', 'iconColor' => 'text-emerald-600'],
                    ['label' => 'Total Commission', 'value' => '₹ 2,45,672', 'change' => '↑ 26.54% vs Apr 2024', 'iconBg' => 'bg-violet-100', 'iconColor' => 'text-violet-600'],
                    ['label' => 'Total Users', 'value' => '18,756', 'change' => '↑ 12.06% vs Apr 2024', 'iconBg' => 'bg-brand-800/10', 'iconColor' => 'text-brand-800'],
                ];
            @endphp
            @foreach ($stats as $stat)
                <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full {{ $stat['iconBg'] }}">
                            <svg class="h-5 w-5 {{ $stat['iconColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-slate-500">{{ $stat['label'] }}</p>
                    <p class="mt-1 text-2xl font-bold text-slate-900">{{ $stat['value'] }}</p>
                    <p class="mt-2 text-xs font-medium text-emerald-600">{{ $stat['change'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Row 1: Chart + Quick actions + Wallet --}}
        <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm xl:col-span-2">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-lg font-semibold text-slate-900">Transaction Overview</h2>
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center gap-4 text-xs text-slate-500">
                            <span class="flex items-center gap-1.5"><span class="h-2 w-2 rounded-full bg-brand-600"></span> Collection (₹)</span>
                            <span class="flex items-center gap-1.5"><span class="h-2 w-2 rounded-full bg-orange-500"></span> Transactions</span>
                        </div>
                        <select class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm text-slate-600">
                            <option>This Month</option>
                        </select>
                    </div>
                </div>
                <div class="h-64 sm:h-72">
                    <canvas id="chart-overview"></canvas>
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                    <h2 class="mb-4 text-lg font-semibold text-slate-900">Quick Actions</h2>
                    <div class="grid grid-cols-4 gap-3">
                        @php
                            $actions = ['Add User', 'Wallet Recharge', 'Manual Payout', 'Txn Report', 'User Report', 'Commission', 'BBPS', 'Support'];
                        @endphp
                        @foreach ($actions as $action)
                            <button type="button" class="flex flex-col items-center gap-1.5 rounded-lg p-2 text-center transition hover:bg-brand-50">
                                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                </span>
                                <span class="text-[10px] font-medium leading-tight text-slate-600 sm:text-xs">{{ $action }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-brand-800 via-brand-700 to-brand-600 p-5 text-white shadow-lg">
                    <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-12 -left-8 h-40 w-40 rounded-full bg-white/5"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold opacity-90">Jigropay · MY WALLET</span>
                            <button type="button" class="opacity-80 hover:opacity-100" aria-label="Toggle balance visibility">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                        <p class="mt-4 text-3xl font-bold">₹ 1,12,419.00</p>
                        <div class="mt-4 flex gap-2">
                            <button type="button" class="flex-1 rounded-lg bg-white py-2 text-sm font-semibold text-brand-700 hover:bg-brand-50">Add Money</button>
                            <button type="button" class="flex-1 rounded-lg border border-white/40 py-2 text-sm font-semibold hover:bg-white/10">Transfer</button>
                        </div>
                        <div class="mt-5 grid grid-cols-3 gap-2 border-t border-white/20 pt-4 text-center text-xs">
                            <div><p class="opacity-70">Opening</p><p class="font-semibold">₹98,200</p></div>
                            <div><p class="opacity-70">Credited</p><p class="font-semibold">₹42,500</p></div>
                            <div><p class="opacity-70">Debited</p><p class="font-semibold">₹28,281</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Row 2: Transactions table + BBPS --}}
        <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
            <div class="rounded-xl border border-slate-100 bg-white shadow-sm xl:col-span-2">
                <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                    <h2 class="text-lg font-semibold text-slate-900">Recent Transactions</h2>
                    <a href="{{ route('transactions.index') }}" class="text-sm font-medium text-brand-600 hover:text-brand-700">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px] text-left text-sm">
                        <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            <tr>
                                <th class="px-5 py-3">Txn ID</th>
                                <th class="px-5 py-3">Service</th>
                                <th class="px-5 py-3">Customer</th>
                                <th class="px-5 py-3">Amount</th>
                                <th class="px-5 py-3">Status</th>
                                <th class="px-5 py-3">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @php
                                $txns = [
                                    ['id' => 'TXN982341', 'service' => 'Electricity', 'customer' => 'Rahul Sharma', 'cid' => 'CUS10234', 'amount' => '₹ 1,250', 'time' => '2 min ago', 'color' => 'bg-amber-100 text-amber-700'],
                                    ['id' => 'TXN982340', 'service' => 'Mobile', 'customer' => 'Priya Patel', 'cid' => 'CUS10235', 'amount' => '₹ 299', 'time' => '8 min ago', 'color' => 'bg-blue-100 text-blue-700'],
                                    ['id' => 'TXN982339', 'service' => 'DTH', 'customer' => 'Amit Kumar', 'cid' => 'CUS10236', 'amount' => '₹ 450', 'time' => '15 min ago', 'color' => 'bg-purple-100 text-purple-700'],
                                    ['id' => 'TXN982338', 'service' => 'FASTag', 'customer' => 'Sneha Reddy', 'cid' => 'CUS10237', 'amount' => '₹ 500', 'time' => '22 min ago', 'color' => 'bg-emerald-100 text-emerald-700'],
                                ];
                            @endphp
                            @foreach ($txns as $txn)
                                <tr class="hover:bg-slate-50/80">
                                    <td class="px-5 py-3 font-medium text-brand-600">{{ $txn['id'] }}</td>
                                    <td class="px-5 py-3">
                                        <span class="inline-flex items-center gap-2">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-lg {{ $txn['color'] }} text-xs font-bold">{{ substr($txn['service'], 0, 1) }}</span>
                                            {{ $txn['service'] }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3">
                                        <p class="font-medium text-slate-900">{{ $txn['customer'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $txn['cid'] }}</p>
                                    </td>
                                    <td class="px-5 py-3 font-semibold">{{ $txn['amount'] }}</td>
                                    <td class="px-5 py-3"><span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">Success</span></td>
                                    <td class="px-5 py-3 text-slate-500">{{ $txn['time'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-900">Top BBPS Categories</h2>
                    <a href="{{ route('bbps.index') }}" class="text-sm font-medium text-brand-600">View All</a>
                </div>
                <ul class="space-y-4">
                    @php
                        $bbps = [
                            ['name' => 'Electricity', 'pct' => '32%', 'color' => 'bg-amber-100 text-amber-600'],
                            ['name' => 'Mobile Prepaid', 'pct' => '24%', 'color' => 'bg-blue-100 text-blue-600'],
                            ['name' => 'DTH', 'pct' => '18%', 'color' => 'bg-purple-100 text-purple-600'],
                            ['name' => 'FASTag', 'pct' => '14%', 'color' => 'bg-emerald-100 text-emerald-600'],
                        ];
                    @endphp
                    @foreach ($bbps as $cat)
                        <li class="flex items-center justify-between gap-3">
                            <span class="flex items-center gap-3">
                                <span class="flex h-9 w-9 items-center justify-center rounded-lg {{ $cat['color'] }} text-sm font-bold">{{ substr($cat['name'], 0, 1) }}</span>
                                <span class="text-sm font-medium text-slate-700">{{ $cat['name'] }}</span>
                            </span>
                            <span class="text-sm font-bold text-slate-900">{{ $cat['pct'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Row 3: Donut, Alerts, Commission --}}
        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h2 class="mb-4 text-lg font-semibold text-slate-900">Users by Role</h2>
                <div class="relative mx-auto h-52 w-52">
                    <canvas id="chart-roles"></canvas>
                    <div class="pointer-events-none absolute inset-0 flex flex-col items-center justify-center">
                        <p class="text-xs text-slate-500">Total</p>
                        <p class="text-xl font-bold text-slate-900">18,756</p>
                    </div>
                </div>
                <div class="mt-4 flex flex-wrap justify-center gap-4 text-xs text-slate-600">
                    <span class="flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-brand-600"></span> Super Distributor</span>
                    <span class="flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-violet-400"></span> Distributor</span>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h2 class="mb-4 text-lg font-semibold text-slate-900">Important Alerts</h2>
                <div class="space-y-3">
                    <div class="flex items-center justify-between gap-3 rounded-lg bg-orange-50 px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-orange-200 text-orange-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">KYC Pending</p>
                                <p class="text-xs text-slate-500">24 users awaiting review</p>
                            </div>
                        </div>
                        <button type="button" class="shrink-0 rounded-lg bg-white px-3 py-1.5 text-xs font-semibold text-orange-700 shadow-sm">Review</button>
                    </div>
                    <div class="flex items-center justify-between gap-3 rounded-lg bg-sky-50 px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-200 text-sky-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Low Wallet Balance</p>
                                <p class="text-xs text-slate-500">8 retailers below ₹500</p>
                            </div>
                        </div>
                        <button type="button" class="shrink-0 rounded-lg bg-white px-3 py-1.5 text-xs font-semibold text-sky-700 shadow-sm">View</button>
                    </div>
                    <div class="flex items-center justify-between gap-3 rounded-lg bg-emerald-50 px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-200 text-emerald-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Payout Successful</p>
                                <p class="text-xs text-slate-500">₹2.4L processed today</p>
                            </div>
                        </div>
                        <button type="button" class="shrink-0 rounded-lg bg-white px-3 py-1.5 text-xs font-semibold text-emerald-700 shadow-sm">View</button>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <h2 class="mb-4 text-lg font-semibold text-slate-900">Commission Summary</h2>
                <div class="grid grid-cols-2 gap-3">
                    <div class="rounded-lg bg-slate-50 p-3">
                        <p class="text-xs text-slate-500">Total Commission</p>
                        <p class="mt-1 text-lg font-bold text-slate-900">₹2,45,672</p>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-3">
                        <p class="text-xs text-slate-500">Pending</p>
                        <p class="mt-1 text-lg font-bold text-amber-600">₹18,420</p>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-3">
                        <p class="text-xs text-slate-500">Paid</p>
                        <p class="mt-1 text-lg font-bold text-emerald-600">₹2,27,252</p>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-3">
                        <p class="text-xs text-slate-500">This Month</p>
                        <p class="mt-1 text-lg font-bold text-emerald-600">↑ 26.54%</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Role hierarchy --}}
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <h2 class="mb-6 text-lg font-semibold text-slate-900">Role Hierarchy Overview</h2>
            <div class="flex flex-col items-stretch gap-4 lg:flex-row lg:items-center lg:justify-center">
                @php
                    $roles = [
                        ['name' => 'Admin', 'count' => '12', 'bg' => 'bg-brand-700', 'arrow' => true],
                        ['name' => 'Super Distributor', 'count' => '156', 'bg' => 'bg-violet-500', 'arrow' => true],
                        ['name' => 'Distributor', 'count' => '1,240', 'bg' => 'bg-violet-400', 'arrow' => true],
                        ['name' => 'Retailer', 'count' => '17,348', 'bg' => 'bg-brand-200 text-brand-900', 'arrow' => false],
                    ];
                @endphp
                @foreach ($roles as $i => $role)
                    <div class="flex flex-col items-center gap-4 sm:flex-row">
                        <div class="flex w-full min-w-[140px] flex-col items-center rounded-xl {{ $role['bg'] }} px-6 py-4 text-center text-white shadow-sm sm:w-auto {{ str_contains($role['bg'], 'brand-200') ? '!text-brand-900' : '' }}">
                            <svg class="mb-2 h-8 w-8 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <p class="font-semibold">{{ $role['name'] }}</p>
                            <p class="mt-1 text-2xl font-bold">{{ $role['count'] }}</p>
                            <p class="text-xs opacity-80">users</p>
                        </div>
                        @if ($role['arrow'])
                            <svg class="hidden h-6 w-6 shrink-0 rotate-90 text-slate-300 sm:block sm:rotate-0 lg:h-5 lg:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            <svg class="mx-auto h-6 w-6 text-slate-300 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        @endif
                    </div>
                @endforeach
            </div>
            <p class="mt-6 rounded-lg bg-slate-50 px-4 py-3 text-center text-sm text-slate-600">
                Admin can create Super Distributors → Super Distributors create Distributors → Distributors create Retailers.
            </p>
        </div>
    </main>

    <footer class="border-t border-slate-200 bg-white px-4 py-4 sm:px-6">
        <div class="flex flex-col gap-3 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">
            <p>Support: <a href="tel:18001234567" class="font-medium text-slate-700">1800 123 4567</a> · <a href="mailto:support@Jigropay.com" class="font-medium text-slate-700">support@Jigropay.com</a></p>
            <p>© {{ date('Y') }} Jigropay. <a href="#" class="text-brand-600 hover:underline">Privacy Policy</a></p>
        </div>
    </footer>
@endsection
