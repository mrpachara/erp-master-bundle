<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\CostItemQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;

abstract class CostItemQuery extends ParentQuery implements QueryInterface
{
    public function searchOptions() {
        $result = parent::searchOptions();
        

        $result['term']['fields'] = array_values(array_diff($result['term']['fields'], ['id']));
        $result['term']['fields'][] = 'type';
        $result['term']['fields'][] = 'unit';
        $result['term']['fields'][] = 'description';
        $result['term']['fields'][] = 'remark';
        $result['term']['fields'][] = 'price';
        array_unshift($result['order']['fields'], 'id ASC');
        return $result;
    }
}
