<?php

/**
 * Main page
 * php version 7.2.22
 *
 * @category View
 * @package  View_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
use yii\helpers\Html;

$this->title = 'PHP: Блог о коде';
?>

<div class="row menu align-items-center justify-content-center  wow fadeInDown"
     data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="col menu-item">
        <?php echo Html::a('Блог', ["base/blog"]) ?>
    </div>
    <div class="col menu-item">
        <?php echo Html::a('Резюме', ["base/resume"]) ?>
    </div>
    <div class="col menu-item">
        <?php echo Html::a('Портфолио', ["base/portfolio"]) ?>
    </div>
    <div class="col menu-item">
        <?php echo Html::a(
            'Github',
            "https://github.com/JOKER-THE?tab=repositories"
        ) ?>
    </div>
</div>
