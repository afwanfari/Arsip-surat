<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKeluarController extends Controller
{
    /**
     * Menampilkan semua surat keluar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua surat keluar dari database
        $suratKeluar = DB::table('surat_keluar')->get();
        
        // Mengirim data surat keluar ke view untuk ditampilkan
        return view('suratkeluar.index', compact('suratKeluar'));
    }

    /**
     * Menampilkan formulir untuk membuat surat keluar baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suratkeluar.create');
    }

    /**
     * Menyimpan surat keluar yang baru dibuat ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'penerima' => 'required|string|max:100',
            'alamat_penerima' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
        ]);

        // Simpan data surat keluar ke dalam database
        DB::table('surat_keluar')->insert([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'penerima' => $request->penerima,
            'alamat_penerima' => $request->alamat_penerima,
            'perihal' => $request->perihal,
            'isi_surat' => $request->isi_surat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke halaman surat keluar dengan pesan sukses
        return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil disimpan.');
    }

    /**
     * Menampilkan detail surat keluar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil data surat keluar berdasarkan ID
        $suratKeluar = DB::table('surat_keluar')->find($id);

        // Jika surat keluar tidak ditemukan, kembalikan ke halaman sebelumnya
        if (!$suratKeluar) {
            return redirect()->back()->with('error', 'Surat keluar tidak ditemukan.');
        }

        // Tampilkan detail surat keluar
        return view('suratkeluar.show', compact('suratKeluar'));
    }

    /**
     * Menampilkan formulir untuk mengedit surat keluar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mengambil data surat keluar berdasarkan ID
        $suratKeluar = DB::table('surat_keluar')->find($id);

        // Jika surat keluar tidak ditemukan, kembalikan ke halaman sebelumnya
        if (!$suratKeluar) {
            return redirect()->back()->with('error', 'Surat keluar tidak ditemukan.');
        }

        // Tampilkan formulir untuk mengedit surat keluar
        return view('suratkeluar.edit', compact('suratKeluar'));
    }

    /**
     * Memperbarui surat keluar yang ada di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'penerima' => 'required|string|max:100',
            'alamat_penerima' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
        ]);

        // Update data surat keluar di dalam database
        DB::table('surat_keluar')->where('id', $id)->update([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'penerima' => $request->penerima,
            'alamat_penerima' => $request->alamat_penerima,
            'perihal' => $request->perihal,
            'isi_surat' => $request->isi_surat,
            'updated_at' => now(),
        ]);

        // Redirect ke halaman surat keluar dengan pesan sukses
        return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil diperbarui.');
    }

    /**
     * Menghapus surat keluar dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus data surat keluar dari database
        DB::table('surat_keluar')->where('id', $id)->delete();

        // Redirect ke halaman surat keluar dengan pesan sukses
        return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil dihapus.');
    }
}
