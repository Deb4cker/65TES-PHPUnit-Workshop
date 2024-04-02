<?php

namespace test\Model;

use DateTime;
use workshop\Model\Hotel;
use workshop\Model\Person;
use workshop\Model\Reservation;
use PHPUnit\Framework\TestCase;

class ReservationTest extends TestCase
{
    public function testMustCreateReservation()
    {
        $hotel = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
        $person = new Person("Nicolas", "22");
        $checkIn = new DateTime("2024-11-4");
        $checkOut = new DateTime("2024-11-6");
        $roomIdentifier = "200A";

        $reservation = new Reservation($hotel, $person, $checkIn, $checkOut, $roomIdentifier, false);

        $this->assertNotNull($reservation);
        $this->assertEquals($hotel, $reservation->getHotel(), "Reservation's hotel must be the same informed in input");
        $this->assertEquals($person, $reservation->getPerson(), "Reservation's person must be the same informed in input");
        $this->assertEquals($checkIn, $reservation->getCheckin(), "Reservation's checkin must be the same informed in input");
        $this->assertEquals($checkOut, $reservation->getCheckOut(), "Reservation's checkout must be the same informed in input");
        $this->assertEquals($roomIdentifier, $reservation->getRoomIdentifier(), "Reservation's room identifier must be the same informed in input");
    }

    public function testMustUpdateReservationData() : void
    {
        $hotel = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
        $person = new Person("Nicolas", "22");
        $oldIsVip = true;
        $oldCheckIn = new DateTime("2024-11-4");
        $oldCheckOut = new DateTime("2024-11-6");
        $oldRoomIdentifier = "200A";

        $reservation = new Reservation($hotel, $person, $oldCheckIn,$oldCheckOut, $oldRoomIdentifier, $oldIsVip);

        $newIsVip = false;
        $newCheckIn = new DateTime("2024-11-5");
        $newCheckOut = new DateTime("2024-11-7");
        $newRoomIdentifier = "300B";

        $reservation->setIsVip($newIsVip);
        $reservation->setCheckIn($newCheckIn);
        $reservation->setCheckOut($newCheckOut);
        $reservation->setRoomIdentifier($newRoomIdentifier);

        $this->assertNotNull($reservation, "Reservation cannot be null");
        $this->assertNotEquals($oldIsVip, $reservation->IsVip(), "Reservation's vip cannot be the same old value");
        $this->assertNotEquals($oldCheckIn, $reservation->getCheckin(), "Reservation's checkIn date cannot be the same old value");
        $this->assertNotEquals($oldCheckOut, $reservation->getCheckOut(), "Reservation's checkOut date cannot be the same old value");
        $this->assertNotEquals($oldRoomIdentifier, $reservation->getRoomIdentifier(), "Reservation's room identifier date cannot be the same old value");

        $this->assertEquals($hotel, $reservation->getHotel(), "Reservation's hotel must be the same in input");
        $this->assertEquals($person, $reservation->getPerson(), "Reservation's person must be the same in input");
        $this->assertEquals($newIsVip, $reservation->IsVip(), "Reservation's vip must be the same in input");
        $this->assertEquals($newCheckIn, $reservation->getCheckin(), "Reservation's checkIn date must be the same in input");
        $this->assertEquals($newCheckOut, $reservation->getCheckOut(), "Reservation's checkout date must be the same in input");
        $this->assertEquals($newRoomIdentifier, $reservation->getRoomIdentifier(), "Reservation's room identifier must be the same in input");
    }

    public function testIdMustBeSequential()
    {
        $hotel = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
        $person = new Person("Nicolas", "22");
        $checkIn = new DateTime("2024-11-4");
        $checkOut = new DateTime("2024-11-6");
        $roomIdentifier = "200A";

        $reservation = new Reservation($hotel, $person, $checkIn, $checkOut, $roomIdentifier, false);
        $initialId = $reservation->getId();

        for ($i = $initialId; $i < $initialId + 100; $i++)
        {
            $reservation = new Reservation($hotel, $person, $checkIn, $checkOut, $roomIdentifier, false);
            $this->assertEquals( $i+1, $reservation-> getId(), "Reservation id must be sequential");
        }
    }

    public function testMustShowToString()
    {
        $hotel = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
        $person = new Person("Nicolas", "22");
        $checkIn = new DateTime("2024-11-4");
        $checkOut = new DateTime("2024-11-6");
        $roomIdentifier = "200A";
        $isVip = false;

        $reservation = new Reservation($hotel, $person, $checkIn, $checkOut, $roomIdentifier, $isVip);

        $reservationTestString = "Reservation ID: {$reservation->getId()}\n" .
            "Hotel: {$hotel->getName()}\n" .
            "Guest: {$person->getName()}\n" .
            "Check-in: {$checkIn->format('Y-m-d H:i:s')}\n" .
            "Check-out: {$checkOut->format('Y-m-d H:i:s')}\n" .
            "Room Identifier: {$roomIdentifier}\n" .
            "VIP: " . ($isVip ? 'Yes' : 'No');

        $this->assertNotNull($reservation);
        $this->assertEquals($reservationTestString, $reservation);
    }

}


