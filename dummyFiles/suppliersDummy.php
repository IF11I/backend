<?php
require_once "bootstrap.php";

$suppliers = [];
$suppliers[] = [
    'name' => "Ecom trading GmbH",
    'strasse' => "Siemensstraße 9",
    'plz' => "85221",
    'ort' => "Dachau",
    'telefon' => "08131-56950",
    'mobil' => "",
    'fax' => "08131-5695300",
    'email' => "info@ecom-trading.net"
];
$suppliers[] = [
    'name' => "Lenovo (Deutschland) GmbH",
    'strasse' => "Meitnerstraße 9",
    'plz' => "70563",
    'ort' => "Stuttgart",
    'telefon' => "0800 55 11 330",
    'mobil' => "",
    'fax' => "",
    'email' => "Fragen_DE@lenovo.com"
];
foreach($suppliers as $supplier) {
    $suppliersEntity = new \Entities\supplierEntity();
    $suppliersEntity->setName(($supplier['name']));
    $suppliersEntity->setStrasse(($supplier['strasse']));
    $suppliersEntity->setPlz(($supplier['plz']));
    $suppliersEntity->setOrt(($supplier['ort']));
    $suppliersEntity->setTelefon(($supplier['telefon']));
    $suppliersEntity->setMobil(($supplier['mobil']));
    $suppliersEntity->setFax(($supplier['fax']));
    $suppliersEntity->setMail(($supplier['email']));
    $entityManager->persist($suppliersEntity);
}

$entityManager->flush();

echo "Created Dummy Suppliers";

