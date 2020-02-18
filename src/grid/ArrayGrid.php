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

use yii\data\ArrayDataProvider;

/**
 * ArrayGrid
 *
 * @category Application
 * @package  Grid_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class ArrayGrid
{
    /**
     * Used Array Data Provider
     *
     * @param object $model model for dataProvider
     *
     * @return yii\data\ArrayDataProvider;
     */
    public function getProvider($model)
    {
        $dataProvider = new ArrayDataProvider(
            [
                'allModels' => $model,
                'pagination' => [
                    'pageSize' => 10
                ]
            ]
        );

        return $dataProvider;
    }
}
