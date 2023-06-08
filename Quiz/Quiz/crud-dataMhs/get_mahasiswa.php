<?php 

include "koneksi.php";


// Mendapatkan NIM dari URL atau form
$nim = $_GET['nim'];

// Mengambil informasi file yang akan dihapus
$sql = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo json_encode($row)

?>