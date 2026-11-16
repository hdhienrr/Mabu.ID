@props(['title', 'description' => null, 'icon' => null])

<section class="bg-surface-container-lowest rounded-3xl border border-outline-variant/40 p-5 sm:p-6 shadow-sm space-y-5">
    <div class="flex items-center gap-3 border-b border-outline-variant/30 pb-4">
        @if ($icon)
            <div class="w-10 h-10 rounded-xl bg-primary-fixed text-primary flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-[22px]">{{ $icon }}</span>
            </div>
        @endif

        <div>
            <h2 class="font-headline-sm text-headline-sm text-on-surface">{{ $title }}</h2>
            @if ($description)
                <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $description }}</p>
            @endif
        </div>
    </div>

    {{ $slot }}
</section>