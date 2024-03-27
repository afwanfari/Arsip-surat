<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Disposisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Disposisi</h1>
        <form action="{{ route('disposisi.update', $disposisi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="surat_masuk_id">Surat Masuk:</label>
                <select class="form-control" id="surat_masuk_id" name="surat_masuk_id" required>
                    @foreach ($suratMasuk as $surat)
                        <option value="{{ $surat->id }}" {{ $disposisi->id_surat_masuk == $surat->id ? 'selected' : '' }}>
                            {{ $surat->nomor_surat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="disposisi_kepada">Tujuan Disposisi:</label>
                <input type="text" class="form-control" id="disposisi_kepada" name="disposisi_kepada" value="{{ $disposisi->disposisi_kepada }}" required>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan:</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="5">{{ $disposisi->catatan }}</textarea>
            </div>
            <div class="form-group">
                <label for="tanggal_disposisi">Tanggal Disposisi:</label>
                <input type="date" class="form-control" id="tanggal_disposisi" name="tanggal_disposisi" value="{{ $disposisi->tanggal_disposisi }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_disposisi_id">Jenis Disposisi:</label>
                <select class="form-control" id="jenis_disposisi_id" name="jenis_disposisi_id" required>
                    @foreach ($jenisDisposisi as $jenis)
                        <option value="{{ $jenis->id }}" {{ $disposisi->jenis_disposisi_id == $jenis->id ? 'selected' : '' }}>
                            {{ $jenis->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
