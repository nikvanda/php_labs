<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: welcome.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "password") {
        $_SESSION["user"] = $username;
        header("Location: welcome.php");
    } else {
        echo "Неправильний логін або пароль!";
    }
}
?>

<form action="" method="post">
    <input type="text" name="username" placeholder="Логін" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="submit" value="Увійти">
</form>
