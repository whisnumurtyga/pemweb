<?php 
session_start();


function factorial($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}


$angka = $_POST['angka'];
$result = factorial($angka);
$arr = [$angka, $result, "1203210002", "Whisnumurty Galih Ananta"];


$_SESSION['arr'] = $arr;

// return var_dump($_POST);
echo "Angka yang dimasukkan: $angka <br>";
echo "Hasil faktorial dari $angka adalah  $result";

echo "<br> <a href='lat3_3c.php'>KLIK INI</a>"


?>