<!-- 地址开始 -->
     <div class="cl"></div>
	 <div class="nytb_dz">
		   <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> ><span>修改密码</span>
	 </div>
<!-- 地址结束 -->
<!-- 会员中心开始 -->
     <div class="hyzx">
	       <div class="hyzx_left">
		         <div class="hyzx_left_one"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/club/hyzx_tp.jpg" /></div>
				 <div class="hyzx_left_two">
				       <div class="hyzx_lm">
					        <div class="hyzx_lm_label">我的枫之都</div>
							<div class="hyzx_lm_cont">
							      <a href="<?php echo Yii::app()->createUrl('club/uCenter'); ?>" class="hyzx_lm_cont_info">我的个人信息</a>
							      <a href="<?php echo Yii::app()->createUrl('club/changePassword'); ?>" class="hyzx_lm_cont_info">修改密码</a>
							</div>
					   </div>
				       <div class="hyzx_lm">
					        <div class="hyzx_lm_label">房源管理</div>
							<div class="hyzx_lm_cont">
							      <a href="<?php echo Yii::app()->createUrl('club/myCollection'); ?>" class="hyzx_lm_cont_info">我收藏的房源</a>
							      <a href="<?php echo Yii::app()->createUrl('club/viewHistory'); ?>" class="hyzx_lm_cont_info">我浏览的房源</a>
							</div>
					   </div>
				 </div>
		   </div>
		   <div class="hyzx_right">
		         <div class="hyzx_right_one">您可以随时更改个性信息，以便提供更适合您的信息和服务。在完成所有必要的变更后，请点击页面底部的“提交”按钮确认更新。</div>
			     <div class="hyzx_lm_label">修改密码</div>
				 <div class="hyzx_right_cont  hyzx_xgmm">
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">输入旧密码：</div>
							 <div class="hyzx_info_center"><input class="hyzx_input1" name="" type="password" id="old_password" /></div>
							 <div class="cl"></div>
					   </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">输入新密码：</div>
							 <div class="hyzx_info_center"><input class="hyzx_input1" name="" type="password" id="new_password" /></div>
							 <div class="cl"></div>
					   </div>
					   <a class="hyzx_bc hyzx_xgmm_btn" href="javascript:;" id="update">提交</a>
				 </div>
		   </div>
		   <div class="cl"></div>
	 </div>
<!-- 会员中心结束 -->
<script type="text/javascript">
	$(function(){
		$("#update").click(function(){
			var old_password = $("#old_password").val();
			var new_password = $("#new_password").val();
			var data = {
				'old_password': old_password,
				'new_password': new_password
			}
			$.post('<?php echo Yii::app()->createUrl('club/updatePassword'); ?>', data, function(json) {
				/*optional stuff to do after success */
				if(json.status == 200){
					alert(json.msg);
					window.location.href = '<?php echo Yii::app()->createUrl("club/uCenter"); ?>';
				}else{
					alert(json.msg);
				}
			}, 'json');
		});
	});
</script>