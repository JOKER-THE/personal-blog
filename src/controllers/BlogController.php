<?php

/**
 * Controller
 * php version 7.2.22
 *
 * @category Controller
 * @package  Controller_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
namespace application\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use application\entities\blog\Blog;
use application\grid\ArrayGrid;

/**
 * BlogController implements the CRUD actions
 *
 * @category Application
 * @package  Controller_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class BlogController extends Controller
{
    /**
     * Protected ArrayGrid variable
     */
    protected $arrayGrid;

    /**
     * Page layout
     *
     * @var string $layout url to layout
     */
    public $layout = '@application/views/layouts/page.layout.php';
    
    /**
     * Behaviors. AccessControll & VerbFilter
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
    }

    /**
     * Using arrayGrid component
     *
     * @param string    $id        controllers name
     * @param object    $module    controllers object
     * @param ArrayGrid $arrayGrid object grid
     * @param array     $config    configure of blog
     */
    public function __construct($id, $module, ArrayGrid $arrayGrid, $config = [])
    {
        $this->arrayGrid = $arrayGrid;
        parent::__construct($id, $module, $config);
    }

    /**
     * Lists all Blog
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Blog($id = '', $pageSize = 10);
        $dataProvider = $this->arrayGrid->getProvider($model->blogs);

        return $this->render(
            'index',
            [
                'model' => $model,
                'dataProvider' => $dataProvider
            ]
        );
    }

    /**
     * Displays a single Blog
     *
     * @param integer $id unique Blog ID
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new Blog($id);

        return $this->render(
            'view',
            [
                'model' => $model
            ]
        );
    }

    /**
     * Creates a new Blog
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render(
            'create',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Updates an existing Blog
     * If update is successful, the browser will be redirected to the 'view' page
     *
     * @param integer $id unique blog Id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new Blog($id);
        $blog = $model->blogs;
        $data = Yii::$app->request->post();

        if (!empty($data)) {
            $model->update($id, $data, $blog);
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render(
            'update',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Deletes an existing Blog
     * If deletion is successful, the browser will be redirected to the 'index' page
     *
     * @param integer $id unique blog Id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = new Blog($id);
        $model->delete($id);
        
        return $this->redirect(['index']);
    }
}
