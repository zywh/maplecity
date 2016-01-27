<link href="/themes/house/services/images_index/index.css" rel="stylesheet" type="text/css" />
<style>
.ser_list p:hover{ color:#FF6600}
.ser_fr{margin-left: 30px;}
.ser_fl img:hover{ width:240px; margin-top: 0px;margin-left:0px; border:#CCCCCC 2px solid}
.nytb_dz a:hover{ color:#FF6600}
</style>
<div style="height:355px; width:100%; background-color:#11161c; text-align:center">
     <img src="/themes/house/services/images_index/ban.jpg"/>
</div>


<div class="ser_con">

      <div class="ser_wrap">
<div class="nytb_dz" style="width: 999px; padding-bottom:0px; "> <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> &gt; 
 <span style="font-size:14px;">海外服务</span> 
 </div>

<?php
		$db = Yii::app()->db;
		$sqlcontent = "select content from h_post where id=135";
       $resultcon = $db->createCommand($sqlcontent)->query();
       foreach($resultcon as $fueu){ echo $fueu["content"];}
 ?>

               <div class="hot" style="height:auto">
                            <div class="hot_title">
                                     <p>热点房源推荐</p>
                            </div>
                            

        <?php 

$sqlhaozi = "select * from h_house where lp_dol<3000000 and recommend=1 limit 0,3";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $househaizai){
?>
                            <div class="hot_con">
                                   <div class="hot_img">
<?php if($househaizai["house_image"]==""){?>
                                 <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"  target="_blank"><img src='/static/images/zanwu.jpg' width="250" height="212"/></a>
                      <?php }else{?>
                                 <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"  target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $househaizai["house_image"]; ?>"  width="250" height="212"/></a>
                      <?php }?>
                                   </div>
                                   <div class="hot_fr"> 
                                               <div class="hot_price">
                                                     <p><span>地址：</span><?php echo $househaizai["addr"]; ?><br />
                                                       <span>价格：</span><?php echo $househaizai["lp_dol"]/10000; ?>万加币
                                                     </p>
                                               </div>
                                               <div class="hot_des">
                                                     <p> <?php echo $househaizai["extras"]; ?>
                                                        </p>
                                               </div>
                                               <div class="hot_info">
                                                     <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$househaizai["id"])); ?>"><img src="/themes/house/services/images_index/info.jpg"/></a>
                                               </div>
                                   </div>
                            </div>
                            
                            
                            
                            <div style="height:15px; clear:both"></div>
<?php }?>

                            
                            
                            
                            
                            
                    
                </div>
      </div>
     
</div>