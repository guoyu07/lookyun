<!-- Main -->
<div id="main">

    <!-- Post -->
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#">每日价格汇总</a></h2>
                <p>集齐了国内TOP10云主机提供商，每日更新，价格折扣一览无余</p>
            </div>
            <div class="meta">
                <time class="published" datetime="2015-11-01">2016年11月30</time>
                <a href="#" class="author"><span class="name">那些云主机</span><img src="/post/images/avatar.jpg" alt="" /></a>
            </div>
        </header>
        <a href="#" class="image featured"><img src="https://mc.qcloudimg.com/static/img/ad6d89b1b362fcd33c93e9a8609b4433/image.jpg" alt="" /></a>
        <p>今天阿里云和腾讯云都在做活动，全场8折，阿里云的云数据库，RDS，OSS都是买一年赠送一年,腾讯云也退出了基于微信的小程序托管服务，
            买服务器就送小程序开发包。做微信开发的朋友，可以入手了。青云也是折扣多多，域名买一年赠送一年持续一周，有想入手域名的同学可以入手了
        </p>
        <footer>
            <ul class="actions">
                <li><a href="#" class="button big">查看详情</a></li>
            </ul>
            <ul class="stats">
                <li><a href="#">直达链接</a></li>
                <li><a href="#" class="icon fa-heart">28</a></li>
                <li><a href="#" class="icon fa-comment">128</a></li>
            </ul>
        </footer>
    </article>

    <?php foreach($model as $val){?>
    <!-- Post -->
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#"><?=$val->title?></a></h2>
                <p><?=$val->summary?></p>
            </div>
            <div class="meta">
                <time class="published" datetime="<?=date('Y-m-d',$val->create_time)?>"><?=date('Y-m-d',$val->create_time)?></time>
                <a href="#" class="author"><span class="name">路客云</span><img src="/post/images/avatar.jpg" alt="" /></a>
            </div>
        </header>
        <a href="#" class="image featured"><img src="<?=empty($val->img_big)?"/post/images/pic03.jpg":$val->img_big?>" alt="" /></a>
        <p>
            <?=\app\models\AppYArticle::getMd($val->content,150)?>
        </p>
        <footer>
            <ul class="actions">
                <li><a href="#" class="button big">查看详情</a></li>
            </ul>
            <ul class="stats">
                <li><a href="#">直达链接</a></li>
                <li><a href="#" class="icon fa-heart"><?=$val->star?></a></li>
                <li><a href="#" class="icon fa-comment"><?=$val->feedback?></a></li>
            </ul>
        </footer>
    </article>
    <?php }?>
    <!-- Post -->


    <!-- Pagination -->
    <ul class="actions pagination">
        <li><a href="" class="disabled button big previous"></a></li>
        <li><a href="#" class="button big next">下一页</a></li>
    </ul>

</div>

<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="#" class="logo"><img src="/post/images/logo.jpg" alt="" /></a>
        <header>
            <h2>那些云主机</h2>
            <p>花最少的钱享受最好的云服务，不被坑，不被骗，买点瓜子，听我道来 <a href="#">云主机</a></p>
        </header>
    </section>

    <!-- Mini Posts -->
    <section>
        <div class="mini-posts">

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">京东云初体验</a></h3>
                    <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    <a href="#" class="author"><img src="/post/images/avatar.jpg" alt="" /></a>
                </header>
                <a href="#" class="image"><img src="/post/images/pic04.jpg" alt="" /></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">华为云初体验</a></h3>
                    <time class="published" datetime="2015-10-19">October 19, 2015</time>
                    <a href="#" class="author"><img src="/post/images/avatar.jpg" alt="" /></a>
                </header>
                <a href="#" class="image"><img src="/post/images/pic05.jpg" alt="" /></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">电信云初体验</a></h3>
                    <time class="published" datetime="2015-10-18">October 18, 2015</time>
                    <a href="#" class="author"><img src="/post/images/avatar.jpg" alt="" /></a>
                </header>
                <a href="#" class="image"><img src="/post/images/pic06.jpg" alt="" /></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">七牛云初体验</a></h3>
                    <time class="published" datetime="2015-10-17">October 17, 2015</time>
                    <a href="#" class="author"><img src="/post/images/avatar.jpg" alt="" /></a>
                </header>
                <a href="#" class="image"><img src="/post/images/pic07.jpg" alt="" /></a>
            </article>

        </div>
    </section>

    <!-- Posts List -->
    <section>
        <ul class="posts">
            <li>
                <article>
                    <header>
                        <h3><a href="#">快速部署服务器</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="/post/images/pic08.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">哪家的服务器适合写爬虫</a></h3>
                        <time class="published" datetime="2015-10-15">October 15, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="/post/images/pic09.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">哪家的服务器性能最强悍</a></h3>
                        <time class="published" datetime="2015-10-10">October 10, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="/post/images/pic10.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">说好的平滑伸缩呢？</a></h3>
                        <time class="published" datetime="2015-10-08">October 8, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="/post/images/pic11.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">PB级别日志处理</a></h3>
                        <time class="published" datetime="2015-10-06">October 7, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="/post/images/pic12.jpg" alt="" /></a>
                </article>
            </li>
        </ul>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>关于</h2>
        <p>我们业余捣鼓服务器，很不专业，会用世界上最好的语言PHP写Hello World，会用游标卡尺写Python，会写带分号的JS，离全栈工程师还有10年路走，离架构师还有15年书需读.</p>
        <ul class="actions">
            <li><a href="#" class="button">查看更多</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
            <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. post/images: <a href="http://unsplash.com">Unsplash</a>.</p>
    </section>

</section>