<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>加拿大房产置业平台</title>
                    <style>
#leftsead{width:131px;height:143px;position:fixed;bottom:250px;right:20px; z-index:999;}
*html #leftsead{margin-top:258px;position:absolute;top:expression(eval(document.documentElement.scrollTop));}
#leftsead li{width:131px;height:60px; list-style-type:none;}
#leftsead ul{ padding:0px; margin:0px;}
#leftsead li img{float:left;}
#leftsead li a{height:49px;float:right;display:block;min-width:47px;max-width:131px;}
#leftsead li a .shows{display:block;}
#leftsead li a .hides{margin-left:-80px;cursor:pointer;cursor:hand;}
#leftsead li a.u-sildeFade .hides{display:none;position:absolute;right:45px;top:-10px;}
#leftsead li a.u-sildeFade #weibo{display:none;position:absolute;right:45px;top:35px;}
		.footdownone { margin-bottom:13px;}
        .footdownone a{ font-size:14px; font-weight:bold}
		.footdownone a:hover{ color:#FFFF00; font-size:14px; font-weight:bold;text-decoration:none;}
		.f_linkdown a{ text-decoration:none;}
		.f_linkdown a:hover{ color:#FFFF00;text-decoration:none;}
		.f_linkdown ul{ padding:0px; margin:0px; }
		f_linkdown ul li{ list-style-type:none;}
        </style>
        <link type="text/css" rel="stylesheet" href="/themes/house/css/layout.css" />
                <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/fczx.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jslides.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/koala.min.1.5.js"></script>
</head>

<body>
<div class="main">
    <?php
     $db = Yii::app()->db;
	?>
    <!-- head开始 -->
    <div class="head">
        <div class="headleft"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/layout/logo.jpg" border="0" /></a></div>
        <div class="headright" style="width:auto">
            <span class="headrightone" style="width:auto">加拿大房产置业平台</span>
            <span class="headrighttwo" style="width:auto; margin-top:15px; padding-top:10px;">400-9900-393</span>
        </div>
        <div class="cl"></div>
    </div>
    <script type="text/javascript"> 
function countDown(secs,surl){ 
 //alert(surl); 
 var jumpTo = document.getElementById('jumpTo');
 jumpTo.innerHTML=secs; 
 if(--secs>0){ 
  setTimeout("countDown("+secs+",'"+surl+"')",1000); 
 }
 else
 {  
  location.href=surl; 
 } 
} 
</script>
    <!-- head结束 -->
    <!-- 跳转开始 -->
    <div class="tzym">
        <div class="tzymup">
          <span>该邮箱没有注册，请填写正确邮箱</span><br/>
            感谢您对枫之都的支持！<br/>
            我们会继续努力为您提供更优质的服务，<br/>
            愿您开心每一天！<br/>
           <span id="jumpTo">8</span>秒后自动跳转
<script type="text/javascript">
countDown(8,'<?php echo Yii::app()->createUrl('site/forgetPassword'); ?>');
</script> 
           <!-- <span>页面将在&nbsp;<span id="counter">8</span>&nbsp;秒后自动跳转</span> -->
        </div>
        <div class="tzymdown"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/layout/thank.jpg" /></div>
    </div>
    <!-- 跳转结束 -->

    <!-- foot开始 -->
<div class="foot">
  <div class="footup">
    <div class="f_linkup"> 友情链接 </div>
    <div class="f_linkdown">
                  <ul>
                  <?php
             
				  $sqljiaguo = "select * from h_link";
				  $resultjiaguo = $db->createCommand($sqljiaguo)->query();
				  foreach($resultjiaguo as $househaizai){
				  ?>
                       <li><a href="<?php echo $househaizai["url"];?>" target="_blank"><img src="<?php echo $househaizai["pic"];?>" width="80" height="40"/><BR /><?php echo $househaizai["title"];?></a></li>
                  <?php }?>
       
                       
                  </ul>
      <div class="cl"></div>
    </div>
  </div>
  <div class="footdown" style=" padding-top:30px;">
    <div class="footdownone"> <a href="index.php?r=about/about1&id=27">关于我们</a> <a href="index.php?r=about/about1&id=31">加入我们</a> <a href="index.php?r=about/about1&id=28">媒体报道</a> <a href="index.php?r=hotrecommend/index">海外房展</a> <a href="index.php?r=about/partner">公司动态</a> <a href="index.php?r=about/about1&id=30">联系我们</a> <a href="index.php?r=about/about1&id=40">投资须知</a> </div>
    <div class="footdowntwo">邮箱:info-china@maplecity.com.cn Copyright©2015 MAPLECITY Inc. &nbsp;All Rights Reserved    <a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" target="_blank">苏ICP备10045531号-4</a></div>
  </div>
</div>
<!-- foot结束 -->

</div>
<!-- 返回头部开 -->
 <div id="leftsead">
    <ul class="list-unstyled">
        <li>
            <a class="u-sildeFade">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/top_2.png" width="47" height="49" class="shows" />
                <img src="/themes/house/images/lianxi1.png"  class="hides" usemap="#taklhtml"/>
            </a>
        </li>
        <li>
            <a class="u-sildeFade">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/top_4.png" width="47" height="49" class="shows" />
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/weixin2.png" width="200" height="240" class="hides" usemap="#taklhtml"/>
            </a>
        </li>
        <li>
            <a class="u-sildeFade" href="http://weibo.com/p/1006065704804217/home">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/top_3.png" width="47" height="49" class="shows" />
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/weibo2.png" width="200" height="240" id="weibo" class="hides" usemap="#taklhtml"/>
            </a>
        </li>
        <li>
            <a href="tencent://message/?uin=1969378190&Site=edojia.com&Menu=yes">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ll04.png" width="131" height="49" class="hides"/>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/top_1.png" width="47" height="49" class="shows" />
            </a>
        </li>
        <li>
            <a href="http://j.map.baidu.com/tp727" target="_blank" title="地图">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ll05.png" width="131" height="49" class="hides"/>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/top_5.png" width="47" height="49" class="shows" />
            </a>
        </li>
        <li>
            <a id="top_btn">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ll06.png" width="131" height="49" class="hides"/>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/top.png" width="47" height="49" class="shows" />
            </a>
        </li>
    </ul>
</div><!--leftsead end-->
<script type="text/javascript">
    $(document).ready(function(){
        $(".hides").hide();
        $("#leftsead a").hover(function(){
            if($(this).prop("className")=="u-sildeFade"){
                $(this).children("img.hides").show();
            }else{
                $(this).children("img.hides").show();
                $(this).children("img.shows").hide();
                $(this).children("img.hides").animate({marginLeft:'0px'},'slow');
            }
        },function(){
            if($(this).prop("className")=="u-sildeFade"){
                $(this).children("img.hides").hide('slow');
            }else{
                $(this).children("img.hides").animate({marginLeft:'-80px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
            }
        });
        $("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({scrollTop: 0}, 300);});

    });
	
	
	                //导航下拉弹出
                $(document).ready(function() {
                    $(".nav-wrap").mouseover(function() {
                        $(this).find(".nav_up").addClass("on_a");
					    var navwidth=$(this).find(".nav_up").width();
                        $(this).find(".navtcbox").width(navwidth)
                        $(this).find(".navtcbox").stop(true).delay(400).slideDown();
                    });
                    $(".nav-wrap").mouseout(function() {
                        $(this).find(".navtcbox").stop(true).slideUp();
                        $(this).find(".nav_up").removeClass("on_a");
                    });
					
					                $("#global_search_btn").click(function(){
                    var msl = $("#global_search").val();
                    $.post('<?php echo Yii::app()->createUrl('site/globalSearch'); ?>', {'msl': msl}, function(json){
                        if(json.success){
                            window.open(json.msg);
                        }else{
                            alert(json.msg);
                        }
                    }, 'json');
                });
					
                });
</script>   
</body>
</html>
