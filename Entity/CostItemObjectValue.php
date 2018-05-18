<?php

namespace Erp\Bundle\MasterBundle\Entity;

/**
 * Cost Item Type ObjectValue Entity
 */
class CostItemObjectValue
{
    /** @var string */
    protected $id;

    /**
     * constructor
     */
    public function __construct() { }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
