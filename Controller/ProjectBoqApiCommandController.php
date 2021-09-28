<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\ErpApiCommand;

use FOS\RestBundle\Controller\Annotations as Rest;

use Symfony\Component\HttpFoundation\Request;
use Erp\Bundle\CoreBundle\Domain\Adapter\LockMode;
use Erp\Bundle\MasterBundle\Entity\ProjectBoq;

/**
 * ProjectBoq Api CommandController
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/project/{projectId}/boq")
 */
class ProjectBoqApiCommandController extends ErpApiCommand {
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

    // /**
    //  * @var \Erp\Bundle\MasterBundle\Domain\CQRS\ProjectCommandHandler
    //  */
    // protected $commandHandler;
    //
    // /** @required */
    // public function setCommandHandler(\Erp\Bundle\MasterBundle\Domain\CQRS\ProjectCommandHandler $commandHandler)
    // {
    //     $this->commandHandler = $commandHandler;
    // }

    /**
     * create action
     *
     * @Rest\Put("")
     *
     * @param string $projectId
     * @param Request $request
     */
    public function createWithProjectAction($projectId, Request $request)
    {
        return $this->createCommand($request, [
            'add' => function($class, &$data) use ($projectId) {
                $item = new $class();

                $data['project'] = ['id' => $projectId, 'dtype' => 'project'];

                return $item;
            },
        ]);
    }

    /**
     * update action
     *
     * @Rest\Put("/{id}")
     *
     * @param string $projectId
     * @param string $id
     * @param Request $request
     */
    public function updateWithProjectAction($projectId, $id, Request $request)
    {
        return $this->updateCommand($id, $request, [
            'edit' => function($id, &$data) use ($projectId) {
                $item = $this->domainQuery->findOneBy([ 'id' => $id, 'project' => $projectId ]);

                $data['project'] = ['id' => $projectId, 'dtype' => 'project'];

                return $item;
            },
        ]);
    }

    /**
     * delete action
     *
     * @Rest\Delete("/{id}")
     *
     * @param string $projectId
     * @param string $id
     * @param Request $request
     */
    public function deleteWithProjectAction($projectId, $id, Request $request){
        return $this->deleteCommand($id, $request, [
            'delete' => function($id) use ($projectId) {
                return $this->domainQuery->findOneBy([ 'id' => $id, 'project' => $projectId ]);
            },
        ]);
    }
}
