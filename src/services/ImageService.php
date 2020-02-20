<?php

/**
 * Service
 * php version 7.2.22
 *
 * @category Service
 * @package  Service_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\services;

use Yii;

/**
 * ImageService
 *
 * @category Application
 * @package  Service_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class ImageService
{
    /**
     * Upload images from /public_html/img/
     *
     * @param object $file file
     * @param string $dir  directory
     *
     * @return string $name
     */
    public function upload($file, $dir)
    {
        $name = 'img_' . time() . '.' . $file->extension;
        $file->saveAs(
            Yii::getAlias('@app') . '/public_html/img/' . $dir . '/' . $name
        );
        return $name;
    }
}
