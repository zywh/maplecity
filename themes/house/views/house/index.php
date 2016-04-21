<!--新增页面样式-->
<link rel="stylesheet" type="text/css" href="/new/css/style.css">
<script type="text/javascript" src="/new/js/script.js"></script>
<link href="/themes/house/css/xinjia.css?<?php echo rand();?>" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/themes/house/js/jquery-1.12.2.min.js"></script>
<script src="/static/js/jquery/jquery-ui.min.js"></script>


<script>

function statsurl (chart){
	
	var url = '<?php echo Yii::app()->createUrl('stats/current'); ?>' + '#' + chart;
	console.log(url);
	window.open(url);
}

$(document).ready(function(){
       //回到头部
      $(".fh").click(function(){
         $("html,body").animate({scrollTop:0}, 250)
         ;//100为滚动条的位置，1000为滚动的时延
       });
	   
       //回到头部浮动效果
	   /*
		$(document).ready(function() {
				var fd=$(".topbox").offset().top;
				$(window).scroll(function(){
					var jtb=$(this).scrollTop();
					if(jtb>=fd){
						$(".topbox").addClass("fhone")
					}
					else{
						$(".topbox").removeClass("fhone")			
					}	
				 });
		   });
		  */ 
	  //top右侧弹出
	  $(".topone").mouseover(function(){
	      $(this).find(".back").show();
	  });
	  $(".topone").mouseout(function(){
	      $(this).find(".back").hide();
	  });
		   
       //浮动导航效果
		$(document).ready(function() {
				var jl=$(".nav").offset().top;
				$(window).scroll(function(){
					var djl=$(this).scrollTop();
					if(djl>=jl){
						$(".nav").addClass("navfd");
					}
					else{
						$(".nav").removeClass("navfd")			
					}	
				 });
		   });		   
		   
//导航下拉弹出
$(document).ready(function(){
   $(".navlist").mouseover(function(){
        $(this).find(".nav_up").addClass("on_a")
        $(this).find(".navtcbox").show();
   })
   $(".navlist").mouseout(function(){
        $(this).find(".nav_up").removeClass("on_a")
        $(this).find(".navtcbox").hide();
   })
   
})	

//搜索条件下拉
$(document).ready(function(){

   $(".syss_xltj").mouseover(function(){
        $(this).find(".syss_xltjdown").show();
   })
   $(".syss_xltj").mouseout(function(){
        $(this).find(".syss_xltjdown").hide();
   })
 //搜索条件删除  
   $(".fyss_tjsc a").click(function(){
       $(".fyss_tjqr").empty();
   })
   
   $(".fyss_qrtj_list").click(function(){
       $(this).remove();
   })
   
//评估报告
   $(".grtzone").mouseover(function(){
         $(this).find(".grtzonedown").show()
   })
   $(".grtzone").mouseout(function(){
         $(this).find(".grtzonedown").hide()
   })

   $(".grtzonedown a").click(function(){
          var cs=$(this).text();
         $(this).parent().parent().prev().val(cs);
   })
   $(".grtzone").mouseout(function(){
         $(this).find(".grtzonedown").hide()
   })

  })
  
  
//弹出内容

var winHeight=$(window).height();
var winWidth=$(window).width();

$(".tcbox").css({
	width:winWidth,
	height:winHeight,
	opacity:0.8
	});
	
var boxwidth=$(".tcboxnr").width();
var boxheight=$(".tcboxnr").height();
var boxLeft=(winWidth-boxwidth)/2
var boxTop=(winHeight-boxheight)/2

$(".tcboxnr").css({
	left:boxLeft,
	top:boxTop
	})
 
$(".tclabel").click(function() {
    $(this).parent().hide();
	$(this).parent().prev().hide();
}); 


$(".lja").click(function() {
    $(this).next().show();
	$(this).next().next().show();
});
  
	   	  
})


</script>

 <!-- nav结束 -->
  <style type="text/css">
