<?php

require_once "bootstrap.php";

$componentTypes = ['PC', 'Switches', 'Router', 'Accesspoint', 'Drucker', 'Beamer', 'Visualizer', 'Software'];
foreach($componentTypes as $componentType) {
    $componentEntity = new \Entities\componentTypeEntity();
    $componentEntity->setBezeichnung(utf8_decode($componentType));
    $entityManager->persist($componentEntity);
}

$entityManager->flush();

echo "Created Dummy ComponentTypes";
