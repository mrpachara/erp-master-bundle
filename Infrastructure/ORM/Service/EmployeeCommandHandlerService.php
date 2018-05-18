<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\EmployeeCommandHandler as CommandHandlerInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\SimpleCommandHandler as ParentCommandHandler;

class EmployeeCommandHandlerService extends ParentCommandHandler implements CommandHandlerInterface
{
}
