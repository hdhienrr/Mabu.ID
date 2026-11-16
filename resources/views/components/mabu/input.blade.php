@props([
    'label',
    'name',
    'type' => 'text',
    'value' => null,
    'options' => [],
    'required' => false,
    'hint' => null,
])

@php
    // Nama berbentuk array, misalnya experiences[0][position], dibaca Laravel sebagai experiences.0.position.
    $kunci = str_replace(['[', ']'], ['.', ''], $name);
    $id = str_replace('.', '_', $kunci);
    $nilai = old($kunci, $value);
    $terkunci = $attributes->has('readonly');

    $atribut = $attributes->class([
        'w-full rounded-xl border px-3.5 py-2 font-body-md text-body-md',
        'focus:outline-none focus:border-primary',
        'disabled:bg-surface-container disabled:text-on-surface-variant disabled:cursor-not-allowed',
        $terkunci ? 'bg-surface-container text-on-surface-variant cursor-not-allowed' : 'bg-surface text-on-surface',
        $errors->has($kunci) ? 'border-error' : 'border-outline-variant',
    ]);
@endphp

<div>
    <label for="{{ $id }}" class="font-label-md text-label-md text-on-surface block mb-1">
        {{ $label }}
        @if ($required)
            <span class="text-error">*</span>
        @endif
    </label>

    @if ($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" @required($required) {{ $atribut }}>
            <option value="" disabled @selected(blank($nilai))>Pilih {{ strtolower($label) }}</option>
            @foreach ($options as $pilihan => $teks)
                <option value="{{ $pilihan }}" @selected((string) $nilai === (string) $pilihan)>{{ $teks }}</option>
            @endforeach
        </select>
    @elseif ($type === 'textarea')
        <textarea id="{{ $id }}" name="{{ $name }}" @required($required) {{ $atribut->merge(['rows' => 4]) }}>{{ $nilai }}</textarea>
    @else
        <input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" value="{{ $nilai }}" @required($required) {{ $atribut }}>
    @endif

    @if ($hint)
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">{{ $hint }}</p>
    @endif

    @error($kunci)
        <p class="font-body-sm text-body-sm text-error mt-1">{{ $message }}</p>
    @enderror
</div>