@extends('layouts.dashboard')

@section('title', 'Notifications Center')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Notifications Center</h1>
            <p class="mt-1 text-slate-500">Manage system alerts and platform updates.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('notifications.history') }}" class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">History</a>
            <a href="{{ route('notifications.send') }}" class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-700">Send Notification</a>
            <button type="button" class="rounded-lg bg-sky-100 px-4 py-2 text-sm font-semibold text-sky-800 hover:bg-sky-200">Mark all as read</button>
            <button type="button" class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50">Clear all</button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">
        <aside class="space-y-4 lg:col-span-1">
            <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                <p class="mb-3 text-xs font-bold uppercase tracking-wider text-slate-400">Filters</p>
                <ul class="space-y-1">
                    <li><button type="button" class="flex w-full items-center justify-between rounded-lg bg-brand-50 px-3 py-2.5 text-sm font-semibold text-brand-700"><span class="flex items-center gap-2">∞ All Notifications</span><span class="rounded-full bg-brand-600 px-2 py-0.5 text-xs text-white">24</span></button></li>
                    <li><button type="button" class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-sm text-slate-600 hover:bg-slate-50"><span class="flex items-center gap-2"><span class="text-red-500">⚠</span> System Alerts</span><span class="text-slate-400">3</span></button></li>
                    <li><button type="button" class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-sm text-slate-600 hover:bg-slate-50"><span class="flex items-center gap-2"><span class="text-amber-500">📢</span> Announcements</span><span class="text-slate-400">5</span></button></li>
                    <li><button type="button" class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-sm text-slate-600 hover:bg-slate-50"><span class="flex items-center gap-2"><span class="text-emerald-500">✓</span> Transactions</span><span class="text-slate-400">16</span></button></li>
                </ul>
                <p class="mb-2 mt-5 text-xs font-bold uppercase tracking-wider text-slate-400">Date Range</p>
                <div class="space-y-2 text-sm">
                    <label class="flex items-center gap-2"><input type="radio" name="range" checked class="text-brand-600"> Last 24 Hours</label>
                    <label class="flex items-center gap-2"><input type="radio" name="range" class="text-brand-600"> Last 7 Days</label>
                    <label class="flex items-center gap-2"><input type="radio" name="range" class="text-brand-600"> Last 30 Days</label>
                </div>
            </div>
            <div class="rounded-xl bg-gradient-to-br from-brand-600 to-brand-800 p-5 text-white shadow-lg">
                <p class="font-semibold">Need Support?</p>
                <p class="mt-2 text-sm opacity-90">Our compliance team is here to help with system alerts.</p>
                <button type="button" class="mt-4 w-full rounded-lg bg-white py-2 text-sm font-semibold text-brand-700">Contact Support</button>
            </div>
        </aside>

        <div class="space-y-6 lg:col-span-3">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Today — May 24, 2024</p>

            @php
                $items = [
                    ['border' => 'border-l-red-500', 'icon' => 'bg-red-100 text-red-600', 'emoji' => '⚠', 'title' => 'KYC Compliance Alert', 'badge' => 'CRITICAL', 'badgeClass' => 'bg-red-100 text-red-700', 'time' => '10:45 AM', 'text' => '23 retail accounts are nearing their KYC expiration date. Immediate review required to avoid service suspension.', 'actions' => true, 'read' => false],
                    ['border' => 'border-l-emerald-500', 'icon' => 'bg-emerald-100 text-emerald-600', 'emoji' => '💰', 'title' => 'Bulk Payout Successful', 'badge' => 'SUCCESS', 'badgeClass' => 'bg-emerald-100 text-emerald-700', 'time' => '09:12 AM', 'text' => 'The weekly settlement for Batch #TXN-2024-88 has been successfully processed. Total: ₹12,45,600.', 'actions' => true, 'read' => false],
                    ['border' => 'border-l-amber-500', 'icon' => 'bg-amber-100 text-amber-600', 'emoji' => '⚙', 'title' => 'System Maintenance Update', 'badge' => 'ANNOUNCEMENT', 'badgeClass' => 'bg-amber-100 text-amber-800', 'time' => '08:00 AM', 'text' => 'Scheduled server maintenance is completed. All BBPS services are back online.', 'actions' => false, 'read' => true],
                    ['border' => 'border-l-sky-500', 'icon' => 'bg-sky-100 text-sky-600', 'emoji' => '🛡', 'title' => 'Security Policy Update Required', 'badge' => 'ACTION', 'badgeClass' => 'bg-sky-100 text-sky-800', 'time' => '07:30 AM', 'text' => 'New 2FA security protocols have been introduced for Super Distributor accounts.', 'actions' => true, 'read' => false, 'primary' => 'Update Settings'],
                ];
            @endphp
            @foreach ($items as $n)
                <article class="overflow-hidden rounded-xl border border-slate-100 border-l-4 {{ $n['border'] }} bg-white shadow-sm">
                    <div class="flex gap-4 p-5">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full {{ $n['icon'] }} text-lg">{{ $n['emoji'] }}</span>
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-start justify-between gap-2">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h2 class="font-semibold text-slate-900">{{ $n['title'] }}</h2>
                                    <span class="rounded-full px-2 py-0.5 text-[10px] font-bold {{ $n['badgeClass'] }}">{{ $n['badge'] }}</span>
                                </div>
                                <span class="text-xs text-slate-400">{{ $n['time'] }}</span>
                            </div>
                            <p class="mt-2 text-sm text-slate-600">{{ $n['text'] }}</p>
                            @if ($n['actions'])
                                <div class="mt-3 flex flex-wrap gap-4 text-sm">
                                    <a href="#" class="font-semibold text-brand-600 hover:underline">{{ $n['primary'] ?? 'Review Now' }}</a>
                                    <button type="button" class="flex items-center gap-1 text-slate-500 hover:text-slate-700">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Mark as read
                                    </button>
                                </div>
                            @else
                                <p class="mt-3 text-xs italic text-slate-400">Already read by Admin</p>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach

            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Yesterday — May 23, 2024</p>
            <p class="py-8 text-center text-sm text-slate-400">No more notifications for this period.</p>
        </div>
    </div>
</main>

@include('partials.admin-footer')
@endsection
