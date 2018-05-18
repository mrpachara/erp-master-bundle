<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Erp\Bundle\MasterBundle\Entity\Project;

class ProjectListener {
  public function preFlush(Project $entity, PreFlushEventArgs $event) {
    if(empty($entity->getId())){
      /**
       * @var \Erp\Bundle\CoreBundle\Entity\Generator
       */
      $generator = $event->getEntityManager()->getRepository("ErpCoreBundle:Generator")->generator('project');
      $entity->setCode($generator->nextValue());
    }
  }
}
