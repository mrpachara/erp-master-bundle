<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiQuery;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * CostItem Query Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/cost-item")
 */
class CostItemApiQueryController extends CoreAccountApiQuery {
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

    protected function listResponse($data, $context)
    {
        $context = parent::listResponse($data, $context);
        $context['links'][] = 'type-ref';
        return $context;
    }
}
