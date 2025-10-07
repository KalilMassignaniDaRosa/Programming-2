<?php
require_once 'Heart.php';
class Person{
    public string $name;
    private Heart $heart;

    public function __construct(string $name){
        $this->name = $name;

        // Composicao
        $this->heart = new Heart();
    }

    public function heartPulse() : void {
        $this->heart->pulse();
    }
}
