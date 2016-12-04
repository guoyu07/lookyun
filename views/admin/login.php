<?php
use app\assets\LoginAsset;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台登录页面</title>
    <?php $this->head() ?>
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>
</head>
<body class="signin">
<?php $this->beginBody() ?>
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="<?=\yii\helpers\Url::to(['/admin/login'])?>">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                <input type="text" name="" class="form-control uname" placeholder="用户名" />
                <input type="password" class="form-control pword m-b" placeholder="密码" />
                <button class="btn btn-success btn-block">登录</button>
            </form>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>