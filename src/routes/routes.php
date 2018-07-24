<?php
namespace routes;

use \DateTime;
use Entities\componentAttributesEntity;
use Entities\componentHasAttributesEntity;
use Entities\supplierEntity;
use Entities\roomEntity;
use Entities\componentEntity;
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
        if(isset($roomData['number']))
            $room->setNr(utf8_decode($roomData['number']));
        if(isset($roomData['name']))
            $room->setBezeichnung(utf8_decode($roomData['name']));
        if(isset($roomData['notes']))
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

        if(isset($supplierData['name']))
            $supplier->setName(utf8_decode($supplierData['name']));
        if(isset($supplierData['street']))
            $supplier->setStrasse(utf8_decode($supplierData['street']));
        if(isset($supplierData['postalCode']))
            $supplier->setPlz(utf8_decode($supplierData['postalCode']));
        if(isset($supplierData['city']))
            $supplier->setOrt(utf8_decode($supplierData['city']));
        if(isset($supplierData['telephone']))
            $supplier->setTelefon(utf8_decode($supplierData['telephone']));
        if(isset($supplierData['mobile']))
            $supplier->setMobil(utf8_decode($supplierData['mobile']));
        if(isset($supplierData['fax']))
            $supplier->setFax(utf8_decode($supplierData['fax']));
        if(isset($supplierData['email']))
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

/**
 * getting all the components
 * @return HTTP response
 */
$app->get('/components', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentEntity');
    $components = $repository->findAll();
    $result = [];

    $attributeRepository = $entityManager->getRepository('Entities\componentHasAttributesEntity');
    $attributNamenRepository = $entityManager->getRepository('Entities\componentAttributesEntity');

    foreach($components as $component) {
        $attributesObj = $attributeRepository->findBy(array('komponentenId' => utf8_encode($component->getId())));
        $attributes = [];
        foreach($attributesObj as $attributeObj) {
            $attributesNameObj = $attributNamenRepository->findOneBy(array('id' => utf8_encode($attributeObj->getAttributId())));
            $attributes[] = [
                'id' => utf8_encode($attributeObj->getAttributId()),
                'label' => utf8_encode($attributesNameObj->getBezeichnung()),
                'value' => utf8_encode($attributeObj->getWert()),
            ];
        }
        $result[] = [
            'id' => utf8_encode($component->getId()),
            'roomId' => utf8_encode($component->getRaumId()),
            'supplierId' => utf8_encode($component->getLieferantenId()),
            'datePurchased' => $component->getEinkaufsdatum(),
            'dateWarrantyEnd' => $component->getGewaehrleistungsende(),
            'notes' => utf8_encode($component->getNotiz()),
            'manufacturer' => utf8_encode($component->getHersteller()),
            'componentTypeId' => utf8_encode($component->getKomponentenartId()),
            'attributes' => $attributes,
        ];
    }
    return $response->withJson($result);
});

/**
 * getting a single component by Id
 * @param int id
 * @return HTTP response
 */
