<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CQRSQueryApi;
use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * PersonIndividual Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/person-individual")
 */
class PersonIndividualQueryApiController extends CQRSQueryApi {
  /**
   * @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer
   *
   * @DI\Inject("erp_master.cqrs.person_individual")
   */
  protected $cqrs;
}
