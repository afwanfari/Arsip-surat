<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h3>Edit Surat Masuk</h3>
             <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="container">
                    <form action="{{ route('suratmasuk.update', $suratmasuk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat:</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $suratmasuk->nomor_surat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $suratmasuk->tanggal }}" required>
                        </div>
                        <div class="form-group">
                            <label for="pengirim">Pengirim:</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{ $suratmasuk->pengirim }}" required>
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal:</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" value="{{ $suratmasuk->perihal }}" required>
                        </div>
                        <div class="form-group">
                            <label for="file">File (PDF/Gambar):</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                 </table>
            </div>
        </div>
    </div>
</div>
