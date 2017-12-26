<?php

namespace Erp\Bundle\MasterBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CQRSCommandApi;
use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * PersonIndividual Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/person-individual")
 */
class PersonIndividualCommandApiController extends CQRSCommandApi {
  /**
   * @var \Erp\Bundle\CoreBundle\Serializer\Serializer
   *
   * @DI\Inject("jms_serializer")
   */
  protected $serializer;

  /**
   * @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer
   *
   * @DI\Inject("erp_master.cqrs.person_individual")
   */
  protected $cqrs;
}
