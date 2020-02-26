<?php

/**
 * Error page
 * php version 7.2.22
 *
 * @category View
 * @package  View_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */

use yii\helpers\Html;

$this->title = $name;
?>

<section id="error">
    <div class="row">
        <div class="col-md-6">
            <h1><?php echo Html::encode($this->title) ?></h1>
            <div class="alert alert-danger">
                <?php echo nl2br(Html::encode($message)) ?>
            </div>
        </div>
    </div>
</section>