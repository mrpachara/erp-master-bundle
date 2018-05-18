<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\EmployeeQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;

abstract class EmployeeQuery extends ParentQuery implements QueryInterface
{
    public function searchOptions() {
        $result = parent::searchOptions();

        $result['search']['fields'][] = 'individual.contact.alias';

        return $result;
    }
}
