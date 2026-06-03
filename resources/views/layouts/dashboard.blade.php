<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') — Jigropay</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
                    colors: {
                        brand: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        },
                    },
                },
            },
        };
    </script>
    <style>
        html.sidebar-collapsed #sidebar { width: 5rem; }
        html.sidebar-collapsed #sidebar .sidebar-label,
        html.sidebar-collapsed #sidebar .sidebar-logo-text,
        html.sidebar-collapsed #sidebar .sidebar-section-title,
        html.sidebar-collapsed #sidebar .sidebar-badge { display: none; }
        html.sidebar-collapsed #sidebar .sidebar-nav-item { justify-content: center; padding-left: 0; padding-right: 0; }
        html.sidebar-collapsed #sidebar .sidebar-collapse-icon { transform: rotate(180deg); }
        @media (min-width: 1024px) {
            html.sidebar-collapsed #main-content { margin-left: 5rem; }
            #main-content { margin-left: 16rem; transition: margin-left 0.2s ease; }
        }
        #sidebar { transition: width 0.2s ease; }
    </style>
    @stack('head')
</head>
<body class="h-full bg-slate-50 font-sans text-slate-800 antialiased">
    <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-slate-900/50 lg:hidden" aria-hidden="true"></div>

    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col border-r border-slate-200 bg-white transition-transform duration-200 lg:translate-x-0">
        <div class="flex h-16 shrink-0 items-center justify-between gap-2 border-b border-slate-100 px-4">
            <a href="{{ route('dashboard') }}" class="flex min-w-0 items-center gap-2">
