<?php

/**
 * Portfolio page
 * php version 7.2.22
 *
 * @category View
 * @package  View_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */

use yii\bootstrap4\Modal;

$this->title = 'Портфолио';
?>

<section>
    <div class="row row-flex">
        <?php foreach ($model->project as $key => $project) : ?>
            <div class="col-md-4 project">

                <?php Modal::begin(
                    [
                        'toggleButton' => [
                            'tag' => 'img',
                            'src' => '/img/project/' . $project->image,
                            'class' => 'project-img'
                        ]
                    ]
                );
                ?>
                
                <img class="img" src="/img/project/<?php echo $project->image ?>">

                <?php Modal::end(); ?>
                
                <p><strong><?php echo $project->name ?></strong></p>
                <p><?php echo $project->description ?></p>

                <div class="button-block">
                    <?php if (!empty($project->url)) : ?>
                        <a type="button" class="btn btn-outline-dark btn-block"
                        href="<?php echo $project->url ?>">Перейти</a>
                    <?php endif; ?>

                    <?php if (!empty($project->git)) : ?>
                        <a type="button" class="btn btn-dark btn-block"
                        href="<?php echo $project->git ?>">Github</a>
                    <?php endif; ?>
                </div>
                
            </div>
        <?php endforeach; ?>
    </div>
</section>