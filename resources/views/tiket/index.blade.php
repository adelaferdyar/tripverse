<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripVerse | Cari Tiket</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">

    <!-- Navbar -->
    <header class="border-b border-slate-200 bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4">
            <a href="{{ route('tiket.index') }}" class="flex items-center gap-2.5">
                <span class="text-xl font-bold tracking-tight">TripVerse</span>
            </a>

            <div class="hidden items-center gap-6 text-sm md:flex">
                <a href="#pencarian" class="font-medium text-[#E11A45]">Cari Tiket</a>
                <a href="#daftar-tiket" class="text-slate-600 transition hover:text-[#E11A45]">Daftar Tiket</a>
            </div>

            <a href="#pencarian"
                class="rounded-lg bg-[#E11A45] px-4 py-2 text-sm font-medium text-white transition hover:bg-[#E11A45]/90">
                Mulai Cari
            </a>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-5 py-10 md:py-14">

        <!-- Judul halaman -->
        <section class="mb-8">
            <div
                class="mb-3 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-3 py-1 text-xs font-medium text-[#E11A45]">
                <span class="h-1.5 w-1.5 rounded-full bg-[#E11A45]"></span>
                Temukan perjalananmu
            </div>

            <h1 class="text-3xl font-bold tracking-tight md:text-4xl">
                Cari tiket perjalanan
            </h1>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 md:text-base">
                Cari dan bandingkan tiket pesawat, kereta, dan bus
                sesuai tujuan perjalananmu.
            </p>
        </section>

        <!-- Form pencarian -->
        <section id="pencarian" class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm md:p-6 bg-gradient-to-br from-red-700 via-red-500 to-red-300">
            <div class="mb-5">
                <h2 class="text-lg font-semibold text-[#f9f9f9]">Detail perjalanan</h2>
                <p class="mt-1 text-sm text-gray-100">
                    Masukkan informasi perjalanan yang ingin kamu cari.
                </p>
            </div>

            <form action="{{ route('tiket.index') }}" method="GET" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">

                <div>
                    <label for="asal" class="mb-2 block text-sm font-medium text-[#f9f9f9]">Kota asal</label>
                    <input id="asal" name="asal" type="text" value="{{ request('asal') }}"
                        placeholder="Contoh: Surabaya"
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                <div>
                    <label for="tujuan" class="mb-2 block text-sm font-medium text-[#f9f9f9]">Kota tujuan</label>
                    <input id="tujuan" name="tujuan" type="text" value="{{ request('tujuan') }}"
                        placeholder="Contoh: Jakarta"
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                <div>
                    <label for="tanggal" class="mb-2 block text-sm font-medium text-[#f9f9f9]">Tanggal berangkat</label>
                    <input id="tanggal" name="tanggal" type="date" value="{{ request('tanggal', $tanggal ?? '') }}"
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                <div>
                    <label for="jenis" class="mb-2 block text-sm font-medium text-[#f9f9f9]">Transportasi</label>
                    <select id="jenis" name="jenis"
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        <option value="">Semua jenis</option>
                        <option value="Pesawat" @selected(request('jenis') == 'Pesawat')>Pesawat</option>
                        <option value="Kereta" @selected(request('jenis') == 'Kereta')>Kereta</option>
                        <option value="Bus" @selected(request('jenis') == 'Bus')>Bus</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit"
                        class="w-full rounded-lg bg-[#E11A45] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#E11A45]/90 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2">
                        Cari Tiket
                    </button>
                </div>
            </form>
        </section>

        <!-- Kategori transportasi -->
        <section class="mt-10">
            <div class="mb-4">
                <h2 class="text-lg font-semibold tracking-tight">Jenis transportasi</h2>
                <p class="mt-1 text-sm text-slate-500">Pilih transportasi sesuai kebutuhanmu.</p>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <a href="{{ route('tiket.index', array_merge(request()->except('jenis', 'sort'), ['jenis' => 'Pesawat'])) }}"
                    class="group rounded-xl border border-slate-200 bg-white p-4 transition hover:border-blue-300 hover:bg-blue-50/50">
                    <div
                        class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-[#E11A45] transition group-hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M17.8 19.2 16 11l3-3-1-1-3 3-8.2-1.8a1 1 0 0 0-1.1 1.5l4.3 4.3-3 3-2.5-.5-1 1 4 2 2 4 1-1-.5-2.5 3-3 4.3 4.3a1 1 0 0 0 1.5-1.1Z" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold">Pesawat</p>
                    <p class="mt-1 text-xs text-slate-500">Perjalanan udara</p>
                </a>

                <a href="{{ route('tiket.index', array_merge(request()->except('jenis', 'sort'), ['jenis' => 'Kereta'])) }}"
                    class="group rounded-xl border border-slate-200 bg-white p-4 transition hover:border-blue-300 hover:bg-blue-50/50">
                    <div
                        class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-[#E11A45] transition group-hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="5" y="3" width="14" height="16" rx="3" />
                            <path d="M5 11h14M8 19l-2 3m10-3 2 3M9 7h.01M15 7h.01M8 15h8" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold">Kereta</p>
                    <p class="mt-1 text-xs text-slate-500">Perjalanan darat</p>
                </a>

                <a href="{{ route('tiket.index', array_merge(request()->except('jenis', 'sort'), ['jenis' => 'Bus'])) }}"
                    class="group rounded-xl border border-slate-200 bg-white p-4 transition hover:border-blue-300 hover:bg-blue-50/50">
                    <div
                        class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-[#E11A45] transition group-hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M8 6v6m8-6v6M5 12h14M5 18h14M7 21l-2-3V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v13l-2 3M8 15h.01M16 15h.01" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold">Bus</p>
                    <p class="mt-1 text-xs text-slate-500">Perjalanan antarkota</p>
                </a>
            </div>
        </section>

        <!-- Daftar tiket -->
        <section id="daftar-tiket" class="mt-12">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight">Daftar tiket</h2>
                    <p class="mt-2 text-sm text-slate-500">
                        Bandingkan harga dan durasi perjalanan yang tersedia.
                    </p>
                </div>

                <form action="{{ route('tiket.index') }}" method="GET" class="flex items-center gap-2">
                    <input type="hidden" name="asal" value="{{ request('asal') }}">
                    <input type="hidden" name="tujuan" value="{{ request('tujuan') }}">
                    <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">

                    <label for="sort" class="whitespace-nowrap text-sm text-slate-600">Urutkan:</label>
                    <select id="sort" name="sort" onchange="this.form.submit()"
                        class="rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        <option value="" @selected(request('sort') == '')>Default</option>
                        <option value="termurah" @selected(request('sort') == 'termurah')>Harga terendah</option>
                        <option value="termahal" @selected(request('sort') == 'termahal')>Harga tertinggi</option>
                        <option value="durasi" @selected(request('sort') == 'durasi')>Durasi tercepat</option>
                    </select>
                </form>
            </div>

            @if (request('asal') || request('tujuan') || request('jenis'))
                <div class="mt-5 flex flex-wrap items-center gap-2 text-sm">
                    <span class="text-slate-500">Filter aktif:</span>

                    @if (request('asal'))
                        <span class="rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-[#E11A45]">
                            Asal: {{ request('asal') }}
                        </span>
                    @endif

                    @if (request('tujuan'))
                        <span class="rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-[#E11A45]">
                            Tujuan: {{ request('tujuan') }}
                        </span>
                    @endif

                    @if (request('jenis'))
                        <span class="rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-[#E11A45]">
                            {{ request('jenis') }}
                        </span>
                    @endif

                    <a href="{{ route('tiket.index') }}" class="font-medium text-red-600 hover:underline">
                        Reset filter
                    </a>
                </div>
            @endif

            <div class="mt-6 grid gap-4 lg:grid-cols-2">
                @forelse($tiket as $item)
                    <article
                        class="rounded-xl border border-slate-200 bg-white p-5 transition hover:border-blue-200 hover:shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-[#E11A45]">
                                    @if ($item['jenis'] == 'Pesawat')
                                        <span class="text-xl">✈</span>
                                    @elseif($item['jenis'] == 'Kereta')
                                        <span class="text-xl">🚆</span>
                                    @else
                                        <span class="text-xl">🚌</span>
                                    @endif
                                </div>

                                <div>
                                    <h3 class="font-semibold">{{ $item['nama'] }}</h3>
                                    <p class="mt-1 text-sm text-slate-500">{{ $item['jenis'] }}</p>
                                </div>
                            </div>

                            <span
                                class="rounded-md border border-blue-100 bg-blue-50 px-2 py-1 text-xs font-medium text-[#E11A45]">
                                Tersedia
                            </span>
                        </div>

                        <div class="my-5 border-t border-slate-100"></div>

                        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-3">
                            <div>
                                <p class="text-xl font-bold">{{ $item['berangkat'] }}</p>
                                <p class="mt-1 text-sm text-slate-500">{{ $item['asal'] }}</p>
                            </div>

                            <div class="min-w-20 text-center">
                                <p class="text-xs text-slate-500">{{ $item['durasi'] }} menit</p>
                                <div class="my-2 flex items-center gap-1 text-blue-500">
                                    <span class="h-2 w-2 rounded-full border-2 border-blue-500"></span>
                                    <span class="h-px flex-1 bg-blue-200"></span>
                                    <span>›</span>
                                </div>
                                <p class="text-xs text-slate-400">Durasi</p>
                            </div>

                            <div class="text-right">
                                <p class="text-xl font-bold">{{ $item['tiba'] }}</p>
                                <p class="mt-1 text-sm text-slate-500">{{ $item['tujuan'] }}</p>
                            </div>
                        </div>

                        <div class="my-5 border-t border-slate-100"></div>

                        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                            <div>
                                <p class="text-xs text-slate-500">Harga per orang</p>
                                <p class="mt-1 text-xl font-bold tracking-tight text-[#E11A45]">
                                    Rp{{ number_format($item['harga'], 0, ',', '.') }}
                                </p>
                            </div>

                            <button type="button"
                                onclick="alert('Fitur pemesanan akan dibuat pada tahap berikutnya.')"
                                class="rounded-lg bg-[#E11A45] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#E11A45]/90 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2">
                                Pilih tiket
                            </button>
                        </div>
                    </article>
                @empty
                    <div
                        class="rounded-xl border border-dashed border-slate-300 bg-white px-5 py-14 text-center lg:col-span-2">
                        <div
                            class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-[#E11A45]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                        </div>

                        <h3 class="mt-4 font-semibold">Tiket tidak ditemukan</h3>
                        <p class="mt-2 text-sm text-slate-500">
                            Coba ubah kota asal, tujuan, atau jenis transportasi.
                        </p>

                        <a href="{{ route('tiket.index') }}"
                            class="mt-5 inline-flex rounded-lg bg-[#E11A45] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#E11A45]/90">
                            Tampilkan semua tiket
                        </a>
                    </div>
                @endforelse
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="mt-8 border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="font-semibold">TripVerse<span class="text-blue-600">.</span></p>
            <p class="text-sm text-slate-500">
                © {{ date('Y') }} TripVerse. Temukan perjalananmu.
            </p>
        </div>
    </footer>

</body>

</html>
