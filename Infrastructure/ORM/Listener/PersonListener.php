<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Erp\Bundle\MasterBundle\Entity\Person;

class PersonListener {
  public function preFlush(Person $entity, PreFlushEventArgs $event) {
    if(empty($entity->getId())){
      /**
       * @var \Erp\Bundle\CoreBundle\Entity\Generator
       */
      $generator = $event->getEntityManager()->getRepository("ErpCoreBundle:Generator")->generator('person');
      $entity->setCode($generator->nextValue());
    }
  }
}
