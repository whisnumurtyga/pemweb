<?php

include 'koneksi.php';

$nim    = $_POST['nim'];
$nama    = $_POST['nama'];
$alamat    = $_POST['alamat'];
$notelp    = $_POST['notelp'];
$hobby   = $_POST['hobby'];
$prodi   = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$jk = $_POST['jk'];

echo $nim;

echo "$nim<br>$nama<br>$alamat<br>$notelp<br>$hobby<br>$prodi<br>$fakultas<br>$jk<br>";

//query sql untuk masukan data
$query = "UPDATE mahasiswa SET NIM='$nim', nama='$nama', alamat='$alamat', telp='$notelp', hobby='$hobby', prodi='$prodi', fakultas='$fakultas', jenis_kelamin='$jk' WHERE NIM='$nim' ";
mysqli_query($conn,$query);

//mengalihkan kehalaman index.php//
header("location:view.php");

?>
