<?php

namespace Erp\Bundle\MasterBundle\Entity;

use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * Cost Item Entity
 */
class CostItem extends CoreAccount {
  /**
   * type
   *
   * @var string
   */
  protected $type;

  /**
   * unit
   *
   * @var string
   */
  protected $unit;

  /**
   * price
   *
   * @var string
   */
  protected $price;

  /**
   * description
   *
   * @var string
   */
  protected $description;

  /**
   * constructor
   *
   * @param Thing|null $thing
   */
  public function __construct(Thing $thing = null) {
    parent::__construct($thing);
  }

  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * @param string $type
   *
   * @return static
   */
  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getUnit()
  {
    return $this->unit;
  }

  /**
   * @param string $unit
   *
   * @return static
   */
  public function setUnit($unit)
  {
    $this->unit = $unit;
    return $this;
  }

  /**
   * @return string
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * @param string $price
   *
   * @return static
   */
  public function setPrice($price)
  {
    $this->price = $price;
    return $this;
  }

  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param string $description
   *
   * @return static
   */
  public function setDescription($description)
  {
    $this->description = $description;
    return $this;
  }
}
