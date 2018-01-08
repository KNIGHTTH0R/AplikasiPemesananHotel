<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "USERS".
 *
 * @property double $ID_USER
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $EMAIL
 * @property double $ROLE
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USERS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERNAME', 'PASSWORD', 'EMAIL','AUTH_KEY'], 'required'],
            [['ROLE'], 'number'],
            [['USERNAME'], 'string', 'max' => 50],
            [['PASSWORD'], 'string', 'max' => 100],
            [['EMAIL'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_USER' => 'Id  User',
            'USERNAME' => 'Username',
            'PASSWORD' => 'Password',
            'AUTH_KEY' => 'Auth Key',
            'EMAIL' => 'Email',
            'ROLE' => 'Role',
        ];
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
}
