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
 * BlogTagRepository
 *
 * @category Application
 * @package  Repository_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class BlogTagRepository extends ActiveRecord
{
    /**
     * Get tablename
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%blog_tag}}';
    }

    /**
     * Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['tag_id', 'blog_id'], 'required']
        ];
    }

    /**
     * Get attribute
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag',
            'blog_id' => 'Blog'
        ];
    }

    /**
     * Get table `{{%tag%}}`
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(TagRepository::className(), ['id' => 'tag_id']);
    }

    /**
     * Get table `{{%blog%}}`
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(BlogRepository::className(), ['id' => 'blog_id']);
    }
}
