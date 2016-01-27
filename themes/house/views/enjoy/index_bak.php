<!-- 地址开始 -->
<div class="cl"></div>
<div class="nytb_dz">
    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <span>豪宅鉴赏</span>
</div>
<!-- 地址结束 -->
<!-- 豪宅鉴赏开始 -->
<div class="enjoy">
    <div class="enjoy_hzjs_up">
        <div id="tour" class="zebra">
            <div class="wrap">
                <div class="switcher-wrap slider">
                    <a class="prev jQ_sliderPrev" href="javascript:void(0);"></a>
                    <a class="next jQ_sliderNext" href="javascript:void(0);"></a>
                    <ul id="img-slider" style="height:508px;">
                        <?php
                        $image_list = unserialize($house_image_list->image_list);
                        foreach($image_list as $obj){
                        ?>
                            <li class="img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj['file']; ?>" /></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="enjoy_hzjs_down">
        <div class="enjoydownlabel">
            <div class="enjoydownlabel_left">豪宅鉴赏<span> Luxury Property</span></div>
            <div class="enjoydown_hzjs_tab">
                <?php $num = count($subject_list);
                foreach($subject_list as $k => $obj){
                    if($k == 0){
                        ?>
                        <span class="spanon"><?php echo $obj->city->name; ?></span>&nbsp;|
                    <?php }elseif(($k + 1) == $num){ ?>
                        <span><?php echo $obj->city->name; ?></span>
                    <?php }else{ ?>
                        <span><?php echo $obj->city->name; ?></span>&nbsp;|
                    <?php }} ?>
            </div>
        </div>
        <div class="enjoydowncont">
            <?php foreach($city_houses as $key => $house_list){ ?>
                <div class="enjoydown_hzjs_list">
                    <?php foreach($house_list as $house){ ?>
                        <div class="enjoydown_list">
                            <div class="enjoydown_list_pic">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $house->house_image; ?>" width="485" height="355"/>
                            </div>
                            <div class="enjoydown_list_info" style="display:block;">
                                <span class="enjoy_dz">地址：<?php echo $house->location; ?></span>
                                <span class="enjoy_zj">总价：<i><?php echo $house->total_price; ?></i>万加币</span>
                            </div>
                            <div class="enjoydown_list_xx" style="display:none; text-align:left;">
                                <a href="<?php echo Yii::app()->createUrl('house/view',array('id'=>$house->id)); ?>" target="_blank">
																<span class="titlespan">MLS: <?php echo $house->mls_code; ?></span>
																<span>
																		 总价: <i><?php echo $house->total_price; ?></i>万加币
																</span>
																
																<span>地址: <?php echo $house->location; ?></span>
																<span>社区: <?php echo $house->community; ?></span>
																<span>户型: <?php echo $house->bedroom_num; ?>卧&nbsp;&nbsp;<?php echo $house->toilet_num; ?>卫&nbsp;&nbsp;<?php echo $house->kitchen_num; ?>厨</span>																
																<span>配套:&nbsp;
<?php
                        $house_match = explode(',', $house->match);
                        foreach ($matches as $match) {
                            if (in_array($match['id'], $house_match)) {
?>
                                <?php echo $match['name']; ?>&nbsp;&nbsp;
<?php }
} 
?>
																</span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="cl"></div>
                    <?php if(!empty($house_list)){ ?><div class="enjoy_more"><a href="<?php echo Yii::app()->createUrl('enjoy/more', array('city'=>$key)); ?>">查看更多</a></div><?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- 豪宅鉴赏结束 -->
<script type="text/javascript">
    //豪宅列表
    $(".enjoy_hzjs_down .enjoydown_hzjs_list:eq(0)").show();
    $(".enjoydown_hzjs_tab span").click(function(){
        var r=$(this).index();
        $('.enjoy_hzjs_down .enjoydown_hzjs_list:eq('+r+')').show().siblings().hide();
        $(this).addClass("spanon").siblings().removeClass("spanon");
    });

    $(document).ready(function(){
        $(".enjoydown_hzjs_tab").find('[data-index="<?php echo $city_id; ?>"]').addClass('spanon');

        $(".enjoydown_list").mouseover(function(){
            $(this).find('.enjoydown_list_info').hide();
            $(this).find('.enjoydown_list_xx').show();
        });
        $(".enjoydown_list").mouseout(function(){
            $(this).find('.enjoydown_list_info').show();
            $(this).find('.enjoydown_list_xx').hide();
        });
    });
</script>