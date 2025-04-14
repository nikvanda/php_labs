<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

function printSeparator($message = null) {
    echo str_repeat('-', 50) . "\n";
    if ($message) {
        echo $message . "\n";
        echo str_repeat('-', 50) . "\n";
    }
}

try {
    printSeparator("Тестування звичайного рахунку");
    
    $account = new BankAccount("USD", 100);
    echo "Створено рахунок: " . $account->getInfo() . "\n";
    
    $account->deposit(50);
    echo "Після поповнення на 50: " . $account->getBalance() . " " . $account->getCurrency() . "\n";
    
    $account->withdraw(30);
    echo "Після зняття 30: " . $account->getBalance() . " " . $account->getCurrency() . "\n";
    
    try {
        $account->withdraw(200);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "\n";
    }
    
    try {
        $account->deposit(-50);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "\n";
    }
    
    printSeparator("Тестування накопичувального рахунку");
    
    $savingsAccount = new SavingsAccount("EUR", 1000);
    echo "Створено накопичувальний рахунок: " . $savingsAccount->getInfo() . "\n";
    
    try {
        SavingsAccount::setInterestRate(0.08);
        echo "Відсоткову ставку змінено на 8%\n";
        echo "Оновлена інформація: " . $savingsAccount->getInfo() . "\n";
    } catch (Exception $e) {
        echo "Помилка при зміні ставки: " . $e->getMessage() . "\n";
    }
    
    $interest = $savingsAccount->applyInterest();
    echo "Нараховано відсотків: " . $interest . " " . $savingsAccount->getCurrency() . "\n";
    echo "Новий баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "\n";
    
    $savingsAccount->withdraw(200);
    echo "Після зняття 200: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "\n";
    
    printSeparator("Тестування помилки при створенні рахунку");
    
    try {
        $invalidAccount = new BankAccount("UAH", -100);
    } catch (Exception $e) {
        echo "Помилка створення рахунку: " . $e->getMessage() . "\n";
    }
    
    try {
        SavingsAccount::setInterestRate(-0.1);
    } catch (Exception $e) {
        echo "Помилка при встановленні відсоткової ставки: " . $e->getMessage() . "\n";
    }

} catch (Exception $e) {
    echo "Виникла непередбачена помилка: " . $e->getMessage() . "\n";
}

printSeparator("Завершення тестування");
