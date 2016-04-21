<!-- 地址开始 -->
     <div class="cl"></div>
	 <div class="nytb_dz">
		   <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> ><span>我收藏的房源</span>
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
      <?php
    $db = Yii::app()->db;
    ini_set("log_errors", 1);
	ini_set("error_log", "/tmp/php-error.log");

	function get_firstimage($county,$ml_num){
		
		$county = preg_replace('/\s+/', '', $county);
		$county = str_replace("&","",$county);
		$dir="mlspic/crea/".$county."/Photo".$ml_num."/";
		#$dir="mlspic/crea/creamid/".$county."/Photo".$ml_num."/";
		$num_files = 0;
		if(is_dir($dir)){
			$picfiles = scandir($dir);
			$num_files = count(scandir($dir))-2;
		}
		if ( $num_files >= 1)    {
			return $dir.$picfiles[2];

		}else { return 'static/images/zanwu.jpg';}
	}
	
	function get_tn_image($county,$ml_num){
		
		$county = preg_replace('/\s+/', '', $county);
		$county = str_replace("&","",$county);
		$dir="mlspic/crea/creatn/".$county."/Photo".$ml_num."/";
		$num_files = 0;
		if(is_dir($dir)){
			$picfiles = scandir($dir);
			$num_files = count(scandir($dir))-2;
		}
		if ( $num_files >= 1)    {
			
			$s = implode(",",array_slice($picfiles,2,3)); //return 3 comma seperated list with offset 2 which is subdir . and ..
			$s = str_replace("Photo",$dir."Photo",$s); // Insert DIR in front
			return $s;
		} else { return 'static/images/zanwu.jpg';}
	}	
	
	function searchurl($arg, $reset = 1) {
	
		$url = Yii::app()->createUrl('house/index', array('type' => $type,'cd1' => 0, 'cd2' => 0, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); 
		return $arg.$reset ;
}
$pic1 = get_firstimage($county,$ml_num);
	?>
           
		   <div class="hyzx_right">
		         <div class="hyzx_right_one">有喜欢的房源赶快收藏起来！以列表形式清晰显示，您可以轻松对比、快捷查询。 </div>
			     <div class="hyzx_lm_label">我收藏的房源</div>
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
	                <div class="syss_fclist_left"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>&cd1=<?php echo $_GET["cd1"];?>&cd2=<?php echo $_GET["cd2"];?>&cd3=<?php echo $_GET["cd3"];?>&cd4=<?php echo $_GET["cd4"];?>&cd5=<?php echo $_GET["cd5"];?>&cd6=<?php echo $_GET["cd6"];?>&cd7=<?php echo $_GET["cd7"];?>&cd8=<?php echo $_GET["cd8"];?>&cd9=<?php echo $_GET["cd9"];?>&cd10=<?php echo $_GET["cd10"];?>&cd11=<?php echo $_GET["cd11"];?>&cd12=<?php echo $_GET["cd12"];?>&cd12_2=<?php echo $_GET["cd12_2"];?>&cd12_3=<?php echo $_GET["cd12_3"];?>&cd12_4=<?php echo $_GET["cd12_4"];?>&cd12_5=<?php echo $_GET["cd12_5"];?>&cd13=<?php echo $_GET["cd13"];?>&cd14=<?php echo $_GET["cd14"];?>&cd15=<?php echo $_GET["cd15"];?>&cd16=<?php echo $_GET["cd16"];?>&cd17=<?php echo $_GET["cd17"];?>&cd18=<?php echo $_GET["cd18"];?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $pic1; ?>" width="261" height="280" /></a></div>
	                <div class="syss_fclist_right" style="height:auto">
                    <div class="syss_zt"><?php if ($house->s_r == "Sale") {
        echo '出售';
    } else {
        echo '出租';
    } ?></div>
                    <div class="syss_fcone">MSL：<?php echo $house->ml_num; ?></div>
                    <div class="syss_fctwo"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>" target="_blank"><?php echo $house->name; ?></a></div>
                    <div class="syss_fcthree">
                        <?php
		$county = $house->county;
		$ml_num = $house->ml_num;
		$imglist = explode(',',get_tn_image($county,$ml_num));
		foreach ($imglist as $value) {
                            ?>
                            <div class="syss_fcthree_pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php 
			echo $value; 
			?>" width="92" height="73" /></div>
    <?php } ?>
                        <div class="cl"></div>
                    </div>
                    <div class="syss_fcfour">
                        <div class="syss_fcfour_one">房屋面积：<?php echo $house->sqft; ?>平方英尺</div>
                        <div class="syss_fcfour_one">物业类型：<?php echo $house->propertyType->name; ?></div>
                        <div class="syss_fcfour_one">挂牌时间：<?php echo $house->pix_updt; ?></div>
                        <div class="syss_fcfour_one">挂牌价格：<span><?php 
		  
		  if ( $house->s_r == "Sale") {
			$str= $house->lp_dol/10000 . "  万加币";
			echo $str;
			} 
			else {
			$str = $house->lp_dol . "  加元/月";
			echo $str;  
		  }
		  
		  ?></span></div>
                    </div>
                    <div class="syss_fcfive">
                        <div class="syss_fcfiveone">
                            <span  class="syss_fc_fj"><?php echo $house->br; ?></span>
                            <span  class="syss_fc_cs"><?php echo $house->bath_tot; ?></span>
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
			$.post('<?php echo Yii::app()->createUrl("club/delCollection"); ?>', {'id': id}, function(json) {
				/*optional stuff to do after success */
				if(json.status == 200){
					alert(json.msg);
					window.location.reload();
				}else if(json.status == 500){
					alert(json.msg);
				}else{
					alert(json.msg);
					window.history.back();
				}
			}, 'json');
		});

		$("#del_all").click(function(){
			if($("#select_all")[0].checked){
				$.post('<?php echo Yii::app()->createUrl("club/delAllCollection"); ?>', function(json) {
					/*optional stuff to do after success */
					if(json.status == 200){
						alert(json.msg);
						window.location.reload();
					}else if(json.status == 500){
						alert(json.msg);
					}else{
						alert(json.msg);
						window.history.back();
					}
				}, 'json');
			}else{
				alert("未选择房源！");
			}
		});
	});
</script>