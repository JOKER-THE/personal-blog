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
use application\entities\Category;
use application\grid\ArrayGrid;

/**
 * CategoryController implements the CRUD actions
 *
 * @category Application
 * @package  Controller_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class CategoryController extends Controller
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
     * @param array     $config    configure of project
     */
    public function __construct($id, $module, ArrayGrid $arrayGrid, $config = [])
    {
        $this->arrayGrid = $arrayGrid;
        parent::__construct($id, $module, $config);
    }

    /**
     * Lists all Category
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Category();
        $dataProvider = $this->arrayGrid->getProvider($model->categories);

        return $this->render(
            'index',
            [
                'model' => $model,
                'dataProvider' => $dataProvider
            ]
        );
    }

    /**
     * Displays a single Category
     *
     * @param integer $id unique category ID
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new Category($id);

        return $this->render(
            'view',
            [
                'model' => $model
            ]
        );
    }

    /**
     * Creates a new Category
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $repository = $model->repository;

        if ($repository->load(Yii::$app->request->post()) && $repository->save()) {
            return $this->redirect(['view', 'id' => $repository->id]);
        }

        return $this->render(
            'create',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Updates an existing Category
     * If update is successful, the browser will be redirected to the 'view' page
     *
     * @param integer $id unique category Id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new Category($id);
        $repository = $model->repository->findOne($id);

        if ($repository->load(Yii::$app->request->post()) && $repository->save()) {
            return $this->redirect(['view', 'id' => $repository->id]);
        }

        return $this->render(
            'update',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Deletes an existing Category
     * If deletion is successful, the browser will be redirected to the 'index' page
     *
     * @param integer $id unique category Id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = new Category($id);
        $model = $model->repository->findOne($id);
        $model->delete();
        
        return $this->redirect(['index']);
    }
}
