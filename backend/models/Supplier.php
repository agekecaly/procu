<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property string $name
 * @property string $email_address
 * @property string $company
 * @property string $company_url
 * @property string $date_of_application
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email_address', 'company', 'company_url', 'date_of_application'], 'required'],
            [['date_of_application'], 'safe'],
            [['name', 'company', 'company_url'], 'string', 'max' => 30],
            [['email_address'], 'string', 'max' => 20],
            [['email_address'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email_address' => 'Email Address',
            'company' => 'Company',
            'company_url' => 'Company Url',
            'date_of_application' => 'Date Of Application',
        ];
    }
}
