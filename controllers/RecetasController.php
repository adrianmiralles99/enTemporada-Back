<?php

namespace app\controllers;

use Yii;
use app\models\Recetas;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\RecetasSearch;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * RecetasController implements the CRUD actions for Recetas model.
 */
class RecetasController extends Controller
{
    /**
     * @inheritDoc
     */
    /*
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }*/
    public function behaviors()
    {
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','delete','update', 'index', 'view'],
                'rules' => [
                    ['allow' => true,
                     'actions' => ['create', 'delete', 'update', 'index', 'view'],
                     'matchCallback' => function ($rule, $action) {
                                            if (!Yii::$app->user->isGuest){
                                                return Yii::$app->user->identity->hasRole('A');

                                            }
                                        }
 
                    ],
                    ['allow' => false,
                    'actions' => ['create', 'delete', 'update', 'index', 'view'],
                    'matchCallback' => function ($rule, $action) {
                                           return !Yii::$app->user->isGuest;
                                        }
 
                    ],
 
                ],
            ],
        ];
    }

    /**
     * Lists all Recetas models.
     *
     * @return string
     */
    public function actionIndex($pendiente = null)
    {   
        
        $searchModel = new RecetasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $pendiente);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recetas model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Recetas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Recetas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $fileUpload = UploadedFile::getInstance($model, 'eventImage');
                if (!empty($fileUpload)) {
                    $model->imagen = "IMG_REC_" . rand() . "." . $fileUpload->extension;
                }
                if ($model->save()) {
                    $path = realpath(dirname(getcwd())) . '/../assets/IMG/recetas/';
                    $fileUpload->saveAs($path . $model->imagen);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Recetas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'eventImage');
            if (!empty($fileUpload)) {
                // GUARDAMOS EL NOMBRE DE LA IMAGEN
                $lastImagen =  $model->imagen;
                $model->imagen = "IMG_REC_" . rand() . "." . $fileUpload->extension;

                // SI SE GUARDA CORRECTAMENTE EL MODELO
                if ($model->save()) {
                    $path = realpath(dirname(getcwd())) . '/../assets/IMG/recetas/';
                    // LA LINEA DE ABAJO SIRVE PARA BORRAR EN CASO DE TENER NOMBRES DIFERENTES
                    if (file_exists($path . $lastImagen)) {
                        unlink($path . $lastImagen);
                    }
                    // SUBIMOS LA IMAGEN
                    $fileUpload->saveAs($path . $model->imagen);

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Recetas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $path = realpath(dirname(getcwd())) . '/../../assets/IMG/recetas/';
        $model = $this->findModel($id);
        if (file_exists($path . $model->imagen)) {
            unlink($path . $model->imagen);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recetas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Recetas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recetas::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La actual receta no existe');
    }
}
