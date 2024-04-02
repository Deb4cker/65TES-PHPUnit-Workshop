<?php

//use workshop\Model\Hotel;
//use workshop\Model\Person;
//use workshop\Model\Reservation;
//
//$hotel1 = new Hotel("Águas verdes", 3, "Jaboatão dos Guararapes - PE", 100, 100, 10);
//$hotel2 = new Hotel("Hotel da Ana", 4, "Analândia - MG",1, 50, 3);
//$hotel3 = new Hotel("Passa & Fica", 5, "Passa e Fica - RN", 2, 100, 12);
//
//$hotels = [$hotel1, $hotel2, $hotel3];
//
//echo "Digite seu nome: ";
//$nome = fgets(STDIN);
//
//echo "Digite sua idade: ";
//$idade = fgets(STDIN);
//
//$person = new Person($nome, $idade);
//
//echo "Qual hotel você deseja reservar: ";
//for ($i = 0; $i < count($hotels); $i++) {
//echo "Hotel " . $hotels[$i]->getName() . "($i + 1) . \n";
//}
//
//$hotel = $hotels[fgets(STDIN) - 1];
//
//echo "Mês que vai entrar: ";
//$mesEntrada = fgets(STDIN);
//
//echo "Dia que vai entrar: ";
//$diaEntrada = fgets(STDIN);
//
//echo "Ano que vai entrar: ";
//$anoEntrada = fgets(STDIN);
//
//echo "Mês que vai sair: ";
//$mesSaida = fgets(STDIN);
//
//echo "Dia que vai sair: ";
//$diaSaida = fgets(STDIN);
//
//echo "Ano que vai sair: ";
//$anoSaida = fgets(STDIN);
//
//$checkIn = new DateTime("$anoEntrada-$mesEntrada-$diaEntrada");
//$checkOut = new DateTime("$anoSaida-$mesSaida-$diaSaida");
//
//echo "Você é VIP? (s/n): ";
//
//$isVip = fgets(STDIN) == "s";
//
//$reservation = new Reservation($hotel, $person, $checkIn, $checkOut, "200A", $isVip);
//
//$person->addReservation($reservation);
//$hotel->addReservation($reservation);
//
//echo "Reserva feita com sucesso!";
//
//echo $person->getPersonInfo();
