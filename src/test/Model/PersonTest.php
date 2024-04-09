<?php

namespace test\Model;

use DateTime;
use PHPUnit\Framework\TestCase;
use workshop\Model\Hotel;
use workshop\Model\MockPerson;
use workshop\Model\Person;

class PersonTest extends TestCase
{
    public function testMustCreatePerson(): void
    {
        $name = "Marcio";
        $age = 21;

        $person = new Person($name, $age);

        $this->assertNotNull($person);
        $this->assertEquals($name, $person->getName(), "Person name must be the same in the input.");
        $this->assertEquals($age, $person->getAge(), "Person age must be the same in the input.");
    }

    public function testMustUpdatePersonInfo() : void
    {

        $oldName = "João Henrique";
        $oldAge = 21;
        $newName = "Marcio";
        $newAge = 18;

        $person = new Person($oldName, $oldAge);

        $person->setName($newName);
        $person->setAge($newAge);

        $this->assertNotNull($person, "Person must not be null");
        $this->assertNotEquals($oldName, $person->getName(), "Person name must be the same in the input.");
        $this->assertNotEquals($oldAge, $person->getAge(),"Person age must be the same in the input.");

        $this->assertNotNull($person);
        $this->assertEquals($newName, $person->getName(), "Person name must be the same in the input.");
        $this->assertEquals($newAge, $person->getAge(), "Person age must be the same in the input.");
    }

    public function testIdMustBeSequential(): void
    {
        $name = "Ana";
        $age = 21;

        $person = new Person($name, $age);
        $initialId = $person->getId();

        for ($i = $initialId; $i < $initialId + 100; $i++)
        {
            $person = new Person($name, $age);
            $this->assertEquals( $i+1, $person->getId(), "Person id must be sequential");
        }
    }

    public function testMustAddReservation(): void
    {
        $person = new Person("Nicolas", "22");
        $checkIn = new DateTime("2024-11-4");
        $checkOut = new DateTime("2024-11-6");
        $roomIdentifier = "200A";

        $hotel = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
        $reservation = $hotel->createReservation($person, $checkIn, $checkOut, $roomIdentifier, false);

        $createdReservation = $person->getReservations()[0];

        $this->assertNotNull($createdReservation, "Reservation cannot be null");
        $this->assertEquals($reservation, $createdReservation, "Created reservation must be equals reservation added to Person");
        $this->assertEquals($person, $createdReservation->getPerson(), "Person must be the same");
        $this->assertEquals($checkIn, $createdReservation->getCheckin(), "CheckIn date must be the same");
        $this->assertEquals($checkOut, $createdReservation->getCheckOut(), "CheckOut date must be the same");
        $this->assertEquals($roomIdentifier, $createdReservation->getRoomIdentifier(), "Room identifier must be the same");
        $this->assertFalse($createdReservation->IsVip(), "Reservation must be vip");
    }

    public function testMustShowToString(): void
    {
        $name = "Marcio";
        $age = 21;
        $checkIn = new DateTime("2024-11-4");
        $checkOut = new DateTime("2024-11-6");
        $roomIdentifier = "200A";

        $person = new Person($name, $age);
        $hotel = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
        $hotel->createReservation($person, $checkIn, $checkOut, $roomIdentifier, false);
        $hotel->createReservation($person, $checkIn, $checkOut, $roomIdentifier, false);

        $reservationsString = implode('; ', $person->getReservations());

        $personTestString = "Id: {$person->getId()}, Name: {$person->getName()}, Age: {$person->getAge()}, Reservations: $reservationsString";

        $this->assertNotNull($person);
        $this->assertEquals($personTestString, $person);
    }
    public function testMockPerson() : void
    {
        $person = new MockPerson();
        $name = "Marcio";
        $id = 01;
        $age = 21;

        $this->assertNotNull($person, "Person must not be null");
        $this->assertEquals($name, $person->getName(), "Person name must be the same in the input.");
        $this->assertEquals($age, $person->getAge(),"Person age must be the same in the input.");
        $this->assertEquals($id, $person->getId(),"Person id must be the same in the input." );
        $this->assertNotEquals("", $person->__toString(), "String mustn't be the same in the input");
    }
}
