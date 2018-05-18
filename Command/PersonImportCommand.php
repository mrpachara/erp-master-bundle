<?php

namespace Erp\Bundle\MasterBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
//use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class PersonImportCommand extends ContainerAwareCommand{
  protected function configure(){
    $this
      ->setName('ErpMaster:Person:import')
      ->setDescription('Import Person from file')
      ->setHelp('This command allows you to import Person data from the given file')
    ;

    $this
      ->addArgument('filename', InputArgument::REQUIRED, 'File name to import.')
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $filename = $input->getArgument('filename');
    /** @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer */
    $cqrs_individual = $this->getContainer()->get('erp_master.cqrs.person_individual');

    /** @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer */
    $cqrs_corporate = $this->getContainer()->get('erp_master.cqrs.person_corporate');

    $fp = fopen($filename, "r");

    try{
      if(!$fp) throw new \Exception("Cannot open file '{$filename}'");

      $cqrs_individual->command()->transactional(function() use ($cqrs_individual, $cqrs_corporate, $fp, $output) {
        $k = 1;
        while(($csv = fgetcsv($fp)) !== false) {
          if(count($csv) !== 41) throw new \Exception("Invalid file format on line: {$k}\n".'"'. implode('","', $csv) .'"');
          //$output->writeln("Import line: {$k}\n".'"'. implode('","', $csv) .'"');

          if($csv[0] === 'INDIVIDUAL') {
            /** @var \Erp\Bundle\MasterBundle\Entity\PersonIndividual */
            $item = $cqrs_individual->command()->create();

            //$item->setCode('PS'.time().rand());

            $item->setPersonData(new \Erp\Bundle\ObjectValueBundle\Entity\Citizen());
            $item->getPersonData()
              ->setCode($csv[1])
              ->setName($csv[2].$csv[3].' '.$csv[4])
              ->setInitname($csv[2])
              ->setFirstname($csv[3])
              ->setLastname($csv[4])
              ->setBirthDate(new \DateTimeImmutable($csv[5]))
              ->setReligious($csv[6])
            ;

            $item->getPersonData()->setAddress(new \Erp\Bundle\ObjectValueBundle\Entity\Address());
            $item->getPersonData()->getAddress()
              ->setAddress($csv[7])
              ->setSubdistrict($csv[8])
              ->setDistrict($csv[9])
              ->setProvince($csv[10])
              ->setPostalcode($csv[11])
            ;

            $item->getPersonData()
              ->setIssueDate(new \DateTimeImmutable($csv[12]))
              ->setExpiredDate(new \DateTimeImmutable($csv[13]))
            ;

            $item->setName($item->getPersonData()->getName());

            $item->setAddress(new \Erp\Bundle\ObjectValueBundle\Entity\Address());
            $item->getAddress()
              ->setAddress($csv[14])
              ->setSubdistrict($csv[15])
              ->setDistrict($csv[16])
              ->setProvince($csv[17])
              ->setPostalcode($csv[18])
            ;

            $item->setPhone($csv[19]);
            $item->setFax($csv[20]);

            $item->setContact(new \Erp\Bundle\ObjectValueBundle\Entity\Contact());

            $item->getContact()
              ->setAlias($csv[21])
              ->setPosition($csv[22])
              ->setEmail($csv[23])
              ->setLineId($csv[24])
            ;
            if(!empty($csv[25])){
              $phone = new \Erp\Bundle\ObjectValueBundle\Entity\ContactPhone();
              $phone->setPhone($csv[25]);
              $phone->setDefault(true);
              $item->getContact()->addPhone($phone);
            }
            if(!empty($csv[26])){
              $phone = new \Erp\Bundle\ObjectValueBundle\Entity\ContactPhone();
              $phone->setPhone($csv[26]);
              $phone->setDefault(false);
              $item->getContact()->addPhone($phone);
            }

            if(!empty($csv[27])) {
              $bankAccount = new \Erp\Bundle\ObjectValueBundle\Entity\BankAccount();
              $bankAccount
                ->setCode($csv[27])
                ->setName($csv[28])
                ->setCategory($csv[29])
                ->setBank($csv[30])
                ->setBranch($csv[31])
              ;
              $item->addBankAccount($bankAccount);
            }
            if(!empty($csv[32])) {
              $bankAccount = new \Erp\Bundle\ObjectValueBundle\Entity\BankAccount();
              $bankAccount
                ->setCode($csv[32])
                ->setName($csv[33])
                ->setCategory($csv[34])
                ->setBank($csv[35])
                ->setBranch($csv[36])
              ;
              $item->addBankAccount($bankAccount);
            }
          } else if($csv[0] === 'CORPORATE') {
            /** @var \Erp\Bundle\MasterBundle\Entity\PersonCorporate */
            $item = $cqrs_corporate->command()->create();

            //$item->setCode('PS'.time().rand());

            $item->setPersonData(new \Erp\Bundle\ObjectValueBundle\Entity\Corporate());
            $item->getPersonData()
              ->setCode($csv[1])
              ->setName($csv[2].$csv[3])
              ->setCategory($csv[2])
              ->setCorporateName($csv[3])
              ->setRegistrationDate((empty($csv[4]))? null : new \DateTimeImmutable($csv[4]))
              ->setMain($csv[5] == "1")
              ->setBranch((empty($csv[6]))? null : $csv[6])
            ;

            $item->getPersonData()->setAddress(new \Erp\Bundle\ObjectValueBundle\Entity\Address());
            $item->getPersonData()->getAddress()
              ->setAddress($csv[7])
              ->setSubdistrict($csv[8])
              ->setDistrict($csv[9])
              ->setProvince($csv[10])
              ->setPostalcode($csv[11])
            ;

            $item->setName($item->getPersonData()->getName());

            $item->setAddress(new \Erp\Bundle\ObjectValueBundle\Entity\Address());
            $item->getAddress()
              ->setAddress($csv[12])
              ->setSubdistrict($csv[13])
              ->setDistrict($csv[14])
              ->setProvince($csv[15])
              ->setPostalcode($csv[16])
            ;

            $item->setPhone($csv[17]);
            $item->setFax($csv[18]);

            if(!empty($csv[19])) {
              $contact = new \Erp\Bundle\ObjectValueBundle\Entity\Contact();
              $contact
                ->setAlias($csv[19])
                ->setPosition($csv[20])
                ->setEmail($csv[21])
                ->setLineId($csv[22])
              ;

              if(!empty($csv[23])){
                $phone = new \Erp\Bundle\ObjectValueBundle\Entity\ContactPhone();
                $phone
                  ->setPhone($csv[23])
                  ->setDefault(true)
                ;
                $contact->addPhone($phone);
              }
              if(!empty($csv[24])){
                $phone = new \Erp\Bundle\ObjectValueBundle\Entity\ContactPhone();
                $phone
                  ->setPhone($csv[24])
                  ->setDefault(false)
                ;
                $contact->addPhone($phone);
              }
              $item->addContact($contact);
            }

            if(!empty($csv[25])) {
              $contact = new \Erp\Bundle\ObjectValueBundle\Entity\Contact();
              $contact
                ->setAlias($csv[25])
                ->setPosition($csv[26])
                ->setEmail($csv[27])
                ->setLineId($csv[28])
              ;

              if(!empty($csv[29])){
                $phone = new \Erp\Bundle\ObjectValueBundle\Entity\ContactPhone();
                $phone
                  ->setPhone($csv[29])
                  ->setDefault(true)
                ;
                $contact->addPhone($phone);
              }
              if(!empty($csv[30])){
                $phone = new \Erp\Bundle\ObjectValueBundle\Entity\ContactPhone();
                $phone
                  ->setPhone($csv[30])
                  ->setDefault(false)
                ;
                $contact->addPhone($phone);
              }
              $item->addContact($contact);
            }

            //$cqrs_corporate->command()->remove($item->getContact());
            $item->setContact($item->getContacts()[0]);

            if(!empty($csv[31])) {
              $bankAccount = new \Erp\Bundle\ObjectValueBundle\Entity\BankAccount();
              $bankAccount
                ->setCode($csv[31])
                ->setName($csv[32])
                ->setCategory($csv[33])
                ->setBank($csv[34])
                ->setBranch($csv[35])
              ;
              $item->addBankAccount($bankAccount);
            }
            if(!empty($csv[36])) {
              $bankAccount = new \Erp\Bundle\ObjectValueBundle\Entity\BankAccount();
              $bankAccount
                ->setCode($csv[36])
                ->setName($csv[37])
                ->setCategory($csv[38])
                ->setBank($csv[39])
                ->setBranch($csv[40])
              ;
              $item->addBankAccount($bankAccount);
            }

          }

          $k++;
          //var_dump($item);

        }
      });
      //throw new \Exception("xxxxx");
    } catch(\Exception $excp) {
      $output->writeln('<fg=red>File '.$excp->getFile().':'.$excp->getLine().'</fg=red>');
      $output->writeln('<fg=red>'.$excp->getMessage().'</fg=red>');
    }

    fclose($fp);
  }
}
