<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Erp\Bundle\MasterBundle\Entity\Employee;

use Erp\Bundle\CoreBundle\Domain\CQRS\GeneratorQuery;

class EmployeeListener {

  public function preFlush(Employee $entity, PreFlushEventArgs $event) {
    $entity->setThing($entity->getIndividual()->getThing());

    if(empty($entity->getId())){
      /**
       * @var \Erp\Bundle\CoreBundle\Entity\Generator
       */
      $generator = $event->getEntityManager()->getRepository("ErpCoreBundle:Generator")->generator('employee');
      $entity->setCode($generator->nextValue());
    }
  }
}
