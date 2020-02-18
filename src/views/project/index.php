<?php

/**
 * Project page
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
use yii\helpers\Url;

$this->title = 'Проекты';
?>

<section id="project">
    <div>
        <?php echo Html::a(
            'Добавить проект',
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
                    'name',
                    'url',
                    'git',
                    [
                        'label' => 'Image',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::img(
                                Url::toRoute(
                                    'img/project/' . $data->image
                                ),
                                [
                                    'style' => 'height:50px;'
                                ]
                            );
                        },
                    ],
                    ['class' => 'application\grid\ActionColumn']
               ]
            ]
        );
        ?>
    </div>
</section>