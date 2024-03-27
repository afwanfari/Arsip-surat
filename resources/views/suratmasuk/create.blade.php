<div class="container">
    <div class="card">
        <h3 class="card-header text-center">Tambah Surat Masuk</h3>
        <div class="card-body">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pengirim" class="col-sm-3 col-form-label">Asal Surat:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pengirim" name="pengirim" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="perihal" class="col-sm-3 col-form-label">Perihal:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="perihal" name="perihal" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Surat:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file" class="col-sm-3 col-form-label">File (PDF/Gambar):</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Jangan Lupa Mengisi Surat Disposisi')">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
