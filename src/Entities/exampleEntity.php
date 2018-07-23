<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * This is just an example Entity class for the Doctrine Databaseconnections
 */

/**
* @ORM\Entity
* @ORM\Table(name="exampleEntity")
*/
class exampleEntity {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    public function getId(): int {
      return $this->id;
    }

    public function getName(): string {
      return $this->name;
    }

    public function setName(string $name): void {
      $this->name = $name;
    }
}