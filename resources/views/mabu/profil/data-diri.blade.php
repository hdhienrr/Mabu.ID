@extends('layouts.mabu')

@section('title', 'Data Diri - MABU')

@section('content')
@php
    // Email diambil dari akun yang login. Field lain kosong sampai diisi pengguna atau dikirim backend.
    $akun = auth()->user();
    $dataDiri = $dataDiri ?? [
        'name' => null,
        'email' => $akun->email,
        'phone' => null,
        'photo_url' => null,
        'birth_date' => null,
        'gender' => null,
        'address' => null,
        'education_level' => null,
        'campus' => null,
        'major' => null,
        'semester' => null,
        'bio' => null,
    ];
    $inisial = collect(explode(' ', $akun->name))->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))->take(2)->join('');

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
                <span class="text-ink font-semibold">Data Diri</span>
            </div>
            <h1 class="font-heading text-2xl font-extrabold text-ink tracking-tight">Data Diri</h1>
            <p class="text-xs text-muted">
                Lengkapi data dirimu agar pemberi kerja mengenalmu dan CV bisa dibuat otomatis.
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

    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <x-mabu.card title="Informasi Pribadi" description="Identitas dan kontak yang bisa dihubungi" icon="person">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-mabu.photo-input name="photo" :src="$dataDiri['photo_url']" :initials="$inisial" />
                <x-mabu.input label="Nama Lengkap" name="name" :value="$dataDiri['name']"
                    placeholder="Nama sesuai kartu identitas" maxlength="100" required />
                <x-mabu.input label="Email" name="email" type="email" :value="$dataDiri['email']" readonly
                    hint="Email mengikuti akun dan tidak bisa diubah di sini." />
                <x-mabu.input label="Nomor HP / WhatsApp" name="phone" type="tel" :value="$dataDiri['phone']"
                    placeholder="081234567890" maxlength="20" required />
                <x-mabu.input label="Tanggal Lahir" name="birth_date" type="date" :value="$dataDiri['birth_date']"
                    max="{{ now()->toDateString() }}" required />
                <x-mabu.input label="Jenis Kelamin" name="gender" type="select" :value="$dataDiri['gender']"
                    :options="['male' => 'Laki-laki', 'female' => 'Perempuan']" required />
                <x-mabu.input label="Domisili" name="address" :value="$dataDiri['address']"
                    placeholder="Kelurahan, kecamatan, kota" maxlength="150" required />
            </div>
        </x-mabu.card>

        <x-mabu.card title="Pendidikan" description="Dipakai untuk mencocokkan lowongan dengan jadwalmu" icon="school">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-mabu.input label="Status" name="education_level" type="select" :value="$dataDiri['education_level']"
                    :options="['mahasiswa' => 'Mahasiswa', 'pelajar' => 'Pelajar SMA/SMK', 'umum' => 'Umum']" required />
                <x-mabu.input label="Kampus / Sekolah" name="campus" :value="$dataDiri['campus']"
                    placeholder="Contoh: Institut Teknologi Sepuluh Nopember" maxlength="150" required />
                <x-mabu.input label="Jurusan" name="major" :value="$dataDiri['major']"
                    placeholder="Contoh: Teknik Informatika" maxlength="100" />
                <x-mabu.input label="Semester / Kelas" name="semester" type="number" :value="$dataDiri['semester']"
                    placeholder="Contoh: 5" min="1" max="14" />
            </div>
        </x-mabu.card>

        <x-mabu.card title="Tentang Saya" description="Ringkasan singkat yang tampil di profil dan CV" icon="edit_note">
            <x-mabu.input label="Deskripsi Diri" name="bio" type="textarea" :value="$dataDiri['bio']" maxlength="500"
                placeholder="Ceritakan singkat tentang dirimu dan pekerjaan yang kamu cari."
                hint="Maksimal 500 karakter." />
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
