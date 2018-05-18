<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\PersonIndividualQuery as QueryInterface;

abstract class PersonIndividualQuery extends PersonQuery implements QueryInterface
{
}
