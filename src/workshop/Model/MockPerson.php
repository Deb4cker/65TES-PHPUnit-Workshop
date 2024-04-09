<?php

namespace workshop\Model;

class MockPerson extends Person
{
    #[\Override] public function getId(): int
    {
        return 01;
    }

    #[\Override] public function getName(): string
    {
        return "Marcio";
    }

    #[\Override] public function getAge(): int
    {
        return 21;
    }
    #[\Override] public function __toString(): string
    {
        return "Id: 01, Name: Marcio, Age: 21, Reservations: ";
    }

}