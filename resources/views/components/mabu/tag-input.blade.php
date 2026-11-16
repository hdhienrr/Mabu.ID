@props(['name', 'values' => [], 'suggestions' => [], 'max' => 10, 'placeholder' => 'Ketik lalu tekan Enter'])

<div data-tag-input data-max="{{ $max }}" data-values="{{ json_encode(old($name, $values)) }}" class="space-y-3">
    <div class="flex items-center gap-2">
        <input type="text" data-tag-field maxlength="40" placeholder="{{ $placeholder }}" aria-label="{{ $placeholder }}"
            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-xs text-ink transition outline-none placeholder:text-slate-400 focus:bg-white focus:border-primary focus:ring-0">
        <button type="button" data-tag-add
            class="shrink-0 px-4 py-2.5 rounded-xl text-xs font-semibold text-primary bg-primary-light hover:bg-blue-100 transition-colors">
            Tambah
        </button>
    </div>

    <p data-tag-message class="hidden text-xs text-red-600"></p>

    <ul data-tag-list class="flex flex-wrap gap-2"></ul>

    <p class="text-xs text-muted">
        <span data-tag-count>0</span> dari {{ $max }} terisi
    </p>

    @if ($suggestions)
        <div class="flex flex-wrap items-center gap-2">
            <span class="text-xs text-muted">Saran:</span>
            @foreach ($suggestions as $saran)
                <button type="button" data-tag-suggestion="{{ $saran }}"
                    class="px-3 py-1 rounded-full border border-slate-200 text-xs font-semibold text-muted hover:border-primary hover:text-primary transition-colors">
                    + {{ $saran }}
                </button>
            @endforeach
        </div>
    @endif

    @error($name)
        <p class="text-xs text-red-600">{{ $message }}</p>
    @enderror

    <template data-tag-template>
        <li class="inline-flex items-center gap-1 pl-3 pr-1.5 py-1 rounded-full bg-primary-light text-primary text-xs font-semibold">
            <span data-tag-text></span>
            <button type="button" data-tag-remove aria-label="Hapus"
                class="w-5 h-5 rounded-full flex items-center justify-center hover:bg-primary/15">
                <span class="material-symbols-outlined text-[14px]">close</span>
            </button>
            <input type="hidden" name="{{ $name }}[]">
        </li>
    </template>
</div>

@once
    @push('scripts')
        <script>
            document.querySelectorAll('[data-tag-input]').forEach((wadah) => {
                const maks = Number(wadah.dataset.max);
                const kolom = wadah.querySelector('[data-tag-field]');
                const daftar = wadah.querySelector('[data-tag-list]');
                const cetakan = wadah.querySelector('[data-tag-template]');
                const pesan = wadah.querySelector('[data-tag-message]');
                const jumlah = wadah.querySelector('[data-tag-count]');
                const saran = wadah.querySelectorAll('[data-tag-suggestion]');

                const isiSekarang = () => [...daftar.querySelectorAll('input')].map((input) => input.value);
                const sudahAda = (teks) => isiSekarang().some((isi) => isi.toLowerCase() === teks.toLowerCase());

                const tampilkanPesan = (teks) => {
                    pesan.textContent = teks;
                    pesan.classList.toggle('hidden', teks === '');
                };

                const perbarui = () => {
                    jumlah.textContent = isiSekarang().length;
                    saran.forEach((tombol) => tombol.classList.toggle('hidden', sudahAda(tombol.dataset.tagSuggestion)));
                };

                const tambah = (teksMentah) => {
                    const teks = teksMentah.trim();

                    if (teks === '') return;
                    if (sudahAda(teks)) return tampilkanPesan(`"${teks}" sudah ada di daftar.`);
                    if (isiSekarang().length >= maks) return tampilkanPesan(`Maksimal ${maks} isian.`);

                    const chip = cetakan.content.firstElementChild.cloneNode(true);
                    chip.querySelector('[data-tag-text]').textContent = teks;
                    chip.querySelector('input').value = teks;
                    daftar.append(chip);

                    tampilkanPesan('');
                    perbarui();
                };

                const tambahDariKolom = () => {
                    tambah(kolom.value);
                    kolom.value = '';
                    kolom.focus();
                };

                kolom.addEventListener('keydown', (event) => {
                    if (event.key !== 'Enter') return;
                    event.preventDefault();
                    tambahDariKolom();
                });

                wadah.querySelector('[data-tag-add]').addEventListener('click', tambahDariKolom);
                saran.forEach((tombol) => tombol.addEventListener('click', () => tambah(tombol.dataset.tagSuggestion)));

                daftar.addEventListener('click', (event) => {
                    const tombol = event.target.closest('[data-tag-remove]');
                    if (!tombol) return;

                    tombol.closest('li').remove();
                    tampilkanPesan('');
                    perbarui();
                });

                JSON.parse(wadah.dataset.values).forEach(tambah);
                perbarui();
            });
        </script>
    @endpush
@endonce
