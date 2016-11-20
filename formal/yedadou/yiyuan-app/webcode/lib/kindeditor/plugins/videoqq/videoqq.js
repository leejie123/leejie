//插入腾讯视频
KindEditor.plugin('videoqq',function(k){
	var self = this, name = 'videoqq', lang = self.lang(name + '.');
	self.plugin.flash = {
		edit : function() {
			var dialog = k.dialog({
						width : 500,
						height:440,
						title : '插入腾讯视频代码',
						body : '<div style="padding:20px;    line-height: 20px;"><div class="ke-dialog-row"><label for="videourl">视频代码 :</label><input style="width: 80%;height: 30px;" type="text" id="videourl" class="ke-input-text" name="videourl" value=""></div><span style="color: #f00;">注意：请使用视频网站提供的通用代码：分享->通用代码 </span><br><br><img src="/data/systemassets/vqqTip.png" width="90%"></div>',
						closeBtn : {
							name : '关闭',
							click : function(e) {
								dialog.remove();
							}
						},
						yesBtn : {
							name : '确定',
							click : function(e) {
								var html=KVideourl.val();
								self.insertHtml(html);
								dialog.remove();
							}
						},
						noBtn : {
							name : '取消',
							click : function(e) {
								dialog.remove();
							}
						}
					});
			var div = dialog.div;
			var KVideourl = k('[name="videourl"]', div);
		}
	};
	self.clickToolbar(name, self.plugin.flash.edit);
});
