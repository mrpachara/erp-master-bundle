<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class ProjectQueryService extends ProjectQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:Project');
    }
}
