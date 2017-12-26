<?php

namespace Erp\Bundle\MasterBundle\Entity;

use Erp\Bundle\CoreBundle\Collection\ArrayCollection;
use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Entity\Thing;
use Erp\Bundle\ObjectValueBundle\Entity\Address;
use Erp\Bundle\ObjectValueBundle\Entity\Contact;
use Erp\Bundle\ObjectValueBundle\Entity\PersonData;
use Erp\Bundle\ObjectValueBundle\Entity\BankAccount;

/**
 * Person Entity
 */
abstract class Person extends CoreAccount {
  /**
   * person data
   *
   * @var PersonData
   */
  protected $personData;

  /**
   * address
   *
   * @var Address
   */
  protected $address;

  /**
   * contact
   *
   * @var Contact
   */
  protected $contact;

  /**
   * bank accounts
   *
   * @var ArrayCollection
   */
  protected $bankAccounts;

  /**
   * phone
   *
   * @var string
   */
  protected $phone;

  /**
   * fax
   *
   * @var string
   */
  protected $fax;

  /**
   * constructor
   *
   * @param Thing|null $thing
   */
  public function __construct(Thing $thing = null) {
    parent::__construct($thing);

    $this->address = new Address();
    $this->contact = new Contact();
    $this->bankAccounts = new ArrayCollection();
  }

  /**
   * @return PersonData
   */
  public function getPersonData()
  {
    return $this->personData;
  }

  /**
   * @param PersonData $personData
   *
   * @return static
   */
  public function setPersonData(PersonData $personData)
  {
    $this->personData = $personData;
    return $this;
  }

  /**
   * @return Address
   */
  public function getAddress()
  {
    return $this->address;
  }

  /**
   * @param Address $address
   *
   * @return static
   */
  public function setAddress(Address $address)
  {
    $this->address = $address;
    return $this;
  }

  /**
   * @return Contact
   */
  public function getContact()
  {
    return $this->contact;
  }

  /**
   * @param Contact $contact
   *
   * @return static
   */
  public function setContact(Contact $contact)
  {
    $this->contact = $contact;
    return $this;
  }

  /**
   * @return BankAccount[]
   */
  public function getBankAccounts()
  {
    return $this->bankAccounts->toArray();
  }

  /**
   * Add bank account
   *
   * @param BankAccount $bankAccount
   *
   * @return static
   */
  public function addBankAccount(BankAccount $bankAccount){
      if(!$this->bankAccounts->contains($bankAccount))
        $this->bankAccounts[] = $bankAccount;

      return $this;
  }

  /**
   * Remove bank account
   *
   * @param BankAccount $bankAccount
   */
  public function removeBankAccount(BankAccount $bankAccount){
      $this->bankAccounts->removeElement($bankAccount);
  }

  /**
   * @return string
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param string $phone
   *
   * @return static
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
    return $this;
  }

  /**
   * @return string
   */
  public function getFax()
  {
    return $this->fax;
  }

  /**
   * @param string $fax
   *
   * @return static
   */
  public function setFax($fax)
  {
    $this->fax = $fax;
    return $this;
  }
}
