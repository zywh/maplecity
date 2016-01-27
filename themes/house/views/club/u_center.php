<!-- 地址开始 -->
     <div class="cl"></div>
	 <div class="nytb_dz">
		   <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <span>会员中心</span>
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
			     <div class="hyzx_lm_label">个人基本信息</div>
				 <div class="hyzx_right_cont">
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">枫之都账号：</div>
							 <div class="hyzx_info_center"><input id="username" class="hyzx_input1" name="" type="text" value="<?php echo $model->username; ?>" readonly="readonly"/></div>
							 <a href="<?php echo Yii::app()->createUrl('club/changePassword'); ?>" class="hyzx_info_right hyzx_xgmmwz">修改密码</a>
							 <div class="cl"></div>
					   </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">手机号码：</div>
							 <div class="hyzx_info_center"><input id="phone" class="hyzx_input1" name="" type="text" readonly="readonly" value="<?php echo $model->phone; ?>" /></div>
							 <div class="hyzx_info_right hyzx_info_zs">不可直接修改手机号码</div>
							 <div class="cl"></div>
					   </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">昵称：</div>
							 <div class="hyzx_info_center"><input id="nickname" class="hyzx_input1" name="" type="text" value="<?php echo $model->nickname; ?>" /></div>
							 <div class="hyzx_info_right hyzx_info_zs">不超过10个字</div>
							 <div class="cl"></div>
					   </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">称谓：</div>
							 <div class="hyzx_info_center hyzx_info_dx"><span>
							 <input class="radio gender" name="gender" type="radio" value="先生" <?php if($model->gender == '先生'){ echo 'checked="checked"'; } ?> /><span> <span>先生</span><span>
							 <input class="radio gender" name="gender" type="radio" value="女士" <?php if($model->gender == '女士'){ echo 'checked="checked"'; } ?> /><span> <span>女士</span></div>
							 <div class="cl"></div>
					   </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">所在城市：</div>
							 <div class="hyzx_info_center"><input id="province" class="hyzx_input2" name="" type="text" value="<?php echo $model->province; ?>"  onclick="pop('province');"/> <input  id="city" class="hyzx_input2 hyzx_ju"  name="" type="text" value="<?php echo $model->city; ?>"  onclick="pop('city');"/></div>
							 <div class="cl"></div>
					   </div>
					   <div class="hyzx_ts">
					         <span class="hyzx_ts_one">有符合以下条件的项目请通知我</span>
					         <?php $inform_type_arr = explode('|', $model->inform_type); ?>
					         <input name="" type="checkbox" value="电话通知" class="inform_type" <?php if(in_array('电话通知', $inform_type_arr)){ echo 'checked="checked"'; } ?> /> <span>电话通知</span>&nbsp;
					         <input name="" type="checkbox" value="短信通知" class="inform_type" <?php if(in_array('短信通知', $inform_type_arr)){ echo 'checked="checked"'; } ?> /><span>短信通知</span>
					         <div class="cl"></div>
				       </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">城市：</div>
							 <div class="hyzx_info_center"><input class="hyzx_input1" name="" type="text" id="aim_city" value="<?php echo $model->aim_city; ?>" /></div>
							 <div class="cl"></div>
					   </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">用途：</div>
							 <div class="hyzx_info_center hyzx_yt">
							 <?php $purpose_arr = explode('|', $model->purpose); ?>
								 <input name="" type="checkbox" value="投资" class="purpose" <?php if(in_array('投资', $purpose_arr)){ echo 'checked="checked"'; } ?> /><span> 投资</span>
								 <input name="" type="checkbox" value="移民" class="purpose" <?php if(in_array('移民', $purpose_arr)){ echo 'checked="checked"'; } ?> /> <span> 移民</span>
								 <input name="" type="checkbox" value="教育" class="purpose" <?php if(in_array('教育', $purpose_arr)){ echo 'checked="checked"'; } ?> /> <span> 教育</span>
								 <input name="" type="checkbox" value="其他" class="purpose" <?php if(in_array('其他', $purpose_arr)){ echo 'checked="checked"'; } ?> /> <span> 其他</span>
							 </div>
							 <div class="cl"></div>
					   </div>
				       <div class="hyzx_info_list">
					         <div class="hyzx_info_left">补充说明：</div>
							 <div class="hyzx_info_center"><input class="hyzx_input3" name="" type="text" id="instruction" value="<?php echo $model->instruction; ?>" /></div>
							 <div class="cl"></div>
					   </div>
					   <a class="hyzx_bc" href="javascript:;" id="save_btn">提交</a>
				 </div>
		   </div>
		   <div class="cl"></div>
	 </div>
