<?php

require_once "bootstrap.php";

$components = [];
$components[] = [
    'roomId' => "1",
    'supplierId' => "2",
    'datePurchased' => "2000-01-01",
    'dateWarrantyEnd' => "2010-12-31",
    'notes' => "Erster PC",
    'manufacturer' => "Lenovo",
    'componentTypeId' => "1",
    'name' => ""
];
foreach($components as $component) {
    $componentsEntity = new \Entities\componentEntity();
    $componentsEntity->setRaumId(utf8_decode($component['roomId']));
    $componentsEntity->setLieferantenId(utf8_decode($component['supplierId']));
    $componentsEntity->setEinkaufsdatum(utf8_decode($component['datePurchased']));
    $componentsEntity->setGewaehrleistungsende(utf8_decode($component['dateWarrantyEnd']));
    $componentsEntity->setNotiz(utf8_decode($component['notes']));
    $componentsEntity->setHersteller(utf8_decode($component['manufacturer']));
    $componentsEntity->setKomponentenartId(utf8_decode($component['componentTypeId']));
    $componentsEntity->setBezeichnung(utf8_decode($component['name']));
    $entityManager->persist($componentsEntity);
}

$entityManager->flush();

echo "Created Dummy components";
