<?php

/**
 * Entity
 * php version 7.2.22
 *
 * @category Entity
 * @package  Entity_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\entities;

use application\services\ProjectService;

/**
 * Project entity
 *
 * @category Application
 * @package  Entity_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 *
 * @property string $name
 * @property string $url
 * @property string $git
 * @property string $image
 * @property string $description
 */
class Project
{
    /**
     * Object of ProjectService
     *
     * @var object $service
     */
    protected $service;

    /**
     * Concrete project
     *
     * @var object $project
     */
    public $project;

    /**
     * Get projects
     *
     * @param integer $id project's unique ID
     */
    public function __construct($id = '')
    {
        $this->service = new ProjectService();
        $this->project = $this->service->get($id);
    }
}
