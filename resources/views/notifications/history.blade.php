@extends('layouts.dashboard')

@section('title', 'Notification History')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('notifications.index') }}" class="hover:text-brand-600">Notifications</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">History</span>
    </nav>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Notification History</h1>
            <p class="mt-1 text-slate-500">Delivery tracking for all sent notifications.</p>
        </div>
        <a href="{{ route('notifications.send') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">+ Send Notification</a>
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-col gap-3 border-b border-slate-100 p-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="relative max-w-xs flex-1">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="search" placeholder="Search..." class="w-full rounded-lg border border-slate-200 py-2 pl-10 pr-3 text-sm">
            </div>
            <div class="flex gap-2">
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filters
                </button>
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">ID</th>
                        <th class="px-5 py-3">Template</th>
                        <th class="px-5 py-3">Channel</th>
                        <th class="px-5 py-3">Recipients</th>
                        <th class="px-5 py-3">Delivered</th>
                        <th class="px-5 py-3">Sent At</th>
                        <th class="px-5 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $rows = [
                            ['id' => 'NTF330200', 'template' => 'KYC Approval', 'channel' => 'Email', 'recipients' => '12', 'delivered' => '11', 'pct' => 92, 'bar' => 'bg-emerald-500', 'sent' => '2026-06-02 14:30', 'status' => 'Completed', 'badge' => 'bg-emerald-100 text-emerald-700', 'dot' => 'bg-emerald-500'],
                            ['id' => 'NTF330201', 'template' => 'BBPS Transaction Receipt', 'channel' => 'SMS', 'recipients' => '1', 'delivered' => '1', 'pct' => 100, 'bar' => 'bg-emerald-500', 'sent' => '2026-06-02 12:15', 'status' => 'Completed', 'badge' => 'bg-emerald-100 text-emerald-700', 'dot' => 'bg-emerald-500', 'preview' => true],
                            ['id' => 'NTF330202', 'template' => 'Transaction Failed', 'channel' => 'Push', 'recipients' => '2,914', 'delivered' => '2,450', 'pct' => 84, 'bar' => 'bg-amber-500', 'sent' => '2026-06-02 10:00', 'status' => 'Processing', 'badge' => 'bg-amber-100 text-amber-800', 'dot' => 'bg-amber-500'],
                            ['id' => 'NTF330203', 'template' => 'Maintenance Alert', 'channel' => 'Email', 'recipients' => '2,914', 'delivered' => '120', 'pct' => 4, 'bar' => 'bg-red-500', 'sent' => '2026-06-01 18:00', 'status' => 'Failed', 'badge' => 'bg-red-100 text-red-700', 'dot' => 'bg-red-500'],
                            ['id' => 'NTF330204', 'template' => 'Commission Payout', 'channel' => 'Push', 'recipients' => '156', 'delivered' => '—', 'pct' => 0, 'bar' => 'bg-sky-500', 'sent' => '2026-06-03 09:00', 'status' => 'Scheduled', 'badge' => 'bg-sky-100 text-sky-800', 'dot' => 'bg-sky-500'],
                        ];
                    @endphp
                    @foreach ($rows as $row)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-semibold text-brand-600">{{ $row['id'] }}</td>
                            <td class="px-5 py-4 font-medium text-slate-800">
                                {{ $row['template'] }}
                                @if(isset($row['preview']))
                                    <button type="button" id="open-sms-preview" class="ml-2 text-xs font-semibold text-brand-600 hover:underline">Preview</button>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $row['channel'] }}</td>
                            <td class="px-5 py-4">{{ $row['recipients'] }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <span>{{ $row['delivered'] }} <span class="text-slate-400">{{ $row['pct'] }}%</span></span>
                                </div>
                                <div class="mt-1.5 h-1 w-24 overflow-hidden rounded-full bg-slate-100">
                                    <div class="h-full {{ $row['bar'] }}" style="width: {{ $row['pct'] }}%"></div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-slate-500">{{ $row['sent'] }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $row['badge'] }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $row['dot'] }}"></span>
                                    {{ $row['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4 text-sm text-slate-500">
            <span>Showing 1-10 of 16</span>
            <span class="flex items-center gap-2">
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50">&lsaquo;</button>
                <span class="rounded-lg border border-slate-200 px-3 py-1">Page 1 of 2</span>
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50">&rsaquo;</button>
            </span>
        </div>
    </div>
</main>

<!-- SMS Preview Modal -->
<div id="sms-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/50" id="sms-modal-backdrop"></div>
    <div class="relative w-full max-w-sm rounded-3xl bg-white shadow-2xl overflow-hidden border-[8px] border-slate-800">
        <div class="bg-slate-100 px-4 py-3 border-b border-slate-200 flex justify-between items-center">
            <div class="flex items-center gap-2 text-slate-800 font-semibold text-sm">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                BBPS Alerts
            </div>
            <button type="button" id="close-sms-modal" class="text-slate-400 hover:text-slate-600">✕</button>
        </div>
        <div class="bg-slate-50 p-4 h-[400px] flex flex-col justify-end">
            <div class="bg-white rounded-2xl rounded-bl-none p-3 shadow-sm border border-slate-200 w-11/12 text-sm text-slate-800 relative">
                Your payment of Rs. 2450.00 for BESCOM has been successfully processed. 
                <br><br>
                B-Connect Txn ID: BBC-1029384756. 
                <br>
                CCF: Rs. 15.00.
                <div class="text-[10px] text-slate-400 mt-2 text-right">12:15 PM</div>
            </div>
        </div>
    </div>
</div>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var modal = document.getElementById('sms-modal');
    function open() { modal.classList.remove('hidden'); modal.classList.add('flex'); document.body.classList.add('overflow-hidden'); }
    function close() { modal.classList.add('hidden'); modal.classList.remove('flex'); document.body.classList.remove('overflow-hidden'); }
    document.getElementById('open-sms-preview')?.addEventListener('click', open);
    document.getElementById('close-sms-modal')?.addEventListener('click', close);
    document.getElementById('sms-modal-backdrop')?.addEventListener('click', close);
})();
</script>
@endpush
@endsection
