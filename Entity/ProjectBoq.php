<?php

namespace Erp\Bundle\MasterBundle\Entity;

use Erp\Bundle\CoreBundle\Collection\ArrayCollection;

use Erp\Bundle\CoreBundle\Entity\StatusPresentable;

/**
 * ProjectBoq Entity
 */
class ProjectBoq extends ProjectBoqData implements StatusPresentable {

  /**
   * project
   *
   * @var Project
   */
  protected $project;

  /**
   * budgetTypes
   *
   * @var ArrayCollection
   */
  protected $budgetTypes;

  /**
   * boqContract
   *
   * @var string
   */
  protected $boqContract;
  
  /** @var \DateTimeImmutable */
  protected $boqStartDate;
  
  /** @var \DateTimeImmutable */
  protected $boqFinishDate;
  
  /**
   * value
   *
   * @var array
   */
  public $value;
  
  /**
   * @return string
   */
  public function getBoqContract()
    {
        return $this->boqContract;
    }

public function setBoqContract(string $boqContract)
    {
        $this->boqContract = $boqContract;
        return $this;
    }
  
   /**
    * @return \DateTimeImmutable
    */
public function getBoqStartDate()
    {
        return $this->boqStartDate;
    }

public function setBoqStartDate(?\DateTimeImmutable $boqStartDate)
    {
        $this->boqStartDate = $boqStartDate;
    }
   /**
    * @return \DateTimeImmutable
    */
public function getBoqFinishDate()
    {
        return $this->boqFinishDate;
    }

public function setBoqFinishDate(?\DateTimeImmutable $boqFinishDate)
    {
        $this->boqFinishDate = $boqFinishDate;
    }

/**
   * constructor
   *
   * @var Project $project
   */
  public function __construct(Project $project = null) {
    parent::__construct();

    $this->project = $project;
    $this->budgetTypes = new ArrayCollection();
  }

  /**
   * @return Project
   */
  public function getProject()
  {
    return $this->project;
  }

  /**
   * @param Project $project
   *
   * @return static
   */
  public function setProject(Project $project)
  {
    $this->project = $project;
    return $this;
  }

  /**
   * @return ProjectBoqBudgetType[]
   */
  public function getBudgetTypes()
  {
    return $this->budgetTypes->toArray();
  }

  /**
   * @param ProjectBoqBudgetType $budgetType
   *
   * @return static
   */
  public function addBudgetType(ProjectBoqBudgetType $budgetType){
      if(!$this->budgetTypes->contains($budgetType))
        $this->budgetTypes[] = $budgetType;

      return $this;
  }

  /**
   * @param ProjectBoqBudgetType $budgetType
   */
  public function removeBudgetType(ProjectBoqBudgetType $budgetType){
      $this->budgetTypes->removeElement($budgetType);
  }

  /**
   * {@inheritDoc}
   */
  public function updatable() {
    return true;
  }

  /**
   * {@inheritDoc}
   */
  public function deletable() {
    return true;
  }
}
