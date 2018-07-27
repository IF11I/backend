<?php
namespace routes;

use Entities\componentAttributesEntity;
use Entities\componentHasAttributesEntity;
use Entities\supplierEntity;
use Entities\roomEntity;
use Entities\componentEntity;
use Entities\componentTypeEntity;
use Entities\componentTypeAttributesEntity;
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
            'id' => ($room->getId()),
            'name' => ($room->getBezeichnung()),
            'number' => ($room->getNr()),
            'notes' => ($room->getNotiz())
        ];
    }
    $response = $response->withJson($result);
    return $response->withStatus(200, "OK");
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
            'id' => ($room->getId()),
            'name' => ($room->getBezeichnung()),
            'number' => ($room->getNr()),
            'notes' => ($room->getNotiz())
        ];
        $response = $response->withJson($result);
        return $response->withStatus(200, "OK");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
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
    $roomEntity->setNr(($room['number']));
    $roomEntity->setBezeichnung(($room['name']));
    $roomEntity->setNotiz(($room['notes']));

    $entityManager->persist($roomEntity);
    $entityManager->flush();

    $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich erstellt"]);
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
            $room->setNr(($roomData['number']));
        if(isset($roomData['name']))
            $room->setBezeichnung(($roomData['name']));
        if(isset($roomData['notes']))
            $room->setNotiz(($roomData['notes']));

        $entityManager->persist($room);
        $entityManager->flush();

        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich bearbeitet"]);
        return $response->withStatus(200, "Change successful");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
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

        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich gelöscht"]);
        return $response->withStatus(200, "Data deleted successfully");
    } else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
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
            'id' => ($supplier->getId()),
            'name' => ($supplier->getName()),
            'street' => ($supplier->getStrasse()),
            'postalCode' => ($supplier->getPlz()),
            'city' => ($supplier->getOrt()),
            'telephone' => ($supplier->getTelefon()),
            'mobile' => ($supplier->getMobil()),
            'fax' => ($supplier->getFax()),
            'email' => ($supplier->getMail())
        ];
    }
    $response = $response->withJson($result);
    return $response->withStatus(200, "OK");
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
            'id' => ($supplier->getId()),
            'name' => ($supplier->getName()),
            'street' => ($supplier->getStrasse()),
            'postalCode' => ($supplier->getPlz()),
            'city' => ($supplier->getOrt()),
            'telephone' => ($supplier->getTelefon()),
            'mobile' => ($supplier->getMobil()),
            'fax' => ($supplier->getFax()),
            'email' => ($supplier->getMail())
        ];
        $response = $response->withJson($result);
        return $response->withStatus(200, "OK");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
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
    $supplierEntity->setName(($supplier['name']));
    $supplierEntity->setStrasse(($supplier['street']));
    $supplierEntity->setPlz(($supplier['postalCode']));
    $supplierEntity->setOrt(($supplier['city']));
    $supplierEntity->setTelefon(($supplier['telephone']));
    $supplierEntity->setMobil(($supplier['mobile']));
    $supplierEntity->setFax(($supplier['fax']));
    $supplierEntity->setMail(($supplier['email']));

    $entityManager->persist($supplierEntity);
    $entityManager->flush();

    $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich erstellt"]);
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
            $supplier->setName(($supplierData['name']));
        if(isset($supplierData['street']))
            $supplier->setStrasse(($supplierData['street']));
        if(isset($supplierData['postalCode']))
            $supplier->setPlz(($supplierData['postalCode']));
        if(isset($supplierData['city']))
            $supplier->setOrt(($supplierData['city']));
        if(isset($supplierData['telephone']))
            $supplier->setTelefon(($supplierData['telephone']));
        if(isset($supplierData['mobile']))
            $supplier->setMobil(($supplierData['mobile']));
        if(isset($supplierData['fax']))
            $supplier->setFax(($supplierData['fax']));
        if(isset($supplierData['email']))
            $supplier->setMail(($supplierData['email']));

        $entityManager->persist($supplier);
        $entityManager->flush();

        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich bearbeitet"]);
        return $response->withStatus(200, "Change successful");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
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
    $componentRepository = $entityManager->getRepository('Entities\componentEntity');

    $id = $args['id'];
    $supplier = $repository->find($id);
    if($supplier != null) {
        // Check if there are any components using this type
        $component = $componentRepository->findOneBy(array('lieferantenId' => $supplier->getId()));
        // If so, throw error
        if($component != null){
            $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Es gibt noch Komponenten die diesen Typ verwenden"]);
            return $response->withStatus(409, "Cannot delete supplier");
        }
        $entityManager->remove($supplier);
        $entityManager->flush();

        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich gelöscht"]);
        return $response->withStatus(200, "Data removed successfully");
    } else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
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
        $attributesObj = $attributeRepository->findBy(array('komponentenId' => ($component->getId())));
        $attributes = [];
        foreach ($attributesObj as $attributeObj) {
            $attributesNameObj = $attributNamenRepository->findOneBy(array('id' => ($attributeObj->getAttributId())));
            $attributes[] = [
                'id' => ($attributeObj->getAttributId()),
                'label' => ($attributesNameObj->getBezeichnung()),
                'value' => ($attributeObj->getWert()),
            ];
        }

        $datePurchased = get_object_vars($component->getEinkaufsdatum());
        $dateWarrantyEnd = get_object_vars($component->getGewaehrleistungsende());

        $result[] = [
            'id' => ($component->getId()),
            'roomId' => ($component->getRaumId()),
            'supplierId' => ($component->getLieferantenId()),
            'datePurchased' => $datePurchased['date'],
            'dateWarrantyEnd' => $dateWarrantyEnd['date'],
            'notes' => ($component->getNotiz()),
            'manufacturer' => ($component->getHersteller()),
            'componentTypeId' => ($component->getKomponentenartId()),
            'name' => ($component->getBezeichnung()),
            'attributes' => $attributes,
        ];
    }
    $response = $response->withJson($result);
    return $response->withStatus(200, "OK");
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
        $attributesObj = $attributeRepository->findBy(array('komponentenId' => ($component->getId())));
        $attributes = [];
        foreach($attributesObj as $attributeObj) {
            $attributesNameObj = $attributNamenRepository->findOneBy(array('id' => ($attributeObj->getAttributId())));
            $attributes[] = [
                'id' => ($attributeObj->getAttributId()),
                'label' => ($attributesNameObj->getBezeichnung()),
                'value' => ($attributeObj->getWert()),
            ];
        }
        $datePurchased = get_object_vars($component->getEinkaufsdatum());
        $dateWarrantyEnd = get_object_vars($component->getGewaehrleistungsende());
        $result = [
            'id' => ($component->getId()),
            'roomId' => ($component->getRaumId()),
            'supplierId' => ($component->getLieferantenId()),
            'datePurchased' => $datePurchased['date'],
            'dateWarrantyEnd' => $dateWarrantyEnd['date'],
            'notes' => ($component->getNotiz()),
            'manufacturer' => ($component->getHersteller()),
            'componentTypeId' => ($component->getKomponentenartId()),
            'name' => ($component->getBezeichnung()),
            'attributes' => $attributes,
        ];
        return $response->withJson($result);
        $response->withStatus(200, "OK");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
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

    $componentEntity->setRaumId(($component['roomId']));
    $componentEntity->setLieferantenId(($component['supplierId']));
    $componentEntity->setEinkaufsdatum(($component['datePurchased']));
    $componentEntity->setGewaehrleistungsende(($component['dateWarrantyEnd']));
    $componentEntity->setNotiz(($component['notes']));
    $componentEntity->setHersteller(($component['manufacturer']));
    $componentEntity->setKomponentenartId(($component['componentTypeId']));
    $componentEntity->setRaumId(($component['roomId']));
    $componentEntity->setBezeichnung(($component['name']));

    // Save all changes done now, in order to get the id of this dataset
    $entityManager->persist($componentEntity);
    $entityManager->flush();

    // Get the attributes send by user, and decode them
    $attributesObj = $component['attributes'];
    // For every attribute object send by the user
    foreach($attributesObj as $attribute) {

        $componentHasAttributesEntity = new componentHasAttributesEntity();

        // Set the component's id and value, 'cause they're already known
        $componentHasAttributesEntity->setKomponentenId(($componentEntity->getId()));
        $componentHasAttributesEntity->setWert($attribute['value']);

        // Seraching for attribute Name
        $attributeEntity = $attributeRepository->find($attribute['id']);
        // If found
        if($attributeEntity != null){
            // get attributes id, according to the searched name
            $attributeId = ($attributeEntity->getId());
            // and save it into componentHasAttributeEntity
            $componentHasAttributesEntity->setAttributId($attributeId);
        // Otherwise
        }else {
            $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Konnte Attribut nicht finden, bist du sicher dass es existiert?"]);
            return $response->withStatus(209, "Didn't found specified Attribute, are you sure it's existing");
        }

        // if there are any changes not saved, they'll be saved right now
        $entityManager->persist($componentHasAttributesEntity);
    }
    // for speed reasons, this is outside the loop, to save all persisted data at once (except the one's we need the id's from)
    $entityManager->flush();


    $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich erstellt"]);
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

        $attributeRepository = $entityManager->getRepository('Entities\componentAttributesEntity');
        $componentHasAttributesRepository = $entityManager->getRepository('Entities\componentHasAttributesEntity');

        if(isset($componentData['roomId']))
            $component->setRaumId(($componentData['roomId']));
        if(isset($componentData['supplierId']))
            $component->setLieferantenId(($componentData['supplierId']));
        if(isset($componentData['datePurchased']))
            $component->setEinkaufsdatum(($componentData['datePurchased']));
        if(isset($componentData['dateWarrantyEnd']))
            $component->setGewaehrleistungsende(($componentData['dateWarrantyEnd']));
        if(isset($componentData['notes']))
            $component->setNotiz(($componentData['notes']));
        if(isset($componentData['manufacturer']))
            $component->setHersteller(($componentData['manufacturer']));
        if(isset($componentData['componentTypeId']))
            $component->setKomponentenartId(($componentData['componentTypeId']));
        if(isset($componentData['name']))
            $component->setBezeichnung(($componentData['name']));

        // Save all changes done now, in order to get the id of this dataset
        $entityManager->persist($component);
        $entityManager->flush();

        // Find all set attribute value
        $componentHasAttributes = $componentHasAttributesRepository->findBy(array('komponentenId' => $id));
        // For every attribute with the component's id provided
        foreach($componentHasAttributes as $componentTypeAttribute) {
            // Delete all attributes connections
            $entityManager->remove($componentTypeAttribute);
        }
        $entityManager->flush();

        $attributesObj = $componentData['attributes'];
        foreach($attributesObj as $attribute) {

            $componentHasAttributesEntity = new componentHasAttributesEntity();

            // Set the component's id and value, 'cause they're already known
            $componentHasAttributesEntity->setKomponentenId(($component->getId()));
            $componentHasAttributesEntity->setWert($attribute['value']);

            // Seraching for attribute Name
            $attributeEntity = $attributeRepository->find($attribute['id']);
            // If found
            if($attributeEntity != null){
                // get attributes id, according to the searched name
                $attributeId = ($attributeEntity->getId());
                // and save it into componentHasAttributeEntity
                $componentHasAttributesEntity->setAttributId($attributeId);
            // Otherwise
            }else {
                $response = $response->withJson(["isSuccessful" => false, "messageText" => "Konnte Attribut nicht finden, bist du sicher dass es existiert?"]);
                return $response->withStatus(409, "Didn't found specified attribute, are you sure it's existing");
            }

            // if there are any changes not saved, they'll be saved right now
            $entityManager->persist($componentHasAttributesEntity);
        }
        // for speed reasons, this is outside the loop, to save all persisted data at once (except the one's we need the id's from)
        $entityManager->flush();

        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich erstellt"]);
        return $response->withStatus(200, "Data created successfully");


    }else {
        $response = $response->withJson(["isSuccessful" => false, "messageText" => "Keine Daten gefunden"]);
        return $response->withStatus(204, "Keine Daten gefunden");
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

        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich gelöscht"]);
        return $response->withStatus(200, "Data removed successfully");
    } else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * getting all the componentTypes
 * @return HTTP response
 */
