@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Surat Masuk</h3>
            <a href="{{ route('suratmasuk.create') }}" class="btn btn-md btn-success">Input Surat</a>
            <a href="{{ route('exportmasuk') }}" class="btn btn-md btn-success">Export Surat Masuk</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="hasil-pencarian" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Surat</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
                            <th>Tanggal</th>
                            <th>File</th>
                            <th>Disposisi</th>
                            <th>Action</th>
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suratmasuk as $key => $surat)
                        <tr>
                            <td>{{ $key + 1 }}</td>
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
                                 <a class="btn btn-sm btn-primary" href="{{ route('disposisi.create', ['surat_id' => $surat->id]) }}" class="d-inline">Buat</a>
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
                                <a class="btn btn-sm btn-info" href="{{ route('pdf', $surat->id) }}" class="d-inline">Cetak</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
