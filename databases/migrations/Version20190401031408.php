<?php

declare(strict_types=1);

namespace Databases\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190401031408 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // @link https://stackoverflow.com/questions/34774628/how-do-i-make-doctrine-support-timestamp-columns
        $this->addSql('ALTER TABLE third_auths ADD COLUMN created_at TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE third_auths ADD COLUMN updated_at TIMESTAMP NOT NULL');

        $this->addSql('ALTER TABLE members ADD COLUMN created_at TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE members ADD COLUMN updated_at TIMESTAMP NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
