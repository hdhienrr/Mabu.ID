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
@endphp

<div class="space-y-space-lg">
    <header>
        <h1 class="font-headline-md text-headline-md text-on-surface">Data Diri</h1>
        <p class="font-body-md text-body-md text-on-surface-variant">
            Lengkapi data dirimu agar pemberi kerja mengenalmu dan CV bisa dibuat otomatis.
        </p>
    </header>

    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-space-lg">
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