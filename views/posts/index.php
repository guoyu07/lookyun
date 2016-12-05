<!-- Main -->
<div id="main">
<?php
echo \app\components\ArticleWidget::widget(['post' => $day]);
?>

    <?php foreach($model as $val){
        echo \app\components\ArticleWidget::widget(['post' => $val]);
    }?>

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