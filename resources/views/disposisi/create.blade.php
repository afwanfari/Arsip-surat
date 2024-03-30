<div class="container">
    <div class="card">
        <h3 class="card-header text-Center">Buat Disposisi</h3>
        <div class="card-body">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <form action="{{ route('disposisi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="surat_masuk_id">Surat Masuk:</label>
                <input type="text" class="form-control" id="surat_masuk_id" name="surat_masuk_id" value="{{ $suratmasuk->nomor_surat }}" readonly>
                <!-- Menampilkan nomor surat dari surat masuk yang telah ditentukan sebagai input yang tidak dapat diubah -->
                <input type="hidden" name="surat_masuk_id" value="{{ $suratmasuk->id }}">
                <!-- Menyimpan ID surat masuk sebagai input tersembunyi -->
            </div>
            <div class="form-group">
                <label for="nomor_agenda">Nomor Agenda:</label>
                <input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda" required>
                @error('nomor agenda')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="orang_dituju_id">Tujuan Disposisi:</label>
                <select class="form-control" id="orang_dituju_id" name="orang_dituju_id" required>
                    <option value="">Pilih Tujuan Disposisi</option>
                    @foreach ($orang as $tujuan)
                        <option value="{{ $tujuan->id }}">{{ $tujuan->jabatan }}</option>
                    @endforeach
                </select>
                @error('orang_dituju_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_disposisi_id">Jenis Disposisi:</label>
                <select class="form-control" id="jenis_disposisi_id" name="jenis_disposisi_id" required>
                    <option value="">Pilih Jenis Disposisi</option>
                    @foreach ($jenisDisposisi as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                    @endforeach
                </select>
                @error('jenis_disposisi_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="catatan">Perihal:</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="5"></textarea>
                @error('catatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_disposisi">Tanggal Disposisi:</label>
                <input type="date" class="form-control" id="tanggal_disposisi" name="tanggal_disposisi" required>
                @error('tanggal_disposisi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Disposisi</button>
        </form>
    </div>
    </div>
</div>


