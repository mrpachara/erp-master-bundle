<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\PersonCorporateQuery as QueryInterface;

abstract class PersonCorporateQuery extends PersonQuery implements QueryInterface
{
}
