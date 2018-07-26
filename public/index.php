<?php


$_SERVER['REQUEST_URI'] = str_replace("/api", "", $_SERVER["REQUEST_URI"]);

require '../vendor/autoload.php';

require '../src/routes/routes.php';
