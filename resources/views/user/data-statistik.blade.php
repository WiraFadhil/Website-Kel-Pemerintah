<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik - Kelurahan Balang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">
    @include('layouts.navbar')

    <main>
        <section class="bg-white py-6 border-b shadow-sm">
            <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between md:items-center">
                <h1 class="text-3xl font-bold text-slate-800">Data Statistik Kelurahan Balang</h1>
                <nav class="text-sm font-medium mt-2 md:mt-0">
                    <a href="#" class="hover:underline text-green-600">Beranda</a>
                    <span class="mx-2 text-slate-500">/</span>
                    <span class="text-slate-700">Data Statistik</span>
                </nav>
            </div>
        </section>

        <section class="container mx-auto px-6 py-12 md:py-16">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @if (isset($summary['total_population']))
                    <div class="bg-white p-6 rounded-xl shadow-lg flex items-center space-x-4">
                        <div class="bg-green-100 p-4 rounded-full"><i class="fas fa-users text-3xl text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm">{{ $summary['total_population']->title }}</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $summary['total_population']->value }}
                                {{ $summary['total_population']->unit }}</p>
                        </div>
                    </div>
                @endif
                @if (isset($summary['total_families']))
                    <div class="bg-white p-6 rounded-xl shadow-lg flex items-center space-x-4">
                        <div class="bg-blue-100 p-4 rounded-full"><i
                                class="fas fa-house-user text-3xl text-blue-600"></i></div>
                        <div>
                            <p class="text-slate-500 text-sm">{{ $summary['total_families']->title }}</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $summary['total_families']->value }}
                                {{ $summary['total_families']->unit }}</p>
                        </div>
                    </div>
                @endif
                @if (isset($summary['area_size']))
                    <div class="bg-white p-6 rounded-xl shadow-lg flex items-center space-x-4">
                        <div class="bg-purple-100 p-4 rounded-full"><i
                                class="fas fa-map-marked-alt text-3xl text-purple-600"></i></div>
                        <div>
                            <p class="text-slate-500 text-sm">{{ $summary['area_size']->title }}</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $summary['area_size']->value }}
                                {{ $summary['area_size']->unit }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <div class="bg-white p-8 rounded-xl shadow-lg lg:col-span-2">
                    <div class="flex items-center mb-6"><i class="fas fa-chart-line text-3xl text-green-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Grafik Kependudukan</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-center mb-4 text-slate-700">Komposisi Jenis Kelamin
                            </h3>
                            <div id="gender-chart"></div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-center mb-4 text-slate-700">Komposisi Usia</h3>
                            <div id="age-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6"><i class="fas fa-building-user text-3xl text-blue-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Wilayah & Fasilitas Sosial</h2>
                    </div>
                    <div class="space-y-4">
                        @if (isset($territory_social['total_rw']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $territory_social['total_rw']->title }}</span><span
                                    class="font-bold">{{ $territory_social['total_rw']->value }} <span
                                        class="font-normal">{{ $territory_social['total_rw']->unit }}</span></span>
                            </div>
                        @endif
                        @if (isset($territory_social['total_rt']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $territory_social['total_rt']->title }}</span><span
                                    class="font-bold">{{ $territory_social['total_rt']->value }} <span
                                        class="font-normal">{{ $territory_social['total_rt']->unit }}</span></span>
                            </div>
                        @endif
                        @if (isset($territory_social['health_facilities']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $territory_social['health_facilities']->title }}</span><span
                                    class="font-bold">{{ $territory_social['health_facilities']->value }} <span
                                        class="font-normal">{{ $territory_social['health_facilities']->unit }}</span></span>
                            </div>
                        @endif
                        @if (isset($territory_social['education_facilities']))
                            <div class="flex justify-between text-sm"><span
                                    class="text-slate-600">{{ $territory_social['education_facilities']->title }}</span><span
                                    class="font-bold">{{ $territory_social['education_facilities']->value }} <span
                                        class="font-normal">{{ $territory_social['education_facilities']->unit }}</span></span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6"><i
                            class="fas fa-concierge-bell text-3xl text-yellow-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Layanan Publik</h2>
                    </div>
                    <div class="space-y-4">
                        @if (isset($public_service['avg_letters_monthly']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $public_service['avg_letters_monthly']->title }}</span><span
                                    class="font-bold">{{ $public_service['avg_letters_monthly']->value }} <span
                                        class="font-normal">{{ $public_service['avg_letters_monthly']->unit }}</span></span>
                            </div>
                        @endif
                        @if (isset($public_service['social_aid_recipients']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $public_service['social_aid_recipients']->title }}</span><span
                                    class="font-bold">{{ $public_service['social_aid_recipients']->value }} <span
                                        class="font-normal">{{ $public_service['social_aid_recipients']->unit }}</span></span>
                            </div>
                        @endif
                        @if (isset($public_service['ektp_ownership_rate']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $public_service['ektp_ownership_rate']->title }}</span><span
                                    class="font-bold">{{ $public_service['ektp_ownership_rate']->value }}{{ $public_service['ektp_ownership_rate']->unit }}</span>
                            </div>
                        @endif
                        @if (isset($public_service['family_card_updates']))
                            <div class="flex justify-between text-sm"><span
                                    class="text-slate-600">{{ $public_service['family_card_updates']->title }}</span><span
                                    class="font-bold">{{ $public_service['family_card_updates']->value }} <span
                                        class="font-normal">{{ $public_service['family_card_updates']->unit }}</span></span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg lg:col-span-2">
                    <div class="flex items-center mb-6"><i class="fas fa-store text-3xl text-red-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Potensi Ekonomi</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                        @if (isset($economy['total_msmes']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $economy['total_msmes']->title }}</span><span
                                    class="font-bold">{{ $economy['total_msmes']->value }} <span
                                        class="font-normal">{{ $economy['total_msmes']->unit }}</span></span></div>
                        @endif
                        @if (isset($economy['local_markets']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $economy['local_markets']->title }}</span><span
                                    class="font-bold">{{ $economy['local_markets']->value }} <span
                                        class="font-normal">{{ $economy['local_markets']->unit }}</span></span></div>
                        @endif
                        @if (isset($economy['home_industries']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $economy['home_industries']->title }}</span><span
                                    class="font-bold">{{ $economy['home_industries']->value }} <span
                                        class="font-normal">{{ $economy['home_industries']->unit }}</span></span>
                            </div>
                        @endif
                        @if (isset($economy['tourism_spots']))
                            <div class="flex justify-between border-b pb-2 text-sm"><span
                                    class="text-slate-600">{{ $economy['tourism_spots']->title }}</span><span
                                    class="font-bold">{{ $economy['tourism_spots']->value }} <span
                                        class="font-normal">{{ $economy['tourism_spots']->unit }}</span></span></div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Helper function untuk mengubah string "8.750" menjadi angka 8750
            const parseNumber = (str) => parseInt(str.replace(/\./g, ''));

            // --- GRAFIK KOMPOSISI JENIS KELAMIN (DONUT CHART) ---
            @if (isset($demographics['male_population'], $demographics['female_population']))
                var genderOptions = {
                    series: [
                        parseNumber("{{ $demographics['male_population']->value }}"),
                        parseNumber("{{ $demographics['female_population']->value }}")
                    ],
                    chart: {
                        type: 'donut',
                        height: 350
                    },
                    labels: ['Laki-laki', 'Perempuan'],
                    colors: ['#2563eb', '#ec4899'], // Biru dan Pink
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: '100%'
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };
                var genderChart = new ApexCharts(document.querySelector("#gender-chart"), genderOptions);
                genderChart.render();
            @endif


            // --- GRAFIK KOMPOSISI USIA (BAR CHART) ---
            @if (isset($summary['total_population'], $demographics['productive_age_population']))
                // Kalkulasi data usia
                const totalPopulation = parseNumber("{{ $summary['total_population']->value }}");
                const productivePercent = parseNumber("{{ $demographics['productive_age_population']->value }}");
                const productiveCount = Math.round(totalPopulation * (productivePercent / 100));
                const nonProductiveCount = totalPopulation - productiveCount;

                // Asumsi pembagian usia non-produktif (bisa disesuaikan)
                const childrenCount = Math.round(nonProductiveCount * 0.65); // 65% non-produktif adalah anak-anak
                const elderlyCount = nonProductiveCount - childrenCount; // Sisanya lansia

                var ageOptions = {
                    series: [{
                        name: 'Jumlah Jiwa',
                        data: [childrenCount, productiveCount, elderlyCount]
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                        }
                    },
                    colors: ['#10b981'], // Hijau
                    dataLabels: {
                        enabled: true
                    },
                    xaxis: {
                        categories: ['Anak-anak (0-14)', 'Produktif (15-64)', 'Lansia (65+)'],
                    },
                    tooltip: {
                        y: {
                            formatter: (val) => val + " Jiwa"
                        }
                    }
                };
                var ageChart = new ApexCharts(document.querySelector("#age-chart"), ageOptions);
                ageChart.render();
            @endif
        });
    </script>

    <script>
        // Menunggu hingga seluruh dokumen HTML selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {

            // Mengambil semua tombol yang akan memicu dropdown
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    // Menghentikan event agar tidak langsung ditangkap oleh 'window'
                    event.stopPropagation();

                    // Menemukan menu dropdown yang sesuai (elemen saudara berikutnya)
                    const dropdownMenu = this.nextElementSibling;

                    // Menutup semua dropdown lain yang mungkin sedang terbuka
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        if (menu !== dropdownMenu) {
                            menu.classList.add('hidden');
                        }
                    });

                    // Membuka atau menutup dropdown yang diklik
                    dropdownMenu.classList.toggle('hidden');
                });
            });

            // 3. Logika untuk Submenu (nested dropdown)
            const submenuToggles = document.querySelectorAll('.submenu-toggle');

            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    // Cegah link berpindah halaman saat diklik
                    event.preventDefault();
                    event.stopPropagation();

                    const submenu = this.nextElementSibling;

                    // Tutup semua submenu lain pada level yang sama
                    const parentMenu = this.closest('.dropdown-menu');
                    parentMenu.querySelectorAll('.submenu').forEach(s => {
                        if (s !== submenu) {
                            s.classList.add('hidden');
                        }
                    });

                    submenu.classList.toggle('hidden');
                });
            });

            window.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            });
        });
    </script>

    <script>
        // Toggle menu pada mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>
