<?php

/**
 * View blog page
 * php version 7.2.22
 *
 * @category View
 * @package  View_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */

use yii\helpers\Html;

$this->title = $model->blogs->title;
?>

<section id="blog">
    <div class="row">
        <div class="col-md-9">
            <div class="blog">

                <?php if (!empty($model->blogs->image)) : ?>
                    <p><img class="img"
                        src="/img/blog/title/<?php echo $model->blogs->image ?>"></p>
                <?php endif; ?>

                <h3><?php echo $model->blogs->title ?></h3>
                <div class="blog-text"><?php echo $model->blogs->text ?></div>
                <p class="text-right">
                    <?php echo Yii::$app->formatter->asDate(
                        $model->blogs->updated_at,
                        'long'
                    ) ?>
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="blog">
                <div class="col-md-12">
                    <h4>Категории:</h4>
                </div>
                <?php foreach ($categories->categories as $key => $category) : ?>
                    <div class="col-md-12">
                        <?php echo Html::a(
                            $category->tag,
                            ["base/search", "tag" => $category->tag]
                        ) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>