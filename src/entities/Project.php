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
use application\services\ImageService;
use yii\web\UploadedFile;

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
class Project extends \yii\base\Model
{
    /**
     * Object of ProjectService
     *
     * @var object $service
     */
    protected $service;

    /**
     * Object of ImageService
     *
     * @var object $image
     */
    protected $imgServ;

    /**
     * Concrete project
     *
     * @var object $project
     */
    public $project;

    /**
     * Project's name
     *
     * @var string $name
     */
    public $name;

    /**
     * Project's url
     *
     * @var string $url
     */
    public $url;

    /**
     * Project's git
     *
     * @var string $git
     */
    public $git;

    /**
     * Project's description
     *
     * @var string $description
     */
    public $description;

    /**
     * Project's image
     *
     * @var string $image
     */
    public $image;

    /**
     * Project's image
     *
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * Get projects
     *
     * @param integer $id project's unique ID
     */
    public function __construct($id = '')
    {
        $this->service = new ProjectService();
        $this->imgServ = new ImageService();
        $this->project = $this->service->get($id);
    }

    /**
     * Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['url', 'git', 'image'], 'string'],
            [['file'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    /**
     * Get attribute
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'URL',
            'git' => 'Github',
            'image' => 'Image',
            'file' => 'Image',
            'description' => 'Description'
        ];
    }

    /**
     * Save project
     *
     * @return void
     */
    public function save()
    {
        $file = UploadedFile::getInstance($this, 'file');
        $this->image = $this->imgServ->upload($file, 'project');
        $this->service->save($this);
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
        $file = UploadedFile::getInstance($project, 'file');

        if (!empty($file)) {
            $data["ProjectRepository"]["image"] = $this->imgServ->upload(
                $file,
                'project'
            );
        }

        $this->service->update($id, $data, $project);
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
        $this->service->delete($id);
    }
}
