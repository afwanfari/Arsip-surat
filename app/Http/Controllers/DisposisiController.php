<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DisposisiController extends Controller
{
   public function index()
    {
        // Melakukan join antara tabel disposisi, surat_masuk, dan jenis_disposisi
        $disposisi = DB::table('disposisi')
                    ->join('surat_masuk', 'disposisi.id_surat_masuk', '=', 'surat_masuk.id')
                    ->join('jenis_disposisi', 'disposisi.jenis_disposisi_id', '=', 'jenis_disposisi.id')
                    ->leftJoin('orang_dituju', 'disposisi.orang_dituju_id', '=', 'orang_dituju.id')
                    ->select('disposisi.*', 'surat_masuk.nomor_surat', 'jenis_disposisi.nama AS nama_jenis_disposisi', 'orang_dituju.jabatan AS jabatan_orang_dituju')
                    ->get();

        return view('disposisi.index', compact('disposisi'));
    }


    public function create($surat_id)
    {
        // Ambil informasi surat masuk berdasarkan ID yang diterima
        $suratmasuk = DB::table('surat_masuk')->where('id', $surat_id)->first();
        // Jika surat masuk tidak ditemukan, kembalikan respons dengan pesan error
        if (!$suratmasuk) {
        return redirect()->back()->with('error', 'Surat masuk tidak ditemukan.');
    }
        $orang = DB::table('orang_dituju')->get();
        $jenisDisposisi = DB::table('jenis_disposisi')->get();
        return view('disposisi.create', compact('suratmasuk', 'jenisDisposisi','orang'));
    }
    
    public function store(Request $request) // Menggunakan $request sebagai parameter
{
    $request->validate([
        'surat_masuk_id' => 'required|exists:surat_masuk,id',
        'nomor_agenda' => 'required|string',
        'orang_dituju_id' => 'required|exists:orang_dituju,id',
        'catatan' => 'nullable|string',
        'tanggal_disposisi' => 'required|date',
        'jenis_disposisi_id' => 'required|exists:jenis_disposisi,id',
    ]);

    DB::table('disposisi')->insert([
        'id_surat_masuk' => $request->surat_masuk_id,
        'orang_dituju_id' => $request->orang_dituju_id,
        'nomor_agenda' => $request->nomor_agenda,
        'perihal' => $request->catatan,
        'tanggal_disposisi' => $request->tanggal_disposisi,
        'jenis_disposisi_id' => $request->jenis_disposisi_id,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(), // Tambahkan updated_at jika diperlukan
    ]);

    return redirect()->route('suratmasuk.index')->with('success', 'Disposisi berhasil disimpan.');
}
    public function edit($id)
{
    // Mengambil data disposisi berdasarkan ID yang diberikan
    $disposisi = DB::table('disposisi')->find($id);
    
    // Jika disposisi tidak ditemukan, kembalikan respons 404
    if (!$disposisi) {
        abort(404, 'Disposisi tidak ditemukan');
    }
    // Mengambil data surat masuk
    $suratMasuk = DB::table('surat_masuk')->get();

    // Mengambil data jenis disposisi
    $jenisDisposisi = DB::table('jenis_disposisi')->get();

    // Mengirimkan data ke view untuk ditampilkan dalam form edit
    return view('disposisi.index', compact('disposisi', 'suratMasuk', 'jenisDisposisi'));
}


}