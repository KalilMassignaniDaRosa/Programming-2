<?php
require_once 'Room.php';
require_once 'Invoice.php';

class Booking {
    public int $id;
    public float $valuePerDay;
    private DateTime $checkIn;
    private DateTime $checkOut;
    // Booking -> Room
    // Unidirecional
    private Room $room;
    // Booking -> Invoice
    // Unidirecional
    private Invoice $invoice;

    public function __construct(int $id, float $valuePerDay,
    DateTime $checkIn, DateTime $checkOut, Room $room, Invoice $invoice) {
        $this->id = $id;
        $this->valuePerDay = $valuePerDay;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->room = $room;
        $this->invoice = $invoice;
    }

    #region Getters
    public function getId(): int {
        return $this->id;
    }

    public function getValuePerDay(): float {
        return $this->valuePerDay;
    }

    public function getCheckIn(): DateTime {
        return $this->checkIn;
    }

    public function getCheckOut(): DateTime {
        return $this->checkOut;
    }

    public function getRoom(): Room {
        return $this->room;
    }

    public function getInvoice(): Invoice {
        return $this->invoice;
    }
    #endregion

    #region Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setValuePerDay(float $valuePerDay): void {
        $this->valuePerDay = $valuePerDay;
    }

    public function setCheckIn(DateTime $checkIn): void {
        $this->checkIn = $checkIn;
    }

    public function setCheckOut(DateTime $checkOut): void {
        $this->checkOut = $checkOut;
    }

    public function setRoom(Room $room): void {
        $this->room = $room;
    }

    public function setInvoice(Invoice $invoice): void {
        $this->invoice = $invoice;
    }
    #endregion

    public function showInfo(): string {
        $message = "<p>"
                 . "ID: " . $this->getId() . "<br>"
                 . "Value per Day: $ " . $this->getValuePerDay() . "<br>"
                 . "Check-In: " . $this->getCheckIn()->format('d/m/Y H:i') . "<br>"
                 . "Check-Out: " . $this->getCheckOut()->format('d/m/Y H:i') . "<br>"
                 . "Room Number: " . $this->getRoom()->getNumber() . "</p>";

        return $message;
    }
}
