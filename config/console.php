<?php

/**
 * Console
 * Config file for project
 * php version 7.2.22
 *
 * @category Config
 * @package  Config_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */

/**
 * Connect database's configuration
 */
$db = include __DIR__ . '/db.php';

/**
 * Added params
 */
$params = include __DIR__ . '/params.php';

return [

    /**
     * An ID that uniquely identifies this module among other modules
     */
    'id' => 'personal-blog-console',

    /**
     * The root directory of the module
     */
    'basePath' => dirname(__DIR__),

    /**
     * List of path aliases to be defined
     */
    'aliases' => [
        '@application' => dirname(__DIR__) . '/src'
    ],

    /**
     * The namespace that controller classes are in.
     * This namespace will be used to load controller
     * classes by prepending it to the controller class name
     */
    'controllerNamespace' => 'app\console',

    /**
     * The list of the component definitions or the
     * loaded component instances (ID => definition or instance)
     */
    'components' => [

        /**
         * Database component
         */
        'db' => $db
    ],

    /**
     * Parametres
     */
    'params' => $params
];
