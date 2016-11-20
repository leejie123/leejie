
</head>
<body>
    <!-- 广告位 end -->
    
    <!-- 广告位 start -->
    <div id="advertising"></div>

    <!-- 头部 start -->
    
    <!-- header start 未登录状态-->
    <div class="header">
        <div class="mainBav">
            <div class="nav container12">
                <div class="loginBar fr">
                    <a href="/Account/Login?returnUrl=/home/index" onclick='SetEventClick("1","首页_登录_按钮","登录","/home/index")'>登录</a>
                    <a href="/Register/Index?returnUrl=/home/index" class="active" onclick='SetEventClick("1","首页_注册_按钮","注册","/home/index")'>体验</a>
                </div>
                <h1 class="logo fl"><a href="/home/index" title="返回首页"><img src="/Content/images/index_images/logo.png?v=1.0.0.0.20160707.1" alt="装修设计软件_三维家"></a></h1>
                <ul class="clearfix">
                    <li class="active"><a href="/home/index" >首页</a></li>
                    <li class="navFind">
                        <a href="/DesignArtifact/I3D">设计神器<i class="index_drop dropIcon"></i></a>
                        <div class="navFindList toolList">
                            <a href="/DesignArtifact/I3D"><i class="TY index_drop"></i>3D通用</a>
                            <a href="/DesignArtifact/Cabinet"><i class="CG index_drop"></i>橱柜</a>
                            <a href="/DesignArtifact/Wardrobe"><i class="YG index_drop"></i>衣柜</a>
                            <a href="/DesignArtifact/Ceiling"><i class="DD index_drop"></i>吊顶</a>
                            <a href="/DesignArtifact/BrickPaving"><i class="PZ index_drop"></i>铺砖</a>
                        </div>
                    </li>
                    <li><a href="/PMC/Scheme/Panorama">VR全景</a></li>
                    <li><a href="http://bbs.3vjia.com/">培训与学习</a></li>
                    <li class="navFind">
                        <a href="/PMC/Decorate/index">发现<i class="index_drop dropIcon"></i></a>
                        <div class="navFindList">
                            <a href="/PMC/Scheme/SScheme">方案</a>
                            <a href="/PMC/building/Index">找我家</a>
                            <a href="/PMC/Decorate/Index">找装修</a>
                            <a href="/PMC/Store/Index">找店铺</a>
                        </div>
                    </li>
                    <li><a href="/About/Index">关于我们</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header end 未登录状态-->

    <script type="text/javascript">
        $(function () {
            if ("False" == "True") {
                //判断当前用户是否具有领取VR眼镜的条件
                $(function () {
                    $.post("/Home/GetVR", {}, function (data) {
                        if (data == true) {
                            $(".receiveBtn").show();
                            $(".receiveBtn").attr("href", "http://admin.3vjia.com/mnmnh/common/VRGlassesRechargeList.aspx");
                        }
                        else {
                            $(".receiveBtn").hide();
                            $(".receiveBtn").attr("href", "javascript:;");
                        }
                    }, "json")
                    .error(function () {
                        $(".receiveBtn").hide();
                    })
                });

                $(function () {
                    $.post("/Member/Store/UserProfile", {}, function (data) {
                        if (data == null) {
                            //登录出错清理所有Cookie
                            $.post("/Account/Logout",{}, function () {
                                location.href = "/home/index"
                            });  
                            return;
                        }

                        var domain = data.Domain;
                        var AccountType = $('#h_userType').text();
                        if (AccountType == 1) {
                            //店铺主页为空是跳转手而已
                            if (domain == "" || domain == null) {
                                domain = "/home/index";
                            }
                            $("#h_shopHomePage").attr("href", domain);
                        }
                    }, "json")
                    .error(function () {
                        //$.post("/Account/Logout");  //登录出错清理所有Cookie
                    })
                })
                //$("#h_btnExit").click(function () { QC.Login.signOut(); });
            }
        });

        //用于统计登录后对应链接点击数量， 一种是全网点击数量，一种是只在首页点击数量
        $(function () {
            var pathUrl = location.href;
            var para1 = pathUrl.replace("http://www" + ".3vjia.com", "");
            var para2 = para1 == "" ? "/home/index" : para1;
            $("#3DCenter").click(function () {
                SetEventClick("1", "导航条_登录_进入3D云设计_按钮", "开始设计", para2);
                if (para2.toLowerCase().indexOf("/home/index") != -1) {
                    SetEventClick("1", "首页_登录_进入3D云设计_按钮", "开始设计", "/home/index");
                }
            })

            $("#MerchantCenter").click(function () {
                SetEventClick("1", "导航条_登录_商家管理中心_按钮", "商家管理中心", para2)
                if (para2.toLowerCase().indexOf("/home/index") != -1) {
                    SetEventClick("1", "首页_登录_商家管理中心_按钮", "商家管理中心", "/home/index");
                }
            })

            $("#h_shopHomePage").click(function () {
                SetEventClick("1", "导航条_登录_店铺主页_按钮", "店铺主页", para2)
                if (para2.toLowerCase().indexOf("/home/index") != -1) {
                    SetEventClick("1", "首页_登录_店铺主页_按钮", "店铺主页", "/home/index");
                }
            })

            $("#h_collectNum").click(function () {
                SetEventClick("1", "导航条_登录_我的收藏_按钮", "我的收藏", para2)
                if (para2.toLowerCase().indexOf("/home/index") != -1) {
                    SetEventClick("1", "首页_登录_我的收藏_按钮", "我的收藏", "/home/index");
                }
            })
            $("#h_btnExit").click(function () {
                SetEventClick("1", "导航条_登录_退出_按钮", "退出", para2)
                if (para2.toLowerCase().indexOf("/home/index") != -1) {
                    SetEventClick("1", "首页_登录_退出_按钮", "退出", "/home/index");
                }
            })

            $("#updatePwd").click(function () {
                updatePwd();
                //SetEventClick("1", "导航条_登录_马上修改_气泡", "马上修改", para2)  //目前气泡只能在首页有，其他页面暂时不统计
                if (para2.toLowerCase().indexOf("/home/index") != -1) {
                    SetEventClick("1", "首页_登录_马上修改_气泡", "马上修改", "/home/index");
                }
            })
        });
    </script>




    <!-- 头部 end -->