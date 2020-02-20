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
use application\entities\Project;
use application\grid\ArrayGrid;

/**
 * ProjectController implements the CRUD actions
 *
 * @category Application
 * @package  Controller_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class ProjectController extends Controller
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
     * Lists all Project
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Project();
        $dataProvider = $this->arrayGrid->getProvider($model->project);

        return $this->render(
            'index',
            [
                'model' => $model,
                'dataProvider' => $dataProvider
            ]
        );
    }

    /**
     * Displays a single Project
     *
     * @param integer $id unique project ID
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new Project($id);

        return $this->render(
            'view',
            [
                'model' => $model
            ]
        );
    }

    /**
     * Creates a new Project
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

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
     * Deletes an existing Project
     * If deletion is successful, the browser will be redirected to the 'index' page
     *
     * @param integer $id unique project Id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = new Project($id);
        $model->delete($id);
        
        return $this->redirect(['index']);
    }
}
