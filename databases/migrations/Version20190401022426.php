<?php

declare(strict_types=1);

namespace Databases\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190401022426 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('third_auths');
        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
            'unsigned' => true
        ]);
        $table->addColumn('member_id', 'integer', [
            'unsigned' => true
        ]);
        $table->addColumn('platform', 'string', [
            'default' => 'wechat',
            'length' => 30
        ])->setComment('Third party application');
        $table->addColumn('openid', 'string', [
            'length' => 255
        ])->setComment('Third party id');
        $table->addColumn('unionid', 'string', [
            'length' => 255,
            'notnull' => false
        ])->setComment('Third party unionid');
        $table->addColumn('nickname', 'string', [
            'length' => 100,
            'notnull' => false
        ])->setComment('Third party nickname');
        $table->addColumn('profile_picture_url', 'string', [
            'length' => 255,
            'notnull' => false
        ])->setComment('Third party profile picture');
        $table->addColumn('access_token', 'string', [
            'length' => 255,
            'notnull' => false
        ])->setComment('Third party access_token');
        $table->addColumn('refresh_token', 'string', [
            'length' => 255,
            'notnull' => false
        ])->setComment('Third party refresh_token');
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['openid']);
    }

    public function down(Schema $schema) : void
    {
        if ($schema->hasTable('third_auths')) {
            $schema->dropTable('third_auths');
        }
    }
}
