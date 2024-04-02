<?php

namespace workshop\Model;

class Person
{
    private int    $id;
    private string $name;
    private int    $age;
    private static int $idGenerator = 0;

    private array $reservations = [];

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;

        $this->id = $this->genId();
    }

    public function addReservation($reservation): void
    {
        $this->reservations[] = $reservation;
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

    public function getAge(): int
    {
        return $this->age;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function getReservations() : array
    {
        return $this->reservations;
    }

    public function __toString(): string
    {
        $reservationsString = implode('; ', $this->reservations);
        return "Id: $this->id, Name: $this->name, Age: $this->age, Reservations: $reservationsString";
    }
}
