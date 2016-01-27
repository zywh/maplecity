<!-- 地址开始 -->
<div class="cl"></div>
<div class="nytb_dz">
    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <span>留学移民</span>
</div>
<!-- 地址结束 -->
<!-- 留学移民开始 -->
<div class="fyxq">
    <div class="lxym_up">
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/news/b_4.jpg" />
    </div>
    <div class="fyxqdown zx_zwy">
        <div class="fyxqdown_left">
            <div class="jgzx_down">
                <div class="jgzx_down_left">
                    <div class="lm_six_left_one"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/news/xlm_2.jpg" /></div>
                    <div class="lxym_down">
                        <?php foreach($left_news as $obj){ ?>
                        <div class="lm_six_list">
                            <div class="lm_six_lsitone"><a href="<?php echo Yii::app()->createUrl('studyabroad/view', array('id'=>$obj->id)); ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $obj->image; ?>" border="0" width="220" height="220" style="border-radius: 8px;"/></a></div>
                            <div class="lm_six_listtwo"><a href="<?php echo Yii::app()->createUrl('studyabroad/view', array('id'=>$obj->id)); ?>" target="_blank" title="<?php echo $obj->title; ?>"><?php echo $obj->title; ?></a></div>
                            <div class="lm_six_listthree">
                                <span>简介：</span><?php echo $obj->summary; ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="jgzx_down_right lxjm_rightbox">
                    <div class="lm_five_left_label">
                        <div class="jgzx_label_left"><?php echo $this->getCatalogName(3); ?></div>
                        <div class="cl"></div>
                    </div>
                    <div class="jgzx_rdxw">
                        <div class="jgzx_rdxw_up">
                            <div class="jgzx_rdxw_up_left">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->getCatalogImage(3); ?>" width="160" height="160"/>
                            </div>
                            <div class="jgzx_rdxw_up_right">
                                <a href="<?php echo Yii::app()->createUrl('studyabroad/view',array('id'=>$top_news->id)); ?>" class="jgzx_title" title="<?php echo $top_news->title; ?>" target="_blank"><?php echo $top_news->title; ?></a>
                                <span><?php echo $top_news->summary; ?></span>
                                <a href="<?php echo Yii::app()->createUrl('studyabroad/view',array('id'=>$top_news->id)); ?>" class="jgzx_ljxx" target="_blank">了解详细</a>
                            </div>
                            <div class="cl"></div>
                        </div>
                        <div class="jgzx_rdxw_down">
                            <?php foreach($more_news as $obj){ ?>
                                <div class="lm_five_center_list">
                                    <a href="<?php echo Yii::app()->createUrl('studyabroad/view',array('id'=>$obj->id)); ?>" title="<?php echo $obj->title; ?>" target="_blank">· <?php echo $obj->title; ?></a>&nbsp;<span>[<?php echo date('Y-m-d', $obj->create_time); ?>]</span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="cl"></div>
                <div class="page">
                    <?php
                    $this->widget('CLinkPager',array(
                        'header'         =>'',
                        'firstPageLabel' => '',
                        'lastPageLabel'  => '',
                        'prevPageLabel'  => '<<',
                        'nextPageLabel'  => '>>',
                        'pages'          => $pages,
                        'maxButtonCount' => 6,
                        'cssFile'        => 'themes/house/css/pager.css'
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="fyxqdown_right">
            <?php $this->widget('application.widget.bagecms.EvaluateWidget');?>
        </div>
        <div class="cl"></div>
    </div>
</div>
<!-- 留学移民结束 -->
<script type="text/javascript">
    $(function(){
        //评估报告
        $(".grtzone").mouseover(function(){
            $(this).find(".grtzonedown").show()
        });
        $(".grtzone").mouseout(function(){
            $(this).find(".grtzonedown").hide()
        });
        $(".grtzonedown a").click(function(){
            var cs=$(this).text();
            $(this).parent().parent().prev().val(cs);
        });
        $(".grtzone").mouseout(function(){
            $(this).find(".grtzonedown").hide()
        });
    });
</script>