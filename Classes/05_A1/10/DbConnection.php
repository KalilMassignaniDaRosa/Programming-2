<?php
class DbConnection{
    private function connect(): string  {
        return "Connected!";
    }

    public function getConection(){
        return $this->connect();
    }
}

$db = new DbConnection();
echo "<h1>DbConnection</h1>";
echo "<p>".$db->getConection()."</p>";