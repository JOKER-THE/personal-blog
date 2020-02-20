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

use application\repositories\ProjectRepository;

/**
 * ProjectService
 *
 * @category Application
 * @package  Service_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class ProjectService
{
    /**
     * Object of ProjectRepository
     *
     * @var object $repository
     */
    protected $repository;

    /**
     * Create object ProjectRepository
     */
    public function __construct()
    {
        $this->repository = new ProjectRepository();
    }

    /**
     * Get projects in database
     *
     * @param integer $id project's unique ID
     *
     * @return object
     */
    public function get($id = '')
    {
        if (empty($id)) {
            return $this->repository->find()->all();
        } else {
            return $this->repository->find()->where(['id' => $id])->one();
        }
    }

    /**
     * Save project
     *
     * @param object $project project
     *
     * @return void
     */
    public function save(object $project)
    {
        $this->repository->name = $project->name;
        $this->repository->git = $project->git;
        $this->repository->url = $project->url;
        $this->repository->image = $project->image;
        $this->repository->description = $project->description;
        $this->repository->save();
    }

    /**
     * Update project
     *
     * @param integer $id      project unique ID
     * @param array   $data    project attributes
     * @param object  $project project
     *
     * @return void
     */
    public function update($id, $data, $project)
    {
        $data = $data["ProjectRepository"];

        $model = $this->repository->findOne($id);
        $model->name = $data["name"] ?? $project->name;
        $model->git = $data["git"] ?? $project->git;
        $model->url = $data["url"] ?? $project->url;
        $model->image = $data["image"] ?? $project->image;
        $model->description = $data["description"]
            ?? $project->description;

        $model->save();
    }

    /**
     * Delete project
     *
     * @param integer $id unique project's id
     *
     * @return void
     */
    public function delete($id)
    {
        $model = $this->repository->findOne($id);
        $model->delete($id);
    }
}
