<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Page Header & Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 flex items-center gap-3">
                <i class="fa-solid fa-list-check text-primary"></i> Kelola Menu Bubur Pedas
            </h1>
            <p class="text-sm text-slate-500 mt-1">Admin Panel CRUD dengan Fitur Pencarian & Filter Kategori</p>
        </div>

        <a href="<?= base_url('/buburpedas/create') ?>" class="bg-primary hover:bg-primary-hover text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-primary/30 transition flex items-center gap-2 text-sm self-start md:self-auto">
            <i class="fa-solid fa-circle-plus"></i> Tambah Menu Baru
        </a>
    </div>

    <!-- Flash Alert -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-emerald-500 text-xl"></i>
                <span class="text-sm font-semibold"><?= session()->getFlashdata('success') ?></span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    <?php endif; ?>

    <!-- Fitur 1 & 2: Search & Filter Form Bar -->
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200 mb-6 space-y-4">
        <form action="<?= base_url('/buburpedas') ?>" method="get" class="flex flex-col md:flex-row gap-3">
            <!-- Fitur 1: Pencarian Input -->
            <div class="relative flex-grow">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari nama menu, deskripsi, atau kategori..." class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-primary focus:bg-white transition">
            </div>

            <!-- Fitur 2: Filter Kategori Select -->
            <div class="w-full md:w-56">
                <select name="kategori" class="w-full py-2.5 px-4 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-primary text-slate-700 font-semibold">
                    <option value="all" <?= (empty($kategori) || $kategori === 'all') ? 'selected' : '' ?>>Semua Kategori</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat ?>" <?= ($kategori === $cat) ? 'selected' : '' ?>><?= $cat ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-slate-900 text-white hover:bg-slate-800 px-6 py-2.5 rounded-xl font-bold text-sm transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-filter"></i> Filter
                </button>
                <?php if (!empty($search) || (!empty($kategori) && $kategori !== 'all')): ?>
                    <a href="<?= base_url('/buburpedas') ?>" class="bg-slate-200 text-slate-700 hover:bg-slate-300 px-4 py-2.5 rounded-xl font-semibold text-sm transition flex items-center justify-center">
                        Reset
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Data Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-slate-200 text-xs font-bold uppercase tracking-wider">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Gambar & Menu</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Harga</th>
                        <th class="py-4 px-6">Stok</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    <?php if (empty($menus)): ?>
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400 font-medium">
                                Belum ada data menu bubur pedas yang sesuai.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($menus as $item): ?>
                            <tr class="hover:bg-indigo-50/40 transition-colors">
                                <td class="py-4 px-6 font-bold text-slate-400"><?= $no++ ?></td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <img src="<?= esc($item['gambar'] ?: 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?auto=format&fit=crop&w=800&q=80') ?>" alt="<?= esc($item['nama']) ?>" class="w-12 h-12 rounded-xl object-cover border border-slate-200">
                                        <div>
                                            <a href="<?= base_url('/detail/' . $item['id']) ?>" class="font-bold text-slate-900 hover:text-primary transition-colors block"><?= esc($item['nama']) ?></a>
                                            <span class="text-xs text-slate-400 font-mono">ID: #<?= $item['id'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">
                                        <?= esc($item['kategori'] ?: 'Spesial') ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 font-extrabold text-primary">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold <?= $item['stok'] > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' ?>">
                                        <?= $item['stok'] ?> porsi
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('/detail/' . $item['id']) ?>" class="bg-indigo-100 text-indigo-800 hover:bg-indigo-200 px-2.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1">
                                            <i class="fa-solid fa-eye"></i> Detail
                                        </a>
                                        <a href="<?= base_url('/buburpedas/edit/' . $item['id']) ?>" class="bg-amber-100 text-amber-800 hover:bg-accent px-2.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        <a href="<?= base_url('/buburpedas/delete/' . $item['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus menu \'<?= esc($item['nama']) ?>\'?')" class="bg-rose-100 text-rose-700 hover:bg-rose-600 hover:text-white px-2.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 font-medium">
            <span>Total Menu: <strong><?= count($menus) ?> Variasi</strong></span>
            <span>Ujian Vibe Code - Fitur 1 (Pencarian) & Fitur 2 (Filter) Active</span>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
