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
$componentHasAttributes[] = [
    'componentID' => "2",
    'attributeId' => "1",
    'value' => "17B4000",
];
$componentHasAttributes[] = [
    'componentID' => "2",
    'attributeId' => "2",
    'value' => "8 GB",
];
$componentHasAttributes[] = [
    'componentID' => "2",
    'attributeId' => "3",
    'value' => "Intel Core i7",
];
$componentHasAttributes[] = [
    'componentID' => "2",
    'attributeId' => "4",
    'value' => "1000 GB",
];
$componentHasAttributes[] = [
    'componentID' => "2",
    'attributeId' => "5",
    'value' => "magnetisch",
];
$componentHasAttributes[] = [
    'componentID' => "2",
    'attributeId' => "6",
    'value' => "2x VGA",
];
$componentHasAttributes[] = [
    'componentID' => "3",
    'attributeId' => "1",
    'value' => "31C517",
];
$componentHasAttributes[] = [
    'componentID' => "3",
    'attributeId' => "7",
    'value' => "24",
];
$componentHasAttributes[] = [
    'componentID' => "3",
    'attributeId' => "8",
    'value' => "LWL",
];
$componentHasAttributes[] = [
    'componentID' => "4",
    'attributeId' => "1",
    'value' => "20D007",
];
$componentHasAttributes[] = [
    'componentID' => "4",
    'attributeId' => "7",
    'value' => "12",
];
$componentHasAttributes[] = [
    'componentID' => "4",
    'attributeId' => "10",
    'value' => "192.168.0.10",
];
$componentHasAttributes[] = [
    'componentID' => "4",
    'attributeId' => "9",
    'value' => "1.2.3.4",
];
$componentHasAttributes[] = [
    'componentID' => "5",
    'attributeId' => "1",
    'value' => "1A7",
];
$componentHasAttributes[] = [
    'componentID' => "5",
    'attributeId' => "13",
    'value' => "IEEE 802.11",
];
$componentHasAttributes[] = [
    'componentID' => "6",
    'attributeId' => "1",
    'value' => "3XXX6",
];
$componentHasAttributes[] = [
    'componentID' => "6",
    'attributeId' => "14",
    'value' => "Tinte",
];
$componentHasAttributes[] = [
    'componentID' => "6",
    'attributeId' => "15",
    'value' => "SW",
];
$componentHasAttributes[] = [
    'componentID' => "6",
    'attributeId' => "16",
    'value' => "A4",
];
$componentHasAttributes[] = [
    'componentID' => "6",
    'attributeId' => "17",
    'value' => "nein",
];
$componentHasAttributes[] = [
    'componentID' => "7",
    'attributeId' => "1",
    'value' => "2ZZZ13571",
];
$componentHasAttributes[] = [
    'componentID' => "7",
    'attributeId' => "18",
    'value' => "3200",
];
$componentHasAttributes[] = [
    'componentID' => "7",
    'attributeId' => "19",
    'value' => "HDMI",
];
$componentHasAttributes[] = [
    'componentID' => "7",
    'attributeId' => "20",
    'value' => "nein",
];
$componentHasAttributes[] = [
    'componentID' => "8",
    'attributeId' => "1",
    'value' => "5UBS318",
];
$componentHasAttributes[] = [
    'componentID' => "8",
    'attributeId' => "21",
    'value' => "HDMI",
];
$componentHasAttributes[] = [
    'componentID' => "9",
    'attributeId' => "22",
    'value' => "14.4760.1000",
];
$componentHasAttributes[] = [
    'componentID' => "9",
    'attributeId' => "23",
    'value' => "Volumen",
];
$componentHasAttributes[] = [
    'componentID' => "9",
    'attributeId' => "24",
    'value' => "20",
];
$componentHasAttributes[] = [
    'componentID' => "9",
    'attributeId' => "25",
    'value' => "1 Jahr",
];
$componentHasAttributes[] = [
    'componentID' => "9",
    'attributeId' => "26",
    'value' => "12345",
];
$componentHasAttributes[] = [
    'componentID' => "9",
    'attributeId' => "27",
    'value' => "auf alle PCs installieren",
];
foreach($componentHasAttributes as $componentHasAttribute) {
    $componentHasAttributesEntity = new \Entities\componentHasAttributesEntity();
    $componentHasAttributesEntity->setKomponentenId(($componentHasAttribute['componentID']));
    $componentHasAttributesEntity->setAttributId(($componentHasAttribute['attributeId']));
    $componentHasAttributesEntity->setWert(($componentHasAttribute['value']));
    $entityManager->persist($componentHasAttributesEntity);
}

$entityManager->flush();

echo "Created Dummy componentHasAttributes";
