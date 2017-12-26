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

      $cqrs->command()->transactional(function() use ($cqrs, $p) {
        $k = 1;
        while(($csv = fgetcsv($fp)) !== false) {
          if(count($csv) !== 40) throw new \Exception("Invalid file format on line: {$k}\n".'"'. implode('","') .'"');

          if($csv[0] === 'INDIVIDUAL') {
            /** @var \Erp\Bundle\MasterBundle\Entity\PersonIndividual */
            $item = $cqrs_individual->command()->create();

            $item->setCode('PS'.time());
            $item->getPersonData()->setCode($csv[0]);
            $item->getPersonData()->setName($csv[1].$csv[2].' '.$csv[3]);
            $item->getPersonData()->setInitname($csv[1]);
            $item->getPersonData()->setFirstname($csv[2]);
            $item->getPersonData()->setLastname($csv[3]);
            $item->getPersonData()->setBirthDate(new \DateTimeImmutable($csv[4]));
            $item->getPersonData()->setReligious($csv[5]);

            $item->getPersonData()->getAddress()->setAddress($csv[6]);
            $item->getPersonData()->getAddress()->setSubdistrict($csv[7]);
            $item->getPersonData()->getAddress()->setDistrict($csv[8]);
            $item->getPersonData()->getAddress()->setProvince($csv[9]);
            $item->getPersonData()->getAddress()->setPostalcode($csv[10]);

            $item->getPersonData()->setIssueDate(new \DateTimeImmutable($csv[11]));
            $item->getPersonData()->setExpiredDate(new \DateTimeImmutable($csv[12]));

            $item->getAddress()->setAddress($csv[13]);
            $item->getAddress()->setSubdistrict($csv[14]);
            $item->getAddress()->setDistrict($csv[15]);
            $item->getAddress()->setProvince($csv[16]);
            $item->getAddress()->setPostalcode($csv[17]);

            $item->setPhone($csv[18]);
            $item->setFax($csv[19]);
            //$item->getContact()
          } else if($csv[0] === 'CORPORATE') {
            /** @var \Erp\Bundle\MasterBundle\Entity\PersonCorporate */
            $item = $cqrs_corporate->command()->create();
          }


          $k++;
        }
      });
    } catch(\Exception $excp) {
      $output->writeln('<fg=red>'.$excp->getMessage().'</fg=red>');
    }

    fclose($fp);
  }
}
