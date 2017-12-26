<?php

namespace Erp\Bundle\MasterBundle\Entity;

use Erp\Bundle\CoreBundle\Entity\Thing;
use Erp\Bundle\ObjectValueBundle\Entity\Citizen;

/**
 * Person Individual Entity
 */
class PersonIndividual extends Person {
  /**
   * person data
   *
   * @var Citizen
   */
  protected $personData;

  /**
   * constructor
   *
   * @param Thing|null $thing
   */
  public function __construct(Thing $thing = null) {
    parent::__construct($thing);

    $this->personData = new Citizen();
  }
}