$app->get('/components/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentEntity');
    $id = $args['id'];
    $component = $repository->find($id);

    $attributeRepository = $entityManager->getRepository('Entities\componentHasAttributesEntity');
    $attributNamenRepository = $entityManager->getRepository('Entities\componentAttributesEntity');

    if($component != null) {
        $attributesObj = $attributeRepository->findBy(array('komponentenId' => utf8_encode($component->getId())));
        $attributes = [];
        foreach($attributesObj as $attributeObj) {
            $attributesNameObj = $attributNamenRepository->findOneBy(array('id' => utf8_encode($attributeObj->getAttributId())));
            $attributes[] = [
                'id' => utf8_encode($attributeObj->getAttributId()),
                'label' => utf8_encode($attributesNameObj->getBezeichnung()),
                'value' => utf8_encode($attributeObj->getWert()),
            ];
        }
        $result = [
            'id' => utf8_encode($component->getId()),
            'roomId' => utf8_encode($component->getRaumId()),
            'supplierId' => utf8_encode($component->getLieferantenId()),
            'datePurchased' => $component->getEinkaufsdatum(),
            'dateWarrantyEnd' => $component->getGewaehrleistungsende(),
            'notes' => utf8_encode($component->getNotiz()),
            'manufacturer' => utf8_encode($component->getHersteller()),
            'componentTypeId' => utf8_encode($component->getKomponentenartId()),
            'attributes' => $attributes,
        ];
        return $response->withJson($result);
    }else {
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * adding a component
 * @return HTTP response
 */
$app->post('/components', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $component = $request->getParsedBody();
    $componentEntity = new componentEntity();

    $attributeRepository = $entityManager->getRepository('Entities\componentAttributesEntity');

    $componentEntity->setRaumId(utf8_decode($component['roomId']));
    $componentEntity->setLieferantenId(utf8_decode($component['supplierId']));
    $componentEntity->setEinkaufsdatum(new DateTime(utf8_decode($component['datePurchased'])));
    $componentEntity->setGewaehrleistungsende(new DateTime(utf8_decode($component['dateWarrantyEnd'])));
    $componentEntity->setNotiz(utf8_decode($component['notes']));
    $componentEntity->setHersteller(utf8_decode($component['manufacturer']));
    $componentEntity->setKomponentenartId(utf8_decode($component['componentTypeId']));
    $componentEntity->setRaumId(utf8_decode($component['roomId']));

    $entityManager->persist($componentEntity);
    $entityManager->flush();



    $attributesObj = json_decode($component['attributes']);
    foreach($attributesObj as $attributeObj) {
        // Parsing the Class stdClass Object into an Array in oder to get it's data
        $attribute = get_object_vars($attributeObj);

        $componentHasAttributesEntity = new componentHasAttributesEntity();

        $componentHasAttributesEntity->setKomponentenId(utf8_encode($componentEntity->getId()));
        $componentHasAttributesEntity->setWert($attribute['value']);

        // Seraching for attribute Name
        $attributeEntity = $attributeRepository->findOneBy(array('bezeichnung' => $attribute['label']));
        if($attributeEntity != null){
            $attributeId = utf8_encode($attributeEntity->getId());
            $componentHasAttributesEntity->setAttributId($attributeId);
        }else {
            $componentAttributesEntity = new componentAttributesEntity();
            $componentAttributesEntity->setBezeichnung($attribute['label']);
            $entityManager->persist($componentAttributesEntity);
            $entityManager->flush();
            $componentHasAttributesEntity->setAttributId(utf8_encode($componentAttributesEntity->getId()));
        }

        $entityManager->persist($componentHasAttributesEntity);
    }
    $entityManager->flush();


    return $response->withStatus(201, "Data created successfully");
});

/**
 * editing a component
 * @return HTTP response
 */
$app->put('/components/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentEntity');
    $id = $args['id'];
    $component = $repository->find($id);
    $componentData = $request->getParsedBody();
    if($component != null) {

        if(isset($componentData['roomId']))
            $component->setRaumId(utf8_decode($componentData['roomId']));
        if(isset($componentData['supplierId']))
            $component->setLieferantenId(utf8_decode($componentData['supplierId']));
        if(isset($componentData['datePurchased']))
            $component->setEinkaufsdatum(new DateTime(utf8_decode($componentData['datePurchased'])));
        if(isset($componentData['dateWarrantyEnd']))
            $component->setGewaehrleistungsende(new DateTime(utf8_decode($componentData['dateWarrantyEnd'])));
        if(isset($componentData['notes']))
            $component->setNotiz(utf8_decode($componentData['notes']));
        if(isset($componentData['manufacturer']))
            $component->setHErsteller(utf8_decode($componentData['manufacturer']));
        if(isset($componentData['componentTypeId']))
            $component->setKomponentenartId(utf8_decode($componentData['componentTypeId']));
        if(isset($componentData['attributes']))
            $tmp = [];
//            $component->setName(utf8_decode($componentData['roomId']));

        $entityManager->persist($component);
        $entityManager->flush();
    }else {
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * delets a component
 * @return HTTP response
 */
$app->delete('/components/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentEntity');
    $id = $args['id'];
    $component = $repository->find($id);
    if($component != null) {
        $entityManager->remove($component);
        $entityManager->flush();
        return $response;
    } else {
        return $response->withStatus(204, "No Data Found");
    }
});

$app->run();


