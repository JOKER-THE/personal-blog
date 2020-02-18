<?php

/**
 * Database
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
 * The host for establishing DB connection
 */
define('HOST', '127.0.0.1');

/**
 * The tablename for establishing DB connection
 */
define('DATABASE', 'db_personal_blog');

/**
 * The username for establishing DB connection
 */
define('USERNAME', 'root');

/**
 * The password for establishing DB connection
 */
define('PASSWORD', '');

/**
 * The charset used for database connection
 */
define('CHARSET', 'utf8');

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . HOST . ';dbname=' . DATABASE,
    'username' => USERNAME,
    'password' => PASSWORD,
    'charset' => CHARSET
];
