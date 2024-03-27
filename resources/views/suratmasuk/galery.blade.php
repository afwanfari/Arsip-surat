<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Gallery</title>
</head>
<body>
    <h1>Image Gallery</h1>
    <div>
        @foreach($suratmasuk as $surat)
            <img src="{{ route('suratmasuk.tampil', $surat->id) }}" alt="Deskripsi Gambar">
        @endforeach
        
    </div>
</body>
</html>
