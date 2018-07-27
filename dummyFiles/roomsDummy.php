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
    'number' => "A",
    'notes' => "Raum für ausgemusterte Komponenten",
];
foreach($rooms as $room) {
    $roomsEntity = new \Entities\roomEntity();
    $roomsEntity->setNr(($room['number']));
    $roomsEntity->setBezeichnung(($room['name']));
    $roomsEntity->setNotiz(($room['notes']));
    $entityManager->persist($roomsEntity);
}

$entityManager->flush();

echo "Created Dummy Rooms";
