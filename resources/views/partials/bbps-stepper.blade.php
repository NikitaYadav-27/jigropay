@php
    $steps = [
        1 => ['label' => 'Service Selection', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
        2 => ['label' => 'Fetch Bill', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        3 => ['label' => 'Payment', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
        4 => ['label' => 'Receipt', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
    ];
    $active = $activeStep ?? 1;
@endphp
<nav class="mb-6 overflow-x-auto rounded-xl border border-slate-100 bg-white px-4 py-4 shadow-sm" aria-label="BBPS progress">
    <ol class="flex min-w-[520px] items-center justify-between">
        @foreach ($steps as $num => $step)
            @php $isActive = $num === $active; $isPast = $num < $active; @endphp
            <li class="flex flex-1 items-center {{ $loop->last ? '' : '' }}">
                <div class="flex flex-col items-center gap-1.5 text-center sm:flex-row sm:gap-2">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full {{ $isActive ? 'bg-brand-600 text-white shadow-md' : ($isPast ? 'bg-brand-100 text-brand-600' : 'bg-slate-100 text-slate-400') }}">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step['icon'] }}"/></svg>
                    </span>
                    <span class="text-xs font-semibold sm:text-sm {{ $isActive ? 'text-brand-600' : ($isPast ? 'text-brand-600' : 'text-slate-400') }}">{{ $step['label'] }}</span>
                </div>
                @if (!$loop->last)
                    <div class="mx-2 hidden h-0.5 flex-1 {{ $isPast ? 'bg-brand-300' : 'bg-slate-200' }} sm:block"></div>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
