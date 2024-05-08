<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return view('suratkeluar.index', compact('suratKeluar'));
    }

    // Menampilkan form untuk membuat surat keluar baru
    public function create()
    {
        return view('suratkeluar.create');
    }

    // Menyimpan surat keluar baru
    public function store(Request $request)
{
    $request->validate([
        'nomor_surat' => 'required|string|max:50',
        'tanggal' => 'required|date',
        'penerima' => 'required|string|max:100',
        'pembuat' => 'required|string|max:100',
        'alamat_penerima' => 'required|string|max:255',
        'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Mengubah 'lampiran' menjadi 'file' dan menambahkan 'file' sebagai tipe validasi
        'perihal' => 'required|string|max:255',
        'isi_surat' => 'required|string',
    ]);

    $input = $request->all();
    if ($request->hasFile('lampiran')) { 
        $lampiran = $request->file('lampiran'); // Menggunakan 'lampiran' sebagai nama field
        $nama_lampiran = time() . '_' . $lampiran->getClientOriginalName();
        $lampiran->move(public_path('lampiran'), $nama_lampiran); // Mengubah 'gambar' menjadi 'lampiran'
        $input['lampiran'] = $nama_lampiran; // Mengubah 'file' menjadi 'lampiran' sebagai nama field
    }

    SuratKeluar::create($input);

    return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil disimpan.');
}


    // Menampilkan detail surat keluar
    public function show($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('suratkeluar.show', compact('suratKeluar'));
    }

    // Menampilkan form untuk mengedit surat keluar
    public function edit($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('suratkeluar.edit', compact('suratKeluar'));
    }

    // Menyimpan perubahan pada surat keluar yang diedit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'pembuat' => 'required|string|max:100',
            'penerima' => 'required|string|max:100',
            'alamat_penerima' => 'required|string|max:255',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Mengubah 'lampiran' menjadi 'file' dan menambahkan 'file' sebagai tipe validasi
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
        ]);
    
        $suratKeluar = SuratKeluar::findOrFail($id);
        $input = $request->all();
        if ($request->hasFile('lampiran')) { // Mengubah pengecekan dari 'file' menjadi 'lampiran'
            $lampiran = $request->file('lampiran'); // Menggunakan 'lampiran' sebagai nama field
            $nama_lampiran = time() . '_' . $lampiran->getClientOriginalName();
            $lampiran->move(public_path('lampiran'), $nama_lampiran); // Mengubah 'gambar' menjadi 'lampiran'
            $input['lampiran'] = $nama_lampiran; // Mengubah 'file' menjadi 'lampiran' sebagai nama field
        }
    
        $suratKeluar->update($input);
    
        return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil diperbarui.');
    }
    

    // Menghapus surat keluar
    public function destroy($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->delete();

        return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil dihapus.');
    }
}
