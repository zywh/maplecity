<!-- 地址开始 -->
<div class="cl"></div>
<div class="nytb_dz">
    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> >&nbsp;<span>资料下载</span>
</div>
<!-- 地址结束 -->
<!-- 资料下载开始 -->
<div class="hwhy">
    <div class="zlxz_one">
    <?php foreach ($recommend_files as $obj): ?>
        <div class="zlxz_one_list">
            <div class="zlxz_one_up">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj->image; ?>" width="284" height="122"/>
                <div class="zlxz_one_up_box"></div>
                <a href="<?php echo Yii::app()->createUrl('club/download', array('id'=>$obj->id)); ?>">《<?php echo $obj->name; ?>》</a>
            </div>
            <a class="zlxz_one_down" href="<?php echo Yii::app()->createUrl('club/download', array('id'=>$obj->id)); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/club/pic3-1.jpg" /></a>
        </div>
    <?php endforeach ?>
        <div class="cl"></div>
    </div>
    <div class="zlxz_two">
    <?php foreach ($files as $obj): ?>
        <div class="zlxz_two_list">
            <span>《<?php echo $obj->name; ?>》</span>
            <a href="<?php echo Yii::app()->createUrl('club/download', array('id'=>$obj->id)); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/club/pic3-2.jpg" /></a>
            <div class="cl"></div>
        </div>
    <?php endforeach ?>
        <div class="cl"></div>
    </div>
</div>
<!-- 资料下载结束 -->