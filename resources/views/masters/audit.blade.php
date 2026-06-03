@extends('layouts.dashboard')

@section('title', 'Audit Logs')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Audit Logs Overview</h1>
        <p class="mt-1 text-slate-500">Keep track of all activities to ensure accountability and system security.</p>
    </div>

    <div class="mb-4 flex flex-wrap gap-2 border-b border-slate-200">
        @foreach (['All Activity', 'Auth', 'Merchant', 'KYC'] as $i => $tab)
            <button type="button" class="-mb-px border-b-2 px-4 py-2.5 text-sm font-semibold {{ $i === 0 ? 'border-brand-600 text-brand-600' : 'border-transparent text-slate-500 hover:text-slate-700' }}">{{ $tab }}</button>
        @endforeach
    </div>

    <div class="mb-4 flex flex-col gap-3 rounded-xl border border-slate-100 bg-white p-4 shadow-sm sm:flex-row sm:items-center">
        <div class="relative min-w-0 flex-1">
            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="search" placeholder="Search members by name, email and role" class="w-full rounded-full border border-slate-200 py-2 pl-10 pr-4 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
        </div>
        <div class="flex flex-wrap gap-2">
            <select class="rounded-full border border-slate-200 px-4 py-2 text-sm text-slate-600"><option>Admin</option></select>
            <select class="rounded-full border border-slate-200 px-4 py-2 text-sm text-slate-600"><option>Module</option></select>
            <select class="rounded-full border border-slate-200 px-4 py-2 text-sm text-slate-600"><option>This Week</option></select>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-slate-100 text-xs font-semibold uppercase tracking-wide text-slate-600">
                    <tr>
                        <th class="px-5 py-3">Admin & Email</th>
                        <th class="px-5 py-3">Module</th>
                        <th class="px-5 py-3">Action Performed</th>
                        <th class="px-5 py-3">Date & Time</th>
                        <th class="px-5 py-3">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $logs = [
                            ['init' => 'R', 'name' => 'Rahul Sharma', 'email' => 'rahul@jigropay.com', 'module' => 'Merchant Management', 'action' => 'Approved Merchant', 'time' => '10:24 AM', 'date' => '12 Jan, 2026', 'ip' => '103.21.45.88'],
                            ['init' => 'P', 'name' => 'Priya Patel', 'email' => 'priya@jigropay.com', 'module' => 'KYC Verification', 'action' => 'Rejected Document', 'time' => '09:15 AM', 'date' => '12 Jan, 2026', 'ip' => '49.36.102.14'],
                            ['init' => 'A', 'name' => 'Amit Kumar', 'email' => 'amit@jigropay.com', 'module' => 'Fund Requests', 'action' => 'Approved Wallet Recharge', 'time' => '04:42 PM', 'date' => '11 Jan, 2026', 'ip' => '182.76.203.55'],
                            ['init' => 'J', 'name' => 'James Admin', 'email' => 'info@admin.com', 'module' => 'Dispute Management', 'action' => 'Suspicious Transaction Flagged', 'time' => '02:10 PM', 'date' => '11 Jan, 2026', 'ip' => '203.0.113.42'],
                            ['init' => 'S', 'name' => 'Sneha Reddy', 'email' => 'sneha@jigropay.com', 'module' => 'User Management', 'action' => 'Created Super Distributor', 'time' => '11:00 AM', 'date' => '10 Jan, 2026', 'ip' => '192.168.1.105'],
                        ];
                    @endphp
                    @foreach ($logs as $log)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-brand-100 text-sm font-bold text-brand-700">{{ $log['init'] }}</span>
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $log['name'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $log['email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-slate-700">{{ $log['module'] }}</td>
                            <td class="px-5 py-4 font-medium text-slate-800">{{ $log['action'] }}</td>
                            <td class="px-5 py-4">
                                <p class="font-medium text-slate-800">{{ $log['time'] }}</p>
                                <p class="text-xs text-slate-500">{{ $log['date'] }}</p>
                            </td>
                            <td class="px-5 py-4 font-mono text-xs text-slate-600">{{ $log['ip'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
