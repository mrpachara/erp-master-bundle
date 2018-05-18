<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\VendorCommandHandler as CommandHandlerInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\SimpleCommandHandler as ParentCommandHandler;

class VendorCommandHandlerService extends ParentCommandHandler implements CommandHandlerInterface
{
}
