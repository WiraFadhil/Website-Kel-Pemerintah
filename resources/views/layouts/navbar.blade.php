<header class="sticky top-0 z-50 shadow-md">
    <div class="bg-emerald-900 text-white text-xs">
        <div class="container mx-auto px-6 py-1.5 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-envelope"></i>
                <span>kelurahanbalang.go.id</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-emerald-300 transition-colors"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-emerald-300 transition-colors"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-emerald-300 transition-colors"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <nav class="bg-emerald-800">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Kabupaten Jeneponto" class="h-14 w-14 mr-3">
                <div>
                    <p class="text-white font-bold text-xl leading-tight">Kelurahan Balang</p>
                    <p class="text-white font-bold text-xl leading-tight">Kab. Jeneponto</p>
                </div>
            </a>

            <button id="menu-toggle" class="text-white text-2xl md:hidden focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>

            <div id="menu"
                class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-2 text-white font-medium absolute md:static top-full left-0 w-full md:w-auto bg-emerald-800 md:bg-transparent shadow-md md:shadow-none px-6 md:px-0 py-4 md:py-0 space-y-2 md:space-y-0">

                <div class="relative">
                    <a href="{{ route('dashboard') }}"
                        class="w-full text-left px-4 py-2 rounded-md hover:bg-emerald-700 transition-colors flex items-center justify-between md:justify-start">
                        Beranda
                    </a>
                </div>

                <div class="relative">
                    <button
                        class="dropdown-toggle w-full text-left px-4 py-2 rounded-md hover:bg-emerald-700 transition-colors flex items-center justify-between md:justify-start">
                        Profil Daerah <i class="fas fa-chevron-down text-xs ml-2"></i>
                    </button>
                    <div
                        class="dropdown-menu hidden md:absolute right-0 mt-2 w-full md:w-56 bg-emerald-700 rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('user.gambaran-umum') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-emerald-600 transition-colors">Gambaran
                            Umum</a>
                        <a href="{{ route('user.data-statistik') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-emerald-600 transition-colors">Data
                            Statistik</a>
                        <a href="{{ route('user.lurah') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-emerald-600 transition-colors">Kepala
                            Kelurahan</a>
                    </div>
                </div>

                <div class="relative">
                    <button
                        class="dropdown-toggle w-full text-left px-4 py-2 rounded-md hover:bg-emerald-700 transition-colors flex items-center justify-between md:justify-start">
                        Media Informasi <i class="fas fa-chevron-down text-xs ml-2"></i>
                    </button>
                    <div
                        class="dropdown-menu hidden md:absolute right-0 mt-2 w-full md:w-56 bg-emerald-700 rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('user.berita') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-emerald-600 transition-colors">Berita</a>
                        <a href="{{ route('user.galeri') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-emerald-600 transition-colors">Galeri</a>
                        <a href="{{ route('user.artikel') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-emerald-600 transition-colors">Artikel</a>
                    </div>
                </div>

                <a href="{{ route('user.penghargaan') }}"
                    class="block md:inline-block px-4 py-2 rounded-md hover:bg-emerald-700 transition-colors">Penghargaan</a>
                <a href="{{ route('login') }}"
                    class="block md:inline-block px-4 py-2 rounded-md hover:bg-emerald-700 transition-colors">Login</a>
            </div>
        </div>
    </nav>
</header>
