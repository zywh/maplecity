<link href="/themes/house/enjoy/images_index/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#img_scroll{width:1000px;height:480px; overflow:hidden;padding:8px; background-image:url(/themes/house/images/haozaibg.jpg); background-repeat:no-repeat;  margin:0 auto}
#img_small{width:255px;float:right;position:relative;height:150px;}
#img_small a{display:block;margin-bottom:5px;width: 230px;height: 150px;overflow: hidden;}
#img_small img{width: 230px;height:140px;}
#img_small .curr{width:226px;height:135px;position:absolute;left:0;top:0; border:3px solid #FF3300}
#img_big{width:710px;height:480px;float:left;position:relative;}
#img_big a{display:none;position:absolute;left:0px;top:0;}
.con_fr a:hover{ color:#FFFF00}
.nytb_dz a:hover{ color:#FF6600}
.syss_fcfivetwo a:hover{ color:#FF6600}
</style>
<div style="width:100%; height:251px; text-align:center; background-color:#6abde9">
     <img src="/themes/house/enjoy/images_index/ban.jpg"/>
</div>
 <div class="nytb_dz" style="width: 1002px; padding-bottom:0px;"> <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> &gt; <span style="font-size:14px;">豪宅鉴赏</span> </div>
<div class="nav_bottom">
<!-- 代码部分begin -->
<div id="img_scroll">
    <div id="img_small">
        <a href="#1"><img src="/themes/house/images/PhotoC3185934-1.jpg" width="230" height="150" /></a>
        <a href="#2"><img src="/themes/house/images/PhotoC3185934-20.jpg" width="230" height="150" /></a>
        <a href="#3"><img src="/themes/house/images/PhotoC3194983-1.jpg" width="230" height="150" /></a>
        <a class="curr" href="#1"></a>
    </div>
    <div id="img_big"> 
   		<a style="display:block;" href="#"><img src="/themes/house/images/PhotoC3185934-1.jpg" width="700" height="465"></a> 
        <a href="#"><img src="/themes/house/images/PhotoC3185934-20.jpg" width="700" height="465"></a> 
        <a href="#"><img src="/themes/house/images/PhotoC3194983-1.jpg" width="700" height="465"></a> 
    </div>
</div>
<script src="/themes/house/js/jquery.min.js"></script>
<script type="text/javascript">   
$(function($){
	var showtime = 0;
	$("#img_small a:lt(3)").mouseover(function(){
		var showtime = $("#img_small a:lt(3)").index(this);
		showImg(showtime)	
	});
	$("#img_scroll").hover(function(){
		if(settime)clearInterval(settime);
		},function(){
		settime = setInterval(function(){
			showImg(showtime)
			showtime++;
			if(showtime==3){showtime=0;}
		} , 3000);
	});
	var settime = setInterval(function(){
		showImg(showtime)
		showtime++;
		if(showtime==3){showtime=0;}
	} , 3000);
})
function showImg(i){
	var Link = $("#img_small").eq(i).find("a").attr("href");
	$("#img_small .curr").attr("href",Link);
	$("#img_big a").eq(i).fadeIn(800).siblings("a").fadeOut(600);
	$("#img_small .curr").animate( { top: (i*155) } , 300);
}
</script> 
<!-- 代码部分end -->
      
</div>
<a name="001" id="001"></a>
<div class="js">
                 <div class="js_list">
                        <ul>
<li><a href="index.php?r=enjoy/index&sheng=Ontario#001">安大略省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=BC#001">BC省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=Alberta#001">艾伯塔省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=Quebec#001">魁北克省</a></li>
                             
                             
                        </ul>
                 </div>
</div>


<div class="js_content">
            <div class="enjoydownlabel_right" style="float:left">
                <span>排序方式</span>
                <?php if(!empty($time_sort)){
                    if($time_sort == 'DESC'){
                        ?>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort'=>'ASC')); ?>" class="pxfs1">时间</a>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort' => 0, 'price_sort'=>'DESC')); ?>">总价</a>
                    <?php }else{ ?>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort'=>'DESC')); ?>" class="pxfs2">时间</a>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort' => 0, 'price_sort'=>'DESC')); ?>">总价</a>
                    <?php } ?>
                <?php }elseif(!empty($price_sort)){
                    if($price_sort == 'DESC'){
                        ?>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort'=>'DESC')); ?>">时间</a>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort' => 0, 'price_sort'=>'ASC')); ?>" class="pxfs1">总价</a>
                    <?php }else{ ?>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort'=>'DESC')); ?>">时间</a>
                        <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort' => 0, 'price_sort'=>'DESC')); ?>" class="pxfs2">总价</a>
                    <?php } ?>
                <?php }else{ ?>
                    <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort'=>'DESC')); ?>">时间</a>
                    <a href="<?php echo Yii::app()->createUrl('enjoy/index', array('city'=>$cur_city->id, 'time_sort' => 0, 'price_sort'=>'DESC')); ?>">总价</a>
                <?php } ?>
            </div>
            <div style="clear:both; height:15px;"></div>
