<?php
namespace routes;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Entities\roomEntity;

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

$app->run();


