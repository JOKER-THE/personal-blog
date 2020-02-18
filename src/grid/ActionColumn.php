<?php

/**
 * Grid
 * php version 7.2.22
 *
 * @category Grid
 * @package  Grid_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\grid;

use Yii;
use yii\bootstrap4\Html;
use yii\grid\ActionColumn as Column;

/**
 * ActionColumn
 *
 * @category Application
 * @package  Grid_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class ActionColumn extends Column
{
    /**
     * Init Default Buttons
     *
     * @return string
     */
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                return Html::a(
                    '<span class="glyphicon glyphicon-eye-open"></span>',
                    Yii::$app->controller->id . '/view?id=' . $model->id
                );
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                return Html::a(
                    '<span class="glyphicon glyphicon-pencil"></span>',
                    Yii::$app->controller->id . '/update?id=' . $model->id
                );
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge(
                    [
                        'data-confirm' => Yii::t(
                            'yii',
                            'Are you sure you want to delete this item?'
                        ),
                        'data-method' => 'post',
                        'data-pjax' => '0'
                    ],
                    $this->buttonOptions
                );
                return Html::a(
                    '<span class="glyphicon glyphicon-trash"></span>',
                    Yii::$app->controller->id . '/delete?id=' . $model->id,
                    $options
                );
            };
        }
    }
}
