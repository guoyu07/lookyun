<?php
/**
 * Created by PhpStorm.
 * User: sibenx
 * Date: 16/12/1
 * Time: 上午1:31
 */

namespace app\controllers;

use app\models\AppYArticle;
use app\models\data\YArticle;
use Yii;
use yii\helpers\Url;

class BackController extends super
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetList()
    {
        $search = yii::$app->request->get('search');
        $order = yii::$app->request->get('order');
        $limit = yii::$app->request->get('limit');
        $offset = yii::$app->request->get('offset');

        $where = $search!=''?['LIKE', 'title',$search]:[];
        $model = YArticle::find()
            ->where($where)
            ->limit($limit)
            ->offset($offset)
            ->orderBy("id desc")
            ->all();

        $cnt = YArticle::find()
            ->where($where)
            ->count();
        $rows = [];

        foreach($model as $val)
        {
            $rows[] = $this->ffl($val->getAttributes()) +
                ['edit'=>sprintf('<a class="remove" onclick="remove_art(%d)" href="javascript:void(0)" title="Remove"><i class="glyphicon glyphicon-remove"></i></a>
<a class="like" target="_blank" href="%s" title="编辑"><i class="glyphicon glyphicon-pencil"></i></a>',$val['id'],Url::to(['back/edit','id'=>$val['id']]))];
        }

        $data = ['total'=>$cnt,'rows'=>$rows];

        echo json_encode($data);
    }


    public function actionUinAlias()
    {
        $alias = yii::$app->request->get('alias');
        $id = yii::$app->request->get('id');
        $model = YArticle::find()->where("alias = '{$alias}'")->all();
        $bl = true;
        if(!empty($id))
        {
            foreach($model as $val)
            {
                if($val->id != $id)
                {
                    $bl = false;break;
                }
            }
        }else
        {
            if(!empty($model))
            {
                $bl = false;
            }
        }

        if($bl)
        {
            $this->sucMsg();
        }
        echo json_encode($this->msg);
    }

    public function actionDel()
    {
        $id = yii::$app->request->get('id');
        if(YArticle::deleteAll("id={$id}"))
        {
            $this->sucMsg();
        }
        echo json_encode($this->msg);
    }

    public function ffl($arr){
        $arr['create_time'] = $arr['create_time']==0?'':date('Y-m-d H:i:s',$arr['create_time']);
        $arr['category_id'] = AppYArticle::$cate[$arr['category_id']];
        $arr['ystatus'] = AppYArticle::$status[$arr['ystatus']];
        $arr['src'] = AppYArticle::$src[$arr['src']];
        return $arr;
    }

    public function actionArticle()
    {
        //$this->layout = "child";
        return $this->renderPartial('article',['doc'=>AppYArticle::$show]);
    }

    public function actionAdd()
    {
        return $this->renderPartial('add',['doc'=>AppYArticle::$show,'category_id'=>AppYArticle::$cate]);
    }

    public function actionEdit()
    {
        $id = yii::$app->request->get('id');
        $model = YArticle::findOne($id);
        return $this->renderPartial('update',['doc'=>AppYArticle::$show,'category_id'=>AppYArticle::$cate,"model"=>$model]);
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

    public function actionAddArticle()
    {

        $alias = trim(yii::$app->request->post('alias'));
        $category_id = intval(yii::$app->request->post('category_id',0));
        $content = trim(yii::$app->request->post('content'));
        $shop_url = trim(yii::$app->request->post('shop_url'));
        $summary = trim(yii::$app->request->post('summary'));
        $tags = trim(yii::$app->request->post('tags'));
        $title = trim(yii::$app->request->post('title'));

        $img_big = trim(yii::$app->request->post('img_big'));
        $img_small = trim(yii::$app->request->post('img_small'));

        $attr = [];
        if(empty($alias) || empty($title) || empty($content))
        {
            $this->failMsg(2,"文章标题，别名，内容不能为空");
        }else
        {
            if(empty($summary))
            {
                $summary = AppYArticle::getMd($content,300);
            }
            $model = new AppYArticle;
            $attr = [
                'alias' => $alias,
                'category_id' => $category_id,
                'shop_url' => $shop_url,
                'summary' => $summary,
                'tags' => $tags,
                'title' => $title,
                'content' => $content,
                'create_time' => time(),
                'img_big' => $img_big,
                'img_small' => $img_small
            ];
            $model->attributes = $attr;

            if($model->save())
            {
                $attr['id'] = Yii::$app->db->getLastInsertID();
                $this->sucMsg(0,$attr);
            }else
            {
                $error = $model->getErrors();
                $this->failMsg(3,"数据存储失败",$attr + $error);
            }
        }

        if($this->msg['code'] != 0)
        {
            $nr = print_r($attr,true);
            echo "添加文章失败,请复制这段内容，防止丢失".$this->msg['msg'].print_r($this->msg['data'],true).$nr;
        }else
        {
            return $this->renderPartial('update',['doc'=>AppYArticle::$show,'category_id'=>AppYArticle::$cate,"model"=>$attr]);
        }
    }



    public function actionUpdate()
    {
        $id = trim(yii::$app->request->post('id'));
        $alias = trim(yii::$app->request->post('alias'));
        $category_id = intval(yii::$app->request->post('category_id',0));
        $content = trim(yii::$app->request->post('content'));
        $shop_url = trim(yii::$app->request->post('shop_url'));
        $summary = trim(yii::$app->request->post('summary'));
        $tags = trim(yii::$app->request->post('tags'));
        $title = trim(yii::$app->request->post('title'));

        $img_big = trim(yii::$app->request->post('img_big'));
        $img_small = trim(yii::$app->request->post('img_small'));

        $attr = [];
        if(empty($alias) || empty($title) || empty($content))
        {
            $this->failMsg(2,"文章标题，别名，内容不能为空");
        }else
        {
            if(empty($summary))
            {
                $summary = AppYArticle::getMd($content,300);
            }
            $model = AppYArticle::findOne($id);
            if(!empty($model))
            {
                $attr = [
                    'alias' => $alias,
                    'category_id' => $category_id,
                    'shop_url' => $shop_url,
                    'summary' => $summary,
                    'tags' => $tags,
                    'title' => $title,
                    'content' => $content,
                    'create_time' => time(),
                    'img_big' => $img_big,
                    'img_small' => $img_small
                ];
                $model->attributes = $attr;

                if($model->save())
                {
                    $attr['id'] = $id;
                    $this->sucMsg(0,$attr);
                }else
                {
                    $error = $model->getErrors();
                    $this->failMsg(3,"数据存储失败",$attr + $error);
                }
            }

        }

        if($this->msg['code'] != 0)
        {
            $nr = print_r($attr,true);
            echo "添加文章失败,请复制这段内容，防止丢失".$this->msg['msg'].print_r($this->msg['data'],true).$nr;
        }else
        {
            return $this->renderPartial('update',['doc'=>AppYArticle::$show,'category_id'=>AppYArticle::$cate,"model"=>$attr]);
        }
    }
}