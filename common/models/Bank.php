<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "BANK".
 *
 * @property double $ID_BANK
 * @property string $NAMA
 *
 * @property NASABAH[] $nASABAHs
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'BANK';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA'], 'required'],
            [['NAMA'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_BANK' => 'ID Bank',
            'NAMA' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNasabah()
    {
        return $this->hasMany(Nasabah::className(), ['BANK_ID' => 'ID_BANK']);
    }
}
