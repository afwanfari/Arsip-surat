<?php

namespace App\Http\Controllers;


use App\Models\Disposisi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class PDFController extends Controller
{
    
    public function generatePDF($surat_id)
    {
        $disposisi = Disposisi::join('surat_masuk', 'disposisi.id_surat_masuk', '=', 'surat_masuk.id')
        ->join('jenis_disposisi', 'disposisi.jenis_disposisi_id', '=', 'jenis_disposisi.id')
        ->leftJoin('orang_dituju', 'disposisi.orang_dituju_id', '=', 'orang_dituju.id')
        ->select('disposisi.*', 'surat_masuk.pengirim', 'surat_masuk.nomor_surat', 'surat_masuk.tanggal', 'jenis_disposisi.nama AS nama_jenis_disposisi', 'orang_dituju.jabatan AS jabatan_orang_dituju')
        ->where('disposisi.id_surat_masuk', $surat_id)
        ->first();

    // Pastikan disposisi ditemukan
    if (!$disposisi) {
        return response()->json(['message' => 'Disposisi tidak ditemukan'], 404);
    }
    
    // Load view 'suratmasuk.show' dengan data disposisi
    $pdf = PDF::loadView('suratmasuk.show', compact('disposisi'));
    $pdf->setPaper('landscape');
    // Unduh PDF dengan nama yang dinamis
    return $pdf->download('surat_masuk_' . time() . '.pdf');
    }
}
