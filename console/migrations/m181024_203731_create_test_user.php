<?php
use yii\db\Migration;
use app\models\User;

/**
 * Class m181024_203731_create_test_user
 */
class m181024_203731_create_test_user extends Migration
{

    public function up()
    {
        $testUser = new UserDb();
        $testUser->username = 'admin';
        $testUser->setPassword('password');
        $testUser->generateAuthKey();
        $testUser->save();
    }


    public function down()
    {
       $user = UserDb::findByUsername('admin');
       $user ? $user->delete() : null;

        return true;
    }
}
