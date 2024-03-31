<!DOCTYPE html>
<html lang="en">
<style>
        /* CSS styling for PDF content */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .container {
            display: flex;
            justify-content: space-between; /* Untuk memisahkan elemen-elemen ke kanan dan kiri */
        }

        .kanan {
             float: right;
            width: 30%;
            /* Tidak perlu float: right; */
        }
        .right {
             float: right;
            width: 30%;
            /* Tidak perlu float: right; */
        }

        .kiri {
            float: left;
            width: 50%;
            /* Tidak perlu float: left; */
        }
        .left {
            float: left;
            width: 50%;
            /* Tidak perlu float: left; */
        }
        .perihal {
            text-align: left;
            width: 50%;
            /* Tidak perlu float: left; */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .spacer {
        clear: both;
        margin-bottom: 20px; /* Atur spasi antar baris */
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Disposisi</title>
    
    <!-- Panggil library Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="header">
        <div class="row mb-1 justify-content-left">
                
                <div class="col-md-6 text-center">
                    <h4>PEMERINTAH KABUPATEN TEMANGGUNG</h4>
                    <h4>Kantor Desa Candimulyo</h4>
                    <p>Dusun Sosoran, Desa CandiMulyo, Kec. Kedu, Kabupaten Temanggung, Jawa Tengah 56252</p>
                    <p>Email: candimulyo-kedu@temanggungkab.go.id</p>
                    <h3>TEMANGGUNG</h3>  
                </div>
                    <hr style="width: 100%; border-top: 1px solid #000;">      
        </div>
        
        <div class="row mb-4 justify-content-center align-items-start">
                <div class="col-md-4 text-center">
                    <h3>Lembar Disposisi</h3> 
                </div>
                <hr style="width: 100%; border-top: 1px solid #000;"> 
        </div>
        </div>
        
        <div class="row mb-4 justify-content-center align-items-start">
            <div class="kiri">
                <div class="col-md-7 text-left">
                    <!-- Isi Surat -->
                    <p> <b> Surat dari  :</b> {{ $disposisi->pengirim }}</p>
                    <p> <b> No Surat    :</b> {{ $disposisi->nomor_surat }}</p>
                    <p> <b> Tanggal Surat     :</b>{{ $disposisi->tanggal_disposisi }}</p>
                </div>
            </div>
            <div class="kanan">
                <div class="col-md-5 text-left">
                    <!-- Isi Surat -->
                    <p> <b> Tanggal Diterima:</b>{{ $disposisi->tanggal }}</p>
                    <p> <b> No Agenda       :</b> {{ $disposisi->nomor_agenda }}</p>
                    <p> <b> Jenis surat     :</b> {{ $disposisi->nama_jenis_disposisi }}</p>
                </div>
                </div>
        </div>
        <div class="perihal">
            <div class="row justify-content-center">
                <div class="col-md-12 text-left">
                    <p> <b> Perihal : </b>{{ $disposisi->perihal }}</p>
                </div>
        </div>
        </div>
        <hr style="width: 100%; border-top: 1px solid #000;">
        <div class="row justify-content-center">
                <div class="left">
                    <p> <b> Di Teruskan Kepada : </b>{{ $disposisi->jabatan_orang_dituju }}</p>
                </div>
                <div class="right">
                    <p> <b>Dengan Hormat Mohon : </b>{{ $disposisi->nama_jenis_disposisi }}</p>
                </div>
        </div>
        <div class="spacer">
            
        </div>
        <div class="row justify-content-center">
                <div class="right">
                    <p>KEPALA DESA CANDIMULYO</p>
                    <br>
                    <br>
                    <p>DANAR PRABOWO</p>
                </div>
        </div> 
    </div>
</body>
</html>
