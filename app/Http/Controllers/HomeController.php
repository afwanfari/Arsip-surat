<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Menghitung jumlah surat masuk
        $jumlahSuratMasuk = DB::table('surat_masuk')->count();

        // Menghitung jumlah surat keluar
        $jumlahSuratKeluar = DB::table('surat_keluar')->count();

        $jumlahdisposisi = DB::table('disposisi')->count();

        return view('layouts.dashboard', [
            'jumlahSuratMasuk' => $jumlahSuratMasuk,
            'jumlahSuratKeluar' => $jumlahSuratKeluar,
            'jumlahdisposisi' => $jumlahdisposisi,
        ]);
    }
}
