<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\CostItemCommandHandler as CommandHandlerInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\SimpleCommandHandler as ParentCommandHandler;

class CostItemCommandHandlerService extends ParentCommandHandler implements CommandHandlerInterface
{
}
