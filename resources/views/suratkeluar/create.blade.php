<!-- resources/views/suratkeluar/create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Surat keluar</title>
    <!-- Panggil library Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold mb-4">Tambah Surat keluar</h2>
        <div class="bg-white rounded shadow p-8">
            <form action="{{ route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <label for="nomor_surat" class="block text-gray-700 text-sm font-bold mb-2">Nomor Surat</label>
                    <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="nomor_surat"
                        name="nomor_surat">
                </div>

                <div class="space-y-2">
                    <label for="penerima" class="block text-gray-700 text-sm font-bold mb-2">Penerima Surat</label>
                    <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="penerima"
                        name="penerima">
                </div>
                <div class="space-y-2">
                    <label for="pembuat" class="block text-gray-700 text-sm font-bold mb-2">Pembuat Surat</label>
                    <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="pembuat"
                        name="pembuat">
                </div>
                <div class="space-y-2">
                    <label for="alamat_penerima" class="block text-gray-700 text-sm font-bold mb-2">Alamat
                        Penerima</label>
                    <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="alamat_penerima"
                        name="alamat_penerima">
                </div>

                <div class="space-y-2">
                    <label for="perihal" class="block text-gray-700 text-sm font-bold mb-2">Perihal</label>
                    <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="perihal"
                        name="perihal">
                </div>
                <div class="space-y-2">
                    <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal</label>
                    <input type="date" class="border border-gray-300 rounded px-4 py-2 w-full" id="tanggal"
                        name="tanggal">
                </div>
                <div class="space-y-2">
                    <label for="isi_surat" class="block text-gray-700 text-sm font-bold mb-2">Isi Surat</label>
                    <textarea class="border border-gray-300 rounded px-4 py-2 w-full" id="isi_surat"
                        name="isi_surat"></textarea>
                </div>
                <div class="space-y-2">
                    <label for="lampiran" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                    <input type="file" class="border border-gray-300 rounded px-4 py-2 w-full" id="lampiran"
                        name="lampiran">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Panggil library Tailwind CSS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.js"></script>
</body>