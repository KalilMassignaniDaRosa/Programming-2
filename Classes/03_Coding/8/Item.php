<?php
class Item{
    public int $id;
    public string $name;
    public float $price;

    public function __construct(int $id,string $name, float $price){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function showItem(): string {
        return "<br>
                Id: {$this->id}<br>
                Name: <span class='highlight'>{$this->name}</span><br>
                Price: $<strong>{$this->price}</strong><br>";
    }
}
