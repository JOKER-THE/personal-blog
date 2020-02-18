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
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'Проект: ' . $model->project->name;
?>

<section id="project">
    <p>
        <?php echo Html::a(
            'Обновить',
            ['update', 'id' => $model->project->id],
            ['class' => 'btn btn-primary']
        ) ?>

        <?php echo Html::a(
            'Удалить',
            ['delete', 'id' => $model->project->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить эту запись?',
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>
    <div>
        <?php echo DetailView::widget(
            [
                'model' => $model->project,
                'attributes' => [
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
                    'description:ntext'
                ]
            ]
        ) ?>
    </div>
</section>