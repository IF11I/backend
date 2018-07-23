<?php
namespace src\routes;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Entities\exampleEntity;

$example = new \Slim\App;
$example->get('/api/test', function (Request $request, Response $response) {
    $exampleEntity = new exampleEntity();

     $exampleEntity->setName("Testinger");

     echo json_encode($exampleEntity->getName());
    return $response;
});


$example->run();