<?php
class Notification{
    // Exemplo sem o abstract
    protected string $message;

    public function __construct(string $message) {
        $this->message = $message;
    }

    public function send() : string{
        return "<p>Sending generic notification: {$this->message}</p>";
    }
}
