<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\ProjectQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;

abstract class ProjectQuery extends ParentQuery implements QueryInterface
{
}
