<?php

namespace Erp\Bundle\MasterBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * PersonIndividual Api Command Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/person-individual")
 */
class PersonIndividualApiCommandController extends PersonApiCommand
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\PersonIndividualAuthorization
     */
    protected $authorization = null;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\PersonIndividualAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\PersonIndividualQuery
     */
    protected $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\PersonIndividualQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }
}
