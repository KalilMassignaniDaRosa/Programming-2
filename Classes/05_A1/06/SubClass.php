<?php
include "Config.php";
class SubClass extends Config{
    public function setParameters(Config $config,$parameter): void{
        $config->parameters = $parameter;
    }
}

$config = new Config("Test");
$sub = new SubClass(1234);

echo "<h1>Config</h1>";
echo "<p>Before</p>";
echo "<p>Parameters: ". $config->getParameters() ."</p>";

$sub->setParameters($config,"New parameter");

echo "<p>After</p>";
echo "<p>Parameters: ". $config->getParameters() ."</p>";