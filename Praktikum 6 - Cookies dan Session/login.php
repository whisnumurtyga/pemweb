<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['user'] = $username;
        header('Location: lat3_4a.php');
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action="" method="POST">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </p>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
