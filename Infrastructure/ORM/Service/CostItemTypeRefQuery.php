<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\CostItemTypeRefQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\ErpQuery as ParentQuery;

abstract class CostItemTypeRefQuery extends ParentQuery implements QueryInterface
{
    
    public function searchOptions()
    {
        $options = parent::searchOptions();
        
        $options['term']['fields'][] = 'code';
        $options['term']['fields'][] = 'name';

        return $options;
    }
}
