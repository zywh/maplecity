<!-- 地址开始 -->
<div class="cl"></div>
<div class="nytb_dz">
    <a href="#">首页</a> > <span>学区专栏</span>
</div>
<!-- 地址结束 -->
<!-- 学区专栏开始 -->
<div class="xqzl">
    <div class="xqzlup">
        <div class="lm_threedown">
            <div class="lm_three_jdt">
                <div class="lm_jdt_left scroll_btnl"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/enjoy/left_jt.jpg" /></div>
                <div class="lm_jdt_center scroll_img" style="width:630px; overflow:hidden; ">
                    <div class="scroll_img_body">
                        <?php foreach($house_list as $house){ ?>
                        <div class="lm_jdtlist">
                            <a href="<?php echo Yii::app()->createUrl('house/view', array('id'=>$house->id)); ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $house->house_image; ?>" width="156" height="335"/></a>
                            <div class="lm_jdt_title">学区房推荐</div>
                            <div class="lm_jdt_info" style="overflow:hidden; white-space: nowrap; text-overflow: ellipsis; width: 100%;" title="<?php echo $house->name; ?>"><?php echo $house->name; ?></div>
                            <div class="lm_jdt_info">首付<?php echo $house->prepay; ?>万加币起</div>
                            <a href="<?php echo Yii::app()->createUrl('house/view', array('id'=>$house->id)); ?>" class="moretwo" target="_blank">了解更多</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="lm_jdt_right scroll_btnr" ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/enjoy/right_jt.jpg" /></div>
                <div class="cl"></div>
            </div>
        </div>
    </div>
    <div class="xqzl_pic"><a href="javascript:void(0);"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/enjoy/fctj.jpg" border="0" /></a></div>
    <div class="xqzldown">
        <div class="fyss_tj">
            <div class="fyss_tjlist" id="column_city">
                <div class="fyss_tjlistleft">城&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;市:</div>
                <div class="fyss_tjlistcenter"><a href="javascript:void(0);" class="fyss_tj_cur" data-value="0">不限</a></div>
                <div class="fyss_tjlistright fyss_tjlistone">
                    <?php foreach($city_list as $city){ ?>
                    <a href="javascript:void(0);" data-value="<?php echo $city->id; ?>"><?php echo $city->name; ?></a>
                    <?php } ?>
                </div>
                <div class="cl"></div>
            </div>
            <div class="fyss_tjlist" id="column_district">
                <div class="fyss_tjlistleft">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;区:</div>
                <div class="fyss_tjlistcenter"><a class="fyss_tj_cur" href="javascript:void(0);" data-value="0">不限</a></div>
                <div class="fyss_tjlistright" id="city_district">
                    <?php foreach($district_list as $district){ ?>
                        <a href="javascript:void(0);" data-value="<?php echo $district->id; ?>"><?php echo $district->name; ?></a>
                    <?php } ?>
                </div>
                <div class="cl"></div>
            </div>
            <div class="fyss_tjlist" id="column_propertyType">
                <div class="fyss_tjlistleft">物业类型:</div>
                <div class="fyss_tjlistcenter"><a href="javascript:void(0);" class="fyss_tj_cur" data-value="0">不限</a></div>
                <div class="fyss_tjlistright fyss_tjlistone">
                    <?php foreach($propertyType_list as $propertyType){ ?>
                        <a href="javascript:void(0);" data-value="<?php echo $propertyType->id; ?>"><?php echo $propertyType->name; ?></a>
                    <?php } ?>
                </div>
                <div class="cl"></div>
            </div>
            <div class="fyss_tjlist" id="column_totalPrice">
                <div class="fyss_tjlistleft">总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价:</div>
                <div class="fyss_tjlistcenter"><a class="fyss_tj_cur" href="javascript:void(0);" data-value="不限">不限</a></div>
                <div class="fyss_tjlistright">
                    <a href="javascript:void(0);" data-value="30万以下">30万以下</a>
                    <a href="javascript:void(0);" data-value="30-50万">30-50万</a>
                    <a href="javascript:void(0);" data-value="50-100万">50-100万</a>
                    <a href="javascript:void(0);" data-value="100-150万">100-150万</a>
                    <a href="javascript:void(0);" data-value="150-300万">150-300万</a>
                    <a href="javascript:void(0);" data-value="300万以上">300万以上</a>
                    <span class="syss_dw">加币</span>
                    <div class="fyss_tjjg">
                        <div class="fyss_tjjgone"><input name="" type="text" id="diy_min_price"/></div>
                        <div class="fyss_tjjgtwo">-</div>
                        <div class="fyss_tjjgone"><input name="" type="text" id="diy_max_price"/></div>
                        <div class="fyss_tjjgthree">万加币</div>
                        <div class="fyss_tjjgfour"><span href="javascript:void(0);" id="diy_price_confirm">确认</span></div>
                    </div>
                </div>
                <div class="cl"></div>
            </div>
            <div class="fyss_tjlist" id="column_houseArea">
                <div class="fyss_tjlistleft">房屋面积:</div>
                <div class="fyss_tjlistcenter"><a class="fyss_tj_cur" href="javascript:void(0);" data-value="不限">不限</a></div>
                <div class="fyss_tjlistright">
                    <a href="javascript:void(0);" data-value="1000以下">1000以下</a>
                    <a href="javascript:void(0);" data-value="1000-2000">1000-2000</a>
                    <a href="javascript:void(0);" data-value="2000-3000">2000-3000</a>
                    <a href="javascript:void(0);" data-value="3000-4000">3000-4000</a>
                    <a href="javascript:void(0);" data-value="4000以上">4000以上</a>
                    <span class="syss_dw">平方英尺</span>
                </div>
                <div class="cl"></div>
            </div>
            <div class="fyss_tjlist" id="column_landArea">
                <div class="fyss_tjlistleft">土地面积:</div>
                <div class="fyss_tjlistcenter"><a  class="fyss_tj_cur" href="javascript:void(0);" data-value="不限">不限</a></div>
                <div class="fyss_tjlistright">
                    <a href="javascript:void(0);" data-value="1000以下">1000以下</a>
                    <a href="javascript:void(0);" data-value="1000-2000">1000-2000</a>
                    <a href="javascript:void(0);" data-value="2000-3000">2000-3000</a>
                    <a href="javascript:void(0);" data-value="3000-4000">3000-4000</a>
                    <a href="javascript:void(0);" data-value="4000-5000">4000-5000</a>
                    <a href="javascript:void(0);" data-value="5000-6000">5000-6000</a>
                    <a href="javascript:void(0);" data-value="6000以上">6000以上</a>
                    <span class="syss_dw">平方英尺</span>
                </div>
                <div class="cl"></div>
            </div>
            <div class="fyss_tjlist">
                <div class="fyss_tjlistleft">更多条件:</div>
                <div class="fyss_tjlistmore">
                    <div class="syss_xltj" id="column_bedroomNum">
                        <div class="syss_xltjup">卧室数量</div>
                        <div class="syss_xltjdown">
                            <a href="javascript:void(0);" data-value="不限">不限</a>
                            <a href="javascript:void(0);" data-value="1室">1室</a>
                            <a href="javascript:void(0);" data-value="2室">2室</a>
                            <a href="javascript:void(0);" data-value="3室">3室</a>
                            <a href="javascript:void(0);" data-value="4室">4室</a>
                            <a href="javascript:void(0);" data-value="5室及以上">5室及以上</a>
                        </div>
                    </div>

                    <div class="syss_xltj" id="column_constructionYear">
                        <div class="syss_xltjup">建造年份</div>
                        <div class="syss_xltjdown">
                            <a href="javascript:void(0);" data-value="不限">不限</a>
                            <a href="javascript:void(0);" data-value="1970之前">1970之前</a>
                            <a href="javascript:void(0);" data-value="1971-1980">1971-1980</a>
                            <a href="javascript:void(0);" data-value="1981-1990">1981-1990</a>
                            <a href="javascript:void(0);" data-value="1991-2001">1991-2001</a>
                            <a href="javascript:void(0);" data-value="2001-2006">2001-2006</a>
                            <a href="javascript:void(0);" data-value="2006-2010">2006-2010</a>
                            <a href="javascript:void(0);" data-value="2011之后">2011之后</a>
                        </div>
                    </div>
                </div>
                <div class="cl"></div>
            </div>
            <div>
                <input type="hidden" id="Requirement_city_id"/>
                <input type="hidden" id="Requirement_district_id"/>
                <input type="hidden" id="Requirement_investType_id" value="1"/>
                <input type="hidden" id="Requirement_propertyType_id"/>
                <input type="hidden" id="Requirement_total_price"/>
                <input type="hidden" id="Requirement_house_area"/>
                <input type="hidden" id="Requirement_land_area"/>
                <input type="hidden" id="Requirement_bedroom_num"/>
                <input type="hidden" id="Requirement_construction_year"/>
            </div>
            <div class="xqzltj_btn">
                <?php if(!empty($this->_account['userId'])){ ?>
                <input type="button" id="Requirement_submit" value="提 交"/>
                <?php }else{ ?>
                    <a href="javascript:;" onclick="login_remind();">提&nbsp;&nbsp;&nbsp;&nbsp;交</a><span class="xqzltj_btn_span">此功能为枫之都俱乐部会员专享，请注册登录后使用。</span>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- 学区专栏结束 -->
<script type="text/javascript">
    //学区专栏左右滚动效果
    $(function(){
        var i=4
        var cont=$(".scroll_img_body img").size();
        var kd=(cont*158)+"px";
        var last=(cont-i)*158+"px";
        var page=1;
        var o=cont-3;
        var page_cont=cont;
        $(".scroll_btnl").click(function(){
            if(page==1){
                $(".scroll_img_body").animate({"margin-left":'-='+last},1000);
                page=o;
            }
            else{
                $(".scroll_img_body").animate({"margin-left":"+=158px"},1000);
                page--;
            }
            $("i").text(page);
        });

        $(".scroll_btnr").click(function(){
            if(page==o){
                $(".scroll_img_body").animate({"margin-left":"0"},1000);
                page=1;
            }
            else{
                $(".scroll_img_body").animate({"margin-left":"-=158px"},1000);
                page++;
            }
            $("i").text(page);
        });

    });

    //搜索条件下拉
    $(document).ready(function(){
        $(".syss_xltj").mouseover(function(){
            $(this).find(".syss_xltjdown").show();
        });
        $(".syss_xltj").mouseout(function(){
            $(this).find(".syss_xltjdown").hide();
        });
    });

    //input判断
    $(document).ready(function(){
        if($('#Requirement_phone').val() != ""){
            $('#Requirement_phone').next().hide();
        }

        if($('#Requirement_email').val() != ""){
            $('#Requirement_email').next().hide();
        }

        $(".fyss_sjhm input").click(function(){
            $(this).next().hide();
        });
        $(".fyss_sjhm input").blur(function(){
            if($(this).val()==""){
                $(this).next().show();
            }
        });
        $("label").click(function(){
            $(this).hide();
            $(this).prev().focus();
        });

        $("#column_city").find('a').click(function(){
            var self = $(this);
            var value = self.attr('data-value');
            $("#Requirement_city_id").val(value);
            $("#column_city").find('a').removeClass('fyss_tj_cur');
            self.addClass('fyss_tj_cur');
            $.post('<?php echo Yii::app()->createUrl('column/ajaxGetDistricts'); ?>', {'city_id': value}, function(json){
                var html = template('tpl_district', json);
                $("#city_district").html(html);
            }, 'json');
        });

        $("#column_district").on('click', 'a', function(){  //事件委托
            var self = $(this);
            var value = self.attr('data-value');
            $("#Requirement_district_id").val(value);
            $("#column_district").find('a').removeClass('fyss_tj_cur');
            self.addClass('fyss_tj_cur');
        });

        $("#column_propertyType").find('a').click(function(){
            var self = $(this);
            var value = self.attr('data-value');
            $("#Requirement_propertyType_id").val(value);
            $("#column_propertyType").find('a').removeClass('fyss_tj_cur');
            self.addClass('fyss_tj_cur');
        });

        $("#column_totalPrice").find('a').click(function(){
            var self = $(this);
            var value = self.attr('data-value');
            $("#Requirement_total_price").val(value);
            $("#column_totalPrice").find('a').removeClass('fyss_tj_cur');
            self.addClass('fyss_tj_cur');
        });

        $("#column_houseArea").find('a').click(function(){
            var self = $(this);
            var value = self.attr('data-value');
            $("#Requirement_house_area").val(value);
            $("#column_houseArea").find('a').removeClass('fyss_tj_cur');
            self.addClass('fyss_tj_cur');
        });

        $("#column_landArea").find('a').click(function(){
            var self = $(this);
            var value = self.attr('data-value');
            $("#Requirement_land_area").val(value);
            $("#column_landArea").find('a').removeClass('fyss_tj_cur');
            self.addClass('fyss_tj_cur');
        });

        $("#column_bedroomNum").find('a').click(function(){
            var self = $(this);
            var value = self.attr('data-value');
            $("#column_bedroomNum").find('.syss_xltjup').text(value);
            $("#Requirement_bedroom_num").val(value);
        });

        $("#column_constructionYear").find('a').click(function(){
            var self = $(this);
            var value = self.attr('data-value');
            $("#column_constructionYear").find('.syss_xltjup').text(value);
            $("#Requirement_construction_year").val(value);
        });

        $("#diy_price_confirm").click(function(){
            var diy_price;
            var diy_min_price = $("#diy_min_price").val();
            var diy_max_price = $("#diy_max_price").val();
            if(isNaN(diy_min_price) || isNaN(diy_max_price)){
                alert('请输入数字');
                return false;
            }else{
                if(diy_min_price){
                    if(diy_max_price){
                        diy_price = diy_min_price + '-' + diy_max_price + '万';
                    }else{
                        diy_price = diy_min_price + '万以上';
                    }
                }else if(diy_max_price){
                    diy_price = '0-' + diy_max_price + '万';
                }else{
                    diy_price = '不限';
                }
                $("#Requirement_total_price").val(diy_price);
                $("#column_totalPrice").find('a').removeClass('fyss_tj_cur');
            }
        });

        $("#Requirement_submit").click(function(){
            var city_id           = $("#Requirement_city_id").val();
            var district_id       = $("#Requirement_district_id").val();
            var investType_id     = $("#Requirement_investType_id").val();
            var propertyType_id   = $("#Requirement_propertyType_id").val();
            var total_price       = $("#Requirement_total_price").val();
            var house_area        = $("#Requirement_house_area").val();
            var land_area         = $("#Requirement_land_area").val();
            var bedroom_num       = $("#Requirement_bedroom_num").val();
            var construction_year = $("#Requirement_construction_year").val();
            var phone             = $("#Requirement_phone").val();
            var email             = $("#Requirement_email").val();

            var data = {
                'city_id': city_id,
                'district_id': district_id,
                'investType_id': investType_id,
                'propertyType_id': propertyType_id,
                'total_price': total_price,
                'house_area': house_area,
                'land_area': land_area,
                'bedroom_num': bedroom_num,
                'construction_year': construction_year,
                'phone': phone,
                'email': email
            }

            $.post('<?php echo Yii::app()->createUrl('column/ajaxRequirementCreate'); ?>', data, function(json){
                if(json.status == 'success'){
                    window.location.href = json.url;
                }else if(json.status == 'warning'){
                    $("#Requirement_"+json.url).val('');
                    $("#"+json.url+"_tip").html('<span>'+json.msg+'</span>').show();
                    return false;
                }else if(json.status == 'failed'){
                    alert(json.msg);
                    return false;
                }
            }, 'json');
        });
    });
	
	function login_remind(){
		alert("您还未登录，请先登录");
		window.location.href = "<?php echo Yii::app()->createUrl('site/login', array('original' => Yii::app()->request->getUrl())); ?>";
	}
</script>
<script id="tpl_district" type="text/html">
    <% for(var i=0;i<data.length;i++){ %>
    <a href="javascript:void(0);" data-value="<%= data[i].id %>"><%= data[i].name %></a>
    <% } %>
</script>