<?php
include 'koneksi.php';

// Mendapatkan NIM dari URL atau form
$nim = $_GET['nim'];

// Mengambil informasi file yang akan dihapus
$sql = "SELECT path_img FROM mahasiswa WHERE NIM = '$nim'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Nama file yang akan dihapus
$fileName = $row['path_img'];
echo $fileName;

// return;
// Menghapus file jika ada
if (file_exists($fileName)) {
    unlink($fileName);
}

// Melakukan proses penghapusan data dari tabel
$deleteQuery = "DELETE FROM mahasiswa WHERE NIM = '$nim'";
mysqli_query($conn, $deleteQuery);

// Redirect ke halaman yang diinginkan setelah penghapusan
header("location: index.php");
exit();
?>

