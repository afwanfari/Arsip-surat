<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat</title>
    <!-- Panggil library Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row mb-1 justify-content-left">
                <div class="col-md-3 text-left">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNvb2yR87_JIe7S_iG54piGE55UQjzLXd__aDer1rGDg&s" style="max-width: 300px; max-height: 200px;">
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
        <div class="row mb-4 justify-content-center align-items-start">
                <div class="col-md-10 text-right">
                    <p>Temanggung, {{ $suratKeluar->tanggal }}</p>
                </div>
        </div>
        <div class="row mb-4 justify-content-center align-items-start">
                <div class="col-md-12 text-left">
                    <!-- Isi Surat -->
                    <p> <b> No Surat    :</b> {{ $suratKeluar->nomor_surat }}</p>
                    <p> <b> Perihal     :</b>{{ $suratKeluar->perihal }}</p>
                    <p> <b> Kepada Yth. </b> {{ $suratKeluar->penerima }}</p>
                </div>
        </div>
        <div class="row justify-content-center">
                <div class="col-md-12 text-left">
                    <p>Dengan hormat,</p>
                    <!-- Spasi -->
                    <div style="height: 5px;"></div>
                    <p>{{ $suratKeluar->isi_surat }}</p>
                </div>
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
    <script>
    window.onload = function() {
        window.print();
    }
</script>
</body>
</html>
