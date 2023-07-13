<?php

include 'koneksi.php';


// return var_dump($_POST);


$role = $_POST['role'];
$email = $_POST['email'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

// echo $role;

$role_id = 0;
if($role == "Admin") {
    $role_id = 2;
} else if($role == "Kasir") {
    $role_id = 3;
}


// query sql untuk masukan data
$query = "INSERT INTO users SET role_id=$role_id, name='$name', email='$email', username='$username', password='$encrypted_password';";
// echo $query;

mysqli_query($conn,$query);

echo "<script type ='text/JavaScript'>";  
echo "alert('Sucess')";  
echo "</script>";   
echo '<script type="text/JavaScript">alert("Data Added Sucessfully")</script>';
// mengalihkan kehalaman index.php
header("location:index.php");
echo '<script type="text/JavaScript">alert("Data Added Sucessfully")</script>';
echo "<script type ='text/JavaScript'>";  
echo "alert('Sucess')";  
echo "</script>";   
?>