@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Surat Masuk</h3>
            <a href="{{ route('suratmasuk.create') }}" class="btn btn-md btn-success">Input Surat</a>
                     <form action="{{ route('suratmasuk.search') }}" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-1 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-2 medium" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="hasil-pencarian" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Surat</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
                            <th>Tanggal Surat</th>
                            <th>File</th>
                            <th>Disposisi</th>
                            <th>Action</th>
                            <th>Cetak</th>

                        </tr>
                    </thead>
                    <tbody>
                         @if($hasilPencarian)
                            @foreach($hasilPencarian as $surat)
                            <tr>
                                <td>{{ $surat->nomor_surat }}</td>
                                <td>{{ $surat->pengirim }}</td>
                                <td>{{ $surat->perihal }}</td>
                                <td>{{ $surat->tanggal }}</td>
                                <td>{{ $surat->file }}</td>
                            </tr>
                        @endforeach
                        
                        @else

                        @foreach($suratmasuk as $surat)
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->pengirim }}</td>
                            <td>{{ $surat->perihal }}</td>
                            <td>{{ $surat->tanggal }}</td>
                            <td>
                                @if (Str::endsWith($surat->file, '.pdf'))
                                    <a href="{{ asset('gambar/' . $surat->file) }}" target="_blank" class="d-inline">Preview PDF</a>
                                @else
                                    <a href="{{ asset('gambar/' . $surat->file) }}" target="_blank" class="d-inline">Preview Gambar
                                    </a>
                                @endif
                            </td>
                            <td>
                                 <a class="btn btn-sm btn-success" href="{{ route('disposisi.create', ['surat_id' => $surat->id]) }}" class="d-inline">Buat Disposisi</a>
                            </td>
                            <td>    
                                <a href="{{ route('suratmasuk.edit', $surat->id) }}"  class="btn btn-sm btn-warning" class="d-inline">Edit</a>
                                <form action="{{ route('suratmasuk.destroy', $surat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">Hapus</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('suratmasuk.show', $surat->id) }}" class="d-inline">Cetak</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
                    <script>
                        const form = document.querySelector('form');
                        const tabelHasilPencarian = document.querySelector('#hasil-pencarian tbody');

                        form.addEventListener('submit', async function(event) {
                            event.preventDefault();
                            
                            const keyword = this.elements.keyword.value;

                            try {
                                const response = await axios.get(`{{ route('suratmasuk.search') }}?keyword=${keyword}`);
                                const hasilPencarian = response.data;

                                // Bersihkan isi tabel hasil pencarian sebelum menambahkan hasil pencarian baru
                                tabelHasilPencarian.innerHTML = '';

                                // Tambahkan baris-baris hasil pencarian ke dalam tabel indeks
                                hasilPencarian.forEach(function(surat) {
                                    const row = `<tr>
                                                    <td>${surat.nomor_surat}</td>
                                                    <td>${surat.pengirim}</td>
                                                    <td>${surat.perihal}</td>
                                                    <td>${surat.tanggal}</td>
                                                    <td>${surat.file}</td>
                                                    <td>${surat.disposisi}</td>
                                                    <td>Aksi</td> <!-- Gantilah 'Aksi' dengan tindakan yang sesuai -->
                                                    <td>Cetak</td> <!-- Gantilah 'Cetak' dengan tindakan yang sesuai -->
                                                </tr>`;
                                    tabelHasilPencarian.insertAdjacentHTML('beforeend', row);
                                });
                            } catch (error) {
                                console.error('Error:', error);
                            }
                        });
                    </script>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
