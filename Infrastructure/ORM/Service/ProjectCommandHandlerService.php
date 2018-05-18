<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\ProjectCommandHandler as CommandHandlerInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\SimpleCommandHandler as ParentCommandHandler;

class ProjectCommandHandlerService extends ParentCommandHandler implements CommandHandlerInterface
{
}
