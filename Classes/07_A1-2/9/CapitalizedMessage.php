<?php
require_once "Message.php";

class CapitalizedMessage extends Message{
    // ucwords = upper case words
    // Deixa a primeira letra de cada palavra em upper
    public function format(string $text): string{
        // Coloca tudo em lower, e depois aplica o ucwords
        return ucwords(strtolower($text));
    }
}
