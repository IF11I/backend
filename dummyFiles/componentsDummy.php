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
    'name' => "P01"
];
$components[] = [
    'roomId' => "2",
    'supplierId' => "1",
    'datePurchased' => "2016-04-02",
    'dateWarrantyEnd' => "2019-05-02",
    'notes' => "",
    'manufacturer' => "Dell",
    'componentTypeId' => "1",
    'name' => "P03"
];
$components[] = [
    'roomId' => "2",
    'supplierId' => "1",
    'datePurchased' => "2016-04-03",
    'dateWarrantyEnd' => "2019-05-03",
    'notes' => "",
    'manufacturer' => "Cisco",
    'componentTypeId' => "2",
    'name' => "Switch01"
];
$components[] = [
    'roomId' => "6",
    'supplierId' => "2",
    'datePurchased' => "2014-07-03",
    'dateWarrantyEnd' => "2020-07-01",
    'notes' => "",
    'manufacturer' => "Cisco",
    'componentTypeId' => "3",
    'name' => "R01"
];
$components[] = [
    'roomId' => "5",
    'supplierId' => "2",
    'datePurchased' => "2007-12-24",
    'dateWarrantyEnd' => "2017-12-24",
    'notes' => "",
    'manufacturer' => "Cisco",
    'componentTypeId' => "4",
    'name' => "A01"
];
$components[] = [
    'roomId' => "3",
    'supplierId' => "2",
    'datePurchased' => "1980-01-01",
    'dateWarrantyEnd' => "1999-01-01",
    'notes' => "",
    'manufacturer' => "HP",
    'componentTypeId' => "5",
    'name' => "Print01"
];
$components[] = [
    'roomId' => "8",
    'supplierId' => "1",
    'datePurchased' => "2017-05-04",
    'dateWarrantyEnd' => "2017-05-05",
    'notes' => "",
    'manufacturer' => "papake",
    'componentTypeId' => "6",
    'name' => "B01"
];
$components[] = [
    'roomId' => "1",
    'supplierId' => "1",
    'datePurchased' => "2018-03-03",
    'dateWarrantyEnd' => "2022-03-03",
    'notes' => "",
    'manufacturer' => "Lightbulb",
    'componentTypeId' => "7",
    'name' => "V01"
];
$components[] = [
    'roomId' => "4",
    'supplierId' => "2",
    'datePurchased' => "2018-03-03",
    'dateWarrantyEnd' => "2022-03-03",
    'notes' => "",
    'manufacturer' => "Microsoft",
    'componentTypeId' => "8",
    'name' => "MS Office 2010"
];
foreach($components as $component) {
    $componentsEntity = new \Entities\componentEntity();
    $componentsEntity->setRaumId(($component['roomId']));
    $componentsEntity->setLieferantenId(($component['supplierId']));
    $componentsEntity->setEinkaufsdatum(($component['datePurchased']));
    $componentsEntity->setGewaehrleistungsende(($component['dateWarrantyEnd']));
    $componentsEntity->setNotiz(($component['notes']));
    $componentsEntity->setHersteller(($component['manufacturer']));
    $componentsEntity->setKomponentenartId(($component['componentTypeId']));
    $componentsEntity->setBezeichnung(($component['name']));
    $entityManager->persist($componentsEntity);
}

$entityManager->flush();

echo "Created Dummy components";
