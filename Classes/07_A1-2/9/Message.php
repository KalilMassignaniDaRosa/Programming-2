<?php
abstract class Message{
    abstract public function format(string $text): string;
}
