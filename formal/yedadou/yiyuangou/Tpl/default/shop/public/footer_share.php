<!--分享提示框-->
		<div id="footerShareTip" class="mask-bg hide" data-auto-hide>
			<div class="middle-outer">
				<div class="middle-inner text-center" id="shareimg">
					<div id="shareimg">
						<div><img src="{__STATIC_URL__}/public/front/default/images/sharebak.png" class="bak"></div>
						<div><img src="<?php echo !empty($footerConfig[2]) ? $footerConfig[2] : ''; ?>" class="qcode" alt=""></div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 您尚未关注商城公众号，无法成为分享客！ -->
		<div class="modal fade" id="noAttentionTip1" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">提示</h4>
		      </div>
		      <div class="modal-body">
		       您尚未关注商城公众号，无法成为<?php echo !empty($footerConfig[5]) ? $footerConfig[5] : '分享客'; ?>！
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		        <a type="button" class="btn btn-attentionMe" href="http://mp.weixin.qq.com/s?__biz=MzA5Nzg1NTM5NQ==&mid=215759124&idx=1&sn=45069e2a0ce8e0c7e938786583a9736e#rd">立即关注</a>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- 购买本商城任意商品后，即可成为分享客！ -->
		<div class="modal fade" id="noAttentionTip2" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">提示</h4>
		      </div>
		      <div class="modal-body">
		       购买本商城任意商品后，即可成为<?php echo !empty($footerConfig[5]) ? $footerConfig[5] : '分享客'; ?>！
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">好的</button>
		      </div>
		    </div>
		  </div>
		</div>