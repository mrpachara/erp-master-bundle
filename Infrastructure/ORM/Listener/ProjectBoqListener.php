<?php

namespace Erp\Bundle\MasterBundle\Infrastructure\ORM\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\EntityManagerInterface;
use Erp\Bundle\MasterBundle\Entity\Project;
use Erp\Bundle\MasterBundle\Entity\ProjectBoqData;
use Erp\Bundle\MasterBundle\Entity\ProjectBoq;

class ProjectBoqListener {
  protected function assignBudgetType(ProjectBoqData $entity, array $budgetTypes, EntityManagerInterface $em) {
    foreach($entity->getBudgets() as $key => $budget) {
      if(array_key_exists($key, $budgetTypes)) {
        $budget->setBoqBudgetType($budgetTypes[$key]);
        $budget->setBoqData($entity);
      } else {
        $entity->removeBudget($budget);
        if(!empty($budget->getBoqBudgetType())) $em->remove($budget->getBoqBudgetType());
      }
    }
  }

  protected function assignDeep(ProjectBoqData $entity, array $budgetTypes, EntityManagerInterface $em) {
    foreach($entity->getChildren() as $position => $child) {
      if(!empty($child->getId()) && ($entity !== $child->getParent()))
        throw new \Exception("Invalid parent child relation!!!");

      $child->setParent($entity);
      $child->setPosition($position);
    }

    $this->assignBudgetType($entity, $budgetTypes, $em);

    foreach($entity->getChildren() as $child) {
      $this->assignDeep($child, $budgetTypes, $em);
    }
  }

  public function preFlush(ProjectBoq $entity, PreFlushEventArgs $event) {
    $budgetTypes = [];
    foreach($entity->getBudgetTypes() as $budgetType) {
      if(!empty($budgetType->getId()) && ($entity !== $budgetType->getBoq()))
        throw new \Exception("Invalid budgetType relation!!!");

      $budgetType->setBoq($entity);
      $budgetTypes[$budgetType->get_code()] = $budgetType;
    }

    $this->assignDeep($entity, $budgetTypes, $event->getEntityManager());
  }
}
