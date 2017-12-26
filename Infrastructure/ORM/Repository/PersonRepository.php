<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Repository\CoreAccountRepository;
use Erp\Bundle\MasterBundle\Domain\CQRS\PersonQuery as QueryInterface;

/**
 * Person repository (ORM)
 */
class PersonRepository extends CoreAccountRepository
implements QueryInterface { }
