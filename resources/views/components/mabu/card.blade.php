@props(['title', 'description' => null, 'icon' => null])

<section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 space-y-4">
    <div class="flex items-center justify-between gap-3 pb-3 border-b border-slate-100">
        <div>
            <h2 class="font-heading text-base font-bold text-ink">{{ $title }}</h2>
            @if ($description)
                <p class="text-xs text-muted">{{ $description }}</p>
            @endif
        </div>

        @if ($icon)
            <span class="w-9 h-9 rounded-full bg-primary-light text-primary flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-[18px]">{{ $icon }}</span>
            </span>
        @endif
    </div>

    {{ $slot }}
</section>
