<?php

/**
 * Tag page
 * php version 7.2.22
 *
 * @category View
 * @package  View_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Категории блоков';
?>

<section id="category">
    <div>
        <?php echo Html::a(
            'Добавить связь блока с тегами',
            ['create'],
            ['class' => 'btn btn-dark']
        ) ?>
    </div>
    <div>
        <?php echo GridView::widget(
            [
               'dataProvider' => $dataProvider,
               'options' => [
                    'class' => 'table-responsive'
                ],
               'columns' => [
                    'id',
                    'blog.title',
                    'tag.tag',
                    ['class' => 'application\grid\ActionColumn']
                ]
            ]
        );
        ?>
    </div>
</section>