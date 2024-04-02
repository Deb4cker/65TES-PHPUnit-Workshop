<?php
namespace test\Model;

use DateTime;
use PHPUnit\Framework\TestCase;
use workshop\Model\Hotel;
use workshop\Model\Person;
use function PHPUnit\Framework\assertNotNull;

class HotelTest extends TestCase
{

    public function testMustCreateReservation(): void
    {
        $person = new Person("Nicolas", "22");
        $checkIn = new DateTime("2024-11-4");
        $checkOut = new DateTime("2024-11-6");
        $roomIdentifier = "200A";

        $hotel = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
        $reservation = $hotel->createReservation($person, $checkIn, $checkOut, $roomIdentifier, true);

        $this->assertNotNull($reservation, "Reservation cannot be null");
        $this->assertEquals($person, $reservation->getPerson(), "Person must be the same");
        $this->assertEquals($checkIn, $reservation->getCheckin(), "CheckIn date must be the same");
        $this->assertEquals($checkOut, $reservation->getCheckOut(), "CheckOut date must be the same");
        $this->assertEquals($roomIdentifier, $reservation->getRoomIdentifier(), "Room identifier must be the same");
        $this->assertTrue($reservation->IsVip(), "Reservation must be vip");
    }

    public function testMustCreateHotel() : void
    {
        $name = "Águas verdes";
        $stars = 3;
        $address = "Jaboatão dos Guararapes - PE";
        $vacancies = 100;
        $roomCount = 100;
        $vipRoomCount = 10;

        $hotel = new Hotel($name, $stars, $address, $vacancies, $roomCount, $vipRoomCount);

        $this->assertNotNull($hotel, "Hotel must not be null");
        $this->assertEquals($name, $hotel->getName(), "Hotel name must be the same of the input");
        $this->assertEquals($stars, $hotel->getStars(), "Hotel stars must be the same of the input");
        $this->assertEquals($address, $hotel->getAddress(), "Hotel address must be the same of the input");
        $this->assertEquals($vacancies, $hotel->getVacancies(), "Hotel vacancies must be the same of the input");
        $this->assertEquals($roomCount, $hotel->getRoomCount(), "Hotel room count must be the same of the input");
        $this->assertEquals($vipRoomCount, $hotel->getVipRoomCount(), "Hotel vip rooms count must be the same of the input");
    }

    public function testMustUpdateHotelInfo() : void
    {
        $name = "Águas verdes";
        $stars = 3;
        $address = "Jaboatão dos Guararapes - PE";
        $vacancies = 100;
        $roomCount = 100;
        $vipRoomCount = 10;

        $person = new Person("Nicolas", "22");
        $checkIn = new DateTime("2024-11-4");
        $checkOut = new DateTime("2024-11-6");
        $roomIdentifier = "200A";

        $hotel = new Hotel($name, $stars, $address, $vacancies, $roomCount, $vipRoomCount);

        $newName = "Águas azuis";
        $newStars = 2;
        $newAddress = "Tartarugalzinho - AP";
        $hotel->createReservation($person, $checkIn, $checkOut, $roomIdentifier, true);
        $newVacancies = $vacancies - 1;
        $newRoomCount = 200;
        $newVipRoomCount = 20;

        $hotel->setName($newName);
        $hotel->setStars($newStars);
        $hotel->setAddress($newAddress);
        $hotel->setRoomCount($newRoomCount);
        $hotel->setVipRoomCount($newVipRoomCount);

        $this->assertNotNull($hotel, "Hotel must not be null");
        $this->assertNotEquals($name, $hotel->getName(), "Hotel name cannot be the same old");
        $this->assertNotEquals($stars, $hotel->getStars(), "Hotel stars cannot be the same old");
        $this->assertNotEquals($address, $hotel->getAddress(), "Hotel address cannot be the same old");
        $this->assertNotEquals($vacancies, $hotel->getVacancies(), "Hotel vacancies cannot be the same old");
        $this->assertNotEquals($roomCount, $hotel->getRoomCount(), "Hotel room count cannot be the same old");
        $this->assertNotEquals($vipRoomCount, $hotel->getVipRoomCount(), "Hotel vip rooms count cannot be the same old");

        $this->assertEquals($newName, $hotel->getName(), "Hotel name must be the same of the input");
        $this->assertEquals($newStars, $hotel->getStars(), "Hotel stars must be the same of the input");
        $this->assertEquals($newAddress, $hotel->getAddress(), "Hotel address must be the same of the input");
        $this->assertEquals($newVacancies, $hotel->getVacancies(), "Hotel vacancies must be the same of the input");
        $this->assertEquals($newRoomCount, $hotel->getRoomCount(), "Hotel room count must be the same of the input");
        $this->assertEquals($newVipRoomCount, $hotel->getVipRoomCount(), "Hotel vip rooms count must be the same of the input");
    }

    public function testIdMustBeSequential()
    {
        $name = "Águas verdes";
        $stars = 3;
        $address = "Jaboatão dos Guararapes - PE";
        $vacancies = 100;
        $roomCount = 100;
        $vipRoomCount = 10;

        $hotel = new Hotel($name, $stars, $address, $vacancies, $roomCount, $vipRoomCount);
        $initialId = $hotel->getId();

        for ($i = $initialId; $i < $initialId + 100; $i++)
        {
            $hotel = new Hotel($name, $stars, $address, $vacancies, $roomCount, $vipRoomCount);
            $this->assertEquals( $i+1, $hotel-> getId(), "Hotel id must be sequential");
        }
    }

    public function testMustShowToString(): void
    {
        $name = "Águas verdes";
        $stars = 3;
        $address = "Jaboatão dos Guararapes - PE";
        $vacancies = 100;
        $roomCount = 100;
        $vipRoomCount = 10;

        $hotel = new Hotel($name, $stars, $address, $vacancies, $roomCount, $vipRoomCount);

        $hotelTestString =
         "Id: {$hotel->getId()},\n
         Name: {$hotel->getName()},\n
         Stars: {$hotel->getStars()},\n
         Address: {$hotel->getAddress()},\n
         Vacancies: {$hotel->getVacancies()},\n
         Room Count: {$hotel->getRoomCount()},\n
         VIP Room Count: {$hotel->getVipRoomCount()}";

        assertNotNull($hotel);
        $this->assertEquals($hotelTestString, $hotel);
    }

}
