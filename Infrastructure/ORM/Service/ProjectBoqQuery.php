<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Erp\Bundle\MasterBundle\Domain\CQRS\ProjectBoqQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\ErpQuery as ParentQuery;

abstract class ProjectBoqQuery extends ParentQuery implements QueryInterface
{
    
    public function searchOptions()
    {
        $options = parent::searchOptions();
        if(!isset($options['where'])) $options['where'] = [
            'fields' => [],
        ];
        $options['where']['fields'][] = 'project';
        $options['term']['fields'][] = 'name';
        return $options;
    }
}
