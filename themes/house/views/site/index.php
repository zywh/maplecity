<style>
.fl_title{ font-family:"宋体";}
.hot_loca{font-family:"宋体";}
.hot_des a{ font-family:"宋体";}
.zczltwo span a{ color:#666666; text-decoration:none;}
.zczltwo span a:hover{ color:#FF6600}
.lm_five_right_title a{ color:#666666}
.lm_five_right_title a:hover{ color:#FF6600}
.lmlist a:hover{ color:#FF6600}
</style>
    <?php
    $db = Yii::app()->db;
	?> 
<!-- banner开始 -->
<div class="banner">
    <div id="full-screen-slider">
        <ul id="slides">
            <?php foreach($banner as $k => $obj){ ?>
            <li style="background:<?php switch($k){
                case 0: echo '#560762';break;
                case 1: echo '#467809';break;
                default: echo '#34F';break;
            } ?> url('<?php echo Yii::app()->request->baseUrl;?>/<?php echo $obj->image; ?>') no-repeat center top"><a href="<?php echo $obj->url; ?>"></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<!-- banner结束 -->

<div class="nycont_mls">
<div class="nycont_sgkjj"><p id="socialicons3">
                     <a style="margin-left:0px;" class="sgkjj1" target="_blank" href="index.php?r=about2/about2&id=32"><IMg src="/themes/house/images/index/btn1.jpg" border="0"/></a>
                     <a class="sgkjj2" target="_blank" href="index.php?r=about2/about2&id=33"><IMg src="/themes/house/images/index/btn2.jpg" border="0"/></a>
                     <a class="sgkjj3" target="_blank" href="index.php?r=about2/about2&id=34"><IMg src="/themes/house/images/index/btn3.jpg" border="0"/></a>
                     <a style="margin-right:0px;" class="sgkjj4" target="_blank" href="index.php?r=about2/about2&id=36"><IMg src="/themes/house/images/index/btn4.jpg" border="0"/></a>
                     </p>
                     <div class="cl"></div>
</div>
</div>


<!-- 热点推荐开始 -->
<div class="lm_one">
   
    <div class="lm_onedown">
        <div class="lm_oneleft">
            <div class="video">
                <div class="lm_label"><img src="/static/images/MLS123456/video.jpg" ></div>
                <div class="videocont" id="video_wrap" style="width:262px; height:171px"></div>
                <div class="lmlistbox">
                    <?php foreach($video as $obj){ ?>
                    <div class="lmlist" style="height:30px; line-height:30px; border-bottom:1px dashed #8a8a8a; "><a href="<?php echo Yii::app()->createUrl('site/viewVideo', array('id' => $obj->id)); ?>" target="_blank" style="font-size:14px; font-family:'宋体';"><?php echo $obj->title; ?></a><span style="font-size:14px; font-family:'宋体';"><?php echo date('Y-m-d', $obj->date); ?></span></div>
                    <?php } ?>
                </div>
            </div>
            <div class="zczl">
                <div class="zczlone">立即注册获得以下资料</div>
                <div class="zczltwo" style="padding:15px 0 0 18px;">
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
        <?php echo CHtml::beginForm(array('user/register'),'get'); ?>
                <div class="zczlthree">
                    <div class="zczlthree_one"><input name="username" type="text" class="textbox" value="您的姓名" onblur="if(this.value=='') {this.style.color='#333';this.value='您的姓名';}" onfocus="if(this.value=='您的姓名'){this.value='';}else{this.style.color='#000';}" style="color: #333;"></div>
                    <div class="zczlthree_one"><input name="phone" type="text" class="textbox" value="您的电话" onblur="if(this.value=='') {this.style.color='#333';this.value='您的电话';}" onfocus="if(this.value=='您的电话'){this.value='';}else{this.style.color='#000';}" style="color: #333;"></div>
                    <div class="zczlthree_one"><input name="email" type="text" class="textbox" value="您的邮箱" onblur="if(this.value=='') {this.style.color='#333';this.value='您的邮箱';}" onfocus="if(this.value=='您的邮箱'){this.value='';}else{this.style.color='#000';}" style="color: #333;"></div>
                </div>
                <div class="zczlfour"><input name="" type="submit" value="立即注册" /></div>
                <?php echo CHtml::endForm(); ?>
            </div>
        </div>
        
        <div class="lm_oneright">

             <div class="hot">
               <a href=""><img src="/static/images/hot_title.jpg"/></a>
               <div class="hot_con">
               
<?php 
$sqlhaozi = "select * from h_house where lp_dol<=3000000 and recommend=1 limit 0,4";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $househaizai){
?>

                         <div class="hot_fl">
                                 <div class="fl_title">
                                          <p><?php if($househaizai["area"]=="Toronto"){$cd1=1;echo "多伦多";}elseif($househaizai["area"]=="Durham"){echo "达勒姆";$cd1=2;}elseif($househaizai["area"]=="Peel"){echo "Peel";$cd1=3;}elseif($househaizai["area"]=="Halton"){echo "霍尔顿";$cd1=4;}elseif($househaizai["area"]=="York"){echo "约克";$cd1=5;} ?><span>/<?php echo $househaizai["area"]; ?></span></p>
                                         <div class="hot_more">
   <a href="index.php?r=house/index&cd1=3&cd2=<?php echo $cd1;?>&cd3=0&cd4=0&cd5=0&cd6=0&cd7=0&cd8=0&cd9=0&cd10=0&cd11=0&cd12=0&cd13=0&cd14=0&cd15=0&cd16=0&cd17=0&cd18=0#001"><img src="/static/images/more.gif"/></a>
                                         </div>
                                 </div>
                                 <div class="hot_img"> 
                                  <?php if($househaizai["house_image"]==""){?>
                                 <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"  target="_blank"><img src='/static/images/zanwu.jpg' width="307" height="197"></a>
                                 <?php }else{?>
                                        <a href="<?php echo Yii::app()->createUrl('house/view', array('id'=>$househaizai["id"])); ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl;?>/<?php echo $househaizai["house_image"]; ?>" width="307" height="197"/></a>
                                  <?php }?>
                                 </div>
                                 <div class="hot_loca">
                                      <p><span>城市：</span><?php echo $househaizai["addr"]; ?><br />
                                       <span>价格：</span><?php echo $househaizai["lp_dol"]/10000; ?>万加币</p>
                                       <div class="hot_des">
                                            <p><a href="<?php echo Yii::app()->createUrl('house/view', array('id'=>$househaizai["id"])); ?>" style="text-decoration:none">[详细]</a></p>
                                       </div>
                                 </div>
                         </div>
     <?php } ?>
               </div>
          </div>
          
           
        </div>
         <div class="lm_four_banner"><a href="index.php?r=about/about1&id=48"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/tl_1.jpg" /></a></div>
    </div>
    <div class="cl"></div>
</div>
<!-- 热点推荐结束 -->


<!-- 豪宅鉴赏开始 -->
<div class="lm_two">
    <div class="lm_twoup"><a href="index.php?r=enjoy/index"><img src="/static/images/luxury.jpg" /></a></div>
    <div class="lm_twodown" style="margin-top:-40px;">
        <!--<div class="lm_twobanner"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/b_2.jpg" /></div>-->
        <div class="lm_twojs">
            <?php
 
$sqlhaozi = "select * from h_house where lp_dol>3000000 limit 0,3";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $key => $househaizai){

			
                if($key == 1){
            ?>
            <div class="lm_twojs_one lm_twojs_two">
                <div class="lm_twojs_one_right">
                        <div  class="lm_twojs_one_right_up">
                                        <div class="lm_twojs_title"><span>地区：</span><?php echo $househaizai["addr"]; ?></div>
                                        <div class="lm_twojs_info"><span>简介：</span><?php echo $househaizai["lp_dol"]/10000; ?>万加币/<?php echo $househaizai["ml_num"]; ?><br /></div>
                       </div>
                       <div class="lm_twojs_one_right_center">
                                    <p><?php echo mb_substr($househaizai["extras"],0,226,'utf-8');?></p>
                         </div>
                         <div class="lm_twojs_one_right_xx">
                         
                               <a href="#"><img src="/static/images/info.gif"/></a>
                          </div>
                </div>
                <div class="lm_twojs_one_left">
                                    <?php if($househaizai["house_image"]==""){?>
                                 <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"  target="_blank"><img src='/static/images/zanwu.jpg' width="320" height="195"/></a>
                      <?php }else{?>
                                 <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"  target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $househaizai["house_image"]; ?>"  width="320" height="195"/></a>
                      <?php }?>

                
                </div>
                <div class="cl"></div>
            </div>
            <?php }else{ ?>
            <div class="lm_twojs_one">
                <div class="lm_twojs_one_left">
                
                                    <?php if($househaizai["house_image"]==""){?>
                                 <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"  target="_blank"><img src='/static/images/zanwu.jpg' width="320" height="195"/></a>
                      <?php }else{?>
                                 <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"  target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $househaizai["house_image"]; ?>"  width="320" height="195"/></a>
                      <?php }?>
                
                </div>
                <div class="lm_twojs_one_right">
                           <div  class="lm_twojs_one_right_up">
                                        <div class="lm_twojs_title"><span>地区：</span><?php echo $househaizai["addr"]; ?></div>
                                        <div class="lm_twojs_info"><span>简介：</span><?php echo $househaizai["lp_dol"]/10000; ?>万币/<?php echo $househaizai["ml_num"]; ?></div>
                         </div>
                         <div class="lm_twojs_one_right_center">
                                    <p><?php echo mb_substr($househaizai["extras"],0,226,'utf-8');?></p>
                         </div>
                         <div class="lm_twojs_one_right_xx">
                         
                               <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"><img src="/static/images/info.gif"/></a>
                          </div>
                </div>
                <div class="cl"></div>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<!-- 豪宅鉴赏结束 -->

<!-- 学区专栏开始 -->
<div class="lm_three">
    <div class="lm_threeup"><a><img src="/static/images/xuequ.jpg" width="980" height="39" /></a></div>
    <div>
<!--开始 -->

<style type="text/css">

.blk_18 { overflow:hidden; zoom:1; font-size:9pt;width:984px; margin-top:8px; }
.blk_18 .pcont { width:890px; float:left; overflow:hidden; padding-left:5px; }
.blk_18 .ScrCont { width:32766px; zoom:1; margin-left:-5px; }
.blk_18 #List1_1, .blk_18 #List2_1 { float:left; }
.blk_18 .LeftBotton, .blk_18 .RightBotton { width:38px; height:65px; float:left; margin-top:150px; }
.blk_18 .pl { width:228px;float:left; float:left; text-align:center; line-height:24px; }
.blk_18 a{ text-decoration:none;}
.blk_18 a.pl:hover { color:#5dacec; background:#fff; }
.ScrCont .biaotiya { font-size:14px; font-weight:bold; color:#FF0000; width:211px; margin:0 auto;}
.ScrCont .address{ text-align:left; width:211px; margin:0 auto; color:#5e5e5e} 
.ScrCont .price{ text-align:left; width:211px; margin:0 auto;color:#5e5e5e} 
.ScrCont .xiangxi{text-align:left; width:211px; margin:0 auto;color:#5e5e5e}

</style>
<script type="text/javascript">

var Speed_1 = 260; //速度(毫秒)
var Space_1 = 20; //每次移动(px)
var PageWidth_1 = 107 * 6; //翻页宽度
var interval_1 = 12000; //翻页间隔时间
var fill_1 = 0; //整体移位
var MoveLock_1 = false;
var MoveTimeObj_1;
var MoveWay_1="right";
var Comp_1 = 0;
var AutoPlayObj_1=null;
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}}
function AutoPlay_1(){clearInterval(AutoPlayObj_1);AutoPlayObj_1=setInterval('ISL_GoDown_1();ISL_StopDown_1();',interval_1)}
function ISL_GoUp_1(){if(MoveLock_1)return;clearInterval(AutoPlayObj_1);MoveLock_1=true;MoveWay_1="left";MoveTimeObj_1=setInterval('ISL_ScrUp_1();',Speed_1);}
function ISL_StopUp_1(){if(MoveWay_1 == "right"){return};clearInterval(MoveTimeObj_1);if((GetObj('ISL_Cont_1').scrollLeft-fill_1)%PageWidth_1!=0){Comp_1=fill_1-(GetObj('ISL_Cont_1').scrollLeft%PageWidth_1);CompScr_1()}else{MoveLock_1=false}
AutoPlay_1()}
function ISL_ScrUp_1(){if(GetObj('ISL_Cont_1').scrollLeft<=0){GetObj('ISL_Cont_1').scrollLeft=GetObj('ISL_Cont_1').scrollLeft+GetObj('List1_1').offsetWidth}
GetObj('ISL_Cont_1').scrollLeft-=Space_1}
function ISL_GoDown_1(){clearInterval(MoveTimeObj_1);if(MoveLock_1)return;clearInterval(AutoPlayObj_1);MoveLock_1=true;MoveWay_1="right";ISL_ScrDown_1();MoveTimeObj_1=setInterval('ISL_ScrDown_1()',Speed_1)}
function ISL_StopDown_1(){if(MoveWay_1 == "left"){return};clearInterval(MoveTimeObj_1);if(GetObj('ISL_Cont_1').scrollLeft%PageWidth_1-(fill_1>=0?fill_1:fill_1+1)!=0){Comp_1=PageWidth_1-GetObj('ISL_Cont_1').scrollLeft%PageWidth_1+fill_1;CompScr_1()}else{MoveLock_1=false}
AutoPlay_1()}
function ISL_ScrDown_1(){if(GetObj('ISL_Cont_1').scrollLeft>=GetObj('List1_1').scrollWidth){GetObj('ISL_Cont_1').scrollLeft=GetObj('ISL_Cont_1').scrollLeft-GetObj('List1_1').scrollWidth}
GetObj('ISL_Cont_1').scrollLeft+=Space_1}
function CompScr_1(){if(Comp_1==0){MoveLock_1=false;return}
var num,TempSpeed=Speed_1,TempSpace=Space_1;if(Math.abs(Comp_1)<PageWidth_1/2){TempSpace=Math.round(Math.abs(Comp_1/Space_1));if(TempSpace<1){TempSpace=1}}
if(Comp_1<0){if(Comp_1<-TempSpace){Comp_1+=TempSpace;num=TempSpace}else{num=-Comp_1;Comp_1=0}
GetObj('ISL_Cont_1').scrollLeft-=num;setTimeout('CompScr_1()',TempSpeed)}else{if(Comp_1>TempSpace){Comp_1-=TempSpace;num=TempSpace}else{num=Comp_1;Comp_1=0}
GetObj('ISL_Cont_1').scrollLeft+=num;setTimeout('CompScr_1()',TempSpeed)}}
function picrun_ini(){
GetObj("List2_1").innerHTML=GetObj("List1_1").innerHTML;
GetObj('ISL_Cont_1').scrollLeft=fill_1>=0?fill_1:GetObj('List1_1').scrollWidth-Math.abs(fill_1);
GetObj("ISL_Cont_1").onmouseover=function(){clearInterval(AutoPlayObj_1)}
GetObj("ISL_Cont_1").onmouseout=function(){AutoPlay_1()}
AutoPlay_1();
}
</script>

<div class="blk_18"> <a class="LeftBotton" onmousedown="ISL_GoUp_1()" onmouseup="ISL_StopUp_1()" onmouseout="ISL_StopUp_1()" href="javascript:void(0);" target="_self"><img src="/themes/house/images/zuobianya.jpg" border="0" /></a>
  <div class="pcont" id="ISL_Cont_1">
    <div class="ScrCont">
      <div id="List1_1">
        <!-- piclist begin -->
        
        
<?php 
$sqlxuequ = "select * from h_house where lp_dol<=3000000 limit 0,9";
$resultxuequ = $db->createCommand($sqlxuequ)->query();
foreach($resultxuequ as $housexuequ){
?>
        <a class="pl" href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$housexuequ["id"])); ?>" target="_blank" >
        <?php if($housexuequ["house_image"]==""){?>
        <img src="/static/images/zanwu.jpg" width="213" height="296"/>
        <?php }else{?>
        <img src="<?php echo Yii::app()->request->baseUrl;?>/<?php echo $housexuequ["house_image"]; ?>" width="213" height="296"/>
        <?php }?>
        <div class="biaotiya"><?php echo $housexuequ["addr"]; ?></div>
        <div class="address"><strong>社区：</strong><?php echo $housexuequ["community"]; ?></div>
        <div class="price"><strong>价格：</strong><?php echo $housexuequ["lp_dol"]/10000; ?>万加币万加币</div>
        <div  class="xiangxi"><img src="/themes/house/images/xiangxi.jpg" /></div>
        </a> 
<?php } ?>
 
        <!-- piclist end -->
      </div>
      <div id="List2_1"></div>
    </div>
  </div>
  <a class="RightBotton" onmousedown="ISL_GoDown_1()" onmouseup="ISL_StopDown_1()" onmouseout="ISL_StopDown_1()" href="javascript:void(0);" target="_self"><img src="/themes/house/images/youbianya.jpg" border="0" /></a> 
  <div style="clear:both"></div>
  </div>
<div class="c"></div>
<script type="text/javascript">
        <!--
        picrun_ini()
        //-->
        </script>


<!--结束 -->
    </div>
</div>
<div style="height:20px; clear:both"></div>
<!-- 学区专栏结束 -->

<!-- 加国资讯开始 -->
<div class="lm_four">
     <div class="lm_four_banner"><a href="index.php?r=about2/about2&id=33"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/tl_3.jpg" /></a></div>
    <div class="lm_fourup"><a href="index.php?r=news/canadaNews"><img src="/static/images/news.jpg" /></a></div>
    <div class="lm_fourdown">
       
        <div class="lm_four_news">
            <div class="lm_four_left">
                           <div class="lm_four_left_title">
                                  <p>图片新闻<span><a href="">更多>></a></span></p>
                            </div>
                <div class="lm_four_flash">
                    <div id="fsD1" class="focus">
                        <div id="D1pic1" class="fPic">
                            <div class="xwdt">
                                <div class="xwdt_title">加国即时新闻动态</div>
                            </div>
                            <?php foreach($instant as $obj){ ?>
                            <div class="fcon">
                                <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$obj->id)); ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj->image; ?>" width="290" height="396" /></a>
                                <span class="shadow"><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$obj->id)); ?>" title="<?php echo $obj->title; ?>" target="_blank"><?php echo $obj->title; ?></a></span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="fbg">
                            <div class="D1fBt" id="D1fBt">
                                <a href="javascript:void(0);" class="current"><i>1</i></a>
                                <a href="javascript:void(0);"><i>2</i></a>
                                <a href="javascript:void(0);"><i>3</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lm_four_center">
                         <div class="lm_four_center_title">
                                  <p><a href="index.php?r=news/canadaNews&catalog_id=6">加国新闻</a><span><a href="index.php?r=news/canadaNews&catalog_id=6">更多>></a></span></p>
                            </div>
                            <div class="lm_four_center_rec">
                                    <div class="lm_four_center_rec_left" >
                                              <img src="/uploads/201510/e95a4b3a3b796d53c8dcfbf1ccdddf6d.jpg" width="145" height="125"/>
                                    </div>
                                    <div class="lm_four_center_rec_right">
                                           <p><strong>加拿大买房过程全攻略 </strong><br />
                                             更新：2015-05-26
                                            </p>
                                            <p>
                                            新移民刚来加拿大，可能对加拿大买房过程
                                            </p>
                                            <span><a href="index.php?r=news/canadaNewsView&id=115">[详情]</a></span>
                                    </div>
                            </div>
                <div class="lm_four_center_one">
                    <div class="lm_four_cneter_newsinfo">
                        <?php foreach($canada_news as $obj){ ?>
                            <div class="news_a canada-news" style="width:315px;">
                            <LI style="float:left; width:230px;"><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$obj->id)); ?>" title="<?php echo $obj->title; ?>" target="_blank"><?php echo mb_substr($obj->title,0,20,'utf-8');?></a></LI>
                            <LI style="float:right; color:#333333">					
							<?php 
					if($obj->last_update_time==0){
					echo "[".date('Y-m-d', $obj->create_time)."]"; 
					}else{
					echo "[".date('Y-m-d', $obj->last_update_time)."]"; 
					}
					?></LI>
                            </div>
                        <?php } ?>
                        <div class="cl"></div>
                    </div>
                </div>
            </div>
            <div class="lm_four_right">
                <div class="lm_four_right_newslist lm_four_right_newslist_two">
                    <div class="lm_four_news_up">
                        <div class="lm_four_news_up_left"><a href="index.php?r=news/canadaNews&catalog_id=7" class="moretwo" target="_blank"><?php echo $this->getCatalogName(7); ?></a></div>
                        <a href="index.php?r=news/canadaNews&catalog_id=7" class="moretwo" target="_blank">更多>></a>
                        <div class="cl"></div>
                    </div>
                    <div class="lm_four_news_down">
                       
                        <div class="lm_four_news_down_right" style="padding-left:0px;">
                            <div class="lm_four_news_down_info">
                                <?php foreach($summary as $obj){ ?>
                                 
                                          <div class="news_a" style="width:280px;">
                                          <LI style="float:left; width:200px;">
                                          <img src="/static/images/point.gif" align="absbottom"/><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$obj->id)); ?>" title="<?php echo $obj->title; ?>" target="_blank" style="width:180px;"><?php echo $obj->title; ?></a>
                                          </LI>
                                         <LI style="float:right; color:#333333"><?php 
					if($obj->last_update_time==0){
					echo "[".date('Y-m-d', $obj->create_time)."]"; 
					}else{
					echo "[".date('Y-m-d', $obj->last_update_time)."]"; 
					}
					?></LI>
                                          </div>
                                         
                          
                                <?php } ?>
                                <div class="cl"></div>
                            </div>
                            <div class="cl"></div>
                        </div>
                        <div class="cl"></div>
                    </div>
                </div>
                <div class="lm_four_right_newslist lm_four_right_newslist_two">
                    <div class="lm_four_news_up">
                        <div class="lm_four_news_up_left"> <a href="index.php?r=news/canadaNews&catalog_id=8" class="moretwo" target="_blank"><?php echo $this->getCatalogName(8); ?></a></div>
                        <a href="index.php?r=news/canadaNews&catalog_id=8" class="moretwo" target="_blank">更多>></a>
                        <div class="cl"></div>
                    </div>
                    <div class="lm_four_news_down">
                       
                        <div class="lm_four_news_down_right" style="padding-left:0px;">
                            <div class="lm_four_news_down_info">
                                <?php foreach($life as $obj){ ?>
                                          <div class="news_a" style="width:280px;">
                                          <LI style="float:left; width:200px;">
                                          <img src="/static/images/point.gif" align="absbottom"/><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$obj->id)); ?>" title="<?php echo $obj->title; ?>" target="_blank" style="width:180px;"><?php echo $obj->title; ?></a>
                                          </LI>
                                         <LI style="float:right; color:#333333"><?php 
					if($obj->last_update_time==0){
					echo "[".date('Y-m-d', $obj->create_time)."]"; 
					}else{
					echo "[".date('Y-m-d', $obj->last_update_time)."]"; 
					}
					?></LI>
                                          </div>
                                <?php } ?>
                                <div class="cl"></div>
                            </div>
                            <div class="cl"></div>
                        </div>
                        <div class="cl"></div>
                    </div>
                </div>
                <div class="lm_four_right_newslist">
                    <div class="lm_four_news_up">
                        <div class="lm_four_news_up_left"><a href="index.php?r=news/canadaNews&catalog_id=9" class="moretwo" target="_blank"><?php echo $this->getCatalogName(9); ?></a></div>
                        <a href="index.php?r=news/canadaNews&catalog_id=9" class="moretwo" target="_blank">更多>></a>
                        <div class="cl"></div>
                    </div>
                    <div class="lm_four_news_down">
                       
                        <div class="lm_four_news_down_right" style="padding-left:0px;">
                            <div class="lm_four_news_down_info">
                                <?php foreach($travel as $obj){ ?>
                                          <div class="news_a" style="width:280px;">
                                          <LI style="float:left; width:200px;">
                                          <img src="/static/images/point.gif" align="absbottom"/><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$obj->id)); ?>" title="<?php echo $obj->title; ?>" target="_blank" style="width:180px;"><?php echo $obj->title; ?></a>
                                          </LI>
                                         <LI style="float:right; color:#333333">
										 <?php 
					if($obj->last_update_time==0){
					echo "[".date('Y-m-d', $obj->create_time)."]"; 
					}else{
					echo "[".date('Y-m-d', $obj->last_update_time)."]"; 
					}
					?></LI>
                                          </div>
                                <?php } ?>
                                <div class="cl"></div>
                            </div>
                            <div class="cl"></div>
                        </div>
                        <div class="cl"></div>
                    </div>
                </div>
            </div>
            <div class="cl"></div>
        </div>

    </div>
