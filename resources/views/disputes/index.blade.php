@extends('layouts.dashboard')

@section('title', 'Disputes & Reversals')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Disputes & Reversals</h1>
            <p class="mt-1 text-slate-500">Manage chargebacks, refunds, and financial conflict resolutions.</p>
        </div>
        <div class="flex flex-wrap gap-2 items-center">
            <a href="{{ route('disputes.refunds') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Refund Management</a>
            <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export Report
            </button>
            <button type="button" id="open-dispute-modal" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">+ New Dispute Raise</button>
            <img src="{{ asset('BharatConnectPrimaryLogo.png') }}" alt="Bharat Connect" class="hidden sm:block h-10 w-auto object-contain ml-2">
        </div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="flex justify-between"><p class="text-sm text-slate-500">Active Disputes</p><span class="text-blue-500">⚠</span></div>
            <p class="mt-2 text-2xl font-bold">1,284</p>
            <p class="mt-1 flex items-center gap-1 text-xs font-medium text-red-600"><span class="h-1.5 w-1.5 rounded-full bg-red-500"></span> Requires urgent review</p>
        </div>
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Avg. Resolution</p>
            <p class="mt-2 text-2xl font-bold">42.5 hrs</p>
            <p class="mt-1 text-xs text-slate-500">Optimized from 46.7h last week</p>
        </div>
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Successful Reversals</p>
            <p class="mt-2 text-2xl font-bold">94.8%</p>
            <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-slate-100"><div class="h-full w-[94.8%] rounded-full bg-emerald-500"></div></div>
        </div>
        <div class="rounded-xl bg-gradient-to-br from-brand-600 to-brand-800 p-5 text-white shadow-lg">
            <p class="text-sm opacity-90">Amount Under Review</p>
            <p class="mt-2 text-2xl font-bold">₹8,42,150</p>
            <p class="mt-1 text-xs opacity-80">412 pending transactions</p>
        </div>
    </div>

    <div class="mb-4 rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
        <h2 class="mb-3 text-sm font-semibold text-slate-700">Search Complaints</h2>
        <form class="flex flex-col gap-4 md:flex-row md:items-end">
            <div class="flex-1 space-y-3 md:space-y-0 md:flex md:gap-3">
                <!-- Option 1: Mobile + Date -->
                <div class="flex-1 rounded-lg border border-slate-200 p-3 bg-slate-50/50">
                    <p class="mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wide text-center sm:text-left">Option 1: Mobile & Date</p>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input type="tel" placeholder="Mobile Number" class="w-full rounded-md border border-slate-200 px-3 py-1.5 text-sm focus:border-brand-500 focus:outline-none">
                        <input type="date" class="w-full rounded-md border border-slate-200 px-3 py-1.5 text-sm focus:border-brand-500 focus:outline-none">
                    </div>
                </div>
                
                <!-- Option 2: Txn Ref ID -->
                <div class="flex-1 rounded-lg border border-slate-200 p-3 bg-slate-50/50">
                    <p class="mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wide text-center sm:text-left">Option 2: Reference ID</p>
                    <input type="text" placeholder="Transaction Reference ID" class="w-full rounded-md border border-slate-200 px-3 py-1.5 text-sm focus:border-brand-500 focus:outline-none">
                </div>
            </div>
            
            <div class="flex gap-2">
                <button type="button" class="rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">Search</button>
                <button type="button" class="rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Clear</button>
            </div>
        </form>
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Dispute ID</th>
                        <th class="px-5 py-3">Transaction ID</th>
                        <th class="px-5 py-3">User Details</th>
                        <th class="px-5 py-3">Type</th>
                        <th class="px-5 py-3">Amount</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $rows = [
                            ['id' => 'DISP-11029', 'slug' => 'dsp-10235', 'txn' => 'TXN_54934525', 'name' => 'Ramesh Kumar', 'role' => 'Retailer | +91 98XXX X421', 'type' => 'Chargeback', 'amount' => '₹2,450.00', 'status' => 'Open', 'badge' => 'bg-red-100 text-red-700', 'time' => '02 Jun, 14:20'],
                            ['id' => 'DISP-11028', 'slug' => 'dsp-10234', 'txn' => 'TXN_54934520', 'name' => 'Priya Patel', 'role' => 'Distributor | +91 87XXX X992', 'type' => 'Refund Req.', 'amount' => '₹1,200.00', 'status' => 'Under Review', 'badge' => 'bg-amber-100 text-amber-800', 'time' => '02 Jun, 11:05'],
                            ['id' => 'DISP-11027', 'slug' => 'dsp-10233', 'txn' => 'TXN_54934518', 'name' => 'Amit Store', 'role' => 'Retailer | +91 91XXX X334', 'type' => 'Fraud Claim', 'amount' => '₹50,000.00', 'status' => 'Resolved', 'badge' => 'bg-emerald-100 text-emerald-700', 'time' => '01 Jun, 18:40'],
                        ];
                    @endphp
                    @foreach ($rows as $row)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4">
                                <a href="{{ route('disputes.show', $row['slug']) }}" class="font-semibold text-brand-600 hover:underline">#{{ $row['id'] }}</a>
                                <p class="text-xs text-slate-400">{{ $row['time'] }}</p>
                            </td>
                            <td class="px-5 py-4 font-medium text-slate-700">{{ $row['txn'] }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($row['name']) }}&size=32&background=ede9fe&color=6d28d9" alt="" class="h-8 w-8 rounded-full">
                                    <div><p class="font-semibold">{{ $row['name'] }}</p><p class="text-xs text-slate-500">{{ $row['role'] }}</p></div>
                                </div>
                            </td>
                            <td class="px-5 py-4"><span class="rounded-full bg-sky-100 px-2.5 py-0.5 text-xs font-semibold text-sky-800">{{ $row['type'] }}</span></td>
                            <td class="px-5 py-4 font-bold">{{ $row['amount'] }}</td>
                            <td class="px-5 py-4"><span class="rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $row['badge'] }}">{{ $row['status'] }}</span></td>
                            <td class="px-5 py-4">
                                <div class="flex gap-1">
                                    <a href="{{ route('disputes.show', $row['slug']) }}" class="rounded-lg p-1.5 text-brand-600 hover:bg-brand-50" aria-label="View"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></a>
                                    <button type="button" class="rounded-lg p-1.5 text-slate-400 hover:bg-slate-100">⋯</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-col gap-3 border-t border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-slate-500">Showing 1-10 of 1,284 disputes</p>
            <div class="flex gap-1">
                <button type="button" class="rounded-lg bg-brand-600 px-3 py-1.5 text-sm font-semibold text-white">1</button>
                <button type="button" class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm">2</button>
                <button type="button" class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm">3</button>
            </div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 lg:grid-cols-2">
        <div class="rounded-xl border border-brand-100 bg-brand-50/50 p-5">
            <h3 class="flex items-center gap-2 font-semibold text-brand-800">🧠 AI-Powered Risk Detection</h3>
            <p class="mt-2 text-sm text-slate-600">3 disputes flagged for unusual patterns. Review recommended before auto-escalation.</p>
            <div class="mt-3 flex gap-3 text-sm font-semibold">
                <a href="#" class="text-brand-600 hover:underline">View Flagged Cases →</a>
                <button type="button" class="text-slate-500">Dismiss Suggestion</button>
            </div>
        </div>
        <div class="rounded-xl border border-emerald-100 bg-emerald-50/50 p-5">
            <h3 class="font-semibold text-emerald-800">Reversal Guidelines</h3>
            <ul class="mt-3 space-y-2 text-sm text-slate-700">
                <li class="flex gap-2"><span class="text-emerald-600">✓</span> Verify source of funds before processing reversal</li>
                <li class="flex gap-2"><span class="text-emerald-600">✓</span> Ensure KYC documents are valid for the account</li>
                <li class="flex gap-2"><span class="text-emerald-600">✓</span> Standard reversal TAT is 3–5 business days</li>
            </ul>
        </div>
    </div>
