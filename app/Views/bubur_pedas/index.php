<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Page Header & Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 flex items-center gap-3">
                <i class="fa-solid fa-list-check text-primary"></i> Kelola Menu Bubur Pedas
            </h1>
            <p class="text-sm text-slate-500 mt-1">Admin Panel CRUD untuk mengelola variasi menu & makanan</p>
        </div>

        <a href="<?= base_url('/buburpedas/create') ?>" class="bg-primary hover:bg-primary-hover text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-primary/30 transition flex items-center gap-2 text-sm self-start md:self-auto">
            <i class="fa-solid fa-circle-plus"></i> Tambah Menu Baru
        </a>
    </div>

    <!-- Alert Flash Message -->
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

    <!-- Search & Filter Card -->
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-200 mb-6">
        <form action="<?= base_url('/buburpedas') ?>" method="get" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-grow">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari nama menu atau deskripsi..." class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-primary focus:bg-white transition">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-slate-900 text-white hover:bg-slate-800 px-5 py-2.5 rounded-xl font-semibold text-sm transition flex items-center gap-2">
                    <i class="fa-solid fa-filter"></i> Filter
                </button>
                <?php if (!empty($search)): ?>
                    <a href="<?= base_url('/buburpedas') ?>" class="bg-slate-200 text-slate-700 hover:bg-slate-300 px-4 py-2.5 rounded-xl font-semibold text-sm transition flex items-center">
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
                        <th class="py-4 px-6">Nama Menu</th>
                        <th class="py-4 px-6">Harga / Porsi</th>
                        <th class="py-4 px-6">Stok</th>
                        <th class="py-4 px-6">Deskripsi</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    <?php if (empty($menus)): ?>
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400 font-medium">
                                Belum ada data menu bubur pedas.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($menus as $item): ?>
                            <tr class="hover:bg-indigo-50/40 transition-colors">
                                <td class="py-4 px-6 font-bold text-slate-400"><?= $no++ ?></td>
                                <td class="py-4 px-6">
                                    <span class="font-bold text-slate-900 block"><?= esc($item['nama']) ?></span>
                                    <span class="text-xs text-slate-400 font-mono">ID: #<?= $item['id'] ?></span>
                                </td>
                                <td class="py-4 px-6 font-extrabold text-primary">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold <?= $item['stok'] > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' ?>">
                                        <?= $item['stok'] ?> porsi
                                    </span>
                                </td>
                                <td class="py-4 px-6 max-w-xs text-slate-600 text-xs truncate" title="<?= esc($item['deskripsi']) ?>">
                                    <?= esc($item['deskripsi'] ?: '-') ?>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('/buburpedas/edit/' . $item['id']) ?>" class="bg-amber-100 text-amber-800 hover:bg-accent px-3 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1 shadow-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        <a href="<?= base_url('/buburpedas/delete/' . $item['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus menu \'<?= esc($item['nama']) ?>\'?')" class="bg-rose-100 text-rose-700 hover:bg-rose-600 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1 shadow-sm">
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
            <span>Aksen Warna: <span class="px-2 py-0.5 rounded bg-accent text-slate-900 font-mono font-bold">#FDE68A</span> | Utama: <span class="px-2 py-0.5 rounded bg-primary text-white font-mono font-bold">#6366F1</span></span>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
