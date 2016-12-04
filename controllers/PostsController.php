<?php

namespace app\controllers;

use app\models\AppYArticle;
use Yii;

class PostsController extends super
{
    public $layout = "home";
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndex()
    {
        $limit = yii::$app->request->get('limit',10);
        $offset = yii::$app->request->get('offset',0);
        $model = AppYArticle::find()
                ->limit($limit)
                ->offset($offset)
                ->orderBy("id desc")
                ->all();
        return $this->render('index',['model'=>$model]);
    }

    public function actionError()
    {
        return $this->renderPartial('error');
    }
}
