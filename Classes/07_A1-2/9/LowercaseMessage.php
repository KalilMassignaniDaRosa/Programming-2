<?php
require_once "Message.php";

class LowercaseMessage extends Message{
    public function format(string $text): string{
        return strtolower($text);
    }
}
