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
    $suppliersEntity->setName(utf8_decode($supplier['name']));
    $suppliersEntity->setStrasse(utf8_decode($supplier['strasse']));
    $suppliersEntity->setPlz(utf8_decode($supplier['plz']));
    $suppliersEntity->setOrt(utf8_decode($supplier['ort']));
    $suppliersEntity->setTelefon(utf8_decode($supplier['telefon']));
    $suppliersEntity->setMobil(utf8_decode($supplier['mobil']));
    $suppliersEntity->setFax(utf8_decode($supplier['fax']));
    $suppliersEntity->setMail(utf8_decode($supplier['email']));
    $entityManager->persist($suppliersEntity);
}

$entityManager->flush();

echo "Created Dummy Suppliers";

