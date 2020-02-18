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
     * Display main-page
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = '@application/views/layouts/index.layout.php';
        
        return $this->render('index');
    }
}
