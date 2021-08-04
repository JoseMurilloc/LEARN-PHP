<?php

namespace App\Entity;

use Doctrine\Orm\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Doctor 
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  public $id;
  public $crm;
  public $name;
}