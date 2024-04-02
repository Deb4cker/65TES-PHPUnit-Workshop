<?php

namespace workshop\Model;

use DateTime;

class Hotel
{
    private int    $id;
    private string $name;
    private int    $stars;
    private string $address;
    private int    $vacancies;
    private int    $roomCount;
    private int    $vipRoomCount;
    private static int $idGenerator = 0;

    protected array $reservations = [];
    
    public function __construct($name, $stars, $address, $vacancies, $roomCount, $vipRoomCount)
    {
        $this->id          = $this->genId();
        $this->name        = $name;
        $this->stars       = $stars;
        $this->address     = $address;
        $this->vacancies   = $vacancies;
        $this->roomCount   = $roomCount;
        $this->vipRoomCount= $vipRoomCount;
    }

    public function createReservation(Person $person, DateTime $checkIn, DateTime $checkOut, string $roomIdentifier, bool $isVip): Reservation
    {
        $reservation = new Reservation($this, $person, $checkIn, $checkOut, $roomIdentifier, $isVip);
        $this->addReservation($reservation);
        $person->addReservation($reservation);
        return $reservation;
    }

    public function addReservation($reservation): void
    {
        if ($this->vacancies > 0) {
            $this->reservations[] = $reservation;    
        }

        $this->vacancies--;
    }

    private function genId(): int
    {
        return ++self::$idGenerator;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStars(): int
    {
        return $this->stars;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getVacancies(): int
    {
        return $this->vacancies;
    }

    public function getRoomCount(): int
    {
        return $this->roomCount;
    }

    public function getVipRoomCount(): int
    {
        return $this->vipRoomCount;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setStars($stars): void
    {
        $this->stars = $stars;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function setRoomCount($roomCount): void
    {
        $this->roomCount = $roomCount;
    }

    public function setVipRoomCount($vipRoomCount): void
    {
        $this->vipRoomCount = $vipRoomCount;
    }

    public function __toString(): string
    {
        return "Id: $this->id,\n
         Name: $this->name,\n
         Stars: $this->stars,\n
         Address: $this->address,\n
         Vacancies: $this->vacancies,\n
         Room Count: $this->roomCount,\n
         VIP Room Count: $this->vipRoomCount";
    }
}