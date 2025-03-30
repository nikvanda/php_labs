<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    $username = htmlspecialchars($_POST["username"]);
    setcookie("username", $username, time() + 7 * 24 * 60 * 60); // 7 дней
    header("Location: index.php");
}

if (isset($_POST["delete_cookie"])) {
    setcookie("username", "", time() - 3600);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>
    <h2>Форма введення імені</h2>
    <form action="" method="post">
        <input type="text" name="username" required>
        <input type="submit" value="Зберегти">
    </form>

    <?php if (isset($_COOKIE["username"])): ?>
        <p>Привіт, <?= $_COOKIE["username"] ?>!</p>
        <form action="" method="post">
            <input type="submit" name="delete_cookie" value="Видалити cookie">
        </form>
    <?php endif; ?>
</body>
</html>
