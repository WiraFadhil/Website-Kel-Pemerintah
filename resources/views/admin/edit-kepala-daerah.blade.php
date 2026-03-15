<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kepala Daerah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-2">
            <!-- Tombol Back -->
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Edit Kepala Daerah</h2>
        </div>

        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
        </div>
    </header>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="m-0">Edit Data Kepala Daerah</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama', $data->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tempat Lahir --}}
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    id="tempat_lahir" name="tempat_lahir"
                                    value="{{ old('tempat_lahir', $data->tempat_lahir) }}" required>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Agama --}}
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" id="agama"
                                    name="agama" required>
                                    @php
                                        $agamaOptions = [
                                            'Islam',
                                            'Kristen Protestan',
                                            'Katolik',
                                            'Hindu',
                                            'Buddha',
                                            'Khonghucu',
                                        ];
                                    @endphp
                                    @foreach ($agamaOptions as $option)
                                        <option value="{{ $option }}"
                                            {{ old('agama', $data->agama) == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jabatan --}}
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" value="{{ old('jabatan', $data->jabatan) }}"
                                    required>
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                    required>{{ old('alamat', $data->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nama Istri --}}
                            <div class="mb-3">
                                <label for="nama_istri" class="form-label">Nama Istri</label>
                                <input type="text" class="form-control @error('nama_istri') is-invalid @enderror"
                                    id="nama_istri" name="nama_istri"
                                    value="{{ old('nama_istri', $data->nama_istri) }}">
                                @error('nama_istri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Foto --}}
                            <div class="mb-3">
                                <label for="foto" class="form-label">Ganti Foto</label>
                                <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                    id="foto" name="foto">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if ($data->foto)
                                    <div class="mt-2">
                                        <p>Foto Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $data->foto) }}"
                                            alt="Foto {{ $data->nama }}" style="max-width: 200px; height: auto;">
                                    </div>
                                @endif
                            </div>

                            {{-- Jumlah Anak --}}
                            <div class="mb-3">
                                <label for="anak" class="form-label">Jumlah Anak</label>
                                <input type="number" class="form-control @error('anak') is-invalid @enderror"
                                    id="anak" name="anak" value="{{ old('anak', $data->anak) }}"
                                    min="0" required>
                                @error('anak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Riwayat Jabatan --}}
                            <div class="mb-3">
                                <label for="riwayat_jabatan" class="form-label">Riwayat Jabatan</label>
                                <textarea class="form-control @error('riwayat_jabatan') is-invalid @enderror" id="riwayat_jabatan"
                                    name="riwayat_jabatan" rows="5">{{ old('riwayat_jabatan', $data->riwayat_jabatan) }}</textarea>
                                @error('riwayat_jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-save me-1"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('admin.kepala-daerah') }}" class="btn btn-secondary">
                                    <i class="fa-solid fa-arrow-left me-1"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Overlay untuk sidebar mobile --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const closeSidebar = document.getElementById('close-sidebar');

            if (menuToggle && sidebar && overlay && closeSidebar) {
                function toggleSidebar() {
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                }

                menuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleSidebar();
                });

                overlay.addEventListener('click', toggleSidebar);
                closeSidebar.addEventListener('click', toggleSidebar);
            }
        });
    </script>
</body>

</html>
