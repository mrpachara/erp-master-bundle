<?php

namespace Erp\Bundle\MasterBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
//use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class CostItemImportCommand extends ContainerAwareCommand{
  protected function configure(){
    $this
      ->setName('ErpMaster:CostItem:import')
      ->setDescription('Import CostItem from file')
      ->setHelp('This command allows you to import CostItem data from the given file')
    ;

    $this
      ->addArgument('filename', InputArgument::REQUIRED, 'File name to import.')
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $filename = $input->getArgument('filename');
    /** @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer */
    $cqrs = $this->getContainer()->get('erp_master.cqrs.costitem');

    $fp = fopen($filename, "r");

    try{
      if(!$fp) throw new \Exception("Cannot open file '{$filename}'");

      $cqrs->command()->transactional(function() use ($cqrs, $p) {
        $k = 1;
        while(($csv = fgetcsv($fp)) !== false) {
          if(count($csv) !== 6) throw new \Exception("Invalid file format on line: {$k}\n".'"'. implode('","') .'"');

          /** @var \Erp\Bundle\MasterBundle\Entity\CostItem */
          $item = $cqrs->command()->create();
          $item->setCode(($csv[0] === '')? null : $csv[0]);
          $item->setName(($csv[1] === '')? null : $csv[1]);
          $item->setDescription(($csv[2] === '')? null : $csv[2]);
          $item->setType(($csv[3] === '')? null : $csv[3]);
          $item->setUnit(($csv[4] === '')? null : $csv[4]);
          $item->setPrice(($csv[5] === '')? null : $csv[5]);

          $k++;
        }
      });
    } catch(\Exception $excp) {
      $output->writeln('<fg=red>'.$excp->getMessage().'</fg=red>');
    }

    fclose($fp);
  }
}
