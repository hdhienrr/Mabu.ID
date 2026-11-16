@extends('layouts.mabu')

@section('title', 'Pengalaman & Keahlian - MABU')

@section('content')
@php
    // Belum ada data tersimpan: tampilkan satu blok pengalaman kosong. Nanti diisi data asli dari backend.
    $experiences = $experiences ?? [[]];
    $skills = $skills ?? [];

    // Pilihan tetap untuk tampilan.
    $jenisPekerjaan = [
        'part_time' => 'Paruh waktu',
        'full_time' => 'Penuh waktu',
        'freelance' => 'Lepas / harian',
        'internship' => 'Magang',
        'organization' => 'Organisasi / relawan',
    ];
    $saranKeahlian = ['Desain Grafis', 'Event Crew', 'Fotografi', 'Microsoft Excel', 'Public Speaking'];

    // Tab antarbagian profil, sama dengan yang ada di halaman Profil Pengguna.
    $tabProfil = [
        'mabu.profil' => 'Ringkasan & Akun',
        'mabu.profil.data-diri' => 'Data Diri Lengkap',
        'mabu.profil.pengalaman' => 'Pengalaman & Keahlian',
    ];
@endphp

<div class="max-w-6xl mx-auto space-y-6">
    <header class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
        <div class="space-y-0.5">
            <div class="flex items-center gap-1.5 text-muted text-xs font-medium">
                <a class="hover:text-primary transition-colors" href="{{ route('mabu.dashboard') }}">Main Page</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <a class="hover:text-primary transition-colors" href="{{ route('mabu.profil') }}">Profil Pengguna</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <span class="text-ink font-semibold">Pengalaman &amp; Keahlian</span>
            </div>
            <h1 class="font-heading text-2xl font-extrabold text-ink tracking-tight">Pengalaman &amp; Keahlian</h1>
            <p class="text-xs text-muted">
                Ceritakan pengalaman dan kemampuanmu supaya rekomendasi lowongan lebih tepat.
            </p>
        </div>

        <nav class="flex flex-wrap items-center gap-2 pt-3 border-t border-slate-100" aria-label="Bagian profil">
            @foreach ($tabProfil as $namaRoute => $label)
                <a href="{{ route($namaRoute) }}" @class([
                    'px-3.5 py-1.5 rounded-xl text-xs transition',
                    'font-bold bg-primary text-white' => request()->routeIs($namaRoute),
                    'font-semibold bg-slate-50 border border-slate-200 text-ink hover:bg-primary-light hover:text-primary' => ! request()->routeIs($namaRoute),
                ])>{{ $label }}</a>
            @endforeach
        </nav>
    </header>

    <form action="#" method="POST" class="space-y-6">
        @csrf

        <x-mabu.card title="Pengalaman Kerja" description="Pekerjaan, magang, atau kegiatan organisasi yang pernah kamu jalani" icon="work_history">
            <div data-experience-list data-next-index="{{ count($experiences) }}" class="space-y-4">
                @foreach ($experiences as $index => $experience)
                    @include('mabu.profil.partials.pengalaman-item', ['index' => $index, 'experience' => $experience])
                @endforeach
            </div>

            <p data-experience-empty class="hidden text-xs text-muted text-center py-4">
                Belum ada pengalaman. Tidak apa-apa, kamu tetap bisa melamar.
            </p>

            <button type="button" data-experience-add
                class="w-full inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl border border-dashed border-primary/50 text-xs font-semibold text-primary hover:bg-primary-light transition-colors">
                <span class="material-symbols-outlined text-[18px]">add</span>
                <span>Tambah Pengalaman</span>
            </button>

            <template data-experience-template>
                @include('mabu.profil.partials.pengalaman-item', ['index' => '__INDEX__', 'experience' => []])
            </template>
        </x-mabu.card>

        <x-mabu.card title="Keahlian" description="Kemampuan yang kamu kuasai, maksimal 10" icon="psychology">
            <x-mabu.tag-input name="skills" :values="$skills" :suggestions="$saranKeahlian" :max="10"
                placeholder="Ketik keahlian lalu tekan Enter" />
        </x-mabu.card>

        <div class="flex items-center justify-end gap-2">
            <a href="{{ route('mabu.profil') }}"
                class="px-5 py-2.5 rounded-full text-xs font-semibold text-muted hover:bg-slate-100 hover:text-ink transition">
                Batal
            </a>
            <button type="submit"
                class="px-7 py-2.5 rounded-full text-xs font-semibold bg-primary text-white hover:bg-blue-700 shadow-sm transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script>
        (() => {
            const daftar = document.querySelector('[data-experience-list]');
            const cetakan = document.querySelector('[data-experience-template]');
            const kosong = document.querySelector('[data-experience-empty]');
            let nomorBerikutnya = Number(daftar.dataset.nextIndex);

            const perbaruiKosong = () => kosong.classList.toggle('hidden', daftar.children.length > 0);

            const tambahBlok = () => {
                const wadah = document.createElement('div');
                wadah.innerHTML = cetakan.innerHTML.replaceAll('__INDEX__', nomorBerikutnya++);

                const blok = wadah.firstElementChild;
                daftar.append(blok);
                blok.querySelector('input').focus();
                perbaruiKosong();
            };

            const aturTanggalSelesai = (blok) => {
                const mulai = blok.querySelector('[data-experience-start]');
                const selesai = blok.querySelector('[data-experience-end]');
                const masihBekerja = blok.querySelector('[data-experience-current]').checked;

                selesai.min = mulai.value;
                selesai.disabled = masihBekerja;
                if (masihBekerja) selesai.value = '';
            };

            document.querySelector('[data-experience-add]').addEventListener('click', tambahBlok);

            daftar.addEventListener('click', (event) => {
                const tombol = event.target.closest('[data-experience-remove]');
                if (!tombol) return;

                tombol.closest('[data-experience-item]').remove();
                perbaruiKosong();
            });

            daftar.addEventListener('change', (event) => {
                if (event.target.matches('[data-experience-current], [data-experience-start]')) {
                    aturTanggalSelesai(event.target.closest('[data-experience-item]'));
                }
            });

            perbaruiKosong();
        })();
    </script>
@endpush
