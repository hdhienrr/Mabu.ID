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
        'w-full rounded-xl border px-3.5 py-2.5 text-xs transition outline-none',
        'placeholder:text-slate-400 focus:border-primary focus:ring-0',
        'disabled:bg-slate-100 disabled:text-muted disabled:cursor-not-allowed',
        $terkunci ? 'bg-slate-100 text-muted cursor-not-allowed' : 'bg-slate-50 text-ink focus:bg-white',
        $errors->has($kunci) ? 'border-red-500' : 'border-slate-200',
    ]);
@endphp

<div>
    <label for="{{ $id }}" class="block text-xs font-bold text-ink mb-1.5">
        {{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    @if ($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" @required($required) {{ $atribut->merge(['class' => 'pr-10']) }}>
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
        <p class="text-xs text-muted mt-1">{{ $hint }}</p>
    @endif

    @error($kunci)
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
