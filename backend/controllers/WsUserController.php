<?php
namespace backend\controllers;

use Yii;
use common\models\Users;
use common\models\LoginForm;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;
 
class WsUserController extends \yii\rest\Controller
{
    protected function verbs()
    {
       return [
           //'login' => ['POST'],
       ];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin(){
    $model = new LoginForm();
    if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
        return [
        'username' => Yii::$app->user->identity->USERNAME,
        //'password' => Yii::$app->user->identity->PASSWORD,
        'access_token' => Yii::$app->user->identity->getAuthKey()
        ];
    } else {
        $model->validate();
        return $model;
    }
}
 
    public function actionIndex(){
        $model = Users::find()->all();
        return [
            'user'=>Yii::$app->user->identity,
            'data'=>$model,
        ];
    }

    public function actionView($id)
    {   
        $result = $this->findModel($id);

        return $result;
    }

    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}