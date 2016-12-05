<!-- Post -->
<article class="post">
    <header>
        <div class="title">
            <h2><a target="_blank" href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>"><?=$val->title?></a></h2>
            <p><?=$val->summary?></p>
        </div>
        <div class="meta">
            <time class="published" datetime="<?=date('Y-m-d',$val->create_time)?>"><?=date('Y-m-d',$val->create_time)?></time>
            <a target="_blank" href="<?=\yii\helpers\Url::to("/")?>" class="author"><span class="name">路客云</span><img src="/post/images/avatar.jpg" alt="" /></a>
        </div>
    </header>
    <a href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>" target="_blank" class="image featured"><img src="<?=empty($val->img_big)?"/post/images/pic03.jpg":$val->img_big?>" alt="" /></a>
    <p>
        <?=\app\models\AppYArticle::getMd($val->content,810)?>
    </p>
    <footer>
        <ul class="actions">
            <li><a href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>" class="button big">查看详情</a></li>
        </ul>
        <ul class="stats">
            <?php if(!empty($val->shop_url)){ ?>
                <li><a href="<?=$val->shop_url?>" target="_blank">直达链接</a></li>
            <?php }?>
            <li><a href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>" class="icon fa-heart"><?=$val->star?></a></li>
            <li><a href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>" class="icon fa-comment"><?=$val->feedback?></a></li>
        </ul>
    </footer>
</article>