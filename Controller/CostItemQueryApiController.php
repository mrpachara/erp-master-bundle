<?php

namespace Erp\Bundle\MasterBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;
use Psr\Http\Message\ServerRequestInterface;

use Erp\Bundle\MasterBundle\Entity\CostItem;
use Erp\Bundle\CoreBundle\Collection\RestResponse;

/**
 * CostItem Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/costitem")
 */
class CostItemQueryApiController {
  /**
   * @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer
   *
   * @DI\Inject("erp_master.cqrs.costitem")
   */
  protected $cqrs;

  /**
   * list action
   *
   * @Rest\Get("")
   *
   * @param ServerRequestInterface $request
   */
  public function listAction(ServerRequestInterface $request){
    $queryParams = $request->getQueryParams();
    $items = [];
    if(!empty($queryParams)){
      $items = $this->cqrs->query()->search($queryParams);
    } else{
      $items = $this->cqrs->query()->findAll();
    }

    return new RestResponse($items);
  }

  /**
   * get action
   *
   * @Rest\Get("/{id}")
   *
   * @param CostItem $item
   */
  public function getAction(CostItem $item){
    //$item = $this->cqrs->query()->find($id);

    return new RestResponse($item);
  }
}
