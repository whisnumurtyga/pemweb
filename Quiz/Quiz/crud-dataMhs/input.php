<?php

include 'koneksi.php';

// foreach ($_POST as $key => $value) {
//     echo "Attribute: " . $key . ", Value: " . $value . "<br>";
//   }

function generateRandomString($length) {
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $string = '';
  
  for ($i = 0; $i < $length; $i++) {
      $randomIndex = mt_rand(0, strlen($characters) - 1);
      $string .= $characters[$randomIndex];
  }
  
  return $string;
}


$nim    = $_POST['nim'];
$nama    = $_POST['nama'];
$alamat    = $_POST['alamat'];
$notelp    = $_POST['notelp'];
$prodi = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$jk = $_POST['jk'];


if(isset($_POST['hobby-1'])){
  $hobby1   = $_POST['hobby-1']; 
} 
if(isset($_POST['hobby-2'])){
  $hobby2   = $_POST['hobby-2']; 
} 
if(isset($_POST['hobby-3'])){
  $hobby3   = $_POST['hobby-3']; 
} 

$hobbies = "$hobby1, $hobby2 ,$hobby3";


// echo "$nim<br>$nama<br>$alamat<br>$notelp<br>$hobby<br>$prodi<br>$fakultas<br>$jk<br>";

if(isset($_FILES['foto'])) {
  $file = $_FILES['foto'];
  
  // Informasi file
  $file_extension = end(explode('.', $file['name']));
  $fileName = $nim . "-" . generateRandomString(5) . "." . $file_extension;
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  
  // Tentukan lokasi penyimpanan file
  $destination = "public/" . $fileName;
  // $path = "Quiz/Quiz/crud-dataMhs/" . $destination;
  $path = $destination;

  
  // Pindahkan file ke lokasi penyimpanan
  move_uploaded_file($fileTmpName, $destination);
  
  // Lakukan tindakan lain dengan file yang diunggah...
} 

// query sql untuk masukan data
$query = "INSERT INTO mahasiswa SET NIM='$nim', nama='$nama', alamat='$alamat', telp='$notelp', hobby='$hobbies', prodi='$prodi', fakultas='$fakultas', jenis_kelamin='$jk', path_img='$path'";
echo $query;

mysqli_query($conn,$query);
// mengalihkan kehalaman index.php//
header("location:index.php");

?>
