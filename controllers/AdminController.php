<?php
/**
 * Created by PhpStorm.
 * User: sibenx
 * Date: 16/12/1
 * Time: 上午1:31
 */

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\web\Controller;

class AdminController extends super
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPartial('login');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect(['admin/index']);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->renderPartial('login');
    }
}