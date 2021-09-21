<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

use Doctrine\ORM\QueryBuilder;
use Erp\Bundle\MasterBundle\Domain\CQRS\ProjectQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;
use Erp\Bundle\MasterBundle\Entity\Employee;

abstract class ProjectQuery extends ParentQuery implements QueryInterface
{
    /**
     * Assign where exists some for the given workers.
     *
     * @param Employee[] $workers
     */
    public function someWorkersQueryBuilder(
        string $alias,
        $workers
    ) : QueryBuilder
    {
        $qb = $this->createQueryBuilder($alias);
        $orX = $qb->expr()->orX();
        foreach($workers as $i => $worker) {
            $orX->add(
                $qb->expr()->isMemberOf(":{$alias}_worker_{$i}", "{$alias}.workers")
            );
            $qb->setParameter("{$alias}_worker_{$i}", $worker);
        }

        $qb->andWhere($orX);

        return $qb;
    }
}
