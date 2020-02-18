<?php

/**
 * Form
 * php version 7.2.22
 *
 * @category Form
 * @package  Form_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */

namespace application\forms;

use Yii;
use yii\base\Model;
use application\entities\User;
use application\services\IdentityService;

/**
 * Login Form
 *
 * @category Application
 * @package  Form_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 *
 * @property User|null $user This property is read-only.
 */
class LoginForm extends Model
{
    /**
     * UserName
     *
     * @var string $username
     */
    public $username;

    /**
     * Password
     *
     * @var string $password
     */
    public $password;

    /**
     * Check `Remember Me`
     *
     * @var bool $rememberMe
     */
    public $rememberMe = true;


    /**
     * Object User
     *
     * @var object $_user
     */
    private $_user = false;


    /**
     * Rules
     *
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array  $params    the additional name-value pairs given in the rule
     *
     * @return void
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login(
                new IdentityService($this->getUser()),
                $this->rememberMe ? 3600*24*30 : 0
            );
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $user = new User();
            $this->_user = $user->findByUsername($this->username);
        }

        return $this->_user;
    }
}
