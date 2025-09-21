<?php
require_once "Payment.php";

class CreditCard extends Payment{
    public function process(): string{
        return "<p>Processing payment of <strong>R$ {$this->amount}</strong> via
        <span class=highlight>Credit Card</span></p>";
    }
}
