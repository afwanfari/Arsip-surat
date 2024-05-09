@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
           <h1>Daftar Surat Keluar</h1>
            <a href="{{ route('suratkeluar.create') }}"  class="btn btn-primary">Buat Surat Keluar Baru</a>
            <a href="{{ route('exportkeluar') }}" class="btn btn-md btn-success">Export Surat Keluar</a>
                </div>
                 @if ($suratKeluar->isEmpty())
                <p>Tidak ada surat keluar.</p>
                @else
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembuat</th>
                                    <th>Nomor Surat</th>
                                    <th>Penerima</th>
                                    <th>Perihal</th>
                                    <th>Tanggal</th>
                                    <th>Lampiran</th>
                                    <th>Action</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suratKeluar as $key => $surat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $surat->pembuat }}</td>
                                    <td>{{ $surat->nomor_surat }}</td>
                                    <td>{{ $surat->penerima }}</td>
                                    <td>{{ $surat->perihal }}</td>
                                    <td>{{ $surat->tanggal }}</td>
                                    <td>
                                        @if (Str::endsWith($surat->lampiran, '.pdf'))
                                            <a href="{{ asset('lampiran/' . $surat->lampiran) }}" target="_blank" class="d-inline">Preview PDF</a>
                                        @else
                                            <a href="{{ asset('lampiran/' . $surat->lampiran) }}" target="_blank" class="d-inline">Preview Gambar
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('suratkeluar.edit', $surat->id) }}"  class="btn btn-sm btn-warning" class="d-inline">Edit</a>
                                        <form action="{{ route('suratkeluar.destroy', $surat->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">Hapus</button>
                                    <td>
                                        <a href="{{ route('suratkeluar.show', $surat->id) }}"  class="btn btn-sm btn-info">Cetak</a>
                                    </td>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        @endif
    </div>
</div>
@endsection
