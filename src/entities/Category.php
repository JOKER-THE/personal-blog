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

use application\repositories\TagRepository;

/**
 * Category entity
 *
 * @category Application
 * @package  Entity_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 *
 * @property string $tag
 */
class Category
{
    /**
     * Object of TagRepository
     *
     * @var object $repository
     */
    public $repository;

    /**
     * Array of categories
     *
     * @var array $categories
     */
    public $categories = [];

    /**
     * Get categories
     *
     * @param integer $id tag's unique ID
     */
    public function __construct($id = '')
    {
        $this->repository = new TagRepository();
        $this->categories = $this->_get($id);
    }

    /**
     * Get categories in repositories
     *
     * @param integer $id tag's unique ID
     *
     * @return object
     */
    private function _get($id = '')
    {
        if (empty($id)) {
            return $this->repository->find()->all();
        } else {
            return $this->repository->find()->where(['id' => $id])->one();
        }
    }
}
