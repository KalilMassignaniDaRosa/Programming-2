<?php
require_once "Printer.php";

class PdfPrinter extends Printer{
    // php 8.3 adicionou  override
    // Ele verifica se existe o metodo no pai, caso nao gera um erro
    #[\Override]
    public function print() : string {
        return "Printing a PDF document...";
    }
}
