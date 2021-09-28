<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\ErpApiQuery;

use FOS\RestBundle\Controller\Annotations as Rest;
use Psr\Http\Message\ServerRequestInterface;

/**
 * ProjectBoq Api QueryController
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/project/{projectId}/boq")
 */
class ProjectBoqApiQueryController extends ErpApiQuery
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\ProjectBoqAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\MasterBundle\Authorization\ProjectBoqAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\ProjectBoqQuery
     */
    public $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\MasterBundle\Domain\CQRS\ProjectBoqQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    /**
     * list action
     *
     * @Rest\Get("")
     *
     * @param string $projectId
     * @param ServerRequestInterface $request
     */
    public function listByProjectAction($projectId, ServerRequestInterface $request)
    {
        return $this->listQuery($request, [
            'list' => function ($queryParams, &$context) use ($projectId) {
                if (!empty($queryParams)) {
                    $queryParams['where:project'] = $projectId;
                    return $this->domainQuery->search($queryParams, $context);
                } else {
                    return $this->domainQuery->findByProject($projectId);
                }
            },
        ]);
    }

    /**
     * get action
     *
     * @Rest\Get("/{id}")
     *
     * @param string $projectId
     * @param string $id
     * @param ServerRequestInterface $request
     */
    public function getByProjectAction($projectId, $id, ServerRequestInterface $request)
    {
        return $this->getQuery($id, $request, [
            'get' => function ($id, $queryParams, &$context) use ($projectId) {
                return $this->domainQuery->findOneBy(['id' => $id, 'project' => $projectId]);
            },
        ]);
    }
}
