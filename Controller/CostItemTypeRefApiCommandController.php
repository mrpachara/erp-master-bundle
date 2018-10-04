<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\ErpApiCommand;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * CostItem Command Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/cost-item-type-ref")
 */
class CostItemTypeRefApiCommandController extends ErpApiCommand
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\CostItemTypeRefAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\CostItemTypeRefAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\CostItemTypeRefQuery
     */
    public $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\CostItemTypeRefQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    // /**
    //  * @var \Erp\Bundle\MasterBundle\Domain\CQRS\CostItemTypeRefCommandHandler
    //  */
    // protected $commandHandler;
    //
    // /** @required */
    // public function setCommandHandler(\Erp\Bundle\MasterBundle\Domain\CQRS\CostItemTypeRefCommandHandler $commandHandler)
    // {
    //     $this->commandHandler = $commandHandler;
    // }
}
