<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiQuery;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Project Api Query Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/project")
 */
class ProjectApiQueryController extends CoreAccountApiQuery {
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\ProjectAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\ProjectAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\ProjectQuery
     */
    public $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\ProjectQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    protected function getResponse($data, $context)
    {
        $context = parent::getResponse($data, $context);
        $context['links'][] = 'boq';
        return $context;
    }
}
