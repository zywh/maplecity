<!-- 地址开始 -->
<div class="cl"></div>
<div class="nytb_dz">
    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('club/service'); ?>">枫之都俱乐部&nbsp;/&nbsp;海外服务></a> > <span><?php echo $post->title; ?></span>
</div>
<!-- 地址结束 -->
<!-- 房源详情页面开始 -->
<div class="fyxq">
    <div class="fyxqdown zx_zwy">
        <div class="fyxqdown_left">
            <div class="zx_zwycont">
                <div class="zx_zwytitle"><?php echo $post->title; ?></div>
                <div class="zx_zwyinfo" style="width: 100%;">
                    <span class="zx_span_time">更新时间：<?php echo date('Y-m-d', $post->last_update_time); ?></span>
                    <span class="zx_span_fx" style="float: right;">分享到：<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
                    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                    </span>
                    <div class="cl"></div>
                </div>
                <div class="zx_zwy_wz"><?php echo $post->content; ?></div>
                <div class="zx_zwy_qhy">
                    <?php if(!empty($prev_post)){ ?><span class="zx_zwy_prev align-left">上一篇：<a href="<?php echo Yii::app()->createUrl('club/view',array('id'=>$prev_post->id)); ?>" title="<?php echo $prev_post->title; ?>"><?php echo $prev_post->title; ?></a></span><?php } ?>
                    <?php if(!empty($next_post)){ ?><span class="zx_zwy_next align-right">下一篇：<a href="<?php echo Yii::app()->createUrl('club/view',array('id'=>$next_post->id)); ?>" title="<?php echo $next_post->title; ?>"><?php echo $next_post->title; ?></a></span><?php } ?>
                    <div class="cl"></div>
                </div>
                <div class="zx_zwy_pic"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/news/pic65.jpg" /></div>
            </div>
        </div>
        <div class="fyxqdown_right">
            <?php $this->widget('application.widget.bagecms.EvaluateWidget');?>
        </div>
        <div class="cl"></div>
    </div>
</div>
<!-- 房源详情页面结束 -->