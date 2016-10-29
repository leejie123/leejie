//可以做一个debug的，就是一个总开关，一个debug.console是false的时候就关闭所有debug
//既要能看到局部，也要能看到局部和整体的联系。比如我展示所有项目，但是我想要倒序，想要看一部分项目。这就是业务逻辑。
//一次性渲染可能太耗费cpu，性能太差。又不想分页。
//少了路由

/**\\\\\\\\\\\\\\\\\\\\\\\\\\\\

  ////    工具类开始    /////
  
\\\\\\\\\\\\\\\\\\\\\\\\\\\\**/

//get data form server side;
var service = new service();
var userData = service.getUser();

//判断是否登录
//但是要排除login.html
service.checkLogin();

/**
 * route机制
 * 本来不打算做这个。。
**/


function route() {
	switch(userData) {
		case "root":
			break;
		case "ydd":
			break;
		case "svj":
			break;
		case "swj":
			break;
		case "pride":
	} 
}


/**
 * logout 
**/
$('.js-logout').bind('click', function(e) {
	e.preventDefault();
	service.logout();
	if(!(/login.html/).test(location.pathname)) {
		window.location.href = "login.html";
	}
})

/**
 * 引导层
**/
var guide = function () {

}


/**
 * cookie judge
 * login module
 * 以后添加cookie模块。
 * 还有需要补充一些东西。就是
 * 有login页面之后，jquery的一些东西可以去掉，就是不用自定义选择器。以及login modal也可以去掉。在另外的form和input加上name就可以了。
**/

/**\\\\\\\\\\\\\\\\\\\\\\\\\\\\

  ////    功能模块开始    /////
  
\\\\\\\\\\\\\\\\\\\\\\\\\\\\**/


/**
 * login module 
 * 
**/
// var loginModule = function () {
// 	this.login_tpl = '<div class="loginModal"> \
//   	<div class="con"> \
//   		<div class="formWrap"> \
//   			<form name="loginForm"> \
// 	  			<div class="Item"> \
// 	  				<label>请输入用户名</label> \
// 	  				<input type="" name="username"> \
// 	  			</div> \
// 	  			<div> \
// 	  				<label>请输入密码</label> \
// 	  				<input type="password" name="password">\
// 	  			</div>\
// 	  			<div>\
// 	  				<button rol="button" class="js-loginBtn">登录</button>\
// 	  			</div>\
//   			</form>\
//   		</div>\
//   	</div>\
//   </div>';
//   this.$elem;
// }
// loginModule.prototype.init = function() {
//   this.$elem = document.createElement("div");
//   this.$elem.innerHTML = this.login_tpl;
//   document.body.appendChild(this.$elem);
// }

// loginModule.prototype.hide = function() {
// 	this.$elem.style.display = "none";
// }

// var xx = new loginModule();
// xx.init();



$('.js-submit').bind("click", function (e) {
	e.preventDefault();	
	// e.bubbles = false;
	//验证
	var loginForm = window.loginForm,
		username = loginForm.username.value.trim(),
		password = loginForm.password.value.trim(),
		isLogin = false;

	if( username == "" || password == "") {
		alert("请填写用户名或密码");
		return;
	} 
	// if (Tools.getCookie("islocked")) {
	// 	alert("系统维护中，或者管理员您的登录权限被管理员收回。请联系管理员");
	// 	return;
	// }
	for(var i=0;i<userData.length;i++) {
		if(username == userData[i].username && password == userData[i].password) {
			console.log('login success');
			window.location.href = "./timeline.html";
			isLogin = true;
			Tools.setCookie("user_id", userData[i].id, 36000);
			break;
		}
	}

	if(!isLogin) {
		alert("用户名密码错误");
	}

})


