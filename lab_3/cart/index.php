<?php
session_start();
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product"])) {
    $product = htmlspecialchars($_POST["product"]);
    $_SESSION["cart"][] = $product;

    // Сохраняем в cookie
    $previousPurchases = isset($_COOKIE["previous_purchases"]) ? unserialize($_COOKIE["previous_purchases"]) : [];
    $previousPurchases[] = $product;
    setcookie("previous_purchases", serialize($previousPurchases), time() + 30 * 24 * 60 * 60);
}

if (isset($_POST["clear_cart"])) {
    $_SESSION["cart"] = [];
}

?>

<h2>Кошик</h2>
<form action="" method="post">
    <input type="text" name="product" placeholder="Назва товару" required>
    <input type="submit" value="Додати до кошика">
</form>

<ul>
    <?php foreach ($_SESSION["cart"] as $item): ?>
        <li><?= $item ?></li>
    <?php endforeach; ?>
</ul>

<form action="" method="post">
    <input type="submit" name="clear_cart" value="Очистити кошик">
</form>

<h2>Попередні покупки</h2>
<ul>
    <?php
    if (isset($_COOKIE["previous_purchases"])) {
        $previousPurchases = unserialize($_COOKIE["previous_purchases"]);
        foreach ($previousPurchases as $item) {
            echo "<li>$item</li>";
        }
    }
    ?>
</ul>
