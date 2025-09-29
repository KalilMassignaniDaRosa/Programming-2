<?php
require_once 'Booking.php';

class Guest {
    public string $name;
    private string $cpf;
    private string $email;
    // Guest agrega booking
    private Booking $booking;

    public function __construct(string $cpf, string $name,
    string $email, Booking $booking) {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->booking = $booking;
    }

    #region Getters
    public function getName(): string {
        return $this->name;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getBooking(): Booking {
        return $this->booking;
    }
    #endregion

    #region Setters
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setBooking(Booking $booking): void {
        $this->booking = $booking;
    }
    #endregion

    public function showInfo(): string {
        $message = "<p>"
                . "Name: " . $this->getName() . "<br>"
                . "CPF: " . $this->getCpf() . "<br>"
                . "Email: " . $this->getEmail() . "</p>";

        return $message;
    }
}
