<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property integer $id
 * @property integer $rest_id
 * @property string $restaurant
 * @property string $address1
 * @property string $phone1
 * @property string $notes
 * @property string $neighborhood
 *
 * @property Restaurant $rest
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rest_id'], 'required'],
            [['id', 'rest_id'], 'integer'],
            [['restaurant', 'address1', 'phone1', 'notes', 'neighborhood'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rest_id' => 'Rest ID',
            'restaurant' => 'Restaurant',
            'address1' => 'Address1',
            'phone1' => 'Phone1',
            'notes' => 'Notes',
            'neighborhood' => 'Neighborhood',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRest()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'rest_id']);
    }
}
