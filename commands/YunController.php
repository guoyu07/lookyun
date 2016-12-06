<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\AppYArticle;
use app\models\data\YPrice;
use GuzzleHttp\Client;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class YunController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $this->getBaidu();
        $this->getAli();
        $this->getTenxun();
        $this->actionDay();
    }

    public function actionDay()
    {
        $model = YPrice::findBySql("SELECT * FROM `y_price` WHERE id IN (SELECT max( id ) FROM `y_price` GROUP BY cate_id )")->all();

        $arr = [];
        $yun_arr = \Yii::$app->params['yun'];
        foreach($model as $val){
            $json = json_decode($val->json_attr,true);
            $arr[] = [
                'name' => $yun_arr[$val['cate_id']],
                'cpu' => $json['cpu']."核",
                'memory' => $json['memory']."G",
                'diskSize' => $json['diskSize']."G",
                'bandwidth' => $json['bandwidth']."M",
                'preMonth' => $json['preMonth']."月",
                'price' => $val['price'],
                'alert' => $val['alert']
            ];
        }
        $content = $this->renderFile(dirname(__FILE__).'/tpl/price.php',['model'=>$arr]);

        $model = new AppYArticle();
        $attr = [
            'alias' => date('Ymd')."-price",
            'category_id' => 4,
            'shop_url' => '',
            'summary' => AppYArticle::getMd($content,300),
            'tags' => implode(',',$yun_arr).",云主机对比,云服务器对比",
            'title' => date("Y年m月d日")."报价，每日云服务器报价",
            'content' => $content,
            'create_time' => time(),
            'img_big' => '',
            'img_small' => ''
        ];
        $model->attributes = $attr;

        if($model->save())
        {
            echo "day_succ! \r\n";
        }
    }

    private function getBaidu(){

        $preMonth = 12;
        $cpu = 1;
        $memory = 1;
        $diskSize = 20;
        $bandwidth = 1;

        $json = sprintf('{"productType":"prepay","region":"gz","purchaseLength":%d,"postpayLength":1,"postpayLengthType":"day","cpu":%d,"memory":%d,"diskSize":0}',
            $preMonth,$cpu,$memory
            );
        $client = new Client();
        $response = $client->request('POST', 'https://cloud.baidu.com/api/calculator/bcc/instance/price', [
            'body' => $json,
            'headers' => ['X-Request-By' => 'ERApplication','Content-Type'=>'application/json']
        ])->getBody();
        $rtn = json_decode($response,true);

        if(isset($rtn['success'])&&$rtn['success']==1&&isset($rtn['result']['money']))
        {
            $model = new YPrice();
            $model->attributes = [
                'json_attr' => $this->jsonYun($preMonth,$cpu,$memory,$diskSize,$bandwidth),
                'price' => (intval($rtn['result']['money']) + 230)."",
                'create_time' => time(),
                'alert' => '带宽需要单独购买230/年；提供IO快、价格更实惠的缓存硬盘；',
                'cate_id' => 1
            ];
            if($model->save()){
                echo "succ!";
            }else
            {
                print_r($model->getErrors());
            }
        }else
        {
            echo "百度接口错误； \r\n";
        }
    }


    private function getAli(){

        $preMonth = 12;
        $cpu = 1;
        $memory = 1;
        $diskSize = 40;
        $bandwidth = 1;

        $model = new YPrice();
        $model->attributes = [
            'json_attr' => $this->jsonYun($preMonth,$cpu,$memory,$diskSize,$bandwidth),
            'price' => "627.30",
            'create_time' => time(),
            'alert' => '阿里云的磁盘I/O比较低，可以选择I/O来优化,不过价格就贵了',
            'cate_id' => 2
        ];
        if($model->save()){
            echo "succ!";
        }else
        {
            print_r($model->getErrors());
        }
    }

    private function getTenxun(){

        $preMonth = 12;
        $cpu = 1;
        $memory = 1;
        $diskSize = 20;
        $bandwidth = 1;

        $pdata = [
            'goodsInfoArray[0][goodsCategoryId]'=>'100019',
            'goodsInfoArray[0][regionId]'=>'4',
            'goodsInfoArray[0][projectId]'=>'0',
            'goodsInfoArray[0][zoneId]'=>'200001',
            'goodsInfoArray[0][goodsDetail][timeUnit]'=>'m',
            'goodsInfoArray[0][goodsDetail][type]'=>'VSELF',
            'goodsInfoArray[0][goodsDetail][cpu]'=>$cpu,
            'goodsInfoArray[0][goodsDetail][mem]'=>$memory,
            'goodsInfoArray[0][goodsDetail][bandwidth]'=>$bandwidth,
            'goodsInfoArray[0][goodsDetail][isWinOs]'=>'0',
            'goodsInfoArray[0][goodsDetail][payment][goodsNum]'=>'1',
            'goodsInfoArray[0][goodsDetail][payment][timeUnit]'=>'m',
            'goodsInfoArray[0][goodsDetail][payment][cvmPayMode]'=>'1',
            'goodsInfoArray[0][goodsDetail][payment][timeSpan]'=>'12',
            'goodsInfoArray[0][goodsDetail][payment][networkPayMode]'=>'1',
            'goodsInfoArray[0][goodsDetail][location][regionId]'=>'4',
            'goodsInfoArray[0][goodsDetail][location][zoneId]'=>'200001',
            'goodsInfoArray[0][goodsDetail][location][projectId]'=>'0',
            'goodsInfoArray[0][goodsDetail][compute][cpu]'=>$cpu,
            'goodsInfoArray[0][goodsDetail][compute][mem]'=>$memory,
            'goodsInfoArray[0][goodsDetail][diskInfo][root][target]'=>'xvda',
            'goodsInfoArray[0][goodsDetail][diskInfo][root][type]'=>'2',
            'goodsInfoArray[0][goodsDetail][diskInfo][root][size]'=>$diskSize,
            'goodsInfoArray[0][goodsDetail][diskInfo][data][0][target]'=>'xvde',
            'goodsInfoArray[0][goodsDetail][diskInfo][data][0][type]'=>'2',
            'goodsInfoArray[0][goodsDetail][diskInfo][data][0][size]'=>'0',
            'goodsInfoArray[0][goodsDetail][alias]'=>'未命名',
            'goodsInfoArray[0][goodsDetail][launchSource]'=>'cvmPage',
            'goodsInfoArray[0][goodsDetail][purchaseSource]'=>'MC',
            'goodsInfoArray[0][goodsDetail][rootCbs]'=>'20',
            'goodsInfoArray[0][goodsDetail][cbsSize]'=>'0',
            'goodsInfoArray[0][goodsDetail][timeSpan]'=>'12',
            'goodsInfoArray[0][goodsNum]'=>'1',
            'goodsInfoArray[0][payMode]'=>'1',
            'payMode'=>'1'
        ];

        $client = new Client();
        $response = $client->request('POST', 'https://buy.qcloud.com/cgi/cvm?action=queryPrice', [
            'form_params' => $pdata
        ])->getBody();
        $rtn = json_decode($response,true);

        if(isset($rtn['code'])&&$rtn['code']==0&&isset($rtn['data'][0]['realTotalCost']))
        {
            $model = new YPrice();
            $model->attributes = [
                'json_attr' => $this->jsonYun($preMonth,$cpu,$memory,$diskSize,$bandwidth),
                'price' => round($rtn['data'][0]['realTotalCost']/100,2)."",
                'create_time' => time(),
                'alert' => '腾讯云买半年就有优惠，买的时间越久就越实惠3年5折。腾讯云的带宽不理想，国外访问不到',
                'cate_id' => 3
            ];
            if($model->save()){
                echo "succ!";
            }else
            {
                print_r($model->getErrors());
            }
        }else
        {
            echo "腾讯接口错误； \r\n";
        }
    }




    private function jsonYun($preMonth,$cpu,$memory,$diskSize,$bandwidth){

        $attr = [
            'preMonth' => $preMonth,
            'cpu' => $cpu,
            'memory' => $memory,
            'diskSize' => $diskSize,
            'bandwidth' => $bandwidth
        ];
        return json_encode($attr);
    }
}
