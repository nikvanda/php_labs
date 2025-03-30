<?php
$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fileToUpload"])) {
        $file = $_FILES["fileToUpload"];
        $fileName = basename($file["name"]);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $fileSize = $file["size"];
        $targetFile = $targetDir . $fileName;

        // Разрешенные форматы
        $allowedTypes = ["jpg", "jpeg", "png"];
        if (!in_array($fileType, $allowedTypes)) {
            die("Помилка: Дозволені лише JPG, JPEG, PNG.");
        }

        // Проверка размера файла (до 2MB)
        if ($fileSize > 2 * 1024 * 1024) {
            die("Помилка: Файл перевищує 2MB.");
        }

        // Проверка существования файла
        if (file_exists($targetFile)) {
            $fileName = pathinfo($fileName, PATHINFO_FILENAME) . "_" . time() . "." . $fileType;
            $targetFile = $targetDir . $fileName;
        }

        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            echo "Файл успішно завантажено.<br>";
            echo "Ім'я: $fileName<br>";
            echo "Тип: " . $file["type"] . "<br>";
            echo "Розмір: " . round($fileSize / 1024, 2) . " KB<br>";
            echo "<a href='$targetFile' download>Завантажити файл</a>";
        } else {
            echo "Помилка під час завантаження файлу.";
        }
    }
}
?>
