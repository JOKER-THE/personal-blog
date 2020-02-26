<?php

/**
 * Blog page
 * php version 7.2.22
 *
 * @category View
 * @package  View_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Блог';
?>

<section id="blog">
    <div>
        <?php echo Html::a(
            'Добавить запись',
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
                    'title',
                    [
                        'attribute' => 'tags',
                        'value' => function ($model) {
                            $tags = ArrayHelper::getColumn($model->tags, 'tag');
                            return implode(', ', $tags);
                        }
                    ],
                    [
                        'label' => 'Button',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a(
                                'Редактировать теги',
                                [
                                    'manager/tag',
                                    'id' => $model->id
                                ],
                                ['class' => 'btn btn-outline-dark']
                            );
                        }
                    ],
                    ['class' => 'application\grid\ActionColumn']
                ]
            ]
        ); ?>
        <?php echo
            LinkPager::widget(
                [
                   'pagination' => $model->pages
                ]
            );
        ?>
    </div>
</section>