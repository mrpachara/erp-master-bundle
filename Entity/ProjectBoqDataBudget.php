<?php

namespace Erp\Bundle\MasterBundle\Entity;

/**
 * ProjectBoqDataBudget Entity
 */
class ProjectBoqDataBudget extends ProjectBoqObjectValue {

  /**
   * obqData
   *
   * @var ProjectBoqData
   */
  protected $boqData;

  /**
   * obqBudgetType
   *
   * @var ProjectBoqBudgetType
   */
  protected $boqBudgetType;

  /**
   * budget
   *
   * @var string
   */
  protected $budget;

  /**
   * cost
   *
   * @var array
   */
  public $cost;

  /**
   * constructor
   *
   * @var ProjectBoqData $boqData
   */
  public function __construct(ProjectBoqData $boqData = null) {
    parent::__construct();

    $this->boqData = $boqData;
  }

  /**
   * @param ProjectBoqData $boqData
   *
   * @return static
   */
  public function setBoqData(ProjectBoqData $boqData)
  {
    $this->boqData = $boqData;
    return $this;
  }

  /**
   * @return ProjectBoqData
   */
  public function getBoqData()
  {
    return $this->boqData;
  }

  /**
   * @param ProjectBoqBudgetType $boqBudgetType
   *
   * @return static
   */
  public function setBoqBudgetType(ProjectBoqBudgetType $boqBudgetType)
  {
    $this->boqBudgetType = $boqBudgetType;
    return $this;
  }

  /**
   * @return ProjectBoqBudgetType
   */
  public function getBoqBudgetType()
  {
    return $this->boqBudgetType;
  }

  /**
   * @param string $budget
   *
   * @return static
   */
  public function setBudget(string $budget)
  {
    $this->budget = $budget;
    return $this;
  }

  /**
   * @return string
   */
  public function getBudget()
  {
    return $this->budger;
  }
}
