<?php

/**
 * Console
 * php version 7.2.22
 *
 * @category Migration
 * @package  Migration_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog}}`
 *
 * @category Console
 * @package  Migration_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class m200218_062641_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%blog}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(),
                'description' => $this->text(),
                'image' => $this->string(),
                'text' => $this->text(),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull()
            ]
        );
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function safeDown()
    {
        $this->dropTable('{{%blog}}');
    }
}