.zczltwo span a{ color:#666666; text-decoration:none;}
.zczltwo span a:hover{ color:#FF6600}
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left:316px;
	top:-3px;
}
.fyss_tablist a:hover{    
color: #fff;
background: url(/themes/house/images/ss_btn.jpg) 0 0 no-repeat;
}
.syss_px a:hover{    
color: #fff;
background: url(/themes/house/images/ss_btn.jpg) 0 0 no-repeat;
}
.syss_btn a{ color:#FFFFFF}
.syss_btn a:hover{ color:#000000}
.syljcont a:hover{ color:#FF6600}
.nytb_dz a:hover{ color:#FF6600}
.syss_fcfivetwo a:hover{ color:#FF6600}
  </style>
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
  <div class="ss1"></div>
  <!--banner 结束--> 
  <a name="001" id="001" ></a>
  <!-- body开始 --> 
  <!-- 地址开始 -->
  <div class="cl"></div>
  <div class="nytb_dz"> <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> &gt; <span style="font-size:14px;">
  <?php if($_GET["type"]=="sale"){echo "房源搜索";}else{echo "房源出租";}?>
  
  </span> </div>
  <!-- 地址结束 --> 
<!-- 房源搜索开始 -->
<div class="fyss" >
    <div class="fyss_tab">
        <div class="fyss_tablist fyss_tablist_cur"><a href="javascript:void(0);">条件搜索</a></div>
        <div class="fyss_tablist"><a href="javascript:" onclick="mapSelect();" data-index="3">地图选房</a></div>
        <div class="cl"></div>
    </div>
    <div class="fyss_tj">
    

    
 <div class="fyss_tjlist" id="cd1">
            <div class="fyss_tjlistleft" onclick="statsurl('provincechart');"><a class="tooltips" href="#">省&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份:<span>点击查看省分布图</span></a>
			</div>
            <div class="fyss_tjlistcenter"><a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type,'cd1' => 0, 'cd2' => 0, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#fyss" class="fyss_tj_cur" data-index="0">不限</a></div>
            <div class="fyss_tjlistright fyss_tjlistone"  style="position:relative; overflow:hidden; height:28px;">
              
               <?php foreach ($city_list as $city) { ?>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $city['id'], 'cd2' => 0, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="<?php echo $city['id']; ?>">
                        <?php echo $city['name']; ?>
                    </a>
                <?php } ?>
                
 
            </div>
            <div class="cl"></div>
        </div>
 
<div class="fyss_tjlist" id="cd2">
	
	<div class="fyss_tjlistleft" onclick="statsurl('citychart');"><a class="tooltips" href="#">搜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;索:<span>点击查看城市分布图</span></a>
	</div>

	<div class="fyss_tjlistcenter">

		<div class="fyss_tjjg">
			<div class="fyss_tjjgcity">
			<form>
			<input name="cityname" type="text" required id="cityname" value="输入城市( 中文/英文 ) /地址/MLS#" 
			onblur="
			
			if (this.value == '') {
				    this.style.backgroundColor = '#fff';
					this.value = '输入城市( 中文/英文 ) /地址 /MLS#';
					this.style.color = '#aaa';
					var cd2 = '<?php echo $cd2;?>';
					if ( cd2 != '0' ){
					var url = '<?php echo Yii::app()->createUrl('house/index', array('type' => $type,'cd1' => $cd1, 'cd2' => 0,'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?> ' + '#001';
					location.href = url; }
		
			}" 
			onfocus="if (this.value != '') {
							this.value = '';
							this.style.backgroundColor = '#fff';
							this.style.color = '#000';
							//this.style.color = '#fff';
							//var cd2 = '<?php echo $cd2;?>';
							//if ( cd2 != '0' ){
							//var url = '<?php echo Yii::app()->createUrl('house/index', array('type' => $type,'cd1' => $cd1, 'cd2' => 0,'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?> ' + '#001';
							//location.href = url; }
					}"
				> 
				<input type="reset" value="x">
				</form>
</div>
		</div>
	</div>
	<script>
	 
  $(function() {
	var cache = {};
	

	$( "#cityname" ).autocomplete({
	  //source: "/index.php?r=house/getCityList",
		source: function(request, response) {
					var term = request.term; //cache result if term is typed in past
					if ( term in cache ) {
						response( cache[ term ] );
						return;
					}
			
					$.getJSON(
					"/index.php?r=house/getCityList", 
					{ term: term, cd1: '<?php echo $cd1;?>' },  //pass province for city search
					//response
					function( data, status, xhr ) {
						cache[ term ] = data;
						response( data );
						}
					);
			
		},
		minLength: 1,
		autoFocus: true,
		select: function( event, ui ) {
 
			var city = ui.item.id;
			var matches = city.match(/\d+/g);
			if ( matches != null) {
				console.log("MLS# is found:" + city);
				var url = 'index.php?r=house/view&id=' + city;
				location.href = url;
				
			} else {
				var url = '<?php echo Yii::app()->createUrl('house/index', array('type' => $type,'cd1' => $cd1, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)) ?> ' +'&cd2=' + city + '#001';
			
				if( city != '') {
					location.href = url;
			
				}		
		
			}
		}
	});
  });
  
 
  
	</script>
			
	
	<div class="cl"></div>

</div>


 
	<div class="fyss_tjlist" id="cd3">
            <div class="fyss_tjlistleft">挂牌时间:</div>
            <div class="fyss_tjlistcenter"><a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => 0, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" class="fyss_tj_cur" data-index="0">不限</a></div>
            <div class="fyss_tjlistright fyss_tjlistone">

                   <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => 1, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">昨日挂牌</a>
			
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => 2, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">一周</a>

                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => 3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">一个月</a>
                    
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => 4, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">三个月</a>
            </div>
            <div class="cl"></div>
        </div>
        

        
	<div class="fyss_tjlist" id="cd4">
		<div class="fyss_tjlistleft" onclick="statsurl('typechart');"><a class="tooltips" href="#">物业类型:<span>点击查看物业类型图</span></a>
		</div>
		<div class="fyss_tjlistcenter"><a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => 0, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10)); ?>#001" class="fyss_tj_cur" data-index="0">不限</a></div>
		<div class="fyss_tjlistright fyss_tjlistone">
			<?php foreach ($propertyType_list as $propertyType) { ?>
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $propertyType['id'], 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="<?php echo $propertyType['id']; ?>"><?php echo $propertyType['name']; ?></a>
			<?php } ?>
		</div>
		<div class="cl"></div>
	</div>
	
	
	<div class="fyss_tjlist" id="cd5">
		<div class="fyss_tjlistleft" onclick="statsurl('pricechart');"><a class="tooltips" href="#">挂牌价格:<span>点击查看价格图表</span></a>
		</div>
		<div class="fyss_tjlistcenter"><a class="fyss_tj_cur" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => 0, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0" data-value="0,0">不限</a></div>
		<div class="fyss_tjlistright">
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '0-30', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0-30" data-value="0,30">30万以下</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '30-50', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="30-50" data-value="30,50">30-50万</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '50-100', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="50-100" data-value="50,100">50-100万</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '100-150', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="100-150" data-value="100,150">100-150万</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '150-300', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="150-300" data-value="150,300">150-300万</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '300-450', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="300-450" data-value="300,450">300-450万</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '450-600', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="450-600" data-value="450,600">450-600万</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => '600-0', 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="600-0" data-value="600,0">600万以上</a>
				
			<span class="syss_dw">加币</span>

		</div>
		<div class="cl"></div>
	</div>
	
	
	<div class="fyss_tjlist" id="cd5">
		<div class="fyss_tjlistleft">价格区间:</div>

		<div class="fyss_tjlistright">

			<div class="fyss_tjjg">
				<div class="fyss_tjjgone"><input name="num1" type="text" id="num1"/></div>
				<div class="fyss_tjjgtwo">-</div>
				<div class="fyss_tjjgone"><input name="num2" type="text" id="num2"/></div>
				<div class="fyss_tjjgthree">万加元</div>
				<div class="fyss_tjjgfour"><a href="javascript:void(0);" id="confirm">确认</a></div>
			</div>
		</div>
		<div class="cl"></div>
	</div>
	
	
	<div class="fyss_tjlist" id="cd6">
		<div class="fyss_tjlistleft" onclick="statsurl('housechart');">
		<a class="tooltips" href="#">房屋面积:<span>点击查看房屋面积图</span></a></div>
		<div class="fyss_tjlistcenter"><a class="fyss_tj_cur" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 0, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0" data-value="0,0">不限</a></div>
		<div class="fyss_tjlistright">
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 1, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1" data-value="0,700">700以下</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 2, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2" data-value="700,1100">700-1100</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 3, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3" data-value="1100,1500">1100-1500</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 4, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4" data-value="1500,2000">1500-2000</a>
			
	  <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 5, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="5" data-value="2000,2500">2000-2500</a>
	  
	  <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="6" data-value="2500,3000">2500-3000</a>
	 
	  <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 7, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="7" data-value="3000,3500">3000-3500</a>
			  
	  <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 8, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="8" data-value="3500,4000">3500-4000</a>
			  
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 9, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="9" data-value="4000,0">4000以上</a>

			<span class="syss_dw">平方英尺</span>
		</div>
		<div class="cl"></div>
	</div>
	
	
	<div class="fyss_tjlist" id="cd7">
		<div class="fyss_tjlistleft" onclick="statsurl('landchart');"><a class="tooltips" href="#">土地面积:<span>点击查看土地面积图表</span></a></div>
		<div class="fyss_tjlistcenter"><a class="fyss_tj_cur" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 0, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0" data-value="0,0">不限</a></div>
		<div class="fyss_tjlistright">
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 1, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1" data-value="0,2000">2000以下</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 2, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2" data-value="2000,4000">2000-4000</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 3, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3" data-value="4000,6000">4000-6000</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 4, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4" data-value="6000,12000">6000-12000</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 5, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="5" data-value="12000,20000">12000-20000</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 6, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="6" data-value="20000,1acre">20000-1英亩</a>
			<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="7" data-value="1,0">1 英亩以上</a>
			<span class="syss_dw">平方英尺</span>
		</div>
		<div class="cl"></div>
	</div>
	
	
	<div class="fyss_tjlist" id="cd10">
		<div class="fyss_tjlistleft">周边临水:</div>
		<div class="fyss_tjlistcenter"><a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 0, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" class="fyss_tj_cur" data-index="0">不限</a></div>
		<div class="fyss_tjlistright fyss_tjlistone">

				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 1, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">临水</a>

				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 2, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">临塘</a>
				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 3, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">临溪</a>
				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 4, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">临河</a>
				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 5, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="5">临湖(海)</a>
				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 6, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="6">临游艇停靠去</a>
		</div>
		<div class="cl"></div>
	</div>
	
        
        
	<div class="fyss_tjlist" id="cd11">
		<div class="fyss_tjlistleft">周边临树:</div>
		<div class="fyss_tjlistcenter"><a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => 0, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" class="fyss_tj_cur" data-index="0">不限</a></div>
		<div class="fyss_tjlistright fyss_tjlistone">

				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => 1, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">临树林</a>

				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => 2, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">临森林</a>
				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => 3, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">临绿色保护带</a>
				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => 4, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">临森林保护区</a>
				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => 5, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="5">临谷</a>
		</div>
		<div class="cl"></div>
	</div>
	
	
	
	<div class="fyss_tjlist">
		<div class="fyss_tjlistleft">周边配套:</div>
		<div class="fyss_tjlistcenter"><a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10 ,'cd11' => $cd11, 'cd12' => 0,'cd12_2' => 0,'cd12_3' => 0,'cd12_4' => 0,'cd12_5' => 0,'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" <?php if($_GET["cd12"]=="0" and $_GET["cd12_2"]=="0" and $_GET["cd12_3"]=="0" and $_GET["cd12_4"]=="0" and $_GET["cd12_5"]=="0"){?> class="fyss_tj_cur" <?php }?> data-index="0">不限</a></div>
		<div class="fyss_tjlistright fyss_tjlistone">
<div  id="cd12">
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11, 'cd12' => 1,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">学校</a>
</div>
<div  id="cd12_2">
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => 1,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">医院</a>
	</div>
    <div  id="cd12_3">			
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => 1,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">公共交通</a>
</div>
	    <div  id="cd12_4">				
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11, 'cd12' => $cd12,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => 1,'cd12_5' => $cd12_5, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">高尔夫球场</a>
			</div>
                <div  id="cd12_5">		
				<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' =>$cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => 1, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">图书馆</a>
                </div>
                <font color="#ff0000">　注：支持多条件筛选</font>
		</div>
		<div class="cl"></div>
	</div>
	

	<div class="fyss_tjlist">
		<div class="fyss_tjlistleft">更多条件:</div>
		<div class="fyss_tjlistmore" style="padding-left:0px;">
			<div class="syss_xltj" id="cd8">
				<div class="syss_xltjup" id="cd8_selected" data-index="0">卧室数量</div>
				<div class="syss_xltjdown">
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 0, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>" data-index="0">不限</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 1, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5,'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">1卧</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 2, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5,'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">2卧</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 3, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5,'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">3卧</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 4, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5,'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">4卧</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 5, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5,'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="5">5卧</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 6, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5,'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="6">5卧以上</a>
				</div>
			
			
			</div>
			
			<!--增加的 -->
			<div class="syss_xltj" id="cd13">
				<div class="syss_xltjup" id="cd13_selected" data-value="0,0">卫生间数量</div>
				<div class="syss_xltjdown">
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => 0 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0">不限</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => 1 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">1个以上</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => 2 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">2个以上</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => 3 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">3个以上</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => 4 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">4个以上</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => 5 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="5">5个以上</a>

				</div>
			</div>
		
			<div class="syss_xltj" id="cd14">
				<div class="syss_xltjup" id="cd14_selected" data-value="0,0">房屋层数</div>
				<div class="syss_xltjdown">
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => 0, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13, 'cd14' => 0, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0">不限</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => 1, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">平房</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => 2, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">一层半</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => 3, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">二层</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => 4, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">二层半</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => 5, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="5">三层</a>
				</div>
			</div>
			
			<div class="syss_xltj" id="cd15">
				<div class="syss_xltjup" id="cd15_selected" data-value="0,0">大门朝向</div>
				<div class="syss_xltjdown">
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => 0, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13, 'cd14' => $cd14, 'cd15' => 0, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0">不限</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => 1, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">朝北</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => 2, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">朝南</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => 3, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">朝东</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => 4, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">朝西</a>

				</div>
			</div>
			
			
		<div class="syss_xltj" id="cd16">
				<div class="syss_xltjup" id="cd16_selected" data-value="0,0">车位数量</div>
				<div class="syss_xltjdown">
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => 0, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13, 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => 0, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="0">不限</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => 1, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="1">>1车位</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => 2, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="2">>2车位</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => 3, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="3">>3车位</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => 4, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001" data-index="4">>4车位</a>

				</div>
			</div>
			

		<div class="syss_xltj" id="cd18">
				<div class="syss_xltjup" id="cd18_selected" data-value="0,0">游泳池</div>
				<div class="syss_xltjdown">
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => 0, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13, 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => 0)); ?>#001" data-index="0">不限</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => 1)); ?>#001" data-index="1">有游泳池</a>
					<a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => 2)); ?>#001" data-index="2">无游泳池</a>
		   
				</div>
			</div>
			
		 </div>   
			
                
                
		</div>
	<div class="cl"></div>
	</div>
  
	<a name="002" id="002" ></a>        
	<div class="fyss_tjlist">
            <div class="fyss_tjlistleftnormal">搜索条件:</div>
            <div class="fyss_tjqr" style="padding-left:0px;" id="selected"></div>
            <div class="fyss_tjsc" id="clear_selected"><a href="<?php echo Yii::app()->createUrl('house/index&type='.$_GET["type"], array('cd1' => 0, 'cd2' => 0, 'cd3' => 0, 'cd4' => 0, 'cd5' => 0, 'cd6' => 0, 'cd7' => 0, 'cd8' => 0, 'cd9' => 0, 'cd10' => 0, 'cd11' => 0, 'cd12' => 0,'cd12_2' => 0,'cd12_3' => 0,'cd12_4' => 0,'cd12_5' => 0, 'cd13' => 0, 'cd14' => 0, 'cd15' => 0, 'cd16' => 0, 'cd17' => 0, 'cd18' => 0)); ?>#001">删除条件</a></div>
            <div class="cl"></div>
        </div>
    </div>
