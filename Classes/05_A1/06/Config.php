<?php
class Config{
    protected $parameters;

    public function __construct($parameters){
        $this->parameters = $parameters;
    }

    public function getParameters(){
        return $this->parameters;
    }
}