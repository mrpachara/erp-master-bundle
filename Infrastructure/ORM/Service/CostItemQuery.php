<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\CostItemQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;

abstract class CostItemQuery extends ParentQuery implements QueryInterface
{
}
