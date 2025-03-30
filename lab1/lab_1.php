<?php
// 1. Базовий PHP-скрипт
echo "Hello, World!<br>";

// 2. Змінні та типи даних
$stringVar = "Привіт, це PHP!";
$intVar = 42;
$floatVar = 3.14;
$boolVar = true;

echo "$stringVar<br>";
echo "$intVar<br>";
echo "$floatVar<br>";
echo ($boolVar ? "true" : "false") . "<br>";

var_dump($stringVar, $intVar, $floatVar, $boolVar);

// 3. Конкатенація рядків
$str1 = "Hello";
$str2 = "World!";
echo "<br>" . $str1 . ", " . $str2 . "<br>";

// 4. Умовні конструкції
$number = 15;
if ($number % 2 == 0) {
    echo "$number - парне число<br>";
} else {
    echo "$number - непарне число<br>";
}

// 5. Цикли
for ($i = 1; $i <= 10; $i++) {
    echo "$i ";
}
echo "<br>";

$j = 10;
while ($j >= 1) {
    echo "$j ";
    $j--;
}
echo "<br>";

// 6. Масиви
$student = [
    "ім'я" => "Іван",
    "прізвище" => "Петров",
    "вік" => 20,
    "спеціальність" => "Інформатика"
];

foreach ($student as $key => $value) {
    echo "$key: $value<br>";
}

// Додаємо новий елемент
$student["середній бал"] = 4.5;

// Виводимо оновлений масив
foreach ($student as $key => $value) {
    echo "$key: $value<br>";
}
?>
