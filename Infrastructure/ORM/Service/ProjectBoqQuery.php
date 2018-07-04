<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\ProjectBoqQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\ErpQuery as ParentQuery;

abstract class ProjectBoqQuery extends ParentQuery implements QueryInterface
{
    public function searchOptions()
    {
        $result = parent::searchOptions();

        $result['search']['fields'][] = ['name'];

        $result['where']['fields'][] = ['project'];

        return $result;
    }
}