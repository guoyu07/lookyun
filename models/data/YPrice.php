<?php

namespace app\models\data;

use Yii;

/**
 * This is the model class for table "y_price".
 *
 * @property integer $id
 * @property string $json_attr
 * @property string $price
 * @property integer $create_time
 * @property string $alert
 * @property integer $cate_id
 */
class YPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'y_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['json_attr', 'cate_id'], 'required'],
            [['json_attr', 'alert'], 'string'],
            [['create_time', 'cate_id'], 'integer'],
            [['price'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'json_attr' => 'Json Attr',
            'price' => 'Price',
            'create_time' => 'Create Time',
            'alert' => 'Alert',
            'cate_id' => 'Cate ID',
        ];
    }
}
