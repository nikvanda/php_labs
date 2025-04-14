<?php

require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;
    
    protected $balance;
    protected $currency;
    
    public function __construct($currency, $initialBalance = 0) {
        $this->currency = $currency;
        
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за " . self::MIN_BALANCE);
        }
        
        $this->balance = $initialBalance;
    }
    
    public function deposit($amount) {
        if (!is_numeric($amount)) {
            throw new Exception("Сума повинна бути числом");
        }
        
        if ($amount <= 0) {
            throw new Exception("Сума поповнення повинна бути більше нуля");
        }
        
        $this->balance += $amount;
        return true;
    }
    
    public function withdraw($amount) {
        if (!is_numeric($amount)) {
            throw new Exception("Сума повинна бути числом");
        }
        
        if ($amount <= 0) {
            throw new Exception("Сума зняття повинна бути більше нуля");
        }
        
        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів. Доступно: {$this->balance} {$this->currency}");
        }
        
        $this->balance -= $amount;
        return true;
    }
    
    public function getBalance() {
        return $this->balance;
    }
    
    public function getInfo() {
        return "Звичайний рахунок: " . $this->balance . " " . $this->currency;
    }
    
    public function getCurrency() {
        return $this->currency;
    }
}
