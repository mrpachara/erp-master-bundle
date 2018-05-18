<?php

namespace Erp\Bundle\MasterBundle\Entity;


use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * Employee Entity
 */
class Employee extends CoreAccount {
  /**
   * person
   *
   * @var PersonIndividual
   */
  protected $individual;

  /**
   * constructor
   *
   * @param Thing|null $thing
   */
  public function __construct(Thing $thing = null) {
    parent::__construct($thing);
  }

  /**
   * @return PersonIndividual
   */
  public function getIndividual()
  {
    return $this->individual;
  }

  /**
   * @param PersonIndividual $individual
   *
   * @return static
   */
  public function setIndividual(PersonIndividual $individual)
  {
    $this->individual = $individual;
    return $this;
  }
}
