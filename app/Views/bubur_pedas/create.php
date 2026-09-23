<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Back Button -->
    <a href="<?= base_url('/buburpedas') ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-primary mb-6 transition">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Menu
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
        <div class="bg-primary px-8 py-6 text-white flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold">Tambah Menu Bubur Pedas</h1>
                <p class="text-xs text-indigo-100 mt-1">Lengkapi formulir di bawah ini untuk menambahkan variasi baru</p>
            </div>
            <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center text-slate-900 text-xl font-bold">
                <i class="fa-solid fa-plus"></i>
            </div>
        </div>

        <form action="<?= base_url('/buburpedas/store') ?>" method="post" class="p-8 space-y-6">
            <?= csrf_field() ?>

            <!-- Error Validation List -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 space-y-1">
                    <div class="font-bold text-sm flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-rose-500"></i> Terjadi Kesalahan Input:
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1 pl-2">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Nama Menu -->
            <div class="space-y-2">
                <label for="nama" class="block text-sm font-bold text-slate-800">
                    Nama Menu Bubur Pedas <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Contoh: Bubur Pedas Daging Cincang Super" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm transition" required>
            </div>

            <!-- Grid: Harga & Stok -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Harga -->
                <div class="space-y-2">
                    <label for="harga" class="block text-sm font-bold text-slate-800">
                        Harga (Rp) <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">Rp</span>
                        <input type="number" id="harga" name="harga" value="<?= old('harga') ?>" placeholder="25000" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm transition" min="0" required>
                    </div>
                </div>

                <!-- Stok -->
                <div class="space-y-2">
                    <label for="stok" class="block text-sm font-bold text-slate-800">
                        Jumlah Stok (Porsi) <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" id="stok" name="stok" value="<?= old('stok', 10) ?>" placeholder="10" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm transition" min="0" required>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="space-y-2">
                <label for="deskripsi" class="block text-sm font-bold text-slate-800">
                    Deskripsi / Bahan Pelengkap
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan keunikan rempah, toping, atau rasa khas menu ini..." class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm transition"><?= old('deskripsi') ?></textarea>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <a href="<?= base_url('/buburpedas') ?>" class="px-5 py-3 rounded-xl font-bold text-slate-600 hover:bg-slate-100 transition text-sm">
                    Batal
                </a>
                <button type="submit" class="bg-primary hover:bg-primary-hover text-white font-bold px-7 py-3 rounded-xl shadow-lg shadow-primary/30 transition text-sm flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Menu
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
