<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';

    protected $fillable = [
        'nomor_surat',
        'tanggal',
        'pembuat',
        'penerima',
        'lampiran',
        'alamat_penerima',
        'isi_surat',
        'perihal',
    ];

    protected $attributes = [
        'pembuat' => 'kaur kesra',
        'pembuat' => 'kaur umum',
        'pembuat' => 'kaur tata usaha',
    ];

    
}
