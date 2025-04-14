<?php

require_once 'BankAccount.php';

class SavingsAccount extends BankAccount {
    public static $interestRate = 0.05;
    
    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
        return $interest;
    }
    
    public function getInfo() {
        return "Накопичувальний рахунок: " . $this->balance . " " . $this->currency . 
               " (Ставка: " . (self::$interestRate * 100) . "%)";
    }
    
    public static function setInterestRate($newRate) {
        if (!is_numeric($newRate) || $newRate < 0) {
            throw new Exception("Відсоткова ставка повинна бути невід'ємним числом");
        }
        self::$interestRate = $newRate;
    }
}
