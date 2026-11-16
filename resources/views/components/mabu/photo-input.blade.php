@props(['name' => 'photo', 'src' => null, 'initials' => '?'])

<div class="flex items-center gap-4" data-photo-input>
    <div class="w-20 h-20 rounded-full bg-primary-light text-primary flex items-center justify-center overflow-hidden shrink-0">
        <img data-photo-preview src="{{ $src }}" alt="Foto profil"
            @class(['w-full h-full object-cover', 'hidden' => blank($src)])>
        <span data-photo-initials @class(['font-heading text-xl font-bold', 'hidden' => filled($src)])>
            {{ $initials }}
        </span>
    </div>

    <div>
        <label for="{{ $name }}"
            class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-primary bg-primary-light hover:bg-blue-100 cursor-pointer transition-colors">
            <span class="material-symbols-outlined text-[18px]">upload</span>
            <span>Pilih Foto</span>
        </label>
        <input id="{{ $name }}" name="{{ $name }}" type="file" accept="image/jpeg,image/png" class="sr-only" data-photo-file>

        <p class="text-xs text-muted mt-1.5">Format JPG atau PNG, maksimal 2 MB.</p>
        <p data-photo-error class="text-xs text-red-600 mt-1 hidden"></p>

        @error($name)
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

@once
    @push('scripts')
        <script>
            document.querySelectorAll('[data-photo-input]').forEach((wadah) => {
                const UKURAN_MAKS = 2 * 1024 * 1024;
                const berkas = wadah.querySelector('[data-photo-file]');
                const pratinjau = wadah.querySelector('[data-photo-preview]');
                const inisial = wadah.querySelector('[data-photo-initials]');
                const galat = wadah.querySelector('[data-photo-error]');

                const periksa = (foto) => {
                    if (!['image/jpeg', 'image/png'].includes(foto.type)) return 'Format foto harus JPG atau PNG.';
                    if (foto.size > UKURAN_MAKS) return 'Ukuran foto maksimal 2 MB.';
                    return '';
                };

                berkas.addEventListener('change', () => {
                    const foto = berkas.files[0];
                    if (!foto) return;

                    const pesan = periksa(foto);
                    galat.textContent = pesan;
                    galat.classList.toggle('hidden', pesan === '');

                    if (pesan) {
                        berkas.value = '';
                        return;
                    }

                    pratinjau.src = URL.createObjectURL(foto);
                    pratinjau.classList.remove('hidden');
                    inisial.classList.add('hidden');
                });
            });
        </script>
    @endpush
@endonce
