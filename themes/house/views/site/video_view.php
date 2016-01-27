<!-- 地址开始 -->
<div class="cl"></div>
<div class="nytb_dz">
    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <span>枫之都精选视频</span>
</div>
<!-- 地址结束 -->
<!-- 房源详情页面开始 -->
<div class="fyxq">
    <div class="fyxqdown zx_zwy">
        <div class="fyxqdown_left">
            <div class="zx_zwycont">
                <div class="zx_zwytitle"><?php echo $video->title; ?></div>
                <div class="zx_zwyinfo" style="width: 100%;">
                    <span class="zx_span_time">上传时间：<?php echo date('Y-m-d', $video->date); ?></span>
                    <span class="zx_span_fx" style="float: right;">分享到：<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
                    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                    </span>
                    <div class="cl"></div>
                </div>
                <div class="videocont" id="video_wrap" style="width:693px; height:390px"></div>
                <div class="zx_zwy_wz" style="min-height: 325px; padding: 20px 0; text-indent: 2em; font-size: 14px; line-height: 23px;"><?php echo $video->describe; ?></div>
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
<script type="text/javascript">
    flowplayer("video_wrap", "<?php echo Yii::app()->theme->baseUrl; ?>/js/flowplayer-3.2.12.swf", {
        clip: {
            url: "<?php echo Yii::app()->request->baseUrl; ?>"+"/"+"<?php echo $video->url; ?>",
            autoPlay: false,
            autoBuffering: true
        },
        plugins: {
            controls: {
                play:true,        //开端按钮
                volume: true,     //音量按钮
                mute: true,       //静音按钮
                fullscreen: true, //全屏按钮
                scrubber: true,   //进度条
                time: true,       //是否显示时候信息
                autoHide: true    //功能条是否主动隐蔽
            }
        }
    });
</script>