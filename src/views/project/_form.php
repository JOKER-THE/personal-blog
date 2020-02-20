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
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
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

    <div class="col-md-12">
        <?php echo $form->field($model, 'name')->textInput() ?>

        <?php echo $form->field($model, 'url')->textInput() ?>

        <?php echo $form->field($model, 'git')->textInput() ?>

        <?php echo $form->field($model, 'file')->fileInput() ?>

        <?php echo $form->field($model, 'description')->widget(
            CKEditor::className(),
            [
                'editorOptions' => [
                    'preset' => 'full',
                    'inline' => false
                ]
            ]
        ); ?>

        <div class="form-group">
            <?php echo Html::submitButton(
                'Сохранить',
                ['class' => 'btn btn-success']
            ) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>