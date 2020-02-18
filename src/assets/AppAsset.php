<?php

/**
 * Asset
 * php version 7.2.22
 *
 * @category Asset
 * @package  Asset_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\assets;

use yii\web\AssetBundle;

/**
 * Application Asset
 *
 * @category Application
 * @package  Asset_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class AppAsset extends AssetBundle
{
    /**
     * Base Path
     */
    public $basePath = '@webroot';

    /**
     * Base Url
     */
    public $baseUrl = '@web';

    /**
     * Styles
     */
    public $css = [
        'css/main.css',
        'css/animate.css',
        'css/glyphicon.css'
    ];

    /**
     * Scripts
     */
    public $js = [
        'js/wow.min.js',
        'js/wow.init.js'
    ];

    /**
     * Depends
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset'
    ];
}
