<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiQuery;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Vendor Query Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/vendor")
 */
class VendorQueryApiController extends CoreAccountApiQuery {
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
}
