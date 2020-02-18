<?php

/**
 * Web
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

return [

    /**
     * An ID that uniquely identifies this module among other modules
     */
    'id' => 'personal-blog',

    /**
     * List of path aliases to be defined
     */
    'aliases' => [
        '@application' => dirname(__DIR__) . '/src',
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset'
    ],

    /**
     * The root directory of the module
     */
    'basePath' => dirname(__DIR__),

    /**
     * The namespace that controller classes are in.
     * This namespace will be used to load controller
     * classes by prepending it to the controller class name
     */
    'controllerNamespace' => 'application\controllers',

    /**
     * The default route of this module
     */
    'defaultRoute' => 'base',

    /**
     * The language that is meant to be used for end users.
     * It is recommended that you use IETF language tags
     */
    'language' => 'ru-RU',

    /**
     * The time zone used by this application.
     */
    'timeZone' => 'Asia/Irkutsk',

    /**
     * The list of the component definitions or the
     * loaded component instances (ID => definition or instance)
     */
    'components' => [

        /**
         * Database component
         */
        'db' => $db,

        /**
         * Date Format
         */
        'formatter' => [
            'datetimeFormat' => 'php:d.m.Y H:i'
        ],

        /**
         * Request
         */
        'request' => [
            'cookieValidationKey' => 'n_b41gjXn9yfZLmWGyjs9l8UUnHuh5TX',
        ],

        /**
         * Url-manager component
         */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ],

        /**
         * Auth component
         */
        'user' => [
            'identityClass' => \application\services\IdentityService::class,
            'enableAutoLogin' => true,
            'loginUrl'=>['/auth/login']
        ],

        /**
         * View's component
         */
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@application/views'
                ]
            ]
        ]
    ]
];
