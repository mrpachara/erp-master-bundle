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
    public function memberOfWorkersQueryBuilder(
        string $alias,
        $workers
    ) : QueryBuilder
    {
        $qb = $this->createQueryBuilder($alias);

        $expr = $qb->expr();
        $workersVar = "{$alias}_workers";
        $qb
            ->andWhere($expr->isMemberOf(":{$workersVar}", "{$alias}.workers"))
            ->setParameter($workersVar, $workers)
        ;

        return $qb;
    }
}
