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

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Блог';
?>

<section id="blog">
    <div class="row">
        <div class="col-md-9">
            <?php foreach ($model->blogs as $key => $blog) : ?>
                <div class="blog">
                    <?php if (!empty($blog->image)) : ?>
                        <p><img class="img"
                            src="/img/blog/title/<?php echo $blog->image ?>"></p>
                    <?php endif; ?>
                    <h3>
                    <?php echo Html::a(
                        $blog->title,
                        ["base/view", "id" => $blog->id]
                    )?>
                    </h3>
                    <p><?php echo $blog->description ?></p>
                    <p>
                    <?php echo Html::a(
                        "Читать далее...",
                        ["base/view", "id" => $blog->id]
                    )?>
                    </p>
                    <p class="text-right">
                    <?php echo Yii::$app->formatter->asDate(
                        $blog->updated_at,
                        'long'
                    )?>
                    </p>
                </div>
            <?php endforeach; ?>
            <?php echo
                LinkPager::widget(
                    [
                       'pagination' => $model->pages
                    ]
                );
            ?>
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