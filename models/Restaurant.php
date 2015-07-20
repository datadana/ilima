<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restaurant".
 *
 * @property integer $id
 * @property string $restaurant
 * @property string $Review
 * @property string $Price
 * @property string $web
 * @property string $Writer
 * @property string $VisitDate
 *
 * @property Location[] $locations
 * @property RestHasCat[] $restHasCats
 */
class Restaurant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['Review'], 'string'],
            [['VisitDate'], 'safe'],
            [['restaurant', 'Price', 'web', 'Writer'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'restaurant' => 'Restaurant',
            'Review' => 'Review',
            'Price' => 'Price',
            'web' => 'Web',
            'Writer' => 'Writer',
            'VisitDate' => 'Visit Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['rest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestHasCats()
    {
        return $this->hasMany(RestHasCat::className(), ['rest_id' => 'id']);
    }
}
