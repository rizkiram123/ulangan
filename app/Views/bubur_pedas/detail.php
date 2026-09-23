<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Breadcrumb & Back -->
    <div class="mb-6 flex items-center justify-between">
        <a href="<?= base_url('/') ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-primary transition">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog Menu
        </a>
        <span class="text-xs font-mono text-slate-400">ID Menu: #<?= esc($menu['id']) ?></span>
    </div>

    <!-- Main Detail Card -->
    <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden grid grid-cols-1 lg:grid-cols-12 mb-12">
        
        <!-- Left Column: Food Image -->
        <div class="lg:col-span-6 relative bg-slate-900 group overflow-hidden min-h-[350px] lg:min-h-[480px]">
            <img src="<?= esc($menu['gambar'] ?: 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?auto=format&fit=crop&w=800&q=80') ?>" alt="<?= esc($menu['nama']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
            
            <div class="absolute top-6 left-6 flex items-center gap-2">
                <span class="bg-accent text-slate-900 font-extrabold text-xs px-3 py-1.5 rounded-full shadow-md tracking-wider uppercase">
                    <?= esc($menu['kategori'] ?: 'Spesial') ?>
                </span>
                <span class="bg-primary/90 backdrop-blur-md text-white font-bold text-xs px-3 py-1.5 rounded-full shadow-md">
                    <i class="fa-solid fa-wand-magic-sparkles text-amber-300"></i> AI Visual Art
                </span>
            </div>

            <div class="absolute bottom-6 left-6 right-6 text-white">
                <span class="text-xs text-amber-300 font-semibold tracking-wide uppercase block mb-1">Warung Bubur Pedas Sambas</span>
                <h2 class="text-2xl font-black leading-tight drop-shadow-md"><?= esc($menu['nama']) ?></h2>
            </div>
        </div>

        <!-- Right Column: Menu Details & Info -->
        <div class="lg:col-span-6 p-8 lg:p-10 flex flex-col justify-between">
            <div class="space-y-6">
                <!-- Header Info -->
                <div>
                    <div class="flex items-center justify-between gap-4 mb-2">
                        <span class="text-xs font-bold px-3 py-1 rounded-full <?= $menu['stok'] > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' ?>">
                            <i class="fa-solid fa-box-archive mr-1"></i> Stok Tersedia: <?= $menu['stok'] ?> Porsi
                        </span>
                        <span class="text-xs text-slate-400 font-medium">Diperbarui: <?= date('d M Y', strtotime($menu['updated_at'] ?? $menu['created_at'])) ?></span>
                    </div>

                    <h1 class="text-3xl font-extrabold text-slate-900 leading-tight">
                        <?= esc($menu['nama']) ?>
                    </h1>
                </div>

                <!-- Price Tag -->
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 flex items-center justify-between">
                    <div>
                        <span class="text-xs text-slate-500 font-semibold block">Harga per Porsi</span>
                        <span class="text-3xl font-extrabold text-primary">
                            Rp <?= number_format($menu['harga'], 0, ',', '.') ?>
                        </span>
                    </div>
                    <div class="text-right">
                        <span class="inline-block bg-accent/30 text-amber-900 border border-amber-300 font-bold text-xs px-3 py-1 rounded-lg">
                            <i class="fa-solid fa-star text-amber-500"></i> 4.9 / 5.0 (Rating)
                        </span>
                    </div>
                </div>

                <!-- Deskripsi Lengkap -->
                <div class="space-y-2">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-align-left text-primary"></i> Deskripsi & Keunikan Rasa
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        <?= esc($menu['deskripsi'] ?: 'Bubur pedas khas Sambas diracik dengan beras sangrai pilihan, 10 jenis rempah daun aromatik seperti daun kesum, pakis segar, kangkung, wortel, dan disajikan hangat dengan taburan bawang goreng serta emping garing.') ?>
                    </p>
                </div>

                <!-- Komposisi & Bahan Rempah -->
                <div class="space-y-2">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-leaf text-emerald-600"></i> Komposisi Utama
                    </h3>
                    <div class="grid grid-cols-2 gap-2 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-2 bg-slate-100 p-2 rounded-lg">
                            <i class="fa-solid fa-circle-check text-primary"></i> Beras Sangrai Rempah
                        </div>
                        <div class="flex items-center gap-2 bg-slate-100 p-2 rounded-lg">
                            <i class="fa-solid fa-circle-check text-primary"></i> Daun Kesum Wangi
                        </div>
                        <div class="flex items-center gap-2 bg-slate-100 p-2 rounded-lg">
                            <i class="fa-solid fa-circle-check text-primary"></i> Pakis & Kangkung Segar
                        </div>
                        <div class="flex items-center gap-2 bg-slate-100 p-2 rounded-lg">
                            <i class="fa-solid fa-circle-check text-primary"></i> Kacang & Teri Crispy
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-8 border-t border-slate-100 flex flex-col sm:flex-row gap-3">
                <a href="<?= base_url('/buburpedas/edit/' . $menu['id']) ?>" class="flex-1 bg-accent text-slate-900 hover:bg-amber-300 font-bold px-6 py-3.5 rounded-xl transition text-center text-sm shadow flex items-center justify-center gap-2">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Menu
                </a>
                <a href="<?= base_url('/') ?>" class="flex-1 bg-primary text-white hover:bg-primary-hover font-bold px-6 py-3.5 rounded-xl shadow-lg shadow-primary/30 transition text-center text-sm flex items-center justify-center gap-2">
                    <i class="fa-solid fa-house"></i> Kembali Ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Related Menus Section -->
    <?php if (!empty($related)): ?>
        <div class="space-y-6">
            <h3 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-utensils text-primary"></i> Menu Variasi Lainnya
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($related as $rel): ?>
                    <a href="<?= base_url('/detail/' . $rel['id']) ?>" class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm hover:shadow-md transition flex items-center gap-4 group">
                        <img src="<?= esc($rel['gambar'] ?: 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?auto=format&fit=crop&w=800&q=80') ?>" alt="<?= esc($rel['nama']) ?>" class="w-20 h-20 rounded-xl object-cover group-hover:scale-105 transition-transform">
                        <div>
                            <span class="text-xs font-bold text-primary block mb-0.5"><?= esc($rel['kategori'] ?: 'Spesial') ?></span>
                            <h4 class="font-bold text-sm text-slate-900 group-hover:text-primary transition-colors line-clamp-1"><?= esc($rel['nama']) ?></h4>
                            <span class="text-xs font-extrabold text-slate-700 block mt-1">Rp <?= number_format($rel['harga'], 0, ',', '.') ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
