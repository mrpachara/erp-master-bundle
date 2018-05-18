<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Service;

class PersonIndividualQueryService extends PersonIndividualQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpMasterBundle:PersonIndividual');
    }
}
