<?php

namespace Erp\Bundle\MasterBundle\Entity;

use Erp\Bundle\CoreBundle\Collection\ArrayCollection;
use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Entity\Thing;
use Erp\Bundle\ObjectValueBundle\Entity\Address;
use Erp\Bundle\ObjectValueBundle\Entity\Contact;
use Erp\Bundle\ObjectValueBundle\Entity\BankAccount;

/**
 * Project Entity
 */
class Project extends CoreAccount
{
    /**
     * person
     *
     * @var Person
     */
    protected $owner;

    /**
     * address
     *
     * @var Address
     */
    protected $addressProject;

    /**
     * address
     *
     * @var Address
     */
    protected $address;

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
     * contacts
     *
     * @var ArrayCollection
     */
    protected $contacts;

    /**
     * bank accounts
     *
     * @var ArrayCollection
     */
    protected $bankAccounts;

    /**
     * workers
     *
     * @var ArrayCollection
     */
    protected $workers;

    /** @var \DateTimeImmutable */
    protected $startDate;

    /** @var \DateTimeImmutable */
    protected $finishDate;

    /**
     * constructor
     *
     * @param Thing|null $thing
     */
    public function __construct(Thing $thing = null)
    {
        parent::__construct($thing);

        $this->contacts = new ArrayCollection();
        $this->bankAccounts = new ArrayCollection();
        $this->workers = new ArrayCollection();
    }

    /**
     * @return Person
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param Person $owner
     *
     * @return static
     */
    public function setOwner(Person $owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddressProject()
    {
        return $this->addressProject;
    }

    /**
     * @param Address $addressProject
     *
     * @return static
     */
    public function setAddressProject(?Address $addressProject)
    {
        $this->addressProject = $addressProject;
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
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
        }

        return $this;
    }

    /**
     * @param Contact $contact
     */
    public function removeContact(Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * Get bank accounts
     *
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
    public function addBankAccount(BankAccount $bankAccount)
    {
        if (!$this->bankAccounts->contains($bankAccount)) {
            $this->bankAccounts[] = $bankAccount;
        }

        return $this;
    }

    /**
     * Remove bank account
     *
     * @param BankAccount $bankAccount
     */
    public function removeBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccounts->removeElement($bankAccount);
    }

    /**
     * Get workers
     *
     * @return Employee[]
     */
    public function getWorkers()
    {
        return $this->workers->toArray();
    }

    /**
     * Add worker
     *
     * @param Employee $worker
     *
     * @return static
     */
    public function addWorker(Employee $worker)
    {
        if (!$this->workers->contains($worker)) {
            $this->workers[] = $worker;
        }

        return $this;
    }

    /**
     * Remove worker
     *
     * @param Employee $worker
     */
    public function removeWorker(Employee $worker)
    {
        $this->workers->removeElement($worker);
    }

    /**
     * @param \DateTimeImmutable $startDate
     *
     * @return static
     */
    public function setStartDate(?\DateTimeImmutable $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeImmutable $startDate
     *
     * @return static
     */
    public function setFinishDate(?\DateTimeImmutable $finishDate)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }
}
