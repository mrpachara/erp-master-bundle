<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiCommand;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Project Api CommandController
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/project")
 */
class ProjectApiCommandController extends CoreAccountApiCommand
{
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
}