</div>


<!-- 房源搜索结束 -->

<!-- 房源列表开始 --> 
<a name="topwz"></a>
<div class="syss_jg">
  <div class="syss_jg_left">
    <div class="syss_px"> 
    
                <?php
            if (!empty($time_sort)) {
                if ($time_sort == 'DESC') {
                    ?>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 'ASC')); ?>#topwz" class="pxfs1">时间</a>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18,'time_sort' => 0, 'price_sort' => 'DESC')); ?>#topwz">总价</a>
    <?php } else { ?>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 'DESC')); ?>#topwz" class="pxfs2">时间</a>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18,'time_sort' => 0, 'price_sort' => 'DESC')); ?>#topwz">总价</a>
                <?php } ?>
            <?php
            } elseif (!empty($price_sort)) {
                if ($price_sort == 'DESC') {
                    ?>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 'DESC')); ?>#topwz">时间</a>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 0, 'price_sort' => 'ASC')); ?>#topwz" class="pxfs1">总价</a>
                <?php } else { ?>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 'DESC')); ?>#topwz">时间</a>
                    <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 0, 'price_sort' => 'DESC')); ?>#topwz" class="pxfs2">总价</a>
    <?php } ?>
            <?php } else { ?>
                <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11,'cd12' => $cd12, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 'DESC')); ?>#topwz">时间</a>
                <a href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10,'cd11' => $cd11,'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18, 'time_sort' => 0, 'price_sort' => 'DESC')); ?>#topwz">总价</a>
