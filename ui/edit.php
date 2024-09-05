<?php
// Import file connection.php
require_once('../data/connection/connection.php');

// Check if 'id' parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the current data for the provided ID
    $sql = "SELECT * FROM booking WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "No record found with ID: $id";
        exit();
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $id = $_POST['id'];
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

    // Update the record
    $sql = "UPDATE booking SET
            name_pembeli = '$nama_pemesan',
            nomor_telepon = '$no_telepon',
            waktu_pelaksanaan = '$waktu_pelaksanaan',
            jumlah_peserta = '$jumlah_peserta',
            durasi_kegiatan = '$durasi_perjalanan',
            layanan_penginapan = '$layanan_penginapan',
            layanan_transportasi = '$layanan_transportasi',
            layanan_makanan = '$layanan_makanan',
            harga_paket = $harga_paket,
            tagihan = $tagihan
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data pesanan berhasil diperbarui.');
                window.location.href = 'daftar-pesanan.php';
            </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Pesanan</h1>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?php echo htmlspecialchars($data['name_pembeli']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="nomor_pembeli" class="form-label">No Telepon</label>
                <input type="tel" class="form-control" id="nomor_pembeli" name="nomor_pembeli" value="<?php echo htmlspecialchars($data['nomor_telepon']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
                <input type="date" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="<?php echo htmlspecialchars($data['waktu_pelaksanaan']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo htmlspecialchars($data['jumlah_peserta']); ?>" min="1" required>
            </div>

            <div class="mb-3">
                <label for="durasi_perjalanan" class="form-label">Durasi Perjalanan (Hari)</label>
                <input type="number" class="form-control" id="durasi_perjalanan" name="durasi_perjalanan" value="<?php echo htmlspecialchars($data['durasi_kegiatan']); ?>" min="1" required>
            </div>

            <div class="mb-3">
                <label>Pelayanan Paket Perjalanan:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="layanan_penginapan" name="layanan_penginapan" <?php if ($data['layanan_penginapan'] == 'Y') echo 'checked'; ?>>
                    <label for="layanan_penginapan" class="form-check-label">Penginapan (1.000.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="layanan_transportasi" name="layanan_transportasi" <?php if ($data['layanan_transportasi'] == 'Y') echo 'checked'; ?>>
                    <label for="layanan_transportasi" class="form-check-label">Transportasi (1.200.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="layanan_makanan" name="layanan_makanan" <?php if ($data['layanan_makanan'] == 'Y') echo 'checked'; ?>>
                    <label for="layanan_makanan" class="form-check-label">Makanan (500.000)</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="harga_paket" class="form-label">Harga Paket Perjalanan</label>
                <input type="number" class="form-control" id="harga_paket" name="harga_paket" value="<?php echo htmlspecialchars($data['harga_paket']); ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="tagihan" class="form-label">Jumlah Tagihan</label>
                <input type="number" class="form-control" id="tagihan" name="tagihan" value="<?php echo htmlspecialchars($data['tagihan']); ?>" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="daftar-pesanan.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
