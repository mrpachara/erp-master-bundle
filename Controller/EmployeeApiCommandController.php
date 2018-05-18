<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiCommand;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Employee Command Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/employee")
 */
class EmployeeApiCommandController extends CoreAccountApiCommand
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\EmployeeAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\EmployeeAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\EmployeeQuery
     */
    public $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\EmployeeQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    // /**
    //  * @var \Erp\Bundle\MasterBundle\Domain\CQRS\EmployeeCommandHandler
    //  */
    // protected $commandHandler;
    //
    // /** @required */
    // public function setCommandHandler(\Erp\Bundle\MasterBundle\Domain\CQRS\EmployeeCommandHandler $commandHandler)
    // {
    //     $this->commandHandler = $commandHandler;
    // }

    protected function prepareItemAfterPatch($item)
    {
        if(empty($item->getIndividual()->getId())) {
            // TODO: check PersionIndividualAuthorization.add()
            $this->commandHandler->persist($item->getIndividual());
        }

        return $item;
    }
}
