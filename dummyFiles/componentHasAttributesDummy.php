<?php

require_once "bootstrap.php";

$componentHasAttributes = [];
$componentHasAttributes[] = [
    'componentID' => "1",
    'attributeId' => "1",
    'value' => "42A1317",
];
$componentHasAttributes[] = [
    'componentID' => "1",
    'attributeId' => "2",
    'value' => "4 GB",
];
$componentHasAttributes[] = [
    'componentID' => "1",
    'attributeId' => "3",
    'value' => "Intel Core i5 3470",
];
$componentHasAttributes[] = [
    'componentID' => "1",
    'attributeId' => "4",
    'value' => "500 Gb",
];
$componentHasAttributes[] = [
    'componentID' => "1",
    'attributeId' => "5",
    'value' => "SSD",
];
$componentHasAttributes[] = [
    'componentID' => "1",
    'attributeId' => "6",
    'value' => "HDML",
];
foreach($componentHasAttributes as $componentHasAttribute) {
    $componentHasAttributesEntity = new \Entities\componentHasAttributesEntity();
    $componentHasAttributesEntity->setKomponentenId(utf8_decode($componentHasAttribute['componentID']));
    $componentHasAttributesEntity->setAttributId(utf8_decode($componentHasAttribute['attributeId']));
    $componentHasAttributesEntity->setWert(utf8_decode($componentHasAttribute['value']));
    $entityManager->persist($componentHasAttributesEntity);
}

$entityManager->flush();

echo "Created Dummy componentHasAttributes";
