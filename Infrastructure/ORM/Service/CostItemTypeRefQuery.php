<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\CostItemTypeRefQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\ErpQuery as ParentQuery;

abstract class CostItemTypeRefQuery extends ParentQuery implements QueryInterface
{
    public function searchOptions() {
        $result = parent::searchOptions();
        
        
        //$result['search']['fields'] = array_values(array_diff($result['search']['fields'], ['id']));
        $result['search']['fields'][] = ['code'];
        $result['search']['fields'][] = ['name'];
        //array_unshift($result['search']['fields'], 'id ASC');
        return $result;
    }
}
