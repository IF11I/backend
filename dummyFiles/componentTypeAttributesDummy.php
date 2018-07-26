<?php

require_once "bootstrap.php";

$componentHasAttributes = [];
$componentHasAttributes[] = [
    'componentTypeId' => "1",
    'attributeId' => "1"
];
$componentHasAttributes[] = [
    'componentTypeId' => "1",
    'attributeId' => "2"
];
$componentHasAttributes[] = [
    'componentTypeId' => "1",
    'attributeId' => "3"
];
$componentHasAttributes[] = [
    'componentTypeId' => "1",
    'attributeId' => "4"
];
$componentHasAttributes[] = [
    'componentTypeId' => "1",
    'attributeId' => "5"
];
$componentHasAttributes[] = [
    'componentTypeId' => "1",
    'attributeId' => "6"
];
$componentHasAttributes[] = [
    'componentTypeId' => "2",
    'attributeId' => "1"
];
$componentHasAttributes[] = [
    'componentTypeId' => "2",
    'attributeId' => "7"
];
$componentHasAttributes[] = [
    'componentTypeId' => "2",
    'attributeId' => "8"
];
$componentHasAttributes[] = [
    'componentTypeId' => "3",
    'attributeId' => "1"
];
$componentHasAttributes[] = [
    'componentTypeId' => "3",
    'attributeId' => "7"
];
$componentHasAttributes[] = [
    'componentTypeId' => "3",
    'attributeId' => "9"
];
$componentHasAttributes[] = [
    'componentTypeId' => "4",
    'attributeId' => "1"
];
$componentHasAttributes[] = [
    'componentTypeId' => "4",
    'attributeId' => "13"
];
$componentHasAttributes[] = [
    'componentTypeId' => "5",
    'attributeId' => "1"
];
$componentHasAttributes[] = [
    'componentTypeId' => "5",
    'attributeId' => "14"
];
$componentHasAttributes[] = [
    'componentTypeId' => "5",
    'attributeId' => "15"
];
$componentHasAttributes[] = [
    'componentTypeId' => "5",
    'attributeId' => "16"
];
$componentHasAttributes[] = [
    'componentTypeId' => "5",
    'attributeId' => "17"
];
$componentHasAttributes[] = [
    'componentTypeId' => "6",
    'attributeId' => "1"
];
$componentHasAttributes[] = [
    'componentTypeId' => "6",
    'attributeId' => "18"
];
$componentHasAttributes[] = [
    'componentTypeId' => "6",
    'attributeId' => "19"
];
$componentHasAttributes[] = [
    'componentTypeId' => "6",
    'attributeId' => "20"
];
$componentHasAttributes[] = [
    'componentTypeId' => "7",
    'attributeId' => "1"
];
$componentHasAttributes[] = [
    'componentTypeId' => "7",
    'attributeId' => "21"
];
$componentHasAttributes[] = [
    'componentTypeId' => "8",
    'attributeId' => "22"
];
$componentHasAttributes[] = [
    'componentTypeId' => "8",
    'attributeId' => "23"
];
$componentHasAttributes[] = [
    'componentTypeId' => "8",
    'attributeId' => "24"
];
$componentHasAttributes[] = [
    'componentTypeId' => "8",
    'attributeId' => "25"
];
$componentHasAttributes[] = [
    'componentTypeId' => "8",
    'attributeId' => "26"
];
$componentHasAttributes[] = [
    'componentTypeId' => "8",
    'attributeId' => "27"
];
foreach($componentHasAttributes as $componentHasAttribute) {
    $componentsEntity = new \Entities\componentTypeAttributesEntity();
    $componentsEntity->setComponentTypeId(utf8_decode($componentHasAttribute['componentTypeId']));
    $componentsEntity->setAttributeId(utf8_decode($componentHasAttribute['attributeID']));
    $entityManager->persist($componentsEntity);
}

$entityManager->flush();

echo "Created Dummy components";
