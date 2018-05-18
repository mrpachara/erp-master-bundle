<?php

namespace Erp\Bundle\MasterBundle\Entity;

/**
 * ProjectBoqBudgetType Entity
 */
class ProjectBoqBudgetType extends ProjectBoqObjectValue {

  /**
   * @var ProejctBoq
   */
  protected $boq;

  /**
   * @var string
   */
  protected $code;

  /**
   * @var string
   */
  protected $_code;

  /**
   * name
   *
   * @var string
   */
  protected $name;

  /**
   * constructor
   *
   * @param ProjectBoq $boq
   */
  public function __construct(ProjectBoq $boq = null) {
    parent::__construct();

    $this->boq = $boq;
  }

  /**
   * @return ProjectBoq
   */
  public function getBoq()
  {
    return $this->boq;
  }

  /**
   * @param ProjectBoq $boq
   *
   * @return static
   */
  public function setBoq($boq)
  {
    $this->boq = $boq;
    return $this;
  }

  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }

  /**
   * @param string $code
   *
   * @return static
   */
  public function setCode($code)
  {
    $this->code = $code;
    return $this;
  }

  /**
   * @return string
   */
  public function get_code()
  {
    return (!empty($this->_code))? $this->_code : $this->getId();
  }

  /**
   * @param string $_code
   *
   * @return static
   */
  public function set_code($_code)
  {
    $this->_code = $_code;
    return $this;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   *
   * @return static
   */
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }
}
