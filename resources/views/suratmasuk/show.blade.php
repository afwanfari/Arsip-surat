<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Disposisi</title>
    <!-- Panggil library Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mb-1 justify-content-left">
            <div class="col-md-3 text-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNvb2yR87_JIe7S_iG54piGE55UQjzLXd__aDer1rGDg&s"
                    style="max-width: 300px; max-height: 200px;">
            </div>
            <div class="col-md-6 text-center">
                <h4>PEMERINTAH KABUPATEN TEMANGGUNG</h4>
                <h4>Kantor Desa Candimulyo</h4>
                <p>Dusun Sosoran, Desa CandiMulyo, Kec. Kedu, Kabupaten Temanggung, Jawa Tengah 56252</p>
                <p>Email: candimulyo-kedu@temanggungkab.go.id</p>
                <h3>TEMANGGUNG</h3>
            </div>
            <hr style="width: 100%; border-top: 1px solid #000;">
        </div>
        <div class="row mb-4 justify-content-center">
            <div class="col-md-5 text-center ">
                <b>LEMBAR DISPOSISI</b>
            </div>
            <hr style="width: 100%; border-top: 1px solid #000;">
        </div>
        <div class="row mb-2 justify-content-left">
            <div class="col-md-3 text-left">
                <!-- Isi Surat -->
                <p> <b> Surat dari :</b> {{ $disposisi->pengirim }}</p>
                <p> <b> No Surat :</b> {{ $disposisi->nomor_surat }}</p>
                <p> <b> Tanggal Surat :</b>{{ $disposisi->tanggal_disposisi }}</p>
            </div>
            <div class="col-md-3 text-left">
                <!-- Isi Surat -->
                <p> <b> Tanggal Diterima:</b>{{ $disposisi->tanggal }}</p>
                <p> <b> No Agenda :</b> {{ $disposisi->nomor_agenda }}</p>
                <p> <b> Jenis surat :</b> {{ $disposisi->nama_jenis_disposisi }}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <hr style="width: 100%; border-top: 1px solid #000;">
            <div class="col-md-12 text-left">
                <!-- Spasi -->
                <p> <b> Perihal :</b> {{ $disposisi->perihal }}</p>
            </div>
            <hr style="width: 100%; border-top: 1px solid #000;">
        </div>
        <div class="row mb-4 justify-content-left">
            <div class="col-md-5 text-left">
                <p> <b> Di Teruskan Kepada : </b>{{ $disposisi->jabatan_orang_dituju }}</p>
            </div>
            <div class="col-md-6 text-left">
                <p> <b>Dengan Hormat Mohon : </b>{{ $disposisi->nama_jenis_disposisi }}</p>
            </div>
            <hr style="width: 100%; border-top: 1px solid #000;">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 text-right">
                <p>KEPALA DESA CANDIMULYO</p>
                <br>
                <br>
                <p>DANAR PRABOWO</p>
            </div>
        </div>
    </div>
</body>

</html>