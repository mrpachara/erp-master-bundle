<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CQRSQueryApi;
use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * PersonCorporate Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/person-corporate")
 */
class PersonCorporateQueryApiController extends CQRSQueryApi {
  /**
   * @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer
   *
   * @DI\Inject("erp_master.cqrs.person_corporate")
   */
  protected $cqrs;
}
