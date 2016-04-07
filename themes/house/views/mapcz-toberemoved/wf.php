<div class="loadhouse">
    正在加载房源数据，请稍候...
</div>
<div class="clear"></div>
<script src="/scripts/jquery-1.7.1.js"></script>
<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?sensor=false&language=zh-cn"></script>

<script src="/scripts/richmarker-compiled.js"></script>
<script type="text/javascript">
    var mapInfo = null;
    var mapMark = null;
    var mapCenter;
    var mapZoom = 3;
    var infowindow = [];
    var markerArray = [];
    var HouseArray = [];
    var publicArray = [];
    var mapisInit = true;

    var getHouseType = function (houseType) {
if(houseType.toUpperCase()=='DUPXH'){return '联排';}if(houseType.toUpperCase()=='RECHE'){return '度假屋';}if(houseType.toUpperCase()=='CONDOAPT'){return '高级公寓';}if(houseType.toUpperCase()=='SALEOFBUSINESS'){return '商铺';}if(houseType.toUpperCase()=='OTHER'){return '其它';}if(houseType.toUpperCase()=='WINERY'){return '酒庄';}if(houseType.toUpperCase()=='INDUSTRIAL'){return '工厂';}if(houseType.toUpperCase()=='LEASEHOLDCONDO'){return '租赁公寓';}if(houseType.toUpperCase()=='HOUSE'){return '别墅';}if(houseType.toUpperCase()=='PARKINGSPACE'){return '停车位';}if(houseType.toUpperCase()=='MOBILETRAILER'){return '移动板房';}if(houseType.toUpperCase()=='MANUF'){return '简易屋';}if(houseType.toUpperCase()=='HACR'){return '豪宅';}if(houseType.toUpperCase()=='APTU'){return '公寓';}if(houseType.toUpperCase()=='HOTEL'){return '酒店';}if(houseType.toUpperCase()=='FARM'){return '农场';}if(houseType.toUpperCase()=='LOCKER'){return '储物柜';}if(houseType.toUpperCase()=='LAND'){return '土地';}if(houseType.toUpperCase()=='MANSION'){return '豪宅';}if(houseType.toUpperCase()=='OFFICE'){return '商业';}    }

    var map_type = "";
    var map_price = "";
    var map_room = "";
    var map_year = "";
    var map_Ground = "";
    var map_Baths = "";
    var orderby = 0;
    var country = "";
    var local_type;
    var mapOptions;
    var pageIndex = 1;
    mapOptions = {
        center: new google.maps.LatLng(parseFloat(33.43144133557529), parseFloat(-35.859375)),
        zoom: parseInt(2+1),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        minZoom: 2
    };
    var map = new google.maps.Map(document.getElementById("mapbox"), mapOptions);
    mapCenter = map.getCenter();
    mapZoom = map.getZoom();
    google.maps.event.addListener(map, "bounds_changed", function () {
        if (mapZoom != map.getZoom()) {
            changeMap();
        }
    });
    google.maps.event.addListener(map, 'dragend', function () {
        changeMap();
    });

    var getRate = function (code) {
        var Rate = JSON.parse('[{"RateCode":"CNY","RateName":"人民币","RateValue":1.0000},{"RateCode":"USD","RateName":"美元","RateValue":6.2152},{"RateCode":"EUR","RateName":"欧元","RateValue":7.1966},{"RateCode":"AUD","RateName":"澳元","RateValue":5.0867},{"RateCode":"GBP","RateName":"英镑","RateValue":9.3681},{"RateCode":"CAD","RateName":"加元","RateValue":5.1919},{"RateCode":"JPY","RateName":"日元 ","RateValue":0.0525},{"RateCode":"KRW","RateName":"韩元","RateValue":0.0057},{"RateCode":"SGD","RateName":"新加坡元","RateValue":4.6427},{"RateCode":"MYR","RateName":"马来西亚元","RateValue":1.7262},{"RateCode":"THB","RateName":"泰铢","RateValue":0.1891}]');
        for (var i = 0; i < Rate.length; i++) {
            if (Rate[i].RateCode == code)
            {
                return Rate[i].RateName;
            }
        }
    }
    var googleMap = {
        //向地图添加信息内容
        setContent: function (lat, lng, content, html, isShow,index) {
            var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
            var marker = new RichMarker({
                position: point,
                map: map,
                draggable: false,
                content: content,
                flat: true
            });
            markerArray.push(marker);
            var info = new google.maps.InfoWindow({
                content: html,
                size: new google.maps.Size(50, 50)
            });
            infowindow.push(info);
            google.maps.event.addListener(marker, 'click', function (e) {
                for (i = 0; i < infowindow.length; i++) {
                    infowindow[i].close();
                }
                info.open(map, marker);
                googleMap.setMapView(parseFloat(lat), parseFloat(lng), mapZoom);
                if (mapZoom > 8)
                {
                    $("li.first_li").remove();
                    $("#ul_house_list").html(HouseArray[index] + $("#ul_house_list").html());
                    $("#ul_house_list li").removeClass("curre").first().addClass("curre").addClass("first_li").next().addClass("first_li");
                }
            });
            if (isShow) {
                for (i = 0; i < infowindow.length; i++) {
                    infowindow[i].close();
                }
                info.open(map, marker);
                googleMap.setMapView(parseFloat(lat), parseFloat(lng), mapZoom);
            }
        },//在地图添加房源数量信息
        setContentCount: function (lat, lng, html, zoom) {
            if (mapZoom == 2) {
                lat = lat - 8;
            } else if (mapZoom == 3) {
                lat = lat - 4;
            } else if (mapZoom == 4) {
                lat = lat - 1.8;
            }
            var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
            var marker = new RichMarker({
                position: point,
                map: map,
                draggable: false,
                content: html,
                flat:true
            });
            markerArray.push(marker);
            google.maps.event.addListener(marker, 'click', function () {
                if (zoom == 0) {
                    googleMap.setMapView(lat, lng, mapZoom + 1);
                } else {
                    googleMap.setMapView(lat, lng, zoom);
                }

            });
        },///本地信息
        createMarker: function (place) {
            var placeLoc = place.geometry.location;
            var html;
            if (local_type == "school") {
                html = "<i class='homelist icon_scool3'></i>";
            }
            else if (local_type == "restaurant") {
                html = "<i class='homelist icon_dining3'></i>";
            } else if (local_type == "bus_station") {
                html = "<i class='homelist icon_traffic3'></i>";
            } else if (local_type == "grocery_or_supermarket") {
                html = "<i class='homelist icon_shopping3'></i>";
            } else if (local_type == "hospital") {
                html = "<i class='homelist icon_hospital3'></i>";
            } else if (local_type == "bank") {
                html = "<i class='homelist icon_bank3'></i>";
            } else {
                html = "<i class='common_bg icon_map_mark'></i>";
            }
            var marker = new RichMarker({
                position: place.geometry.location,
                map: map,
                draggable: false,
                flat: true,
                content: html
            });
            publicArray[publicArray.length] = marker;
        },//清空所有信息内容
        clearAll: function () {
            if (markerArray) {
                for (var i in markerArray) {
                    markerArray[i].setMap(null);
                }
                markerArray.length = 0;
            }
            if (infowindow) {
                for (var i in infowindow) {
                    infowindow[i] = null;
                }
                infowindow.length = 0;
            }
            if (publicArray) {
                for (var i in publicArray) {
                    publicArray[i].setMap(null);
                }
                publicArray.length = 0;
            }
        },///设置地图位置大小
        setMapView: function (lat, lng, zoom) {
            map.setCenter(new google.maps.LatLng(parseFloat(lat), parseFloat(lng)));
            map.setZoom(parseInt(zoom));
        },
        localSearh: function (searchName) {
            request = {
                location: mapCenter,
                radius: '10000',
                types: [local_type]
            };
            service = new google.maps.places.PlacesService(map);
            service.search(request, function (results, status) {
                if (publicArray) {
                    for (var i in publicArray) {
                        publicArray[i].setMap(null);
                    }
                    publicArray.length = 0;
                }
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        googleMap.createMarker(results[i]);
                    }
                }
            });
        }
    };

    var changeMap = function () {
        googleMap.clearAll();
        mapCenter = map.getCenter();
        mapZoom = map.getZoom();
        var _sw = map.getBounds().getSouthWest();
        var _ne = map.getBounds().getNorthEast();
        var centerlat = (_ne.lat() + _sw.lat()) / 2;
        var centerlng = (_ne.lng() + _sw.lng()) / 2;
        var number1 = _sw.lat() + "," + _sw.lng() + "," + centerlat + "," + centerlng;
        var number2 = centerlat + "," + centerlng + "," + _ne.lat() + "," + _ne.lng();
        var number3 = centerlat + "," + _sw.lng()+ "," + _ne.lat() + "," + centerlng;
        var number4 = _sw.lat() + "," + centerlng + "," + centerlat + "," + _ne.lng();
        var lenght = 4;
        if (mapZoom < 9) {
            lenght = 1;
        }
        $("#Houses_count").text("0");
        HouseArray = [];
        var forIndex = 0;
        var Arrayindex = 0;
        for (var i = 0; i < lenght; i++) {
            if (lenght == 1 && i == 0) {
                _bounds = _sw.lat() + "," + _sw.lng() + "," + _ne.lat() + "," + _ne.lng();
            } else if (i == 0 && lenght == 4) {
                _bounds = number1;
            } else if (i == 1 && lenght == 4) {
                _bounds = number2;
            } else if (i == 2 && lenght == 4) {
                _bounds = number3;
            } else {
                _bounds = number4;
            }
            jQuery.ajax({
                url: '/Mapcz/GetMapczHousexxk',
                type: 'POST',
                data: {
                    bounds: _bounds,
                    zoom: mapZoom,
                    housetype: map_type,
                    houseprice: map_price,
                    houseroom: map_room,
                    houseyear: map_year,
                    houseground: map_Ground,
                    housebaths: map_Baths,
                    orderby: orderby,
                    country:country
                },
                beforeSend: function () {
                    jQuery(".loadhouse").show();
                },
                complete: function () {
                    jQuery(".loadhouse").hide();
                },
                success: function (data) {
                    forIndex++;
                    if (!data.IsError) {
                        if (mapZoom < 10) {
                            $(data.Data.AreaHouseCount).each(function (index) {
                                var html = "";
                                if (mapZoom < 4) {
                                    if (this.HouseCount > 100000) {
                                        html = " <span  class='maplist icon_map_house3' title=" + this.NameCn + ">" + (this.NameCn.length > 4 ? this.NameCn.substring(0, 4) + "..." : this.NameCn) + "<br/>" + (this.HouseCount / 10000).toFixed(1) + "万套</span>";
                                    }
                                    else if (this.HouseCount > 10000) {
                                        html = "<span class='maplist icon_map_house4' title=" + this.NameCn + ">" + (this.NameCn.length > 4 ? this.NameCn.substring(0, 4) + "..." : this.NameCn) + "<br/>" + (this.HouseCount / 10000).toFixed(1) + "万套</span>";
                                    } else {
                                        html = "<span class='maplist icon_map_house5' title=" + this.NameCn + ">" + this.HouseCount + "套</span>";
                                    }
                                }
                                else if (mapZoom > 7) {
                                    if (this.HouseCount > 5000) {
                                        html = "<span class='maplist icon_map_house3' title=" + this.NameCn + ">" + (this.NameCn.length > 4 ? this.NameCn.substring(0, 4) + "..." : this.NameCn) + "<br/>" + this.HouseCount + "套</span>";
                                    } else if (this.HouseCount > 500) {
                                        html = "<span class='maplist icon_map_house4' title=" + this.NameCn + ">" + (this.NameCn.length > 4 ? this.NameCn.substring(0, 4) + "..." : this.NameCn) + "<br/>" + this.HouseCount + "套</span>";
                                    } else if (this.HouseCount > 100) {
                                        html = "<span class='maplist icon_map_house5' title=" + this.NameCn + ">" + this.HouseCount + "套</span>";
                                    } else {
                                        html = "<span class='maplist icon_map_house6' title=" + this.NameCn + ">" + this.HouseCount + "套</span>";
                                    }
                                } else {
                                    var NameCn = this.NameCn;
                                    if (this.NameCn.length > 5)
                                    {
                                        NameCn = NameCn.substring(0, 5) + ".";
                                    }
                                    html = " <div class='house_list_count2 common_bg' title=" + this.NameCn + "><span>" + NameCn + "</span><span class='house_number'>" + this.HouseCount + "</span><span class='house_number_1'>套</span></div>";
                                }
                                if (this.MaxZoom > mapZoom) {
                                    googleMap.setContentCount(this.GeocodeLat, this.GeocodeLng, html, 0);
                                } else {
                                    googleMap.setContentCount(this.GeocodeLat, this.GeocodeLng, html, 0);
                                }

                            });
                        }
                        var count = 0;
                        var tlat = 0.0000000;
                        var tlng = 0.000000;
                        var number = 0;
                        if (mapZoom <= 9) {
                            number = 1;
                        }else if (mapZoom == 10) {
                            number = 0.5;
                        } else if (mapZoom == 11) {
                            number = 0.01;
                        } else if (mapZoom == 12) {
                            number = 0.001;
                        } else if (mapZoom > 12) {
                            number = 0.000001;
                        }
                        $(data.Data.MapHouseList).each(function (index) {
                            if (this.CoverImg.indexOf("/s/") == -1)
                                var imgurl = "http://housephoto.oss-cn-hangzhou.aliyuncs.com/s" + this.CoverImg;
                            else
                                var imgurl = "http://housephoto.oss-cn-hangzhou.aliyuncs.com" + this.CoverImg;
                            var HouseType = getHouseType(this.HouseType.toUpperCase());
                            var BuildYear = "";
                            if (this.BuildYear != null && this.BuildYear > 100) {
                                BuildYear = (new Date()).getFullYear() - this.BuildYear + "年";
                            } else {
                                BuildYear = "不详";
                            }
                            var li = "<li class='Geocode' index='" + Arrayindex + "' type='" + (this.Beds > 0 ? this.Beds + "卧" : "") + (this.Baths > 0 ? this.Baths + "卫 " : "") + (this.Kitchen > 0 ? this.Kitchen + "厨" : "") + "' lat='" + this.GeocodeLat + "' lng='" + this.GeocodeLng + "' Address='" + this.Address + "' imgurl='" + imgurl + "' Price='" + this.Price + "' HouseType='" + HouseType + "' Id='" + this.Id + "' Country=" + this.Country + " Money=" + this.Money + " ><div class='house_pic'><img src='" + imgurl + "' style='width:151px;height:116px' alt='" + this.CountryName + "房产_" + this.Area2Name + "房产_" + this.CountryName + this.Area2Name + HouseType + "房产' /></div><div class='house_con2'><p class='house_no1'><i>" + (Arrayindex + 1) + "</i><span>" + (this.Price / 10000).toFixed(1) + "万" + getRate(this.Money) + "</span></p><p>类型：" + HouseType + "&nbsp;&nbsp;&nbsp;国家：" + this.CountryName + "</p><p>地址：" + this.Address + "</p><p>户型：" + (this.Beds > 0 ? this.Beds + "卧" : "") + (this.Baths > 0 ? this.Baths + "卫 " : "") + (this.Kitchen > 0 ? this.Kitchen + "厨" : "") + "</p><p>房龄：" + BuildYear + "</p></div></li> <li class='house_line1'></li>";
                            HouseArray[Arrayindex] = li;
                            if (mapZoom > 8 || data.Data.AreaHouseCount.length==0) {
                                if (parseFloat(this.GeocodeLat) < (tlat + number) && parseFloat(this.GeocodeLat) > (tlat - number) && parseFloat(this.GeocodeLng) < (tlng + number) && parseFloat(this.GeocodeLng) > (tlng - number) && index < (data.Data.MapHouseList.length - 1) && mapZoom < 13) {
                                    count = count + 1;
                                }
                                else {
                                    if (count == 1) {
                                        var content = "<i class='common_bg icon_map_mark'></i>";
                                        var html = "<div class='map_info_title'>" + this.Address + "</div><div class='map_info_content'><div class='map_info_left'><img src='" + imgurl + "' style='width:188px;height:148px'/></div><div class='map_info_right'><p class='orange map_info_price'><i class='common_bg'></i><span>价 格：</span><strong class='orange strong_width'>" + (this.Price / 10000).toFixed(1) + "</strong><strong class='orange'>万" + getRate(this.Money).RateName + "</strong><br /></p><p class='map_info_prefer'><a href='/" + this.Country + "/house/" + this.Id + "' target='_blank'><span class='preferential common_bg'>查看详情</span></a></p><p class='map_info_address'><i class='common_bg'></i>地 址：" + this.Address + "</p><p class='map_info_phone'><i class='common_bg'></i>类型：" + HouseType + "</p><p class='map_info_type'><i class='common_bg'></i>户 型：" + this.Beds + "卧 " + this.Baths + "卫 " + this.Kitchen + "厨</p></div><div class='clear'></div></div>";
                                        googleMap.setContent(tlat, tlng, content, html, false, Arrayindex);
                                        count = 0;
                                        tlat = 0.0000000;
                                        tlng = 0.000000;
                                    } else if (count > 1) {
                                        var htmls = "";
                                        if (count == 99) {
                                            htmls = "<span class='maplist icon_map_house6'>" + count + "+</span>";
                                        } else {
                                            htmls = "<span class='maplist icon_map_house6'>" + count + "</span>";
                                        }
                                        googleMap.setContentCount(tlat, tlng, htmls, 0);
                                        count = 0;
                                        tlat = 0.0000000;
                                        tlng = 0.000000;
                                    } else {
                                        count = count + 1;
                                        tlat = parseFloat(this.GeocodeLat);
                                        tlng = parseFloat(this.GeocodeLng);
                                        if (index == data.Data.MapHouseList.lenght - 1) {
                                            if (count == 1) {
                                                var content = "<i class='common_bg icon_map_mark'></i>";
                                                var html = "<div class='map_info_title'>" + this.Address + "</div><div class='map_info_content'><div class='map_info_left'><img src='" + imgurl + "' style='width:188px;height:148px'/></div><div class='map_info_right'><p class='orange map_info_price'><i class='common_bg'></i><span>价 格：</span><strong class='orange strong_width'>" + (this.Price / 10000).toFixed(1) + "</strong><strong class='orange'>万" + getRate(this.Money) + "</strong><br /></p><p class='map_info_prefer'><a href='/" + this.Country + "/house/" + this.Id + "' target='_blank'><span class='preferential common_bg'>查看详情</span></a></p><p class='map_info_address'><i class='common_bg'></i>地 址：" + this.Address + "</p><p class='map_info_phone'><i class='common_bg'></i>类型：" + HouseType + "</p><p class='map_info_type'><i class='common_bg'></i>户 型：" + this.Beds + "卧 " + this.Baths + "卫 " + this.Kitchen + "厨</p></div><div class='clear'></div></div>";
                                                googleMap.setContent(tlat, tlng, content, html, false, Arrayindex);
                                            } else {
                                                if (count == 99) {
                                                    htmls = "<span class='maplist icon_map_house6'>" + count + "+</span>";
                                                } else {
                                                    htmls = "<span class='maplist icon_map_house6'>" + count + "</span>";
                                                }
                                                googleMap.setContentCount(tlat, tlng, htmls, 0);
                                            }
                                        }
                                    }
                                }
                            }
                            Arrayindex++;
                        });
                    }
                    if (lenght == forIndex) {
                        $("#Houses_count").text(HouseArray.length % 100 == 0 ? HouseArray.length + "+" : HouseArray.length);
                        $("#house_count").text(HouseArray.length % 100 == 0 ? HouseArray.length + "+" : HouseArray.length);
                        var tableHtml = "";
                        $.each(HouseArray, function (index) {
                            if (index < 20) {
                                if (HouseArray[index]) {
                                    tableHtml = tableHtml + HouseArray[index];
                                }
                            }
                        });
                        $("#ul_house_list").html(tableHtml);
                        pageIndex = 1;
                        $("#pageIndex").text(pageIndex);
                    }
                }
            });
        }
    }

    var search_box = function () {
        if ($("#search_table").html() != "") {
            $(".search_bg").attr("style", "height:300px;overflow-y:hidden;overflow-x:hidden");
        } else {
            $(".search_bg").attr("style", "height:27px;");
        }
    }

    $(function () {
        $('.loadhouse').css({
            left: ($(window).width()) / 2,
            top: ($(window).height()) / 2
        });
        $(".switching_country").hover(function () {
            $(".switching_box").show();
        }, function () {
            $(".switching_box").hide();
        });
        $(".switching_box").hover(function () {
            $(this).show();
        }, function () {
            $(this).hide();
        });
        $(".swithcing_ul li").click(function () {
            var geo = $(this).attr("data-value").split(',');
            googleMap.setMapView(parseFloat(geo[0]), parseFloat(geo[1]), parseInt(geo[2]))
            $("#countryName").text($(this).text());
        });
        $(".ul_condition li").hover(function () {
            $(this).find(".house_conditon2").attr("class", "house_conditon2 tab_current2");
            $(this).find(".show_div").show();
        }, function () {
            $(this).find(".house_conditon2").attr("class", "house_conditon2");
            $(this).find(".show_div").hide();
        });
        $(".header").hide();
        $(".home-footer").hide();
        $(".Geocode").live("click", function () {
            $(".ul_house_list li").removeClass("curre");
            $(this).addClass("curre");
            var info = $(this);
            var html = "<div class='map_info_title'>" + $(info).attr("Address") + "</div><div class='map_info_content'><div class='map_info_left'><img src='" + $(info).attr("imgurl") + "' style='width:188px;height:148px'/></div><div class='map_info_right'><p class='orange map_info_price'><i class='common_bg'></i><span>价 格：</span><strong class='orange strong_width'>" + ($(info).attr("Price") / 10000).toFixed(1) + "</strong><strong class='orange'>万" + getRate($(info).attr("Money")) + "</strong><br /></p><p class='map_info_prefer'><a href='/" + $(info).attr("Country") + "/house/" + $(info).attr("Id") + "' target='_blank'><span class='preferential common_bg'>查看详情</span></a></p><p class='map_info_address'><i class='common_bg'></i>地 址：" + $(info).attr("Address") + "</p><p class='map_info_phone'><i class='common_bg'></i>类型：" + $(info).attr("HouseType") + "</p><p class='map_info_type'><i class='common_bg'></i>户 型：" + $(info).attr("type") + "</p></div><div class='clear'></div></div>";
            googleMap.setContent($(info).attr("lat"), parseFloat($(info).attr("lng")), "<i class='common_bg icon_map_mark'></i>", html, true,$(info).attr("index"));
        });
        $(".house_next").click(function () {
            if ((HouseArray.length / 20.00) > pageIndex) {
                var tableHtml = "";
                pageIndex = pageIndex + 1;
                $.each(HouseArray, function (index) {
                    if (index < 20 * pageIndex && (20 * (pageIndex - 1)) <= index) {
                        tableHtml = tableHtml + this;
                    }
                });
                $("#ul_house_list").html(tableHtml);
                $("#pageIndex").text(pageIndex);
            }
        });
        $(".Search_local").click(function () {
            local_type = $(this).attr("data-value");
            googleMap.localSearh(local_type);
        });
        $("#city").focus(function () {
            if ($(this).val() == "州名/市名(中英文)") {
                $(this).val("");
            }
        });
        $("#city").click(function () {
            this.select();
        });
        $("#city").keyup(function () {
            var key = $(this).val().trim();
            if (key != "") {
                $.post("/Mapcz/GetMapCity", { "cityName": key }, function (data) {
                    if (!data.IsError) {
                        var html1 = "";
                        var html2 = "";
                        if (key == $("#city").val()) {
                            $.each(data.Data, function (index, value) {
                                var text = this.NameCn + "(" + this.NameEn + ")";
                                var demo = text.substr(text.toUpperCase().indexOf(key.toUpperCase()), key.length);
                                if (value.AreaLevel == 1) {
                                    if (html1 == "") {
                                        html1 = "<tr><th>州/省</th><td><a href='JavaScript:void(0)' class='search_city' Country=" + this.Country + " lat='" + this.GeocodeLat + "' lng='" + this.GeocodeLng + "' zoom='" + (this.MinZoom + 1) + "'>" + text.replace(demo, "<lable style='color:red'>" + demo + "</lable>") + "</a></td></tr>";
                                    } else {
                                        html1 = html1 + "<tr><th></th><td><a href='JavaScript:void(0)' class='search_city' Country=" + this.Country + "  lat='" + this.GeocodeLat + "' lng='" + this.GeocodeLng + "' zoom='" + (this.MinZoom + 1) + "'>" + text.replace(demo, "<lable style='color:red'>" + demo + "</lable>") + "</a></td></tr>";
                                    }
                                } else {
                                    if (html2 == "") {
                                        html2 = "<tr><th>城市</th><td><a href='JavaScript:void(0)' class='search_city' Country=" + this.Country + " lat='" + this.GeocodeLat + "' lng='" + this.GeocodeLng + "' zoom='" + (this.MinZoom + 1) + "'>" + text.replace(demo, "<lable style='color:red'>" + demo + "</lable>") + "</a></td></tr>";
                                    } else {
                                        html2 = html2 + "<tr><th></th><td><a href='JavaScript:void(0)' class='search_city' Country=" + this.Country + " lat='" + this.GeocodeLat + "' lng='" + this.GeocodeLng + "' zoom='" + (this.MinZoom + 1) + "'>" + text.replace(demo, "<lable style='color:red'>" + demo + "</lable>") + "</a></td></tr>";
                                    }
                                }
                            });
                            $("#search_table").html(html1 + html2);
                            search_box();
                        }
                    }
                });
            }
        });
        $("#city").blur(function () {
            if ($(this).val() == "") {
                $(this).val("州名/市名(中英文)");
            }
            setTimeout('$("#search_table").html("");search_box();', 1000);
        });

        $(".search").click(function () {
            var type = $(this).attr("data-type");
            var value = $(this).attr("data-value");
            if (type == "housetype") {
                map_type = value;
                $(".type_center a").attr("class", "search");
                $(this).attr("class", "type_current search");
            } else if (type == "price") {
                map_price = value;
                $(".price_type a").attr("class", "search");
                $(this).attr("class", "type_current search");
            } else if (type == "room") {
                map_room = value;
                $(".type2_ul li").attr("class", "");
                $(this).parent().attr("class", "type_current");
            } else if (type == "year") {
                map_year = value;
                $("#year_list a").attr("class", "search");
                $(this).attr("class", "type_current search");
            } else if (type == "Ground") {
                map_Ground = value;
                $("#ground_list a").attr("class", "search");
                $(this).attr("class", "type_current search");
            } else if (type == "button_price") {
                var begin_price = $("#begin_price").val();
                var end_price = $("#end_price").val();
                if (parseInt(begin_price) > parseInt(end_price)) {
                    $("#begin_price").val(parseInt(end_price));
                    $("#end_price").val(parseInt(begin_price));
                    begin_price = $("#begin_price").val();
                    end_price = $("#end_price").val();
                }
                else {
                    $("#begin_price").val(parseInt(begin_price));
                    $("#end_price").val(parseInt(end_price));
                }
                map_price = begin_price + "," + end_price;
            } else if (type = "button_Baths") {
                map_Baths = parseInt($("#Baths").text());
            } else { }
            changeMap();
        });

        $(".search_city").live("click", function () {
            var lat = $(this).attr("lat");
            var lng = $(this).attr("lng");
            var zoom = parseInt($(this).attr("zoom"));
            if (zoom == 1) {
                zoom = 4;
            }
            country = $(this).attr("Country");
            var text = $(this).text();
            googleMap.setMapView(lat, lng, zoom);
            $("#city").val(text);
            $("#search_table").html("");
            search_box();
        });
        $("#Baths").click(function () {
            $(".toilet_dl").show();
        });
        $(".toilet_dl dd").click(function () {
            $(".toilet_dl").hide();
            $("#Baths").text($(this).text());
        });
        $(".map_inputbox").hover(function () {
            $(".map_input_content").show();
            $(".map_default_input").addClass("input_current");
        }, function () {
            $(".map_input_content").hide();
            $(".map_default_input").removeClass("input_current");
        });
        $(".map_input_content li").click(function () {
            $(".map_default_input span").text($(this).text());
            orderby = parseInt($(this).attr("data-value"));
            changeMap();
            $(".map_input_content").hide();
            $(".map_default_input").removeClass("input_current");
        });
        map.setZoom(parseInt(2));
    });
</script>