<!-- 会员中心结束 -->
<div id="choose-box-wrapper">
  <div id="choose-box">
    <div id="choose-box-title"> <span>选择省份/城市</span> </div>
    <div id="choose-a-province"> </div>
    <div id="choose-a-school"> </div>
    <div id="choose-box-bottom">
      <input type="botton" onclick="hide()" value="关闭" />
    </div>
  </div>
</div>
<script type="text/javascript">
	//弹出窗口
	function pop(ele){
		//将窗口居中
		makeCenter();

		//初始化省份列表
		initProvince(ele);

		//默认情况下, 给第一个省份添加choosen样式
		$('[province-id="1"]').addClass('choosen');

		//初始化大学列表
		initCity(1, ele);
	}
	//隐藏窗口
	function hide()
	{
		$('#choose-box-wrapper').css("display","none");
	}

	function initProvince(ele)
	{
		//原先的省份列表清空
		$('#choose-a-province').html('');
		for(i=0;i<cityList.length;i++)
		{
			$('#choose-a-province').append('<a class="province-item" province-id="'+cityList[i].id+'">'+cityList[i].name+'</a>');
		}
		//添加省份列表项的click事件
		$('.province-item').bind('click', function(){
				var item=$(this);
				var province = item.attr('province-id');
				var choosenItem = item.parent().find('.choosen');
				if(choosenItem)
					$(choosenItem).removeClass('choosen');
				item.addClass('choosen');
				//更新大学列表
				initCity(province, ele);
			}
		);
	}

	function initCity(provinceID, ele)
	{
		//原先的学校列表清空
		$('#choose-a-school').html('');
		var citys = cityList[provinceID-1].city;
		for(i=0;i<citys.length;i++)
		{
			$('#choose-a-school').append('<a class="school-item" school-id="'+citys[i].id+'">'+citys[i].name+'</a>');
		}
		//添加大学列表项的click事件
		$('.school-item').bind('click', function(){
				var item=$(this);
				var school = item.attr('school-id');
				//更新选择大学文本框中的值
				$('#'+ele).val(item.text());
				//关闭弹窗
				hide();
			}
		);
	}

	function makeCenter()
	{
		$('#choose-box-wrapper').css("display","block");
		$('#choose-box-wrapper').css("position","absolute");
		$('#choose-box-wrapper').css("top", Math.max(0, (($(window).height() - $('#choose-box-wrapper').outerHeight()) / 2) + $(window).scrollTop()) + "px");
		$('#choose-box-wrapper').css("left", Math.max(0, (($(window).width() - $('#choose-box-wrapper').outerWidth()) / 2) + $(window).scrollLeft()) + "px");
	}
</script>
<script type="text/javascript">
	$(function(){
		$("#save_btn").click(function(event) {
			/* Act on the event */
			var nickname = $("#nickname").val();
			var gender = $(".gender:checked").val();
			var province = $("#province").val();
			var city = $("#city").val();
			var inform_type_arr = $(".inform_type:checked");
			var inform_type = [];
			inform_type_arr.each(function(index, el) {
				inform_type.push($(this).val());
			});
			inform_type = inform_type.join('|');
			var aim_city = $("#aim_city").val();
			var purpose_arr = $(".purpose:checked");
			var purpose = [];
			purpose_arr.each(function(index, el) {
				purpose.push($(this).val());
			});
			purpose = purpose.join('|');
			var instruction = $("#instruction").val();

			var data = {
				'nickname': nickname,
				'gender': gender,
				'province': province,
				'city': city,
				'inform_type': inform_type,
				'aim_city': aim_city,
				'purpose': purpose,
				'instruction': instruction
			};

			if(nickname.trim().split("").length <= 10){
				$.post('<?php echo Yii::app()->createUrl('club/updateInfo'); ?>', data, function(json) {
				/*optional stuff to do after success */
					alert(json.msg);
					window.location.reload();
				}, 'json');
			}else{
				alert("昵称不能超过10个字");
			}
		});
	});
</script>