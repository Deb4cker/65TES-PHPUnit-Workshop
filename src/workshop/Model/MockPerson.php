<?php

namespace workshop\Model;

class MockPerson extends Person
{
    public function getId(): int
    {
        return 01;
    }

    public function getName(): string
    {
        return 'Marcio';
    }

    public function getAge(): int
    {
        return 21;
    }
    public function __toString(): string
    {
        return "Id: 01, Name: Marcio, Age: 21, Reservations: ";
    }

}