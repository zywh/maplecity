<!-- 地址开始 -->
<div class="cl"></div>
<div class="nytb_dz">
    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> >&nbsp;<span>海外服务</span>
</div>
<!-- 地址结束 -->
<!-- 海外会员开始 -->
<div class="hwhy">
    <div class="hwhy_title">枫之都俱乐部会员可以享受如下加拿大安家及后续跟踪服务</div>
    <div class="hwhy_tpbox">
        <?php foreach($service as $key => $obj){ ?>
        <div class="hwhy_list">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj->image; ?>" />
            <div class="hwhy_list_bj"></div>
            <div class="hwhy_list_wz">
                <span class="hwhy_spanone"><?php echo $key+1; ?></span>
                <span class="hwhy_spantwo"><?php echo $obj->title; ?></span>
                <a href="<?php echo Yii::app()->createUrl('club/view', array('id'=>$obj->id)); ?>" class="hwhy_spanthree" target="_blank"><?php echo $obj->summary; ?></a>
            </div>
        </div>
        <?php } ?>
        <div class="cl"></div>
    </div>
</div>
<!-- 海外会员结束 -->	