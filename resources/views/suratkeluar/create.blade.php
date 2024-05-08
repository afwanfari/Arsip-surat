<!-- resources/views/suratkeluar/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Surat Keluar</title>
    <!-- Panggil library Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Surat Keluar</h2>
        <form action="{{ route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" >
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" >
            </div>
            <div class="form-group">
                <label for="penerima">Penerima Surat</label>
                <input type="text" class="form-control" id="penerima" name="penerima" >
            </div>
            <div class="form-group">
                <label for="pembuat">Pembuat Surat</label>
                <input type="text" class="form-control" id="pembuat" name="pembuat" >
            </div>
            <div class="form-group">
                <label for="alamat_penerima">Alamat Penerima</label>
                <input type="text" class="form-control" id="alamat_penerima" name="alamat_penerima" >
            </div>
            <div class="form-group">
                <label for="lampiran">File</label>
                <input type="file" class="form-control-file" id="lampiran" name="lampiran">
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" >
            </div>
            <div class="form-group">
                <label for="isi_surat">Isi Surat</label>
                <textarea class="form-control" id="isi_surat" name="isi_surat"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <!-- Panggil library Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
