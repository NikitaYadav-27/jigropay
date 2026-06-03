<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="flex flex-wrap items-center gap-3 px-4 py-3 sm:px-6">
        <button type="button" id="mobile-menu-open" class="rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50 lg:hidden" aria-label="Open menu">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <div class="relative min-w-0 flex-1 sm:max-w-md">
            <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="search" placeholder="Search Txn ID, User or Phone..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-2 pl-10 pr-4 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20">
        </div>
        <div class="ml-auto flex flex-wrap items-center gap-2 sm:gap-4">
            <div class="hidden items-center gap-2 rounded-full border border-brand-200 bg-white px-3 py-1.5 text-sm sm:flex">
                <svg class="h-4 w-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                <span class="text-slate-500">Wallet Balance:</span>
                <span class="font-semibold text-brand-700">₹1,25,430.50</span>
            </div>
            <div class="relative" id="notification-container">
                <button type="button" id="notification-btn" class="relative rounded-lg p-2 text-slate-500 hover:bg-slate-100" aria-label="Notifications">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-red-500"></span>
                </button>
                <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-80 origin-top-right rounded-xl border border-slate-100 bg-white shadow-xl ring-1 ring-black/5 focus:outline-none z-50">
                    <div class="flex items-center justify-between border-b border-slate-100 px-4 py-3">
                        <h3 class="text-sm font-semibold text-slate-900">Notifications</h3>
                        <span class="rounded-full bg-brand-50 px-2.5 py-0.5 text-xs font-medium text-brand-700">3 new</span>
                    </div>
                    <div class="max-h-[320px] overflow-y-auto overscroll-contain">
                        <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-slate-50 transition-colors">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">Wallet credited</p>
                                <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">Your wallet was credited with ₹5,000</p>
                                <p class="text-[10px] text-slate-400 mt-1">2 mins ago</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-slate-50 transition-colors">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">System update</p>
                                <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">BBPS services will be down for maintenance.</p>
                                <p class="text-[10px] text-slate-400 mt-1">1 hour ago</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-slate-50 transition-colors">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">Dispute opened</p>
                                <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">A dispute was opened for transaction #TXN981.</p>
                                <p class="text-[10px] text-slate-400 mt-1">Yesterday</p>
                            </div>
                        </a>
                    </div>
                    <div class="border-t border-slate-100 p-2">
                        <a href="{{ route('notifications.index') ?? '#' }}" class="flex w-full items-center justify-center gap-1.5 rounded-lg px-4 py-2 text-sm font-medium text-brand-600 hover:bg-brand-50 hover:text-brand-700 transition-colors">
                            <span>View all notifications</span>
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="relative group cursor-pointer">
                <div class="flex items-center gap-2 rounded-lg border border-slate-100 px-2 py-1 transition hover:bg-slate-50">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::check() ? urlencode(Auth::user()->name) : 'User' }}&background=7c3aed&color=fff" alt="" class="h-9 w-9 rounded-full">
                    <div class="hidden text-left sm:block">
                        <p class="text-sm font-semibold leading-tight">{{ Auth::user()->name ?? 'User' }}</p>
                        <p class="text-xs text-slate-500">{{ Auth::user()->email ?? 'user@example.com' }}</p>
                    </div>
                    <svg class="hidden h-4 w-4 text-slate-400 sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
                
                <div class="absolute right-0 mt-1 hidden w-48 origin-top-right rounded-xl border border-slate-100 bg-white shadow-lg ring-1 ring-black/5 group-hover:block z-50">
                    <div class="py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden items-center gap-1 border-l border-slate-200 pl-4 xl:flex">
                <img src="{{asset("BharatConnectPrimaryLogo.png")}}" alt="Bharat Connect Logo" class="h-8 w-auto">
            </div>
        </div>
    </div>
</header>
