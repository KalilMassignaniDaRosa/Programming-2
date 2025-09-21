<?php
require_once "Printer.php";

class ImagePrinter extends Printer{
    #[\Override]
    public function print() : string {
        return "Printing an image...";
    }
}
