<?php

/**
 * Layout for pages
 * php version 7.2.22
 *
 * @category Layout
 * @package  Layout_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use application\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php if (!Yii::$app->user->isGuest) : ?>
        <?php
        NavBar::begin(
            [
                'brandLabel' => 'PHP: Блок администратора',
                'brandUrl' => ['manager/blog'],
                'options' => [
                    'class' => 'navbar navbar-expand-lg
                    navbar-dark bg-danger navbar-fixed-top',
                ],
            ]
        );
        echo Nav::widget(
            [
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Блог', 'url' => ['manager/blog']],
                    ['label' => 'Категории', 'url' => ['manager/category']],
                    ['label' => 'Проекты', 'url' => ['manager/project']],
                    (
                        '<li>'
                        . Html::beginForm(['/auth/logout'], 'post')
                        . Html::submitButton(
                            'Выйти из системы',
                            ['class' => 'btn btn-light']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ]
            ]
        );
        NavBar::end();
        ?>
    <?php endif; ?>

    <?php
    NavBar::begin(
        [
            'brandLabel' => 'PHP: Блог о коде',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg
                navbar-dark bg-dark navbar-fixed-top'
            ]
        ]
    );
    echo Nav::widget(
        [
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Блог', 'url' => ['/base/blog']],
                ['label' => 'Резюме', 'url' => ['/base/resume']],
                ['label' => 'Портфолио', 'url' => ['/base/portfolio']],
                ['label' => 'Github',
                'url' => 'https://github.com/JOKER-THE?tab=repositories']
            ]
        ]
    );
    NavBar::end();
    ?>

    <div class="container">
        <?php echo $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; Павел Родионов <?php echo date('Y') ?> год</p>
    </div>
</footer>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>