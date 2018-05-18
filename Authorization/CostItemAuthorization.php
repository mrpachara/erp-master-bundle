<?php

namespace Erp\Bundle\MasterBundle\Authorization;

use Erp\Bundle\CoreBundle\Authorization\AbstractCoreAccountAuthorization as Authorization;

class CostItemAuthorization extends Authorization
{
    public function list(...$args) {
        return parent::list(...$args) && $this->authorizationChecker->isGranted('ROLE_LIST_MASTER_COSTITEM');
    }

    public function get(...$args) {
        return parent::get(...$args) && $this->authorizationChecker->isGranted('ROLE_VIEW_MASTER_COSTITEM');
    }

    public function add(...$args) {
        return parent::add(...$args) && $this->authorizationChecker->isGranted('ROLE_CREATE_MASTER_COSTITEM');
    }

    public function edit(...$args) {
        return parent::edit(...$args) && $this->authorizationChecker->isGranted('ROLE_EDIT_MASTER_COSTITEM');
    }

    public function delete(...$args) {
        return parent::delete(...$args) && $this->authorizationChecker->isGranted('ROLE_DELETE_MASTER_COSTITEM');
    }
}
