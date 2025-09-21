<?php
require_once "Notification.php";

class Sms extends Notification{
    public function send(): string {
        return "<p>Sending
        <span class=highlight>sms</span>:
        <strong>{$this->message}</strong></p>";
    }
}
