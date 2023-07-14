<?php 

session_start();

// var_dump($_SESSION); 

$arr = $_SESSION['arr'];
echo "Angka: $arr[0] <br>"; 
echo "Hasil: $arr[1] <br>"; 
echo "NIM: $arr[2] <br>"; 
echo "Nama: $arr[3] <br>"; 

session_destroy();


?>