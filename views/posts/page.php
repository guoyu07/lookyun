<!-- Main -->
<div id="main">


    <article class="post">
        <header>
            <div class="title">
                <h2><?=$val->title?></h2>
                <p><?=$val->summary?></p>
            </div>
            <div class="meta">
                <time class="published" datetime="<?=date('Y-m-d',$val->create_time)?>"><?=date('Y-m-d',$val->create_time)?></time>
                <a target="_blank" href="<?=\yii\helpers\Url::to("/")?>" class="author"><span class="name">路客云管理员</span><img src="/post/images/avatar.jpeg" alt="" /></a>
            </div>
        </header>
        <?php if(!empty($val->img_big)){ ?>
        <a href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>" target="_blank" class="image featured"><img src="<?=empty($val->img_big)?"/post/images/pic03.jpg":$val->img_big?>" alt="" /></a>
        <?php }?>
        <p>
            <?=$val->content?>
        </p>
        <footer>
            <?php if(!empty($val->shop_url)){ ?>
                <ul class="actions">
                    <li><a href="<?=$val->shop_url?>" class="button big">直达链接</a></li>
                </ul>
            <?php }?>
            <ul class="stats">
                <li><a href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>" class="icon fa-heart"><?=$val->star?></a></li>
                <li><a href="<?=\yii\helpers\Url::to("posts/{$val->alias}")?>" class="icon fa-comment"><?=$val->feedback?></a></li>
            </ul>
        </footer>
    </article>

</div>

<!-- Footer -->
<section id="footer">
    <ul class="icons">
        <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
        <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
    </ul>
    <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
</section>
