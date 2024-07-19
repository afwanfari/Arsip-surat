@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        @auth
        <h1 class="h3 mb-4 text-gray-800">Selamat datang, {{ Auth::user()->name }}!</h1>
        @endauth
        <div class="container">
            <div class="card-deck">
                <!-- Surat Masuk Card -->
                <div class="card bg-primary text-white shadow mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs text-uppercase mb-1">Surat Masuk</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $jumlahSuratMasuk }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Surat Keluar Card -->
                <div class="card bg-primary text-white shadow mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs text-uppercase mb-1">Surat Keluar</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $jumlahSuratKeluar }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Disposisi Card -->
                <div class="card bg-primary text-white shadow mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs text-uppercase mb-1">Disposisi</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $jumlahdisposisi }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

