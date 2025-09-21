<?php
require_once "Notification.php";

class Email extends Notification{
    public function send(): string {
        return "<p>Sending
        <span class=highlight>email</span>:
        <strong>{$this->message}</strong></p>";
    }
}
