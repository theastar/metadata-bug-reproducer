<?php

namespace App\Repository;

use App\Entity\CriminalRecord;
use App\Entity\Person;
use Doctrine\ORM\EntityRepository;

class CriminalRecordRepository extends EntityRepository
{
    /**
     * @param Person $person
     *
     * @return CriminalRecord|null
     */
    public function findOneByPerson(Person $person)
    {
        /** @var CriminalRecord|null $criminalRecord */
        $criminalRecord = $this->findOneBy(['person' => $person]);

        return $criminalRecord;
    }
}
