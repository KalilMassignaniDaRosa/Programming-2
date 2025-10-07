<?php
require_once 'Invoice.php';
require_once 'Room.php';
require_once 'Booking.php';
require_once 'Guest.php';

$invoice = new Invoice(1, new
DateTime('2025-09-22 14:00'), 'Pending');
$room = new Room(101, 1, "Standard", true);
$checkIn = new DateTime('2025-09-23 14:00');
$checkOut = new DateTime('2025-09-25 11:00');

$booking = new Booking(1, 250.00, $checkIn,
$checkOut, $room, $invoice);

$room->setBookingId($booking->getId());

$guest = new Guest("123.456.789-00", "Kalil M. da Rosa",
"kalil@example.com", $booking);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= basename(__FILE__) ?></title>
    <link rel="stylesheet" href="../../generic.css">
</head>
<body>
    <div class="container">
        <h1>Hotel</h1>

        <div>
            <h2>Guest</h2>
            <?= $guest->showInfo() ?>
            <br>
        </div>

        <div>
            <h2>Booking</h2>
            <?= $booking->showInfo() ?>
            <br>
        </div>

        <div>
            <h2>Room</h2>
            <?= $room->showInfo() ?>
            <br>
        </div>

        <div>
            <h2>Invoice</h2>
            <p>
                ID: <?= $invoice->getId() ?><br>
                Date: <?= $invoice->getDate()->format('d/m/Y H:i') ?><br>
                Status: <?= htmlspecialchars($invoice->getStatus()) ?><br>
                Total: $<?= number_format($invoice->calculateTotal($booking), 2, '.', ',') ?>
            </p>
        </div>
    </div>
</body>
</html>
