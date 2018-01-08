<?php

namespace frontend\controllers;

use Yii;
use common\models\TransaksiPemesanan;
use common\models\KreditLayanan;
use common\models\TambahLayanan;
use backend\models\TambahLayananSearch;
use common\models\Layanan;
use backend\models\LayananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

/**
 * TambahLayananController implements the CRUD actions for TambahLayanan model.
 */
class TambahLayananController extends Controller
{
        public function actionCetaktambahlayanan($id) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = TambahLayanan::find();
        $models = $query
        ->where(['ID_TAMBAHLAYANAN' => $id])
        ->all();

        $content =  $this->render('cetaktambahlayanan',[
            'models' => $models,
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
             // call mPDF methods on the fly
            'options' => [
                'title' => 'Orlando.com'
            ],
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
        
        $query = KreditLayanan::find();
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

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionPembayarankredit($id)
    {
        $pesanan = $this->findModel($id);
        $model = new KreditLayanan();
        $model->KETERANGAN = $pesanan->ID_TAMBAHLAYANAN;
        $model->NOMINAL = $pesanan->HARGA;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewkredit', 'id' => $model->ID_KREDIT]);
        } else {
            return $this->render('pembayarankredit', [
                'model' => $model,
                'pesanan' => $pesanan,
            ]);
        }
    }

    public function actionPembayarantransfer($id)
    {
        $model = $this->findModel($id);

        return $this->render('pembayarantransfer', [
                'model' => $model,
            ]);
    }

    /**
     * Lists all TambahLayanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TambahLayananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all TambahLayanan models.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new TambahLayananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search', [
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
     * Creates a new TambahLayanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $transaksi = $this->findModeltransaksi($id);
        $model = new TambahLayanan();
        $model->TANGGAL = date("d-M-y");
        $model->TRANSAKSI_ID = $transaksi->PEMESANAN_ID;
        $model->STATUS = 'Belum Dibayar';
        $model->NO_KAMAR = $transaksi->NO_KAMAR;
        $data = Yii::$app->request->post();
            if (!empty($data)) {
            $data['TambahLayanan']['NAMA_LAYANAN']=implode(", ", $data['TambahLayanan']['NAMA_LAYANAN']);
        }

        $searchModel = new LayananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_TAMBAHLAYANAN]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Deletes an existing TambahLayanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param double $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TambahLayanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return TambahLayanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TambahLayanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the TambahLayanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return TambahLayanan the loaded model
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
        if (($model = KreditLayanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
