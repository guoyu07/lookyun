<?php

namespace app\models\data;

use Yii;

/**
 * This is the model class for table "y_article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $img_big
 * @property string $img_small
 * @property integer $create_time
 * @property string $shop_url
 * @property integer $category_id
 * @property string $tags
 * @property string $summary
 * @property string $alias
 * @property integer $star
 * @property integer $feedback
 * @property integer $ystatus
 * @property integer $src
 */
class YArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'y_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'create_time', 'summary', 'alias'], 'required'],
            [['content', 'tags', 'summary'], 'string'],
            [['create_time', 'category_id', 'star', 'feedback', 'ystatus', 'src'], 'integer'],
            [['title', 'img_big', 'img_small', 'shop_url'], 'string', 'max' => 128],
            [['alias'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'img_big' => 'Img Big',
            'img_small' => 'Img Small',
            'create_time' => 'Create Time',
            'shop_url' => 'Shop Url',
            'category_id' => 'Category ID',
            'tags' => 'Tags',
            'summary' => 'Summary',
            'alias' => 'Alias',
            'star' => 'Star',
            'feedback' => 'Feedback',
            'ystatus' => 'Ystatus',
            'src' => 'Src',
        ];
    }
}
