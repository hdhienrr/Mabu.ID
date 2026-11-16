{{-- Satu blok pengalaman. $index berupa angka, atau __INDEX__ untuk cetakan blok baru. --}}
@php
    $awalan = "experiences[{$index}]";
    $masihBekerja = (bool) ($experience['is_current'] ?? false);
@endphp

<div data-experience-item class="p-4 rounded-2xl border border-slate-200 space-y-4">
    <div class="flex items-center justify-between">
        <h3 class="text-sm font-bold text-ink">Pengalaman</h3>
        <button type="button" data-experience-remove
            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold text-red-600 hover:bg-red-50 transition-colors">
            <span class="material-symbols-outlined text-[16px]">delete</span>
            <span>Hapus</span>
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-mabu.input label="Posisi" :name="$awalan.'[position]'" :value="$experience['position'] ?? null"
            placeholder="Contoh: Barista" maxlength="100" required />
        <x-mabu.input label="Tempat Kerja / Usaha" :name="$awalan.'[company]'" :value="$experience['company'] ?? null"
            placeholder="Contoh: Warkop Mbois Manyar" maxlength="100" required />

        <x-mabu.input label="Jenis Pekerjaan" type="select" :name="$awalan.'[type]'" :value="$experience['type'] ?? null"
            :options="$jenisPekerjaan" required />
        <label class="flex items-center gap-2 sm:pt-6 text-xs font-medium text-ink cursor-pointer">
            <input type="checkbox" name="{{ $awalan }}[is_current]" value="1" data-experience-current
                @checked($masihBekerja) class="w-4 h-4 rounded border-slate-300 text-primary focus:ring-primary/30">
            <span>Masih bekerja di sini</span>
        </label>

        <x-mabu.input label="Mulai" type="month" :name="$awalan.'[start_date]'" :value="$experience['start_date'] ?? null"
            data-experience-start required />
        <x-mabu.input label="Selesai" type="month" :name="$awalan.'[end_date]'" :value="$experience['end_date'] ?? null"
            :min="$experience['start_date'] ?? null" :disabled="$masihBekerja" data-experience-end />

        <div class="sm:col-span-2">
            <x-mabu.input label="Deskripsi Tugas" type="textarea" :name="$awalan.'[description]'"
                :value="$experience['description'] ?? null" rows="3" maxlength="500"
                placeholder="Ceritakan singkat apa yang kamu kerjakan." />
        </div>
    </div>
</div>
