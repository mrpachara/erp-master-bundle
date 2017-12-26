<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\MasterBundle\Domain\CQRS\PersonCorporateQuery as QueryInterface;
use Erp\Bundle\MasterBundle\Domain\CQRS\PersonCorporateCommand as CommandInterface;

/**
 * Person Corporate repository (ORM)
 */
class PersonCorporateRepository extends PersonRepository
implements QueryInterface, CommandInterface { }