</main>

<div id="dispute-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/50" id="dispute-modal-backdrop"></div>
    <div class="relative max-h-[90vh] w-full max-w-lg overflow-y-auto rounded-2xl bg-white shadow-xl">
        <div class="flex items-start justify-between border-b border-slate-100 p-5">
            <div>
                <h3 class="text-lg font-bold">Raise Dispute</h3>
                <p class="text-sm text-slate-500">Create a dispute for the selected transaction</p>
            </div>
            <button type="button" id="close-dispute-modal" class="text-slate-400 hover:text-slate-600">✕</button>
        </div>
        <form class="space-y-4 p-5">
            <div class="rounded-lg bg-slate-50 p-4">
                <p class="mb-3 text-xs font-bold uppercase text-brand-600">Transaction Information</p>
                <dl class="grid grid-cols-2 gap-2 text-sm">
                    <div><dt class="text-slate-500">Transaction ID</dt><dd class="font-semibold">TXN_1234</dd></div>
                    <div><dt class="text-slate-500">Amount</dt><dd class="font-semibold">₹50,000</dd></div>
                    <div class="col-span-2"><dt class="text-slate-500">Merchant</dt><dd class="font-semibold">Astra Payroll Services</dd></div>
                </dl>
            </div>
            <div><label class="mb-1 block text-sm font-medium">Dispute Type</label><select class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"><option>Fraud</option><option>Chargeback</option></select></div>
            <div><label class="mb-1 block text-sm font-medium">Dispute Amount</label><input type="text" value="₹50,000" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="mb-1 block text-sm font-medium">Priority</label><select class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"><option>High</option></select></div>
                <div><label class="mb-1 block text-sm font-medium">Assign to</label><select class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"><option>Risk Team</option></select></div>
            </div>
            <div><label class="mb-1 block text-sm font-medium">Dispute Reason</label><textarea rows="3" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm">Customer claims unauthorised transaction.</textarea></div>
            <div class="rounded-xl border-2 border-dashed border-slate-200 py-8 text-center text-sm text-slate-500">
                Drag & Drop Files Here Or <span class="font-semibold text-brand-600">Browse File</span><br><span class="text-xs">PDF, PNG, JPEG — Up to 10MB</span>
            </div>
            <div class="flex gap-3">
                <button type="button" id="cancel-dispute-modal" class="flex-1 rounded-lg bg-red-600 py-2.5 text-sm font-semibold text-white">Cancel</button>
                <button type="submit" class="flex-1 rounded-lg bg-brand-600 py-2.5 text-sm font-semibold text-white">Submit Dispute</button>
            </div>
        </form>
    </div>
</div>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var modal = document.getElementById('dispute-modal');
    function open() { modal.classList.remove('hidden'); modal.classList.add('flex'); document.body.classList.add('overflow-hidden'); }
    function close() { modal.classList.add('hidden'); modal.classList.remove('flex'); document.body.classList.remove('overflow-hidden'); }
    document.getElementById('open-dispute-modal')?.addEventListener('click', open);
    document.getElementById('close-dispute-modal')?.addEventListener('click', close);
    document.getElementById('cancel-dispute-modal')?.addEventListener('click', close);
    document.getElementById('dispute-modal-backdrop')?.addEventListener('click', close);
})();
</script>
@endpush
@endsection
