@extends('layouts.mabu')
@section('title', 'Pengaturan Akun - MABU')

@section('content')
    @php $inputClass = 'w-full px-space-md py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light'; @endphp

    <div class="max-w-2xl mx-auto flex flex-col gap-space-lg">
        <div>
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Pengaturan Akun</h1>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xxs">Ubah data akun, kata sandi, atau hapus akun.</p>
        </div>

        {{-- Data akun --}}
        <section class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface">Data Akun</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 mb-space-md">Nama dan email yang tampil di profilmu.</p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

            <form method="post" action="{{ route('profile.update') }}" class="flex flex-col gap-space-md">
                @csrf
                @method('patch')

                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="name">Nama Lengkap</label>
                    <input class="{{ $inputClass }}" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @foreach ($errors->get('name') as $message)
                        <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
                    @endforeach
                </div>

                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="email">Email</label>
                    <input class="{{ $inputClass }}" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @foreach ($errors->get('email') as $message)
                        <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
                    @endforeach

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <p class="mt-2 font-body-sm text-body-sm text-on-surface-variant">
                            Email belum terverifikasi.
                            <button form="send-verification" class="text-primary font-semibold hover:underline">Kirim ulang email verifikasi.</button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-1 font-body-sm text-body-sm text-success">Tautan verifikasi baru sudah dikirim.</p>
                        @endif
                    @endif
                </div>

                <div class="flex items-center gap-space-md">
                    <button class="px-space-lg py-2.5 rounded-full bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-all" type="submit">Simpan</button>
                    @if (session('status') === 'profile-updated')
                        <span class="font-body-sm text-body-sm text-success flex items-center gap-1">
                            <span class="material-symbols-outlined text-[18px]">check_circle</span> Tersimpan.
                        </span>
                    @endif
                </div>
            </form>
        </section>

        {{-- Kata sandi --}}
        <section class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface">Ganti Kata Sandi</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 mb-space-md">Pakai kata sandi panjang dan unik.</p>

            <form method="post" action="{{ route('password.update') }}" class="flex flex-col gap-space-md">
                @csrf
                @method('put')

                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="update_password_current_password">Kata Sandi Sekarang</label>
                    <input class="{{ $inputClass }}" id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
                    @foreach ($errors->updatePassword->get('current_password') as $message)
                        <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
                    @endforeach
                </div>

                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="update_password_password">Kata Sandi Baru</label>
                    <input class="{{ $inputClass }}" id="update_password_password" name="password" type="password" autocomplete="new-password">
                    @foreach ($errors->updatePassword->get('password') as $message)
                        <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
                    @endforeach
                </div>

                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="update_password_password_confirmation">Konfirmasi Kata Sandi</label>
                    <input class="{{ $inputClass }}" id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
                    @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                        <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
                    @endforeach
                </div>

                <div class="flex items-center gap-space-md">
                    <button class="px-space-lg py-2.5 rounded-full bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-all" type="submit">Simpan</button>
                    @if (session('status') === 'password-updated')
                        <span class="font-body-sm text-body-sm text-success flex items-center gap-1">
                            <span class="material-symbols-outlined text-[18px]">check_circle</span> Kata sandi diperbarui.
                        </span>
                    @endif
                </div>
            </form>
        </section>

        {{-- Hapus akun --}}
        <section class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-error/30">
            <h2 class="font-headline-sm text-headline-sm text-error">Hapus Akun</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 mb-space-md">
                Akun dan semua datanya terhapus permanen. Unduh data yang ingin disimpan dulu.
            </p>
            <button class="px-space-lg py-2.5 rounded-full bg-error text-on-error font-label-md text-label-md hover:opacity-90 transition-all" type="button" onclick="document.getElementById('delete-account-dialog').showModal()">
                Hapus Akun
            </button>
        </section>
    </div>

    <dialog id="delete-account-dialog" class="rounded-2xl p-0 backdrop:bg-on-surface/40 w-full max-w-md">
        <form method="post" action="{{ route('profile.destroy') }}" class="p-space-lg flex flex-col gap-space-md">
            @csrf
            @method('delete')
            <h2 class="font-headline-sm text-headline-sm text-on-surface">Yakin hapus akun?</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Semua data hilang permanen. Masukkan kata sandi untuk konfirmasi.</p>
            <input class="{{ $inputClass }}" id="password" name="password" type="password" placeholder="Kata sandi" required>
            @foreach ($errors->userDeletion->get('password') as $message)
                <p class="font-body-sm text-body-sm text-error">{{ $message }}</p>
            @endforeach
            <div class="flex justify-end gap-space-sm">
                <button class="px-space-lg py-2 rounded-full bg-surface-container text-on-surface font-label-md text-label-md" type="button" onclick="this.closest('dialog').close()">Batal</button>
                <button class="px-space-lg py-2 rounded-full bg-error text-on-error font-label-md text-label-md" type="submit">Hapus Akun</button>
            </div>
        </form>
    </dialog>

    @if ($errors->userDeletion->isNotEmpty())
        <script>document.getElementById('delete-account-dialog').showModal();</script>
    @endif
@endsection
