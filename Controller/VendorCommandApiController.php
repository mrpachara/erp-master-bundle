<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiCommand;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Vendor Command Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/vendor")
 */
class VendorCommandApiController extends CoreAccountApiCommand
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\VendorAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\VendorAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\VendorQuery
     */
    public $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\VendorQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    // /**
    //  * @var \Erp\Bundle\MasterBundle\Domain\CQRS\VendorCommandHandler
    //  */
    // protected $commandHandler;
    //
    // /** @required */
    // public function setCommandHandler(\Erp\Bundle\MasterBundle\Domain\CQRS\VendorCommandHandler $commandHandler)
    // {
    //     $this->commandHandler = $commandHandler;
    // }

    protected function prepareItemAfterPatch($item)
    {
        // TODO: check JMS GraphNavigator to determine type from dtype
        if(empty($item->getOwner()->getId())) {
            // TODO: check PersionAuthorization.add()
            $this->commandHandler->persist($item->getOwner());
        }

        return $item;
    }
}
