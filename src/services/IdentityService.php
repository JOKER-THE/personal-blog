<?php

/**
 * Service
 * php version 7.2.22
 *
 * @category Service
 * @package  Service_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\services;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use application\entities\User;
use application\repositories\UserRepository;

/**
 * IdentityService
 *
 * @category Application
 * @package  Service_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class IdentityService implements IdentityInterface
{
    /**
     * Object User
     *
     * @var object $user
     */
    protected $user;

    /**
     * Object UserRepository
     *
     * @var object $repository
     */
    protected $repository;

    /**
     * Get object og UserRepository & User's object
     *
     * @param object $user user entity
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->repository = new UserRepository;
    }

    /**
     * Find Idenity
     *
     * @param integer $id unique user's ID
     *
     * @return object|null
     */
    public static function findIdentity($id)
    {
        $user =  UserRepository::findOne(['id' => $id]);
        return $user ? new self($user): null;
    }

    /**
     * Find Identity By Access Token
     *
     * @param string $token unique token
     * @param string $type  auth type
     *
     * @return throw NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException(
            '"findIdentityByAccessToken" is not implemented.'
        );
    }

    /**
     * Get Id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->user->getPrimaryKey();
    }

    /**
     * Get Auth Key
     *
     * @return string
     */
    public function getAuthKey(): string
    {
        return $this->user->auth_key;
    }

    /**
     * Validate Auth Key
     *
     * @param string $authKey unique auth key
     *
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Getting properties
     *
     * @param string $name user's name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->user->$name;
    }

    /**
     * Call to methods
     *
     * @param string $methodName name of method
     * @param array  $args       args's array
     *
     * @return mixed
     */
    public function __call($methodName, $args)
    {
        return $this->user->$methodName($args);
    }
}
