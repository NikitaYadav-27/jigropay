@extends('layouts.dashboard')

@section('title', 'KYC Management')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">KYC Management</h1>
        <p class="mt-1 text-slate-500">Review and manage user KYC submissions.</p>
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-col gap-4 border-b border-slate-100 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">
            <div class="relative max-w-md flex-1">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="search" placeholder="Search merchants, PAN or company..." class="w-full rounded-lg border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filters
                </button>
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[960px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Merchant Name</th>
                        <th class="px-5 py-3">PAN Number</th>
                        <th class="px-5 py-3">Document Type</th>
                        <th class="px-5 py-3">Submit Date</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $rows = [
                            ['merchant' => 'QuickBazaar', 'slug' => 'quickbazaar', 'pan' => 'ABCDE1234F', 'company' => 'TechPay Solutions', 'doc' => 'PAN Card', 'date' => '20 Jan, 2026', 'status' => 'Approved', 'badge' => 'bg-emerald-100 text-emerald-700', 'dot' => 'bg-emerald-500', 'modal' => 'approved'],
                            ['merchant' => 'ShopEasy', 'slug' => 'shopeasy', 'pan' => 'FGHIJ5678K', 'company' => 'ShopEasy Retail Pvt Ltd', 'doc' => 'PAN Card', 'date' => '19 Jan, 2026', 'status' => 'Pending', 'badge' => 'bg-amber-100 text-amber-700', 'dot' => 'bg-amber-500', 'modal' => 'review'],
                            ['merchant' => 'PayMart', 'slug' => 'paymart', 'pan' => 'KLMNO9012P', 'company' => 'PayMart Solutions', 'doc' => 'Aadhaar Card', 'date' => '18 Jan, 2026', 'status' => 'Rejected', 'badge' => 'bg-red-100 text-red-700', 'dot' => 'bg-red-500', 'modal' => 'reject'],
                            ['merchant' => 'UrbanPay', 'slug' => 'urbanpay', 'pan' => 'QRSTU3456V', 'company' => 'UrbanPay Networks', 'doc' => 'PAN Card', 'date' => '17 Jan, 2026', 'status' => 'Re-upload', 'badge' => 'bg-amber-100 text-amber-800', 'dot' => 'bg-amber-500', 'modal' => 'reject'],
                            ['merchant' => 'NovaRetail', 'slug' => 'novaretail', 'pan' => 'WXYZA7890B', 'company' => 'Nova Retail Hub', 'doc' => 'GST Certificate', 'date' => '16 Jan, 2026', 'status' => 'Pending', 'badge' => 'bg-amber-100 text-amber-700', 'dot' => 'bg-amber-500', 'modal' => 'review'],
                        ];
                    @endphp
                    @foreach ($rows as $row)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 font-semibold text-slate-900">{{ $row['merchant'] }}</td>
                            <td class="px-5 py-4 font-mono text-slate-700">{{ $row['pan'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $row['doc'] }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $row['date'] }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $row['badge'] }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $row['dot'] }}"></span>
                                    {{ $row['status'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-1">
                                    <button
                                        type="button"
                                        class="btn-kyc-review rounded-lg p-1.5 text-brand-600 hover:bg-brand-50"
                                        title="Review"
                                        aria-label="Review {{ $row['merchant'] }}"
                                        data-modal-mode="{{ $row['modal'] }}"
                                        data-merchant="{{ $row['merchant'] }}"
                                        data-slug="{{ $row['slug'] }}"
                                        data-pan="{{ $row['pan'] }}"
                                        data-company="{{ $row['company'] }}"
                                        data-doc="{{ $row['doc'] }}"
                                        data-date="{{ $row['date'] }}"
                                        data-status="{{ $row['status'] }}"
                                    >
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </button>
                                    <a href="{{ route('kyc.show', $row['slug']) }}" class="rounded-lg p-1.5 text-sky-600 hover:bg-sky-50" title="Open full page" aria-label="Open {{ $row['merchant'] }}">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                    <button type="button" class="btn-kyc-delete rounded-lg p-1.5 text-red-600 hover:bg-red-50" title="Delete" aria-label="Delete {{ $row['merchant'] }}" data-merchant="{{ $row['merchant'] }}">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between border-t border-slate-100 px-5 py-4 text-sm text-slate-500">
            <span>Showing 1-5 of 128</span>
            <span class="flex items-center gap-2">
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50 disabled:opacity-50" disabled>&lsaquo;</button>
                <span class="rounded-lg border border-slate-200 px-3 py-1">Page 1 of 26</span>
                <button type="button" class="rounded-lg border border-slate-200 p-2 hover:bg-slate-50">&rsaquo;</button>
            </span>
        </div>
    </div>
</main>

{{-- KYC review modal --}}
<div id="kyc-modal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="kyc-modal-title">
    <div class="absolute inset-0 bg-slate-900/60" data-kyc-close></div>
    <div class="relative flex max-h-[94vh] w-full max-w-3xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl">
        <div class="flex shrink-0 items-start justify-between border-b border-slate-100 px-5 py-4 sm:px-6">
            <div class="min-w-0 pr-4">
                <h2 id="kyc-modal-title" class="text-xl font-bold text-slate-900">QuickBazaar</h2>
                <p class="mt-1 text-sm text-slate-500">Review the document details carefully before taking action.</p>
            </div>
            <button type="button" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600" data-kyc-close aria-label="Close">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="overflow-y-auto px-5 py-4 sm:px-6">
            {{-- Reject remarks (reject mode) --}}
            <div id="kyc-panel-reject-remarks" class="mb-5 hidden">
                <label class="mb-1.5 block text-sm font-medium text-slate-700">Remarks (Reason for Rejection) <span class="text-red-500">*</span></label>
                <textarea id="kyc-reject-remarks" rows="4" placeholder="Enter reason for rejection or re-upload request..." class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"></textarea>
            </div>

            {{-- Document viewer --}}
            <div id="kyc-panel-documents" class="mb-5">
                <div class="relative overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
                    <div class="flex min-h-[220px] items-center justify-center p-4 sm:min-h-[280px]">
                        <img id="kyc-doc-main" src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=800&q=80" alt="Document preview" class="max-h-[260px] w-full rounded-lg object-contain shadow-md transition-transform duration-200 sm:max-h-[320px]" style="transform: scale(1)">
                    </div>
                    <div class="absolute bottom-3 right-3 flex gap-1">
                        <button type="button" id="kyc-zoom-out" class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/90 text-slate-600 shadow hover:bg-white" aria-label="Zoom out">−</button>
                        <button type="button" id="kyc-zoom-in" class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/90 text-slate-600 shadow hover:bg-white" aria-label="Zoom in">+</button>
                    </div>
                </div>
                <div class="mt-3 flex gap-2 overflow-x-auto pb-1">
                    @foreach ([
                        'https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=200&q=80',
                        'https://images.unsplash.com/photo-1554224311-beee415c201f?w=200&q=80',
                        'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=200&q=80',
                        'https://images.unsplash.com/photo-1568667256549-094345857637?w=200&q=80',
                        'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=80',
                    ] as $i => $thumb)
                        <button type="button" class="kyc-thumb shrink-0 overflow-hidden rounded-lg border-2 {{ $i === 0 ? 'border-brand-500' : 'border-transparent' }} opacity-90 hover:opacity-100" data-src="{{ $thumb }}">
                            <img src="{{ $thumb }}" alt="" class="h-14 w-20 object-cover">
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Info grid --}}
            <div class="mb-5 grid grid-cols-2 gap-x-6 gap-y-4 rounded-xl bg-slate-50 p-4 text-sm sm:grid-cols-2">
                <div>
                    <p class="text-slate-500">Company</p>
                    <p id="kyc-info-company" class="mt-0.5 font-semibold text-slate-900">TechPay Solutions</p>
                </div>
                <div>
                    <p class="text-slate-500">PAN Number</p>
                    <p id="kyc-info-pan" class="mt-0.5 font-mono font-semibold text-slate-900">ABCDE1234F</p>
                </div>
                <div>
                    <p class="text-slate-500">Document Type</p>
                    <p id="kyc-info-doc" class="mt-0.5 font-semibold text-slate-900">PAN Card</p>
                </div>
                <div>
                    <p class="text-slate-500">Submitted On</p>
                    <p id="kyc-info-date" class="mt-0.5 font-semibold text-slate-900">20 Jan, 2026</p>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <p class="text-slate-500">Status</p>
                    <p class="mt-1" id="kyc-info-status-wrap">
                        <span id="kyc-info-status" class="inline-flex rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">Verified</span>
                    </p>
                </div>
            </div>

            {{-- Approval note (review / approved modes) --}}
            <div id="kyc-panel-approval-note" class="mb-2">
                <label class="mb-1.5 block text-sm font-medium text-slate-700">Approval Note</label>
                <textarea id="kyc-approval-note" rows="3" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">Document verified successfully. Details match submitted records.</textarea>
            </div>
        </div>

        {{-- Footer actions --}}
        <div class="shrink-0 border-t border-slate-100 bg-white px-5 py-4 sm:px-6">
            {{-- Approved: single full-width button --}}
            <div id="kyc-actions-approved" class="hidden">
                <button type="button" class="flex w-full items-center justify-center gap-2 rounded-xl bg-teal-500 py-3.5 text-sm font-semibold text-white hover:bg-teal-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Approved
                </button>
            </div>

            {{-- Review: reject + approve --}}
            <div id="kyc-actions-review" class="hidden grid-cols-2 gap-3 sm:grid">
                <button type="button" id="kyc-btn-show-reject" class="flex items-center justify-center gap-2 rounded-xl border-2 border-red-200 bg-white py-3.5 text-sm font-semibold text-red-600 hover:bg-red-50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Reject
                </button>
                <button type="button" class="flex items-center justify-center gap-2 rounded-xl bg-teal-500 py-3.5 text-sm font-semibold text-white hover:bg-teal-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Approved
                </button>
            </div>

            {{-- Reject flow: three buttons --}}
            <div id="kyc-actions-reject" class="hidden flex-col gap-2 sm:flex-row">
                <button type="button" class="flex flex-1 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white py-3 text-sm font-semibold text-slate-800 hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Request Re-Upload
                </button>
                <button type="button" class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-red-600 py-3 text-sm font-semibold text-white hover:bg-red-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Confirm Reject
                </button>
                <button type="button" id="kyc-btn-back-approve" class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-teal-500 py-3 text-sm font-semibold text-white hover:bg-teal-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Approve
                </button>
            </div>
        </div>
    </div>
</div>

<div id="kyc-delete-modal" class="fixed inset-0 z-[70] hidden items-center justify-center p-4" role="dialog" aria-modal="true">
    <div class="absolute inset-0 bg-slate-900/50" data-kyc-delete-close></div>
    <div class="relative w-full max-w-sm rounded-xl bg-white p-6 shadow-xl">
        <h3 class="text-lg font-bold text-slate-900">Delete submission?</h3>
        <p class="mt-2 text-sm text-slate-600">Remove KYC record for <span id="kyc-delete-name" class="font-semibold"></span>. This cannot be undone.</p>
        <div class="mt-6 flex gap-2">
            <button type="button" class="flex-1 rounded-lg border border-slate-200 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50" data-kyc-delete-close>Cancel</button>
            <button type="button" class="flex-1 rounded-lg bg-red-600 py-2.5 text-sm font-semibold text-white hover:bg-red-700" data-kyc-delete-close>Delete</button>
        </div>
    </div>
</div>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var modal = document.getElementById('kyc-modal');
    var title = document.getElementById('kyc-modal-title');
    var docMain = document.getElementById('kyc-doc-main');
    var zoom = 1;

    var panels = {
        rejectRemarks: document.getElementById('kyc-panel-reject-remarks'),
        documents: document.getElementById('kyc-panel-documents'),
        approvalNote: document.getElementById('kyc-panel-approval-note'),
    };
    var actions = {
        approved: document.getElementById('kyc-actions-approved'),
        review: document.getElementById('kyc-actions-review'),
        reject: document.getElementById('kyc-actions-reject'),
    };

    var statusBadgeMap = {
        Approved: { text: 'Verified', class: 'inline-flex rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700' },
        Pending: { text: 'Pending', class: 'inline-flex rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-semibold text-amber-700' },
        Rejected: { text: 'Rejected', class: 'inline-flex rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-semibold text-red-700' },
        'Re-upload': { text: 'On-Hold', class: 'inline-flex rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-semibold text-amber-800' },
    };

    function setZoom(scale) {
        zoom = Math.min(2, Math.max(0.75, scale));
        docMain.style.transform = 'scale(' + zoom + ')';
    }

    function setMode(mode) {
        panels.rejectRemarks.classList.toggle('hidden', mode !== 'reject');
        panels.documents.classList.toggle('hidden', mode === 'reject');
        panels.approvalNote.classList.toggle('hidden', mode === 'reject');

        actions.approved.classList.toggle('hidden', mode !== 'approved');
        actions.review.classList.toggle('hidden', mode !== 'review');
        actions.reject.classList.toggle('hidden', mode !== 'reject');

        if (mode === 'review') {
            actions.review.classList.remove('hidden');
            actions.review.classList.add('grid');
        } else {
            actions.review.classList.remove('grid');
        }
    }

    function fillModal(data) {
        title.textContent = data.merchant;
        document.getElementById('kyc-info-company').textContent = data.company;
        document.getElementById('kyc-info-pan').textContent = data.pan;
        document.getElementById('kyc-info-doc').textContent = data.doc;
        document.getElementById('kyc-info-date').textContent = data.date;

        var badge = statusBadgeMap[data.status] || statusBadgeMap.Pending;
        var statusEl = document.getElementById('kyc-info-status');
        statusEl.textContent = data.status === 'Approved' ? 'Verified' : (data.status === 'Re-upload' ? 'On-Hold' : data.status);
        statusEl.className = badge.class;

        var note = document.getElementById('kyc-approval-note');
        if (data.status === 'Approved') {
            note.value = 'Document verified successfully. Details match submitted records.';
            note.readOnly = true;
            note.classList.add('bg-slate-50');
        } else {
            note.value = '';
            note.readOnly = false;
            note.classList.remove('bg-slate-50');
            note.placeholder = 'Add verification notes...';
        }

        setMode(data.mode);
        setZoom(1);
    }

    function openModal(data) {
        fillModal(data);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }

    document.querySelectorAll('.btn-kyc-review').forEach(function (btn) {
        btn.addEventListener('click', function () {
            openModal({
                merchant: btn.getAttribute('data-merchant'),
                company: btn.getAttribute('data-company'),
                pan: btn.getAttribute('data-pan'),
                doc: btn.getAttribute('data-doc'),
                date: btn.getAttribute('data-date'),
                status: btn.getAttribute('data-status'),
                mode: btn.getAttribute('data-modal-mode'),
            });
        });
    });

    document.querySelectorAll('[data-kyc-close]').forEach(function (el) {
        el.addEventListener('click', closeModal);
    });

    document.getElementById('kyc-btn-show-reject').addEventListener('click', function () {
        setMode('reject');
    });

    document.getElementById('kyc-btn-back-approve').addEventListener('click', function () {
        var status = document.getElementById('kyc-info-status').textContent;
        setMode(status === 'Verified' ? 'approved' : 'review');
    });

    document.querySelectorAll('.kyc-thumb').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            document.querySelectorAll('.kyc-thumb').forEach(function (t) {
                t.classList.remove('border-brand-500');
                t.classList.add('border-transparent');
            });
            thumb.classList.add('border-brand-500');
            thumb.classList.remove('border-transparent');
            docMain.src = thumb.getAttribute('data-src');
            setZoom(1);
        });
    });

    document.getElementById('kyc-zoom-in').addEventListener('click', function () { setZoom(zoom + 0.15); });
    document.getElementById('kyc-zoom-out').addEventListener('click', function () { setZoom(zoom - 0.15); });

    var deleteModal = document.getElementById('kyc-delete-modal');
    var deleteName = document.getElementById('kyc-delete-name');

    document.querySelectorAll('.btn-kyc-delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            deleteName.textContent = btn.getAttribute('data-merchant');
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
        });
    });

    document.querySelectorAll('[data-kyc-delete-close]').forEach(function (el) {
        el.addEventListener('click', function () {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('flex');
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });
})();
</script>
@endpush
@endsection
