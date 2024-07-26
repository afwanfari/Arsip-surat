<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Disposisi</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto p-4 md:p-6 lg:p-12">
        <h1 class="text-3xl font-bold mb-4">Edit Disposisi</h1>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('disposisi.update', $disposisi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="surat_masuk_id" class="block text-gray-700 text-sm font-bold mb-2">Surat Masuk:</label>
                <select
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                    id="surat_masuk_id" name="surat_masuk_id" required>
                    @foreach ($suratMasuk as $surat)
                    <option value="{{ $surat->id }}" {{ $disposisi->surat_masuk_id == $surat->id ? 'selected' : '' }}>
                        {{ $surat->nomor_surat }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="orang_dituju_id" class="block text-gray-700 text-sm font-bold mb-2">Tujuan
                    Disposisi:</label>
                <select
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                    id="orang_dituju_id" name="orang_dituju_id" required>
                    @foreach ($orang as $tujuan)
                    <option value="{{ $tujuan->id }}" {{ $disposisi->orang_dituju_id == $tujuan->id ? 'selected' : ''
                        }}>
                        {{ $tujuan->jabatan }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="nomor_agenda" class="block text-gray-700 text-sm font-bold mb-2">Nomor Agenda:</label>
                <input type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nomor_agenda" name="nomor_agenda" value="{{ $disposisi->nomor_agenda }}" required>
            </div>
            <div class="mb-4">
                <label for="perihal" class="block text-gray-700 text-sm font-bold mb-2">Perihal:</label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="perihal" name="perihal" rows="5" required>{{ $disposisi->perihal }}</textarea>
            </div>
            <div class="mb-4">
                <label for="tanggal_disposisi" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                    Disposisi:</label>
                <input type="date"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="tanggal_disposisi" name="tanggal_disposisi"
                    value="{{ $disposisi->tanggal_disposisi->format('Y-m-d') }}" required>
            </div>
            <div class="mb-4">
                <label for="jenis_disposisi_id" class="block text-gray-700 text-sm font-bold mb-2">Jenis
                    Disposisi:</label>
                <select
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                    id="jenis_disposisi_id" name="jenis_disposisi_id" required>
                    @foreach ($jenisDisposisi as $jenis)
                    <option value="{{ $jenis->id }}" {{ $disposisi->jenis_disposisi_id == $jenis->id ? 'selected' : ''
                        }}>
                        {{ $jenis->nama }}
                    </option>
                    @endforeach