<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\ErpApiQuery;
use Erp\Bundle\MasterBundle\Entity\ProjectBoq;
use Erp\Bundle\MasterBundle\Entity\ProjectBoqData;
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
     * Empty all budgets.
     *
     * @param ProjectBoqData[] $boqs
     */
    private function emptyBudget($boqs): void
    {
        $passed = [];
        $queue = [...$boqs];
        while ($boq = \array_shift($queue)) {
            $boq->emptyBudget();
            \array_push($passed, $boq);
            foreach ($boq->getChildren() as $child) {
                if (!\in_array($child, $passed, true)) {
                    \array_push($queue, $child);
                }
            }
        }
    }

    /** {@inheritDoc} */
    protected function extendGetContext(array $context): array
    {
        $context['actions'][] = 'print';
        return $context;
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
                // if (!empty($queryParams)) {
                //     $queryParams['where:project'] = $projectId;
                //     return $this->domainQuery->search($queryParams, $context);
                // } else {
                //     return $this->domainQuery->findByProject($projectId);
                // }
                $context['searchable'] = false;

                /** @var ProjectBoq[] $boqs */
                $boqs = $this->domainQuery->findByProject($projectId);

                if (!$this->authorization->viewValue()) {
                    $this->emptyBudget($boqs);
                }

                return $boqs;
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
                $boq = $this->domainQuery->findOneBy(['id' => $id, 'project' => $projectId]);

                if (!$this->authorization->viewValue()) {
                    $this->emptyBudget([$boq]);
                }

                return $boq;
            },
        ]);
    }
}
