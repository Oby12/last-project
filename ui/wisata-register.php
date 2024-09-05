<?php include 'header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-container">
                <h1>Pemesanan Paket Wisata</h1>
                <form action="wisata-register.php" method="post">
                    <!-- text field -->
                    <div class="mb-3">
                        <label for="nama" class="form-label"> Nama Pesanan</label>
                        <input type="text" class="form-control" id="nama" name="nama-pemesanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label"> No Telephone</label>
                        <input type="tel" class="form-control" id="telepone" name="no-telephone" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label"> Waktu Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal" name="waktu-kegiatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlahPeserta" class="form-label"> Jumlah peserta</label>
                        <input type="number" class="form-control" id="jumlahPeserta" name="jumlah-peserta" min="1" required onchange="hitungTotal()">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahWaktuKegiatan" class="form-label"> lama waktu kegiatan(Hari)</label>
                        <input type="number" class="form-control" id="jumlahWaktuKegiatan" name="lama-waktu-kegiatan" min="1" required onchange="hitungTotal()">
                    </div>
                    <div class="mb-3">
                        <label> Pelayanan Paket Perjalanan:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="penginapan" name="layanan_penginapan" value="Y"
                            onchange="hitungTotal()">
                            <label for="penginapan" class="form-check-label"> Penginapan (1.000.000)</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="transportasi" name="layanan_transportasi" value="Y"
                            onchange="hitungTotal()">
                            <label for="transportasi" class="form-check-label"> Transportasi (1.200.000)</label>
                        </div>
                        <<div class="form-check">
                            <input type="checkbox" class="form-check-input" id="makanan" name="layanan_makanan" value="Y"
                            onchange="hitungTotal()">
                            <label for="makanan" class="form-check-label"> makanan (500.000)</label>
                        </div>
                    </div>

                    <!-- form input fields -->

                    <!-- harga paket perjalanan -->
                    <div class="mb-3">
                        <label for="harga" class="form-label"> Harga Paket Perjalanan</label>
                        <input type="number" class="form-control" id="harga" name="harga_paket" readonly>
                    </div>
                    <!-- harga paket perjalanan -->

                    <!-- result bills -->
                    <div class="mb-3">
                        <label for="tagihan" class="form-label"> Jumlah tagihan:</label>
                        <input type="number" class="form-control" id="tagihan" name="tagihan" readonly>
                    </div>
                    <!-- result bills -->

                    <button type="submit" class="btn btn-primary"> Buy</button>
                    <button type="reset" class="btn btn-primary"> Cancel</button>

                </form>
            </div>
        </div>
        <div class="col-md-6">
            <!-- video youtube -->
            <div class="video-container">
                <h2>Wisata Palembang</h2>
                <div class="video">
                    <iframe src="https://youtu.be/Jk4QXfkJO4k?si=GuemrX-BlxHQ1KD9" frameborder="0" allowfullscreen width="560" height="315"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../data/connection/connection.php';

// check form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // GET DATA FROM FORM
    $namaPemesanan = $_POST['nama-pemesanan'];
    $noTelephone = $_POST['no-telephone'];
    $tanggalKegiatan = $_POST['waktu-kegiatan'];
    $jumlahPeserta = $_POST['jumlah-peserta'];
    $lamaWaktuKegiatan = $_POST['lama-waktu-kegiatan'];
    $layananPenginapan = isset($_POST['layanan_penginapan']) ? $_POST['layanan_penginapan'] : 'N';
    $layananTransportasi = isset($_POST['layanan_transportasi']) ? $_POST['layanan_transportasi'] : 'N';
    $layananMakanan = isset($_POST['layanan_makanan']) ? $_POST['layanan_makanan'] : 'N';

    // count total harga paket perjalanan
    $hargaPenginapan = 1000000;
    $hargaTransportasi = 1200000;
    $hargaMakanan = 500000;

    $totalHarga = 0;

    if ($layananPenginapan == 'Y') {
        $totalHarga += $hargaPenginapan * $jumlahPeserta * $lamaWaktuKegiatan;
    }
    if ($layananTransportasi == 'Y') {
        $totalHarga += $hargaTransportasi * $jumlahPeserta * $lamaWaktuKegiatan;
    }
    if ($layananMakanan == 'Y') {
        $totalHarga += $hargaMakanan * $jumlahPeserta * $lamaWaktuKegiatan;
    }

    // INPUT DATA TO DATABASE
    $sql = "INSERT INTO booking (name_pembeli, nomor_telepon, waktu_pelaksanaan, jumlah_peserta, durasi_kegiatan, layanan_penginapan, layanan_transportasi, layanan_makanan, harga_paket, tagihan)
            VALUES ('$namaPemesanan', '$noTelephone', '$tanggalKegiatan', '$jumlahPeserta', '$lamaWaktuKegiatan', '$layananPenginapan', '$layananTransportasi', '$layananMakanan', '$totalHarga', '$totalHarga')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data pesanan berhasil disimpan.');
            window.location.href = 'wisata-register.php';
        </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    // Close the connection
    $conn->close();
}
?>

<script>
    // function 
    function hitungTotal(){
        var jumlahPeserta = parseInt(document.getElementById('jumlahPeserta').value);
        var lamaWaktuKegiatan = parseInt(document.getElementById('jumlahWaktuKegiatan').value);

        var hargapaketPerhari =0;

        // PRICE
        if(document.getElementById('penginapan').checked){
            hargapaketPerhari += 1000000;
        }
        if(document.getElementById('transportasi').checked){
            hargapaketPerhari += 1200000;
        }
        if(document.getElementById('makanan').checked){
            hargapaketPerhari += 500000;
        }

        // count result price paket
        var totalHarga = jumlahPeserta * lamaWaktuKegiatan * hargapaketPerhari;

        //input value to field "harga paket perjalanan" dan "tagihan"
        document.getElementById('harga').value = totalHarga;
        document.getElementById('tagihan').value = totalHarga;
    }
</script>

<hr>

<?php include 'footer.php'; ?>