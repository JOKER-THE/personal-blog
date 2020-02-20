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

$this->title = 'Добавить проект';
?>
<div class="create">

    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>