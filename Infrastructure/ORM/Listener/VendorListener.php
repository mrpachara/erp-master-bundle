<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Erp\Bundle\MasterBundle\Entity\Vendor;

use Erp\Bundle\CoreBundle\Domain\CQRS\GeneratorQuery;

class VendorListener {

  public function preFlush(Vendor $entity, PreFlushEventArgs $event) {
    $entity->setThing($entity->getOwner()->getThing());

    if(empty($entity->getId())){
      /**
       * @var \Erp\Bundle\CoreBundle\Entity\Generator
       */
      $generator = $event->getEntityManager()->getRepository("ErpCoreBundle:Generator")->generator('vendor');
      $entity->setCode($generator->nextValue());
    }
  }
}
