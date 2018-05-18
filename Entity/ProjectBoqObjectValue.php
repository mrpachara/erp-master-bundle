<?php

namespace Erp\Bundle\MasterBundle\Entity;

/**
 * ProjectBoqObjectValue Entity
 */
abstract class ProjectBoqObjectValue {

  /**
  * @var string
  */
  private $id;

  /**
   * constructor
   */
  public function __construct() { }

  /**
   * Get id
   *
   * @return string
   */
  public function getId(){
      return $this->id;
  }
}