<img src={{asset("logo.png")}} alt="B Mnemonic Logo" class="h-8 w-auto">
            <span class="sidebar-logo-text truncate text-lg font-bold text-brand-700">Jigropay</span>
            </a>
            <button type="button" id="mobile-menu-close" class="rounded-lg p-1.5 text-slate-500 hover:bg-slate-100 lg:hidden" aria-label="Close menu">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4">
            @php
                $nav = [
                    ['label' => 'Dashboard', 'route' => 'dashboard', 'match' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                     ['label' => 'Users & Hierarchy', 'route' => 'users.index', 'match' => 'users.*', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                    ['label' => 'KYC Management', 'route' => 'kyc.operations', 'match' => 'kyc.*', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
             
                    ['label' => 'Wallet Management', 'route' => 'wallet.index', 'match' => 'wallet.*', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
                    ['label' => 'BBPS Services', 'route' => 'bbps.index', 'match' => 'bbps.*', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ['label' => 'Transactions', 'route' => 'transactions.index', 'match' => 'transactions.*', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['label' => 'Commission & Earnings', 'route' => 'commission.index', 'match' => 'commission.*', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['label' => 'Reports & Analytics', 'route' => 'reports.index', 'match' => 'reports.*', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ['label' => 'Disputes & Reversals', 'route' => 'disputes.index', 'match' => 'disputes.*', 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
                    ['label' => 'Settlement & Payouts', 'route' => 'settlement.index', 'match' => 'settlement.*', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
                    ['label' => 'Notifications', 'route' => 'notifications.index', 'match' => 'notifications.*', 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
                    ['label' => 'Offer & Refund Master', 'route' => 'masters.offers', 'match' => 'masters.offers*', 'icon' => 'M7 7h.01M7 3h5c.512 0 .896.227 1.127.48l3.874 3.874c.253.231.48.615.48 1.127v8.5a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z'],
                    ['label' => 'Commission Master', 'route' => 'masters.commission', 'match' => 'masters.commission*', 'icon' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z'],
                    ['label' => 'Audit Logs', 'route' => 'masters.audit', 'match' => 'masters.audit', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['label' => 'Settings', 'route' => 'settings.index', 'match' => 'settings.*', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                      ];
            @endphp
            <ul class="space-y-0.5">
                @foreach ($nav as $item)
                    @php $active = $item['match'] && request()->routeIs($item['match']); @endphp
                    <li>
                        <a href="{{ route($item['route']) }}" class="sidebar-nav-item flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition {{ $active ? 'bg-brand-600 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                            <span class="sidebar-label">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="border-t border-slate-100 p-3">
            <div class="sidebar-nav-item flex items-center gap-3 rounded-lg px-2 py-2">
                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-brand-100 text-xs font-bold text-brand-700">JD</span>
                <div class="sidebar-label min-w-0">
                    <p class="truncate text-sm font-semibold text-slate-900">Admin User</p>
                    <p class="truncate text-xs text-slate-500">SUPERADMIN</p>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-100 p-3">
            <button type="button" id="sidebar-collapse" class="sidebar-nav-item flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 max-lg:hidden" aria-label="Collapse sidebar">
                <svg class="sidebar-collapse-icon h-5 w-5 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
                <span class="sidebar-label">Collapse</span>
            </button>
        </div>
    </aside>

    <div id="main-content" class="min-h-full lg:ml-64">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        (function () {
            var root = document.documentElement;
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebar-overlay');
            var collapseBtn = document.getElementById('sidebar-collapse');
            var mobileOpen = document.getElementById('mobile-menu-open');
            var mobileClose = document.getElementById('mobile-menu-close');
            var KEY = 'jigro-sidebar-collapsed';

            function isDesktop() { return window.matchMedia('(min-width: 1024px)').matches; }

            function setCollapsed(c) {
                root.classList.toggle('sidebar-collapsed', c);
                try { localStorage.setItem(KEY, c ? '1' : '0'); } catch (e) {}
            }

            if (localStorage.getItem(KEY) === '1' && isDesktop()) setCollapsed(true);

            collapseBtn && collapseBtn.addEventListener('click', function () {
                setCollapsed(!root.classList.contains('sidebar-collapsed'));
            });

            function openMobile() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
            function closeMobile() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            mobileOpen && mobileOpen.addEventListener('click', openMobile);
            mobileClose && mobileClose.addEventListener('click', closeMobile);
            overlay && overlay.addEventListener('click', closeMobile);
            window.addEventListener('resize', function () { if (isDesktop()) closeMobile(); });

            var notifBtn = document.getElementById('notification-btn');
            var notifDropdown = document.getElementById('notification-dropdown');
            if (notifBtn && notifDropdown) {
                notifBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    notifDropdown.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!notifDropdown.contains(e.target) && !notifBtn.contains(e.target)) {
                        notifDropdown.classList.add('hidden');
                    }
                });
            }

            var overview = document.getElementById('chart-overview');
            if (overview && typeof Chart !== 'undefined') {
                new Chart(overview, {
                    type: 'line',
                    data: {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                        datasets: [
                            { label: 'Collection (₹)', data: [42000, 58000, 45000, 72000, 68000, 55000, 78000], borderColor: '#7c3aed', backgroundColor: 'rgba(124,58,237,0.12)', fill: true, tension: 0.4, yAxisID: 'y' },
                            { label: 'Transactions', data: [120, 180, 140, 220, 200, 165, 240], borderColor: '#f97316', backgroundColor: 'transparent', borderDash: [4, 4], tension: 0.4, yAxisID: 'y1' }
                        ]
                    },
                    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { x: { grid: { display: false } }, y: { grid: { color: '#f1f5f9' } }, y1: { position: 'right', grid: { drawOnChartArea: false } } } }
                });
            }

            var roles = document.getElementById('chart-roles');
            if (roles && typeof Chart !== 'undefined') {
                new Chart(roles, {
                    type: 'doughnut',
                    data: {
                        labels: ['Super Distributor', 'Distributor', 'Retailer', 'Admin'],
                        datasets: [{ data: [4200, 6800, 7200, 556], backgroundColor: ['#7c3aed', '#a78bfa', '#c4b5fd', '#ddd6fe'], borderWidth: 0 }]
                    },
                    options: { responsive: true, maintainAspectRatio: false, cutout: '72%', plugins: { legend: { display: false } } }
                });
            }
        })();
    </script>
    @stack('scripts')
</body>
</html>
