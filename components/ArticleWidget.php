<?php
/**
 * Created by PhpStorm.
 * User: sibenx
 * Date: 16/12/6
 * Time: 上午3:15
 */
namespace app\components;

use yii\base\Widget;

class ArticleWidget extends Widget
{
    public $post;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('post',['val'=>$this->post]);
    }
}