$app->get('/componenttypes', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentTypeEntity');
    $componenttypes = $repository->findAll();
    $result = [];

    $mappingRepository = $entityManager->getRepository('Entities\componentTypeAttributesEntity');
    $attributeRepository = $entityManager->getRepository('Entities\componentAttributesEntity');

    foreach($componenttypes as $componenttype) {
        $mappings = $mappingRepository->findBy(array('componentTypeId' => $componenttype->getId()));
        $attributes = [];
        foreach($mappings as $mapping) {
            $attribute = $attributeRepository->findOneBy(array('id' => $mapping->getAttributeId()));
            $attributes[] = [
                'id' => ($attribute->getId()),
                'label' => ($attribute->getBezeichnung()),
            ];
        }
        $result[] = [
            'id' => ($componenttype->getId()),
            'name' => ($componenttype->getBezeichnung()),
            'attributes' => $attributes,
        ];
    }
    $response = $response->withJson($result);
    return $response->withStatus(200, "OK");
});

/**
 * getting a single componentType by Id
 * @param int id
 * @return HTTP response
 */
$app->get('/componenttypes/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentTypeEntity');
    $id = $args['id'];
    $componenttype = $repository->find($id);

    $mappingRepository = $entityManager->getRepository('Entities\componentTypeAttributesEntity');
    $attributeRepository = $entityManager->getRepository('Entities\componentAttributesEntity');

    if($componenttype != null) {
        $mappings = $mappingRepository->findBy(array('componentTypeId' => $componenttype->getId()));
        $attributes = [];
        foreach($mappings as $mapping) {
            $attribute = $attributeRepository->findOneBy(array('id' => $mapping->getAttributeId()));
            $attributes[] = [
                'id' => ($attribute->getId()),
                'label' => ($attribute->getBezeichnung()),
            ];
        }
        $result = [
            'id' => ($componenttype->getId()),
            'name' => ($componenttype->getBezeichnung()),
            'attributes' => $attributes,
        ];
        $response = $response->withJson($result);
        return $response->withStatus(200, "OK");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * adding a componentType
 * @return HTTP response
 */
$app->post('/componenttypes', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $componenttype = $request->getParsedBody();
    $componentTypeEntity = new componentTypeEntity();

    $attributeRepository = $entityManager->getRepository('Entities\componentAttributesEntity');

    $componentTypeEntity->setBezeichnung(($componenttype['name']));

    // Save all changes done now, in order to get the id of this dataset
    $entityManager->persist($componentTypeEntity);
    $entityManager->flush();

    // Get the attributes send by user, and decode them
    $attributesObj = $componenttype['attributes'];
    // For every attribute object send by the user
    foreach($attributesObj as $attribute) {

        $componentTypeAttributesEntity = new componentTypeAttributesEntity();

        // Set the componentType's id, 'cause it is already known
        $componentTypeAttributesEntity->setComponentTypeId(($componentTypeEntity->getId()));

        // Seraching for attribute id
        $attributeEntity = $attributeRepository->find($attribute['id']);
        // If found
        if($attributeEntity != null){
            // get attributes id, according to the searched id
            $attributeId = ($attributeEntity->getId());
            // and save it into componentHasAttributeEntity
            $componentTypeAttributesEntity->setAttributeId($attributeId);
        // Otherwise
        }else {
            $response = $response->withJson(["isSuccessful" => false, "messageText" => "Konnte Attribut nicht finden, bist du sicher dass es existiert?"]);
            return $response->withStatus(409, "Didn't found specified attribute, are you sure it's existing");
        }

        // if there are any changes not saved, they'll be saved right now
        $entityManager->persist($componentTypeAttributesEntity);
    }
    // for speed reasons, this is outside the loop, to save all persisted data at once (except the one's we need the id's from)
    $entityManager->flush();

    $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich erstellt"]);
    return $response->withStatus(201, "Data created successfully");
});

