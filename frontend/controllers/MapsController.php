<?php

namespace frontend\controllers;

use Yii;
use common\models\Category;
use common\models\Hotel;
use backend\models\HotelSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\filters\VerbFilter;

class MapsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Hotel::find();
        $searchModel = new HotelSearch();
 
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Hotel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
