<?php
// Import file connection.php
require_once('../data/connection/connection.php');

// check parameters
if(isset($_GET['id'])) {
    // get valur from url
    $id = $_GET['id'];
    echo
    // delete berdasarkan id
    $sql = "DELETE FROM booking WHERE id = $id";

    //run query dan check
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data pesanan berhasil dihapus.');
                window.location.href = 'daftar-pesanan.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// close connection database
$conn->close();
?>
