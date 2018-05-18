<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class CostItemQueryService extends CostItemQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:CostItem');
    }
}
