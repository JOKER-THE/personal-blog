<?php

/**
 * Category page
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

    <div class="col-md-4">
        <?php echo $form->field($model, 'tag')->textInput()->label('Категория') ?>

        <div class="form-group">
            <?php echo Html::submitButton(
                'Сохранить',
                ['class' => 'btn btn-success']
            ) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>