<?php

/**
 * Controller
 * php version 7.2.22
 *
 * @category Controller
 * @package  Controller_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\controllers;

use yii\web\Controller;
use application\entities\Project;
use application\entities\Category;
use application\entities\blog\Blog;
use application\entities\blog\Tag;

/**
 * BaseController in project
 *
 * @category Application
 * @package  Controller_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class BaseController extends Controller
{
    /**
     * Page layout
     *
     * @var string $layout url to layout
     */
    public $layout = '@application/views/layouts/page.layout.php';

    /**
     * Display main-page
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = '@application/views/layouts/index.layout.php';
        
        return $this->render('index');
    }

    /**
     * Display blog-page
     *
     * @return string
     */
    public function actionBlog()
    {
        $model = new Blog();
        $categories = new Category();

        return $this->render(
            'blog',
            [
                'model' => $model,
                'categories' => $categories
            ]
        );
    }

    /**
     * Display search blog for tag
     *
     * @param string $tag searched tag
     *
     * @return string
     */
    public function actionSearch($tag)
    {
        $model = new Tag($tag);
        $categories = new Category();

        return $this->render(
            'blog',
            [
               'model' => $model,
               'categories' => $categories
            ]
        );
    }

    /**
     * View blog-item
     *
     * @param integer $id blog's unique ID
     *
     * @return string
     */
    public function actionView($id)
    {
        $model = new Blog($id);
        $categories = new Category();

        return $this->render(
            'view',
            [
                'model' => $model,
                'categories' => $categories
            ]
        );
    }

    /**
     * Display page with resume
     *
     * @return string
     */
    public function actionResume()
    {
        return $this->render('resume');
    }

    /**
     * Display page with my portfolio
     *
     * @return string
     */
    public function actionPortfolio()
    {
        $model = new Project();

        return $this->render(
            'portfolio',
            [
                'model' => $model
            ]
        );
    }
}
