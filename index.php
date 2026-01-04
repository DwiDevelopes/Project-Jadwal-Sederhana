<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANIFY ONLINE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        *{
        -webkit-tap-highlight-color: transparent;
        }
        :root {
            --primary: #1e4a7a;
            --secondary: #2c6aa0;
            --accent: #d4af37;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #000000ff;
            --gov-blue: #1e3a5f;
            --gov-light: #e9ecef;
        }

        ::-webkit-scrollbar {
        display: none;
        }

        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s;
            color: #333;
        }

        body.dark-mode {
            background-color: #1a1d23;
            color: #e9ecef;
        }

        .gov-header {
            background: linear-gradient(135deg, var(--gov-blue), var(--secondary)) !important;
        }

        .btn-primary {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }

        .btn-primary:hover {
            background-color: var(--secondary) !important;
            border-color: var(--secondary) !important;
        }

        .card {
            border-top: 4px solid var(--primary) !important;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            border-left-color: var(--primary) !important;
            color: var(--primary) !important;
        }

        .stats-card i,
        .stats-card .number {
            color: var(--primary) !important;
        }

        .section-title {
            border-bottom-color: var(--primary) !important;
            color: var(--primary) !important;
        }

        .gov-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .gov-logo-icon {
            font-size: 2rem;
            color: var(--accent);
        }

        .gov-logo-text {
            display: flex;
            flex-direction: column;
        }

        .gov-logo-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }

        .gov-logo-subtitle {
            font-size: 0.8rem;
            opacity: 0.9;
            margin: 0;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dark-mode .navbar {
            background-color: #2d3239;
        }

        .sidebar {
            background-color: white;
            height: 100%;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            border-right: 1px solid #e9ecef;
            overflow-y: auto;
        }

        .dark-mode .sidebar {
            background-color: #2d3239;
            border-right: 1px solid #495057;
        }

        .sidebar .nav-link {
            color: #495057;
            padding: 12px 20px;
            margin: 2px 0;
            border-radius: 0;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            font-weight: 500;
        }

        .dark-mode .sidebar .nav-link {
            color: #adb5bd;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #e9ecef;
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .dark-mode .sidebar .nav-link:hover,
        .dark-mode .sidebar .nav-link.active {
            background-color: #3a3f46;
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: var(--primary);
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
            margin-bottom: 20px;
            border-top: 4px solid var(--primary);
        }

        .dark-mode .card {
            background-color: #2d3239;
            color: #e9ecef;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid #e9ecef;
            border-radius: 8px 8px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
            color: var(--primary);
        }

        .dark-mode .card-header {
            background-color: #343a40;
            border-bottom: 1px solid #495057;
        }

        .badge-custom {
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }

        .stats-card {
            padding: 12px;
            text-align: center;
        }
        .stats-card i {
            font-size: 20px;
        }
        .number {
            font-size: 22px;
            font-weight: bold;
        }
        .label {
            font-size: 12px;
            opacity: .8;
        }


        .stats-card .number {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0;
            color: var(--primary);
        }

        .stats-card .label {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }

        .dark-mode .stats-card .label {
            color: #adb5bd;
        }

        .catatan-item {
            border-left: 4px solid var(--primary);
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.2s;
            background: white;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .dark-mode .catatan-item {
            background-color: #343a40;
        }

        .catatan-item:hover {
            background-color: #f8f9fa;
            border-left-color: var(--secondary);
        }

        .dark-mode .catatan-item:hover {
            background-color: #3a3f46;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .dark-mode .status-pending {
            background-color: #665a23;
            color: #ffdf7e;
        }

        .status-selesai {
            background-color: #d1edff;
            color: #0c5460;
        }

        .dark-mode .status-selesai {
            background-color: #1c4554;
            color: #7fd4ff;
        }

        .kategori-badge {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .action-buttons .btn {
            padding: 5px 10px;
            margin-left: 5px;
            border-radius: 4px;
        }

        .prioritas-rendah {
            border-left-color: #28a745 !important;
        }

        .prioritas-sedang {
            border-left-color: #ffc107 !important;
        }

        .prioritas-tinggi {
            border-left-color: #dc3545 !important;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .calendar-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-top: 4px solid var(--primary);
        }

        .dark-mode .calendar-container {
            background-color: #2d3239;
        }

        .filter-section {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-top: 4px solid var(--primary);
        }

        .dark-mode .filter-section {
            background-color: #2d3239;
        }

        .section-title {
            border-bottom: 2px solid var(--primary);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
            color: var(--primary);
        }

        .settings-group {
            margin-bottom: 30px;
        }

        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .dark-mode .setting-item {
            border-bottom: 1px solid #495057;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }


        .mobile-navbar {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 8px 0;
        }

        .dark-mode .mobile-navbar {
            background-color: #2d3239;
        }

        .mobile-nav-item {
            flex: 1;
            text-align: center;
            padding: 8px 5px;
            color: #6c757d;
            text-decoration: none;
            font-size: 0.7rem;
            transition: all 0.2s;
        }

        .dark-mode .mobile-nav-item {
            color: #adb5bd;
        }

        .mobile-nav-item.active {
            color: var(--primary);
        }

        .mobile-nav-item i {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 4px;
        }

        .mobile-nav-item:hover {
            color: var(--primary);
        }


        .main-content {
            padding-bottom: 70px;
        }


        @media (min-width: 992px) {
            .mobile-navbar {
                display: none !important;
            }

            .main-content {
                padding-bottom: 0;
            }
        }


        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }

            .mobile-navbar {
                display: flex;
            }

            .gov-logo-title {
                font-size: 1rem;
            }

            .gov-logo-subtitle {
                font-size: 0.7rem;
            }

            .stats-card .number {
                font-size: 1.5rem;
            }

            .col-lg-2,
            .col-lg-10 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

 
        @media print {

            .navbar,
            .sidebar,
            .mobile-navbar,
            .btn {
                display: none !important;
            }

            .card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }


        .gov-seal {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            border: 2px solid var(--accent);
        }
    </style>
</head>

<body>


    <nav class="bg-white border-b shadow-sm gov-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <div class="flex items-center">
                    <div class="gov-header">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                    <div class="gov-logo">
                                        <div class="gov-seal">
                                            <img src = "img/nopalet.png" width = "120px" height ="120px" style = "border-radius:50%;">
                                        </div>
                                        <div class="gov-logo-text">
                                            <h1 class="gov-logo-title">PLANIFY ONLINE</h1>
                                            <p class="gov-logo-subtitle">Aplikasi Manajemen Kegiatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="hidden md:flex space-x-6">
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-info-circle mr-1"></i> Informasi
                        </a>
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-envelope mr-1"></i> Kontak
                        </a>
                    </div>
                </div>

                <div class="hidden md:flex items-center text-gray-700">
                    <i class="fas fa-calendar-day mr-1"></i>
                    <span id="current-date" class="mr-4"></span>
                    <i class="fas fa-clock mr-1"></i>
                    <span id="current-time"></span>
                </div>

                <button id="menu-btn" class="md:hidden text-gray-700 hover:text-blue-600 text-xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-3 mt-4">
            <a href="#" class="block text-gray-700 hover:text-blue-600" id = "infoBtn"><i class="fas fa-info-circle mr-1"></i>
                Informasi</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600" id = "contactBtn"><i class="fas fa-envelope mr-1"></i> Kontak</a>


            <div id="infoModal" class="fixed inset-0 bg-transparent bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-lg max-w-sm w-11/12 p-6 text-center">
                <h2 class="text-lg font-semibold mb-2">Informasi</h2>
                <p class="text-gray-600 text-sm mb-4">
                Selamat datang di versi mobile! Ini adalah contoh popup informasi.
                </p>
                <button id="closeInfo" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Tutup
                </button>
            </div>
            </div>

            <div id="contactModal" class="fixed inset-0 bg-transparent bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-lg max-w-sm w-11/12 p-6 text-center">
                <h2 class="text-lg font-semibold mb-2">Kontak Kami</h2>
                <p class="text-gray-600 text-sm mb-4">
                Hubungi kami melalui email: <br>
                <a href="mailto:info@domain.com" class="text-blue-600 hover:underline">info@domain.com</a>
                </p>
                <button id="closeContact" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Tutup
                </button>
            </div>
            </div>

            <script>
            const infoBtn = document.getElementById('infoBtn');
            const contactBtn = document.getElementById('contactBtn');
            const infoModal = document.getElementById('infoModal');
            const contactModal = document.getElementById('contactModal');
            const closeInfo = document.getElementById('closeInfo');
            const closeContact = document.getElementById('closeContact');
            infoBtn.addEventListener('click', (e) => {
                e.preventDefault();
                infoModal.classList.remove('hidden');
                infoModal.classList.add('flex');
            });
            contactBtn.addEventListener('click', (e) => {
                e.preventDefault();
                contactModal.classList.remove('hidden');
                contactModal.classList.add('flex');
            });
            closeInfo.addEventListener('click', () => {
                infoModal.classList.add('hidden');
                infoModal.classList.remove('flex');
            });

            closeContact.addEventListener('click', () => {
                contactModal.classList.add('hidden');
                contactModal.classList.remove('flex');
            });
            window.addEventListener('click', (e) => {
                if (e.target === infoModal) {
                infoModal.classList.add('hidden');
                infoModal.classList.remove('flex');
                }
                if (e.target === contactModal) {
                contactModal.classList.add('hidden');
                contactModal.classList.remove('flex');
                }
            });
            </script>


            <div class="mt-3 text-gray-700">
                <div class="flex items-center mb-1"><i class="fas fa-calendar-day mr-1"></i> <span
                        id="m-current-date"></span></div>
                <div class="flex items-center"><i class="fas fa-clock mr-1"></i> <span id="m-current-time"></span></div>
            </div>
            <div class="col-md-6 text-end">
                <div class="d-flex align-items-center justify-content-end gap-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeToggle">
                        <label class="form-check-label text-white" for="darkModeToggle">
                            <i class="fas fa-moon"></i>
                        </label>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>Admin
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" id="navPengaturan"><i
                                        class="fas fa-cog me-2"></i>Pengaturan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
    </nav>

    <script>
        function updateDateTime() {
            const now = new Date();
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            const tgl = `${hari[now.getDay()]}, ${now.getDate()} ${bulan[now.getMonth()]} ${now.getFullYear()}`;

            const jam = String(now.getHours()).padStart(2, '0');
            const menit = String(now.getMinutes()).padStart(2, '0');
            const detik = String(now.getSeconds()).padStart(2, '0');
            const wkt = `${jam}:${menit}:${detik}`;

            document.getElementById('current-date').textContent = tgl;
            document.getElementById('current-time').textContent = wkt;

            document.getElementById('m-current-date').textContent = tgl;
            document.getElementById('m-current-time').textContent = wkt;
        }


        setInterval(updateDateTime, 1000);
        updateDateTime();


        document.getElementById("menu-btn").addEventListener("click", () => {
            const menu = document.getElementById("mobile-menu");
            menu.classList.toggle("hidden");
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>


    <div class="container-fluid main-content">
        <div class="row">

            <div class="col-lg-2 col-md-3 p-0 d-none d-lg-block">
                <div class="sidebar p-2">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-section="dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="catatan">
                                <i class="fas fa-sticky-note"></i> Semua Catatan
                            </a>
                        </li>
                        <hr class="my-2">
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="#" data-section="tambah-catatan">
                                <i class="fas fa-plus-circle"></i> Tambah Catatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="kalender">
                                <i class="fas fa-calendar-alt"></i> Kalender
                            </a>
                        </li>
                        <hr class="my-2">
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="#" data-section="statistik">
                                <i class="fas fa-chart-bar"></i> Statistik
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="pengaturan">
                                <i class="fas fa-cog"></i> Pengaturan
                            </a>
                        </li>
                        <hr class="my-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa-solid fa-right-from-bracket"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-lg-10 col-md-9 mt-4">

  
                <div id="dashboard-section">


                    <div class="text-center mb-4">
                        <center><img src="img/nopalet.png" alt="No Palet" class="img-fluid dashboard-img"></center>
                        <center><h1 class="text-muted" style = "text-font:bold;">Selamat datang di PLANIFY ONLINE</h1></center>
                    </div>

  
                <div class="row g-4 mb-4">
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="card stats-card">
                            <i class="fas fa-file-alt"></i>
                            <div class="number" id="totalCatatan">0</div>
                            <div class="label">Total Catatan</div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="card stats-card">
                            <i class="fas fa-check-circle"></i>
                            <div class="number" id="catatanSelesai">0</div>
                            <div class="label">Terselesaikan</div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="card stats-card">
                            <i class="fas fa-clock"></i>
                            <div class="number" id="catatanPending">0</div>
                            <div class="label">Dalam Proses</div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="card stats-card">
                            <i class="fas fa-tags"></i>
                            <div class="number" id="totalKategori">0</div>
                            <div class="label">Kategori</div>
                        </div>
                    </div>
                </div>



     
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-list-ol me-2"></i>Kegiatan Terbaru</h5>
                                </div>
                                <div class="card-body">
                                    <div id="recent-activities">
                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Status Catatan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="statusChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

     
                <div id="catatan-section" class="d-none">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-sticky-note me-2"></i>Daftar Catatan & Kegiatan</h5>
                            <button class="btn btn-primary btn-sm" id="btnTambahBaru">
                                <i class="fas fa-plus me-1"></i> Catatan Baru
                            </button>
                        </div>
                        <div class="card-body">
                           
                            <div class="filter-section">
                                <h6 class="section-title">Filter Catatan</h6>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="filterKategori" class="form-label">Kategori</label>
                                        <select class="form-select" id="filterKategori">
                                            <option value="">Semua Kategori</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="filterStatus" class="form-label">Status</label>
                                        <select class="form-select" id="filterStatus">
                                            <option value="">Semua Status</option>
                                            <option value="pending">Dalam Proses</option>
                                            <option value="selesai">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="filterPrioritas" class="form-label">Prioritas</label>
                                        <select class="form-select" id="filterPrioritas">
                                            <option value="">Semua Prioritas</option>
                                            <option value="rendah">Rendah</option>
                                            <option value="sedang">Sedang</option>
                                            <option value="tinggi">Tinggi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="filterTanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="filterTanggal">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-outline-secondary me-2" id="btnResetFilter">Reset</button>
                                    <button class="btn btn-primary" id="btnTerapkanFilter">Terapkan Filter</button>
                                </div>
                            </div>

                          
                            <div id="daftarCatatan">
                             
                            </div>
                        </div>
                    </div>
                </div>

       
                <div id="tambah-catatan-section" class="d-none">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Catatan Baru</h5>
                        </div>
                        <div class="card-body">
                            <form id="catatanForm">
                                <input type="hidden" id="catatanId">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="judul" class="form-label">Judul Catatan</label>
                                        <input type="text" class="form-control" id="judul" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select class="form-select" id="kategori" required>
                                            <option value="">Pilih Kategori</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" class="form-control" id="waktu">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="prioritas" class="form-label">Prioritas</label>
                                        <select class="form-select" id="prioritas" required>
                                            <option value="rendah">Rendah</option>
                                            <option value="sedang" selected>Sedang</option>
                                            <option value="tinggi">Tinggi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="statusPending" value="pending" checked>
                                            <label class="form-check-label" for="statusPending">Dalam Proses</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="statusSelesai" value="selesai">
                                            <label class="form-check-label" for="statusSelesai">Selesai</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2" id="btnBatal">Batal</button>
                                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan Catatan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

      
                <div id="kalender-section" class="d-none">
                    <div class="calendar-container">
                        <div id="calendar"></div>
                    </div>
                </div>

         
                <div id="statistik-section" class="d-none">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Statistik Catatan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="statistikChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Ringkasan</h5>
                                </div>
                                <div class="card-body">
                                    <div id="ringkasanStatistik">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

      
                <div id="pengaturan-section" class="d-none">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Pengaturan Aplikasi</h5>
                        </div>
                        <div class="card-body">
                            <form id="pengaturanForm">
                                <div class="settings-group">
                                    <h6 class="section-title">Umum</h6>
                                    <div class="setting-item">
                                        <div>
                                            <label for="nama_aplikasi" class="form-label">Nama Aplikasi</label>
                                            <p class="text-muted small mb-0">Nama yang ditampilkan di header aplikasi
                                            </p>
                                        </div>
                                        <input type="text" class="form-control w-50" id="nama_aplikasi"
                                            name="nama_aplikasi">
                                    </div>
                                    <div class="setting-item">
                                        <div>
                                            <label for="items_per_page" class="form-label">Item per Halaman</label>
                                            <p class="text-muted small mb-0">Jumlah item yang ditampilkan per halaman
                                            </p>
                                        </div>
                                        <input type="number" class="form-control w-25" id="items_per_page"
                                            name="items_per_page" min="5" max="50">
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <h6 class="section-title">Tampilan</h6>
                                    <div class="setting-item">
                                        <div>
                                            <label class="form-label">Mode Gelap</label>
                                            <p class="text-muted small mb-0">Aktifkan mode gelap untuk aplikasi</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="dark_mode"
                                                name="dark_mode">
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div>
                                            <label for="warna_primary" class="form-label">Warna Primer</label>
                                            <p class="text-muted small mb-0">Warna utama untuk tema aplikasi</p>
                                        </div>
                                        <input type="color" class="form-control form-control-color w-25"
                                            id="warna_primary" name="warna_primary" value="#1e4a7a">
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <h6 class="section-title">Notifikasi</h6>
                                    <div class="setting-item">
                                        <div>
                                            <label class="form-label">Aktifkan Notifikasi</label>
                                            <p class="text-muted small mb-0">Terima notifikasi untuk kegiatan mendatang
                                            </p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="notifikasi"
                                                name="notifikasi" checked>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-secondary me-2"
                                        id="btnResetPengaturan">Reset</button>
                                    <button type="submit" class="btn btn-primary" id="btnSimpanPengaturan">Simpan
                                        Pengaturan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mobile-navbar">
        <a href="#" class="mobile-nav-item active" data-section="dashboard">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        <a href="#" class="mobile-nav-item" data-section="catatan">
            <i class="fas fa-sticky-note"></i>
            <span>Catatan</span>
        </a>
        <a href="#" class="mobile-nav-item" data-section="tambah-catatan">
            <i class="fas fa-plus"></i>
            <span>Tambah</span>
        </a>
        <a href="#" class="mobile-nav-item" data-section="kalender">
            <i class="fas fa-calendar"></i>
            <span>Kalender</span>
        </a>
        <a href="#" class="mobile-nav-item" data-section="statistik">
            <i class="fas fa-chart-bar"></i>
            <span>Statistik</span>
        </a>
    </div>


    <div class="modal fade" id="hapusModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus catatan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="btnHapusConfirm">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/id.js"></script>
    <script>

        let catatanData = [];
        let kategoriData = [];
        let catatanIdToDelete = null;
        let currentSection = 'dashboard';
        let calendar;

   
        async function loadData() {
            try {
           
                const responseCatatan = await fetch('config.php');
                catatanData = await responseCatatan.json();

             
                const responseKategori = await fetch('config.php?action=kategori');
                kategoriData = await responseKategori.json();

              
                await loadPengaturan();

              
                renderSection();
            } catch (error) {
                console.error('Error loading data:', error);
            }
        }

   
        async function loadPengaturan() {
            try {
                const response = await fetch('config.php?action=pengaturan');
                const pengaturan = await response.json();

            
                document.getElementById('nama_aplikasi').value = pengaturan.nama_aplikasi || 'PLANIFY ONLINE';
                document.getElementById('items_per_page').value = pengaturan.items_per_page || '10';
                document.getElementById('warna_primary').value = pengaturan.warna_primary || '#1e4a7a';
                document.getElementById('notifikasi').checked = pengaturan.notifikasi === '1';
                document.getElementById('dark_mode').checked = pengaturan.theme === 'dark';
                document.getElementById('darkModeToggle').checked = pengaturan.theme === 'dark';

            
                applyPengaturan(pengaturan);

            } catch (error) {
                console.error('Error loading pengaturan:', error);
            }
        }

      
        function applyPengaturan(pengaturan) {
           
            const appName = pengaturan.nama_aplikasi || 'PLANIFY ONLINE';
            document.querySelector('.gov-logo-title').textContent = appName.toUpperCase();

         
            if (pengaturan.theme === 'dark') {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
            }

            
            if (pengaturan.warna_primary) {
                applyPrimaryColor(pengaturan.warna_primary);
            }
        }

      
        function applyPrimaryColor(color) {
            document.documentElement.style.setProperty('--primary', color);

         
            const secondary = adjustColor(color, -20);
            document.documentElement.style.setProperty('--secondary', secondary);

        
            const govBlue = adjustColor(color, -40);
            document.documentElement.style.setProperty('--gov-blue', govBlue);
        }

      
        async function simpanPengaturan(formData) {
            try {
                const response = await fetch('config.php?action=pengaturan', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Pengaturan berhasil disimpan',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        applyPengaturan(formData);
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal Menyimpan!',
                        text: 'Gagal menyimpan pengaturan: ' + result.error,
                    });
                }
            } catch (error) {
                console.error('Error saving pengaturan:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan!',
                    text: 'Terjadi kesalahan saat menyimpan pengaturan',
                });
            }

        }

   
        document.getElementById('pengaturanForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = {
                nama_aplikasi: document.getElementById('nama_aplikasi').value,
                items_per_page: document.getElementById('items_per_page').value,
                warna_primary: document.getElementById('warna_primary').value,
                notifikasi: document.getElementById('notifikasi').checked ? '1' : '0',
                theme: document.getElementById('dark_mode').checked ? 'dark' : 'light'
            };

            simpanPengaturan(formData);
        });

      
        document.getElementById('warna_primary').addEventListener('change', function () {
            applyPrimaryColor(this.value);
        });

      
        document.getElementById('darkModeToggle').addEventListener('change', function () {
            const isDarkMode = this.checked;
            document.body.classList.toggle('dark-mode', isDarkMode);

           
            document.getElementById('dark_mode').checked = isDarkMode;

         
            const formData = {
                theme: isDarkMode ? 'dark' : 'light'
            };
            simpanPengaturan(formData);
        });

     
document.getElementById('btnResetPengaturan').addEventListener('click', function () {
    const defaultSettings = {
        nama_aplikasi: 'PLANIFY ONLINE',
        items_per_page: '10',
        warna_primary: '#1e4a7a',
        notifikasi: '1',
        theme: 'light'
    };

    document.getElementById('nama_aplikasi').value = defaultSettings.nama_aplikasi;
    document.getElementById('items_per_page').value = defaultSettings.items_per_page;
    document.getElementById('warna_primary').value = defaultSettings.warna_primary;
    document.getElementById('notifikasi').checked = defaultSettings.notifikasi === '1';
    document.getElementById('dark_mode').checked = defaultSettings.theme === 'dark';
    document.getElementById('darkModeToggle').checked = defaultSettings.theme === 'dark';

    applyPengaturan(defaultSettings);
    simpanPengaturan(defaultSettings);
});

       
        function adjustColor(hex, percent) {
         
            let r = parseInt(hex.slice(1, 3), 16);
            let g = parseInt(hex.slice(3, 5), 16);
            let b = parseInt(hex.slice(5, 7), 16);

        
            r = Math.max(0, Math.min(255, r + percent));
            g = Math.max(0, Math.min(255, g + percent));
            b = Math.max(0, Math.min(255, b + percent));

         
            return "#" + [r, g, b].map(x => {
                const hex = Math.round(x).toString(16);
                return hex.length === 1 ? '0' + hex : hex;
            }).join('');
        }

   
        function renderSection() {
            switch (currentSection) {
                case 'dashboard':
                    renderDashboard();
                    break;
                case 'catatan':
                    renderCatatanSection();
                    break;
                case 'tambah-catatan':
                    renderTambahCatatanSection();
                    break;
                case 'kalender':
                    renderKalenderSection();
                    break;
                case 'statistik':
                    renderStatistikSection();
                    break;
                case 'pengaturan':

                    break;
            }
        }


        function renderDashboard() {
            renderStats();
            renderRecentActivities();
            renderStatusChart();
        }

        function renderStats() {
            const totalCatatan = catatanData.length;
            const catatanSelesai = catatanData.filter(item => item.status === 'selesai').length;
            const catatanPending = totalCatatan - catatanSelesai;
            const totalKategori = kategoriData.length;

            document.getElementById('totalCatatan').textContent = totalCatatan;
            document.getElementById('catatanSelesai').textContent = catatanSelesai;
            document.getElementById('catatanPending').textContent = catatanPending;
            document.getElementById('totalKategori').textContent = totalKategori;
        }

 
        function renderRecentActivities() {
            const container = document.getElementById('recent-activities');
            const recentData = catatanData.slice(0, 5);

            if (recentData.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4">
                        <i class="fas fa-sticky-note fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada catatan.</p>
                    </div>
                `;
                return;
            }

            let html = '';

            recentData.forEach(catatan => {
                const tanggal = new Date(catatan.tanggal).toLocaleDateString('id-ID');
                const prioritasClass = `prioritas-${catatan.prioritas}`;

                html += `
                    <div class="catatan-item ${prioritasClass}">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${catatan.judul}</h6>
                                <p class="mb-1 text-muted small">${catatan.deskripsi || 'Tidak ada deskripsi'}</p>
                                <div class="d-flex flex-wrap align-items-center mt-2">
                                    <span class="badge status-badge status-${catatan.status} me-2">
                                        ${catatan.status === 'selesai' ? 'Selesai' : 'Dalam Proses'}
                                    </span>
                                    <span class="me-2">
                                        <span class="kategori-badge" style="background-color: ${catatan.kategori_warna || '#6c757d'}"></span>
                                        ${catatan.kategori_nama || 'Tanpa Kategori'}
                                    </span>
                                    <small class="text-muted">${tanggal}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

       
        function renderStatusChart() {
            const ctx = document.getElementById('statusChart').getContext('2d');
            const selesai = catatanData.filter(item => item.status === 'selesai').length;
            const pending = catatanData.filter(item => item.status === 'pending').length;

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Selesai', 'Dalam Proses'],
                    datasets: [{
                        data: [selesai, pending],
                        backgroundColor: ['#28a745', '#ffc107'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

     
        function renderCatatanSection() {
            renderKategoriOptions('filterKategori');
            renderCatatan();
        }

     
        function renderCatatan() {
            const container = document.getElementById('daftarCatatan');

            if (catatanData.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4">
                        <i class="fas fa-sticky-note fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada catatan. Tambahkan catatan pertama Anda!</p>
                    </div>
                `;
                return;
            }

            let html = '';

            catatanData.forEach(catatan => {
                const tanggal = new Date(catatan.tanggal).toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                const waktu = catatan.waktu ? catatan.waktu.substring(0, 5) : '';
                const prioritasClass = `prioritas-${catatan.prioritas}`;

                html += `
                    <div class="catatan-item ${prioritasClass}">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${catatan.judul}</h6>
                                <p class="mb-1 text-muted">${catatan.deskripsi || 'Tidak ada deskripsi'}</p>
                                <div class="d-flex flex-wrap align-items-center mt-2">
                                    <span class="badge status-badge status-${catatan.status} me-2">
                                        ${catatan.status === 'selesai' ? 'Selesai' : 'Dalam Proses'}
                                    </span>
                                    <span class="badge bg-light text-dark me-2">
                                        <i class="fas fa-flag me-1"></i>${catatan.prioritas}
                                    </span>
                                    <span class="me-2">
                                        <span class="kategori-badge" style="background-color: ${catatan.kategori_warna || '#6c757d'}"></span>
                                        ${catatan.kategori_nama || 'Tanpa Kategori'}
                                    </span>
                                    <small class="text-muted me-2">
                                        <i class="fas fa-calendar me-1"></i>${tanggal}
                                    </small>
                                    ${waktu ? `<small class="text-muted"><i class="fas fa-clock me-1"></i>${waktu}</small>` : ''}
                                </div>
                            </div>
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary edit-catatan" data-id="${catatan.id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger hapus-catatan" data-id="${catatan.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;

            document.querySelectorAll('.edit-catatan').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    editCatatan(id);
                });
            });

            document.querySelectorAll('.hapus-catatan').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    confirmHapus(id);
                });
            });
        }

        function renderKategoriOptions(selectId) {
            const select = document.getElementById(selectId);
            select.innerHTML = '<option value="">Pilih Kategori</option>';

            kategoriData.forEach(kategori => {
                select.innerHTML += `
                    <option value="${kategori.id}">${kategori.nama}</option>
                `;
            });
        }

        function renderTambahCatatanSection() {
            renderKategoriOptions('kategori');
            document.getElementById('tanggal').valueAsDate = new Date();
        }

        function renderKalenderSection() {
            const calendarEl = document.getElementById('calendar');

            if (calendar) {
                calendar.destroy();
            }

            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                events: catatanData.map(catatan => ({
                    title: catatan.judul,
                    start: catatan.tanggal,
                    extendedProps: {
                        deskripsi: catatan.deskripsi,
                        status: catatan.status,
                        prioritas: catatan.prioritas
                    },
                    backgroundColor: catatan.kategori_warna || '#1e4a7a',
                    borderColor: catatan.kategori_warna || '#1e4a7a'
                })),
                eventClick: function (info) {
                    const { title, extendedProps } = info.event;
                    const deskripsi = extendedProps.deskripsi || 'Tidak ada deskripsi';
                    const status = extendedProps.status || '-';
                    const prioritas = extendedProps.prioritas || '-';

                    Swal.fire({
                        title: title,
                        html: `
                            <div style="text-align:left">
                                <p><strong>Deskripsi:</strong> ${deskripsi}</p>
                                <p><strong>Status:</strong> ${status}</p>
                                <p><strong>Prioritas:</strong> ${prioritas}</p>
                            </div>
                        `,
                        icon: 'info',
                        confirmButtonText: 'Ok'
                    });
                }

            });

            calendar.render();
        }

        function renderStatistikSection() {
            renderStatistikChart();
            renderRingkasanStatistik();
        }

        function renderStatistikChart() {
            const ctx = document.getElementById('statistikChart').getContext('2d');

            const labels = kategoriData.map(k => k.nama);
            const data = kategoriData.map(k =>
                catatanData.filter(c => c.kategori_id == k.id).length
            );

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Catatan per Kategori',
                        data: data,
                        backgroundColor: kategoriData.map(k => k.warna),
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        }

        function renderRingkasanStatistik() {
            const container = document.getElementById('ringkasanStatistik');

            const total = catatanData.length;
            const selesai = catatanData.filter(item => item.status === 'selesai').length;
            const pending = catatanData.filter(item => item.status === 'pending').length;
            const tinggi = catatanData.filter(item => item.prioritas === 'tinggi').length;
            const sedang = catatanData.filter(item => item.prioritas === 'sedang').length;
            const rendah = catatanData.filter(item => item.prioritas === 'rendah').length;

            const persentaseSelesai = total > 0 ? ((selesai / total) * 100).toFixed(1) : 0;

            container.innerHTML = `
                <div class="mb-3">
                    <h6>Total Catatan</h6>
                    <h3>${total}</h3>
                </div>
                <div class="mb-3">
                    <h6>Tingkat Penyelesaian</h6>
                    <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: ${persentaseSelesai}%">${persentaseSelesai}%</div>
                    </div>
                    <small class="text-muted">${selesai} dari ${total} catatan selesai</small>
                </div>
                <div class="mb-3">
                    <h6>Distribusi Prioritas</h6>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Tinggi</span>
                        <span>${tinggi}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Sedang</span>
                        <span>${sedang}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Rendah</span>
                        <span>${rendah}</span>
                    </div>
                </div>
            `;
        }

   
        function showTambahForm() {
            showSection('tambah-catatan');
        }

      
        function showSection(section) {
           
            document.querySelectorAll('[id$="-section"]').forEach(el => {
                el.classList.add('d-none');
            });

          
            document.getElementById(`${section}-section`).classList.remove('d-none');

          
            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            const desktopLink = document.querySelector(`[data-section="${section}"]`);
            if (desktopLink) desktopLink.classList.add('active');

           
            document.querySelectorAll('.mobile-nav-item').forEach(item => {
                item.classList.remove('active');
            });
            const mobileItem = document.querySelector(`.mobile-nav-item[data-section="${section}"]`);
            if (mobileItem) mobileItem.classList.add('active');

         
            currentSection = section;
            renderSection();
        }

       
        function editCatatan(id) {
            const catatan = catatanData.find(item => item.id == id);

            if (catatan) {
                document.getElementById('catatanId').value = catatan.id;
                document.getElementById('judul').value = catatan.judul;
                document.getElementById('deskripsi').value = catatan.deskripsi || '';
                document.getElementById('kategori').value = catatan.kategori_id || '';
                document.getElementById('tanggal').value = catatan.tanggal;
                document.getElementById('waktu').value = catatan.waktu || '';
                document.getElementById('prioritas').value = catatan.prioritas;

                if (catatan.status === 'selesai') {
                    document.getElementById('statusSelesai').checked = true;
                } else {
                    document.getElementById('statusPending').checked = true;
                }

                showSection('tambah-catatan');
            }
        }

       
        function confirmHapus(id) {
            catatanIdToDelete = id;
            const modal = new bootstrap.Modal(document.getElementById('hapusModal'));
            modal.show();
        }

     
        async function hapusCatatan() {
            if (!catatanIdToDelete) return;

            try {
                const response = await fetch(`config.php?id=${catatanIdToDelete}`, {
                    method: 'DELETE'
                });

                const result = await response.json();

                if (result.success) {
                 
                    const modal = bootstrap.Modal.getInstance(document.getElementById('hapusModal'));
                    modal.hide();

                 
                    loadData();
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal Menghapus!',
                        text: 'Gagal menghapus catatan: ' + result.error
                    });
                }
            } catch (error) {
                console.error('Error deleting catatan:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan!',
                    text: 'Terjadi kesalahan saat menghapus catatan'
                });
            }

        }


        async function simpanCatatan(formData) {
            const id = document.getElementById('catatanId').value;
            const url = id ? `config.php?id=${id}` : 'config.php?action=tambah';
            const method = id ? 'PUT' : 'POST';

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                  
                    showSection('catatan');
                    loadData();
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal Menyimpan!',
                        text: 'Gagal menyimpan catatan: ' + result.error
                    });
                }
            } catch (error) {
                console.error('Error saving catatan:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan!',
                    text: 'Terjadi kesalahan saat menyimpan catatan'
                });
            }

        }

        async function terapkanFilter() {
            const filters = {
                kategori: document.getElementById('filterKategori').value,
                status: document.getElementById('filterStatus').value,
                prioritas: document.getElementById('filterPrioritas').value,
                tanggal: document.getElementById('filterTanggal').value
            };

           
            Object.keys(filters).forEach(key => {
                if (!filters[key]) delete filters[key];
            });

            try {
                const queryParams = new URLSearchParams(filters).toString();
                const response = await fetch(`config.php?action=filter&${queryParams}`);
                catatanData = await response.json();
                renderCatatan();
            } catch (error) {
                console.error('Error filtering data:', error);
            }
        }

        // Fungsi untuk reset filter
        function resetFilter() {
            document.getElementById('filterKategori').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterPrioritas').value = '';
            document.getElementById('filterTanggal').value = '';
            loadData();
        }

        
        async function simpanPengaturan(formData) {
            try {
                const response = await fetch('config.php?action=pengaturan', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Pengaturan berhasil disimpan',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        loadPengaturan();
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal Menyimpan!',
                        text: 'Gagal menyimpan pengaturan: ' + result.error
                    });
                }
            } catch (error) {
                console.error('Error saving pengaturan:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan!',
                    text: 'Terjadi kesalahan saat menyimpan pengaturan'
                });
            }

        }

   
        function updateCurrentDate() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', options);
        }

       
        document.addEventListener('DOMContentLoaded', function () {
       
            updateCurrentDate();

           
            loadData();

        
            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const section = this.getAttribute('data-section');
                    showSection(section);
                });
            });

          
            document.querySelectorAll('.mobile-nav-item').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const section = this.getAttribute('data-section');
                    showSection(section);
                });
            });

            document.getElementById('navPengaturan').addEventListener('click', function (e) {
                e.preventDefault();
                showSection('pengaturan');
            });

           
            document.getElementById('btnTambahBaru').addEventListener('click', showTambahForm);

         
            document.getElementById('btnBatal').addEventListener('click', function () {
                showSection('catatan');
            });

           
            document.getElementById('catatanForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = {
                    judul: document.getElementById('judul').value,
                    deskripsi: document.getElementById('deskripsi').value,
                    kategori_id: document.getElementById('kategori').value || null,
                    tanggal: document.getElementById('tanggal').value,
                    waktu: document.getElementById('waktu').value,
                    status: document.querySelector('input[name="status"]:checked').value,
                    prioritas: document.getElementById('prioritas').value
                };

                simpanCatatan(formData);
            });

         
            document.getElementById('btnHapusConfirm').addEventListener('click', hapusCatatan);

        
            document.getElementById('btnTerapkanFilter').addEventListener('click', terapkanFilter);
            document.getElementById('btnResetFilter').addEventListener('click', resetFilter);

      
            document.getElementById('pengaturanForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = {
                    nama_aplikasi: document.getElementById('nama_aplikasi').value,
                    items_per_page: document.getElementById('items_per_page').value,
                    warna_primary: document.getElementById('warna_primary').value,
                    notifikasi: document.getElementById('notifikasi').checked ? '1' : '0',
                    theme: document.getElementById('dark_mode').checked ? 'dark' : 'light'
                };

                simpanPengaturan(formData);
            });

            document.getElementById('btnResetPengaturan').addEventListener('click', function () {
                Swal.fire({
                    title: 'Reset Pengaturan?',
                    text: 'Apakah Anda yakin ingin mengembalikan pengaturan ke default?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1e4a7a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Reset!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        document.getElementById('pengaturanForm').reset();
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Semua pengaturan telah dikembalikan ke default.',
                            icon: 'success',
                            confirmButtonColor: '#1e4a7a'
                        });
                    }
                });
            });

          
            document.getElementById('darkModeToggle').addEventListener('change', function () {
                document.body.classList.toggle('dark-mode', this.checked);
               
                const formData = {
                    theme: this.checked ? 'dark' : 'light'
                };
                simpanPengaturan(formData);
            });
        });
    </script>
</body>

</html>