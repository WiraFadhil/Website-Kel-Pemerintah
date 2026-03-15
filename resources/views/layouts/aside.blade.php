<aside id="sidebar"
    class="w-64 bg-green-800 p-4 flex-shrink-0 flex flex-col fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out z-40 bg-gradient-to-br from-green-800 to-green-900">

    <div class="flex flex-col h-full">
        <div class="flex items-center justify-between md:justify-center py-4 mb-4 border-b border-green-700">
            <div class="flex items-center">
                <i class="fas fa-shield-alt text-3xl text-green-300"></i>
                <h1 class="text-2xl font-bold ml-3 text-white">Admin Panel</h1>
            </div>
            <button id="close-sidebar" class="md:hidden text-green-200 hover:text-white">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>

        <nav class="flex-grow overflow-y-auto sidebar-scroll">
            {{-- TIPS: Untuk link yang aktif, tambahkan kelas "bg-green-700 text-white" --}}
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-tachometer-alt w-6"></i>
                <span class="ml-4">Dashboard</span>
            </a>

            <p class="px-4 mt-4 mb-2 text-xs text-green-400 uppercase font-bold tracking-wider">Profil</p>
            <a href="{{ route('admin.kepala-daerah') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-user-tie w-6"></i>
                <span class="ml-4">Kepala Daerah</span>
            </a>
            <a href="{{ route('admin.struktur') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-sitemap w-6"></i>
                <span class="ml-4">Struktur Organisasi</span>
            </a>

            <p class="px-4 mt-4 mb-2 text-xs text-green-400 uppercase font-bold tracking-wider">Konten</p>
            <a href="{{ route('admin.slider') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-images w-6"></i>
                <span class="ml-4">Sliders</span>
            </a>
            <a href="{{ route('admin.data-statistik') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-chart-pie w-6"></i>
                <span class="ml-4">Data Statistik</span>
            </a>
            <a href="{{ route('admin.berita') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-newspaper w-6"></i>
                <span class="ml-4">Berita</span>
            </a>
            <a href="{{ route('admin.artikel') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-pen-alt w-6"></i>
                <span class="ml-4">Artikel</span>
            </a>
            <a href="{{ route('admin.album') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-photo-video w-6"></i>
                <span class="ml-4">Galeri</span>
            </a>
            <a href="{{ route('admin.penghargaan') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-award w-6"></i>
                <span class="ml-4">Penghargaan</span>
            </a>
            <a href="{{ route('admin.pengaduan') }}"
                class="flex items-center px-4 py-3 rounded-lg text-green-100 hover:bg-green-700 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-bullhorn w-6"></i>
                <span class="ml-4">Pengaduan</span>
            </a>
        </nav>

        <div class="mt-4 pt-4 border-t border-green-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-4 py-3 text-green-100 hover:bg-red-600 hover:text-white rounded-lg text-left font-medium transition-colors duration-200">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span class="ml-4">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
