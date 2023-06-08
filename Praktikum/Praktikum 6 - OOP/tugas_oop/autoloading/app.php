<?php

require_once 'autoload/Autoloader.php';
Autoloader::register();

use Model\User;

$user = new User("John Doe");
echo "Nama: " . $user->getNama();

?>