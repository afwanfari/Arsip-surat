@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Disposisi</h1>
            <p class="mb-4">Berikut adalah daftar disposisi yang telah dikirimkan.</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Surat Masuk</th>
                            <th>Tujuan Disposisi</th>
                            <th>Perihal</th>
                            <th>No Agenda</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disposisi as $dispo)
                        <tr>
                            <td>{{ $dispo->suratMasuk->nomor_surat }}</td>
                            <td>{{ $dispo->orangDituju->jabatan }}</td>
                            <td>{{ $dispo->perihal }}</td>
                            <td>{{ $dispo->nomor_agenda }}</td>
                            <td>
                                <a href="{{ route('disposisi.edit', $dispo->id) }}"
                                    class="btn btn-sm btn-warning mr-2">Edit</a>
                                <form action="{{ route('disposisi.destroy', $dispo->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus disposisi ini?')">Hapus</button>
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
@endsection