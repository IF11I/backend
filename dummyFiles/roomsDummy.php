<?php

require_once "bootstrap.php";

$rooms = [];
$rooms[] = [
    'name' => "Klassenraum",
    'number' => "r216",
    'notes' => "",
];
$rooms[] = [
    'name' => "Klassenraum",
    'number' => "r215",
    'notes' => "",
];
$rooms[] = [
    'name' => "Medienraum",
    'number' => "r101",
    'notes' => "",
];
$rooms[] = [
    'name' => "Laborraum",
    'number' => "r015",
    'notes' => "",
];
$rooms[] = [
    'name' => "Laborraum",
    'number' => "r017",
    'notes' => "",
];
$rooms[] = [
    'name' => "Klassenraum",
    'number' => "r313",
    'notes' => "",
];
$rooms[] = [
    'name' => "Klassenraum",
    'number' => "r303",
    'notes' => "",
];
$rooms[] = [
    'name' => "Ausgemustert",
    'number' => "",
    'notes' => "Raum für ausgemusterte Komponenten",
];
foreach($rooms as $room) {
    $roomsEntity = new \Entities\roomEntity();
    $roomsEntity->setNr(utf8_decode($room['number']));
    $roomsEntity->setBezeichnung(utf8_decode($room['name']));
    $roomsEntity->setNotiz(utf8_decode($room['notes']));
    $entityManager->persist($roomsEntity);
}

$entityManager->flush();

echo "Created Dummy Rooms";
