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

$this->title = 'Обновить статью: ' . $model->blogs->title;
?>
<div class="update">

    <?php echo $this->render(
        '_form',
        [
            'model' => $model->blogs,
        ]
    ) ?>

</div>