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
namespace application\entities\blog;

use application\services\BlogService;
use application\services\ImageService;
use yii\web\UploadedFile;

/**
 * Blog entity
 *
 * @category Application
 * @package  Entity_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 *
 * @property integer $id
 * @property string $title
 * @property text $description
 * @property string $image
 * @property text $text
 * @property integer $created_at
 * @property integer $update_at
 */
class Blog extends \yii\base\Model
{
    /**
     * Object of BlogService
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
     * Objects of Blogs
     *
     * @var object $blogs
     */
    public $blogs;

    /**
     * Paginator
     *
     * @var object $pages
     */
    public $pages;

    /**
     * Blog's title
     *
     * @var string $title
     */
    public $title;

    /**
     * Blog's description
     *
     * @var string $description
     */
    public $description;

    /**
     * Blog's image
     *
     * @var string $image
     */
    public $image;

    /**
     * Blog's text
     *
     * @var string $text
     */
    public $text;

    /**
     * Blog's image
     *
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * Get blogs
     *
     * @param integer $id       blog's unique ID
     * @param integer $pageSize count blog on page
     */
    public function __construct($id = '', $pageSize = 3)
    {
        $this->service = new BlogService();
        $this->imgServ = new ImageService();
        $blogs = $this->service->get($id, $pageSize);
        $this->blogs = $blogs->blogs;
        $this->pages = $blogs->pages;
    }

    /**
     * Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'description', 'text'], 'required'],
            [['image'], 'string'],
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
            'title' => 'Title',
            'text' => 'Text',
            'image' => 'Image',
            'file' => 'Image',
            'description' => 'Description'
        ];
    }

    /**
     * Save blog
     *
     * @return void
     */
    public function save()
    {
        $file = UploadedFile::getInstance($this, 'file');
        $this->image = $this->imgServ->upload($file, 'blog/title');
        $this->service->save($this);
    }

    /**
     * Update blog
     *
     * @param integer $id   blog unique ID
     * @param array   $data blog attributes
     * @param object  $blog blog
     *
     * @return void
     */
    public function update($id, $data, $blog)
    {
        $file = UploadedFile::getInstance($blog, 'file');

        if (!empty($file)) {
            $data["BlogRepository"]["image"] = $this->imgServ->upload(
                $file,
                'blog/title'
            );
        }

        $this->service->update($id, $data, $blog);
    }

    /**
     * Delete blog
     *
     * @param integer $id unique blog's id
     *
     * @return void
     */
    public function delete($id)
    {
        $this->service->delete($id);
    }
}
