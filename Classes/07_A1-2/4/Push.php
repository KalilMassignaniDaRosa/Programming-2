<?php
require_once "Notification.php";

class Push extends Notification{
    public function send(): string {
        return "<p>Sending
        <span class=highlight>push</span>:
        <strong>{$this->message}</strong></p>";
    }
}
