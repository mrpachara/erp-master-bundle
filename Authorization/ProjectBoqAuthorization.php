<?php

namespace Erp\Bundle\MasterBundle\Authorization;

use Erp\Bundle\CoreBundle\Authorization\AbstractErpAuthorization as Authorization;

class ProjectBoqAuthorization extends Authorization
{
    public function list(...$args)
    {
        return parent::list(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PROJECT_BUDGET_LIST');
    }

    public function get(...$args)
    {
        return parent::get(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PROJECT_BUDGET_VIEW');
    }

    public function add(...$args)
    {
        return parent::add(...$args) &&
            $this->authorizationChecker->isGranted('ROLE_MASTER_PROJECT_BUDGET_CREATE') &&
            $this->viewValue();
    }

    public function edit(...$args)
    {
        return parent::edit(...$args) &&
            $this->authorizationChecker->isGranted('ROLE_MASTER_PROJECT_BUDGET_EDIT') &&
            $this->viewValue();
    }

    public function delete(...$args)
    {
        return parent::delete(...$args) && $this->authorizationChecker->isGranted('ROLE_MASTER_PROJECT_BUDGET_DELETE');
    }

    public function print(...$args)
    {
        return $this->get(...$args);
    }

    public function viewValue(): bool
    {
        return $this->authorizationChecker->isGranted('ROLE_MASTER_PROJECT_BUDGET_VALUE_VIEW');
    }
}
