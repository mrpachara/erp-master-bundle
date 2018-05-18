<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class VendorQueryService extends VendorQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:Vendor');
    }
}
