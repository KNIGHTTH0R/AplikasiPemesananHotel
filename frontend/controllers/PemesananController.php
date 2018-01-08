<?php

namespace frontend\controllers;

use Yii;
use common\models\Pemesanan;
use common\models\Kredit;
use common\models\Nasabah;
use common\models\TransaksiPemesanan;
use frontend\models\PemesananSearch;
use backend\models\NasabahSearch;
use backend\models\TransaksiPemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

/**
 * PemesananController implements the CRUD actions for Pemesanan model.
 */
class PemesananController extends Controller
{
    /**
     * Updates an existing Wilayah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param double $id
     * @return mixed
     */
    public function actionUpdatestatus($id)
    {
        $model = $this->findModel($id);
        $model->STATUS = 'Canceled';

        $model->load(Yii::$app->request->post());
        $model->save();
        return $this->redirect(['view', 'id' => $model->ID_PEMESANAN]);

    }

    public function actionCetaktransaksi($id) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = TransaksiPemesanan::find();
        $models = $query
        ->where(['PEMESANAN_ID' => $id,])
        ->all();

        $content =  $this->render('cetaktransaksi',[
            'models' => $models,
            'model' => $this->findModeltransaksi($id),
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content, 
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',

            'options' => [
                'title' => 'Orlando.com'
            ],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['PEMESANAN HOTEL ORLANDO.COM'],
                'SetFooter'=>['ORLANDO.COM'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionCetakkredit($id) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = Kredit::find();
        $models = $query
        ->where(['ID_KREDIT' => $id,])
        ->all();

        $content =  $this->render('cetakkredit',[
            'models' => $models,
            'model' => $this->findModelkredit($id),
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content, 
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',

            'options' => [
                'title' => 'Orlando.com'
            ],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['PEMESANAN HOTEL ORLANDO.COM'],
                'SetFooter'=>['ORLANDO.COM'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionCetakpemesanan($id) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = Pemesanan::find();
        $models = $query
        ->where(['ID_PEMESANAN' => $id,])
        ->all();

        $content =  $this->render('cetakpemesanan',[
            'models' => $models,
            'model' => $this->findModel($id),
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content, 
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',

            'options' => [
                'title' => 'Orlando.com'
            ],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['PEMESANAN HOTEL ORLANDO.COM'],
                'SetFooter'=>['ORLANDO.COM'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPembayarantransfer($id)
    {
        $model = $this->findModel($id);

        return $this->render('menutransfer', [
                'model' => $model,
            ]);
    }

    public function actionLogintransaksi()
    {
        $searchModel = new TransaksiPemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/pelayanan/loginpelayanan', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionTampilpelayanan()
    {
        $searchModel = new TransaksiPemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/pelayanan/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionPembayarankredit($id)
    {
        $pesanan = $this->findModel($id);
        $model = new Kredit();
        $model->KETERANGAN = $pesanan->ID_PEMESANAN;
        $model->NOMINAL = $pesanan->kamar->HARGA*$pesanan->JUMLAH_HARI*$pesanan->JUMLAH_KAMAR;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewkredit', 'id' => $model->ID_KREDIT]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'pesanan' => $pesanan,
            ]);
        }
    }

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionViewsetelahkredit($id)
    {
        return $this->render('viewsetelahkredit', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Pemesanan model.
     * @param double $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Pemesanan model.
     * @param double $id
     * @return mixed
     */
    public function actionCektransaksi($id)
    {
        return $this->render('hasiltransaksi', [
            'model' => $this->findModeltransaksi($id),
        ]);
    }

    /**
     * Displays a single Pemesanan model.
     * @param double $id
     * @return mixed
     */
    public function actionViewkredit($id)
    {
        return $this->render('viewkredit', [
            'model' => $this->findModelkredit($id),
        ]);
    }

    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pemesanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModeltransaksi($id)
    {
        if (($model = TransaksiPemesanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelkredit($id)
    {
        if (($model = Kredit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelnasabah($id)
    {
        if (($model = Nasabah::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
