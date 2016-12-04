<?php
/**
 * Created by PhpStorm.
 * User: sibenx
 * Date: 16/12/2
 * Time: 上午3:19
 */
namespace app\models;

use app\models\data\YArticle;

class AppYArticle extends YArticle
{
    public static $cate = [
        0 => '默认',
        1 => '优惠信息',
        2 => '云服务器测评',
        3 => '服务器优化',
        4 => '每日报价'
    ];

    public static $status = [
        0 => '草稿',
        1 => '发布'
    ];

    public static $src = [
        0 => '原创',
        1 => '爬虫'
    ];
    public static $doc = [
        'id' => '编号',
        'title' => '标题',
        'content' => '内容',
        'img_big' => '大图片',
        'img_small' => '小图片',
        'create_time' => '创建时间',
        'shop_url' => '商品链接',
        'category_id' => '分类',
        'tags' => '标签',
        'summary' => '摘要',
        'alias' => '别名',
        'star' => '星星',
        'feedback' => '浏览',
        'ystatus' => '状态',
        'src' => '来源',
    ];

    public static $show = [
        'id' => '编号',
        'title' => '标题',
        'create_time' => '创建时间',
        'shop_url' => '商品链接',
        'category_id' => '分类',
        'tags' => '标签',
        'alias' => '别名',
        'star' => '星星',
        'feedback' => '浏览',
        'ystatus' => '状态',
        'src' => '来源'
    ];

    public static function  getMd($content,$num=100){

        $parser = new \cebe\markdown\MarkdownExtra();
        return mb_strcut(str_replace(["\r\n",""],'',strip_tags($parser->parse($content))),0,$num,'utf-8');
    }
}