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
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'Запись: ' . $model->blogs->title;
?>

<section id="blog">
    <p>
        <?php echo Html::a(
            'Обновить',
            ['update', 'id' => $model->blogs->id],
            ['class' => 'btn btn-primary']
        ) ?>
        <?php echo Html::a(
            'Удалить',
            ['delete', 'id' => $model->blogs->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить эту запись?',
                    'method' => 'post'
                ]
            ]
        ) ?>
    </p>
    <div>
        <?php echo DetailView::widget(
            [
                'model' => $model->blogs,
                'attributes' => [
                    'id',
                    'title',
                    'description:ntext',
                    [
                        'label' => 'Image',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::img(
                                Url::toRoute(
                                    'img/blog/title/' . $data->image
                                ),
                                [
                                    'style' => 'height:50px;'
                                ]
                            );
                        },
                    ],
                    'text:ntext',
                    [
                        'attribute' => 'tags',
                        'value' => function ($model) {
                            $tags = ArrayHelper::getColumn(
                                $model->tags,
                                'tag'
                            );
                            return implode(', ', $tags);
                        }
                    ],
                    'created_at:datetime',
                    'updated_at:datetime'
                ]
            ]
        ) ?>
    </div>
</section>