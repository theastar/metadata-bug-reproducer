<?php

namespace App\Command;

use App\Entity\PersonInmate;
use App\Repository\CriminalRecordRepository;
use App\Repository\PersonInmateRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\VarDumper;

class Test2Command extends Command
{
    protected static $defaultName = 'app:test2';

    private $criminalRecordRepository;
    private $personInmateRepository;

    public function __construct(
        CriminalRecordRepository $criminalRecordRepository,
        PersonInmateRepository $personInmateRepository
    ) {
        parent::__construct();
        $this->criminalRecordRepository = $criminalRecordRepository;
        $this->personInmateRepository = $personInmateRepository;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this->criminalRecordRepository->findOneByPerson(new PersonInmate());

        VarDumper::dump($result);
    }
}
