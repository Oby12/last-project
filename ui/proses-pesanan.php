<?php
require_once('connection.php');

// get data from order
$nama_pemesan = $_POST['nama_pembeli'];
$no_telepon = $_POST['nomor_pembeli'];
$waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$durasi_perjalanan = $_POST['durasi_perjalanan'];
$layanan_penginapan = isset($_POST['layanan_penginapan']) ? 'Y' : 'N';
$layanan_transportasi = isset($_POST['layanan_transportasi']) ? 'Y' : 'N';
$layanan_makanan = isset($_POST['layanan_makanan']) ? 'Y' : 'N';
$harga_paket = str_replace('.', '', $_POST['harga_paket']);
$tagihan = str_replace('.', '', $_POST['tagihan']);

// Buat dan jalankan query SQL untuk menyimpan data pesanan
$sql = "INSERT INTO booking (name_pembeli,nomor_telepon, waktu_pelaksanaan, jumlah_peserta, durasi_kegiatan, layanan_penginapan, layanan_transportasi, layanan_makanan, harga_paket, tagihan)
        VALUES ('$nama_pemesan', '$no_telepon', '$waktu_pelaksanaan', '$jumlah_peserta', '$durasi_perjalanan', '$layanan_penginapan', '$layanan_transportasi', '$layanan_makanan', $harga_paket, $tagihan)";

if ($conn->query($sql) === TRUE) {
    echo "Data pesanan berhasil disimpan.";
    echo "<script>window.location.href = './dafPesanan.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
