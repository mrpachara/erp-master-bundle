<?php

namespace Erp\Bundle\MasterBundle\Entity;


use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * Vendor Entity
 */
class Vendor extends CoreAccount {
  /**
   * person
   *
   * @var Person
   */
  protected $owner;

  /**
   * constructor
   *
   * @param Thing|null $thing
   */
  public function __construct(Thing $thing = null) {
    parent::__construct($thing);
  }

  /**
   * @return Person
   */
  public function getOwner()
  {
    return $this->owner;
  }

  /**
   * @param Person $owner
   *
   * @return static
   */
  public function setOwner(Person $owner)
  {
    $this->owner = $owner;
    return $this;
  }
}
