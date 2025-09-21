<?php
require_once "Message.php";

class UppercaseMessage extends Message{
    public function format(string $text): string{
        return strtoupper($text);
    }
}
