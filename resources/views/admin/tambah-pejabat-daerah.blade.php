<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pejabat Daerah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-2">
            <!-- Tombol Back -->
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Tambah Pejabat Daerah</h2>
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
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah Data Pejabat Daerah</h3>
                    </div>
                    <div class="card-body">
                        {{-- Arahkan action ke route untuk proses update, lewatkan ID --}}
                        <form action="{{ route('admin.pejabat-daerah-store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

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
                                            {{ old('agama') == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                    required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_istri" class="form-label">Nama Istri</label>
                                <input type="text" class="form-control @error('nama_istri') is-invalid @enderror"
                                    id="nama_istri" name="nama_istri" value="{{ old('nama_istri') }}">
                                @error('nama_istri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Ganti Foto</label>
                                <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                    id="foto" name="foto">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                            </div>

                            <div class="mb-3">
                                <label for="anak" class="form-label">Jumlah Anak</label>
                                <input type="number" class="form-control @error('anak') is-invalid @enderror"
                                    id="anak" name="anak" value="{{ old('anak') }}" required
                                    min="0">
                                @error('anak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="riwayat_jabatan" class="form-label">Riwayat Jabatan</label>
                                <textarea class="form-control @error('riwayat_jabatan') is-invalid @enderror" id="riwayat_jabatan"
                                    name="riwayat_jabatan" rows="5">{{ old('riwayat_jabatan') }}</textarea>
                                @error('riwayat_jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
