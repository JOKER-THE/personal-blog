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
 * Handles the creation of table `{{%project}}`
 *
 * @category Console
 * @package  Migration_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class m200218_051233_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%project}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'url' => $this->string(),
                'git' => $this->string(),
                'image' => $this->string(),
                'description' => $this->text()
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
        $this->dropTable('{{%project}}');
    }
}
