<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class EmployeeQueryService extends EmployeeQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:Employee');
    }
}
