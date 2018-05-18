<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class CostItemTypeRefQueryService extends CostItemTypeRefQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:CostItemTypeRef');
    }
}
