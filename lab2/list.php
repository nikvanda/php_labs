<?php
$directory = "uploads/";

if (is_dir($directory)) {
    $files = array_diff(scandir($directory), [".", ".."]);

    if (!empty($files)) {
        echo "<h2>Список файлів:</h2>";
        echo "<ul>";
        foreach ($files as $file) {
            echo "<li><a href='$directory$file' download>$file</a></li>";
        }
        echo "</ul>";
    } else {
        echo "Папка порожня.";
    }
} else {
    echo "Помилка: Папка не існує.";
}
?>
