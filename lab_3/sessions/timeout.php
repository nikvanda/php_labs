<?php
session_start();

// Проверка активности
if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > 300)) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
$_SESSION["last_activity"] = time();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>

<p>Ласкаво просимо, <?= $_SESSION["user"] ?>!</p>
<p>Якщо ви будете неактивні 5 хвилин, сесія завершиться.</p>
<a href="logout.php">Вийти</a>
