<?php
$logFile = "log.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = trim($_POST["text"]);
    if (!empty($text)) {
        file_put_contents($logFile, $text . PHP_EOL, FILE_APPEND);
        echo "Текст успішно записано у файл.";
    } else {
        echo "Помилка: Введіть текст.";
    }
}

if (file_exists($logFile)) {
    echo "<h2>Збережений текст:</h2>";
    echo nl2br(file_get_contents($logFile));
}
?>
