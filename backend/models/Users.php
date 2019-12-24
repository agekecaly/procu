<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $emil_address
 * @property string $username
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emil_address', 'username', 'password'], 'required'],
            [['emil_address'], 'string', 'max' => 30],
            [['username', 'password'], 'string', 'max' => 20],
            [['emil_address'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emil_address' => 'Emil Address',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
