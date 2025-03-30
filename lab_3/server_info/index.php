<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: redirect.php");
    exit();
}
?>

<p>IP-адреса клієнта: <?= $_SERVER["REMOTE_ADDR"] ?></p>
<p>Браузер: <?= $_SERVER["HTTP_USER_AGENT"] ?></p>
<p>Назва скрипта: <?= $_SERVER["PHP_SELF"] ?></p>
<p>Метод запиту: <?= $_SERVER["REQUEST_METHOD"] ?></p>
<p>Шлях до файлу: <?= __FILE__ ?></p>
