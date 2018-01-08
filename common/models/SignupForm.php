<?php
namespace common\models;

use common\models\Users;
use yii\base\Model;
use Yii;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $USERNAME;
    public $PASSWORD;
    public $EMAIL;
    public $ROLE;
    public $AUTH_KEY;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['USERNAME', 'filter', 'filter' => 'trim'],
            ['USERNAME', 'required'],
            ['USERNAME', 'string', 'min' => 2, 'max' => 255],

            ['PASSWORD', 'required'],
            ['PASSWORD', 'string', 'min' => 6],

            ['EMAIL', 'required'],

            ['ROLE', 'number'],

            ['AUTH_KEY', 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new Users();
            $user->USERNAME = $this->USERNAME;
            $user->PASSWORD = $this->PASSWORD;
            $user->generateAuthKey();
            $user->NAMA = $this->NAMA;
            $user->EMAIL = $this->EMAIL;
            $user->ROLE = $this->ROLE;
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
