<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $ID_USER;
    public $USERNAME;
    public $PASSWORD;
    public $EMAIL;
    public $AUTH_KEY;
    public $ACCESSTOKEN;
    public $ROLE;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USERS';
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //mencari user login berdasarkan accessToken dan hanya dicari 1.
        $user = Users::find()->where(['ACCESSTOKEN'=>$token])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public function getAuthKey()
    {
        return $this->AUTH_KEY;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->AUTH_KEY = Yii::$app->security->generateRandomString();
    }

    public static function findIdentity($ID_USER)
    {
        //mencari user login berdasarkan IDnya dan hanya dicari 1.
        $user = Users::findOne($ID_USER); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public static function findByUsername($USERNAME)
    {
        //mencari user login berdasarkan username dan hanya dicari 1.
        $user = Users::find()->where(['USERNAME'=>$USERNAME])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public function getId()
    {
        return $this->ID_USER;
    }

    public function validatePassword($PASSWORD)
    {
        return $this->PASSWORD === $PASSWORD;
    }
}
