<?php
abstract class Payment{
    // Classe abstrata
    // Serve como base para a heranca, e nao pode ser instanciada
    protected float $amount;

    public function __construct(float $amount) {
        $this->amount = $amount;
    }

    // Metodo abstrat
    // Possui apenas a assinatura, quase como uma interface
    abstract public function process(): string;
}
