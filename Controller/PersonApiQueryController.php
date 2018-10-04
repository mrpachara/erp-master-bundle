<?php

namespace Erp\Bundle\MasterBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Person Api Query Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/person")
 */
class PersonApiQueryController extends PersonApiQuery {
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\PersonAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\PersonAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\PersonQuery
     */
    protected $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\PersonQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    protected function listResponse($data, $context)
    {
        $context = parent::listResponse($data, $context);
        if($this->grant('add-select', [])) {
            $context['actions'][] = 'add-select';
        }

        return $context;
    }
}
