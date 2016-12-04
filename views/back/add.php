<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加文章</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="/hadmin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/hadmin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/hadmin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/hadmin/css/animate.css" rel="stylesheet">
    <link href="/hadmin/css/style.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/hadmin/css/plugins/markdown/bootstrap-markdown.min.css" />

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加文章</h5>
                </div>
                <div class="ibox-content">
                    <form id="add_article" method="post" class="form-horizontal" action="<?=\yii\helpers\Url::to(['back/add-article'])?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" required="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">别名</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="alias" required="" placeholder="" class="form-control">
                                    </div>
                                    <span id="alias-error" class="help-block m-b-none"></span>
                                </div>
                                <span class="help-block m-b-none">这里的别名会用于URL中，建议用-分隔，比如 get-aliyun-detail</span>

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品链接</label>
                            <div class="col-sm-10">
                                <input type="text" name="shop_url" class="form-control"> <span class="help-block m-b-none">这里填写直达链接，不填放空</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">大图链接</label>
                            <div class="col-sm-10">
                                <input type="text" name="img_big" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">小图链接</label>
                            <div class="col-sm-10">
                                <input type="text" name="img_small" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章类型</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="category_id">
                                    <?php  foreach($category_id as $k=>$val){
                                        printf('<option value="%s">%s</option>',$k,$val);
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标签</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="tags" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" id="tags_check_btn" class="btn btn-primary">检验标签
                                        </button> </span>
                                </div>
                                <span class="help-block m-b-none">标签需要使用,号分隔。比如 阿里云,腾讯云</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10" id="tags_check">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章内容</label>
                            <div class="col-sm-10">
                                    <textarea name="content" required="" data-provide="markdown" rows="30"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章摘要</label>
                            <div class="col-sm-10">
                                <textarea name="summary" class="form-control" rows="6" aria-required="true"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary"  type="submit">保存内容</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="/hadmin/js/jquery.min.js?v=2.1.4"></script>
<script src="/hadmin/js/bootstrap.min.js?v=3.3.6"></script>

<!-- iCheck -->
<script src="/hadmin/js/plugins/iCheck/icheck.min.js"></script>

<!-- simditor -->
<script type="text/javascript" src="/hadmin/js/plugins/markdown/markdown.js"></script>
<script type="text/javascript" src="/hadmin/js/plugins/markdown/to-markdown.js"></script>
<script type="text/javascript" src="/hadmin/js/plugins/markdown/bootstrap-markdown.js"></script>
<script type="text/javascript" src="/hadmin/js/plugins/markdown/bootstrap-markdown.zh.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });

    $("#tags_check_btn").click(function(){
        var _tags = $("input[name='tags']").val();
        var words = _tags.split(',');
        var _str = '';
        $.each(words,function(index,value){
            _str += '<span class="label">'+value+'</span>';
        });

        $("#tags_check").html(_str);
    });

    $("input[name='alias']").blur(function(dt){
        var alia = $("input[name='alias']").val();
        if($.trim(alia) != '')
        {
            $.getJSON("<?=\yii\helpers\Url::to(['back/uin-alias'])?>"+"?alias="+alia,function(rtn){
                if(rtn.code != 0)
                {
                    $("input[name='alias']").parent().attr("class","col-md-3 has-error");
                    $("#alias-error").html('<i class="fa fa-times-circle"></i>别名不能重复');
                }else
                {
                    $("input[name='alias']").parent().attr("class","col-md-3");
                    $("#alias-error").html('');
                }
            });
        }
    });

</script>




</body>

</html>