</div>
<!-- 加国资讯结束 -->

<!-- 房产资讯开始 -->
<div class="lm_five">
    <div class="lm_five_up"><a href=""><img src="/static/images/fangchan.jpg" /></a></div>
    <div class="lm_five_down">
        <div class="lm_five_down_pic">
            <?php foreach($exhibition as $obj){ ?>
                <a href="<?php echo Yii::app()->createUrl('news/houseNewsView', array('id'=>$obj->id)); ?>" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj->image; ?>" width="192" height="250"/>
                    <span class="exhibition_title" title="<?php echo $obj->title; ?>"><?php echo $obj->title; ?></span>
                </a>
            <?php } ?>
            <div class="cl"></div>
        </div>
        <div class="lm_five_down_news">
            <div class="lm_five_left">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>11)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(11); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>11)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_left_pic">
                    <div id="hdp">
                        <div class="slides">
                            <ul class="slide-pic">
                                <?php foreach($school_distrcit_house as $k => $obj){
                                    if($k == 0){
                                        ?>
                                        <li class="cur"><a href="<?php echo Yii::app()->createUrl('house/view', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->name; ?>"><img width="290" height="218" src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj->house_image; ?>" /></a></li>
                                    <?php }else{ ?>
                                        <li><a href="<?php echo Yii::app()->createUrl('house/view', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->name; ?>"><img width="290" height="218"  src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj->house_image; ?>" /></a></li>
                                    <?php }} ?>
                            </ul>
                            <ul class="slide-li op">
                                <li class="cur"></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul class="slide-li slide-txt">
                                <li class="cur"><a href="javascript:void(0);"></a></li>
                                <li><a href="javascript:void(0);"></a></li>
                                <li><a href="javascript:void(0);"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lm_five_left_news">
                    <div class="lm_five_left_news_up">
                        <div class="lm_five_left_news_title"><a href="<?php echo Yii::app()->createUrl('house/index',array('cd1'=>0,'cd2'=>0,'cd3'=>1,'cd4'=>0,'cd5'=>0,'cd6'=>0,'cd7'=>0,'cd8'=>0,'cd9'=>0,'cd10'=>0)); ?>" target="_blank">最新学区房介绍</a></div>
                    </div>
                    <div class="lm_five_left_news_down">
                        <?php foreach($school_distrcit_house_news as $obj){ ?>
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>">· <?php echo $obj->title; ?></a>
                        <?php } ?>
                        <div class="cl"></div>
                    </div>
                </div>
            </div>
            <div class="lm_five_center">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>12)); ?>" class="moretwo"><?php echo $this->getCatalogName(12); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>12)); ?>" class="moretwo">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_center_info">
                    <?php foreach($house_hotspots as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span><?php 
					if($obj->last_update_time==0){
					echo "[".date('Y-m-d', $obj->create_time)."]"; 
					}else{
					echo "[".date('Y-m-d', $obj->last_update_time)."]"; 
					}
					?></span>
                        </div>
                    <?php } ?>
                </div>
                <div class="lm_five_center_pic"><a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>12)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(12); ?>" width="317" height="151" border="0" /></a></div>
            </div>
            <div class="lm_five_right">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"> <a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>13)); ?>" class="moretwo"><?php echo $this->getCatalogName(13); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>13)); ?>" class="moretwo">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_up">
                    <div class="lm_five_right_up_left"><a href="<?php echo Yii::app()->createUrl('news/houseNews', array('catalog_id'=>13)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(13); ?>" border="0" width="108" height="108"/></a></div>
                    <div class="lm_five_right_up_right">
                        <div class="lm_five_right_title"><a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$house_property_special_news->id)); ?>" title="<?php echo $house_property_special_news->title; ?>" target="_blank"><?php echo $house_property_special_news->title; ?></a></div>
                        <div class="lm_five_right_info">
                            <div class="house_property_special_news_summary"><?php echo $house_property_special_news->summary; ?></div>
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$house_property_special_news->id)); ?>" target="_blank">[详情]</a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_down">
                    <?php foreach($house_property as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
           
            <div class="cl"></div>
             <div class="lm_four_banner" style="margin-top:30px"><a href="index.php?r=about/about1&id=49"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/tl_4.jpg" /></a></div>
        </div>
    </div>
</div>
<!-- 房产资讯结束-->


<!-- 加拿大留学开始 -->
<div class="lm_five" >
    <div class="lm_five_up"><a href=""><img src="/static/images/liuxue.jpg" /></a></div>
    <div class="lm_five_down">
<!--			<div class="lm_four_banner"><a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>17)); ?>"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/b_3.jpg" /></a></div>-->
			
        <div class="lm_five_down_news">
            <div class="lm_five_left">
                 <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>17)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(17); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>17)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_up">
                    <div class="lm_five_right_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>17)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(17); ?>" border="0" width="108" height="108"/></a></div>
                    <div class="lm_five_right_up_right" style="width:170px;">
                        <div class="lm_five_right_title"><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$news_lx_special_news[0][0]->id)); ?>" title="<?php echo $news_lx_special_news[0][0]->title; ?>" target="_blank"><?php echo $news_lx_special_news[0][0]->title; ?></a></div>
                        <div class="lm_five_right_info">
                            <div class="house_property_special_news_summary"><?php echo $news_lx_special_news[0][0]->summary; ?></div>
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$news_lx_special_news[0][0]->id)); ?>" target="_blank">[详情]</a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_down">
                    <?php foreach($news_lx[0] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="lm_five_center">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>18)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(18); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>18)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_center_info">
                    <?php foreach($news_lx[1] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
                <div class="lm_five_center_pic"><a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>18)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(18); ?>" width="317" height="151" border="0" /></a></div>
            </div>
            <div class="lm_five_right">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>23)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(23); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>23)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_up">
                    <div class="lm_five_right_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews2', array('catalog_id'=>23)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(23); ?>" border="0" width="108" height="108"/></a></div>
                    <div class="lm_five_right_up_right">
                        <div class="lm_five_right_title"><a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$news_lx_special_news[1][0]->id)); ?>" title="<?php echo $news_lx_special_news[1][0]->title; ?>" target="_blank"><?php echo $news_lx_special_news[1][0]->title; ?></a></div>
                        <div class="lm_five_right_info">
                            <div class="house_property_special_news_summary"><?php echo $news_lx_special_news[1][0]->summary; ?></div>
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$news_lx_special_news[1][0]->id)); ?>" target="_blank">[详情]</a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_down">
                    <?php foreach($news_lx[2] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="cl"></div>
        </div>
    </div>
</div>
<!-- 加拿大留学结束-->


<!-- 加拿大移民开始 -->
<div class="lm_five">
    <div class="lm_five_up"><a href=""><img src="/static/images/yimin.jpg" /></a></div>
    <div class="lm_five_down" >
			
        <div class="lm_five_down_news">
            <div class="lm_five_left">
                 <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"> <a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>19)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(19); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>19)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_up">
                    <div class="lm_five_right_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>19)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(19); ?>" border="0" width="108" height="108"/></a></div>
                    <div class="lm_five_right_up_right" style="width:170px;">
                        <div class="lm_five_right_title"><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$news_ym_special_news[0][0]->id)); ?>" title="<?php echo $news_ym_special_news[0][0]->title; ?>" target="_blank"><?php echo $news_ym_special_news[0][0]->title; ?></a></div>
                        <div class="lm_five_right_info">
                            <div class="house_property_special_news_summary"><?php echo $news_ym_special_news[0][0]->summary; ?></div>
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$news_ym_special_news[0][0]->id)); ?>" target="_blank">[详情]</a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_down">
                    <?php foreach($news_ym[0] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="lm_five_center">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>20)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(20); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>20)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_center_info">
                    <?php foreach($news_ym[1] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
                <div class="lm_five_center_pic"><a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>20)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(20); ?>" width="317" height="151" border="0" /></a></div>
            </div>
            <div class="lm_five_right">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>24)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(24); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>24)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_up">
                    <div class="lm_five_right_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews3', array('catalog_id'=>24)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(24); ?>" border="0" width="108" height="108"/></a></div>
                    <div class="lm_five_right_up_right">
                        <div class="lm_five_right_title"><a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$news_ym_special_news[1][0]->id)); ?>" title="<?php echo $news_ym_special_news[1][0]->title; ?>" target="_blank"><?php echo $news_ym_special_news[1][0]->title; ?></a></div>
                        <div class="lm_five_right_info">
                            <div class="house_property_special_news_summary"><?php echo $news_ym_special_news[1][0]->summary; ?></div>
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$news_ym_special_news[1][0]->id)); ?>" target="_blank">[详情]</a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_down">
                    <?php foreach($news_ym[2] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="cl"></div>
            <div class="lm_four_banner" style="margin-top:40px;"><a href="index.php?r=about/about1&id=50"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/tl_2.jpg" /></a></div>
        </div>
    </div>
</div>
<!-- 加拿大移民结束-->


<!-- 加拿大旅游开始 -->
<div class="lm_five">
    <div class="lm_five_up"><a href=""><img src="/static/images/lvyou.jpg" /></a></div>
    <div class="lm_five_down">
			
        <div class="lm_five_down_news">
            <div class="lm_five_left">
                 <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>21)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(21); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>21)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_up">
                    <div class="lm_five_right_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>21)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(21); ?>" border="0" width="108" height="108"/></a></div>
                    <div class="lm_five_right_up_right" style="width:170px;">
                        <div class="lm_five_right_title"><a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$news_ly_special_news[0][0]->id)); ?>" title="<?php echo $news_ly_special_news[0][0]->title; ?>" target="_blank"><?php echo $news_ly_special_news[0][0]->title; ?></a></div>
                        <div class="lm_five_right_info">
                            <div class="house_property_special_news_summary"><?php echo $news_ly_special_news[0][0]->summary; ?></div>
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView',array('id'=>$news_ly_special_news[0][0]->id)); ?>" target="_blank">[详情]</a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_down">
                    <?php foreach($news_ly[0] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="lm_five_center">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>22)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(22); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>22)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_center_info">
                    <?php foreach($news_ly[1] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/canadaNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
                <div class="lm_five_center_pic"><a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>22)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(22); ?>" width="317" height="151" border="0" /></a></div>
            </div>
            <div class="lm_five_right">
                <div class="lm_five_left_label">
                    <div class="lm_four_news_up_left"> <a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>25)); ?>" class="moretwo" target="_blank"><?php echo $this->getCatalogName(25); ?></a></div>
                    <a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>25)); ?>" class="moretwo" target="_blank">更多>></a>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_up">
                    <div class="lm_five_right_up_left"><a href="<?php echo Yii::app()->createUrl('news/canadaNews4', array('catalog_id'=>25)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(25); ?>" border="0" width="108" height="108"/></a></div>
                    <div class="lm_five_right_up_right">
                        <div class="lm_five_right_title"><a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$news_ly_special_news[1][0]->id)); ?>" title="<?php echo $news_ly_special_news[1][0]->title; ?>" target="_blank"><?php echo $news_ly_special_news[1][0]->title; ?></a></div>
                        <div class="lm_five_right_info">
                            <div class="house_property_special_news_summary"><?php echo $news_ly_special_news[1][0]->summary; ?></div>
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView',array('id'=>$news_ly_special_news[1][0]->id)); ?>" target="_blank">[详情]</a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="lm_five_right_down">
                    <?php foreach($news_ly[2] as $obj){ ?>
                        <div class="lm_five_center_list house_hotspots_line">
                            <a href="<?php echo Yii::app()->createUrl('news/houseNewsView', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>" class="house_hotspots">· <?php echo $obj->title; ?></a> <span>[<?php 
					if($obj->last_update_time==0){
					echo date('Y-m-d', $obj->create_time); 
					}else{
					echo date('Y-m-d', $obj->last_update_time); 
					}
					?>]</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="cl"></div>
        </div>
    </div>
</div>
<!-- 加拿大旅游结束-->


<!-- 资质证明开始 -->

<!-- 资质证明结束 -->

<!-- 合作伙伴开始 -->
<div class="lm_eight">
    <div class="lm_eight_up"><a href="index.php?r=about/partner"><img src="/static/images/partner.jpg" /></a></div>
    <div class="lm_eight_down">
        <span><a href="http://www.maplecity.com.cn/index.php?r=about/tridel" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_1.jpg" /></a></span>
        <span><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_2.jpg" /></span>
        <span><a href="http://www.maplecity.com.cn/index.php?r=about/westbank" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_3.jpg" /></a></span>
        <span><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_4.jpg" /></span>
        <span><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_5.jpg" /></span>
        <span><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_6.jpg" /></span>
        <span><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_7.jpg" /></span>
        <span><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/h_8.jpg" /></span>
        
        <div class="cl"></div>
    </div>
</div>
<!-- 合作伙伴结束 -->

<script type="text/javascript">
    flowplayer("video_wrap", "<?php echo Yii::app()->theme->baseUrl; ?>/js/flowplayer-3.2.12.swf", {
        clip: {
            url: "<?php echo Yii::app()->request->baseUrl; ?>"+"/"+"<?php echo $home_video->url; ?>",
            autoPlay: false,
            autoBuffering: false
        },
        plugins: {
            controls: {
                play:true,        //开端按钮
                volume: true,     //音量按钮
                mute: true,       //静音按钮
                fullscreen: true, //全屏按钮
                scrubber: true,   //进度条
                time: false,      //是否显示时候信息
                autoHide: true    //功能条是否主动隐蔽
            }
        }
    });

    $(document).ready(function(){
        //热点推荐
        $(".lm_jddown").mouseover(function(){
            $(this).find(".lm_jd_tcbox").addClass("lm_jd_tcbox_on")
        });
        $(".lm_jddown").mouseout(function(){
            $(this).find(".lm_jd_tcbox").removeClass("lm_jd_tcbox_on")
        });
    });

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

    //加国资讯/房产资讯左侧焦点图
    Qfast.add('widgets', { path: "<?php echo Yii::app()->theme->baseUrl;?>/js/terminator2.2.min.js", type: "js", requires: ['fx'] });
    Qfast(false, 'widgets', function () {
        K.tabs({
            id: 'fsD1',   //焦点图包裹id
            conId: "D1pic1",  //** 大图域包裹id
            tabId:"D1fBt",
            tabTn:"a",
            conCn: '.fcon', //** 大图域配置class
            auto: 1,   //自动播放 1或0
            effect: 'fade',   //效果配置
            eType: 'click', //** 鼠标事件
            pageBt:true,//是否有按钮切换页码
            bns: ['.prev', '.next'],//** 前后按钮配置class
            interval: 4000  //** 停顿时间
        });				
    });
</script>
