<?php
require_once "Payment.php";

class BankSlip extends Payment{
    // Bank Slip = boleto
    public function process(): string{
        return "<p>Processing payment of <strong>R$ {$this->amount}</strong> via
        <span class=highlight>Bank Slip</span></p>";
    }
}
