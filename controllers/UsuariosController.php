<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Usuarios;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\filters\VerbFilter;
use app\models\UsuariosSearch;
use app\controllers\FileUploader;
use yii\web\NotFoundHttpException;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
{
    /**
     * @inheritDoc
     */
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
    }

    /**
     * Lists all Usuarios models.
     *
     * @return string
     */
    public function actionIndex($pendiente)
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $pendiente);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
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
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuarios();
        // $upload = new UploadForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // $model->imagen = UploadedFile::getInstance($model, 'imagen');
                // if ($upload->upload()) {
                //     var_dump("hola");
                //     die();
                // }
                if ($model->save())
                    return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuarios model.
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
                // $lastImagen = $model->imagen;
                // GUARDAMOS EL NOMBRE DE LA IMAGEN
                $model->imagen = $model->imagen = "IMGa_" . $model->id . "." . $fileUpload->extension;

                // SI SE GUARDA CORRECTAMENTE EL MODELO
                if ($model->save()) {
                    $path = Yii::$app->getBasePath(false) . '\..\upload\\';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                    }

                    // SUBIMOS LA IMAGEN
                    $fileUpload->saveAs($path . $model->imagen);
                    // LA LINEA DE ABAJO SIRVE PARA BORRAR EN CASO DE TENER NOMBRES DIFERENTES
                    // unlink(Yii::$app->getBasePath(false) . '\IMG\\' . $lastImagen);
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
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
