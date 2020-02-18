<?php

/**
 * Controller
 * php version 7.2.22
 *
 * @category Controller
 * @package  Console_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */

namespace app\console;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use application\entities\User;

/**
 * UserController in project
 *
 * @category Console
 * @package  Console_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class UserController extends Controller
{
    /**
     * This command added admin-account.
     *
     * @return int Exit code
     */
    public function actionAddUser()
    {
        $username = Yii::$app->params['adminUsername'];
        $password = Yii::$app->params['adminPassword'];
        $email = Yii::$app->params['adminEmail'];

        $model = new User();
        $model = $model->findByUsername($username);
        
        if (empty($model)) {
            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->setPassword($password);
            $user->generateAuthKey();
            
            if ($user->save()) {
                return ExitCode::OK;
            }
        }
    }
}
