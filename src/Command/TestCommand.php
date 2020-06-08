<?php

namespace App\Command;

use App\Entity\PersonInmate;
use App\Repository\CriminalRecordRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\VarDumper;

class TestCommand extends Command
{
    protected static $defaultName = 'app:test';

    private $criminalRecordRepository;

    public function __construct(CriminalRecordRepository $criminalRecordRepository)
    {
        parent::__construct();
        $this->criminalRecordRepository = $criminalRecordRepository;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this->criminalRecordRepository->findOneByPerson(new PersonInmate());

        VarDumper::dump($result);
    }
}
