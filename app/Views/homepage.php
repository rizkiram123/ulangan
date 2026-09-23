<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary via-indigo-600 to-indigo-800 text-white py-14 px-4 relative overflow-hidden">
    <div class="absolute -right-10 -bottom-10 w-96 h-96 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto text-center relative z-10 space-y-6">
        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-semibold text-accent border border-white/20">
            <i class="fa-solid fa-wand-magic-sparkles text-amber-300"></i> Kuliner Rempah Otentik Kalimantan Barat
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">
            Sensasi Lezat <span class="text-accent underline decoration-amber-400 decoration-wavy">Bubur Pedas</span> Sambas
        </h1>
        <p class="max-w-2xl mx-auto text-indigo-100 text-base sm:text-lg">
            Kombinasi beras sangrai, daun kesum wangi, pakis segar, dan rempah alami terbaik. Pilih dari 8+ variasi istimewa!
        </p>

        <!-- Fitur 1: Search Form -->
        <div class="max-w-2xl mx-auto pt-2">
            <form action="<?= base_url('/') ?>" method="get" class="flex flex-col sm:flex-row gap-2 bg-white/10 backdrop-blur-lg p-2 rounded-2xl border border-white/20 shadow-2xl">
                <div class="relative flex-grow">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-white/60"></i>
                    <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari nama bubur, rempah, atau rasa..." class="w-full pl-11 pr-4 py-3 bg-white/20 text-white placeholder-white/70 rounded-xl focus:outline-none focus:bg-white/30 text-sm font-medium">
                </div>
                <button type="submit" class="bg-accent text-slate-900 font-extrabold px-6 py-3 rounded-xl hover:bg-amber-300 transition text-sm flex items-center justify-center gap-2 shadow-md">
                    <i class="fa-solid fa-search"></i> Cari
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Filter Section (Fitur 2: Filter & Shorting) -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 relative z-20">
    <div class="bg-white p-5 rounded-2xl shadow-xl border border-slate-200">
        <form action="<?= base_url('/') ?>" method="get" class="flex flex-wrap items-center justify-between gap-4">
            <!-- Hidden search term preserve -->
            <?php if (!empty($search)): ?>
                <input type="hidden" name="search" value="<?= esc($search) ?>">
            <?php endif; ?>

            <!-- Category Pills (Fitur 2: Filter Kategori) -->
            <div class="flex items-center gap-2 overflow-x-auto pb-1 max-w-full">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider whitespace-nowrap mr-1">
                    <i class="fa-solid fa-filter text-primary"></i> Kategori:
                </span>
                <a href="<?= base_url('/?' . http_build_query(array_merge($_GET, ['kategori' => 'all']))) ?>" class="px-3 py-1.5 rounded-full text-xs font-bold whitespace-nowrap transition <?= (empty($kategori) || $kategori === 'all') ? 'bg-primary text-white shadow-md shadow-primary/30' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">
                    Semua
                </a>
                <?php foreach ($categories as $cat): ?>
                    <a href="<?= base_url('/?' . http_build_query(array_merge($_GET, ['kategori' => $cat]))) ?>" class="px-3 py-1.5 rounded-full text-xs font-bold whitespace-nowrap transition <?= ($kategori === $cat) ? 'bg-primary text-white shadow-md shadow-primary/30' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">
                        <?= $cat ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Sort Dropdown (Fitur 2: Filter Sorting) -->
            <div class="flex items-center gap-2">
                <label for="sort" class="text-xs font-bold text-slate-400 uppercase tracking-wider whitespace-nowrap">Urutkan:</label>
                <select name="sort" id="sort" onchange="this.form.submit()" class="bg-slate-100 border border-slate-200 text-slate-800 text-xs font-semibold py-1.5 px-3 rounded-xl focus:outline-none focus:border-primary">
                    <option value="" <?= empty($sort) ? 'selected' : '' ?>>Terbaru</option>
                    <option value="harga_asc" <?= $sort === 'harga_asc' ? 'selected' : '' ?>>Harga: Termurah</option>
                    <option value="harga_desc" <?= $sort === 'harga_desc' ? 'selected' : '' ?>>Harga: Termahal</option>
                </select>

                <?php if (!empty($search) || !empty($kategori) || !empty($sort)): ?>
                    <a href="<?= base_url('/') ?>" class="text-xs font-bold text-rose-600 hover:text-rose-800 px-2 py-1 bg-rose-50 rounded-lg flex items-center gap-1">
                        <i class="fa-solid fa-xmark"></i> Reset
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</section>

<!-- Menu Cards Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Variasi Menu Bubur Pedas</h2>
            <p class="text-sm text-slate-500">Menampilkan <?= count($menus) ?> variasi makanan lezat</p>
        </div>
        <a href="<?= base_url('/buburpedas/create') ?>" class="bg-accent text-slate-900 font-bold px-4 py-2.5 rounded-xl hover:bg-amber-300 transition shadow flex items-center gap-2 text-sm">
            <i class="fa-solid fa-plus"></i> Tambah Menu
        </a>
    </div>

    <?php if (empty($menus)): ?>
        <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-slate-200">
            <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto text-slate-400 text-2xl mb-4">
                <i class="fa-solid fa-bowl-food"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700">Tidak ada variasi bubur pedas ditemukan</h3>
            <p class="text-sm text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian atau filter kategori Anda.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($menus as $item): ?>
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-200 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Image Container with Overlay -->
                        <div class="relative h-48 bg-slate-900 overflow-hidden">
                            <img src="<?= esc($item['gambar'] ?: 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?auto=format&fit=crop&w=800&q=80') ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="bg-primary text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow-md uppercase tracking-wider">
                                    <?= esc($item['kategori'] ?: 'Spesial') ?>
                                </span>
                            </div>

                            <div class="absolute top-3 right-3">
                                <span class="text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md <?= $item['stok'] > 0 ? 'bg-emerald-500 text-white' : 'bg-red-500 text-white' ?>">
                                    Stok: <?= $item['stok'] ?>
                                </span>
                            </div>

                            <a href="<?= base_url('/detail/' . $item['id']) ?>" class="absolute bottom-3 right-3 bg-white/90 hover:bg-white text-slate-900 text-xs font-bold px-3 py-1.5 rounded-xl shadow transition flex items-center gap-1">
                                <i class="fa-solid fa-eye text-primary"></i> Detail
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5">
                            <h3 class="font-bold text-base text-slate-900 group-hover:text-primary transition-colors line-clamp-2 mb-2">
                                <a href="<?= base_url('/detail/' . $item['id']) ?>"><?= esc($item['nama']) ?></a>
                            </h3>

                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2 mb-4">
                                <?= esc($item['deskripsi'] ?: 'Kombinasi beras sangrai dan rempah alami khas Sambas.') ?>
                            </p>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="px-5 pb-5 pt-3 border-t border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div>
                            <span class="text-[10px] text-slate-400 block font-semibold uppercase tracking-wider">Harga / Porsi</span>
                            <span class="text-base font-extrabold text-primary">
                                Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                            </span>
                        </div>
                        <a href="<?= base_url('/detail/' . $item['id']) ?>" class="bg-accent text-slate-900 hover:bg-amber-300 px-3 py-2 rounded-xl text-xs font-bold transition shadow-sm flex items-center gap-1">
                            Detail <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?= $this->endSection() ?>
