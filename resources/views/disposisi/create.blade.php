<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Disposisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <h1 class="h3 mb-4 text-gray-800 text-center">Buat Disposisi</h1>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('disposisi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="surat_masuk_id" value="{{ $suratmasuk->id }}">

                            <div class="form-group">
                                <label for="nomor_agenda">Nomor Agenda:</label>
                                <input type="text" class="form-control form-control-lg" id="nomor_agenda"
                                    name="nomor_agenda" required>
                            </div>

                            <div class="form-group">
                                <label for="orang_dituju_id">Tujuan Disposisi:</label>
                                <select class="form-control form-control-lg" id="orang_dituju_id" name="orang_dituju_id"
                                    required>
                                    <option value="">Pilih Tujuan Disposisi</option>
                                    @foreach ($orang as $tujuan)
                                    <option value="{{ $tujuan->id }}">{{ $tujuan->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jenis_disposisi_id">Jenis Disposisi:</label>
                                <select class="form-control form-control-lg" id="jenis_disposisi_id"
                                    name="jenis_disposisi_id" required>
                                    <option value="">Pilih Jenis Disposisi</option>
                                    @foreach ($jenisDisposisi as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="catatan">Perihal:</label>
                                <textarea class="form-control form-control-lg" id="catatan" name="catatan"
                                    rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_disposisi">Tanggal Disposisi:</label>
                                <input type="date" class="form-control form-control-lg" id="tanggal_disposisi"
                                    name="tanggal_disposisi" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Disposisi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>