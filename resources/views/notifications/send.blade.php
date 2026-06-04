@extends('layouts.dashboard')

@section('title', 'Send Notification')

@section('content')
@include('partials.topbar')

<main class="p-4 sm:p-6">
    <nav class="mb-2 text-sm text-slate-500">
        <a href="{{ route('notifications.index') }}" class="hover:text-brand-600">Notifications</a>
        <span class="mx-1">›</span>
        <span class="text-brand-600">Send</span>
    </nav>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Send Notification</h1>
        <p class="mt-1 text-slate-500">Compose and send to merchants or users.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6 xl:col-span-2">
            <form class="space-y-6">
                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-400">Audience</label>
                    <select class="w-full appearance-none rounded-lg border border-slate-200 px-4 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                        <option>All Active Users</option>
                        <option>All Super Distributors</option>
                        <option>All Distributors</option>
                        <option>All Retailers</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-400">Channel</label>
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border-2 border-brand-600 bg-brand-50/50 p-4">
                            <input type="checkbox" checked class="rounded border-brand-600 text-brand-600 focus:ring-brand-500">
                            <span class="text-xl">🔔</span>
                            <span class="font-semibold text-slate-900">Push</span>
                        </label>
                      
                    </div>
                </div>

                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-400">Title</label>
                    <input type="text" value="Important update from JigroPay" id="notif-title" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
                </div>

                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-400">Message</label>
                    <textarea rows="5" id="notif-message" placeholder="Type your message..." class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"></textarea>
                </div>

                <div class="flex flex-col-reverse justify-end gap-3 border-t border-slate-100 pt-6 sm:flex-row">
                    <button type="button" class="rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Save Draft</button>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-brand-600 to-fuchsia-500 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-95">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Send Now
                    </button>
                </div>
            </form>
        </div>

        <div class="rounded-xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-400">Preview</p>
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <div class="flex gap-3">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-600 text-sm font-bold text-white">J</span>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-slate-500">JigroPay · now</p>
                        <p id="preview-title" class="mt-1 font-semibold text-slate-900">Important update from JigroPay</p>
                        <p id="preview-message" class="mt-1 text-sm text-slate-600">Your notification message preview will appear here.</p>
                    </div>
                </div>
            </div>
            <p class="mt-4 text-center text-xs text-slate-500">Estimated delivery: ~2,914 recipients</p>
        </div>
    </div>
</main>

@include('partials.admin-footer')

@push('scripts')
<script>
(function () {
    var title = document.getElementById('notif-title');
    var message = document.getElementById('notif-message');
    var previewTitle = document.getElementById('preview-title');
    var previewMessage = document.getElementById('preview-message');
    function update() {
        if (previewTitle && title) previewTitle.textContent = title.value || 'Notification title';
        if (previewMessage && message) previewMessage.textContent = message.value || 'Your notification message preview will appear here.';
    }
    title && title.addEventListener('input', update);
    message && message.addEventListener('input', update);
})();
</script>
@endpush
@endsection
