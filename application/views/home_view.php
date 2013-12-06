<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Litit</title>
    <!-- css -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/home.css" rel="stylesheet" type="text/css" />

    <!-- javascript global dependencies -->
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>

    <!-- noty javascript -->
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>
    
    <!-- 控件 javascript -->
    <script type="text/javascript">
        // 点亮按钮
        $("#light-it").click(function(){
            $("#container-mask").show();
            $("#container-main").addClass("mask-shade");
            $("#container-main").addClass("mask-blur");
        });
        
        
        /*
         * toggle首页的搜索框
         ＊by 徐佳琛
         *
         * 1.注册搜索框的blur事件，搜索框失去焦点之后隐藏
         * 2.定义show_home_search函数，点击收藏中的音乐时直接调用
         *
         */
        $(function(){
            $('#mask-search-input').blur(function() {
                $('#mask-search-input').animate({"width":0},300, "linear", function(){
                    $(this).hide();
                });
            });   
        
        });
        
        function show_mask_search() {
            $('#mask-search-input').show().animate({"width":400},300);
            $("#mask-search-input").focus();
        }
    </script>
    
</head>
<body>

    <!-- 面纱 -->
    <div id="container-mask" class="mask-shade">
		
		<!-- 中心播放按钮 -->
		<div id="mask-controls">
    		<div id="mask-play"></div>
		</div>
		
		<!-- logo -->
		<div id="mask-logo">
			<img id="mask-logo-img" src="<?php echo base_url()?>image/music2_logo_hover.png">
		</div>
		
		<!-- 导航条 -->
		<div id="mask-nav">
	        <a href="<?php echo base_url('personal'); ?>"><i class="icon-home icon-white"></i></a>
	        <a href="#" onclick="lititRbar.display('slideLeft');"><i class="icon-heart icon-white"></i></a>
	        <a href="#" onclick=""><i class="icon-signal icon-white"></i></a>
	        <a href="#" onclick="show_mask_search();"><i class="icon-search icon-white"></i></a>
	        <div id="mask-search">
	            <input id="mask-search-input" type="text">
	        </div>
	    </div>
	    
	    <!-- 侧边栏 -->
		<div id="Rbar"></div>
    </div>

    <!-- 主页面 -->
    <div id="container-main" class="mask-blur">
    
        <!-- 顶部导航栏 -->
        <div id="global-header">
        </div>
        
        <!-- 页面主要内容 -->
        <div id="global-main">
        
            <!-- 左侧 音乐播放器 -->
            <div id="music-player-col">
                <div id="music-header" class="row-fluid">
                    <div id="music-image-outer" class="span6">
                        <img src="<?php echo $music['image_dir']; ?>" />
                    </div>
                    <div class="span6">
                        <?php echo $music['name']; ?>
                    </div>
                </div>
                <div id="music-player-main" class="music-player">
                    <span id="play-toggle" class="icon-play"></span>
                    <span id="play-next" class="icon-forward"></span>
                    <span id="adjust-volume" class="icon-volume-up"></span>
                    <span id="gutter">
                        <span id="loading"></span>
                        <span id="handle" class="ui-slider-handle"></span>
                    </span>
                    <span id="timeleft"></span>
                </div>
                <div id="music-operations">
                    <span class="icon-heart"></span>
                    <span class="icon-download-alt"></span>
                    <span class="lyrics">歌词</span>
                    <span class="copyright">版权申请</span>
                </div>
                <div id="music-text">
                    <span class="">
                        <?php echo $music['story']; ?>
                    </span>
                </div>
            </div>
            
            
            <!-- 中央 音乐人详细内容 -->
            <div id="musician-details-col">
                <div id="musician-details-inner">
                    <ul class="img_wall">
                    	<li class="left_arrow"><span class="icon_arrow_l"></span></li>
                        <li class="right_arrow"><span class="icon_arrow_r"></span></li>
                      <li>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_1.jpg" /></div>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_4.jpg" /></div>
                      </li>
                      <li class="small_img">
                        <div class="img_wrap"></div>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_3.jpg" /></div>
                      </li>
                      <li>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_4.jpg" /></div>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_1.jpg" /></div>
                      </li>
                      <li>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_1.jpg" /></div>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_4.jpg" /></div>
                      </li>
                      <li class="big_img">
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_2.jpg" /></div>
                      </li>
                      <li>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_1.jpg" /></div>
                        <div class="img_wrap"><span class="img_hover"></span><img src="<?php echo base_url()?>image/img_wall/img_4.jpg" /></div>
                      </li>
                    </ul>
                    
                    <div id="music-list">
                        <?php foreach($musician['all_music'] as $music) echo $music['name'] . '</br>'; ?>
                    </div>
                    <div id="events-list">
                    </div>
                </div>
            </div>
            
            <!-- 右侧 音乐人简介 -->
            <div id="musician-profile-col">
                <div id="musician-avatar-outer">
                    <img src="<?php echo $musician['portaitdir']; ?>">
                </div>
                <div id="musician-text-outer">
                    <div id="musician-name">
                        <?php echo $musician['nickname']; ?>
                    </div>
                    <div id="musician-introduction">
                        <?php echo $musician['introduction']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
