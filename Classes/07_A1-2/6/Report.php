<?php
class Report {
    public function __call($name, $args) {
        $argsList = implode(", ", $args);

        return "<p>Called ". $name ." with
        <span class=highlight>" . count($args) . "</span> argument(s):
        <br><strong>". $argsList ."</strong>
        </p><br>";
    }
}
