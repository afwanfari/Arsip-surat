<div class="container">
    <div class="card">
        <h5 class="card-header">Tambah Surat Keluar</h5>
        <div class="card-body">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <form action="{{ route('suratkeluar.store') }}" method="POST">
            @csrf
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="nomor_surat">Nomor Surat:</label></td>
                        <td><input type="text" class="form-control form-control-sm" id="nomor_surat" name="nomor_surat" required></td>
                        <td><label for="tanggal">Tanggal:</label></td>
                        <td><input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" required></td>
                    </tr>
                    <tr>
                        <td><label for="penerima">Penerima:</label></td>
                        <td><input type="text" class="form-control form-control-sm" id="penerima" name="penerima" required></td>
                        <td><label for="alamat_penerima">Alamat Penerima:</label></td>
                        <td><input type="text" class="form-control form-control-sm" id="alamat_penerima" name="alamat_penerima" required></td>
                    </tr>
                    <tr>
                        <td><label for="perihal">Perihal:</label></td>
                        <td><input type="text" class="form-control form-control-sm" id="perihal" name="perihal" required></td>
                        <td><label for="isi_surat">Isi Surat:</label></td>
                        <td><textarea class="form-control form-control-sm" id="isi_surat" name="isi_surat" rows="5" required></textarea></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
