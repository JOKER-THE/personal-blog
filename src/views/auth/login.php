<?php

/**
 * Login page
 * php version 7.2.22
 *
 * @category View
 * @package  View_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(
        [
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">
                    {input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]
    ); ?>

        <?php echo $form->field($model, 'username')->textInput(
            ['autofocus' => true]
        ) ?>

        <?php echo $form->field($model, 'password')->passwordInput() ?>

        <?php echo $form->field($model, 'rememberMe')->checkbox(
            [
                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">
                    {input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]
        ) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?php echo Html::submitButton(
                    'Войти',
                    ['class' => 'btn btn-primary', 'name' => 'login-button']
                ) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>