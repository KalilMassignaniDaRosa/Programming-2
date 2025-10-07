<?php
require_once 'Room.php';
require_once 'Invoice.php';

class Booking {
    public int $id;
    public float $valuePerDay;
    private DateTime $checkIn;
    private DateTime $checkOut;
    // Booking agrega rooms
    private array $rooms = [];
    private ?Invoice $invoice = null;

    public function __construct(int $id,float $valuePerDay,
        DateTime $checkIn,DateTime $checkOut)
    {
        $this->id = $id;
        $this->valuePerDay = $valuePerDay;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
    }

    #region Aggregation
    public function addRoom(Room $room): void {
        $this->rooms[] = $room;
    }

    public function setInvoice(Invoice $invoice): void {
        $this->invoice = $invoice;
    }
    #endregion

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

    public function getRooms(): array {
        return $this->rooms;
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
    #endregion

    public function showInfo(): string {
        $message = "<p>"
                 . "ID: " . $this->getId() . "<br>"
                 . "Value per Day: $" . number_format($this->getValuePerDay(),2,'.',',') . "<br>"
                 . "Check-In: " . $this->getCheckIn()->format('d/m/Y H:i') . "<br>"
                 . "Check-Out: " . $this->getCheckOut()->format('d/m/Y H:i') . "<br>";

        foreach ($this->rooms as $r) {
            $message .= "Room Number: {$r->getNumber()}<br>";
        }

        return $message . "</p>";
    }
}
