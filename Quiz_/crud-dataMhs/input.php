<?php

include 'koneksi.php';

// $_FILES['foto'];
// foreach ($_FILES as $key => $value) {
//     echo "Attribute: " . $key . ", Value: " . $value . "<br>";
//   }

// foreach ($_POST as $key => $value) {
//     echo "Attribute: " . $key . ", Value: " . $value . "<br>";
//   }

$nim    = $_POST['nim'];
$nama    = $_POST['nama'];
$alamat    = $_POST['alamat'];
$notelp    = $_POST['notelp'];
$prodi = $_POST['prodi'];
if(isset($_POST['hobby-1'])) ; $hobby1   = $_POST['hobby-1'];
if(isset($_POST['hobby-2'])) ; $hobby2   = $_POST['hobby-2'];
if(isset($_POST['hobby-3'])) ; $hobby3   = $_POST['hobby-3'];

$fakultas = $_POST['fakultas'];
$jk = $_POST['jk'];

// echo "$nim<br>$nama<br>$alamat<br>$notelp<br>$hobby<br>$prodi<br>$fakultas<br>$jk<br>";

$hobbies = "$hobby1, $hobby2 ,$hobby3";

if(isset($_FILES['foto'])) {
  $file = $_FILES['foto'];
  
  // Informasi file
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  
  // Tentukan lokasi penyimpanan file
  $destination = "public/" . $fileName;
  
  // Pindahkan file ke lokasi penyimpanan
  move_uploaded_file($fileTmpName, $destination);
  
  // Lakukan tindakan lain dengan file yang diunggah...
}

// query sql untuk masukan data
$query = "INSERT INTO mahasiswa SET NIM='$nim', nama='$nama', alamat='$alamat', telp='$notelp', hobby='$hobbies', prodi='$prodi', fakultas='$fakultas', jenis_kelamin='$jk' ";
echo $query;

mysqli_query($conn,$query);
// mengalihkan kehalaman index.php//
header("location:index.php");

?>
