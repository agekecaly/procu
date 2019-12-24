<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "county".
 *
 * @property int $id
 * @property int $code
 * @property string $name
 * @property string $region
 */
class County extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'county';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name', 'region'], 'required'],
            [['id', 'code'], 'integer'],
            [['name', 'region'], 'string', 'max' => 30],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'region' => 'Region',
        ];
    }
}
