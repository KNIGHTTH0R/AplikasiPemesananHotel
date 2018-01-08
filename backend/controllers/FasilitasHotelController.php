<?php

namespace backend\controllers;

use Yii;
use common\models\FasilitasHotel;
use backend\models\FasilitasHotelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
/**
 * FasilitasHotelController implements the CRUD actions for FasilitasHotel model.
 */
class FasilitasHotelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionUpdategambar($id)
    {
        $model = $this->findModel($id);
        $tmpgambar = $model->GAMBAR;
        if ($model->load(Yii::$app->request->post())) {
            
            $model->GAMBAR = UploadedFile::getInstance($model, 'GAMBAR');
            
            if(!$model->GAMBAR==NULL){
                //save file
                $unik = $model->ID_FASILITAS;
                $namafile = $model->GAMBAR->baseName.$unik;
                $extensi = $model->GAMBAR->extension;
            
                $model->GAMBAR->saveAs(Url::to('@common/uploads/fasilitas/') .$namafile.'.'.$extensi);
                $model->GAMBAR = $namafile.'.'.$extensi;
            } else {
                if($tmpgambar!=NULL) $model->GAMBAR = $tmpgambar;
            }
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->ID_FASILITAS]);
        } else {
            return $this->render('updategambar', [
                'model' => $model,
            ]);
        }
    }

    public function actionCetakfasilitashotel() {
 
        // get your HTML raw content without any layouts or scripts
        
        $searchModel = new FasilitasHotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $content =  $this->render('cetakfasilitashotel',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
     * Lists all FasilitasHotel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FasilitasHotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=5;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FasilitasHotel model.
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
     * Creates a new FasilitasHotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FasilitasHotel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_FASILITAS]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FasilitasHotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param double $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_FASILITAS]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FasilitasHotel model.
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
     * Finds the FasilitasHotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return FasilitasHotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FasilitasHotel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
