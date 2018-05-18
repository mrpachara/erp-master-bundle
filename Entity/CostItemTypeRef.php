<?php

namespace Erp\Bundle\MasterBundle\Entity;

/**
 * Cost Item Type Ref Entity
 */
class CostItemTypeRef extends CostItemObjectValue
{
    /** @var string */
    protected $code;

    /** @var string */
    protected $name;

    /**
     * {@inheritDoc}
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Set code
     *
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
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return static
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
