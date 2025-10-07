<?php
class Room {
    public int $number;
    public int $floor;
    private string $type;
    public bool $avaible;
    private ?int $bookingId = null;

    public function __construct(int $number, int $floor,
        string $type, bool $avaible, ?int $bookingId = null)
    {
        $this->number = $number;
        $this->floor = $floor;
        $this->type = $type;
        $this->avaible = $avaible;
        $this->bookingId = $bookingId;
    }

    #region Getters
    public function getNumber(): int {
        return $this->number;
    }

    public function getFloor(): int {
        return $this->floor;
    }

    public function getType(): string {
        return $this->type;
    }

    public function isAvaible(): bool {
        return $this->avaible;
    }

    public function getBookingId(): ?int {
        return $this->bookingId;
    }
    #endregion

    #region Setters
    public function setNumber(int $number): void {
        $this->number = $number;
    }

    public function setFloor(int $floor): void {
        $this->floor = $floor;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function setIsAvaible(bool $avaible): void {
        $this->avaible = $avaible;
    }

    public function setBookingId(?int $bookingId): void {
        $this->bookingId = $bookingId;
    }
    #endregion

    public function showInfo(): string {
        $message = "<p>"
                . "Number: ". $this->getNumber()."<br>"
                . "Floor: ". $this->getFloor() . "<br>"
                . "Type: ". $this->getType() . "<br>"
                . "Available: ". ($this->isAvaible() ? 'Yes' : 'No') . "<br>"
                . "Booking ID: ". ($this->getBookingId() ?? 'None') . "</p>";

        return $message;
    }
}
