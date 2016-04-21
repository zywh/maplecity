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



<script src="/themes/house/js/jquery.min.js"></script>

<a name="001" id="001"></a>
<div class="js">
                 <div class="js_list">
                        <ul>
<li><a href="index.php?r=enjoy/index&sheng=3">安大略省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=4">BC省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=5">艾伯塔省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=7">新不伦瑞克省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=8">新斯科舍省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=9">爱德华王子岛省</a></li>
<li><a href="index.php?r=enjoy/index&sheng=10">纽芬兰及拉布拉多</a></li>
                             
                             
                        </ul>
                 </div>
</div>


<div class="js_content">

<?php 
$db = Yii::app()->db;
$sheng=$_GET["sheng"];
if($sheng==""){
$sql = "select * from h_house where lp_dol>3000000 and city_id=3 limit 0,6 ";
}else{
$sql = "select * from h_house where lp_dol>3000000 and city_id ='".$sheng."' limit 0,6";
}
$results = $db->createCommand($sql)->query();
if(count($results)==0){
echo "<span style='font-size:16px;'>抱歉！".$sheng."省暂无房源</span>";
}
else{

foreach($results as $house){
?>


  <div class="con_list">
  <?php 
	$county = $house["county"];
	$county = preg_replace('/\s+/', '', $county);
	$county = str_replace("&","",$county);
	$dir="mlspic/crea/".$county."/Photo".$house["ml_num"]."/";
	$num_files = 0;
	if(is_dir($dir)){
		$picfiles =  scandir($dir);
		$num_files = count(scandir($dir))-2;
	}
	
    if ( $num_files < 1)    {
	  ?> <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$house["id"])); ?>"  target="_blank"><img src='/static/images/zanwu.jpg' width="467" height="280"/></a> <?php 
	}else{
	  $filePath = $dir.$picfiles[2];
	  ?> <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$house["id"])); ?>"  target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php 
	  echo $filePath; ?>" width="467" height="280"/></a>
	<?php }?>
  
			 <div class="con_des">
					   <div class="con_fl">
							  <p><span>地址：</span><?php echo $house["addr"]; ?><br />
								 <span>价格：</span><span class="red"><?php echo $house["lp_dol"] / 10000; ?>万加币</span><br />
								 <span>城市：</span><?php echo $house["municipality"].",".$house["county"];?><br />
								 <span> 户型：</span> <?php echo $house["br"]; ?>卧&nbsp;&nbsp;<?php echo $house["bath_tot"]; ?>卫&nbsp;&nbsp;<?php echo $house["num_kit"]; ?>厨
								
								 
							  </p>
					   </div>
					   <div  class="con_fr">
							<p><a  target="_blank" href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$house["id"])); ?>">点击查看详情>></a></p>
					   </div>
			 </div>
  </div>

<?php }}?>   
         
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