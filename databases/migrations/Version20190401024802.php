<?php

declare(strict_types=1);

namespace Databases\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190401024802 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('members');
        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
            'unsigned' => true
        ]);
        $table->addColumn('member_id', 'integer', [
            'unsigned' => true,
            'notnull' => false
        ]);
        $table->addColumn('uuid', 'string', [
            'length' => 128
        ]);
        $table->addColumn('username', 'string', [
            'length' => 255,
            'notnull' => false
        ]);
        $table->addColumn('password', 'string', [
            'length' => 255,
            'notnull' => false
        ]);
        $table->addColumn('email', 'string', [
            'length' => 255,
            'notnull' => false
        ]);
        $table->addColumn('phone', 'string', [
            'length' => 11,
            'notnull' => false
        ]);
        $table->addColumn('nickname', 'string', [
            'length' => 50,
            'notnull' => false
        ]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['uuid']);
    }

    public function down(Schema $schema) : void
    {
        if ($schema->hasTable('members')) {
            $schema->dropTable('members');
        }
    }
}
