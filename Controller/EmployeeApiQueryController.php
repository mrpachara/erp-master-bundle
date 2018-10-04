<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiQuery;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Employee Query Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/employee")
 */
class EmployeeApiQueryController extends CoreAccountApiQuery {
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
}
