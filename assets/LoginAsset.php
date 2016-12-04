<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'hadmin/css/bootstrap.min.css',
        'hadmin/css/font-awesome.css?v=4.4.0',
        'hadmin/css/animate.css',
        'hadmin/css/style.css',
        'hadmin/css/login.css'
    ];
    public $js = [
    ];
}