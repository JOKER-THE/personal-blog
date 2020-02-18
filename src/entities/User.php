<?php

/**
 * Entity
 * php version 7.2.22
 *
 * @category Entity
 * @package  Entity_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\entities;

use Yii;
use application\repositories\UserRepository;

/**
 * User entity
 *
 * @category Application
 * @package  Entity_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User
{
    /**
     * Object of UserRepository
     *
     * @var object $repository
     */
    protected $repository;

    /**
     * Password Hash
     *
     * @var string $password_hash
     */
    protected $password_hash;

    /**
     * Auth key
     *
     * @var string $auth_key
     */
    protected $auth_key;

    /**
     * Get object of UserRepository
     */
    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    /**
     * Finds user by username
     *
     * @param string $username name is logged user
     *
     * @return static|null
     */
    public function findByUsername($username)
    {
        return $this->repository::findOne(
            [
                'username' => $username,
                'status' => $this->repository::STATUS_ACTIVE
            ]
        );
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password user password
     *
     * @return string
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     *
     * @return string
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Save User in database
     *
     * @return void
     */
    public function save()
    {
        $this->repository->username = $this->username;
        $this->repository->email = $this->email;
        $this->repository->password_hash = $this->password_hash;
        $this->repository->auth_key = $this->auth_key;
        $this->repository->save();
    }
}
