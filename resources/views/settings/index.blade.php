@extends('layouts.dashboard')

@section('title', 'General Settings')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">General Settings</h1>
            <p class="mt-1 text-slate-500">Manage system settings and preferences.</p>
        </div>
        <div class="flex flex-wrap gap-2">
        <a href="{{ route('settings.commissions') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Commission Settings</a>
        <button type="submit" form="settings-form" class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
            Save Changes
        </button>
        </div>
    </div>

    <form id="settings-form" class="rounded-xl border border-slate-100 bg-white shadow-sm">
        @php
            $sections = [
                ['title' => 'System Information', 'desc' => 'Manage basic system information and preferences', 'fields' => [
                    ['label' => 'System Name', 'type' => 'text', 'value' => 'JigroPay Platform'],
                    ['label' => 'Default Time Zone', 'type' => 'select', 'value' => '(GMT+05:30) Asia/Kolkata'],
                ]],
                ['title' => 'Date & Time Settings', 'desc' => 'Configure date format and time related preferences.', 'fields' => [
                    ['label' => 'Date Format', 'type' => 'text', 'value' => 'DD/MM/YYYY'],
                    ['label' => 'Time Format', 'type' => 'select', 'value' => '12 Hours (AM/PM)'],
                ]],
                ['title' => 'Session Settings', 'desc' => 'Manage user session and login related preferences', 'fields' => [
                    ['label' => 'Session Time out', 'type' => 'select', 'value' => '30 minutes'],
                    ['label' => 'Max login Attempts', 'type' => 'select', 'value' => '5 Attempts'],
                ]],
                ['title' => 'Default Status Settings', 'desc' => 'Set default status for new merchants and requests.', 'fields' => [
                    ['label' => 'New Merchant Status', 'type' => 'select', 'value' => 'Pending'],
                    ['label' => 'New Request Status', 'type' => 'select', 'value' => 'Pending'],
                ]],
                ['title' => 'Feature Settings', 'desc' => 'Enable or disable features in the system.', 'fields' => [
                    ['label' => 'Enable Two Factor Authentication', 'type' => 'toggle', 'checked' => true],
                    ['label' => 'Allow Merchant self Registration', 'type' => 'toggle', 'checked' => true],
                ]],
                ['title' => 'File Upload Settings', 'desc' => 'Configure file upload size and type restrictions.', 'fields' => [
                    ['label' => 'Max File Size', 'type' => 'select', 'value' => '10 MB'],
                    ['label' => 'Allowed File Types', 'type' => 'select', 'value' => 'jpg, jpeg, png, pdf, doc, docx'],
                ]],
                ['title' => 'Pagination Settings', 'desc' => 'Set default pagination preferences for listing pages.', 'fields' => [
                    ['label' => 'Default Page Size', 'type' => 'select', 'value' => '10'],
                    ['label' => 'Max Page Size', 'type' => 'select', 'value' => '100'],
                ]],
                ['title' => 'Maintenance Mode', 'desc' => 'Put system into maintenance mode.', 'fields' => [
                    ['label' => 'Maintenance Mode', 'type' => 'toggle', 'checked' => false],
                    ['label' => 'Maintenance Message', 'type' => 'text', 'value' => 'System is under maintenance.'],
                ]],
                ['title' => 'Other Settings', 'desc' => 'Other miscellaneous system settings.', 'fields' => [
                    ['label' => 'Auto log out on inactivity', 'type' => 'select', 'value' => '15 minutes'],
                    ['label' => 'Enable Captcha', 'type' => 'toggle', 'checked' => true],
                ]],
            ];
        @endphp

        @foreach ($sections as $section)
            <div class="border-b border-slate-100 p-5 last:border-0 sm:p-6">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
                    <div class="lg:col-span-4">
                        <h2 class="font-semibold text-slate-900">{{ $section['title'] }}</h2>
                        <p class="mt-1 text-sm text-slate-500">{{ $section['desc'] }}</p>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:col-span-8">
                        @foreach ($section['fields'] as $field)
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">{{ $field['label'] }}</label>
                                @if (($field['type'] ?? '') === 'toggle')
                                    <label class="relative inline-flex cursor-pointer items-center">
                                        <input type="checkbox" class="peer sr-only" {{ !empty($field['checked']) ? 'checked' : '' }}>
                                        <span class="h-6 w-11 rounded-full bg-slate-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-slate-300 after:bg-white after:transition-all peer-checked:bg-brand-600 peer-checked:after:translate-x-full peer-checked:after:border-white"></span>
                                    </label>
                                @elseif (($field['type'] ?? '') === 'select')
                                    <select class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm">
                                        <option>{{ $field['value'] ?? '' }}</option>
                                    </select>
                                @else
                                    <input type="text" value="{{ $field['value'] ?? '' }}" class="w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </form>
</main>

@include('partials.admin-footer')
@endsection
