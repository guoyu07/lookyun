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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'hadmin/css/bootstrap.min.css',
        'hadmin/css/font-awesome.css?v=4.4.0',
        'hadmin/css/animate.css',
        'hadmin/css/style.css',
        'hadmin/css/plugins/footable/footable.core.css'
    ];
    public $js = [
        'hadmin/js/jquery.min.js?v=2.1.4',
        'hadmin/js/bootstrap.min.js?v=3.3.6',
        'hadmin/js/plugins/metisMenu/jquery.metisMenu.js',
        'hadmin/js/plugins/slimscroll/jquery.slimscroll.min.js',
        'hadmin/js/plugins/layer/layer.min.js',
        'hadmin/js/hAdmin.js?v=4.1.0',
        'hadmin/js/index.js',
        'hadmin/js/plugins/pace/pace.min.js',
        'hadmin/js/plugins/footable/footable.all.min.js',
        'hadmin/js/content.js?v=1.0.0',

    ];

}