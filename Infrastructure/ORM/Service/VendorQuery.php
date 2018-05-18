<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\VendorQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;

abstract class VendorQuery extends ParentQuery implements QueryInterface
{
}
