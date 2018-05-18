<?php

namespace Erp\Bundle\MasterBundle\Entity;

use Erp\Bundle\CoreBundle\Collection\ArrayCollection;
use Erp\Bundle\CoreBundle\Entity\Thing;
use Erp\Bundle\ObjectValueBundle\Entity\Contact;
use Erp\Bundle\ObjectValueBundle\Entity\Corporate;

/**
 * Person Individual Entity
 */
class PersonCorporate extends Person {
  /**
   * person data
   *
   * @var Corporate
   */
  protected $personData;

  /**
   * contacts
   *
   * @var ArrayCollection
   */
  protected $contacts;

  /**
   * constructor
   *
   * @param Thing|null $thing
   */
  public function __construct(Thing $thing = null) {
    parent::__construct($thing);

    //$this->personData = new Corporate();
    $this->contacts = new ArrayCollection();
  }

  /**
   * @return Contact[]
   */
  public function getContacts()
  {
    return $this->contacts->toArray();
  }

  /**
   * @param Contact $contact
   *
   * @return static
   */
  public function addContact(Contact $contact)
  {
    if(!$this->contacts->contains($contact))
      $this->contacts[] = $contact;

    return $this;
  }

  /**
   * @param Contact $contact
   */
  public function removeContact(Contact $contact)
  {
    $this->contacts->removeElement($contact);
  }
}
