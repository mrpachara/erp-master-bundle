<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiQuery;

/**
 * Person Api Query
 */
abstract class PersonApiQuery extends CoreAccountApiQuery
{
    /**
     * @var \Erp\Bundle\MasterBundle\Authorization\AbstractPersonAuthorization
     */
    protected $authorization;

    /**
     * @var \Erp\Bundle\MasterBundle\Domain\CQRS\PersonQuery
     */
    protected $domainQuery;
}
