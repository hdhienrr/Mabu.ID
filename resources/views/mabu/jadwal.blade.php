@extends('layouts.mabu')

@section('title', 'Manajemen Jadwal - MABU')

@push('styles')
<style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
    }
</style>
@endpush

@section('content')
<div class="flex flex-col w-full gap-y-6">

    <!-- Top Stat Cards & Smart AI Sync Banner -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div class="flex flex-col gap-1">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Jadwal Kuliah Terdaftar</span>
                <div class="flex items-baseline gap-2">
                    <span class="font-heading text-2xl font-extrabold text-ink">18 SKS</span>
                    <span class="text-xs text-primary font-semibold">Senin - Jumat</span>
                </div>
                <div class="flex items-center gap-1.5 mt-1 text-emerald-700">
                    <span class="material-symbols-outlined text-[16px]">sync_saved_locally</span>
                    <span class="text-[11px] font-semibold">SIAKAD ITS Terhubung</span>
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-primary-light flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined text-[26px]">menu_book</span>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div class="flex flex-col gap-1">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Waktu Luang Tersedia</span>
                <div class="flex items-baseline gap-2">
                    <span class="font-heading text-2xl font-extrabold text-ink">16 Jam</span>
                    <span class="text-xs text-slate-400">/ minggu</span>
                </div>
                <span class="text-[11px] text-emerald-700 font-semibold mt-1">Ideal untuk 3 - 4 Shift Kerja</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-700 shrink-0">
                <span class="material-symbols-outlined text-[26px]">timelapse</span>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div class="flex flex-col gap-1">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Pekerjaan Bebas Bentrok</span>
                <div class="flex items-baseline gap-2">
                    <span class="font-heading text-2xl font-extrabold text-primary">8 Lowongan</span>
                </div>
                <div class="flex items-center gap-1.5 text-slate-500 text-xs mt-1">
                    <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                    <span>Buffer 45 menit aman</span>
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-primary-light flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined text-[26px]">verified</span>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-primary-container text-white shadow-sm flex flex-col justify-between relative overflow-hidden">
            <div class="flex items-center justify-between z-10">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px] text-emerald-300">smart_toy</span>
                    <span class="text-xs font-semibold tracking-wide">AI Conflict Guard</span>
                </div>
                <span class="px-2 py-0.5 rounded-full bg-white/20 text-[10px] font-bold">AKTIF</span>
            </div>
            <div class="my-2 z-10">
                <div class="font-heading text-base leading-tight font-bold">0% Potensi Bentrok</div>
                <p class="text-[11px] text-blue-100 mt-0.5">Semua lowongan disaring sesuai jeda mata kuliah &amp; estimasi tempuh.</p>
            </div>
            <div class="flex items-center justify-between z-10 pt-1">
                <button type="button" id="openModalBtn" class="flex items-center gap-1 text-[11px] font-semibold bg-white text-primary px-3 py-1.5 rounded-full hover:bg-blue-50 transition-colors shadow-xs">
                    <span class="material-symbols-outlined text-[15px]">add</span>
                    Tambah Jadwal FRS
                </button>
            </div>
            <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-white/10 pointer-events-none"></div>
        </div>
    </div>

    <!-- Calendar Container Main Block -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 sm:p-6 flex flex-col gap-y-5 relative">

        <!-- Calendar Controls & Nav Bar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-2">
            <div class="flex flex-wrap items-center gap-5">
                <div class="flex items-center gap-2">
                    <span class="font-heading text-xl font-bold text-ink">November, 2026</span>
                    <div class="flex items-center gap-1 text-slate-500">
                        <button type="button" class="w-7 h-7 rounded-lg hover:bg-slate-100 flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </button>
                        <button type="button" class="w-7 h-7 rounded-lg hover:bg-slate-100 flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </button>
                    </div>
                </div>

                <!-- Filter Sub-tabs -->
                <div class="flex items-center gap-1.5 overflow-x-auto" id="scheduleFilterTabs">
                    <button type="button" onclick="filterSchedule('all', this)" class="sched-tab flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs text-primary bg-primary-light font-semibold transition">
                        <span class="material-symbols-outlined text-[17px]">calendar_view_week</span>
                        <span>All Schedule</span>
                    </button>
                    <button type="button" onclick="filterSchedule('kuliah', this)" class="sched-tab flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs text-muted hover:text-ink hover:bg-slate-100 font-semibold transition">
                        <span class="material-symbols-outlined text-[17px]">school</span>
                        <span>Jadwal Kuliah</span>
                    </button>
                    <button type="button" onclick="filterSchedule('kerja', this)" class="sched-tab flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs text-muted hover:text-ink hover:bg-slate-100 font-semibold transition">
                        <span class="material-symbols-outlined text-[17px]">work</span>
                        <span>Shift Kerja</span>
                    </button>
                    <button type="button" onclick="filterSchedule('reminder', this)" class="sched-tab flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs text-muted hover:text-ink hover:bg-slate-100 font-semibold transition">
                        <span class="material-symbols-outlined text-[17px]">notifications_active</span>
                        <span>Reminders</span>
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2.5">
                <div class="relative w-48">
                    <span class="material-symbols-outlined absolute left-3 top-2 text-slate-400 text-[16px]">search</span>
                    <input type="text" id="agendaSearchInput" onkeyup="searchAgenda(this.value)" placeholder="Cari agenda..."
                           class="w-full pl-8 pr-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-ink placeholder:text-slate-400 focus:outline-none focus:border-primary">
                </div>

                <div class="flex items-center bg-slate-100 p-1 rounded-xl">
                    <button type="button" class="px-2.5 py-1 rounded-lg text-[11px] bg-white text-primary font-bold shadow-2xs">Week</button>
                    <button type="button" class="px-2.5 py-1 rounded-lg text-[11px] text-muted hover:text-ink font-semibold transition-colors">Month</button>
                </div>

                <button type="button" id="quickAddBtn" class="flex items-center gap-1 px-3.5 py-1.5 bg-primary text-white hover:bg-blue-700 rounded-full text-xs font-semibold shadow-xs transition-colors">
                    <span class="material-symbols-outlined text-[17px]">add</span>
                    <span>Tambah</span>
                </button>
            </div>
        </div>

        <!-- Calendar Schedule Grid Outer -->
        <div class="overflow-x-auto relative border border-slate-200/80 rounded-2xl">
            <div class="min-w-[960px] grid grid-cols-8">
                <div class="p-3 text-center bg-slate-50 border-b border-r border-slate-200/70 text-[11px] font-bold text-slate-400">
                    GMT+7
                </div>
                <div class="p-3 text-center bg-slate-50/70 border-b border-r border-slate-200/70 text-xs font-semibold text-ink">
                    NOV <span class="text-slate-400 font-normal">S16</span>
                </div>
                <div class="p-3 text-center bg-blue-50/80 border-b border-r border-blue-200/70 text-xs font-bold text-primary relative">
                    NOV <span>M17</span>
                    <span class="text-[10px] block font-medium text-primary">Hari Ini</span>
                    <div class="w-1.5 h-1.5 rounded-full bg-primary mx-auto mt-0.5"></div>
                </div>
                <div class="p-3 text-center bg-slate-50/70 border-b border-r border-slate-200/70 text-xs font-semibold text-ink">
                    NOV <span class="text-slate-400 font-normal">T18</span>
                </div>
                <div class="p-3 text-center bg-slate-50/70 border-b border-r border-slate-200/70 text-xs font-semibold text-ink">
                    NOV <span class="text-slate-400 font-normal">W19</span>
                </div>
                <div class="p-3 text-center bg-slate-50/70 border-b border-r border-slate-200/70 text-xs font-semibold text-ink">
                    NOV <span class="text-slate-400 font-normal">T20</span>
                </div>
                <div class="p-3 text-center bg-slate-50/70 border-b border-r border-slate-200/70 text-xs font-semibold text-ink">
                    NOV <span class="text-slate-400 font-normal">S21</span>
                </div>
                <div class="p-3 text-center bg-slate-50/70 border-b border-slate-200/70 text-xs font-semibold text-ink">
                    NOV <span class="text-slate-400 font-normal">M22</span>
                </div>

                <!-- TIMELINE BODY -->
                <div class="col-span-8 grid grid-cols-8 relative bg-white min-h-[620px]">
                    <div class="col-span-8 grid grid-rows-10 pointer-events-none absolute inset-0">
                        <div class="h-16 border-b border-slate-100 bg-slate-50/30"></div>
                        <div class="h-16 border-b border-slate-100"></div>
                        <div class="h-16 border-b border-slate-100 bg-slate-50/30"></div>
                        <div class="h-16 border-b border-slate-100"></div>
                        <div class="h-16 border-b border-slate-100 bg-slate-50/30"></div>
                        <div class="h-16 border-b border-slate-100"></div>
                        <div class="h-16 border-b border-slate-100 bg-slate-50/30"></div>
                        <div class="h-16 border-b border-slate-100"></div>
                        <div class="h-16 border-b border-slate-100 bg-slate-50/30"></div>
                        <div class="h-16"></div>
                    </div>

                    <div class="flex flex-col text-slate-400 text-[11px] font-semibold py-2 px-3 text-right bg-slate-50/50 border-r border-slate-200/70 z-10">
                        <div class="h-16">8 AM</div>
                        <div class="h-16">9 AM</div>
                        <div class="h-16">10 AM</div>
                        <div class="h-16">11 AM</div>
                        <div class="h-16">12 PM</div>
                        <div class="h-16">1 PM</div>
                        <div class="h-16">2 PM</div>
                        <div class="h-16">3 PM</div>
                        <div class="h-16">4 PM</div>
                        <div class="h-16">5 PM</div>
                    </div>

                    <!-- Day 1: Senin -->
                    <div class="relative p-2 z-10 flex flex-col gap-2.5 border-r border-slate-100" id="col-Senin">
                        <div class="agenda-item p-2.5 rounded-xl bg-emerald-100 text-emerald-950 border border-emerald-200 shadow-2xs" data-type="kuliah">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-bold uppercase tracking-wide opacity-80">Kuliah</span>
                                <span class="material-symbols-outlined text-[14px]">school</span>
                            </div>
                            <div class="text-xs font-bold mt-0.5 truncate">Basis Data Lanjut</div>
                            <div class="text-[11px] opacity-90">08.00 - 09.40</div>
                            <div class="flex items-center gap-1 mt-1.5 text-emerald-800 text-[10px] font-semibold">
                                <span class="material-symbols-outlined text-[13px]">location_on</span>
                                <span class="truncate">Gedung Teknik Lt. 3</span>
                            </div>
                        </div>

                        <div class="agenda-item mt-6 p-2.5 rounded-xl bg-blue-50 text-ink border border-blue-200 shadow-2xs" data-type="kuliah">
                            <div class="text-xs font-bold truncate">Sistem Cerdas</div>
                            <div class="text-[11px] text-slate-500">10.50 - 12.30</div>
                            <span class="mt-2 inline-block px-1.5 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-primary">Lab Informatika</span>
                        </div>
                    </div>

                    <!-- Day 2: Selasa -->
                    <div class="relative p-2 z-10 flex flex-col gap-2.5 bg-blue-50/30 border-r border-slate-100" id="col-Selasa">
                        <div class="agenda-item p-2.5 rounded-xl bg-blue-100/80 text-primary shadow-2xs ring-1 ring-primary/40" data-type="reminder">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold">Diskusi Proyek Web</span>
                                <span class="material-symbols-outlined text-[15px]">edit_calendar</span>
                            </div>
                            <div class="text-[11px] text-slate-600">09.20 - 10.30</div>
                            <div class="flex items-center gap-1.5 mt-2">
                                <div class="w-5 h-5 rounded-full bg-primary text-white text-[10px] font-bold flex items-center justify-center">AC</div>
                                <div class="w-5 h-5 rounded-full bg-slate-600 text-white text-[10px] font-bold flex items-center justify-center">MK</div>
                                <span class="text-[10px] text-slate-500">+2 org</span>
                            </div>
                        </div>

                        <div class="agenda-item mt-3 p-2.5 rounded-xl bg-emerald-100 text-emerald-950 border border-emerald-200 shadow-2xs" data-type="kuliah">
                            <div class="text-xs font-bold truncate">Etika Profesi IT</div>
                            <div class="text-[11px] opacity-90">11.00 - 12.40</div>
                            <div class="text-[10px] mt-1 text-emerald-800 font-semibold">Ruang 204</div>
                        </div>

                        <div class="p-1.5 px-2 rounded-lg bg-slate-100 text-slate-600 text-[10px] font-semibold flex items-center gap-1">
                            <span class="material-symbols-outlined text-[13px] text-emerald-700">commute</span>
                            <span>Buffer Perjalanan 35 min</span>
                        </div>

                        <div class="agenda-item p-2.5 rounded-xl bg-blue-50 text-ink border border-blue-200 shadow-2xs" data-type="kerja">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] uppercase tracking-wide text-primary font-bold">Shift Kerja</span>
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-emerald-700 text-white">Fixed</span>
                            </div>
                            <div class="text-xs font-bold mt-1 truncate">Barista Part-Time</div>
                            <div class="text-[11px] text-slate-500">14.00 - 18.00</div>
                            <div class="text-[10px] font-bold text-emerald-700 mt-1">Kopi Kenangan Kampus</div>
                        </div>
                    </div>

                    <!-- Day 3: Rabu -->
                    <div class="relative p-2 z-10 flex flex-col gap-2.5 border-r border-slate-100" id="col-Rabu">
                        <div class="agenda-item p-2.5 rounded-xl bg-slate-100 text-ink border border-slate-200 shadow-2xs" data-type="kerja">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] text-slate-500 font-semibold">Remote Gig</span>
                                <span class="material-symbols-outlined text-[14px] text-primary">laptop_mac</span>
                            </div>
                            <div class="text-xs font-bold truncate">Social Media Admin</div>
                            <div class="text-[11px] text-slate-500">08.30 - 10.30</div>
                            <div class="text-[10px] text-primary font-semibold mt-1">WFC Cafe Mulyosari</div>
                        </div>

                        <div class="agenda-item mt-4 p-2.5 rounded-xl bg-emerald-100 text-emerald-950 border border-emerald-200 shadow-2xs" data-type="kuliah">
                            <div class="text-xs font-bold truncate">Jaringan Komputer</div>
                            <div class="text-[11px] opacity-90">11.30 - 14.00</div>
                            <div class="text-[10px] mt-1 text-emerald-800 font-semibold">Ruang Lab Jarkom</div>
                        </div>

                        <div class="agenda-item mt-2 p-2.5 rounded-xl bg-blue-50 text-ink border border-blue-200 shadow-2xs" data-type="kerja">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] uppercase tracking-wide text-primary font-bold">Shift Kerja</span>
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-emerald-700 text-white">Fixed</span>
                            </div>
                            <div class="text-xs font-bold mt-1 truncate">Barista Evening Shift</div>
                            <div class="text-[11px] text-slate-500">17.00 - 21.00</div>
                            <div class="flex items-center justify-between mt-1.5 gap-1">
                                <span class="text-[10px] font-bold text-emerald-700 truncate">Janji Jiwa</span>
                                <span class="text-[10px] text-primary font-bold shrink-0">Rp 135rb</span>
                            </div>
                        </div>
                    </div>

                    <!-- Day 4: Kamis -->
                    <div class="relative p-2 z-10 flex flex-col gap-2.5 border-r border-slate-100" id="col-Kamis">
                        <div class="agenda-item p-2.5 rounded-xl bg-emerald-100 text-emerald-950 border border-emerald-200 shadow-2xs" data-type="kuliah">
                            <div class="text-xs font-bold truncate">Pemrograman Mobile</div>
                            <div class="text-[11px] opacity-90">08.00 - 10.30</div>
                            <div class="text-[10px] mt-1 text-emerald-800 font-semibold">Gedung Pasca Lt. 2</div>
                        </div>

                        <div class="mt-4 p-2 rounded-xl bg-slate-50 border border-dashed border-slate-200 text-slate-400 flex items-center justify-center text-[10px] font-semibold text-center">
                            Waktu Istirahat &amp; Mandiri<br>10.30 - 13.00
                        </div>

                        <div class="agenda-item mt-4 p-2.5 rounded-xl bg-emerald-100 text-emerald-950 border border-emerald-200 shadow-2xs" data-type="kuliah">
                            <div class="text-xs font-bold truncate">Praktikum Mobile</div>
                            <div class="text-[11px] opacity-90">13.30 - 16.00</div>
                        </div>
                    </div>

                    <!-- Day 5: Jumat -->
                    <div class="relative p-2 z-10 flex flex-col gap-2.5 border-r border-slate-100" id="col-Jumat">
                        <div class="agenda-item p-2.5 rounded-xl bg-emerald-100 text-emerald-950 border border-emerald-200 shadow-2xs" data-type="kuliah">
                            <div class="text-xs font-bold truncate">Pancasila &amp; Kewarganegaraan</div>
                            <div class="text-[11px] opacity-90">07.30 - 09.10</div>
                        </div>

                        <div class="agenda-item p-2 rounded-xl bg-slate-100 text-slate-700 text-[10px] font-semibold flex items-center gap-1.5 mt-2" data-type="reminder">
                            <span class="material-symbols-outlined text-[15px]">mosque</span>
                            <span>Jeda Ibadah &amp; Lunch</span>
                        </div>

                        <div class="agenda-item mt-5 p-2.5 rounded-xl bg-blue-50 text-ink border border-blue-200 shadow-2xs" data-type="kerja">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] uppercase tracking-wide text-primary font-bold">Shift Kerja</span>
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-emerald-700 text-white">Fixed</span>
                            </div>
                            <div class="text-xs font-bold mt-1 truncate">Crew Event Weekend</div>
                            <div class="text-[11px] text-slate-500">14.00 - 19.00</div>
                            <div class="text-[10px] font-bold text-emerald-700 mt-1">Grand City Mall</div>
                        </div>
                    </div>

                    <!-- Day 6: Sabtu -->
                    <div class="relative p-2 z-10 flex flex-col gap-2.5 bg-slate-50/40 border-r border-slate-100" id="col-Sabtu">
                        <div class="agenda-item p-2.5 rounded-xl bg-blue-50 text-primary border border-blue-200 shadow-2xs" data-type="kerja">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-bold uppercase">Weekend Shift</span>
                                <span class="material-symbols-outlined text-[14px]">storefront</span>
                            </div>
                            <div class="text-xs font-bold mt-0.5 text-ink">Kasir Miniso Tunjungan</div>
                            <div class="text-[11px] text-slate-500">10.00 - 15.00</div>
                            <div class="text-[10px] text-emerald-700 font-bold mt-1.5">Rp 150.000 / shift</div>
                        </div>

                        <div class="mt-6 p-2.5 rounded-xl bg-primary-light text-primary text-[10px] font-semibold flex flex-col items-center justify-center text-center">
                            <span>Malam Minggu Bebas</span>
                            <span class="font-bold text-ink mt-0.5">16.00 - 22.00</span>
                        </div>
                    </div>

                    <!-- Day 7: Minggu -->
                    <div class="relative p-2 z-10 flex flex-col gap-2.5 bg-slate-50/40" id="col-Minggu">
                        <div class="agenda-item p-2.5 rounded-xl bg-slate-100 text-ink border border-slate-200 shadow-2xs" data-type="reminder">
                            <div class="text-xs font-bold">Self-Study &amp; Tugas</div>
                            <div class="text-[11px] text-slate-500">09.00 - 12.00</div>
                            <div class="text-[10px] text-primary font-semibold mt-1">Perpustakaan Kota</div>
                        </div>

                        <div class="mt-4 p-2 rounded-xl bg-slate-100 text-slate-600 text-[10px] font-semibold flex items-center justify-center">
                            Off Work / Istirahat
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ADD NEW EVENT POPUP MODAL -->
        <div id="addEventModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs flex items-center justify-center p-4">
            <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-6 flex flex-col gap-y-4 border border-slate-100">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h3 class="font-heading text-base font-bold text-ink">Tambah Agenda Jadwal Baru</h3>
                    <button type="button" id="closeModalBtn" class="w-7 h-7 rounded-full hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-ink transition-colors">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kategori Jadwal</label>
                    <select id="eventCategoryInput" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-ink focus:outline-none focus:border-primary">
                        <option value="kuliah">Kuliah FRS / SKS</option>
                        <option value="kerja">Shift Kerja Part-Time</option>
                        <option value="reminder">Reminder / Diskusi</option>
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nama Agenda / Mata Kuliah</label>
                    <input type="text" id="eventNameInput" placeholder="Contoh: Kuliah Algoritma / Shift Barista" value="Kuliah Praktikum Basis Data"
                           class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-ink focus:outline-none focus:border-primary">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Hari</label>
                        <select id="eventDayInput" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-ink focus:outline-none focus:border-primary">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu" selected>Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Lokasi / Ruangan</label>
                        <input type="text" id="eventLocInput" value="Lab Basis Data ITS"
                               class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-ink focus:outline-none focus:border-primary">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Waktu Mulai - Selesai</label>
                    <div class="flex items-center gap-2">
                        <input type="text" id="eventStartInput" value="09.20" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-ink focus:outline-none focus:border-primary">
                        <span class="text-slate-400 font-bold">-</span>
                        <input type="text" id="eventEndInput" value="11.00" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-ink focus:outline-none focus:border-primary">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button type="button" id="cancelModalBtn" class="px-4 py-2 rounded-full text-xs font-semibold text-muted hover:bg-slate-100 transition-colors">
                        Batal
                    </button>
                    <button type="button" id="saveModalBtn" class="px-5 py-2 rounded-full text-xs bg-primary text-white hover:bg-blue-700 font-semibold transition-colors shadow-xs">
                        Simpan Jadwal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section: Pekerjaan yang Sesuai Waktu Luang Kamu -->
    <div class="flex flex-col gap-y-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-2">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="font-heading text-lg font-bold text-ink">Pekerjaan di Waktu Luangmu</h2>
                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">100% BEBAS BENTROK</span>
                </div>
                <p class="text-xs text-muted mt-0.5">Sistem MABU otomatis menyesuaikan shift dengan jadwal kuliah &amp; memberi jeda transit minimal 30 menit.</p>
            </div>
            <a href="{{ route('mabu.dashboard') }}" class="inline-flex items-center gap-1 text-xs text-primary font-semibold hover:underline">
                <span>Lihat Semua Rekomendasi Bebas Jadwal</span>
                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:border-primary transition flex flex-col justify-between gap-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="px-2.5 py-0.5 rounded-full bg-primary-light text-primary text-[10px] font-bold">Cocok Kamis Sore</span>
                        <span class="text-xs font-extrabold text-primary">Rp 175.000/shift</span>
                    </div>
                    <h4 class="font-heading font-bold text-sm text-ink">Barista &amp; Kasir Shift Malam</h4>
                    <p class="text-xs text-muted mt-0.5">Warkop Titik Kumpul • Sukolilo (800m)</p>
                    <p class="text-[11px] text-slate-600 mt-2.5 bg-slate-50 p-2 rounded-lg">Kamis &amp; Jumat • 18:00 - 23:00 WIB</p>
                </div>
                <a href="{{ route('mabu.dashboard') }}" class="w-full py-2 rounded-xl bg-primary text-white text-center text-xs font-semibold hover:bg-blue-700 transition">
                    Ambil Shift Ini
                </a>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:border-primary transition flex flex-col justify-between gap-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="px-2.5 py-0.5 rounded-full bg-primary-light text-primary text-[10px] font-bold">Cocok Senin - Rabu</span>
                        <span class="text-xs font-extrabold text-primary">Rp 120.000/hari</span>
                    </div>
                    <h4 class="font-heading font-bold text-sm text-ink">Penjaga Booth Teh Solo Makmur</h4>
                    <p class="text-xs text-muted mt-0.5">Gebang Putih • 500m dari Asrama ITS</p>
                    <p class="text-[11px] text-slate-600 mt-2.5 bg-slate-50 p-2 rounded-lg">Senin - Rabu • 16:30 - 20:30 WIB</p>
                </div>
                <a href="{{ route('mabu.dashboard') }}" class="w-full py-2 rounded-xl bg-primary text-white text-center text-xs font-semibold hover:bg-blue-700 transition">
                    Ambil Shift Ini
                </a>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:border-primary transition flex flex-col justify-between gap-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">Cocok Akhir Pekan</span>
                        <span class="text-xs font-extrabold text-primary">Rp 150.000/shift</span>
                    </div>
                    <h4 class="font-heading font-bold text-sm text-ink">Admin Packing &amp; Balas Chat</h4>
                    <p class="text-xs text-muted mt-0.5">Dapur Bunda Snack • Mulyorejo</p>
                    <p class="text-[11px] text-slate-600 mt-2.5 bg-slate-50 p-2 rounded-lg">Sabtu &amp; Minggu • 09:00 - 13:00 WIB</p>
                </div>
                <a href="{{ route('mabu.dashboard') }}" class="w-full py-2 rounded-xl bg-primary text-white text-center text-xs font-semibold hover:bg-blue-700 transition">
                    Ambil Shift Ini
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function() {
        const modal = document.getElementById('addEventModal');
        const openBtn = document.getElementById('openModalBtn');
        const quickAddBtn = document.getElementById('quickAddBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelModalBtn');
        const saveBtn = document.getElementById('saveModalBtn');

        function showModal() { if (modal) modal.classList.remove('hidden'); }
        function hideModal() { if (modal) modal.classList.add('hidden'); }

        if (openBtn) openBtn.addEventListener('click', showModal);
        if (quickAddBtn) quickAddBtn.addEventListener('click', showModal);
        if (closeBtn) closeBtn.addEventListener('click', hideModal);
        if (cancelBtn) cancelBtn.addEventListener('click', hideModal);

        if (saveBtn) {
            saveBtn.addEventListener('click', function() {
                const cat = document.getElementById('eventCategoryInput').value;
                const name = document.getElementById('eventNameInput').value.trim();
                const day = document.getElementById('eventDayInput').value;
                const loc = document.getElementById('eventLocInput').value.trim();
                const start = document.getElementById('eventStartInput').value.trim();
                const end = document.getElementById('eventEndInput').value.trim();

                if (!name) return alert('Isi nama agenda terlebih dahulu.');

                const col = document.getElementById('col-' + day);
                if (col) {
                    const card = document.createElement('div');
                    const styleClass = cat === 'kuliah'
                        ? 'bg-emerald-100 text-emerald-950 border-emerald-200'
                        : (cat === 'kerja' ? 'bg-blue-50 text-ink border-blue-200' : 'bg-slate-100 text-ink border-slate-200');
                    const labelText = cat === 'kuliah' ? 'Kuliah' : (cat === 'kerja' ? 'Shift Kerja' : 'Reminder');

                    card.className = `agenda-item p-2.5 rounded-xl border shadow-2xs ${styleClass}`;
                    card.setAttribute('data-type', cat);
                    card.innerHTML = `
                        <div class="text-[10px] font-bold uppercase tracking-wide opacity-80">${labelText}</div>
                        <div class="text-xs font-bold mt-0.5 truncate">${name}</div>
                        <div class="text-[11px] opacity-90">${start} - ${end}</div>
                        <div class="text-[10px] mt-1 font-semibold opacity-80 truncate">${loc}</div>
                    `;
                    col.appendChild(card);
                }

                hideModal();
                alert('Jadwal baru berhasil ditambahkan dan disinkronkan dengan AI Conflict Guard!');
            });
        }
    })();

    function filterSchedule(type, btn) {
        document.querySelectorAll('.sched-tab').forEach(tab => {
            tab.classList.remove('text-primary', 'bg-primary-light');
            tab.classList.add('text-muted');
        });
        btn.classList.add('text-primary', 'bg-primary-light');
        btn.classList.remove('text-muted');

        document.querySelectorAll('.agenda-item').forEach(item => {
            if (type === 'all' || item.getAttribute('data-type') === type) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function searchAgenda(keyword) {
        const q = keyword.toLowerCase();
        document.querySelectorAll('.agenda-item').forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    }
</script>
@endpush
