@extends('layouts.dashboard')

@section('title', 'User & Hierarchy')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">User & Hierarchy</h1>
            <p class="mt-1 text-slate-500">Manage platform roles, network hierarchy, and organizational structure.</p>
        </div>
        <a href="{{ route('users.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New User
        </a>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm xl:col-span-2">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="font-semibold text-slate-900">Network Architecture</h2>
                <button type="button" class="rounded-lg border border-slate-200 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-600">Level View</button>
            </div>
            <div class="flex flex-col items-stretch justify-between gap-4 sm:flex-row sm:items-center">
                @php
                    $levels = [
                        ['name' => 'Admin', 'sub' => 'Top Tier', 'active' => true],
                        ['name' => 'Super Distr.', 'sub' => '12 Partners', 'active' => false],
                        ['name' => 'Distributor', 'sub' => '145 Nodes', 'active' => false],
                        ['name' => 'Retailer', 'sub' => '2,490 Points', 'active' => false],
                    ];
                @endphp
                @foreach ($levels as $i => $level)
                    <div class="flex flex-1 flex-col items-center gap-3 sm:flex-row">
                        <div class="flex flex-col items-center text-center">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl {{ $level['active'] ? 'bg-brand-600 text-white' : 'bg-slate-100 text-slate-400' }}">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <p class="mt-2 text-sm font-semibold text-slate-900">{{ $level['name'] }}</p>
                            <p class="text-xs text-slate-500">{{ $level['sub'] }}</p>
                        </div>
                        @if ($i < count($levels) - 1)
                            <div class="hidden flex-1 border-t-2 border-dashed border-slate-200 sm:block"></div>
                            <div class="h-8 w-px bg-slate-200 sm:hidden"></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="space-y-4">
            <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-brand-600 via-fuchsia-600 to-brand-700 p-6 text-white shadow-lg">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-white/10"></div>
                <p class="text-sm font-medium opacity-90">Total Users</p>
                <p class="mt-2 text-4xl font-bold">2,647</p>
                <span class="mt-3 inline-flex rounded-full bg-white/20 px-2.5 py-0.5 text-xs font-semibold">+12% this month</span>
            </div>
            <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Active Sessions</p>
                <div class="mt-3 flex items-center justify-between">
                    <div class="flex -space-x-2">
                        @foreach (['AK', 'JS', 'RL'] as $init)
                            <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-white bg-brand-100 text-xs font-bold text-brand-700">{{ $init }}</span>
                        @endforeach
                        <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-white bg-slate-100 text-xs font-bold text-slate-600">+84</span>
                    </div>
                    <span class="flex items-center gap-1.5 text-sm font-medium text-emerald-600">
                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span> Live Now
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-col gap-4 border-b border-slate-100 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">
            <div class="inline-flex rounded-lg bg-slate-100 p-1">
                <button type="button" class="rounded-md bg-white px-4 py-1.5 text-sm font-semibold text-slate-900 shadow-sm">All Users</button>
                <button type="button" class="rounded-md px-4 py-1.5 text-sm font-medium text-slate-600 hover:text-slate-900">Distributors</button>
                <button type="button" class="rounded-md px-4 py-1.5 text-sm font-medium text-slate-600 hover:text-slate-900">Retailers</button>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <p class="text-sm text-slate-500">Displaying <span class="font-medium text-slate-700">1-10</span> of <span class="font-medium text-slate-700">2,647</span></p>
                <div class="flex gap-1">
                    <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500 hover:bg-slate-50" aria-label="Previous page">&lsaquo;</button>
                    <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500 hover:bg-slate-50" aria-label="Next page">&rsaquo;</button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">User Information</th>
                        <th class="px-5 py-3">Role</th>
                        <th class="px-5 py-3">Parent User</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $users = [
                            ['id' => 'jp89023', 'init' => 'RS', 'name' => 'Rahul Sharma', 'uid' => 'JP89023', 'role' => 'SUPER DISTRIBUTOR', 'roleClass' => 'bg-brand-100 text-brand-700', 'parent' => 'Admin HQ', 'status' => 'Active', 'statusClass' => 'text-emerald-600', 'dot' => 'bg-emerald-500'],
                            ['id' => 'jp89024', 'init' => 'PP', 'name' => 'Priya Patel', 'uid' => 'JP89024', 'role' => 'DISTRIBUTOR', 'roleClass' => 'bg-slate-100 text-slate-600', 'parent' => 'Rahul Sharma', 'status' => 'Active', 'statusClass' => 'text-emerald-600', 'dot' => 'bg-emerald-500'],
                            ['id' => 'jp89025', 'init' => 'AK', 'name' => 'Amit Kumar', 'uid' => 'JP89025', 'role' => 'RETAILER', 'roleClass' => 'bg-slate-100 text-slate-600', 'parent' => 'Priya Patel', 'status' => 'Suspended', 'statusClass' => 'text-red-600', 'dot' => 'bg-red-500'],
                            ['id' => 'jp89026', 'init' => 'SR', 'name' => 'Sneha Reddy', 'uid' => 'JP89026', 'role' => 'RETAILER', 'roleClass' => 'bg-slate-100 text-slate-600', 'parent' => 'Priya Patel', 'status' => 'Pending KYC', 'statusClass' => 'text-amber-600', 'dot' => 'bg-amber-500'],
                        ];
                    @endphp
                    @foreach ($users as $user)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4">
                                <a href="{{ route('users.show', $user['id']) }}" class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-100 text-sm font-bold text-brand-700">{{ $user['init'] }}</span>
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $user['name'] }}</p>
                                        <p class="text-xs text-slate-500">UID: #{{ $user['uid'] }}</p>
                                    </div>
                                </a>
                            </td>
                            <td class="px-5 py-4"><span class="inline-flex rounded-full px-2.5 py-0.5 text-[10px] font-bold tracking-wide {{ $user['roleClass'] }}">{{ $user['role'] }}</span></td>
                            <td class="px-5 py-4 text-slate-700">{{ $user['parent'] }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-1.5 text-sm font-medium {{ $user['statusClass'] }}">
                                    <span class="h-2 w-2 rounded-full {{ $user['dot'] }}"></span>{{ $user['status'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('users.show', $user['id']) }}" class="rounded-lg p-1.5 text-brand-600 hover:bg-brand-50" title="View" aria-label="View {{ $user['name'] }}">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('users.edit', $user['id']) }}" class="rounded-lg p-1.5 text-sky-600 hover:bg-sky-50" title="Edit" aria-label="Edit {{ $user['name'] }}">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <button type="button" class="btn-delete-user rounded-lg p-1.5 text-red-600 hover:bg-red-50" title="Delete" aria-label="Delete {{ $user['name'] }}" data-user-name="{{ $user['name'] }}" data-user-uid="{{ $user['uid'] }}">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<div id="delete-user-modal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="delete-modal-title">
    <div class="absolute inset-0 bg-slate-900/50" data-close-delete-modal></div>
    <div class="relative w-full max-w-md rounded-xl border border-slate-100 bg-white p-6 shadow-xl">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <h2 id="delete-modal-title" class="mt-4 text-center text-lg font-bold text-slate-900">Delete user?</h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            You are about to remove <span id="delete-user-label" class="font-semibold text-slate-900"></span>
            (<span id="delete-user-uid" class="font-mono text-slate-700"></span>). This action cannot be undone.
        </p>
        <div class="mt-6 flex flex-col-reverse gap-2 sm:flex-row sm:justify-center">
            <button type="button" class="rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50" data-close-delete-modal>Cancel</button>
            <button type="button" id="confirm-delete-user" class="rounded-lg bg-red-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-red-700">Delete User</button>
        </div>
    </div>
</div>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var modal = document.getElementById('delete-user-modal');
    var label = document.getElementById('delete-user-label');
    var uid = document.getElementById('delete-user-uid');

    function openModal(name, userUid) {
        label.textContent = name;
        uid.textContent = '#' + userUid;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.querySelectorAll('.btn-delete-user').forEach(function (btn) {
        btn.addEventListener('click', function () {
            openModal(btn.getAttribute('data-user-name'), btn.getAttribute('data-user-uid'));
        });
    });

    document.querySelectorAll('[data-close-delete-modal]').forEach(function (el) {
        el.addEventListener('click', closeModal);
    });

    document.getElementById('confirm-delete-user').addEventListener('click', function () {
        closeModal();
    });
})();
</script>
@endpush
@endsection
