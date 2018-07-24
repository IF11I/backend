<?php
namespace routes;

use Entities\supplierEntity;
use Entities\roomEntity;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;

/**
 * getting all the rooms
 * @return HTTP response
 */
$app->get('/rooms', function (Request $request, Response $response) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\roomEntity');
    $rooms = $repository->findAll();
    $result = [];

    foreach($rooms as $room) {
        $result[] = [
            'id' => utf8_encode($room->getId()),
            'name' => utf8_encode($room->getBezeichnung()),
            'number' => utf8_encode($room->getNr()),
            'notes' => utf8_encode($room->getNotiz())
        ];
    }
    return $response->withJson($result);
});

/**
 * getting a single room by Id
 * @param int id
 * @return HTTP response
 */
$app->get('/rooms/{id}', function (Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\roomEntity');
    $id = $args['id'];
    $room = $repository->find($id);
    if($room != null) {
        $result = [
            'id' => utf8_encode($room->getId()),
            'name' => utf8_encode($room->getBezeichnung()),
            'number' => utf8_encode($room->getNr()),
            'notes' => utf8_encode($room->getNotiz())
        ];
        return $response->withJson($result);
    }else {
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * adding a room
 * @return HTTP response
 */
$app->post('/rooms', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $room = $request->getParsedBody();
    $roomEntity = new roomEntity();
    $roomEntity->setNr(utf8_decode($room['number']));
    $roomEntity->setBezeichnung(utf8_decode($room['name']));
    $roomEntity->setNotiz(utf8_decode($room['notes']));

    $entityManager->persist($roomEntity);
    $entityManager->flush();

    return $response->withStatus(201, "Data created successfully");
});

/**
 * editing a room
 * @return HTTP response
 */
$app->put('/rooms/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\roomEntity');
    $id = $args['id'];
    $room = $repository->find($id);
    $roomData = $request->getParsedBody();
    if($room != null) {
        if(isset($roomData['number']) && !trim($roomData['number']) == "")
            $room->setNr(utf8_decode($roomData['number']));
        if(isset($roomData['name']) && !trim($roomData['name']) == "")
            $room->setBezeichnung(utf8_decode($roomData['name']));
        if(isset($roomData['notes']) && !trim($roomData['notes']) == "")
            $room->setNotiz(utf8_decode($roomData['notes']));

        $entityManager->persist($room);
        $entityManager->flush();
    }else {
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * delets a room
 * @return HTTP response
 */
$app->delete('/rooms/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\roomEntity');
    $id = $args['id'];
    $room = $repository->find($id);
    if($room != null) {
        $entityManager->remove($room);
        $entityManager->flush();
        return $response;
    } else {
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * getting all the suppliers
 * @return HTTP response
 */
$app->get('/suppliers', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\supplierEntity');
    $suppliers = $repository->findAll();
    $result = [];

    foreach($suppliers as $supplier) {
        $result[] = [
            'id' => utf8_encode($supplier->getId()),
            'name' => utf8_encode($supplier->getName()),
            'street' => utf8_encode($supplier->getStrasse()),
            'postalCode' => utf8_encode($supplier->getPlz()),
            'city' => utf8_encode($supplier->getOrt()),
            'telephone' => utf8_encode($supplier->getTelefon()),
            'mobile' => utf8_encode($supplier->getMobil()),
            'fax' => utf8_encode($supplier->getFax()),
            'email' => utf8_encode($supplier->getMail())
        ];
    }
    return $response->withJson($result);
});

/**
 * getting a single supplier by Id
 * @param int id
 * @return HTTP response
 */
$app->get('/suppliers/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\supplierEntity');
    $id = $args['id'];
    $supplier = $repository->find($id);
    if($supplier != null) {
        $result = [
            'id' => utf8_encode($supplier->getId()),
            'name' => utf8_encode($supplier->getName()),
            'street' => utf8_encode($supplier->getStrasse()),
            'postalCode' => utf8_encode($supplier->getPlz()),
            'city' => utf8_encode($supplier->getOrt()),
            'telephone' => utf8_encode($supplier->getTelefon()),
            'mobile' => utf8_encode($supplier->getMobil()),
            'fax' => utf8_encode($supplier->getFax()),
            'email' => utf8_encode($supplier->getMail())
        ];
        return $response->withJson($result);
    }else {
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * adding a supplier
 * @return HTTP response
 */
$app->post('/suppliers', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $supplier = $request->getParsedBody();
    $supplierEntity = new supplierEntity();
    $supplierEntity->setName(utf8_decode($supplier['name']));
    $supplierEntity->setStrasse(utf8_decode($supplier['street']));
    $supplierEntity->setPlz(utf8_decode($supplier['postalCode']));
    $supplierEntity->setOrt(utf8_decode($supplier['city']));
    $supplierEntity->setTelefon(utf8_decode($supplier['telephone']));
    $supplierEntity->setMobil(utf8_decode($supplier['mobile']));
    $supplierEntity->setFax(utf8_decode($supplier['fax']));
    $supplierEntity->setMail(utf8_decode($supplier['email']));

    $entityManager->persist($supplierEntity);
    $entityManager->flush();

    return $response->withStatus(201, "Data created successfully");
});

/**
 * editing a supplier
 * @return HTTP response
 */
$app->put('/suppliers/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\supplierEntity');
    $id = $args['id'];
    $supplier = $repository->find($id);
    $supplierData = $request->getParsedBody();
    if($supplier != null) {

        if(isset($supplierData['name']) && !trim($supplierData['name']) == "")
            $supplier->setName(utf8_decode($supplierData['name']));
        if(isset($supplierData['street']) && !trim($supplierData['street']) == "")
            $supplier->setStrasse(utf8_decode($supplierData['street']));
        if(isset($supplierData['postalCode']) && !trim($supplierData['postalCode']) == "")
            $supplier->setPlz(utf8_decode($supplierData['postalCode']));
        if(isset($supplierData['city']) && !trim($supplierData['city']) == "")
            $supplier->setOrt(utf8_decode($supplierData['city']));
        if(isset($supplierData['telephone']) && !trim($supplierData['telephone']) == "")
            $supplier->setTelefon(utf8_decode($supplierData['telephone']));
        if(isset($supplierData['mobile']) && !trim($supplierData['mobile']) == "")
            $supplier->setMobil(utf8_decode($supplierData['mobile']));
        if(isset($supplierData['fax']) && !trim($supplierData['fax']) == "")
            $supplier->setFax(utf8_decode($supplierData['fax']));
        if(isset($supplierData['email']) && !trim($supplierData['email']) == "")
            $supplier->setMail(utf8_decode($supplierData['email']));

        $entityManager->persist($supplier);
        $entityManager->flush();
    }else {
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * delets a supplier
 * @return HTTP response
 */
$app->delete('/suppliers/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\supplierEntity');
    $id = $args['id'];
    $supplier = $repository->find($id);
    if($supplier != null) {
        $entityManager->remove($supplier);
        $entityManager->flush();
        return $response;
    } else {
        return $response->withStatus(204, "No Data Found");
    }
});

$app->run();


