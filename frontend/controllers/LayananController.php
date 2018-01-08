<?php

namespace frontend\controllers;

use Yii;
use common\models\Layanan;
use backend\models\LayananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TambahLayananController implements the CRUD actions for TambahLayanan model.
 */
class LayananController extends Controller
{   /**
     * Lists all TambahLayanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LayananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TambahLayanan model.
     * @param double $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Layanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
