<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ласкаво просимо</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        .user-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        .btn-logout {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Вітаємо на захищеній сторінці!</h1>
        
        <div class="user-info">
            <h2>Інформація про користувача</h2>
            <p><strong>Ім'я користувача:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>ID користувача:</strong> <?php echo $_SESSION['user_id']; ?></p>
        </div>
        
        <a href="logout.php" class="btn btn-logout">Вийти</a>
        <a href="index.php" class="btn">На головну</a>
    </div>
</body>
</html>
