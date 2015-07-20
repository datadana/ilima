<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat".
 *
 * @property integer $id
 * @property string $cat
 *
 * @property RestHasCat[] $restHasCats
 */
class Cat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['cat'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat' => 'Cat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestHasCats()
    {
        return $this->hasMany(RestHasCat::className(), ['cat_id' => 'id']);
    }
}
