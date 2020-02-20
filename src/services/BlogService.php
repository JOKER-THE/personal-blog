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

use yii\data\Pagination;
use application\repositories\BlogRepository;

/**
 * BlogService
 *
 * @category Application
 * @package  Service_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class BlogService
{
    /**
     * Object of BlogRepository
     *
     * @var object $repository
     */
    protected $repository;

    /**
     * Object of Blogs
     *
     * @var object $blogs
     */
    public $blogs;

    /**
     * Paginator
     *
     * @var object $pages
     */
    public $pages;

    /**
     * Get blog repository
     */
    public function __construct()
    {
        $this->repository = new BlogRepository();
    }

    /**
     * Get blogs in database
     *
     * @param integer $id       blog's unique ID
     * @param integer $pageSize count blog on page
     *
     * @return object
     */
    public function get($id = '', $pageSize = 3)
    {
        if (empty($id)) {
            return $this->getAll($pageSize);
        } else {
            return $this->getOne($id);
        }
    }

    /**
     * Getting all elements
     *
     * @param integer $pageSize count blog on page
     *
     * @return object
     */
    public function getAll($pageSize)
    {
        $query =  $this->repository->find()->with('tags');
        
        return $this->_paginator($query, $pageSize);
    }

    /**
     * Getting a one element
     *
     * @param integer $id blog's unique ID
     *
     * @return object
     */
    public function getOne($id)
    {
        $blog = $this->repository->find()->with('tags')->where(['id' => $id])->one();
        $this->blogs = $blog;

        return $this;
    }

    /**
     * Getting a blog by a specific tag
     *
     * @param string  $tag      categories name
     * @param integer $pageSize count blog on page
     *
     * @return object
     */
    public function getWithTag($tag, $pageSize)
    {
        $query =  $this->repository
            ->find()
            ->joinWith(['tags'])
            ->where(['tag.tag' => $tag]);
        
        return $this->_paginator($query, $pageSize);
    }

    /**
     * Pagination
     *
     * @param string  $query    SQL-database
     * @param integer $pageSize count blog on page
     *
     * @return object
     */
    private function _paginator($query, $pageSize) :object
    {
        $countQuery = clone $query;
        $pages = new Pagination(
            [
                'totalCount' => $countQuery->count(),
                'pageSize' => $pageSize
            ]
        );
        $pages->pageSizeParam = false;
        $blogs = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->pages = $pages;
        $this->blogs = $blogs;

        return $this;
    }

    /**
     * Save blog
     *
     * @param object $blog blog
     *
     * @return void
     */
    public function save(object $blog)
    {
        $this->repository->title = $blog->title;
        $this->repository->image = $blog->image;
        $this->repository->description = $blog->description;
        $this->repository->text = $blog->text;
        $this->repository->save();
    }

    /**
     * Delete blog
     *
     * @param integer $id unique blog's id
     *
     * @return void
     */
    public function delete($id)
    {
        $model = $this->repository->findOne($id);
        $model->delete($id);
    }
}
