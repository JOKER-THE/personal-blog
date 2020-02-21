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
use yii\data\ActiveDataProvider;
use application\repositories\BlogTagRepository;
use application\repositories\BlogRepository;
use application\repositories\TagRepository;

/**
 * TagController implements the CRUD actions
 *
 * @category Application
 * @package  Controller_Folder
 * @author   Pavel Rodionov aka JOKER-THE <pavel11_06@mail.ru>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://localhost
 */
class TagController extends Controller
{
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
     * Lists all Blog and Tag
     *
     * @param integer $id unique Blog ID
     *
     * @return mixed
     */
    public function actionIndex($id)
    {
        $model = BlogTagRepository::find()
            ->with('blog')
            ->with('tag')
            ->where(['blog_id' => $id]);
            
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $model
            ]
        );

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider
            ]
        );
    }

    /**
     * Displays a single Tag & Blog
     *
     * @param integer $id unique Tag & Blog ID
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = BlogTagRepository::find()
            ->with('blog')
            ->with('tag')
            ->where(['id' => $id])
            ->one();

        return $this->render(
            'view',
            [
                'model' => $model
            ]
        );
    }

    /**
     * Creates a new Tag & Blog
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlogTagRepository();
        $tag = TagRepository::find()->all();
        $blog = BlogRepository::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render(
            'create',
            [
                'model' => $model,
                'tag' => $tag,
                'blog' => $blog
            ]
        );
    }

    /**
     * Updates an existing Tag & Blog
     * If update is successful, the browser will be redirected to the 'view' page
     *
     * @param integer $id unique Tag & Blog Id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = BlogTagRepository::findOne($id);
        $tag = TagRepository::find()->all();
        $blog = BlogRepository::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render(
            'create',
            [
                'model' => $model,
                'tag' => $tag,
                'blog' => $blog
            ]
        );
    }

    /**
     * Deletes an existing Tag & Blog
     * If deletion is successful, the browser will be redirected to the 'index' page
     *
     * @param integer $id unique Tag & Blog Id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = BlogTagRepository::findOne($id);
        $model->delete();

        return $this->redirect(['index']);
    }
}