function timelineModuleInit(returndata) {
	//timeline module
	//应该把展示的逻辑剥离出来，可以供search用。传进一个数组
	//在这里面增加模板语言，if和else
	//一开始吧所有的逻辑，包括读取数据的，还有展示的都放进来，其实应该剥离。
	//注意要判断是否为undefined
	var timeline_tpl = '<!-- #section:pages/timeline -->\
						<div class="timeline-container">\
							<div class="timeline-label">\
								<!-- #section:pages/timeline.label -->\
								<span class="label label-primary arrowed-in-right label-lg">\
									<b>#protime#</b>\
								</span>\
								<!-- /section:pages/timeline.label -->\
							</div>\
							<div class="timeline-items">\
								<!-- #section:pages/timeline.item -->\
								<div class="timeline-item clearfix">\
									<!-- #section:pages/timeline.info -->\
									<div class="timeline-info">\
										<img alt="Susan\'t Avatar" src="../assets/avatars/avatar1.png" />\
										<span class="label label-info label-sm">leejie</span>\
									</div>\
									<!-- /section:pages/timeline.info --> \
									<div class="widget-box transparent"> \
										<div class="widget-header widget-header-small">\
											<h5 class="widget-title smaller">\
												<a href="#" class="blue">#proname#</a>\
												<span class="grey"></span>\
											</h5>\
											<span class="widget-toolbar no-border">\
												<i class="ace-icon fa fa-clock-o bigger-110"></i>\
												16:22\
											</span>\
											<span class="widget-toolbar">\
												<a href="#" data-action="reload">\
													<i class="ace-icon fa fa-refresh"></i>\
												</a>\
												<a href="#" data-action="collapse">\
													<i class="ace-icon fa fa-chevron-up"></i>\
												</a>\
											</span>\
										</div>\
										<div class="widget-body">\
											<div class="widget-main">\
												<div class="clearfix">\
													<div class="pull-right">\
														<i class="ace-icon fa fa-chevron-left blue bigger-110"></i>\
														&nbsp;\
														<ul class="ace-thumbnails clearfix" style="display:inline-block;vertical-align:middle;">\
															<li>\
																<a href="../assets/images/gallery/image-1.jpg" title="Photo Title" data-rel="colorbox" class="cboxElement">\
																<img width="36" height="36" alt="150x150" src="../assets/images/gallery/thumb-1.jpg">\
															</a>\
															</li>\
															<li>\
																<a href="../assets/images/gallery/image-1.jpg" title="Photo Title" data-rel="colorbox" class="cboxElement">\
																	<img width="36" height="36" alt="150x150" src="../assets/images/gallery/thumb-1.jpg">\
																</a>\
															</li>\
														</ul>\
														&nbsp;\
														<i class="ace-icon fa fa-chevron-right blue bigger-110"></i>\
													</div>\
													<div class="<pull-left>" style="padding-right:150px;">\
														#prointro#\
													</div>\
												</div>\
												<div class="space-6"></div>\
												<div class="widget-toolbox clearfix">\
													<div class="pull-left">\
														<i class="ace-icon fa fa-hand-o-right grey bigger-125"></i>\
														<a href="#prolink#" class="bigger-110">Click to read &hellip;</a>\
													</div>\
													<!-- #section:custom/extra.action-buttons -->\
													<!-- <div class="pull-right action-buttons">\
														<a href="#">\
															<i class="ace-icon fa fa-check green bigger-130"></i>\
														</a>\
														<a href="#">\
															<i class="ace-icon fa fa-pencil blue bigger-125"></i>\
														</a>\
														<a href="#">\
															<i class="ace-icon fa fa-times red bigger-125"></i>\
														</a>\
													</div> -->\
													<!-- /section:custom/extra.action-buttons -->\
												</div>\
											</div>\
										</div>\
									</div>\
								</div>\
								<!-- /section:pages/timeline.item -->\
								<div class="timeline-item clearfix">\
									<div class="timeline-info">\
										<i class="timeline-indicator ace-icon fa fa-briefcase btn btn-success no-hover"></i>\
									</div>\
									<div class="widget-box transparent">\
										<div class="widget-body">\
											<div class="widget-main">\
												#protech#\
												<div class="pull-right">\
													<i class="ace-icon fa fa-clock-o bigger-110"></i>\
													12:30\
												</div>\
											</div>\
										</div>\
									</div>\
								</div>\
								<div class="timeline-item clearfix">\
									<div class="timeline-info">\
										<i class="timeline-indicator ace-icon fa fa-code btn btn-warning no-hover green"></i>\
									</div>\
									<div class="widget-box transparent">\
										<div class="widget-body">\
											<div class="widget-main">\
											#prodetail#\
											</div>\
										</div>\
									</div>\
								</div>\
								<div class="timeline-item clearfix">\
									<div class="timeline-info">\
										<i class="timeline-indicator ace-icon fa fa-book btn btn-default no-hover"></i>\
									</div>\
									<div class="widget-box transparent">\
										<div class="widget-body">\
											<div class="widget-main"> #prodoc# </div>\
										</div>\
									</div>\
								</div>\
							</div><!-- /.timeline-items -->\
						</div><!-- /.timeline-container -->';
	var returntpl = "";
	
	if(returndata.data != undefined && returndata.data.length > 0) {
		for(var i=0;i<returndata.data.length;i++) {
			var protime = returndata.data[i].protime,
				prodetail = returndata.data[i].prodetail,
				prodoc = returndata.data[i].prodoc,
				prointro = returndata.data[i].prointro,
				prolink = returndata.data[i].prolink,
				proname = returndata.data[i].proname,
				protech = returndata.data[i].protech;
			var timeline_tmp = timeline_tpl.replace("#protime#", protime)
										.replace("#prodetail#", prodetail)
										.replace("#prodoc#", prodoc)
										.replace("#prointro#", prointro)
										.replace("#prolink#", prolink)
										.replace("#proname#", proname)
										.replace("#protech#", protech);
			returntpl += timeline_tmp;
		}
	} else {
		returntpl = "<p><i class='fa fa-clock-o'></i>没有搜索结果哦。。</p>"
	}
	$container = $("#js-tlcon");
	$container.empty().append(returntpl);
}

//route 

var hash = location.pathname;
page = /timeline.html/;
if(page.test(hash)) {
	var returndata = service.getProject(Tools.getCookie("user_id"));
	timelineModuleInit(returndata);

	//现在没有多组合搜索模式，select是为了能够提供更好的分类，另外的input可以自定义，不过这个是基于受控词汇表够多的情况下，分类不过来，可以用input
	var $search1 = $('.js-search1');
	$search1.find('button').bind('click', function() {
		var value = $search1.find('input').val();
		switch(value) {
			case "" :
				return;
				break;
			case "item", "all" :
				var returndata = service.getProject(Tools.getCookie("user_id"));
				timelineModuleInit(returndata);
				break;
			default :
				//这种方式可能不安全
				var returndata = service.search(Tools.getCookie("user_id"), value);
				timelineModuleInit(returndata);
				
		}
	})

	var $search2 = $('.js-search2');
	$search2.find('button').bind('click', function() {
		var value = $search2.find('select').val();
		//判断权限
		if(service.getPopedom() == "visitor" ) {
			switch(value) {
				case "业务逻辑复杂": 
					alert("这里只有部分项目，其他需要联系leejie");
					break;
			}
		}
		var returndata = service.search(Tools.getCookie("user_id"), value);
		timelineModuleInit(returndata);

	})
}




