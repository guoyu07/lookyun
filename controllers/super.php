<?php
/**
 * Created by PhpStorm.
 * User: sibenx
 * Date: 16/12/2
 * Time: 上午2:51
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class super extends Controller{

    public $msg = ['code'=>1,'msg'=>'错误','data'=>null];

    public function failMsg($code=1,$msg='错误',$data=null){
        $this->msg = ['code'=>$code,'msg'=>$msg,'data'=>$data];
    }

    public function sucMsg($code=0,$data=null,$msg='成功'){
        $this->msg = ['code'=>$code,'msg'=>$msg,'data'=>$data];
    }
}