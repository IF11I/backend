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
    'componentTypeId' => "1"
];
foreach($components as $component) {
    $componentsEntity = new \Entities\componentEntity();
    $componentsEntity->setRaumId($component['roomId']);
    $componentsEntity->setLieferantenId($component['supplierID']);
    $componentsEntity->setEinkaufsdatum($component['datePurchased']);
    $componentsEntity->setGewaehrleistungsende($component['dateWarrantyEnd']);
    $componentsEntity->setNotiz($component['notes']);
    $componentsEntity->setHersteller($component['manufacturer']);
    $componentsEntity->setKomponentenartId($component['componentTypeId']);
    $entityManager->persist($componentsEntity);
}

$entityManager->flush();

echo "Created Dummy components";
