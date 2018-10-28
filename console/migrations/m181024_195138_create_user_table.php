<?php
use yii\db\Schema;
use yii\db\Migration;
use app\models\User;

/**
 * Handles the creation of table `user`.
 */
class m181024_195138_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOption = null;
        if ($this->db->driverName === 'mysql') {
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8__general_ci ENGINE=InnoDB';
        }

        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
