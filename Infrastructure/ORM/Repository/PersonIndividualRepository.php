<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\MasterBundle\Domain\CQRS\PersonIndividualQuery as QueryInterface;
use Erp\Bundle\MasterBundle\Domain\CQRS\PersonIndividualCommand as CommandInterface;

/**
 * Person Individual repository (ORM)
 */
class PersonIndividualRepository extends PersonRepository
implements QueryInterface, CommandInterface { }
