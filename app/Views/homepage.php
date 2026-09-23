<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary via-indigo-600 to-indigo-800 text-white py-16 px-4 relative overflow-hidden">
    <div class="absolute -right-10 -bottom-10 w-96 h-96 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto text-center relative z-10 space-y-6">
        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-semibold text-accent border border-white/20">
            <i class="fa-solid fa-fire text-amber-400"></i> Kuliner Rempah Otentik Kalimantan Barat
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">
            Sensasi Lezat <span class="text-accent underline decoration-amber-400 decoration-wavy">Bubur Pedas</span> Sambas
        </h1>
        <p class="max-w-2xl mx-auto text-indigo-100 text-base sm:text-lg">
            Nikmati kombinasi beras sangrai, daun kesum wangi, pakis segar, dan rempah alami terbaik. Tersedia 8+ variasi pilihan lezat!
        </p>

        <!-- Search Bar -->
        <div class="max-w-xl mx-auto pt-4">
            <form action="<?= base_url('/') ?>" method="get" class="flex gap-2 bg-white p-2 rounded-2xl shadow-xl">
                <div class="relative flex-grow">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari variasi menu bubur pedas..." class="w-full pl-11 pr-4 py-3 text-slate-800 rounded-xl focus:outline-none text-sm font-medium">
                </div>
                <button type="submit" class="bg-primary hover:bg-primary-hover text-white font-bold px-6 py-3 rounded-xl transition text-sm flex items-center gap-2">
                    Cari
                </button>
                <?php if (!empty($search)): ?>
                    <a href="<?= base_url('/') ?>" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold px-4 py-3 rounded-xl transition text-sm flex items-center">
                        Reset
                    </a>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

<!-- Menu Grid Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Daftar Variasi Menu</h2>
            <p class="text-sm text-slate-500">Menampilkan <?= count($menus) ?> variasi bubur pedas istimewa</p>
        </div>
        <a href="<?= base_url('/buburpedas/create') ?>" class="bg-accent text-slate-900 font-bold px-4 py-2.5 rounded-xl hover:bg-amber-300 transition shadow flex items-center gap-2 text-sm">
            <i class="fa-solid fa-plus"></i> Tambah Menu
        </a>
    </div>

    <?php if (empty($menus)): ?>
        <div class="bg-white rounded-2xl p-12 text-center shadow-sm border border-slate-200">
            <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto text-slate-400 text-2xl mb-4">
                <i class="fa-solid fa-utensils"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700">Menu tidak ditemukan</h3>
            <p class="text-sm text-slate-500 mt-1">Coba kata kunci pencarian lain atau tambahkan menu baru.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($menus as $item): ?>
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Header Card Accent -->
                        <div class="h-3 bg-gradient-to-r from-primary via-indigo-400 to-accent"></div>
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-2 mb-3">
                                <span class="bg-primary-light text-primary text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
                                    <i class="fa-solid fa-pepper-hot text-red-500"></i> Bubur Pedas
                                </span>
                                <span class="text-xs font-bold px-2.5 py-1 rounded-full <?= $item['stok'] > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' ?>">
                                    Stok: <?= $item['stok'] ?>
                                </span>
                            </div>

                            <h3 class="font-bold text-lg text-slate-900 group-hover:text-primary transition-colors line-clamp-2 mb-2">
                                <?= esc($item['nama']) ?>
                            </h3>

                            <p class="text-slate-600 text-xs leading-relaxed line-clamp-3 mb-4">
                                <?= esc($item['deskripsi'] ?: 'Menu gurih tradisional racikan khas Sambas.') ?>
                            </p>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-3 border-t border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div>
                            <span class="text-xs text-slate-400 block font-medium">Harga / Porsi</span>
                            <span class="text-lg font-extrabold text-primary">
                                Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                            </span>
                        </div>
                        <a href="<?= base_url('/buburpedas/edit/' . $item['id']) ?>" class="w-9 h-9 bg-accent text-slate-900 rounded-xl flex items-center justify-center hover:bg-amber-300 transition shadow-sm" title="Edit Menu">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?= $this->endSection() ?>
