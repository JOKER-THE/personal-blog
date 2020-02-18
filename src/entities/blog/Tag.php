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
namespace application\entities\blog;

use application\services\BlogService;

/**
 * Tag entity
 *
 * @category Application
 * @package  Entity_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 *
 * @property integer $id
 * @property string $tag
 */
class Tag
{
    /**
     * Object of BlogService
     *
     * @var object $service
     */
    protected $service;

    /**
     * Objects of Blogs
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
     * Get blogs
     *
     * @param string  $tag      blog's unique ID
     * @param integer $pageSize count blog on page
     */
    public function __construct($tag, $pageSize = 3)
    {
        $this->service = new BlogService();
        $blogs = $this->service->getWithTag($tag, $pageSize);
        $this->blogs = $blogs->blogs;
        $this->pages = $blogs->pages;
    }
}