<?php 
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
foreach($house_list as $house){

		$county = $house->county;
		$ml_num = $house->ml_num;
		$pic1 = get_firstimage($county,$ml_num);
?>


                      <div class="con_list">
                       <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$house["id"])); ?>"  target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $pic1; ?>" width="467" height="280"/></a>
                                 <div class="con_des">
                                           <div class="con_fl">
                                                  <p><span>地址：</span><?php echo $house["addr"]; ?><br />
                                                     <span>价格：</span><span class="red"><?php echo $house["lp_dol"] / 10000; ?>万加币</span><br />
                                                     <span>挂牌时间：</span><?php echo $house["pix_updt"];?><br />
                                                     <span> 户型：</span> <?php echo $house["br"]; ?>卧&nbsp;&nbsp;<?php echo $house["bath_tot"]; ?>卫&nbsp;&nbsp;<?php echo $house["num_kit"]; ?>厨
                                                    
                                                     
                                                  </p>
                                           </div>
                                           <div  class="con_fr">
                                                <p><a  target="_blank" href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$house["id"])); ?>">点击查看详情>></a></p>
                                           </div>
                                 </div>
                      </div>

<?php }?>   
         
 </div>
 		   <div class="cl"></div>
		   <div class="page">
                    <?php
                    $this->widget('CLinkPager',array(
                        'header'         =>'',
                        'firstPageLabel' => '',
                        'lastPageLabel'  => '',
                        'prevPageLabel'  => '<<',
                        'nextPageLabel'  => '>>',
                        'pages'          => $pages,
                        'maxButtonCount' => 6,
                        'cssFile'        => 'themes/house/css/pager.css'
                    ));
                    ?>
        	</div>
<!-- 豪宅鉴赏结束 -->
<script type="text/javascript">
    //豪宅列表
    $(".enjoy_hzjs_down .enjoydown_hzjs_list:eq(0)").show();
    $(".enjoydown_hzjs_tab span").click(function(){
        var r=$(this).index();
        $('.enjoy_hzjs_down .enjoydown_hzjs_list:eq('+r+')').show().siblings().hide();
        $(this).addClass("spanon").siblings().removeClass("spanon");
    });

    $(document).ready(function(){
        $(".enjoydown_hzjs_tab").find('[data-index="<?php echo $city_id; ?>"]').addClass('spanon');

        $(".enjoydown_list").mouseover(function(){
            $(this).find('.enjoydown_list_info').hide();
            $(this).find('.enjoydown_list_xx').show();
        });
        $(".enjoydown_list").mouseout(function(){
            $(this).find('.enjoydown_list_info').show();
            $(this).find('.enjoydown_list_xx').hide();
        });
    });
</script>