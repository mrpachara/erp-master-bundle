<?php

namespace Erp\Bundle\MasterBundle\Entity;

use Erp\Bundle\CoreBundle\Collection\ArrayCollection;

/**
 * ProjectBoqData Entity
 */
class ProjectBoqData extends ProjectBoqObjectValue
{

    /**
     * name
     *
     * @var string
     */
    protected $name;

    /**
     * parent
     *
     * @var ProjectBoqData
     */
    protected $parent;

    /**
     * children
     *
     * @var ArrayCollection
     */
    protected $children;

    /**
     * budgets
     *
     * @var ArrayCollection
     */
    protected $budgets;

    /** @var int */
    protected $position;

    /**
     * constructor
     *
     * @var ProjectBoqData $parent
     */
    public function __construct(ProjectBoqData $parent = null)
    {
        parent::__construct();

        $this->parent = $parent;
        $this->children = new ArrayCollection();
        $this->budgets = new ArrayCollection();
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

    public function getFullNames()
    {
        $names = [];

        for ($boqData = $this; $boqData && !($boqData instanceof ProjectBoq); $boqData = $boqData->getParent()) {
            array_unshift($names, $boqData->getName());
        }

        return $names;
    }

    /**
     * @return ProjectBoqData
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param ProjectBoqData $parent
     *
     * @return static
     */
    public function setParent(ProjectBoqData $parent)
    {
        $this->parent = $parent;
        return $this;
    }


    private function prepareChildren()
    {
        if (null === $this->children) $this->children = new ArrayCollection();
    }

    private function getChildrenArrayCollection()
    {
        $this->prepareChildren();
        return $this->children;
    }

    /**
     * @return ProjectBoqData[]
     */
    public function getChildren()
    {
        return $this->getChildrenArrayCollection()->toArray();
    }

    /**
     * @param ProjectBoqData $projectBoq
     *
     * @return static
     */
    public function addChild(ProjectBoqData $projectBoqData)
    {
        if (!$this->getChildrenArrayCollection()->contains($projectBoqData)) {
            $this->children[] = $projectBoqData;
        }

        return $this;
    }

    /**
     * @param ProjectBoqData $projectBoqData
     */
    public function removeChild(ProjectBoqData $projectBoqData)
    {
        $this->getChildrenArrayCollection()->removeElement($projectBoqData);
    }

    public function setChildrenByArrayCollection($children)
    {
        foreach ($this->getChildrenArrayCollection() as $child) {
            if (!$children->contains($child)) $this->removeChild($child);
        }

        foreach ($children as $child) {
            $this->addChild($child);
        }
    }
    /**
     * @return ProjectBoqDataBudget[]
     */
    public function getBudgets()
    {
        return $this->budgets->toArray();
    }

    /**
     * @param ProjectBoqDataBudget $budget
     *
     * @return static
     */
    public function addBudget(ProjectBoqDataBudget $budget)
    {
        if (!$this->budgets->contains($budget)) {
            $this->budgets[$budget->getBoqBudgetType()->getId()] = $budget;
        }

        return $this;
    }

    /**
     * @param ProjectBoqDataBudget $budget
     */
    public function removeBudget(ProjectBoqDataBudget $budget)
    {
        $this->budgets->removeElement($budget);
    }

    public function emptyBudget()
    {
        /** @var ProjectBoqDataBudget $budget */
        foreach ($this->budgets as $budget) {
            $budget->setBudget('');
        }
    }

    /**
     * @param int $position
     *
     * @return static
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    // public function getTotalBudget()
    // {
    //     $totalBudget = 0;
    //     foreach ($this->getBudgets() as $budget) {
    //         $totalBudget += $budget->getBudget();
    //     }
    //
    //     return number_format($totalBudget, 2, '.', '');
    // }
}
