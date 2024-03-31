@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h1 class="h1 mb-4 text-gray-800">Disposisi</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Surat Masuk</th>
                    <th>Tujuan Disposisi</th>
                    <th>Perihal</th>
                    <td>No Agenda</td>
                    <th>Tindakan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disposisi as $dispo)
                <tr>
                    <td>{{ $dispo->nomor_surat }}</td>
                    <td>{{ $dispo->jabatan_orang_dituju }}</td>
                    <td>{{ $dispo->perihal }}</td>
                    <td>{{ $dispo->nomor_agenda }}</td>
                    <td>{{ $dispo->nama_jenis_disposisi }}</td>
                    <td>
                        <a href="{{ route('disposisi.edit', $dispo->id) }}" class="btn btn-sm btn-warning" class="d-inline">Edit</a>
                        <form action="{{ route('disposisi.destroy', $dispo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus disposisi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
    
