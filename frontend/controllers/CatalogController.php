<?php

namespace frontend\controllers;

use Yii;
use common\models\Hotel;
use backend\models\HotelSearch;
use backend\models\HotelBaruSearch;
use common\models\Kamar;
use common\models\Pemesanan;
use common\models\FasilitasHotel;
use common\models\keteranganLokasi;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CatalogController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionList($id = null)
    {
        $hotelQuery = Hotel::find();
        $searchModel = new HotelBaruSearch();
 
        $dataProvider = new ActiveDataProvider([
            'query' => $hotelQuery,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=12;

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionMenu($id = null)
    {
        $hotelQuery = Hotel::find();
        $searchModel = new HotelBaruSearch();
 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('menu', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $hotel = Kamar::find()->where(['HOTEL_ID' => $model->ID_HOTEL]);
        $fasilitas = FasilitasHotel::find()->where(['HOTEL_ID' => $model->ID_HOTEL]);
        $keterangan = keteranganLokasi::find()->where(['HOTEL_ID' => $model->ID_HOTEL]);
        $dataProvider = new ActiveDataProvider([
            'query' => $hotel,
        ]);
        $dataProvider1 = new ActiveDataProvider([
            'query' => $fasilitas,
        ]);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $keterangan,
        ]);

        return $this->render('view', [
            'model' => $model,
            'hotel' => $hotel,
            'fasilitas' => $fasilitas,
            'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1,   
            'dataProvider2' => $dataProvider2,
        ]);
    }

    public function actionViewkamar($id)
    {
        return $this->render('/kamar/view', [
            'model' => $this->findModelkamar($id),
        ]);
    }

    public function actionOrder($id)
    {
        $order = $this->findModelkamar($id);
        $model = new Pemesanan();
        $model->KAMAR_ID = $order->ID_KAMAR;
        $model->ID_PEMESANAN = date('dmythis').$model->ID_PEMESANAN;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pemesanan/view', 'id' => $model->ID_PEMESANAN]);
        } else {
            return $this->render('order', [
                'order' => $order,
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Hotel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelkamar($id)
    {
        if (($model = Kamar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