<?php } ?>
 
      <div class="syss_pxtwo">第<span><?php if($_GET["page"]==""){echo "1";}else{echo $_GET["page"];}?></span>页&nbsp;&nbsp; 共<span><?php echo ceil($count/10); ?></span>页</div>
      <div class="syss_pxthree">找到<font color="#ff4e00">
	  <?php 
	  	 echo $count;
		 /*
	 if ($_GET["cd1"]!="0" or $_GET["cd2"]!="0" or $_GET["cd3"]!="0" or $_GET["cd4"]!="0" or $_GET["cd5"]!="0" or $_GET["cd6"]!="0" or $_GET["cd7"]!="0" or $_GET["cd8"]!="0" or $_GET["cd9"]!="0" or $_GET["cd10"]!="0" or $_GET["cd11"]!="0" or $_GET["cd12"]!="0" or $_GET["cd13"]!="0" or $_GET["cd14"]!="0" or $_GET["cd15"]!="0" or $_GET["cd16"]!="0" or $_GET["cd17"]!="0" or $_GET["cd18"]!="0"){
	 echo $count;
	 }
	 else{
            			$criteria = new CDbCriteria();
					    $criteria->order = 'date DESC';
						$criteria->select = 'subdate(date, 1) as date,(t_resi + t_condo) as t_resi,(u_resi + u_condo) as u_resi ,round(avg_price/10000,2) as avg_price ';
						$stats = Stats::model()->find($criteria);
						echo $stats["t_resi"];
	 }*/
	  ?>
      </font>个符合条件的楼盘</div>
      <div class="cl"></div>
    </div>
    
    
    
    <?php 

	foreach ($house_list as $house) { 

	?>
    <div class="syss_fclist">
      <div class="syss_fclist_right">

        <div class="syss_fcone"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>" target="_blank">MLS：<?php echo $house->ml_num; ?></a></div>
        <div class="syss_fctwo"><a style="color:#000000; font-size:14px;">地址：<?php echo $house->addr.",&nbsp".$house->municipality; ?></a></div>
        <div class="syss_fctwo"><a style="color:#000000; font-size:14px;">城市：<?php echo $house->mname->municipality_cname."&nbsp".$house->city->name; ?></a></div>
        <div class="syss_fcfour">
          <div class="syss_fcfour_one" style="color:#000000">房屋面积：<?php echo $house->sqft; ?>平方英尺</div>
          <div class="syss_fcfour_one" style="color:#000000">物业类型：<?php echo $house->propertyType->name; ?></div>
          <div class="syss_fcfour_one" style="color:#000000">挂牌价格：<span>
		  <?php 
		  
		  if ( $house->s_r == "Sale") {
			$str= $house->lp_dol/10000 . "  万加币";
			echo $str;
			} 
			else {
			$str = $house->lp_dol . "  加元/月";
			echo $str;  
		  }
		  
		  ?></span></div>
          <div class="syss_fcfour_one" style="color:#000000">挂牌时间：<?php echo $house->pix_updt; ?></div>
        </div>
        <div class="syss_fcfive">
          <div class="syss_fcfiveone" style="background-color:#FFFFFF"> <span class="syss_btn"><a target="_blank" href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>&cd1=<?php echo $_GET["cd1"];?>&cd2=<?php echo $_GET["cd2"];?>&cd3=<?php echo $_GET["cd3"];?>&cd4=<?php echo $_GET["cd4"];?>&cd5=<?php echo $_GET["cd5"];?>&cd6=<?php echo $_GET["cd6"];?>&cd7=<?php echo $_GET["cd7"];?>&cd8=<?php echo $_GET["cd8"];?>&cd9=<?php echo $_GET["cd9"];?>&cd10=<?php echo $_GET["cd10"];?>&cd11=<?php echo $_GET["cd11"];?>&cd12=<?php echo $_GET["cd12"];?>&cd12_2=<?php echo $_GET["cd12_2"];?>&cd12_3=<?php echo $_GET["cd12_3"];?>&cd12_4=<?php echo $_GET["cd12_4"];?>&cd12_5=<?php echo $_GET["cd12_5"];?>&cd13=<?php echo $_GET["cd13"];?>&cd14=<?php echo $_GET["cd14"];?>&cd15=<?php echo $_GET["cd15"];?>&cd16=<?php echo $_GET["cd16"];?>&cd17=<?php echo $_GET["cd17"];?>&cd18=<?php echo $_GET["cd18"];?>&page=<?php echo $_GET["page"];?>">点击查看详情</a></span> </div>
          <div class="syss_fcfiveone" style="background-color:#FFFFFF"> <span class="syss_btn"><a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>#fydt" target="_blank">查看地图</a></span> </div>
          <div class="cl"></div>
        </div>
        <div class="syss_fcfive">
          <div class="syss_fcfiveone" style="background-color:#FFFFFF"> <span class="syss_fc_fj"><?php echo $house->br; ?></span> <span class="syss_fc_cs"><?php echo $house->bath_tot; ?></span> </div>
          <div class="syss_fcfivetwo"> 
    <a href="javascript:void(0);" class="syss_fc_sc <?php if (in_array($house->id, $collection_list)) {echo 'collected';} ?>" data-id="<?php echo $house->id; ?>">收藏</a>
    <a href="javascript:void(0);" class="syss_fc_db" id="<?php echo $house->id; ?>" data-img="<?php echo $house->house_image; ?>">对比</a> 
    </div>
          <div class="cl"></div>
        </div>
        <div class="syss_fcthree">
        

		<?php
		$county = $house->county;
		$ml_num = $house->ml_num;
		$imglist = explode(',',get_tn_image($county,$ml_num));
		foreach ($imglist as $value) {
			?><div class="syss_fcthree_pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php 
			echo $value; 
			?>"width="92" height="73"></div><?php
		}

		?>
         
        <div class="cl"></div>
        </div>
      </div>
      <div class="syss_fclist_left" style="position:relative">
    <?php if ($house->s_r == "Sale") {
        echo "<div id='apDiv1'><img src='/themes/house/images/sale.png' /></div> ";
    } else {
        echo "<div id='apDiv1'><img src='/themes/house/images/rent.png' /></div>";
    } ?>
      
      <?php 
		
		$pic1 = get_firstimage($county,$ml_num);
		
  		?>
		<a href="<?php echo Yii::app()->createUrl('house/view', array('id' => $house->id)); ?>&cd1=<?php echo $_GET["cd1"];?>&cd2=<?php echo $_GET["cd2"];?>&cd3=<?php echo $_GET["cd3"];?>&cd4=<?php echo $_GET["cd4"];?>&cd5=<?php echo $_GET["cd5"];?>&cd6=<?php echo $_GET["cd6"];?>&cd7=<?php echo $_GET["cd7"];?>&cd8=<?php echo $_GET["cd8"];?>&cd9=<?php echo $_GET["cd9"];?>&cd10=<?php echo $_GET["cd10"];?>&cd11=<?php echo $_GET["cd11"];?>&cd12=<?php echo $_GET["cd12"];?>&cd12_2=<?php echo $_GET["cd12_2"];?>&cd12_3=<?php echo $_GET["cd12_3"];?>&cd12_4=<?php echo $_GET["cd12_4"];?>&cd12_5=<?php echo $_GET["cd12_5"];?>&cd13=<?php echo $_GET["cd13"];?>&cd14=<?php echo $_GET["cd14"];?>&cd15=<?php echo $_GET["cd15"];?>&cd16=<?php echo $_GET["cd16"];?>&cd17=<?php echo $_GET["cd17"];?>&cd18=<?php echo $_GET["cd18"];?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $pic1; ?>" width="416" height="312" /></a>
     
      
	  
	  </div>
      <div class="cl"></div>
    </div>
     <?php }?>
     
    <div class="cl"></div>
           <div class="page">
            <?php
            $this->widget('CLinkPager', array(
                'header' => '',
                'firstPageLabel' => '首页',
                'lastPageLabel' => '尾页',
                'prevPageLabel' => '<<',
                'nextPageLabel' => '>>',
                'pages' => $pages,
                'maxButtonCount' => 6,
                'cssFile' => 'themes/house/css/pager.css'
            ));
            ?>
        </div>
  </div>
  <div class="syss_jg_right">
    <div class="zczl">
      <div class="zczlone">立即注册获得以下资料</div>
      
      
      <div class="zczltwo"> 
                <?php if (empty($this->_account['userId'])) { ?>
                    <span><a href="index.php?r=site/login">1.加国房产投资报告</a></span>
                    <span><a href="index.php?r=site/login">2.海外移民指南</a></span>
                    <span><a href="index.php?r=site/login">3.加国留学指南</a></span> 
                <?php 
				}else{
				
				
$sqljiaguo = "select image from h_post where id=137";
$resultjiaguo = $db->createCommand($sqljiaguo)->query();
foreach($resultjiaguo as $househaizai){
$jiaguo=$househaizai["image"];

}


$sqlhaiwai = "select image from h_post where id=138";
$resulthaiwai = $db->createCommand($sqlhaiwai)->query();
foreach($resulthaiwai as $househaiwai){
$haiwai=$househaiwai["image"];

}


$sqlzhinan = "select image from h_post where id=139";
$resultzhinan = $db->createCommand($sqlzhinan)->query();
foreach($resultzhinan as $housezhinan){
$zhinan=$housezhinan["image"];

}

				?>
                    <span><a href="/<?php echo $jiaguo;?>">1.加国房产投资报告</a></span>
                    <span><a href="/<?php echo $haiwai;?>">2.海外移民指南</a></span>
                    <span><a href="/<?php echo $zhinan;?>">3.加国留学指南</a></span> 
                <?php }?>
      
       </div>
      
      
      <form action="http://www.maplecity.com.cn/index.php?r=user/register" method="get">
        <input type="hidden" value="user/register" name="r">
        <div class="zczlthree">
          <div class="zczlthree_one">
            <input name="username" type="text" class="textbox" value="您的姓名" onblur="if(this.value==&#39;&#39;) {this.style.color=&#39;#333&#39;;this.value=&#39;您的姓名&#39;;}" onfocus="if(this.value==&#39;您的姓名&#39;){this.value=&#39;&#39;;}else{this.style.color=&#39;#000&#39;;}" style="color: #333;">
          </div>
          <div class="zczlthree_one">
            <input name="phone" type="text" class="textbox" value="您的电话" onblur="if(this.value==&#39;&#39;) {this.style.color=&#39;#333&#39;;this.value=&#39;您的电话&#39;;}" onfocus="if(this.value==&#39;您的电话&#39;){this.value=&#39;&#39;;}else{this.style.color=&#39;#000&#39;;}" style="color: #333;">
          </div>
          <div class="zczlthree_one">
            <input name="email" type="text" class="textbox" value="您的邮箱" onblur="if(this.value==&#39;&#39;) {this.style.color=&#39;#333&#39;;this.value=&#39;您的邮箱&#39;;}" onfocus="if(this.value==&#39;您的邮箱&#39;){this.value=&#39;&#39;;}else{this.style.color=&#39;#000&#39;;}" style="color: #333;">
          </div>
        </div>
        <div class="zczlfour">
          <input name="" type="submit" value="立即注册">
        </div>
      </form>
    </div>
    <div class="sylj">
			         <div class="syljtitle">实用链接</div>
			         <div class="syljcont">
					       <a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s1.png" /><span>外汇牌价</span></a>
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj1.png" /><span>枫之都-外汇牌价</span><div class="cl"></div></div>
               <div class="tccont_two">
                    <a href="#">中国银行牌价</a>
                    <a href="#">银率网</a>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 --> 
                           
				 <a href="http://www.ratehub.ca/best-mortgage-rates" target="_blank"><img src="/themes/house/images/s2.png" /><span>贷款利率</span></a>

					<a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s3.png" /><span>贷款计算</span></a>
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr" style="height:580px;">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj3.png" /><span>枫之都-贷款计算</span><div class="cl"></div></div>
               <div class="jisuan">
                      <div class="ajjsq_cont">
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">房屋价格：</div>
					       <div class="ajjsq_left_two"><img src="new/images/jh.png" /></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;"/></div>
						   <div class="ajjsq_left_four"><img src="new/images/jh2.png" /></div>
						   <div class="ajjsq_left_five">$</div>
						   <div class="cl"></div>
					  </div>
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">首    付：</div>
					       <div class="ajjsq_left_two"><img src="new/images/jh.png" /></div>
						   <div class="ajjsq_left_three"><input name="" type="text"  style="width:75px;"/></div>
						   <div class="ajjsq_left_four"><img src="/themes/house/images/jh2.png" /></div>
						   <div class="ajjsq_left_five">%</div>
						   <div class="cl"></div>
					  </div>
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">首付金额：</div>
					       <div class="ajjsq_left_two"></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;" /></div>
						   <div class="ajjsq_left_four"></div>
						   <div class="ajjsq_left_five">$</div>
						   <div class="cl"></div>
					  </div>
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">还款年限：</div>
					       <div class="ajjsq_left_two"><img src="new/images/jh.png" /></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;" /></div>
						   <div class="ajjsq_left_four"><img src="/themes/house/images/jh2.png" /></div>
						   <div class="ajjsq_left_five">年</div>
						   <div class="cl"></div>
					  </div>
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">利   率：</div>
					       <div class="ajjsq_left_two"><img src="new/images/jh.png" /></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;" /></div>
						   <div class="ajjsq_left_four"><img src="/themes/house/images/jh2.png" /></div>
						   <div class="ajjsq_left_five">%</div>
						   <div class="cl"></div>
					  </div>
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">还款周期：</div>
					       <div class="ajjsq_left_two"><img src="new/images/jh.png" /></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;" /></div>
						   <div class="ajjsq_left_four"><img src="/themes/house/images/jh2.png" /></div>
						   <div class="cl"></div>
					  </div>
                      
                      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">还款：</div>
					       <div class="ajjsq_left_two"></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;" /></div>
						   <div class="ajjsq_left_four xjmy2">$ / 每月</div>
						   <div class="cl"></div>
					  </div>
                      
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">省份：</div>
					       <div class="ajjsq_left_two"></div>
						   <div class="ajjsq_left_three">
							   <select class="ajjsq_select" name="" style="width:75px;">
							     <option>安大略省</option>
							   </select>
						   </div>
						   <div class="ajjsq_left_four"></div>
						   <div class="ajjsq_left_five"></div>
						   <div class="cl"></div>
					  </div>
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">交易税：</div>
					       <div class="ajjsq_left_two"></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;" /></div>
						   <div class="ajjsq_left_four">$</div>
						   <div class="ajjsq_left_five"></div>
						   <div class="cl"></div>
					  </div>
				      <div class="ajjsq_list">
					       <div class="ajjsq_left_one">多伦多交易税：</div>
					       <div class="ajjsq_left_two"></div>
						   <div class="ajjsq_left_three"><input name="" type="text" style="width:75px;" /></div>
						   <div class="ajjsq_left_four">$</div>
						   <div class="ajjsq_left_five"></div>
						   <div class="cl"></div>
					  </div>
				   </div>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 -->  
                           
					 <a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s4.png" /><span>加拿大地图</span></a>
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj4.png" /><span>枫之都-加拿大地图</span><div class="cl"></div></div>
               <div class="tccont_two">
                    <a href="http://www.meet99.com/emap-Canada.html">全国地图</a>
                    <a href="http://www.meet99.com/map-TORONTO.html">多伦多地图</a>
                    <a href="http://www.meet99.com/map-Ottawa.html">渥太华地图</a>
                    <a href="http://www.meet99.com/map-VANCOUVER.html">温哥华地图</a>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 -->   
                           
                           
					       <a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s5.png" /><span>加拿大天气</span></a>
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj5.png" /><span>枫之都-加拿大天气</span><div class="cl"></div></div>
               <div class="tccont_two">
                    <a href="http://php.weather.sina.com.cn/search_nation.php?nation=%BC%D3%C4%C3%B4%F3&dpc=1#g_3">全国天气</a>
                    <a href="http://php.weather.sina.com.cn/search.php?c=1&city=%B6%E0%C2%D7%B6%E0&dpc=1">多伦多天气</a>
                    <a href="http://php.weather.sina.com.cn/search.php?c=1&city=%CE%C2%B8%E7%BB%AA&dpc=1">渥太华天气</a>
                    <a href="http://php.weather.sina.com.cn/search.php?c=1&city=%E4%D7%CC%AB%BB%AA&dpc=1">温哥华天气</a>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 -->  
  
					       <a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s6.png" /><span>加拿大交通</span></a>
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj6.png" /><span>枫之都-加拿大交通</span><div class="cl"></div></div>
               <div class="tccont_two">
                    <a href="http://flight.qunar.com/schedule/international/fsearch_list.jsp?departure=%E5%8C%97%E4%BA%AC&arrival=%E5%A4%9A%E4%BC%A6%E5%A4%9A">航班查询</a>
                    <a href="http://www.octranspo1.com/">首都渥太华公交系统查询</a>
                    <a href="https://www.ttc.ca/">多伦多公交系统查询</a>
                    <a href="http://www.translink.ca/">温哥华公交系统查询</a>
                    <a href="http://tripplanning.translink.ca/hiwire?.a=iScheduleLookupSearch&LineName=999&LineAbbr=999">温哥华轻轨Skytrain时刻查询</a>
                    <a href="http://www.calgarytransit.com/">卡尔加里公交系统查询</a>
                    <a href="http://www.gotransit.com/timetables/en/schedules/full_schedules.aspx">多伦多火车系统（Go Train）查询</a>
                    <a href="http://www.viarail.ca/">加拿大VIA火车查询</a>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 -->   
                           
					       <a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s7.png" /><span>加拿大学校</span></a>
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj7.png" /><span>枫之都-加拿大学校排名</span><div class="cl"></div></div>
               <div class="tccont_two">
                    <a href="http://www.e-canada.cn/paiming">加拿大大学排名</a>
                    <a href="http://www.compareschoolrankings.org/">加拿大中小学排名</a>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 -->  
                           
					       <a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s8.png" /><span>加拿大旅游</span></a>
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj8.png" /><span>枫之都-加拿大旅游</span><div class="cl"></div></div>
               <div class="tccontimg">
                    <a href="http://www.ontariotravel.cn/"><img src="/new/images/lj1.png" /><span>安大略省旅游局</span></a>
                    <a href="http://www.hellobc.com.cn/?CC=CN&SI=1"><img src="/new/images/lj2.png" /><span>英属哥伦比亚省旅游局</span></a>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 -->  
                           
					       <a class="lja" href="javascript:void(0);"><img src="/themes/house/images/s9.png" /><span>航空票务</span></a>		
                           
