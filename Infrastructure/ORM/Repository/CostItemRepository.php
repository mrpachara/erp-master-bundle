<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Repository\CoreAccountRepository;
use Erp\Bundle\MasterBundle\Domain\CQRS\CostItemQuery as QueryInterface;
use Erp\Bundle\MasterBundle\Domain\CQRS\CostItemCommand as CommandInterface;

/**
 * Cost Item repository (ORM)
 */
class CostItemRepository extends CoreAccountRepository implements
  QueryInterface, CommandInterface{ }
