<?php

namespace Erp\Bundle\MasterBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * PersonCorporate Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/person-corporate")
 */
class PersonCorporateApiCommandController extends PersonApiCommand
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\PersonCorporateAuthorization
     */
    protected $authorization = null;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\PersonCorporateAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\PersonCorporateQuery
     */
    protected $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\PersonCorporateQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }
}