<!-- 弹出内容 --> 
<div class="tcbox"></div>
    <div class="tcboxnr">
         <div class="tclabel"><span>X</span></div>
         <div class="tccont">
               <div class="tccont_one"><img src="/themes/house/images/sylj9.png" /><span>枫之都-航空票务</span><div class="cl"></div></div>
               <div class="tccontimg">
                    <a href="http://www.ctrip.com/#ctm_ref=nb_cn_top/"><img src="/new/images/pw1.png" /><span>携程网</span></a>
                    <a href="http://www.aircanada.com/en/home.html"><img src="/new/images/pw2.png" /><span>加拿大航空公司</span></a>
                    <a href="http://www.airchina.com.cn/index.shtml"><img src="/new/images/pw3.png" /><span>中国国际航空公司</span></a>
                    <a href="http://www.hainanairlines.com/CN/CN/Home"><img src="/new/images/pw4.png" /><span>海南航空公司</span></a>
                    <a href="http://www.cathaypacific.com/cx/sc_CN.html"><img src="/new/images/pw5.png" /><span>国泰航空公司</span></a>
               </div>
         </div>
         <div class="tcbottom"><img src="/themes/house/images/tclabel_down.png" /></div>
    </div>

<!-- 弹出内容 -->  
                           
                     </div>
			   </div>
  
    <div class="grtz">
      <div class="grtz_title"><span>热点推荐</span></div>
      <div class="grtz_con">
        <ul>
        <?php 
