<?php

namespace Erp\Bundle\MasterBundle\Authorization;

use Erp\Bundle\CoreBundle\Authorization\AbstractCoreAccountAuthorization as Authorization;

abstract class AbstractPersonAuthorization extends Authorization
{
    public function list(...$args) {
        return parent::list(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PERSON_LIST');
    }

    public function get(...$args) {
        return parent::get(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PERSON_VIEW');
    }

    public function add(...$args) {
        return parent::add(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PERSON_CREATE');
    }

    public function edit(...$args) {
        return parent::edit(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PERSON_EDIT');
    }

    public function delete(...$args) {
        return parent::delete(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PERSON_DELETE');
    }
}
