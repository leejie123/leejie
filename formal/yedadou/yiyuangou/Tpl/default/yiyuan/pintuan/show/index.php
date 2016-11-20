<?php include $this->tpl('yiyuan:pintuan/public/html_header.php') ?>
    <title>参团人员</title>
    <link rel="stylesheet" href="{__STATIC_URL__}/public/yiyuan/pintuan/showuserlist.css">
</head>
<body>
    <a id="top" class="top" href="">返回</a>
    <ul id="usercontainer" class="clearfix">

    </ul>
    </body>
    <script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#top').click(function(e){
                e.preventDefault();
                window.history.go(-1);
            });
            var $container=$('#usercontainer');
            //
            $window=$(window);
            //设置$body的高度和宽度
            $body=$("body");
            $body.height($window.height());
            var BBL=BOBOLIB_fun().init($,this,$window,$body);
            var app=new MainApp(BBL);
            var urlPageList='/yiyuan/pintuan/more?tid=<?php echo $tid; ?>';
            doPage(urlPageList,$container,function($data){
            });

        });

    </script>
</html>