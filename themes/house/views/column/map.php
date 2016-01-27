<!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB0Nd3Cbj-HPwggqQPpbGEMlPXe91muGMw&sensor=false"></script>-->
<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?libraries=places&language=zh-cn"></script>
<script type="text/javascript" src="/static/map/js/richmarker-compiled.js"></script>
<script type="text/javascript">

window.onload=function()//用window的onload事件，窗体加载完毕的时候
{
daolumap();
}

</script>
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
table{ border-collapse:collapse; margin:0 auto;}
tr{ text-align:center; height:47px;}
td{ border:1px solid #d8d8d8;  }
.xuequ_posotion{ font-size:14px;}
.xuequ_posotion a{ color:#333333}
.xuequ_posotion a:hover{ color:#FF6600}
</style>
<link href="/themes/house/xuequ/images_index/index.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_baseUrl ?>/static/map/css/map.css" type="text/css" rel="stylesheet" />
<div class="cl" style="height:15px"></div>

 <?php

$id=(int)$_GET["id"];
$connection = Yii::app()->db;
$sql = "select * from h_school where id=".$id."";
$command = $connection->createCommand($sql);
$result = $command->queryAll();

$sheng="Ontario";
$xiangxidizhi=$result[0]["address"];
$school=$result[0]["school"];
$paiming=$result[0]["paiming"];
$pingfen=$result[0]["pingfen"];
$xingzhi=$result[0]["xingzhi"];
$tel=$result[0]["tel"];
$type=$result[0]["type"];
if($type==0){$typename="小学排名";}else{$typename="中学排名";}
//$jingweidu=actionGetCodeAddress2($sheng.$xiangxidizhi);
$jingweidu["lat"]=$result[0]["lat"];
$jingweidu["lng"]=$result[0]["lng"];

 ?>    
 <div style="width:980px; margin:0 auto;">
<div class="xuequ_posotion">
                     <p><a href="/">首页 &nbsp;&nbsp;&gt;&nbsp;&nbsp;</a><a href="index.php?r=column/index">学区专栏</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<font color="#FF6600"><?php echo $typename;?></font></p>
                     </div>

<table width="980" border="0" cellspacing="0"  cellpadding="0">
                          <tr style=" background:#e2e2e2; height:32px;">
                            <td width="66">排名</td>
                            <td width="220">学校</td>
                            <td width="103">评分</td>
                            <td width="103">性质</td>
                            <td width="165">电话</td>
                            <td width="356">地址</td>
            </tr>

      
                          <tr>
                            <td><?php echo $paiming; ?></td>
                            <td><?php echo $school; ?></td>
                            <td><?php echo $pingfen; ?></td>
                            <td><?php echo $xingzhi; ?></td>
                            <td><?php echo $tel; ?></td>
                            <td><?php echo $xiangxidizhi; ?></td>
                          </tr>

        </table>
        </div>
        <a href="javascript:;" name="fydt" style="text-indent:-99999em; display:block;margin-bottom:25px;zoom: 1;">1</a>
        <div class="dtck_box hsdts_box5" style="width:980px; margin:0 auto;">
            <div class="fyxqdown_left_title">
                <a class="fyxqdown_left_cur" href="javascript:daolumap()">地图</a>
                <a href="javascript:streetmap(1)">街景</a>
                <div class="cl"></div>
            </div>
            <div class="dtck_box_two" style="background-color: #eee;width: 100%;">
			

			
                <div id="map" class="dataWrap" style=" display:block;height:430px"></div>
                <div id="map2" class="dataWrap" style="height:430px"></div>
            </div>
            <div class="dtck_box_three">
                <div class="map_cp">
                    <div class="map_cpone">周边设施</div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/house/m1.jpg" /></div>
                            <div class="map_cplist_right">学校</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/house/m2.jpg" /></div>
                            <div class="map_cplist_right">餐饮</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/house/m3.jpg" /></div>
                            <div class="map_cplist_right">交通</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/house/m4.jpg" /></div>
                            <div class="map_cplist_right">购物</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/house/m5.jpg" /></div>
                            <div class="map_cplist_right">医院</div>
                        </a>
                    </div>
                    <div class="map_cplist">
                        <a href="javascript:;">
                            <div class="map_cplist_left"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/house/m6.jpg" /></div>
                            <div class="map_cplist_right">银行</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- 房源详情页面结束 -->
<script>
    $(document).ready(function() {
        //搜索条件下拉
        $(document).ready(function() {
            $(".syss_xltj").mouseover(function() {
                $(this).find(".syss_xltjdown").show();
            });
            $(".syss_xltj").mouseout(function() {
                $(this).find(".syss_xltjdown").hide();
            });
            //搜索条件删除
            $(".fyss_tjsc a").click(function() {
                $(".fyss_tjqr").empty();
            });

            $(".fyss_qrtj_list").click(function() {
                $(this).remove();
            });

        });

        //加入收藏
        $(".collection").click(function() {
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

        //图片视频tab切换
        $(".fyxq_tab_tp").click(function() {
            $(this).addClass("fyxq_tab_cur");
            $(".fyxq_tab_sp").removeClass("fyxq_tab_cur");
            $(".diflash").show();
            $(".fyxq_tab_cont_sp").hide();
        });

        $(".fyxq_tab_sp").click(function() {
            $(this).addClass("fyxq_tab_cur");
            $(".fyxq_tab_tp").removeClass("fyxq_tab_cur");
            $(".diflash").hide();
            $(".fyxq_tab_cont_sp").show();
        });

    });
    //附近房源左右滚动效果
    $(function() {
        var i = 4
        var cont = $(".fjfy_gd_body img").size();
        var kd = (cont * 198) + "px";
        var last = (cont - i) * 198 + "px";
        var page = 1;
        var o = cont - 3;
        var page_cont = cont;
        $(".fjfy_gd_body_left").click(function() {
            if (page == 1) {
                $(".fjfy_gd_body").animate({"margin-left": '-=' + last}, 1000);
                page = o;
            }
            else {
                $(".fjfy_gd_body").animate({"margin-left": "+=198px"}, 1000);
                page--;
            }
            $("i").text(page);
        });

        $(".fjfy_gd_body_right").click(function() {
            if (page == o) {
                $(".fjfy_gd_body").animate({"margin-left": "0"}, 1000);
                page = 1;
            }
            else {
                $(".fjfy_gd_body").animate({"margin-left": "-=198px"}, 1000);
                page++;
            }
            $("i").text(page);
        });

    });
    //热点推荐左右滚动效果
    $(function() {
        var i = 4
        var cont = $(".fjfy_rd_body img").size();
        var kd = (cont * 198) + "px";
        var last = (cont - i) * 198 + "px";
        var page = 1;
        var o = cont - 3;
        var page_cont = cont;
        $(".fjfy_rd_body_left").click(function() {
            if (page == 1) {
                $(".fjfy_rd_body").animate({"margin-left": '-=' + last}, 1000);
                page = o;
            }
            else {
                $(".fjfy_rd_body").animate({"margin-left": "+=198px"}, 1000);
                page--;
            }
            $("i").text(page);
        });

        $(".fjfy_rd_body_right").click(function() {
            if (page == o) {
                $(".fjfy_rd_body").animate({"margin-left": "0"}, 1000);
                page = 1;
            }
            else {
                $(".fjfy_rd_body").animate({"margin-left": "-=198px"}, 1000);
                page++;
            }
            $("i").text(page);
        });

    });
</script>

<script type="text/javascript">
    flowplayer("video_wrap", "<?php echo Yii::app()->theme->baseUrl; ?>/js/flowplayer-3.2.12.swf", {
        clip: {
            url: "<?php echo Yii::app()->request->baseUrl; ?>" + "/" + "<?php echo $house->video_url; ?>",
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
    function getRate(code) {
        return '加元';
    }

	function setmapview(lat, lng, zoom) {
		map.setZoom(parseInt(zoom));
	}
	//Add House Marker and Content
	function addhousemarker(lat, lng, html,id){
		var markerArray = [];
		var infowindow = [];
		var isShow;
	    var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
		var image = {
			url: 'static/map/images/blue-map-pin.png'
			//size: new google.maps.Size(40, 40)
		};
		
		var url = "<?php echo Yii::app()->createUrl('house/view'); ?>&id=" + id  + "&sid=<?php echo $id?>" + "&lat=<?php echo $jingweidu['lat'];?>" + "&lng=<?php echo $jingweidu['lng'];?>";
		//console.log(url);
		//var content = "<i class='common_bg icon_map_mark'></i>";
		//var marker = new RichMarker({
        //        position: point,
        //        map: map,
        //        draggable: false,
        //        content: content,
        //        flat: true
        //    });
		var marker = new google.maps.Marker({
			position: point,
			map: map,
			icon: image,
			url: url
			
		});
            markerArray.push(marker);
            var info = new google.maps.InfoWindow({
                content: html,
                size: new google.maps.Size(40, 40)
				//disableAutoPan: true
                //pixelOffset: new google.maps.Size(20, 20)
            });
            infowindow.push(info);
			
            google.maps.event.addListener(marker, 'click', function() {
				
				window.open(this.url);
				
            });
 
            //marker z-index
            google.maps.event.addListener(marker, 'mouseover', function() {
				
               
			  info.open(map, marker);
                //setmapview(parseFloat(lat), parseFloat(lng), 14);
            
			//this.setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
			
            });
            google.maps.event.addListener(marker, 'mouseout', function() {
                this.setZIndex(google.maps.Marker.MAX_ZINDEX - 2);
				for (i = 0; i < infowindow.length; i++) {
                    infowindow[i].close();
                }
            });
        
	}
	
	//Remove Marker
	function removemarker(){
	//console.log("removemarker");
	}

	function gethouselist(map){
		//get houselist start
		var mapZoom = map.getZoom();
		var map_type = "";
		var map_price = "";
		var map_room = "";
		var map_year = "";
		var map_Ground = "";
		var map_Baths = "";
		var orderby = 0;
		var country = "";
		var city = '';
		var district = '';
		var mapInfo = null;
		var mapMark = null;
		var mapCenter;
		var mapZoom = 11;
		var infowindow = [];
		var markerArray = []; //marker array used by markercluster js
		var markers = [];
		var HouseArray = [];
		var HouseAreaArray = [];
		var publicArray = [];
		var mapisInit = true;
		var ne = map.getBounds().getNorthEast();
		var sw = map.getBounds().getSouthWest();
		bounds = sw.lat() + "," + sw.lng() + "," + ne.lat() + "," + ne.lng();
		var forIndex = 0;
        var Arrayindex = 0;
		//post to get list of house
        $.ajax({
                url: '<?php echo Yii::app()->createUrl('map/getMapHouse'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    bounds: bounds,
                    zoom: mapZoom,
                    housetype: map_type,
                    houseprice: map_price,
                    houseroom: map_room,
                    houseyear: map_year,
                    houseground: map_Ground,
                    housebaths: map_Baths,
                    orderby: orderby,
                    country: country,
                    city: city,
                    district: district
                },
                beforeSend: function() {
                    $(".loadhouse").show();
                },
                complete: function() {
                    $(".loadhouse").hide();
                },
                success: function(data) {
                    forIndex++;
			if (!data.IsError) {

				var count = 0;
				var tlat = 0.0000000;
				var tlng = 0.000000;

				$(data.Data.MapHouseList).each(function(index) {
					var imgurl = "/" + this.CoverImg;
					var houseid = this.Id;
					//console.log("HouseID" + houseid);
					var BuildYear = "";
					if (this.BuildYear != null && this.BuildYear > 100) {
						BuildYear = (new Date()).getFullYear() - this.BuildYear + "年";
					} else {
						BuildYear = "";
					}
					//var li = "<div class='fclist' onclick='openInfo(" + index + ", this)' index='" + Arrayindex + "' type='" + (this.Beds > 0 ? this.Beds + "卧" : "") + (this.Baths > 0 ? this.Baths + "卫 " : "") + (this.Kitchen > 0 ? this.Kitchen + "厨" : "") + "' Jd='" + this.id + "'  lat='" + this.GeocodeLat + "' lng='" + this.GeocodeLng + "' Address='" + this.Address + "' imgurl='" + imgurl + "' Price='" + this.Price + "' HouseType='" + this.HouseType + "' Id='" + this.Id + "' Country=" + this.Country + " Money=" + this.Money + " ><a href='javascript:;'><div class='fclistleft'><div class='house_pic'><img src='<?php echo Yii::app()->request->baseUrl; ?>" + imgurl + "' style='width:151px;height:116px' alt='" + this.CountryName + "房产_" + this.Area2Name + "房产_" + this.CountryName + this.Area2Name + this.HouseType + "房产' /></div></div><div class='fclistright'><div class='house_con2'><p class='house_no1 fc_title'><i>" + (Arrayindex + 1) + "</i><span>" + this.Price + "万" + getRate(this.Money) + "</span></p><p>类型：" + this.HouseType + "&nbsp;&nbsp;&nbsp;城市：" + this.CountryName + "</p><p>地址：" + this.Address + "</p><p>户型：" + (this.Beds > 0 ? this.Beds + "卧" : "") + (this.Baths > 0 ? this.Baths + "卫 " : "") + (this.Kitchen > 0 ? this.Kitchen + "厨" : "") + "</p></div></div><div class='cl'></div></a></div>";
					//HouseArray[Arrayindex] = li;
					if (mapZoom >= 10) {
						//点标注
						//var content = "<i class='common_bg icon_map_mark'><span>" + (Arrayindex + 1) + "</span></i>";
						//var html = "</div><div class='map_info_content'><div class='map_info_left'><img src='<?php echo Yii::app()->request->baseUrl; ?>" + imgurl + "' style='width:94px;height:74px'/></div><div class='map_info_right'><p class='orange map_info_price'><i class='common_bg'></i><span>价 格：</span><strong class='orange strong_width'>" + this.Price + "</strong><strong class='orange'>万" + getRate(this.Money) + "</strong><br /></p><p><a href='<?php echo Yii::app()->createUrl('house/view'); ?>&id=" + this.Id + "' target='_blank'>查看详情</a></p><p class='map_info_address'><i class='common_bg'></i>地 址：" + this.Address + "</p><p class='map_info_phone'><i class='common_bg'></i>类型：" + this.HouseType + "</p><p class='map_info_type'><i class='common_bg'></i>户 型：" + this.Beds + "卧 " + this.Baths + "卫 " + this.Kitchen + "厨</p></div><div class='clear'></div></div>";
						var html = "</div><div class='map_info_content'><div class='map_info_left'><img src='<?php echo Yii::app()->request->baseUrl; ?>" + imgurl + "' style='width:151px;height:116px'/></div><div class='map_info_right'><p class='orange map_info_price'><i class='common_bg'></i><span>价 格：</span><strong class='orange strong_width'>" + this.Price + "</strong><strong class='orange'>万" + getRate(this.Money) + "</p><p class='map_info_address'><i class='common_bg'></i>地 址：" + this.Address + "</p><p class='map_info_phone'><i class='common_bg'></i>类型：" + this.HouseType + "</p><p class='map_info_type'><i class='common_bg'></i>户 型：" + this.Beds + "卧 " + this.Baths + "卫 " + this.Kitchen + "厨</p></div><div class='clear'></div></div>";
						
						addhousemarker(parseFloat(this.GeocodeLat), parseFloat(this.GeocodeLng), html, houseid);
					}
					Arrayindex++;
				});
								
			}

				}
            });
 
 
 
	//gethouselist end
	}

    function daolumap() {
        $('.hsdts_box5 a').removeClass('fyxqdown_left_cur').eq(0).addClass('fyxqdown_left_cur');
        $('.hsdts_box5 .dataWrap').hide().eq(0).show();
        var mapLatLng = new google.maps.LatLng(parseFloat(<?php echo $jingweidu['lat']; ?>), parseFloat(<?php echo $jingweidu['lng']; ?>));
        var myOptions = {
            zoom: 14,
            center: mapLatLng,
			//draggable: false,
			minZoom:13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
		//add school marker
        map = new google.maps.Map(document.getElementById('map'), myOptions);
		google.maps.event.addListener(map, 'idle', function(event) {
			gethouselist(map);
		});
		
		google.maps.event.addListener(map, 'dragend', function(event) {
			gethouselist(map);
		});

		google.maps.event.addListener(map, "zoom_changed", function() {
                gethouselist(map);
			//removemarker();
			//addhousemarker();
	});

        var marker1 = new google.maps.Marker({
            position: mapLatLng,
            map: map,
			icon: {
				url: '/themes/house/images/house/m1.jpg',
				size: new google.maps.Size(40,40)
				}
			
        });
	
	
    }

    function streetmap(loca) {
        if (true) {
            var mapLatLng = new google.maps.LatLng(parseFloat(<?php echo $jingweidu['lat']; ?>), parseFloat(<?php echo $jingweidu['lng']; ?>));
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
