<link href="/themes/house/xuequ/images_index/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
table{ border-collapse:collapse; margin:0 auto;}
tr{ text-align:center; height:47px;}
td{ border:1px solid #d8d8d8;  }
.xuequ_posotion a:hover{ color:#FF6600}
</style>
<div class="xuequ">
      <div class="xuequ_wrap">
              <div class="xuequ_con">
                     <div class="xuequ_posotion">
                     <P><a href="/">首页 &nbsp;&nbsp;>&nbsp;&nbsp;</a><a>学区专栏&nbsp;&nbsp;>&nbsp;&nbsp;</a></P>
                     </div>
                <div class="xuequ_top" style=" font-size:18px; margin-top:2px;">
                    　小学排名
                </div>
                </div>     
        <table width="1013" border="0" cellspacing="0"  cellpadding="0" style="background-image:url(/themes/house/images/xuequxiao.jpg)">
                          <tr style=" background:#e2e2e2; height:32px;">
                            <td width="66">排名</td>
                            <td width="220">学校</td>
                            <td width="40">评分</td>
                            <td width="103">性质</td>
                            <td width="135">电话</td>
                            <td width="256">地址</td>
							<td width="100">城市</td>
            </tr>
<?php
$db = Yii::app()->db; 
//$province = $_GET(province);
 $province   = Yii::app()->request->getQuery('province', 'ON');
$sqlhaozi = "select * from h_school where type=0 and province='".$province."' and paiming >0 order by paiming limit 0,10";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $househaizai){
?>
      
                          <tr>
                            <td><?php echo $househaizai["paiming"]; ?></td>
                            <td><a href="index.php?r=column/map&id=<?php echo $househaizai["id"]; ?>" target="_blank" style="color:#FF6600; text-decoration:underline"><?php echo $househaizai["school"]; ?></a></td>
                            <td><?php echo $househaizai["pingfen"]; ?></td>
                            <td><?php echo $househaizai["xingzhi"]; ?></td>
                            <td><?php echo $househaizai["tel"]; ?></td>
                            <td><?php echo $househaizai["address"]; ?></td>
							 <td><?php echo $househaizai["city"]; ?></td>
                          </tr>
<?php }?> 
        </table>
            <div style="height:13px; clear:both"></div>
            <div style="width:1013px; margin:0 auto;">
            <a href="index.php?r=column/school&leibie=0" style="color:#fe6100; font-size:16px; font-family:'宋体';text-decoration:underline"><b>点击更多小学排名</b></a>
            </div>
            <div style="height:13px; clear:both"></div>
              <div class="xuequ_wrap">
              <div class="xuequ_con">
                <div class="xuequ_top" style=" font-size:18px; margin-top:2px;">
                    　中学排名
                </div>
                </div>     
                <table width="1013" border="0" cellspacing="0"  cellpadding="0" style="background-image:url(/themes/house/images/xuequzhong.jpg)">
                          <tr style=" background:#e2e2e2; height:32px;">
                            <td width="66">排名</td>
                            <td width="220">学校</td>
                            <td width="40">评分</td>
                            <td width="103">性质</td>
                            <td width="135">电话</td>
                            <td width="256">地址</td>
							<td width="100">城市</td>
                  </tr>
                         <?php

$sqlhaozi = "select * from h_school where type=1 and province='".$province."' and paiming >0 order by paiming limit 0,10";
$resultshazai = $db->createCommand($sqlhaozi)->query();
foreach($resultshazai as $househaizai){
?>
      
                          <tr>
                            <td><?php echo $househaizai["paiming"]; ?></td>
                            <td><a href="index.php?r=column/map&id=<?php echo $househaizai["id"]; ?>" target="_blank" style="color:#FF6600; text-decoration:underline"><?php echo $househaizai["school"]; ?></a></td>
                            <td><?php echo $househaizai["pingfen"]; ?></td>
                            <td><?php echo $househaizai["xingzhi"]; ?></td>
                            <td><?php echo $househaizai["tel"]; ?></td>
                            <td><?php echo $househaizai["address"]; ?></td>
							 <td><?php echo $househaizai["city"]; ?></td>
                          </tr>
<?php }?> 
            </table>

                     
              
      </div>
                      <div style="height:13px; clear:both"></div>
                       <div style="width:1013px; margin:0 auto;">
            <a href="index.php?r=column/school&leibie=1" style="color:#fe6100; font-size:16px; font-family:'宋体'; text-decoration:underline"><B>点击更多中学排名</B></a>  
            </div>
            <div style="height:13px; clear:both"></div>
    <div class="xqzl_pic"><a href="javascript:void(0);"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/enjoy/fctj.jpg" border="0" /></a></div>
                     
  
   
   </div>
</div>
<!-- 学区专栏结束 -->



