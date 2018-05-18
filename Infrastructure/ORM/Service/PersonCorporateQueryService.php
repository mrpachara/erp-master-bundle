<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class PersonCorporateQueryService extends PersonCorporateQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:PersonCorporate');
    }
}
