@extends('layouts.auth')
@section('title', 'Lupa Kata Sandi - MABU')

@section('content')
    <div class="flex flex-col w-full py-space-xl px-margin items-center justify-center relative overflow-hidden">
        <div class="absolute -top-32 -left-20 w-96 h-96 rounded-full bg-brand-100 opacity-60 dark:opacity-20 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-16 w-80 h-80 rounded-full bg-primary-fixed opacity-40 dark:opacity-20 blur-3xl pointer-events-none"></div>

        <div class="relative w-full max-w-[450px] mx-auto">
            <div class="auth-card rounded-xl shadow-xl p-space-xl sm:p-space-2xl border border-border-light">
                <div class="text-center mb-space-lg">
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-space-md">
                        <span class="material-symbols-outlined text-primary text-[28px]">lock_reset</span>
                    </div>
                    <h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Lupa Kata Sandi</h1>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xxs">
                        Masukkan email akunmu. Kami kirim tautan untuk membuat kata sandi baru.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-space-md p-3.5 rounded-xl bg-error/10 border border-error/20 text-error font-body-sm text-body-sm flex items-start gap-2.5">
                        <span class="material-symbols-outlined text-[20px] shrink-0 mt-0.5">error</span>
                        <div class="flex-1">
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (session('status'))
                    <div class="mb-space-md p-3.5 rounded-xl bg-success/10 border border-success/20 text-success font-body-sm text-body-sm flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[20px] shrink-0">check_circle</span>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form class="space-y-space-md" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="email">Email</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-space-md text-[20px] text-on-surface-variant pointer-events-none">alternate_email</span>
                            <input
                                class="w-full pl-11 pr-space-md py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light"
                                id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus type="email" />
                        </div>
                    </div>

                    <button
                        class="w-full mt-2 py-3 px-space-lg rounded-full bg-brand-600 text-white font-label-md text-label-md hover:bg-brand-700 active:scale-[0.99] transition-all shadow-md flex items-center justify-center gap-space-xs"
                        type="submit">
                        <span>Kirim Tautan Reset</span>
                        <span class="material-symbols-outlined text-[18px]">send</span>
                    </button>
                </form>

                <p class="text-center font-body-sm text-body-sm text-on-surface-variant mt-space-lg">
                    Ingat kata sandimu?
                    <a class="font-label-md text-label-md text-primary hover:underline transition-colors ml-1 font-semibold" href="{{ route('login') }}">Masuk</a>
                </p>
            </div>
        </div>
    </div>
@endsection
