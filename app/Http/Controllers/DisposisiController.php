<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Models\orangditujuModel;
use App\Models\jenisdisposisiModel;
use App\Http\Controllers\Controller;

class DisposisiController extends Controller
{
    public function index()
    {
        // Menggunakan Eloquent untuk melakukan join antara tabel disposisi, surat_masuk, dan jenis_disposisi
        $disposisi = Disposisi::with('suratMasuk', 'jenisDisposisi', 'orangDituju')->get();

        return view('disposisi.index', compact('disposisi'));
    }

    public function create($surat_id)
    {
        // Mengambil informasi surat masuk berdasarkan ID yang diterima
        $suratmasuk = SuratMasuk::find($surat_id);

        // Jika surat masuk tidak ditemukan, kembalikan respons dengan pesan error
        if (!$suratmasuk) {
            return redirect()->back()->with('error', 'Surat masuk tidak ditemukan.');
        }

        $orang = orangditujuModel::all();
        $jenisDisposisi = jenisdisposisiModel::all();

        return view('disposisi.create', compact('suratmasuk', 'jenisDisposisi', 'orang'));
    }

    public function store(Request $request)
{
    $request->validate([
        'surat_masuk_id' => 'required|exists:surat_masuk,id',
        'nomor_agenda' => 'required|string',
        'orang_dituju_id' => 'required|exists:orang_dituju,id',
        'catatan' => 'nullable|string',
        'tanggal_disposisi' => 'required|date',
        'jenis_disposisi_id' => 'required|exists:jenis_disposisi,id',
    ]);

    Disposisi::create([
        'id_surat_masuk' => $request->surat_masuk_id,
        'orang_dituju_id' => $request->orang_dituju_id,
        'nomor_agenda' => $request->nomor_agenda,
        'perihal' => $request->catatan,
        'tanggal_disposisi' => $request->tanggal_disposisi,
        'jenis_disposisi_id' => $request->jenis_disposisi_id,
    ]);

    return redirect()->route('suratmasuk.index')->with('success', 'Disposisi berhasil disimpan.');
}

    public function edit($id)
    {
        $disposisi = Disposisi::findOrFail($id);
        $disposisi->tanggal_disposisi = \Carbon\Carbon::parse($disposisi->tanggal_disposisi);

        $suratMasuk = SuratMasuk::all();
        $orang = orangditujuModel::all();
        $jenisDisposisi = jenisdisposisiModel::all();

        return view('disposisi.edit', compact('disposisi', 'suratMasuk', 'orang', 'jenisDisposisi'));
    }

    public function update(Request $request, $id)
    {
        // Validate the fields that can be updated
        $validatedData = $request->validate([
            'surat_masuk_id' => 'required|exists:surat_masuk,id',
            'nomor_agenda' => 'required|string|max:255',
            'orang_dituju_id' => 'required|exists:orang_dituju,id',
            'perihal' => 'nullable|string|max:255',
            'tanggal_disposisi' => 'required|date',
            'jenis_disposisi_id' => 'required|exists:jenis_disposisi,id',
        ]);
    
        // Find the Disposisi record or throw a 404 error
        $disposisi = Disposisi::findOrFail($id);
    
        // Update the record with new values
        $disposisi->update($validatedData);
    
        // Redirect with a success message
        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $disposisi = Disposisi::find($id);
        if (!$disposisi) {
            abort(404, 'Disposisi tidak ditemukan');
        }
        $disposisi->delete();
        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil dihapus');
    }
}  