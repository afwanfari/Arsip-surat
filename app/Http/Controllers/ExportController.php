<?php

namespace App\Http\Controllers;

use App\Exports\SuratMasukExport;
use App\Exports\SuratKeluarExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportmasuk() 
    {
        return Excel::download(new SuratMasukExport, 'suratmasuk.xlsx');
    }

    public function exportkeluar() 
    {
        return Excel::download(new SuratKeluarExport, 'suratkeluar.xlsx');
    }
}
