<?php

namespace Erp\Bundle\MasterBundle\Authorization;

class PersonAuthorization extends AbstractPersonAuthorization
{
    use \Erp\Bundle\CoreBundle\Authorization\ErpReadonlyAuthorizationTrait;

    public function addSelect(...$args)
    {
        return parent::add(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PERSON_CREATE');
       // return true;
    }
}
