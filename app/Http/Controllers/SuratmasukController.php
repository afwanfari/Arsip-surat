<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Disposisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class SuratmasukController extends Controller
{
    public function index(){
        $disposisi = DB::table('disposisi')->get();
        $suratmasuk = DB::table('surat_masuk')->get(); // Mengambil semua data
        $hasilPencarian = session()->get('hasilPencarian');
        // Tampilkan halaman indeks dengan data surat masuk dan hasil pencarian
        return view('suratmasuk.index', compact('suratmasuk','disposisi', 'hasilPencarian'));
    }
    public function create(){
    return view('suratmasuk.create');
    }
    public function store(Request $request){
        // Validasi data masukan
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Optional, validasi file file
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
        ]);
        // Inisialisasi variabel untuk menyimpan nama file
        $nama_file = null;
        // Cek apakah ada file yang diunggah
            if ($request->hasFile('file')) {
            // Simpan nama file asli
            $nama_file = $request->file('file')->getClientOriginalName();
            // Simpan file di direktori 'gambar' di dalam direktori 'public'
            $request->file('file')->move(public_path('gambar'), $nama_file);
        }
        // Simpan data surat masuk ke dalam database
        DB::table('surat_masuk')->insert([
            'nomor_surat' => $validatedData['nomor_surat'],
            'tanggal' => $validatedData['tanggal'],
            'file' => $nama_file, // Simpan nama file atau null jika tidak ada file
            'pengirim' => $validatedData['pengirim'],
            'perihal' => $validatedData['perihal'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke halaman surat masuk dengan pesan sukses
        return redirect()->route('suratmasuk.index')->with('success', [
        'message' => 'Surat masuk berhasil disimpan.',
        'file_name' => $nama_file
    ]);
    }
    public function show($surat_id)
        {
            $disposisi = Disposisi::join('surat_masuk', 'disposisi.id_surat_masuk', '=', 'surat_masuk.id')
            ->join('jenis_disposisi', 'disposisi.jenis_disposisi_id', '=', 'jenis_disposisi.id')
            ->leftJoin('orang_dituju', 'disposisi.orang_dituju_id', '=', 'orang_dituju.id')
            ->select('disposisi.*', 'surat_masuk.pengirim', 'surat_masuk.nomor_surat', 'surat_masuk.tanggal', 'jenis_disposisi.nama AS nama_jenis_disposisi', 'orang_dituju.jabatan AS jabatan_orang_dituju')
            ->where('disposisi.id_surat_masuk', $surat_id)
            ->first();
         // Inisialisasi objek dompdf
            $dompdf = new Dompdf();

            // return view('suratmasuk.show', compact('disposisi'));
            // Render HTML ke PDF menggunakan view yang baru saja dibuat
            $html = view('suratmasuk.show', compact('disposisi'))->render();
            $dompdf->loadHtml($html);

            // Atur ukuran dan orientasi dokumen
            $dompdf->setPaper('A4', 'portrait');

            // Render PDF (output)
            $dompdf->render();

            // Generate nama file PDF yang unik
            $nama_file = 'surat_masuk_' . time() . '.pdf';

            // Simpan file PDF dengan nama sementara
            $output = $dompdf->output();
            file_put_contents($nama_file, $output);

            // Kembalikan file PDF sebagai respons HTTP
            return response()->download($nama_file)->deleteFileAfterSend(true);

    }
    public function edit($id){
        $suratmasuk = DB::table('surat_masuk')->where('id', $id)->first();
                return view('suratmasuk.edit', compact('suratmasuk'));
    }
    public function update(Request $request)
        {
            // Validasi data masukan
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Optional, validasi file file
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
        ]);
                // Ambil file yang diupload
            if ($request->hasFile('file')) {
                // Simpan file ke dalam storage dan dapatkan nama filenya
                $nama_file = $request->file('file')->store('lampiran');
            } else {
                // Jika tidak ada file yang di-upload, set nama file menjadi null
                $nama_file = null;
            }
        DB::table('surat_masuk')->insert([
            'nomor_surat' => $validatedData['nomor_surat'],
            'tanggal' => $validatedData['tanggal'],
            'file' => $nama_file, // Simpan nama file atau null jika tidak ada file
            'pengirim' => $validatedData['pengirim'],
            'perihal' => $validatedData['perihal'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Redirect ke halaman surat masuk dengan pesan sukses
            return redirect()->route('suratmasuk.index')->with('success', 'Surat masuk berhasil disimpan.');
    }
    public function destroy($id){
        // Hapus data surat masuk dari database
        DB::table('surat_masuk')->where('id', $id)->delete();

        // Redirect ke halaman surat masuk dengan pesan sukses
        return redirect()->route('suratmasuk.index')->with('success', 'Surat masuk berhasil dihapus.');
    }
    public function search(Request $request)
        {
            // Validasi request
            $request->validate([
                'keyword' => 'required|string', // Ubah validasi sesuai dengan kebutuhan Anda
            ]);

            // Ambil kata kunci pencarian dari request
            $keyword = $request->input('keyword');

            // Lakukan pencarian surat masuk berdasarkan nomor surat, pengirim, atau subjek
            $hasilPencarian = DB::table('surat_masuk')->where('nomor_surat', 'like', "%$keyword%")
                                        ->orWhere('pengirim', 'like', "%$keyword%")
                                        ->orWhere('perihal', 'like', "%$keyword%")
                                        ->get();

            // Simpan hasil pencarian dalam session
            session()->flash('hasilPencarian', $hasilPencarian);

            // Redirect kembali ke halaman indeks
            return redirect()->route('suratmasuk.index');
        }

}
