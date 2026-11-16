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
@endphp

<div class="space-y-space-lg">
    <header>
        <h1 class="font-headline-md text-headline-md text-on-surface">Pengalaman & Keahlian</h1>
        <p class="font-body-md text-body-md text-on-surface-variant">
            Ceritakan pengalaman dan kemampuanmu supaya rekomendasi lowongan lebih tepat.
        </p>
    </header>

    <form action="#" method="POST" class="space-y-space-lg">
        @csrf

        <x-mabu.card title="Pengalaman Kerja" description="Pekerjaan, magang, atau kegiatan organisasi yang pernah kamu jalani" icon="work_history">
            <div data-experience-list data-next-index="{{ count($experiences) }}" class="space-y-4">
                @foreach ($experiences as $index => $experience)
                    @include('mabu.profil.partials.pengalaman-item', ['index' => $index, 'experience' => $experience])
                @endforeach
            </div>

            <p data-experience-empty class="hidden font-body-md text-body-md text-on-surface-variant text-center py-4">
                Belum ada pengalaman. Tidak apa-apa, kamu tetap bisa melamar.
            </p>

            <button type="button" data-experience-add
                class="w-full inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl border border-dashed border-primary/50 font-label-lg text-label-lg text-primary hover:bg-primary-fixed/40 transition-colors">
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
                class="px-4 py-2 rounded-xl font-label-lg text-label-lg text-on-surface-variant hover:bg-surface-container">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2 rounded-xl font-label-lg text-label-lg bg-primary text-on-primary hover:bg-primary-container shadow-sm">
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