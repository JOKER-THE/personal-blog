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
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<div class="сontainer">

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'form-group',
                'enctype' => 'multipart/form-data'
            ]
        ]
    ); ?>

    <?php
        $itemsBlog = ArrayHelper::map($blog, 'id', 'title');
        $paramsBlog = [
            'prompt' => 'Выбрать блог...'
        ];
    ?>

    <?php
        $itemsTag = ArrayHelper::map($tag, 'id', 'tag');
        $paramsTag = [
            'prompt' => 'Выбрать блог...'
        ];
    ?>

    <div class="col-md-4">
        <?php echo $form->field($model, 'blog_id')->textInput()->dropDownList(
            $itemsBlog,
            $paramsBlog
        ) ?>

        <?php echo $form->field($model, 'tag_id')->textInput()->dropDownList(
            $itemsTag,
            $paramsTag
        ) ?>

        <div class="form-group">
            <?php echo Html::submitButton(
                'Сохранить',
                ['class' => 'btn btn-success']
            ) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>