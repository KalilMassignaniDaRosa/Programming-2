<?php
require_once "Printer.php";

class TextPrinter extends Printer{
    #[\Override]
    public function print() : string {
        return "Printing a text document...";
    }
}
