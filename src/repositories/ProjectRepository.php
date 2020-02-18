<?php

/**
 * Repository
 * php version 7.2.22
 *
 * @category Repository
 * @package  Repository_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\repositories;

use yii\db\ActiveRecord;

/**
 * ProjectRepository
 *
 * @category Application
 * @package  Repository_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class ProjectRepository extends ActiveRecord
{
    /**
     * Get tablename
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%project}}';
    }
}
