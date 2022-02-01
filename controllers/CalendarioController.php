<?php

namespace app\controllers;

use app\models\Calendario;
use app\models\CalendarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CalendarioController implements the CRUD actions for Calendario model.
 */
class CalendarioController extends Controller
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
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Calendario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CalendarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Calendario model.
     * @param int $id_calendario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_calendario)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_calendario),
        ]);
    }

    /**
     * Creates a new Calendario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Calendario();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_calendario' => $model->id_calendario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Calendario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_calendario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_calendario)
    {
        $model = $this->findModel($id_calendario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_calendario' => $model->id_calendario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Calendario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_calendario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_calendario)
    {
        $this->findModel($id_calendario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Calendario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_calendario
     * @return Calendario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_calendario)
    {
        if (($model = Calendario::findOne(['id_calendario' => $id_calendario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
