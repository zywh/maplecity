<!-- 地址开始 -->
     <div class="cl"></div>
	 <div class="nytb_dz">
		   <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> ><span>我浏览的房源</span>
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
		         <div class="hyzx_right_one">有喜欢的房源赶快收藏起来！以列表形式清晰显示，您可以轻松对比、快捷查询。 </div>
			     <div class="hyzx_lm_label">我浏览的房源</div>
				 <div class="hyzx_fy">
				      <div class="hyzx_fy_left">
					        <div class="hyzx_fy_left_one">选择：</div>
							<div class="hyzx_fy_left_two"><input name="" type="checkbox" value="" id="select_all" /></div>
							<div class="hyzx_fy_left_three">全部</div>
							<div class="hyzx_fy_left_four"><a href="javascript:;" id="del_all">删除</a></div>
							<div class="cl"></div>
					  </div>
					  <div class="hyzx_fy_right">共<?php echo $count; ?>条记录</div>
					  <div class="cl"></div>
				 </div>
				 <div class="hyzx_right_cont">
				 	<?php foreach ($house_list as $house): ?>
	            <div class="syss_fclist">
	                <div class="syss_fclist_left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $house->house_image; ?>" width="261" height="307" /></div>
	                <div class="syss_fclist_right">
                    <div class="syss_zt"><?php if ($house->is_sell == 1) {
        echo '在售';
    } else {
        echo '停售';
    } ?></div>
                    <div class="syss_fcone">MSL：<?php echo $house->mls_code; ?></div>
                    <div class="syss_fctwo"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>" target="_blank"><?php echo $house->name; ?></a></div>
                    <div class="syss_fcthree">
                        <?php
                        $image_list = unserialize($house->image_list);
                        $image_num = count($image_list) > 3 ? 3 : count($image_list);
                        for ($i = 0; $i < $image_num; $i++) {
                            ?>
                            <div class="syss_fcthree_pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $image_list[$i]['file']; ?>" width="92" height="73" /></div>
    <?php } ?>
                        <div class="cl"></div>
                    </div>
                    <div class="syss_fcfour">
                        <div class="syss_fcfour_one">房屋面积：<?php echo $house->house_area; ?>平方英尺</div>
                        <div class="syss_fcfour_one">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：<?php echo $house->propertyType->name; ?>&nbsp;/&nbsp;<?php echo $house->investType->name; ?></div>
                        <div class="syss_fcfour_one">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;区：<?php echo $house->district->name; ?></div>
                        <div class="syss_fcfour_one">总&nbsp;金&nbsp;额：<span><?php echo $house->total_price; ?>万加币</span></div>
                    </div>
                    <div class="syss_fcfive">
                        <div class="syss_fcfiveone">
                            <span  class="syss_fc_fj"><?php echo $house->bedroom_num; ?></span>
                            <span  class="syss_fc_cs"><?php echo $house->toilet_num; ?></span>
                        </div>
                        <div class="syss_fcfivethree"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>#fydt" target="_blank">查看地图</a></div>
                    </div>
                </div>
                <div class="cl"></div>
                <a class="hyzx_scll del" href="javascript:;" data-id="<?php echo $house->id; ?>">删除收藏</a>
            </div>
				 	<?php endforeach ?>
				 </div>
		   </div>
		   <div class="cl"></div>
		   <div class="page">
            <?php
            $this->widget('CLinkPager', array(
                'header' => '',
                'firstPageLabel' => '',
                'lastPageLabel' => '',
                'prevPageLabel' => '<<',
                'nextPageLabel' => '>>',
                'pages' => $pages,
                'maxButtonCount' => 6,
                'cssFile' => 'themes/house/css/pager.css'
            ));
            ?>
        	</div>
	 </div>
<!-- 会员中心结束 -->
<script type="text/javascript">
	$(function(){
		$(".del").click(function(){
			var id = $(this).attr('data-id');
			$.post('<?php echo Yii::app()->createUrl("club/delHistory"); ?>', {'id': id}, function() {
				/*optional stuff to do after success */
				window.location.reload();
			});
		});

		$("#del_all").click(function(){
			if($("#select_all")[0].checked){
				$.post('<?php echo Yii::app()->createUrl("club/delAllHistory"); ?>', function() {
					/*optional stuff to do after success */
					window.location.reload();
				});
			}else{
				alert("未选择房源！");
			}
		});
	});
</script>