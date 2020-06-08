<?php

declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200608113313 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE person (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE criminal_record (id INTEGER NOT NULL, person_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_678AFDC4217BBB47 ON criminal_record (person_id)');
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE criminal_record');
    }
}
