<link href="/themes/house/xuequ/images_index/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
table{ border-collapse:collapse; margin:0 auto;}
tr{ text-align:center; height:47px;}
td{ border:1px solid #d8d8d8;  }
</style>
<?php 
$leibie=(int)$_GET["leibie"];
$province   = Yii::app()->request->getQuery('province', 'ON');
if($leibie==0){
$nametype="小学";
}
else{
$nametype="中学";
}
?>
<div class="xuequ">
      <div class="xuequ_wrap">
              <div class="xuequ_con">
                     <div class="xuequ_posotion">
                     <P><a href="/">首页 &nbsp;&nbsp;>&nbsp;&nbsp;</a><a href="index.php?r=column/index">学区专栏&nbsp;&nbsp;><?php echo $nametype;?>排名&nbsp;&nbsp;</a></P>
                     </div>
                <div class="xuequ_top" style=" font-size:18px; margin-top:2px;">
                    　<?php echo $nametype;?>排名
                </div>
                </div>     
        <table width="1013" border="0" cellspacing="0"  cellpadding="0">
                          <tr style=" background:#e2e2e2; height:32px;">
                            <td width="66">排名</td>
                            <td width="220">学校</td>
                            <td width="80">评分</td>
                            <td width="103">性质</td>
                            <td width="135">电话</td>
                            <td width="356">地址</td>
							<td width="100">城市</td>
            </tr>
<?php
$db = Yii::app()->db; 
$sqlhaozi = "select * from h_school where type=".$leibie." and province='".$province."' and paiming >0 order by pingfen desc ";
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
           
      </div>


