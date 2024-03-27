<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat Keluar</title>
    <!-- Panggil library Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Surat Keluar</h1>

        <form action="{{ route('suratkeluar.update', $suratKeluar->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $suratKeluar->nomor_surat }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $suratKeluar->tanggal }}" required>
            </div>

            <div class="form-group">
                <label for="penerima">Penerima:</label>
                <input type="text" class="form-control" id="penerima" name="penerima" value="{{ $suratKeluar->penerima }}" required>
            </div>
            <div class="form-group">
                <label for="penerima">Isi Surat:</label>
                <input type="text" class="form-control" id="Isi" name="Isi" value="{{ $suratKeluar->isi_surat }}" required>
            </div>

            <!-- Tambahkan formulir untuk kolom lainnya disini -->

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
             <a href="{{ route('suratkeluar.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Panggil library Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
