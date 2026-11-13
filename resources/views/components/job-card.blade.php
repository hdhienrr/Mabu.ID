@props([
    'badge',
    'badgeStyle' => 'default', // default, cyan, purple
    'salary',
    'title',
    'company',
    'description',
    'locationInfo'
])

@php
    $badgeClasses = match ($badgeStyle) {
        'cyan' => 'bg-cyan-50 text-cyan-700 border-cyan-200 dark:bg-cyan-950/40 dark:text-cyan-300 dark:border-cyan-800',
        'purple' => 'bg-purple-50 text-purple-700 border-purple-200 dark:bg-purple-950/40 dark:text-purple-300 dark:border-purple-800',
        default => '',
    };
@endphp

<article
    class="p-6 rounded-xl border flex flex-col justify-between transition-all duration-200 hover:-translate-y-1 theme-card group"
    style="border-radius: 12px;">
    <div>
        <div class="flex items-start justify-between">
            <span class="px-2.5 py-1 text-[11px] font-semibold rounded-md border {{ $badgeClasses }}"
                @if($badgeStyle === 'default')
                    style="background-color: var(--accent-soft); border-color: var(--accent-soft-border); color: var(--accent);"
                @endif>
                {{ $badge }}
            </span>
            <span class="text-xs font-bold" style="color: var(--accent);">{{ $salary }}</span>
        </div>
        <h3 class="text-base font-bold mt-4 group-hover:text-blue-600 transition-colors" style="color: var(--text);">
            {{ $title }}</h3>
        <p class="text-xs font-medium mt-1" style="color: var(--text-muted);">{{ $company }}</p>
        <p class="text-xs mt-3 leading-relaxed" style="color: var(--text-muted);">
            {{ $description }}
        </p>
    </div>
    <div class="mt-6 pt-4 border-t flex items-center justify-between" style="border-color: var(--border);">
        <span class="text-[11px] flex items-center gap-1" style="color: var(--text-faint);">
            {{ $locationInfo }}
        </span>
        <button class="px-4 py-1.5 text-xs font-semibold rounded-lg shadow-sm hover:opacity-90 transition-all"
            style="background-color: var(--accent); color: var(--accent-contrast);">
            Lamar Cepat
        </button>
    </div>
</article>