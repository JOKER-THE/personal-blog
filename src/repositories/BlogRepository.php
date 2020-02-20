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
use yii\behaviors\TimestampBehavior;

/**
 * BlogRepository
 *
 * @category Application
 * @package  Repository_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class BlogRepository extends ActiveRecord
{
    /**
     * Blog's image
     *
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * Behavior
     *
     * @return yii\behavior\TimestampBehavior
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Get tablename
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * Get table `{{%blog_tag%}}`
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogTags()
    {
        return $this->hasMany(BlogTagRepository::className(), ['blog_id' => 'id']);
    }

    /**
     * Get table `{{%tag%}}`
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(
            TagRepository::className(),
            ['id' => 'tag_id']
        )->viaTable('{{%blog_tag}}', ['blog_id' => 'id']);
    }
}
