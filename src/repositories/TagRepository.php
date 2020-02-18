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
 * TagRepository
 *
 * @category Application
 * @package  Repository_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class TagRepository extends ActiveRecord
{
    /**
     * Get tablename
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['tag'], 'required']
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
            'tag' => 'Tag'
        ];
    }

    /**
     * Get table `{{%blog_tag%}}`
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogsTags()
    {
        return $this->hasMany(BlogTagRepository::className(), ['tag_id' => 'id']);
    }

    /**
     * Get table `{{%blog%}}`
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(
            BlogRepository::className(),
            ['id' => 'blog_id']
        )->viaTable('{{%blog_tag}}', ['tag_id' => 'id']);
    }
}
