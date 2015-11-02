<?php

use amnah\yii2\user\models\User;
use amnah\yii2\user\models\Role;
use yii\db\Schema;
use yii\db\Migration;
use yii\db\Expression;

class m151102_151951_amnah_yii2_user_init_user_for_oracle extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // create tables. note the specific order
        $this->createTable('{{%role}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' not null',
            'create_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'update_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'can_admin' => Schema::TYPE_SMALLINT . ' default 0 not null',
        ], $tableOptions);
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'role_id' => Schema::TYPE_INTEGER . ' not null',
            'status' => Schema::TYPE_SMALLINT . ' not null',
            'email' => Schema::TYPE_STRING . ' default null null',
            'new_email' => Schema::TYPE_STRING . ' default null null',
            'username' => Schema::TYPE_STRING . ' default null null',
            'password' => Schema::TYPE_STRING . ' default null null',
            'auth_key' => Schema::TYPE_STRING . ' default null null',
            'api_key' => Schema::TYPE_STRING . ' default null null',
            'login_ip' => Schema::TYPE_STRING . ' default null null',
            'login_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'create_ip' => Schema::TYPE_STRING . ' default null null',
            'create_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'update_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'ban_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'ban_reason' => Schema::TYPE_STRING . ' default null null',
        ], $tableOptions);
        $this->createTable('{{%user_key}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' not null',
            'type' => Schema::TYPE_SMALLINT . ' not null',
            'key_value' => Schema::TYPE_STRING . ' not null',
            'create_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'consume_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'expire_time' => Schema::TYPE_TIMESTAMP . ' default null null',
        ], $tableOptions);
        $this->createTable('{{%profile}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' not null',
            'create_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'update_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'full_name' => Schema::TYPE_STRING . ' default null null',
        ], $tableOptions);
        $this->createTable('{{%user_auth}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' not null',
            'provider' => Schema::TYPE_STRING . ' not null',
            'provider_id' => Schema::TYPE_STRING . ' not null',
            'provider_attributes' => Schema::TYPE_TEXT . ' not null',
            'create_time' => Schema::TYPE_TIMESTAMP . ' default null null',
            'update_time' => Schema::TYPE_TIMESTAMP . ' default null null'
        ], $tableOptions);

        // add indexes for performance optimization
        $this->createIndex('{{%user_email}}', '{{%user}}', 'email', true);
        $this->createIndex('{{%user_username}}', '{{%user}}', 'username', true);
        $this->createIndex('{{%user_key_key}}', '{{%user_key}}', 'key_value', true);
        $this->createIndex('{{%user_auth_provider_id}}', '{{%user_auth}}', 'provider_id', false);

        // add foreign keys for data integrity
        $this->addForeignKey('{{%user_role_id}}', '{{%user}}', 'role_id', '{{%role}}', 'id');
        $this->addForeignKey('{{%profile_user_id}}', '{{%profile}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('{{%user_key_user_id}}', '{{%user_key}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('{{%user_auth_user_id}}', '{{%user_auth}}', 'user_id', '{{%user}}', 'id');

        // insert role data
        $columns = ['id', 'name', 'can_admin', 'create_time'];
        $this->batchInsert('{{%role}}', $columns, [
            [Role::ROLE_ADMIN, 'Admin', 1, new Expression('CURRENT_TIMESTAMP')],
            [Role::ROLE_USER, 'User', 0, new Expression('CURRENT_TIMESTAMP')],
        ]);

        // insert admin user: neo/neo
        $security = Yii::$app->security;
        $columns = ['id', 'role_id', 'email', 'username', 'password', 'status', 'create_time', 'api_key', 'auth_key'];
        $this->batchInsert('{{%user}}', $columns, [
            [
                1,
                Role::ROLE_ADMIN,
                'neo@neo.com',
                'neo',
                '$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O',
                User::STATUS_ACTIVE,
                new Expression('CURRENT_TIMESTAMP'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],
        ]);

        // insert profile data
        $columns = ['id', 'user_id', 'full_name', 'create_time'];
        $this->batchInsert('{{%profile}}', $columns, [
            [1, 1, 'the one', new Expression('CURRENT_TIMESTAMP')],
        ]);
    }

    public function safeDown()
    {
        // drop tables in reverse order (for foreign key constraints)
        $this->dropTable('{{%user_auth}}');
        $this->dropTable('{{%profile}}');
        $this->dropTable('{{%user_key}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%role}}');
    }
}
