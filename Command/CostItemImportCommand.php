<?php

namespace Erp\Bundle\MasterBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
//use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Erp\Bundle\MasterBundle\Entity\CostItem;

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

  protected $commandHandler;
  
  /** @required */
  public function setCommandHandler(\Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommandHandler $commandHandler)
  {
      $this->commandHandler = $commandHandler;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $filename = $input->getArgument('filename');

    $fp = fopen($filename, "r");

    try{
      if(!$fp) throw new \Exception("Cannot open file '{$filename}'");

      $this->commandHandler->execute(function($em) use ($fp) {
        $k = 1;
        while(($csv = fgetcsv($fp)) !== false) {
          if(count($csv) !== 6) throw new \Exception("Invalid file format on line: {$k}\n".'"'. implode('","') .'"');

          /** @var \Erp\Bundle\MasterBundle\Entity\CostItem */
          $item = new CostItem();
          $item->setCode(($csv[0] === '')? null : $csv[0]);
          $item->setName(($csv[1] === '')? null : $csv[1]);
          $item->setDescription(($csv[2] === '')? null : $csv[2]);
          $item->setType(($csv[3] === '')? null : $csv[3]);
          $item->setUnit(($csv[4] === '')? null : $csv[4]);
          $item->setPrice(($csv[5] === '')? null : $csv[5]);

          $em->persist($item);

          $k++;
        }
      });
    } catch(\Exception $excp) {
      $output->writeln('<fg=red>'.$excp->getMessage().'</fg=red>');
    }

    fclose($fp);
  }
}
