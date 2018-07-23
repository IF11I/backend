<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require 'vendor/autoload.php';

// Doctrine ORM config
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, null, null, false);

$conn = array(
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'test',
    'user' => 'root',
    'password' => '',
);

$entityManager = EntityManager::create($conn, $config);