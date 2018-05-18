<?php

namespace Erp\Bundle\MasterBundle\Collection;

use Erp\Bundle\CoreBundle\Entity\StatusPresentable;
use Erp\Bundle\CoreBundle\Collection\RestResponse;

/**
 * ProjectBoq Rest HTTP Response
 */
class ProjectBoqRestResponse extends RestResponse{
  /**
   * Constructor
   *
   * @param mixed $data
   */
  public function __construct($data, $meta = null){
    $meta = (array)$meta;

    $this->actions = [];
    $this->links = [];

    if($data instanceof StatusPresentable) {
      if($data->updatable()) $this->actions[] = 'edit';
      if($data->deletable()) $this->actions[] = 'delete';
    } else if(is_array($data)) {
      $this->actions[] = 'add';
      $this->searchable = false;
    }

    if(array_key_exists('pagination', $meta)) $this->pagination = $meta['pagination'];
    if(array_key_exists('searchTerm', $meta)) $this->searchTerm = $meta['searchTerm'];

    $this->data = $data;
  }
}
