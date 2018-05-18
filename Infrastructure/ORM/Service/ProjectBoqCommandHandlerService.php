<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\ProjectBoqCommandHandler as CommandHandlerInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\SimpleCommandHandler as ParentCommandHandler;

class ProjectBoqCommandHandlerService extends ParentCommandHandler implements CommandHandlerInterface
{
}
