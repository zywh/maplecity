<script>
function statsurl (chart){
	
	var url = '<?php echo Yii::app()->createUrl('stats/current'); ?>' + '#' + chart;
	console.log(url);
	window.open(url);
}
</script>
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


	?>
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
					  <div class="hyzx_fy_right"></div>
					  <div class="cl"></div>
				 </div>
				 <div class="hyzx_right_cont">
				 	<?php 
					$array=explode(',',$_COOKIE["fzd_house"]);
					foreach ($array as $house): ?>
	            <div class="syss_fclist">
                <?php 		
		$sqlfy = "select * from h_house where ml_num = '".$house."'";
		$resultsqlfy = $db->createCommand($sqlfy)->query();
		foreach($resultsqlfy as $housefy){
			$idhousefy= $housefy["id"];
			//$house_image = $housefy["image"];
			$county = $housefy["county"];
			$is_sell = $housefy["is_sell"];
			$ml_num = $housefy["ml_num"];
			$pic = get_firstimage($county,$ml_num);
			$addr=$housefy["addr"];
			$community=$housefy["community"];
			$pix_updt=$housefy["pix_updt"];
			$lp_dol=$housefy["lp_dol"];
			$br=$housefy["br"];
			$bath_tot=$housefy["bath_tot"];
			$sqft=$housefy["sqft"];
		}
		?>
	                <div class="syss_fclist_left"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $idhousefy)); ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $pic; ?>" width="261" height="307" /></a></div>
	                <div class="syss_fclist_right">
                    <div class="syss_zt"><?php if ($is_sell == 1) {
        echo '在售';
    } else {
        echo '出租';
    } ?></div>
                    <div class="syss_fcone">MSL：<?php echo $$ml_num; ?></div>
                    <div class="syss_fctwo"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $idhousefy)); ?>" target="_blank"><?php echo $house; ?></a></div>
                    <div class="syss_fcthree">
                        <?php
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
                        <div class="syss_fcfour_one">房屋面积：<?php echo $hsqft; ?>平方英尺</div>
                        <div class="syss_fcfour_one">物业类型：<?php echo $addr; ?></div>
                        <div class="syss_fcfour_one">挂牌时间：<?php echo $pix_updt; ?></div>
                        <div class="syss_fcfour_one">挂牌价格：<span><?php echo $lp_dol/10000; ?>万加元</span></div>
                    </div>
                    <div class="syss_fcfive">
                        <div class="syss_fcfiveone">
                            <span  class="syss_fc_fj"><?php echo $br; ?></span>
                            <span  class="syss_fc_cs"><?php echo $bath_tot; ?></span>
                        </div>
                        <div class="syss_fcfivethree"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $idhousefy)); ?>#fydt" target="_blank">查看地图</a></div>
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