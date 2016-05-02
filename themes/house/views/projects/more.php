<link href="/themes/house/redian/images_redian/redian.css" rel="stylesheet" type="text/css" />
<style>
.dtck_box{ margin-top:20px;}
.map_cp{ height:39px; background-color:#ff4e00; overflow: hidden; }
.map_cpone{ float:left; font-size:14px; color:#FFFFFF; border-right:1px solid #fff; height:31px; line-height:31px; margin:4px 30px 4px 40px; padding-right:25px;}
.map_cplist{ float:left; height:29px; line-height:29px; margin:5px 30px;}
.map_cplist a{ display:block; color:#FFFFFF; text-decoration:none;white-space:nowrap;}
.map_cplist a:hover{ text-decoration:underline;}
.map_cplist_left{ float:left;}
.map_cplist_right{ float:left; padding-left:10px; font-size:14px;}
.maptwo{ float:right;*position:fixed;*right:0;}
.mapthree{ *position:fixed;*right:91px;}
.dtck_box_two{ height:430px; overflow:hidden;}
.nav_fl a:hover{ color:#FF6600}

.nytb_dz a{ font-size:14px; font-family:"微软雅黑";}
.nytb_dz a:hover{ color:#FF6600;}
</style>
<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?libraries=places&language=zh-cn"></script>
<script type="text/javascript" src="/static/map/js/richmarker-compiled.js"></script>

<div align="center"><img src="/themes/house/images/tuijian121.jpg" /></div>

<div class="nytb_dz" style="width: 1022px;"> <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> &gt; <span style="font-size:14px;">项目推荐</span> </div>

<div class="wrap">

     <div class="botton_nav">
                <div class="nav_wrap" style="width: 1022px;">
                                  <div class="nav_fl">
                                               <ul>
                                                    <li style="width:96px;"><img src="/themes/house/redian/images_redian/shouye.gif" align="absmiddle"/><a href="/">首页</a><span>|</span></li>
                                                     <li><a href="#000">项目介绍</a><span>|</span></li>
                                                      <li><a href="#001">项目优势</a><span>|</span></li>
                                                       <li><a href="#002">周边介绍</a><span>|</span></li>
                                                        <li><a href="#003">户型介绍</a><span>|</span></li>
                                                         <li style="width:112px;"><a href="#004">开发商介绍</a><span>|</span></li>
                                                          <li style="width:56px;"><a href="#005">地图</a><span>|</span></li>
                                                           <li style="width:140px;"><a href="#006">为何选择枫之都</a></li>
                                               </ul>
                                  </div>
                                  <div class="nav_fr">
                                      <p> <img src="/themes/house/redian/images_redian/zixun.gif" align="absmiddle"/><a href="#">在线咨询</a></p>
                                  </div>
                  </div>
     </div>
     <div class="liucheng">
	     <img src="/themes/house/redian/images_redian/liucheng.jpg"/>
     </div>
	 
	 
     <div class="project">
		<div class="intro_title"> <img src="/themes/house/redian/images_redian/intro.jpg"/>	</div>
		<div class="intro_top">
<!-- Swiper Start -->
		<div id="img_scroll">
		<?php echo $subject['name'];?> 
			<?php echo $subject['summary'];?> 
				<?php echo $subject['cityname'];?> 
		</div>

<!-- Swiper End -->

	</div>
     </div>
	

	<a id="002" name="002"></a>
	 <div class="surrounding">
                <div class="sur_title">
                    <img src="/themes/house/redian/images_redian/surround.jpg"/>
                </div>
				<div class="liyou_con">
                 <?php echo $subject['point'];?>
                
                </div>
     </div>
     
	 
	 <a id="003" name="003"></a>
     <div class="apartment">
                 <div class="apart_title">
                    <img src="/themes/house/redian/images_redian/apart.jpg"/>
                </div>
                                <div class="liyou_con">
                    <img src="/themes/house/redian/images_redian/huxing.jpg"/>
                
                </div>
     </div>
     
     <a id="004" name="004"></a>
     
	<div class="developer">
		<div class="deve_title">
			<img src="/themes/house/redian/images_redian/developers.jpg" width="1072" height="66"/>
		</div>
		<div class="developer_intro">
		  <?php echo $subject['developer_intro'];?>
		</div>
	</div>
 
     
	<a id="005" name="005"></a>

	<div class="maps">
		<div class="map_title">
			<img src="/themes/house/redian/images_redian/maps.jpg"/>
		</div>

		<div class="liyou_con" style="margin-top:-20px;">
			<script>
			window.onload=function()//用window的onload事件，窗体加载完毕的时候
			{
			daolumap();
			}
			</script>
			<a href="javascript:;" name="fydt" style="text-indent:-99999em; display:block;margin-bottom:25px;zoom: 1;">1</a>
        <div class="dtck_box hsdts_box5">
            <div class="fyxqdown_left_title">
                <a class="fyxqdown_left_cur" href="javascript:daolumap()">地图</a>
                <a href="javascript:streetmap(1)">街景</a>
                <div class="cl"></div>
            </div>
            <div class="dtck_box_two" style="background-color: #eee;width: 100%;">
                <div id="map1" class="dataWrap" style="display: block;height:430px"></div>
                <div id="map2" class="dataWrap" style="height:430px"></div>
            </div>
            <div class="dtck_box_three">
                <div class="map_cp">
                    <div class="map_cpone">周边设施</div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="/themes/house/images/house/m1.jpg" /></div>
                            <div class="map_cplist_right">学校</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="/themes/house/images/house/m2.jpg" /></div>
                            <div class="map_cplist_right">餐饮</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="/themes/house/images/house/m3.jpg" /></div>
                            <div class="map_cplist_right">交通</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="/themes/house/images/house/m4.jpg" /></div>
                            <div class="map_cplist_right">购物</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="/themes/house/images/house/m5.jpg" /></div>
                            <div class="map_cplist_right">医院</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="/themes/house/images/house/m6.jpg" /></div>
                            <div class="map_cplist_right">银行</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

		</div>
    
	</div>
     
     
     
     <a id="006" name="006"></a>
     <div class="liyou">
		<div class="liyou_title">
			<img src="/themes/house/redian/images_redian/liyou.jpg"/>
		</div>
		<div class="liyou_con">
			<img src="/themes/house/redian/images_redian/reason.jpg"/>
		</div>
     </div>


</div>



<script type="text/javascript">
    flowplayer("video_wrap", "/themes/house/js/flowplayer-3.2.12.swf", {
        clip: {
            url: "" + "/" + "",
            autoPlay: false,
            autoBuffering: true
        },
        plugins: {
            controls: {
                play: true, //开端按钮
                volume: true, //音量按钮
                mute: true, //静音按钮
                fullscreen: true, //全屏按钮
                scrubber: true, //进度条
                time: true, //是否显示时候信息
                autoHide: true    //功能条是否主动隐蔽
            }
        }
    });

    //图片焦点图切换
    var sj = 5000;
    $(function() {
        i = 0
        n = $(".diflashup span").length;
        time = setInterval("autoone()", sj);
    });

    function autoone() {
        i = i + 1;
        dq = i - 1;
        $(".diflashdown span:eq('" + dq + "')").addClass("span_cur").siblings().removeClass("span_cur");
        $(".diflashup span:eq('" + dq + "')").fadeIn(500).siblings().hide();
        if (i == n) {
            i = 0;
        }
    }

    $(document).ready(function() {
        $(".diflashdown span").mouseover(function() {
            var zs = $(this).index();
            $(this).addClass("span_cur").siblings().removeClass("span_cur");
            $(".diflashup span:eq('" + zs + "')").fadeIn(500).siblings().hide();
            clearTimeout(time);
        })
    });

    $(document).ready(function() {
        $(".diflashdown span").mouseout(function() {
            var zs = $(this).index();
            autotwo(zs);
            time = setInterval("autoone()", sj);
        })
    });

    function autotwo(k) {
        i = k;
        i = i + 1;
        dq = i - 1;
        $(".diflashdown span:eq('" + dq + "')").addClass("span_cur").siblings().removeClass("span_cur");
        $(".diflashup span:eq('" + dq + "')").fadeIn(500).siblings().hide();

        if (i == n) {
            i = 0;
        }
    }

    //小图片左右滚动
    $(function() {
        var page = 1;
        var t = 4; //每版放4个图片
        //向后 按钮
        $(".next-btn").click(function() {    //绑定click事件
            var content = $(".diflashdown");
            var content_list = $(".diflashdown_gd");
            var v_width = content.width();
            var len = content.find("span").length;
            var page_count = Math.ceil(len / t);   //只要不是整数，就往大的方向取最小的整数
            if (!content_list.is(":animated")) {    //判断“内容展示区域”是否正在处于动画
                if (page == page_count) {  //已经到最后一个版面了,如果再向后，必须跳转到第一个版面。
                    content_list.animate({left: '0px'}, "slow"); //通过改变left值，跳转到第一个版面
                    page = 1;
                } else {
                    content_list.animate({left: '-=' + v_width}, "slow");  //通过改变left值，达到每次换一个版面
                    page++;
                }
            }
        });
        //往前 按钮
        $(".prev-btn").click(function() {
            var content = $(".diflashdown");
            var content_list = $(".diflashdown_gd");
            var v_width = content.width();
            var len = content.find("span").length;
            var page_count = Math.ceil(len / t);   //只要不是整数，就往大的方向取最小的整数
            if (!content_list.is(":animated")) {    //判断“内容展示区域”是否正在处于动画
                if (page == 1) {  //已经到第一个版面了,如果再向前，必须跳转到最后一个版面。
                    content_list.animate({left: '-=' + v_width * (page_count - 1)}, "slow");
                    page = page_count;
                } else {
                    content_list.animate({left: '+=' + v_width}, "slow");
                    page--;
                }
            }
        });
    });

    //google地图开始
    $(function() {
        mapinit();
    });

    function mapinit() {
        ///地图
        var mapLatLng = new google.maps.LatLng(parseFloat(49.2736159), parseFloat(-123.1144621));
        var myOptions = {
            zoom: 13,
            center: mapLatLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map1 = new google.maps.Map(document.getElementById('map1'), myOptions);
        var marker1 = new google.maps.Marker({
            position: mapLatLng,
            map: map1
        });
    }

    function daolumap() {
        $('.hsdts_box5 a').removeClass('fyxqdown_left_cur').eq(0).addClass('fyxqdown_left_cur');
        $('.hsdts_box5 .dataWrap').hide().eq(0).show();
        var mapLatLng = new google.maps.LatLng(parseFloat(49.2736159), parseFloat(-123.1144621));
        var myOptions = {
            zoom: 13,
            center: mapLatLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map1 = new google.maps.Map(document.getElementById('map1'), myOptions);
        var marker1 = new google.maps.Marker({
            position: mapLatLng,
            map: map1
        });
    }

    function streetmap(loca) {
        if (true) {
            var mapLatLng = new google.maps.LatLng(parseFloat(49.2736159), parseFloat(-123.1144621));
            var panoramaOptions = {pov: {heading: 0, pitch: 0, zoom: 0}, position: mapLatLng};
            if (loca == 0) {
                var panorama = new google.maps.StreetViewPanorama(document.getElementById("streetMap"), panoramaOptions);
            } else if (loca == 1) {
                $('.hsdts_box5 a').removeClass('fyxqdown_left_cur').eq(1).addClass('fyxqdown_left_cur');
                $('.hsdts_box5 .dataWrap').hide().eq(1).show();
                var Streetmap2 = new google.maps.StreetViewPanorama(document.getElementById("map2"), panoramaOptions);
            } else {
                $('.hsdts_box5 a').removeClass('fyxqdown_left_cur').eq(1).addClass('fyxqdown_left_cur');
                $('.hsdts_box5 .dataWrap').hide().eq(1).show();
                var Streetmap2 = new google.maps.StreetViewPanorama(document.getElementById("map2"), panoramaOptions);
                var panorama = new google.maps.StreetViewPanorama(document.getElementById("streetMap"), panoramaOptions);
            }
        }
    }
</script> 


<!-- 豪宅鉴赏结束 -->
<script type="text/javascript">
    //豪宅列表
    $(document).ready(function(){
//热门推荐头部
        $(".enjoydowncont .enjoy_xxym:eq(0)").show();
        $(".enjoydown_hzjs_tab span").click(function(){
            var k=$(this).index();
            $('.enjoydowncont .enjoy_xxym:eq('+k+')').show().siblings().hide();
            $(this).addClass("spanon").siblings().removeClass("spanon");
        });

        $(".enjoy_xxym_pic_down").find(".enjoy_js_list:eq(0)").show();
        $(".enjoy_xxym_pic_up a").mouseover(function(){
            var r=$(this).index();
            $(this).parent().next().find('.enjoy_js_list:eq('+r+')').show().siblings().hide();
            $(this).addClass("enjoy_xxym_pic_on").siblings().removeClass("enjoy_xxym_pic_on");
        });
    });
</script>