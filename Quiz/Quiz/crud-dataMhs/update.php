<?php

include 'koneksi.php';

// if (isset($_FILES['foto'])) {
//     echo "1";
// }
// print_r($_FILES['foto']);
// return;

$nim    = $_POST['nim'];
$nama    = $_POST['nama'];
$alamat    = $_POST['alamat'];
$notelp    = $_POST['notelp'];
$prodi   = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$jk = $_POST['jk'];


$hobby1 = "";
$hobby2 = "";
$hobby3 = "";


if(isset($_POST['edit-hobby-1'])){
    $hobby1   = $_POST['edit-hobby-1']; 
} 
if(isset($_POST['edit-hobby-2'])){
    $hobby2   = $_POST['edit-hobby-2']; 
} 
if(isset($_POST['edit-hobby-3'])){
    $hobby3   = $_POST['edit-hobby-3']; 
} 

$hobbies = "$hobby1, $hobby2 ,$hobby3";
// echo $hobbies;
// return;

function generateRandomString($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $string = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $string .= $characters[$randomIndex];
    }
    
    return $string;
}

// if (isset($_FILES['editFoto'])) {
//     echo "1";
// }
// print_r($_FILES['editFoto']);
// return;

if($_FILES['editFoto']['size'] > 0) {
    // echo "ada files";
    // return;
    $file = $_FILES['editFoto'];
    
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
  
    // Mengambil informasi file yang akan dihapus
    $sql = "SELECT path_img FROM mahasiswa WHERE NIM = '$nim'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Nama file yang akan dihapus
    $fileNameOld = $row['path_img'];
    
    // Pindahkan file ke lokasi penyimpanan
    move_uploaded_file($fileTmpName, $destination);
    
    // Menghapus file jika ada
    if (file_exists($fileNameOld)) {
        unlink($fileNameOld);
    } 

    $query = "UPDATE mahasiswa SET NIM='$nim', nama='$nama', alamat='$alamat', telp='$notelp', hobby='$hobbies', prodi='$prodi', fakultas='$fakultas', jenis_kelamin='$jk', path_img='$path' WHERE NIM='$nim'";
    mysqli_query($conn,$query);

    // echo "file old:, $fileNameOld, new file:, $fileName";
    // echo $destination;
    // echo $path;
    // return;
    
}    else {
    // echo "tidak ada files";
    // return;
    //query sql untuk masukan data
$query = "UPDATE mahasiswa SET NIM='$nim', nama='$nama', alamat='$alamat', telp='$notelp', hobby='$hobbies', prodi='$prodi', fakultas='$fakultas', jenis_kelamin='$jk' WHERE NIM='$nim' ";
mysqli_query($conn,$query);
}


// echo $nim;
// echo "$nim<br>$nama<br>$alamat<br>$notelp<br>$hobby<br>$prodi<br>$fakultas<br>$jk<br>";




//mengalihkan kehalaman index.php//
header("location:index.php");

?>
