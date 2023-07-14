<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $cd_order = $_POST['cd_order'];
    $dvd_order = $_POST['dvd_order'];

    // Simpan nilai order ke dalam cookie
    setcookie('old_cd', $cd_order, time() + (86400 * 30), "/");
    setcookie('old_dvd', $dvd_order, time() + (86400 * 30), "/");

    // Proses order
    // ...

    // Redirect ke halaman sukses
    header('Location: lat3_4c.php');
    exit();
}
?>

<html>
<head>
    <title>Order Form</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
    <h3>Order Form</h3>
    <form action="" method="POST">
        <?php if (isset($_COOKIE['old_cd'])) { ?>
            <p> Order CD, amount :
                <input type="text" name="cd_order" value="<?= $_COOKIE['old_cd'] ?>" size="2" maxlength="2" />
            </p>
            <p> Order DVD, amount :
                <input type="text" name="dvd_order" value="<?= $_COOKIE['old_dvd'] ?>" size="2" maxlength="2" />
            </p>
        <?php } else { ?>
            <p> Order CD, amount :
                <input type="text" name="cd_order" value="0" size="2" maxlength="2" />
            </p>
            <p> Order DVD, amount :
                <input type="text" name="dvd_order" value="0" size="2" maxlength="2" />
            </p>
        <?php } ?>
        <input type="submit" value="Add To Cart" name="submit" />
    </form>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
