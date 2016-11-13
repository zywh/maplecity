<link rel="stylesheet" href="static/js/Swiper/css/swiper.min.css" >
<script src="static/js/Swiper/js/swiper.min.js"></script>
<style>
.fl_title{ font-family:"宋体";}
.hot_loca{font-family:"宋体";}
.hot_des a{ font-family:"宋体";}
.zczltwo span a{ color:#666666; text-decoration:none;}
.zczltwo span a:hover{ color:#FF6600}
.lm_five_right_title a{ color:#666666}
.lm_five_right_title a:hover{ color:#FF6600}
.lmlist a:hover{ color:#FF6600}
.zczltwo span a:hover{ text-decoration:underline}


.swiper-container .s2 { background-color:#888787;}
.s1 .swiper-slide img { 
	width: 100%; height: auto;  
}
	
.s2 .swiper-slide img { 
height: 270px; 
width:100%;
 

}
.swiper-pagination-bullet { opacity: 1; background: #fff; }
.swiper-pagination-bullet-active { opacity: 1; background: #ff4103; }
</style>
<?php
	$db = Yii::app()->db;
	function get_firstimage($county,$ml_num){
		
		$county = preg_replace('/\s+/', '', $county);
		$county = str_replace("&","",$county);
		#$dir="mlspic/crea/".$county."/Photo".$ml_num."/";
		$dir="mlspic/crea/creamid/".$county."/Photo".$ml_num."/";
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
?> 


<!-- banner开始 -->


<div class="swiper-homepage">

	<div class="swiper-container s1" >
		<div class="swiper-wrapper">
				
				  <?php foreach($banner as $k => $obj){ ?>
					<div class="swiper-slide" >
					<a href="<?php echo $obj->url; ?>">
					<img src="<?php echo Yii::app()->request->baseUrl;?>/<?php echo $obj->image; ?>">
					</a>
				
					</div>
				<?php }?> 
			
		</div>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-next swiper-button-white"></div>
		<div class="swiper-button-prev swiper-button-white"></div>

	
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
			  <a style='text-decoration:none;' href="index.php?r=house">
               <div class='homepage-title-bar-short'> 
					<div class='homepage-title-text'>TODAY.今日推荐</div>
				</div>
				</a>
               <div class="hot_con">
               
<?php 
$sqlhaozi = "
	select h.id id,h.county county,h.ml_num ml_num,h.lp_dol/10000 price,h.municipality citye, h.addr addr ,m.municipality_cname city,p.name province,h.pic_num pic_num,h.src src 
	from h_house h,h_mname m,h_city p
	where h.municipality = m.municipality
	AND h.county = p.englishname
	AND lp_dol>700000 and recommend=1 limit 0,4";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $househaizai){
?>

                         <div class="hot_fl">
                                 <div class="fl_title">
                                          <p><?php 
										  echo $househaizai["city"]." ".$househaizai["province"];
										  ?></span></p>
                                         <div class="hot_more">
   <a href="index.php?r=house/index&cd1=0&cd2=<?php echo $househaizai["citye"];?>&cd3=0&cd4=0&cd5=0&cd6=0&cd7=0&cd8=0&cd9=0&cd10=0&cd11=0&cd12=0&cd13=0&cd14=0&cd15=0&cd16=0&cd17=0&cd18=0#001"><img src="/static/images/more.gif"/></a>
                                         </div>
                                 </div>
                                 <div class="hot_img"> <?php 
								 
								$county = $househaizai["county"];
								$ml_num = $househaizai["ml_num"];
								$pic_num = $househaizai["pic_num"];
								$src = $househaizai["src"];
								
								//$picfile = get_firstimage($county,$ml_num);
								$picfile = Yii::app()->myClass->getPicture($county,$ml_num,$src,0,$pic_num)['CdnCoverImg'] ;

									  ?><a href="<?php echo Yii::app()->createUrl('house/view', array('id'=>$househaizai["id"])); ?>" target="_blank"><img src="<?php echo $picfile; ?>" width="307" height="197"/></a>
							
                                 </div>
                                 <div class="hot_loca">
                                      <p><span>地址：</span><?php echo $househaizai["addr"]; ?><br />
                                       <span>价格：</span><?php echo $househaizai["price"]; ?>万加币</p>
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

<!-- Hot开始 -->
<div class="lm_four"> 
<div class="swiper-hotproject">
	<a style='text-decoration:none;' href="index.php?r=projects">
	<div class='homepage-title-bar'> 
		<div class='homepage-title-text'>HOT.热点推荐</div>
	</div>
	</a>
  
   <div class="swiper-container s2" >
		<div class="swiper-wrapper">
				
				 <?php foreach($subject_list as $project){ ?>
					<div class="swiper-slide" >
						<a href="<?php echo Yii::app()->createUrl('projects/more',array('id'=>$project->id)); ?>">
						<img src="<?php 
						echo Yii::app()->request->baseUrl;?>/<?php 
						$s = str_replace("uploads","tn_uploads",$project->room_type_image);
						echo $s;
						//echo $project->room_type_image; 
						
						?>" >
						</a>
						<div class='projects-title-box'>
							<div class='projects-title'>
								<span>项目名称：<?php echo $project->name; ?> </span>
								<span>项目城市：<?php echo $project->cityname; ?> </span>
							</div>
						</div>
					
					</div>
				<?php }?> 
			

		</div>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-next swiper-button-white"></div>
		<div class="swiper-button-prev swiper-button-white"></div>

	
	</div>
	<script>

	
	</script>

</div>
</div>
<!-- HotEnd -->


<!-- 加国资讯开始 -->
<div class="lm_four">
	
     <div class="lm_four_banner"><a href="index.php?r=about2/about2&id=33"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/index/tl_3.jpg" /></a></div>
	 <div class="lm_fourup">
		 <a style='text-decoration:none;' href="index.php?r=news/canadaNews">
		 <div class='homepage-title-bar'> 
			<div class='homepage-title-text'>NEWS.加国资讯</div>
		</div>
		</a>
    </div>
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



<!-- 加拿大留学开始 -->
<div class="lm_five" >
	 <a style='text-decoration:none;' href="index.php?r=news/canadaNews2">
	<div class='homepage-title-bar'> 
		<div class='homepage-title-text'>EDUCATION.留学资讯</div>
	</div>
	</a>
  
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
	 <a style='text-decoration:none;' href="index.php?r=news/canadaNews3">
	<div class='homepage-title-bar'> 
		<div class='homepage-title-text'>IMMIGRATION.移民资讯</div>
	</div>
	</a>
   
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
	<a style='text-decoration:none;' href="index.php?r=news/canadaNews4">
	<div class='homepage-title-bar'> 
		<div class='homepage-title-text'>TRAVEL.旅游资讯</div>
	</div>
	</a>
  
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

	<a style='text-decoration:none;' href="index.php?r=about/partner">
		<div class='homepage-title-bar'> 
			<div class='homepage-title-text'>PARTNER.合作伙伴</div>
		</div>
	</a>
  
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
		
		//Swiper Start
		var swiper1 = new Swiper(".s1", {
			pagination: '.swiper-pagination',
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			//effect: 'fade',
			preloadImages: false,
			lazyLoading: true,
			paginationClickable: true,
			loop: true,
			autoplay: 10000,
			speed: 400,
			autoplayDisableOnInteraction: false
		

		});
		//Start End
		
		var swiper2 = new Swiper(".s2", {
			pagination: '.swiper-pagination',
			slidesPerView: 3,
			//preloadImages: false,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			//lazyLoading: true,
			effect: 'coverflow',
			paginationClickable: true,
			spaceBetween: 22,
			loop: true,
			autoplay: 5000,
			speed: 3000,
			//grabCursor: true,
			autoplayDisableOnInteraction: false
		});
			

		
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
