<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class ProjectBoqQueryService extends ProjectBoqQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:ProjectBoq');
    }
}