/**
 * editing a componentType
 * @return HTTP response
 */
$app->put('/componenttypes/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $componentTypeRepository = $entityManager->getRepository('Entities\componentTypeEntity');
    $id = $args['id'];
    $componentType = $componentTypeRepository->find($id);
    $componentTypeData = $request->getParsedBody();
    if($componentType != null) {

        $componentTypeAttributesRepository = $entityManager->getRepository('Entities\componentTypeAttributesEntity');
        $attributeRepository = $entityManager->getRepository('Entities\componentAttributesEntity');

        if(isset($componentTypeData['name']))
            $componentType->setBezeichnung(($componentTypeData['name']));
        $entityManager->persist($componentType);

        // Find all set attributes
        $componentTypeAttributes = $componentTypeAttributesRepository->findBy(array('componentTypeId' => $componentType->getId()));
        // For every attribute with the componentType id provided
        foreach($componentTypeAttributes as $componentTypeAttribute) {
            // Delete all attributes connections
            $entityManager->remove($componentTypeAttribute);
        }
        $entityManager->flush();

        // Decode provided componentType attributes
        $attributesObj = $componentTypeData['attributes'];
        // For every attribute provided
        foreach($attributesObj as $attribute) {

            // Creating new ComponentTypeAttributesEntity
            $componentTypeAttributesEntity = new componentTypeAttributesEntity();

            // Seraching for attribute id
            $attributeEntity = $attributeRepository->find($attribute['id']);

            // If found
            if($attributeEntity != null){
                // Setting componentType's id 'cause it'S already known
                $componentTypeAttributesEntity->setComponentTypeId($componentTypeData['id']);
                // get attributes id, according to the searched id
                $attributeId = ($attributeEntity->getId());
                // and save it into componentHasAttributeEntity
                $componentTypeAttributesEntity->setAttributeId($attributeId);
                $entityManager->persist($componentTypeAttributesEntity);
            // Otherwise
            }else {
                $response = $response->withJson(["isSuccessful" => false, "messageText" => "Konnte Attribut nicht finden, bist du dir sicher dass es existiert?"]);
                return $response->withStatus(409, "Didn't found specified attribute, are you sure it's existing");
            }
            $entityManager->flush();
        }
        $response = $response->withJson(["isSuccessful" => true, "messageText" => "Daten erfolgreich erstellt"]);
        return $response->withStatus(200, "Data changed successfully");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * delets a componentType
 * @return HTTP response
 */
$app->delete('/componenttypes/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $componentTypeRepository = $entityManager->getRepository('Entities\componentTypeEntity');
    $componentRepository = $entityManager->getRepository('Entities\componentEntity');

    $id = $args['id'];
    $componentType = $componentTypeRepository->find($id);
    // If the componentType exists
    if($componentType != null) {
        // Check if there are any components using this type
        $component = $componentRepository->findOneBy(array('komponentenartId' => $componentType->getId()));
        // If so, throw error
        if($component != null){
            $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Es gibt noch Komponenten die diesen Typ verwenden"]);
            return $response->withStatus(409, "Cannot delete ComponentType");
        }
        // Otherwise delete the desired componentType
        $entityManager->remove($componentType);
        $entityManager->flush();

        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich gelöscht"]);
        return $response->withStatus(200, "Data removed successfully");
    } else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * getting all the attributes
 * @return HTTP response
 */
$app->get('/attributes', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentAttributesEntity');
    $attributes = $repository->findAll();
    $result = [];

    foreach($attributes as $attribute) {
        $result[] = [
            'id' => ($attribute->getId()),
            'label' => ($attribute->getBezeichnung()),
        ];
    }
    $response = $response->withJson($result);
    return $response->withStatus(200, "OK");

});

/**
 * getting a single attribute by Id
 * @param int id
 * @return HTTP response
 */
$app->get('/attributes/{id}', function (Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentAttributesEntity');
    $id = $args['id'];
    $attribute = $repository->find($id);
    if($attribute != null) {
        $result = [
            'id' => ($attribute->getId()),
            'label' => ($attribute->getBezeichnung()),
        ];
        $response = $response->withJson($result);
        return $response->withStatus(200, "OK");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * adding a attribute
 * @return HTTP response
 */
$app->post('/attributes', function(Request $request, Response $response) {

    require '../bootstrap.php';

    $attributeData = $request->getParsedBody();
    $attribute = new componentAttributesEntity();
    $attribute->setBezeichnung(($attributeData['label']));

    $entityManager->persist($attribute);
    $entityManager->flush();

    $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich erstellt"]);
    return $response->withStatus(201, "Data created successfully");
});

/**
 * editing a attribute
 * @return HTTP response
 */
$app->put('/attributes/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentAttributesEntity');
    $id = $args['id'];
    $attribute = $repository->find($id);
    $attributeData = $request->getParsedBody();
    if($attribute != null) {
        if(isset($attributeData['label']))
            $attribute->setBezeichnung(($attributeData['label']));

        $entityManager->persist($attribute);
        $entityManager->flush();
        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich erstellt"]);
        return $response->withStatus(201, "Data edited successfully");
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
        return $response->withStatus(204, "No Data Found");
    }
});

/**
 * delets a attribute
 * @return HTTP response
 */
$app->delete('/attributes/{id}', function(Request $request, Response $response, array $args) {

    require '../bootstrap.php';

    $repository = $entityManager->getRepository('Entities\componentAttributesEntity');
    $id = $args['id'];
    $attribute = $repository->find($id);
    if($attribute != null) {
        $componentHasAttributeRepository = $entityManager->getRepository('Entities\componentHasAttributesEntity');
        $componentHasAttributes = $componentHasAttributeRepository->findBy(array('attributId' => $args['id']));
        foreach($componentHasAttributes as $componentHasAttribute) {
            $entityManager->remove($componentHasAttribute);
        }
        $entityManager->remove($attribute);
        $entityManager->flush();
        $response = $response->withJson(['isSuccessful' => true, 'messageText' => "Daten erfolgreich gelöscht"]);
        return $response->withStatus(200, "Attribute removed successfully");
    } else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Keine Daten gefunden"]);
        return $response->withStatus(204, "No Data Found");
    }
});

$app->run();