$sqlhaozi = "select h_house.*,h_mname.municipality_cname as cname from h_house,h_mname where recommend=1 and h_house.municipality=h_mname.municipality limit 0,3";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $househaizai){
?>
          <li>
            <dl>
              <dt>
				<?php 
				$imglist= get_tn_image($househaizai["county"],$househaizai["ml_num"]);
				$pic = explode(",",$imglist)[0];
				
				?><a href="<?php 
				echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); 
				?>"  target="_blank"><img src="<?php 
				echo Yii::app()->request->baseUrl; 
				?>/<?php
				echo $pic; 
				?>"  width="120" height="72"/></a>
                     
              </dt>
              <dd class="bt"><?php echo $househaizai["addr"]; ?></dd>
			  <dd class="bt">城市：<?php echo $househaizai["cname"]; ?> </dd>
			  <dd><font color="#CC6600"><?php echo $househaizai["lp_dol"]/10000;?></font>万加元</dd>
            </dl>
            <div class="cl"></div>
          </li>
<?php }?>
        </ul>
      </div>
       <div class="housebottom"></div>
    </div>
    <div class="cl"></div>
    <!--豪宅推荐开始-->
    <div class="grtz">
      <div class="grtz_title"><span>豪宅推荐</span></div>
      <div class="grtz_con">
        <ul>
<?php 
//$sqlhaozi = "select * from h_house where lp_dol>3000000 and recommend=1 limit 0,3";
$sqlhaozi = "select h.*,m.municipality_cname as cname from h_house h,h_mname m where h.municipality=m.municipality AND 
h.lp_dol>3000000 and h.yr_built = '6-15' AND
h.area in ('Toronto','Peel','York','Halton') AND
h.bath_tot > 3  order by h.pix_updt desc limit 0,3";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $househaizai){
?>
          <li>
            <dl>
              <dt>
				<?php
				$imglist1= get_tn_image($househaizai["county"],$househaizai["ml_num"]);
				$pic1 = explode(",",$imglist1)[0];
				?><a href="<?php 
				echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); 
				?>"  target="_blank"><img src="<?php 
				echo Yii::app()->request->baseUrl; 
				?>/<?php
				echo $pic1; 
				?>"  width="120" height="72"/></a>
			  
              </dt>
              <dd class="bt"><?php echo $househaizai["addr"]; ?> </dd>
              <dd class="bt">城市：<?php echo $househaizai["cname"]; ?></dd>
              
			  <dd><font color="#CC6600"><?php echo $househaizai["lp_dol"]/10000;?></font>万加元</dd>
            </dl>
            <div class="cl"></div>
          </li>
<?php }?>
        </ul>
      </div>
    </div>
    <div class="housebottom"></div>
    <!--豪宅推荐end--> 
  </div>
  <div class="cl"></div>
</div>
<!-- 房源列表结束 --> 
<!-- 对比开始 -->
<div class="duibi">
  <div class="duibi_left"></div>
  <div class="duibi_right">
    <div class="duibi_right_up"> </div>
    <div class="cl"></div>
    <div class="duibi_right_down"> <a href="javascript:void(0);" id="compare">对比</a> </div>
  </div>
