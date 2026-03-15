<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KepalaDaerahController;
use App\Http\Controllers\Admin\PejabatDaerahController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\BeritaUserController;
use App\Http\Controllers\User\AlbumUserController;
use App\Http\Controllers\User\KepalaDaerahUserController;
use App\Http\Controllers\User\KategoriUserController;
use App\Http\Controllers\User\ArtikelUserController;
use App\Http\Controllers\User\PenghargaanController;
use App\Http\Controllers\Admin\PenghargaanAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\User\StatistikController;
use App\Http\Controllers\Admin\StatistikAdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\User\GambaranUmumController;
use App\Http\Controllers\Admin\PengaduanController;





// ROUTE UNTUK TAMPILAN UMUM

Route::get('/kepala-daerah/lurah', [KepalaDaerahUserController::class, 'lurah'])
    ->name('user.lurah');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/beritauser', [BeritaUserController::class, 'index'])->name('user.berita');
Route::get('/detailberita/{id}', [BeritaUserController::class, 'show'])->name('berita.show');


Route::get('/artikel', [ArtikelUserController::class, 'index'])->name('user.artikel');
Route::get('/artikel/{artikel}', [ArtikelUserController::class, 'show'])->name('user.detail-artikel');

Route::get('/galeri', [AlbumUserController::class, 'albums'])->name('user.galeri');
Route::get('/detailalbum/{id}', [AlbumUserController::class, 'show'])->name('album.show');  
Route::get('/gambaranumum', [GambaranUmumController::class, 'gambaranUmum'])->name('user.gambaran-umum');

route::view('/layanan', 'user.layanan')->name('user.layanan');
Route::get('/layanan/surat-keterangan', [GambaranUmumController::class, 'layananSuratKeterangan'])->name('user.surat-keterangan');
Route::get('/layanan/administrasi-kependudukan', [GambaranUmumController::class, 'layananAdministrasi'])->name('user.administrasi-kependudukan');
Route::get('/layanan/pengaduan-masyarakat', [GambaranUmumController::class, 'layananPengaduan'])->name('user.pengaduan');


Route::get('/pengaduanadmin', [PengaduanController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pengaduan');

Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');


Route::get('/pengaduanadmin/{pengaduan}', [PengaduanController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('admin.show-pengaduan');

Route::get('/pengaduanadmin/{pengaduan}/edit', [PengaduanController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pengaduan.edit');

Route::put('/pengaduanadmin/{pengaduan}', [PengaduanController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pengaduan.update');

Route::delete('/pengaduanadmin/{pengaduan}', [PengaduanController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pengaduan.destroy');





// ROUTE UNTUK ADMIN SLIDER

Route::get('/slideradmin', [SliderController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider');

Route::get('/slideradmin/create', [SliderController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-slider');

Route::post('/slideradmin', [SliderController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider.store');

Route::get('/slideradmin/{slider}/edit', [SliderController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-slider');

Route::put('/slideradmin/{slider}', [SliderController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider.update');

Route::delete('/slideradmin/{slider}', [SliderController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider.destroy');




// ROUTE UNTUK ADMIN PEGAWAI
Route::get('/pegawaiadmin', [PegawaiController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.struktur');

Route::get('/pegawaiadmin/create', [PegawaiController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-pegawai');

Route::post('/pegawaiadmin', [PegawaiController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pegawai.store');

Route::get('/pegawaiadmin/{pegawai}/edit', [PegawaiController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-pegawai');

Route::put('/pegawaiadmin/{pegawai}', [PegawaiController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pegawai.update');

Route::delete('/pegawaiadmin/{pegawai}', [PegawaiController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pegawai.destroy');







// PENGHARGAAN ROUTES
Route::get('/penghargaan', [PenghargaanController::class, 'index'])->name('user.penghargaan');

Route::get('/penghargaanadmin', [PenghargaanAdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan');

Route::get('/penghargaanadmin/create', [PenghargaanAdminController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-penghargaan');

Route::post('/penghargaanadmin', [PenghargaanAdminController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan-store');

Route::get('/penghargaanadmin/{id}/edit', [PenghargaanAdminController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-penghargaan');

Route::put('/penghargaanadmin/{id}', [PenghargaanAdminController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan-update');

Route::delete('/penghargaanadmin/{id}', [PenghargaanAdminController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan.destroy');




// ROUTE UNTUK STATISTIK
Route::get('/datastatistik', [StatistikController::class, 'index'])->name('user.data-statistik');

Route::get('/datastatistikadmin', [StatistikAdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik');

Route::get('/datastatistikadmin/create', [StatistikAdminController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-data-statistik');

Route::post('/datastatistikadmin', [StatistikAdminController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik.store');

Route::get('/datastatistik/{statistic}/edit', [StatistikAdminController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-data-statistik');

Route::put('/datastatistikadmin/{statistic}', [StatistikAdminController::class, 'update']) 
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik.update');

Route::delete('/datastatistikadmin/{statistic}', [StatistikAdminController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik.destroy');



Route::get('/kategori/{kategori}', [KategoriUserController::class, 'show'])->name('user.kategori');



// ROUTE UNTUK ADMIN
Route::get('/dashboard', [DashboardAdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::get('/artikeladmin', [ArtikelController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel');

Route::get('/artikeladmin/create', [ArtikelController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-artikel');

Route::post('/artikeladmin', [ArtikelController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-store');

Route::get('/artikeladmin/{id}/edit', [ArtikelController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-artikel');

Route::put('/artikeladmin/{id}', [ArtikelController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-update');

Route::delete('/artikeladmin/{id}', [ArtikelController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-destroy');

// ROUTE UNTUK ADMIN GALERI

Route::get('/admin/galeri/{album}', [AlbumController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('admin.galeri');



// END ROUTE ADMIN GALERI

Route::get('/albumadmin', [AlbumController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.album');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // == ROUTE UNTUK MANAJEMEN ALBUM ==
    Route::get('/albums', [AlbumController::class, 'index'])->name('admin.album');
    Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');
    // Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('admin.galeri'); // Ini mengarah ke Kelola Foto
    Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');

    // == ROUTE UNTUK MANAJEMEN FOTO (di dalam album) ==
    Route::post('/photos', [PhotoController::class, 'store'])->name('photo.store');
    Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photo.update');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photo.destroy');
    Route::put('/photos/{photo}/set-cover', [PhotoController::class, 'setCover'])->name('photo.setcover');

});



// KATEGORI BERITA ROUTES
Route::get('/beritaadmin', [BeritaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.berita');

Route::get('/beritaadmin/create', [BeritaController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-berita');

Route::post('/beritaadmin', [BeritaController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-berita-store');

Route::get('/beritaadmin/{id}/edit', [BeritaController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-berita');

Route::put('/beritaadmin/{id}', [BeritaController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update-berita');

Route::delete('/beritaadmin/{id}', [BeritaController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.berita-destroy');




// KEPALA DAERAH ROUTES

Route::get('/kepaladaerahadmin', [KepalaDaerahController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.kepala-daerah');

Route::get('/kepala-daerah/{id}/edit', [KepalaDaerahController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-kepala-daerah');

Route::put('/kepala-daerah/{id}', [KepalaDaerahController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
