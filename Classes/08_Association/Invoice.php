<?php
require_once 'Booking.php';

class Invoice
{
    public int $id;
    private DateTime $date;
    private string $status;

    public function __construct(int $id, DateTime $date, string $status)
    {
        $this->id = $id;
        $this->date = $date;
        $this->status = $status;
    }

    #region Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
    #endregion

    #region Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
    #endregion

    // Invoice -> Booking
    // Dependencia
    public function calculateTotal(Booking $booking): float
    {
        $checkIn  = $booking->getCheckIn();
        $checkOut = $booking->getCheckOut();

        // Colo horas como 0
        $ci = (clone $checkIn)->setTime(0, 0, 0);
        $co = (clone $checkOut)->setTime(0, 0, 0);

        // Diferenca de dias
        $interval = $ci->diff($co);
        $days = (int) $interval->days;

        // Pelo menos 1 dia
        $days = max(1, $days);

        return $days * $booking->getValuePerDay();
    }
}
