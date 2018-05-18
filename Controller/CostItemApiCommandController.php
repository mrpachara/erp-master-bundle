<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiCommand;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * CostItem Command Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/cost-item")
 */
class CostItemApiCommandController extends CoreAccountApiCommand
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\CostItemAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\CostItemAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\CostItemQuery
     */
    public $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\CostItemQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    // /**
    //  * @var \Erp\Bundle\MasterBundle\Domain\CQRS\CostItemCommandHandler
    //  */
    // protected $commandHandler;
    //
    // /** @required */
    // public function setCommandHandler(\Erp\Bundle\MasterBundle\Domain\CQRS\CostItemCommandHandler $commandHandler)
    // {
    //     $this->commandHandler = $commandHandler;
    // }
}
