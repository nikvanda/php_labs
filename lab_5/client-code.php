<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

echo "<h1>Банківська система</h1>";

function formatOutput($message) {
    echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd; border-radius: 5px;'>";
    echo $message;
    echo "</div>";
}

try {
    $account = new BankAccount("UAH", 1000);
    formatOutput("<h2>Звичайний рахунок</h2>");
    formatOutput("Створено рахунок: " . $account->getInfo());
    
    $account->deposit(500);
    formatOutput("Поповнено на 500 UAH. Новий баланс: " . $account->getBalance() . " " . $account->getCurrency());
    
    $account->withdraw(300);
    formatOutput("Знято 300 UAH. Новий баланс: " . $account->getBalance() . " " . $account->getCurrency());
    
    $savingsAccount = new SavingsAccount("USD", 2000);
    formatOutput("<h2>Накопичувальний рахунок</h2>");
    formatOutput("Створено накопичувальний рахунок: " . $savingsAccount->getInfo());
    
    SavingsAccount::setInterestRate(0.07);
    formatOutput("Встановлено нову відсоткову ставку: 7%");
    formatOutput("Оновлена інформація: " . $savingsAccount->getInfo());
    
    $interest = $savingsAccount->applyInterest();
    formatOutput("Нараховано відсотків: " . $interest . " " . $savingsAccount->getCurrency());
    formatOutput("Новий баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency());
    
    formatOutput("<h2>Демонстрація обробки помилок</h2>");
    
    try {
        formatOutput("Спроба зняти 5000 USD з рахунку:");
        $savingsAccount->withdraw(5000);
    } catch (Exception $e) {
        formatOutput("<span style='color: red;'>Помилка: " . $e->getMessage() . "</span>");
    }
    
    try {
        formatOutput("Спроба поповнити рахунок на -100 USD:");
        $savingsAccount->deposit(-100);
    } catch (Exception $e) {
        formatOutput("<span style='color: red;'>Помилка: " . $e->getMessage() . "</span>");
    }
    
    try {
        formatOutput("Спроба встановити від'ємну відсоткову ставку:");
        SavingsAccount::setInterestRate(-0.05);
    } catch (Exception $e) {
        formatOutput("<span style='color: red;'>Помилка: " . $e->getMessage() . "</span>");
    }
    
} catch (Exception $e) {
    formatOutput("<h3 style='color: red;'>Критична помилка: " . $e->getMessage() . "</h3>");
}
