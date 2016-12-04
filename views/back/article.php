<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="<?="/hadmin/"?>css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="<?="/hadmin/"?>css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="<?="/hadmin/"?>css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">

    <link href="<?="/hadmin/"?>css/animate.css" rel="stylesheet">
    <link href="<?="/hadmin/"?>css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Columns & Select -->
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Events -->
                    <div class="example-wrap">
                            <table id="art_tb"
                                   data-toolbar="#toolbar"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-toggle="true"
                                   data-show-columns="true"
                                   data-height="550"
                                   data-mobile-responsive="true"
                                   data-click-to-select="true"
                                   data-toggle="table"
                                   data-side-pagination="server"
                                   data-page-list="[10,20,50,100]"
                                   data-pagination="true"
                                   data-page-size="15"
                                   data-pagination-first-text="首页"
                                   data-pagination-pre-text="上一页"
                                   data-pagination-next-text="下一页"
                                   data-pagination-last-text="末页"
                                   data-method="get"
                                   data-url="<?=\yii\helpers\Url::to(['back/get-list'])?>"
                                >
                                <thead>
                                <tr>
                                    <?php foreach($doc as $k=>$val){
                                        printf('<th data-field="%s">%s</th>',$k,$val);
                                    } ?>
                                    <th data-field="edit">编辑</th>
                                </tr>
                                </thead>
                            </table>
                    </div>
                    <!-- End Example Events -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Panel Other -->
</div>
<!-- 全局js -->
<script src="<?="/hadmin/"?>js/jquery.min.js?v=2.1.4"></script>
<script src="<?="/hadmin/"?>js/bootstrap.min.js?v=3.3.6"></script>

<!-- 自定义js -->
<!-- Bootstrap table -->
<script src="<?="/hadmin/"?>js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="<?="/hadmin/"?>js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script>
    function remove_art(id){
        var _tmp = $(event.target).closest("tr");
        $.getJSON("<?=\yii\helpers\Url::to(['back/del'])?>?id="+id, function (rtn) {
            if(rtn.code == 0)
            {
                _tmp.remove();
            }
        });
    }
</script>
</body>
</html>
