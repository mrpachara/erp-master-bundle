<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\ErpApiQuery;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * CostItemTypeRef Query Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/cost-item-type-ref")
 */
class CostItemTypeRefApiQueryController extends ErpApiQuery
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
}