</div>
<!-- 对比结束 -->
<script type="text/javascript">
    //搜索条件下拉
    $(document).ready(function() {
        var compare = []; //对比

        var cd1 = <?php echo $cd1; ?>;
        var cd2 = '<?php echo $cd2; ?>'; //use this as city string
        var cd3 = <?php echo $cd3; ?>;
        var cd4 = <?php echo $cd4; ?>;
        var cd5 = '<?php echo $cd5; ?>';
        var cd6 = <?php echo $cd6; ?>;
        var cd7 = <?php echo $cd7; ?>;
        var cd8 = <?php echo $cd8; ?>;
        var cd9 = <?php echo $cd9; ?>;
        var cd10 = <?php echo $cd10; ?>;
		var cd11 = <?php echo $cd11; ?>;
		var cd12 = <?php echo $cd12; ?>;
		var cd12_2 = <?php echo $cd12_2; ?>;
		var cd12_3 = <?php echo $cd12_3; ?>;
		var cd12_4 = <?php echo $cd12_4; ?>;
		var cd12_5 = <?php echo $cd12_5; ?>;
		var cd13 = <?php echo $cd13; ?>;
		var cd14 = <?php echo $cd14; ?>;
		var cd15 = <?php echo $cd15; ?>;
		var cd16 = <?php echo $cd16; ?>;
		var cd17 = <?php echo $cd17; ?>;
		var cd18 = <?php echo $cd18; ?>;
		var diy_price = <?php echo $diy_price; ?>;
		
		//$(".addsearchparms").attr("href", function(i, origValue){
		$(".menuconditionsearch").attr("href", function(i, origValue){
            
			var urlparms = "&cd1=<?php echo $cd1; ?>&cd2=<?php echo $cd2; ?>&cd3=<?php echo $cd3; ?>&cd4=<?php echo $cd4; ?>&cd5=0&cd6=<?php echo $cd6; ?>&cd7=<?php echo $cd7; ?>&cd8=<?php echo $cd8; ?>&cd9=<?php echo $cd9; ?>&cd10=<?php echo $cd10; ?>&cd11=<?php echo $cd11; ?>&cd12=<?php echo $cd12; ?>&cd12_2=<?php echo $cd12_2; ?>&cd12_3=<?php echo $cd12_3; ?>&cd12_4=<?php echo $cd12_4; ?>&cd12_5=<?php echo $cd12_5; ?>&cd13=<?php echo $cd13; ?>&cd14=<?php echo $cd14; ?>&cd15=<?php echo $cd15; ?>&cd16=<?php echo $cd16; ?>&cd17=<?php echo $cd17; ?>&cd18=<?php echo $cd18; ?>";
			return origValue + urlparms;
		});

        if (cd1 == 0 && cd2 == 0 && cd3 == 0 && cd4 == 0 && cd5 == 0 && cd6 == 0 && cd7 == 0 && cd8 == 0 && cd9 == 0 && cd10 == 0&& cd11 == 0&& cd12 == 0&& cd12_2 == 0&& cd12_3 == 0&& cd12_4 == 0&& cd12_5 == 0&& cd13 == 0&& cd14 == 0&& cd15 == 0&& cd16 == 0&& cd17 == 0&& cd18 == 0)
            $("#clear_selected").hide();

        var cd1_text = $("#cd1").find("[data-index=" + cd1 + "]").text();
        //var cd2_text = $("#cd2").find("[data-index=" + cd2 + "]").text();
        var cd3_text = $("#cd3").find("[data-index=" + cd3 + "]").text();
        var cd4_text = $("#cd4").find("[data-index=" + cd4 + "]").text();
        var cd5_text = $("#cd5").find("[data-index=" + cd5 + "]").text();
        var cd6_text = $("#cd6").find("[data-index=" + cd6 + "]").text();
        var cd7_text = $("#cd7").find("[data-index=" + cd7 + "]").text();
        var cd8_text = $("#cd8").find("[data-index=" + cd8 + "]").text();
        var cd9_text = $("#cd9").find("[data-index=" + cd9 + "]").text();
        var cd10_text = $("#cd10").find("[data-index=" + cd10 + "]").text();
		var cd11_text = $("#cd11").find("[data-index=" + cd11 + "]").text();
		
		var cd12_text = $("#cd12").find("[data-index=" + cd12 + "]").text();
		var cd12_2_text = $("#cd12_2").find("[data-index=" + cd12_2 + "]").text();
		var cd12_3_text = $("#cd12_3").find("[data-index=" + cd12_3 + "]").text();
		var cd12_4_text = $("#cd12_4").find("[data-index=" + cd12_4 + "]").text();
		var cd12_5_text = $("#cd12_5").find("[data-index=" + cd12_5 + "]").text();
		
		var cd13_text = $("#cd13").find("[data-index=" + cd13 + "]").text();
		var cd14_text = $("#cd14").find("[data-index=" + cd14 + "]").text();
		var cd15_text = $("#cd15").find("[data-index=" + cd15 + "]").text();
		var cd16_text = $("#cd16").find("[data-index=" + cd16 + "]").text();
		var cd17_text = $("#cd17").find("[data-index=" + cd17 + "]").text();
		var cd18_text = $("#cd18").find("[data-index=" + cd18 + "]").text();
		
        $("#cd1").find("a").removeClass('fyss_tj_cur');
        $("#cd1").find("[data-index=" + cd1 + "]").addClass('fyss_tj_cur');

        //$("#cd2").find("a").removeClass('fyss_tj_cur');
        //$("#cd2").find("[data-index=" + cd2 + "]").addClass('fyss_tj_cur');

        $("#cd3").find("a").removeClass('fyss_tj_cur');
        $("#cd3").find("[data-index=" + cd3 + "]").addClass('fyss_tj_cur');

        $("#cd4").find("a").removeClass('fyss_tj_cur');
        $("#cd4").find("[data-index=" + cd4 + "]").addClass('fyss_tj_cur');

        $("#cd5").find("a").removeClass('fyss_tj_cur');
        $("#cd5").find("[data-index=" + cd5 + "]").addClass('fyss_tj_cur');

        $("#cd6").find("a").removeClass('fyss_tj_cur');
        $("#cd6").find("[data-index=" + cd6 + "]").addClass('fyss_tj_cur');

        $("#cd7").find("a").removeClass('fyss_tj_cur');
        $("#cd7").find("[data-index=" + cd7 + "]").addClass('fyss_tj_cur');
		
        $("#cd10").find("a").removeClass('fyss_tj_cur');
        $("#cd10").find("[data-index=" + cd10 + "]").addClass('fyss_tj_cur');
		
        $("#cd11").find("a").removeClass('fyss_tj_cur');
        $("#cd11").find("[data-index=" + cd11 + "]").addClass('fyss_tj_cur');

        $("#cd12").find("a").removeClass('fyss_tj_cur');
        $("#cd12").find("[data-index=" + cd12 + "]").addClass('fyss_tj_cur');
		
        $("#cd12_2").find("a").removeClass('fyss_tj_cur');
        $("#cd12_2").find("[data-index=" + cd12_2 + "]").addClass('fyss_tj_cur');
		
        $("#cd12_3").find("a").removeClass('fyss_tj_cur');
        $("#cd12_3").find("[data-index=" + cd12_3 + "]").addClass('fyss_tj_cur');
		
        $("#cd12_4").find("a").removeClass('fyss_tj_cur');
        $("#cd12_4").find("[data-index=" + cd12_4 + "]").addClass('fyss_tj_cur');
		
        $("#cd12_5").find("a").removeClass('fyss_tj_cur');
        $("#cd12_5").find("[data-index=" + cd12_5 + "]").addClass('fyss_tj_cur');
	
		$("#cd17").find("a").removeClass('fyss_tj_cur');
        $("#cd17").find("[data-index=" + cd17 + "]").addClass('fyss_tj_cur');

		
        if (cd8)
            $("#cd8_selected").text(cd8_text);

        if (cd9)
            $("#cd9_selected").text(cd9_text);
			
			

        if (cd1)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('cd1' => 0, 'cd2' => 0, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd1_text + '</a>');
        
		
		if (cd2 != '0') {
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => 0, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd2 + '</a>');
			
			$('.fyss_tjjgcity input').val(cd2);
			$('.fyss_tjjgcity input').css('background-color', '#ff4e00');
			$('.fyss_tjjgcity input').css('color', '#fff');
			
		}
        if (cd3)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => 0, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd3_text + '</a>');
        if (cd4)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => 0, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd4_text + '</a>');
        if (cd5 != '0')
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => 0, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 0, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd5_text + '</a>');
        if (cd6)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => 0, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd6_text + '</a>');
        if (cd7)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => 0, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd7_text + '</a>');
        if (cd8)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => 0, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd8_text + '</a>');
        if (cd9)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => 0, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd9_text + '</a>');
			
        if (cd10)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => 0, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd10_text + '</a>');
	
        if (cd11)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => 0, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd11_text + '</a>');
		
		if (cd12)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => 0, 'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5,'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd12_text + '</a>');
			
		if (cd12_2)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => 0,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd12_2_text + '</a>');
		if (cd12_3)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' =>0,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd12_3_text + '</a>');
		if (cd12_4)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => 0,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd12_4_text + '</a>');		
		if (cd12_5)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => 0, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd12_5_text + '</a>');	
					
		if (cd13)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => 0 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd13_text + '</a>');
			
		if (cd14)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => 0, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd14_text + '</a>');
			
		if (cd15)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => 0, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd15_text + '</a>');

		if (cd16)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => 0, 'cd17' => $cd17, 'cd18' => $cd18)); ?>#001">' + cd16_text + '</a>')

		if (cd17)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => 0, 'cd18' => $cd18)); ?>#001">' + cd17_text + '</a>');

		if (cd18)
            $("#selected").append('<a class="fyss_qrtj_list" href="<?php echo Yii::app()->createUrl('house/index', array('type' => $type, 'cd1' => $cd1, 'cd2' => $cd2, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12,'cd12_2' => $cd12_2,'cd12_3' => $cd12_3,'cd12_4' => $cd12_4,'cd12_5' => $cd12_5, 'cd13' => $cd13 , 'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => 0)); ?>#001">' + cd18_text + '</a>');
			
	
			
        $("#confirm").click(function() {
            var num1 = $("#num1").val();
            var num2 = $("#num2").val();
            //var cd10 = undefined;
			if (isNaN(num1) || isNaN(num2) ) {
                 cd5 = 0;
            } else {
               cd5 = num1 + '-' + num2;
            }
            window.location.href = "<?php echo Yii::app()->createUrl('house/index'); ?>&cd1=<?php echo $cd1; ?>&cd2=<?php echo $cd2; ?>&cd3=<?php echo $cd3; ?>&cd4=<?php echo $cd4; ?>&cd5=" + cd5 + "&cd6=<?php echo $cd6; ?>&cd7=<?php echo $cd7; ?>&cd8=<?php echo $cd8; ?>&cd9=<?php echo $cd9; ?>&cd10=<?php echo $cd10; ?>&cd11=<?php echo $cd11; ?>&cd12=<?php echo $cd12; ?>&cd12_2=<?php echo $cd12_2; ?>&cd12_3=<?php echo $cd12_3; ?>&cd12_4=<?php echo $cd12_4; ?>&cd12_5=<?php echo $cd12_5; ?>&cd13=<?php echo $cd13; ?>&cd14=<?php echo $cd14; ?>&cd15=<?php echo $cd15; ?>&cd16=<?php echo $cd16; ?>&cd17=<?php echo $cd17; ?>&cd18=<?php echo $cd18; ?>";
			
        });

        $(".syss_xltj").mouseover(function() {
            $(this).find(".syss_xltjdown").show();
        });
        $(".syss_xltj").mouseout(function() {
            $(this).find(".syss_xltjdown").hide();

        });

        //评估报告
        $(".grtzone").mouseover(function() {
            $(this).find(".grtzonedown").show()
        });
        $(".grtzone").mouseout(function() {
            $(this).find(".grtzonedown").hide()
        });

        $(".grtzonedown a").click(function() {
            var cs = $(this).text();
            $(this).parent().parent().prev().val(cs);
        });
        $(".grtzone").mouseout(function() {
            $(this).find(".grtzonedown").hide()
        });

		//Register click event for all selection and update nav menu with selection
		$(".fyss_tjlist").click(function() {
			console.log("Selection is clicked");
			
			
			
		});
		
        //加入收藏
        $(".syss_fc_sc").click(function() {
            var self = $(this);
            var id = self.attr('data-id');
            $.post('<?php echo Yii::app()->createUrl('house/collection'); ?>', {'id': id}, function(json) {
                if (json.status == 200) {
                    alert(json.msg);
                    self.addClass("collected");
                } else if (json.status == 404) {
                    alert(json.msg);
                    window.location.href = "<?php echo Yii::app()->createUrl('site/login', array('original' => Yii::app()->request->getUrl())); ?>";
                } else {
                    alert(json.msg);
                }
            }, 'json');

        });

        //弹出收回
        $(".duibi_left").click(function() {
            var right = $(this).parent().css("right");
            if (right < "0px") {
                $(this).addClass("duibi_left_two");
                $(".duibi").animate({right: "0px"});
            } else {
                $(this).removeClass("duibi_left_two");
                $(".duibi").animate({right: "-185px"});
            }
        });

        //对比添加
        $(".syss_fc_db").click(function() {
            var self = $(this);
            self.addClass("compared");
            var sz = self.parent().parent().parent().parent().index();
            $(".duibi").animate({right: "0px"});
            var lj = self.attr('data-img');
            var data_id = self.attr('id');
            var length = $(".duibi_list").size();
            if ($(this).hasClass("syss_fc_db_two")) {
                alert("已经添加过了");
            } else {
                if (length <= 3) {
                    $(".duibi_right_up").append("<div class='duibi_list'><img class='duibiimg' src='" + lj + "' /><span data-id='" + data_id + "'>" + sz + "</span></div>");
                    compare.push(data_id);
                    $(this).addClass("syss_fc_db_two");
                }
                else {
                    alert("一次最多只能对比4个房源");
                }
            }
        });

        //删除
        $(".duibi_right_up").on("mouseover", ".duibi_list", function() {
            $(this).find("span").show();
        });
        $(".duibi_right_up").on("mouseout", ".duibi_list", function() {
            $(this).find("span").hide();
        });
        $(".duibi_right_up").on("click", "span", function() {
            var self = $(this);
            var data_id = self.attr('data-id');
            var compare_btn = $('#' + data_id + '');
            var ele = self.parent();
            var compareCount = compare.length;
            for (var i = 0; i < compareCount; i++) {
                if (parseInt(compare[i]) == data_id) {
                    compare.splice(i, 1);
                    break;
                }
            }
            ele.remove();
            compare_btn.removeClass('compared');
            compare_btn.removeClass('syss_fc_db_two');
        });

        $("#compare").click(function() {
            var length = $(".duibi_list").size();
            if (length > 0) {
                window.open('<?php echo Yii::app()->createUrl('house/compare'); ?>&id=' + compare);
            } else {
                alert('您还没有选择对比房源');
            }
        });
    });
    
    //地图互通
    function mapSelect() {
        //city_id
        var cd1 = $('#cd1 .fyss_tj_cur').attr('data-index');
        //distirct_id
        //var cd2 = $('#cd2 .fyss_tj_cur').attr('data-index');
		var cd2 = '<?php echo $cd2; ?>';
        //房屋类型
        var cd4 = $('#cd4 .fyss_tj_cur').attr('data-index');
        //总价
        var cd5 = $('#cd5 .fyss_tj_cur').attr('data-value');
        var cd10 = '<?php echo !empty($cd10) ? str_replace('-', ',' ,$cd10) : 0; ?>';
        if(cd10 && cd10 != 0){
            cd5 = cd10;
        }
        //土地面积
        var cd7 = $('#cd7 .fyss_tj_cur').attr('data-value');
        //卧室数量
        var cd8 = <?php echo $cd8; ?>;
		var type = "<?php echo $type; ?>";
        //建造年份
        var cd9 = <?php echo $cd9; ?>;
        if(cd9 == 0){
            cd9 = '';
        }else if(cd9 == 1){
            cd9 = '0,1970';
        }else if(cd9 == 2){
            cd9 = '1971,1980';
        }else if(cd9 == 3){
            cd9 = '1981,1990';
        }else if(cd9 == 4){
            cd9 = '1991,2000';
        }else if(cd9 == 5){
            cd9 = '2001,2005';
        }else if(cd9 == 6){
            cd9 = '2006,2010';
        }else if(cd9 == 7){
            cd9 = '2011,0';
        }
        var url = '<?php echo Yii::app()->createUrl("map/index"); ?>&cd1='+cd1+'&cd2='+cd2+'&cd4='+cd4+'&cd5='+cd5+'&cd7='+cd7+'&cd8='+cd8+'&cd9='+cd9 + '&type='+type;
        window.open(url);
    }
</script>
