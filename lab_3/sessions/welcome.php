<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>

<p>Ласкаво просимо, <?= $_SESSION["user"] ?>!</p>
<a href="logout.php">Вийти</a>
