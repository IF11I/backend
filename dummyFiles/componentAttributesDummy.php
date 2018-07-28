<?php
require_once "bootstrap.php";

$attributes = ['Seriennummer', 'RAM Größe', 'CPU Bezeichnung', 'Festplatte Größe', 'Festplatte Typ', 'Grafikausgang', 'Anzahl Ports', 'Uplinktyp', 'IP1', 'IP2', 'IP3', 'IP4', 'WLAN standart', 'Druckertyp', 'Druckerart', 'Druckformat', 'Beidseitig', 'ANSI Lumen', 'Eingang', 'Lautsprecher', 'Anschlusstyp', 'Versionsnummer', 'Lizenztyp', 'Lizenzanzahl', 'Lizenzlaufzeit', 'Lizenzinformationen', 'Installationshinweise'];
foreach($attributes as $attribute) {
    $attributeEntity = new \Entities\componentAttributesEntity();
    $attributeEntity->setBezeichnung($attribute);
    $entityManager->persist($attributeEntity);
}

$entityManager->flush();

echo "Created Dummy Attributes";

