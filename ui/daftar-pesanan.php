<?php require_once('header.php'); ?>

<div class="container">
    <h2 class="mt-4 mb-4"> Daftar Pesanan</h2>
    <button class="btn btn-primary mb-4" onclick="exportTableTOCsv('daftar_pesanan.csv')"> Export To Csv</button>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pemesan</th>
                    <th>No.Telephone</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Jumlah Peserta</th>
                    <th>Waktu Perjalanan(Hari)</th>
                    <th>Penginapan</th>
                    <th>Transportasi</th>
                    <th>Makanan</th>
                    <th>Harga Paket</th>
                    <th>Jumlah Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../data/connection/connection.php');
                $sql = $conn->query("SELECT * FROM booking order by waktu_pelaksanaan desc");
                $no = 1;
                while ($row = mysqli_fetch_assoc($sql)){ ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['name_pembeli'] ?></td>
                    <td><?= $row['nomor_telepon'] ?></td>
                    <td><?= $row['waktu_pelaksanaan'] ?></td>
                    <td><?= $row['jumlah_peserta'] ?></td>
                    <td><?= $row['durasi_kegiatan'] ?></td>
                    <td><?= $row['layanan_penginapan'] == 'Y' ? 'Ya' : 'Tidak' ?></td>
                    <td><?= $row['layanan_transportasi'] == 'Y' ? 'Ya' : 'Tidak'  ?></td>
                    <td><?= $row['layanan_makanan'] == 'Y' ? 'Ya' : 'Tidak' ?></td>
                    <td>Rp <?= number_format($row['harga_paket'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($row['tagihan'], 0, ',', '.') ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']?>" class="btn btn-info">Ubah</a>
                        <a href="delete.php?id=<?= $row['id']?>" class="btn btn-danger" onclick="return confirmDelete();">hapus</a>
                    </td>
                </tr>
            <?php  } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once('footer.php')?>

<script>
    function confirmDelete(){
        return confirm('Apakah anda yakin ingin menghapus data tersebut?');
    }

    // function exportTableTOCsv(filename) {
    //     var csv = [];
    //     var rows = document.querySelectorAll('table tr');

    //     for(var i=0; i<rows.length; i++) {
    //         var row = [], cols = rows[i].querySelectorAll('td, th');

    //         for(var j=0; j<cols.length; j++) {
    //             row.push(cols[j].innerText);

    //             csv.push(row.join(","));
    //         }

    //         // download
    //         downloadCsv(csv.join("\n"), filename);
    //     }
    // }

    //     function downloadCsv(csv,filename){
    //         var csvFIle;
    //         var downloadLink;

    //         csvFIle = new Blob([csv], {type: "text/csv"});
    //         downloadLink = document.createElement("a");
    //         downloadLink.download = filename;
    //         downloadLink.href = window.URL.createObjectURL(csvFIle);
    //         downloadLink.style.display = "none";
    //         document.body.appendChild(downloadLink);
    //         downloadLink.click();
    //     }
    function exportTableTOCsv(filename) {
        var csv = [];
        var rows = document.querySelectorAll('table tr');

        for(var i=0; i<rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll('td, th');

            for(var j=0; j<cols.length; j++) {
                row.push(cols[j].innerText);
            }
            csv.push(row.join(",")); 
        }

        // download
        downloadCsv(csv.join("\n"), filename);
    }

    function downloadCsv(csv, filename){
        var csvFile;
        var downloadLink;

        csvFile = new Blob([csv], {type: "text/csv"});
        downloadLink = document.createElement("a");
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

</script>