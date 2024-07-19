<div class="container mx-auto px-4">
    <div class="card mx-auto max-w-lg">
        <h3 class="card-header text-center text-xl font-bold mb-4">Tambah Surat Masuk</h3>
        <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data" class="card-body space-y-4">
            @csrf
            <div>
                <label for="nomor_surat" class="block text-gray-700 text-sm font-bold mb-2">Nomor Surat:</label>
                <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="nomor_surat" name="nomor_surat" required>
            </div>
            <div>
                <label for="pengirim" class="block text-gray-700 text-sm font-bold mb-2">Asal Surat:</label>
                <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="pengirim" name="pengirim" required>
            </div>
            <div>
                <label for="perihal" class="block text-gray-700 text-sm font-bold mb-2">Perihal:</label>
                <input type="text" class="border border-gray-300 rounded px-4 py-2 w-full" id="perihal" name="perihal" required>
            </div>
            <div>
                <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Surat:</label>
                <input type="date" class="border border-gray-300 rounded px-4 py-2 w-full" id="tanggal" name="tanggal" required>
            </div>
            <div>
                <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File (PDF/Gambar):</label>
                <input type="file" class="border border-gray-300 rounded px-4 py-2 w-full" id="file" name="file">
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Submit</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
