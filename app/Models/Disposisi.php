<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $table = 'disposisi';

    
    protected $fillable = [
        'id_surat_masuk',
        'nomor_agenda',
        'orang_dituju_id',
        'perihal',
        'tanggal_disposisi',
        'jenis_disposisi_id',
    ];

    // Define relationships if needed
    public function suratmasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'id_surat_masuk');
    }

    public function orangDituju()
    {
        return $this->belongsTo(orangditujuModel::class, 'orang_dituju_id');
    }

    public function jenisDisposisi()
    {
        return $this->belongsTo(jenisdisposisiModel::class, 'jenis_disposisi_id');
    }
}

