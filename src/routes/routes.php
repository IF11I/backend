<?php
namespace routes;

use \DateTime;
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
        foreach ($attributesObj as $attributeObj) {
            $attributesNameObj = $attributNamenRepository->findOneBy(array('id' => utf8_encode($attributeObj->getAttributId())));
            $attributes[] = [
                'id' => utf8_encode($attributeObj->getAttributId()),
                'label' => utf8_encode($attributesNameObj->getBezeichnung()),
                'value' => utf8_encode($attributeObj->getWert()),
            ];
        }

        $datePurchased = get_object_vars($component->getEinkaufsdatum());
        $dateWarrantyEnd = get_object_vars($component->getGewaehrleistungsende());

        $result[] = [
            'id' => utf8_encode($component->getId()),
            'roomId' => utf8_encode($component->getRaumId()),
            'supplierId' => utf8_encode($component->getLieferantenId()),
            'datePurchased' => $datePurchased['date'],
            'dateWarrantyEnd' => $dateWarrantyEnd['date'],
            'notes' => utf8_encode($component->getNotiz()),
            'manufacturer' => utf8_encode($component->getHersteller()),
            'componentTypeId' => utf8_encode($component->getKomponentenartId()),
            'name' => utf8_encode($component->getBezeichnung()),
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
        $datePurchased = get_object_vars($component->getEinkaufsdatum());
        $dateWarrantyEnd = get_object_vars($component->getGewaehrleistungsende());
        $result = [
            'id' => utf8_encode($component->getId()),
            'roomId' => utf8_encode($component->getRaumId()),
            'supplierId' => utf8_encode($component->getLieferantenId()),
            'datePurchased' => $datePurchased['date'],
            'dateWarrantyEnd' => $dateWarrantyEnd['date'],
            'notes' => utf8_encode($component->getNotiz()),
            'manufacturer' => utf8_encode($component->getHersteller()),
            'componentTypeId' => utf8_encode($component->getKomponentenartId()),
            'name' => utf8_encode($component->getBezeichnung()),
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
    $componentEntity->setEinkaufsdatum(utf8_decode($component['datePurchased']));
    $componentEntity->setGewaehrleistungsende(utf8_decode($component['dateWarrantyEnd']));
    $componentEntity->setNotiz(utf8_decode($component['notes']));
    $componentEntity->setHersteller(utf8_decode($component['manufacturer']));
    $componentEntity->setKomponentenartId(utf8_decode($component['componentTypeId']));
    $componentEntity->setRaumId(utf8_decode($component['roomId']));
    $componentEntity->setBezeichnung(utf8_decode($component['name']));

    // Save all changes done now, in order to get the id of this dataset
    $entityManager->persist($componentEntity);
    $entityManager->flush();

    // Get the attributes send by user, and decode them
    $attributesObj = $component['attributes'];
    // For every attribute object send by the user
    foreach($attributesObj as $attribute) {

        $componentHasAttributesEntity = new componentHasAttributesEntity();

        // Set the component's id and value, 'cause they're already known
        $componentHasAttributesEntity->setKomponentenId(utf8_encode($componentEntity->getId()));
        $componentHasAttributesEntity->setWert($attribute['value']);

        // Seraching for attribute Name
        $attributeEntity = $attributeRepository->find($attribute['id']);
        // If found
        if($attributeEntity != null){
            // get attributes id, according to the searched name
            $attributeId = utf8_encode($attributeEntity->getId());
            // and save it into componentHasAttributeEntity
            $componentHasAttributesEntity->setAttributId($attributeId);
        // Otherwise
        }else {
            $response = $response->withJson(['isSuccessful' => false, 'messageText' => "Didn't found specified Attribute, are you sure it's existing"]);
            return $response->withStatus(209, "Didn't found specified Attribute, are you sure it's existing");
        }

        // if there are any changes not saved, they'll be saved right now
        $entityManager->persist($componentHasAttributesEntity);
    }
    // for speed reasons, this is outside the loop, to save all persisted data at once (except the one's we need the id's from)
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

        $attributeRepository = $entityManager->getRepository('Entities\componentAttributesEntity');
        $componentHasAttributesRepository = $entityManager->getRepository('Entities\componentHasAttributesEntity');

        if(isset($componentData['roomId']))
            $component->setRaumId(utf8_decode($componentData['roomId']));
        if(isset($componentData['supplierId']))
            $component->setLieferantenId(utf8_decode($componentData['supplierId']));
        if(isset($componentData['datePurchased']))
            $component->setEinkaufsdatum(utf8_decode($componentData['datePurchased']));
        if(isset($componentData['dateWarrantyEnd']))
            $component->setGewaehrleistungsende(utf8_decode($componentData['dateWarrantyEnd']));
        if(isset($componentData['notes']))
            $component->setNotiz(utf8_decode($componentData['notes']));
        if(isset($componentData['manufacturer']))
            $component->setHersteller(utf8_decode($componentData['manufacturer']));
        if(isset($componentData['componentTypeId']))
            $component->setKomponentenartId(utf8_decode($componentData['componentTypeId']));
        if(isset($componentData['name']))
            $component->setBezeichnung(utf8_decode($componentData['name']));

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
            $componentHasAttributesEntity->setKomponentenId(utf8_encode($component->getId()));
            $componentHasAttributesEntity->setWert($attribute['value']);

            // Seraching for attribute Name
            $attributeEntity = $attributeRepository->find($attribute['id']);
            // If found
            if($attributeEntity != null){
                // get attributes id, according to the searched name
                $attributeId = utf8_encode($attributeEntity->getId());
                // and save it into componentHasAttributeEntity
                $componentHasAttributesEntity->setAttributId($attributeId);
                // Otherwise
            }else {
                $response = $response->withJson(["isSuccessful" => false, "messageText" => "Didn't found specified Attribute, are you sure it's existing"]);
                return $response->withStatus(409, "Didn't found specified attribute, are you sure it's existing");
            }

            // if there are any changes not saved, they'll be saved right now
            $entityManager->persist($componentHasAttributesEntity);
        }
        // for speed reasons, this is outside the loop, to save all persisted data at once (except the one's we need the id's from)
        $entityManager->flush();


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
        return $response;
    } else {
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
                'id' => utf8_encode($attribute->getId()),
                'label' => utf8_encode($attribute->getBezeichnung()),
            ];
        }
        $result[] = [
            'id' => utf8_encode($componenttype->getId()),
            'name' => utf8_encode($componenttype->getBezeichnung()),
            'attributes' => $attributes,
        ];
    }
    return $response->withJson($result);
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
                'id' => utf8_encode($attribute->getId()),
                'label' => utf8_encode($attribute->getBezeichnung()),
            ];
        }
        $result = [
            'id' => utf8_encode($componenttype->getId()),
            'name' => utf8_encode($componenttype->getBezeichnung()),
            'attributes' => $attributes,
        ];
        return $response->withJson($result);
    }else {
        $response = $response->withJson(['isSuccessful' => false, 'messageText' => "No Data Found"]);
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

    $componentTypeEntity->setBezeichnung(utf8_decode($componenttype['name']));

    // Save all changes done now, in order to get the id of this dataset
    $entityManager->persist($componentTypeEntity);
    $entityManager->flush();

    // Get the attributes send by user, and decode them
    $attributesObj = $componenttype['attributes'];
    // For every attribute object send by the user
    foreach($attributesObj as $attribute) {

        $componentTypeAttributesEntity = new componentTypeAttributesEntity();

        // Set the componentType's id, 'cause it is already known
        $componentTypeAttributesEntity->setComponentTypeId(utf8_encode($componentTypeEntity->getId()));

        // Seraching for attribute id
        $attributeEntity = $attributeRepository->find($attribute['id']);
        // If found
        if($attributeEntity != null){
            // get attributes id, according to the searched id
            $attributeId = utf8_encode($attributeEntity->getId());
            // and save it into componentHasAttributeEntity
            $componentTypeAttributesEntity->setAttributeId($attributeId);
        // Otherwise
        }else {
            $response = $response->withJson(["isSuccessful" => false, "messageText" => "Didn't found specified Attribute, are you sure it's existing"]);
            return $response->withStatus(409, "Didn't found specified attribute, are you sure it's existing");
        }

        // if there are any changes not saved, they'll be saved right now
        $entityManager->persist($componentTypeAttributesEntity);
    }
    // for speed reasons, this is outside the loop, to save all persisted data at once (except the one's we need the id's from)
    $entityManager->flush();

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
            $componentType->setBezeichnung(utf8_decode($componentTypeData['name']));
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
                $attributeId = utf8_encode($attributeEntity->getId());
                // and save it into componentHasAttributeEntity
                $componentTypeAttributesEntity->setAttributeId($attributeId);
                $entityManager->persist($componentTypeAttributesEntity);
            // Otherwise
            }else {
                $response = $response->withJson(["isSuccessful" => false, "messageText" => "Didn't found specified Attribute, are you sure it's existing"]);
                return $response->withStatus(409, "Didn't found specified attribute, are you sure it's existing");
            }
            $entityManager->flush();
        }
    }else {
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
            $response = $response->withJson(['isSuccessful' => false, 'messageText' => "There are some components using this type."]);
            return $response->withStatus(409, "Cannot delete ComponentType");
        }
        // Otherwise delete the desired componentType
        $entityManager->remove($componentType);
        $entityManager->flush();
        return $response;
    } else {
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
            'id' => utf8_encode($attribute->getId()),
            'label' => utf8_encode($attribute->getBezeichnung()),
        ];
    }
    return $response->withJson($result);

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
            'id' => utf8_encode($attribute->getId()),
            'label' => utf8_encode($attribute->getBezeichnung()),
        ];
        return $response->withJson($result);
    }else {
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
    $attribute->setBezeichnung(utf8_decode($attributeData['label']));

    $entityManager->persist($attribute);
    $entityManager->flush();

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
            $attribute->setBezeichnung(utf8_decode($attributeData['label']));

        $entityManager->persist($attribute);
        $entityManager->flush();
        return $response->withStatus(201, "Data edited successfully");
    }else {
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
            var_dump($componentHasAttribute);
            $entityManager->remove($componentHasAttribute);
        }
        $entityManager->remove($attribute);
        $entityManager->flush();
        return $response->withStatus(200, "Attribute removed successfully");
    } else {
        return $response->withStatus(204, "No Data Found");
    }
});

$app->run();


