<?php

namespace workshop\Model;

use DateTime;

class Reservation
{
    private int      $id;
    private Hotel    $hotel;
    private Person   $person;
    private DateTime $checkIn;
    private DateTime $checkOut;
    private String   $roomIdentifier;
    private bool     $isVip;

    private static int $idGenerator = 0;

    public function __construct(Hotel $hotel, Person $person, DateTime $checkIn, DateTime $checkOut, string $roomIdentifier, bool $isVip)
    {
        $this->id = $this->genId();
        $this->hotel = $hotel;
        $this->person = $person;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->roomIdentifier = $roomIdentifier;
        $this->isVip = $isVip;
    }

    private function genId(): int
    {
        return ++self::$idGenerator;
    }

    public function getCheckin(): DateTime
    {
        return  $this->checkIn;
    }

    public function getCheckOut(): DateTime
    {
        return $this->checkOut;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getHotel(): Hotel
    {
        return $this->hotel;
    }

    public function getPerson(): Person
    {
        return $this->person;
    }

    public function getRoomIdentifier(): string
    {
        return $this->roomIdentifier;
    }

    public function IsVip(): bool
    {
        return $this->isVip;
    }

    public function setRoomIdentifier($roomIdentifier): void
    {
        $this->roomIdentifier = $roomIdentifier;
    }

    public function setCheckIn(DateTime $checkIn): void
    {
        $this->checkIn = $checkIn;
    }

    public function setCheckOut(DateTime $checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    public function setIsVip(bool $isVip): void
    {
        $this->isVip = $isVip;
    }

    public function __toString(): string
    {
        return "Reservation ID: {$this->id}\n" .
            "Hotel: {$this->hotel->getName()}\n" .
            "Guest: {$this->person->getName()}\n" .
            "Check-in: {$this->checkIn->format('Y-m-d H:i:s')}\n" .
            "Check-out: {$this->checkOut->format('Y-m-d H:i:s')}\n" .
            "Room Identifier: {$this->roomIdentifier}\n" .
            "VIP: " . ($this->isVip ? 'Yes' : 'No');
    }

}