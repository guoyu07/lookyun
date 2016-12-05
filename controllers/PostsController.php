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
                ->where(['category_id'=>1])
                ->limit($limit)
                ->offset($offset)
                ->orderBy("id desc")
                ->all();

        $day = AppYArticle::find()
                ->where(['category_id'=>4])
                ->orderBy("id desc")
                ->one();
        return $this->render('index',['model'=>$model,'day'=>$day]);
    }

    public function actionError()
    {
        return $this->renderPartial('error');
    }

    public function actionDoc(){
        $id = yii::$app->request->get('id');
        $model = AppYArticle::find()->where(['alias'=>$id])->one();
        $parser = new \cebe\markdown\MarkdownExtra();
        $model->content = $parser->parse($model->content);
        return $this->render('page',['val'=>$model]);
    }
}
