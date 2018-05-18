<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiCommand;

/**
 * Person Api Command
 */
abstract class PersonApiCommand extends CoreAccountApiCommand
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\AbstractPersonAuthorization
     */
    protected $authorization;

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\PersonQuery
     */
    protected $domainQuery;

    // /**
    //  * @var \Erp\Bundle\MasterBundle\Domain\CQRS\PersonCommandHandler
    //  */
    // protected $commandHandler;
    //
    // /** @required */
    // public function setCommandHandler(\Erp\Bundle\MasterBundle\Domain\CQRS\PersonCommandHandler $commandHandler)
    // {
    //     $this->commandHandler = $commandHandler;
    // }
}
