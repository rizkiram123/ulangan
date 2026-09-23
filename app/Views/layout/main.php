<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Warung Bubur Pedas Khas Sambas') ?></title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#6366F1',
                        'primary-hover': '#4F46E5',
                        'primary-light': '#EEF2FF',
                        accent: '#FDE68A',
                        'accent-dark': '#F59E0B',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <!-- Header Navigation -->
    <header class="bg-primary text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo & Brand -->
                <a href="<?= base_url('/') ?>" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 bg-accent rounded-xl flex items-center justify-center text-slate-900 font-extrabold text-xl shadow-md group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-bowl-food text-amber-900"></i>
                    </div>
                    <div>
                        <span class="font-extrabold text-2xl tracking-tight block leading-tight">Bubur Pedas</span>
                        <span class="text-xs text-accent font-medium tracking-wide">Khas Sambas Kalimantan West</span>
                    </div>
                </a>

                <!-- Navigation Links -->
                <nav class="flex items-center gap-4">
                    <a href="<?= base_url('/') ?>" class="px-4 py-2 rounded-lg text-sm font-semibold transition hover:bg-white/10 flex items-center gap-2">
                        <i class="fa-solid fa-house"></i> Beranda
                    </a>
                    <a href="<?= base_url('/buburpedas') ?>" class="px-4 py-2 rounded-lg text-sm font-semibold bg-accent text-slate-900 shadow-md hover:bg-amber-300 transition flex items-center gap-2">
                        <i class="fa-solid fa-sliders"></i> Admin CRUD
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-10 mt-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <div class="flex items-center justify-center gap-2 text-white font-bold text-lg">
                <span class="w-3 h-3 rounded-full bg-accent"></span>
                <span>Warung Kuliner Bubur Pedas Khas Sambas</span>
            </div>
            <p class="text-sm">Ujian Vibe Coding - Database: <span class="text-accent font-mono">ulangan</span> | Tema: <span class="text-accent font-mono">Bubur pedas</span></p>
            <p class="text-xs text-slate-500">&copy; <?= date('Y') ?> All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
