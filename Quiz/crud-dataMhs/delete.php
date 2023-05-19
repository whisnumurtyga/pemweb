<?php
include 'koneksi.php';

$nim= $_GET['nim'];
echo "$nim<br>";
$query = " DELETE FROM mahasiswa WHERE NIM='$nim' ";
echo "$query<br>";
mysqli_query($conn,$query);
header("location:index.php");
?>
