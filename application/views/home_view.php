<!-- <?php ?>-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <title>Litit</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- css -->
    <link href="<?php echo base_url()?>css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>css/lititRightBar.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/icon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/home.css" rel="stylesheet" type="text/css" />

    <!-- js -->
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.tinyscrollbar.min.js"></script>
    <!--<script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script> -->
    <!-- <script type="text/javascript" src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=" charset="utf-8"></script> -->
    <!--<script type="text/javascript" src="<?php echo base_url()?>js/jQuery-1.7.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jQuery.textSlider.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.SuperSlide.2.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.SuperSlide.2.1.source.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/view.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>css/website.css" type="text/css" media="screen"/>
    
    <script type="text/javascript" src="<?php echo base_url()?>js/cufon.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/website.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/lititRightBarPlugin.js"></script>


    <!-- 控件 -->
    <script type="text/javascript">
        $(function() {
            
            /* 面纱上的控件 */
            
            /*
             * 首页的搜索框
             */
	    $(function(){
            // toggle 搜索框
            $('#mask-search-input').blur(function() {
                hide_home_search();
            });
            
            // 搜索
            $('#mask-search-input').keyup(function(event) {
                if (event.which == 13) {
                    player.search_and_play($(this).val());
                }
	    });
        });
            
            
            // 面纱播放按钮、面纱下一首按钮
            $("#mask-play-button").click(function(){
                $("#play-toggle").click();
            });
            $("#mask-next-button").click(function(){
                $("#play-next").click();
            });
            
            // 登陆和注册的tab
            $("#sign-in-tab").click(function(){
                $("#sign-in-form-outer").show();
                $("#sign-up-form-outer").hide();
                $("#sign-in-tab").hide();
                $("#sign-up-tab").show();
            });
            $("#sign-up-tab").click(function(){
                $("#sign-in-form-outer").hide();
                $("#sign-up-form-outer").show();
                $("#sign-in-tab").show();
                $("#sign-up-tab").hide();
            });
            $("#sign-in-tab").trigger("click");
        
            // 登陆之后才能生效的控件
            <?php if($this->session->userdata('is_logged_in')): ?>
            // 点亮按钮 
            $("#light-button").click(function(){
                if($("#container-mask").css("display") == "none") {
                    show_mask();
                }
                else {
                    hide_mask();
                }
            });
            
            /*
             * Rbar 插件
             */
             /*
            lititRbar = lititRightBarPlugin("#Rbar")
                .setDefaultImg("<?php echo base_url()?>image/li_play.png")
                .load(
                        <?php
                        $collect_array = array();
                        foreach ($collection as $collect_music) {
                            $item['img'] = base_url() . $collect_music['image_dir'];
                            $item['text'] = $collect_music['name'];
                            $item['href'] = 'javascript:player.play_now(' . $collect_music['music_id'] . '); hide_mask();';
                            array_push($collect_array, $item);
                        }
                        echo json_encode($collect_array);
                        ?>
                    )
                .locate({"position":"absolute","right":0,"top":0,"bottom":0})//对rightBar重新定位
                .itemClick(function(){
                            var href = $(this).attr("href");
                            if(href=="undefined")return;
                            if(this.hrefMode=="_blank")
                                window.open(href);
                            else
                                location.href=href;
                        });
              */
              
            /*close_right_bar = true;
            $(lititRbar).find('.litit-right-bar-list').click(function(){
                close_right_bar = !close_right_bar;
                console.log(close_right_bar);
            });
            
            $("#container-mask").click(function() {
                close_right_bar = false;
                console.log(close_right_bar);
            });
            */
            
            <?php endif; ?>
            
            /* section.left上的控件 */
            $("#collect-button").click(function(){
                collect_music(
                    player.current_music.music_id, 
                    "add",
                    function(data, status) {
                        data = JSON.parse(data);
                        console.log(data);
                        if(data.errno == 0 || data.errno == 1) {
                            show_uncollect_button();
                        }
                    }
                );
            });
            $("#uncollect-button").click(function(){
                collect_music(
                    player.current_music.music_id, 
                    "delete",
                    function(data, status) {
                        data = JSON.parse(data);
                        console.log(data);
                        if(data.errno == 0 || data.errno == 1) {
                            show_collect_button();
                        }
                    }
                );
            });
            
            
            
            /* section.center上的控件 */
            // 音乐人所有音乐列表 
            $("#musician-all-music-list")
                .on("mouseover", "li", function(){
                    $(this).find(".li-music-controls").show();
                }).on("mouseout", "li", function(){
                    $(this).find(".li-music-controls").hide();
                }).on("click", ".li-music-play", function(){
                    player.play_now($(this).parent().attr("mid"));
                }).on("click", ".li-music-add", function(){
                    player.contentWindow.append_to_prior_list($(this).parent().attr("mid"));
                });
        
            // 中间模块的tinysrollbar
            $("section.center").tinyscrollbar({
                autohide: true,
                autohideTimeout : 500
            });
            $( window ).resize(function() {
                $("section.center").tinyscrollbar_update();
            });
            
            $(".li-music-play").click(function() {
                
            });
            
            
            /* section.right上的控件 */
            // 右边模块  关注
            $("#unfollow-button")
                .on('mouseover', function(){
                    $(this).text("取消关注");
                }).on('mouseout', function(){
                    $(this).text("已关注");
                });
            $("#follow-button")
                .on('mouseover', function(){
                    $(this).text("关注");
                }).on('mouseout', function(){
                    $(this).text("未关注");
                });
            
            $("#unfollow-button").on('click', function(){
                // 取消关注
                follow_musician(
                    $(this).parent().attr("mid"),
                    'delete',
                    function(data, status){
                        data = JSON.parse(data);
                        console.log(data);
                        if (data.errno == 0 || data.errno == 1) {
                            show_follow_button();
                            decrement_attention();
                        }
                    }
                );
            });
            $("#follow-button").on('click', function(){
                // 关注
                follow_musician(
                    $(this).parent().attr("mid"),
                    'add',
                    function(data, status){
                        data = JSON.parse(data);
                        console.log(data);
                        if (data.errno == 0 || data.errno == 1) {
                            show_unfollow_button();
                            increment_attention();
                        }
                    }
                );
            });
			
            /* section.left上的控件 */
            // 左边模块  歌词和音乐故事切换
            $("#music_lyric_btn")
                .on('mouseover', function(){
                    $(this).text("歌词");
                }).on('mouseout', function(){
                    $(this).text("音乐故事");
                });
            $("#music_story_btn")
                .on('mouseover', function(){
                    $(this).text("音乐故事");
                }).on('mouseout', function(){
                    $(this).text("歌词");
                });
            
            $("#music_lyric_btn").on('click', function(){
                // 显示歌词
				$("#music_lyric").show();
				$("#music_story").hide();
				$("#music_story_btn").hide();
				$("#music_lyric_btn").show();                
            });
            $("#music_story_btn").on('click', function(){
                // 显示歌词
				$("#music_story").show();
				$("#music_lyric").hide();
				$("#music_story_btn").show();
				$("#music_lyric_btn").hide();                
            });
            
        });
        
        function show_mask() {
            $("#container-mask").show();
            $("#container-main").addClass("mask-blur");
        }
        
        function hide_mask() {
            $("#container-mask").hide();
            $("#container-main").removeClass("mask-blur");
        }
        
        function show_home_search() {
            $('#mask-search-input').show().animate({"width":400},300);
            $("#mask-search-input").focus();
        }
        
        function hide_home_search() {
            $('#mask-search-input').animate({"width":0},300, "linear", function(){
                $(this).hide();
            });
        }
        
        function collect_music(music_id, action, handler) {
            $.post(
                "<?php echo base_url('ajax/collect_music'); ?>",
                {
                    music_id: music_id,
                    action: action
                },
                handler
            );
        }
        
        function show_collect_button() {
            $("#collect-button").css("display", "inline-block");
            $("#uncollect-button").css("display", "none");
        }
        
        function show_uncollect_button() {
            $("#uncollect-button").css("display", "inline-block");
            $("#collect-button").css("display", "none");
        }
    
        function follow_musician(musician_id, action, handler) {
            $.post(
                "<?php echo base_url('ajax/follow'); ?>",
                {
                    musician_id: musician_id,
                    action: action
                },
                handler
            );
        }
        
        function show_follow_button() {
            $("#unfollow-button").hide();
            $("#follow-button").show();
        }
        
        function show_unfollow_button() {
            $("#follow-button").hide();
            $("#unfollow-button").show();
        }
        
        function increment_attention() {
            attention = parseInt($(".musician-attention").text());
            $(".musician-attention").text(attention + 1);
        }
        
        function decrement_attention() {
            attention = parseInt($(".musician-attention").text());
            $(".musician-attention").text(attention - 1);
        }
    
        // 改变杂志页
        function change_magazine(music, is_changing_musician) {
            change_music_player_info(music);
            if (is_changing_musician) {
                change_musician_info(music.musician, music.is_follow);
            }
        }
        
        //改变音乐播放器周围的信息
        function change_music_player_info(music) {
            $("#music-image-outer").find("img").attr("src", "<?php echo base_url();?>" + music.musician.avatar_src);
            $("#music-image-sidebar").find("#music-name").text(music.name);
            
            if(music.is_collect){
                show_uncollect_button();
            }
            else {
                show_collect_button();
            }
        }
        
        // 改变音乐人的信息
        function change_musician_info(musician, is_follow) {
            
            // 改变音乐人的信息
            $(".musician-name").text(musician.nickname); 
            $(".musician-attention").text(musician.attention);
            $("#musician-intro").text(musician.intro);
            $("#musician-avatar-outer").find("img").attr("src", "<?php echo base_url(); ?>" + musician.avatar_src);
            if(is_follow){
                show_unfollow_button();
            }
            else {
                show_follow_button();
            }
            
            // 修改音乐人的音乐
            $("#musician-all-music-list").empty();
            for(i in musician.all_music) {
                $("#musician-all-music-list").append(
                '<li>' + 
                    '<span class="music-name">' + musician.all_music[i].name + '</span>' + 
                    '<span class="li-music-controls" mid="' + musician.all_music[i].music_id + '">' + 
                        '<span class="icon-play icon-button li-music-play"></span>' + 
                        '<span class="icon-plus icon-button li-music-add"></span>' +
                        '<span class="icon-share icon-button li-music-share"></span>' +
                    '</span>' +
                '</li>');
            }
            
            
            $("section.center").tinyscrollbar_update(); // 调整滚动条长度
            $("section.center").tinyscrollbar_update(0); // 滚动条滑到最上
        }
        
        
        // 播放器类
        function Player(audio) {
            this.audio = audio;
        }
        Player.prototype = {
            // 属性
            audio: null,
            current_music: {
                music_id: <?php echo $music['music_id']; ?>,
                musician: { // 由于home和ajax的不统一造成的music结构混乱，亟待解决
                    musician_id: <?php echo $musician['musician_id']; ?>
                }
            },
            last_music: undefined,
            
            // 优先播放列表
            prior_list: {
                list: [],
                prepend: function(music_id) {
                    this.list.unshift(music_id);
                },
                append: function(music_id) {
                    this.list.push(music_id);
                },
                shift: function() { // 返回的是music_id
                    return this.list.shift();
                },
                is_empty: function() {
                    return this.list.length == 0;
                },
                clear: function() {
                    this.list = [];
                }
            },
            
            // 电台列表
            radio_list: {
                list: [],
                fetch: function(handler) {
                    var radio_list = this;
                    $.post(
                        "<?php echo base_url('ajax/fetch_radio_music');?>",
                        {},
                        function(data, status) {
                            data = JSON.parse(data);
                            radio_list.list = data;
                            handler();
                        }
                    );
                },
                shift: function() { // 返回的是music_id
                    return this.list.shift().music_id;
                },
                is_empty: function() {
                    return this.list.length == 0;
                },
                clear: function() {
                    this.list = [];
                }
            },
            
            // 拿到音乐信息，放入current_music;
            // 在 play_next 和 play_radio 中调用
            fetch_and_start: function(music_id) {
                p = this;
                $.post(
                    "<?php echo base_url('ajax/fetch_music_info'); ?>",
                    {music_id: music_id},
                    function(data, status){
                        data = JSON.parse(data);
                        p.last_music = p.current_music
                        p.current_music = data;
                        p.start_over();
                    }
                )
            },
            
            // 重新播放 this.current_music 中的音乐
            start_over: function() {
                $(this.audio).find("source").attr("src", "<?php echo base_url(); ?>" + this.current_music.src);
                change_magazine(
                    this.current_music,
                    this.current_music.musician.musician_id != this.last_music.musician.musician_id// need to change musician?
                );
                this.audio.load();
                this.audio.play();    
            },
            
            // 播放下一首歌
            play_next: function(){
                if(!this.prior_list.is_empty()){
                    this.fetch_and_start(this.prior_list.shift());
                }
                else {
                    // 优先列表的歌完了之后就放电台的歌
                    this.play_radio();
                }
            },
            
            // 播放电台列表
            play_radio: function(){
                if(!this.radio_list.is_empty()){
                    this.fetch_and_start(this.radio_list.shift());
                }
                else {
                    p = this;
                    this.radio_list.fetch(function(){
                        p.play_radio();
                    });
                }
            },
            
            // 直接播放
            play_now: function(music_id) {
                player.prior_list.prepend(music_id);
                player.play_next();
            },
            
            // 加入优先列表
            add_to_prior_list: function(music_id) {
                player.prior_list.append(music_id);
            },
            
            // 搜索播放
            search_and_play: function(keyword) {
                p = player;
                $.post(
                    "<?php echo base_url('ajax/search'); ?>",
                    {keyword: keyword},
                    function(data, status) {
                        data = JSON.parse(data);
                        if (data.length > 0) {
                            // 搜索有结果
                            p.prior_list.clear();
                            for (i in data) {
                                p.add_to_prior_list(data[i].music_id);
                            }
                            p.play_next();
                        }
                        else {
                            // 搜索无结果
                            alert("没有条件为 " + keyword + " 的音乐，请再试试别的词吧");
                        }
                    }
                );
            }
        };
        
        
        // 播放控件
        $(function(){
        
            $('#player-audio').hide();
            
            // get html elements
            audio = $('#player-audio').get(0);
            player = new Player(audio);
            
            $gutter_slider = $('#music-player #gutter'); // gutter slider, controls audio time
            $loading_indicator = $('#music-player #loading'); // shows download percentage
            $position_indicator = $('#music-player #handle'); // shows playing percentage
            $time_past = $('#music-player #time-past');
            $time_left = $('#music-player #time-left');
            
            // bind loadmetadata
            audio.addEventListener('loadedmetadata', function() {
                
                // bind slider widget
                manual_seek = false;
                $gutter_slider.slider({
                    value: 0,
                    step: 0.01,
                    orientation: "horizontal",
                    range: "min",
                    max: audio.duration,
                    animate: true,		    			
                    slide: function() {					
                        manual_seek = true;
                    },
                    stop:function(e,ui) {
                        manual_seek = false;					
                        audio.currentTime = ui.value;
                    }
                });
                 			
                // bind audio progress(of download) to loading_indicator;
                audio.addEventListener('progress', function() {
                    var loaded = parseInt(((audio.buffered.end(0) / (audio.duration+0.1)) * 100), 10);
                    $loading_indicator.css({width: loaded + '%'});
                });
                
                // bind timeupdate to position change, time text change
                audio.addEventListener('timeupdate', function() {
                    var time, mins, secs;
                    
                    time = parseInt(audio.currentTime, 10),
                    mins = Math.floor(time/60,10),
                    secs = time - mins*60;
                    $time_past.text(mins + ':' + (secs > 9 ? secs : '0' + secs));
                    
                    time = parseInt(audio.duration - audio.currentTime, 10),
                    mins = Math.floor(time/60,10),
                    secs = time - mins*60;
                    $time_left.text('-' + mins + ':' + (secs > 9 ? secs : '0' + secs));
                    
                    if (!manual_seek) { 
                        pos = (audio.currentTime / audio.duration) * 100;
                        $position_indicator.css({left: pos + '%'}); 
                        $gutter_slider.slider("value", audio.currentTime);
                    }
                });
            });
            
            // bind volume slider 
            $("#music-player #controls #volume").hover(function(){
                $("#music-player #controls #volume #volume-slider").fadeToggle(200);
            });
            $("#music-player #controls #volume #volume-slider").hide();
            
            $("#music-player #controls #volume #volume-slider").slider({
                value: 1,
                step: 0.05,
                orientation: "horizontal",
                min: 0,
                max: 1,
                animate: true,
                slide:function(e,ui) {
                    audio.volume = ui.value;
                }
            });
            // click volume button to mute & unmute
            $("#music-player #controls #volume").click(function(){
                if (audio.volume > 0) {
                    audio.unmute_volume = audio.volume;
                    audio.volume = 0;
                    $("#music-player #controls #volume #volume-slider").slider("value", 0);
                }
                else {
                    audio.volume = audio.unmute_volume;
                    $("#music-player #controls #volume #volume-slider").slider("value", audio.volume);
                }
            });
            // bind play, pause and ended
            $(audio).bind('play',function() {
                $("#play-toggle").find("#icon-to-change").removeClass("icon-play").addClass("icon-pause");		
            }).bind('pause ended', function() {
                $("#play-toggle").find("#icon-to-change").removeClass("icon-pause").addClass("icon-play");	
            }).bind('ended', function(){
                player.play_next();
            });
            		
            $("#play-toggle").click(function() {			
                if (audio.paused) { audio.play(); } 
                else { audio.pause(); }	
            });
            $("#play-next").click(function(){
                player.play_next();
            });
        });
    
    </script>
</head>
<body >
    <!--判断浏览器是否支持html5标签-->
    <canvas id="myCanvas" width="300" height="200" style=" display:none;"></canvas>
    <div id="html5txt"  style="display:none">555~您的浏览器版本已经旧了，请升级到最新版本！</div>
    
    <!-- logo -->
    <div id="container-logo">
        <div id="logo-outer">
            <div id="logo">
            
                <?php if(!$this->session->userdata('is_logged_in')): ?>
                <!-- 登陆界面,未登陆的时候才出现 -->
                <div id="forms-outer">
                    <div id="form-tabs">
                        <span id="sign-in-tab">我是老用户?
                        </span>
                        <span id="sign-up-tab">我是新用户?
                        </span>
                    </div>
                    <div id="sign-in-form-outer">
                        <form id="sign-in-form" method="post" class="hover-form" action="<?php echo base_url('login');?>">
                            <input placeholder="邮箱" type="text" id="sign-in-email" name="email">
                            <input placeholder="密码" type="password" id="sign-in-password" name="password">
                            <input name="user_type" type="radio" value="0" id="user-type-0"/><label for="user-type-0">音乐人</label> 
                            <input name="user_type" type="radio" value="1" id="user-type-1" /><label for="user-type-1">普通用户</label> 
                            <div class="prompt"><?php echo $this->session->flashdata('login_prompt'); ?></div>
                            <input type="submit" value="登录">
                        </form>
                    </div>
                    <div id="sign-up-form-outer">
                        <form id="sign-up-form" action="<?php echo base_url('sign_up');?>" method="post" class="hover-form">
                            <input placeholder="邮箱" type="text" id="sign-up-email" name="email">
                            <input placeholder="密码" type="password" id="sign-up-password" name="password">
                            <input placeholder="密码确认" type="password" id="sign-up-password-confirm" name="password_confirm">
							<input name="user_type" type="hidden" value="1">
                            <div class="prompt"><?php echo $this->session->flashdata('sign_up_prompt'); ?></div>
                            <input type="submit" value="注册">
                        </form>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- 点亮按钮 -->
                <div id="light-button-outer">
                    <div id="light-button"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 面纱 -->
    <div id="container-mask">
    	
    	<div id="mask-top">
        	<div id="mask-nav">
        	    <a target="_blank" href="<?php echo base_url('personal'); ?>" class="iconhome"></a>
        	    <a href="#" onclick="lititRbar.display('slideLeft');" class="iconheartempty"> </a>
        	    <a href="#" onclick="" class="iconsignal"></a>
        	    <a href="#" onclick="show_home_search();" class="iconsearch"></a>
        	    <div id="mask-search">
        	        <input id="mask-search-input" type="text">
        	    </div>
        	</div>
    	</div>
        
		<div id="Rbar"></div>
		
		<div id="mask-center">
		    <div id="mask-motto">
		    </div>
		    <div id="mask-play">
		        <div id="mask-play-button">
		        </div>
		        <div id="mask-next-button">
		        </div>
		    </div>
		</div>
	</div>
	
	
	<!-- 主页面 -->
    <div id="container-main" class="mask-blur">
        <!-- 顶部导航 -->
        <header class="header">
     	    <span class="user"><?php echo $user['nickname']?>的Litit</span> 
     	</header>
     	
     	<!-- 正文内容 -->
        <article>
            <!-- 左侧-->
            <section class="left">
                <div id="music-player-outer">
                    <div class="row-fluid"> 
                        <div id="music-image-outer" class="">
                            <img src="<?php echo base_url().$musician['avatar_src']?>" />
                        </div>
                        <div id="music-image-sidebar" class="">
                            <div id="music-name">
                                <?php echo $music['name']; ?>
                            </div>
                            <div id="music-controls">
                                <?php if($music['is_collect']):?>
                                <span id="collect-button" class="icon-heart-empty icon-large music-control-button" style="display:none;"></span>
                                <span id="uncollect-button" class="icon-heart icon-large music-control-button" style="display:inline-block;"></span>
                                <?php else:?>
                                <span id="collect-button" class="icon-heart-empty icon-large music-control-button" style="display:inline-block;"></span>
                                <span id="uncollect-button" class="icon-heart icon-large music-control-button" style="display:none;"></span>
                                <?php endif;?>                                
								<span id="share-button" class="icon-share icon-large music-control-button"><wb:share-button ></wb:share-button></span>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row-fluid">
                        <div id="music-player">
                            <div id="gutter">
                                <span id="time-past" ></span>
                                <span id="time-left" ></span>
                                <span id="loading" ></span>
                                <span id="handle" class="ui-slider-handle"></span>
                            </div>
                            <div id="controls">
                                <span id="play-toggle" class="music-player-control-button">
                                    <span class="icon-stack">
                                        <i class="icon-circle-blank icon-stack-base"></i>
                                        <i id="icon-to-change" class="icon-play"></i>
                                    </span>
                                </span>
                                <span id="play-next" class="music-player-control-button">
                                    <span class="icon-stack">
                                        <i class="icon-circle-blank icon-stack-base"></i>
                                        <i class="icon-forward"></i>
                                    </span>
                                </span>
                                <span id="volume" class="music-player-control-button">
                                    <span class="icon-stack">
                                        <i class="icon-circle-blank icon-stack-base"></i>
                                        <i class="icon-volume-off"></i>
                                    </span>
                                    <div id="volume-slider">
                                        <div id="volume-slider-gutter-space"></div>
                                        <span id="volume-slider-handle" class="ui-slider-handle"></span>
                                    </div>
                                </span>
                            </div>
                        </div>
              	        <audio id="player-audio" controls="controls" preload="auto">
        				    <source name="player" src="<?php echo base_url().$music['src']?>" type="audio/mp3" preload="load">
        				Your browser does not support this audio format.
        			    </audio>
                    </div>
        		  
                    <div class="row-fluid">
                        <!--
                        <?php if($music['is_copyright_sign']==0):?>
            		    <a href="#myModal" class="button" type="button" data-toggle="modal" class="copyright" id="copyright" >版权申请</a>		
            		    <?php else:?>
            	        <a href="#myModal_1" class="button" type="button" data-toggle="modal" class="copyright" id="copyright" >取消申请</a>
            		    <?php endif;?>
            		    -->
            		    <button class="button" type="button" id="music_lyric_btn">歌词</button>
                        <button class="button" type="button" id="music_story_btn" style="display:none">音乐故事</button>
                        <a class="button" href="#download" type="button" data-toggle="modal"><span class="icon-download-alt"></span>下载</a>
                    </div>
                </div>
              
                <div id="music-text-outer">
                    <div id="scrollbar1">
                      <div class="scrollbar">
                        <div class="track">
                          <div class="thumb">
                            <div class="end"></div>
                          </div>
                        </div>
                      </div>
                      <div class="viewport">
                        <div class="overview p-txt"> 
                        <div id="music_story">
                        <div class="p-title">音乐故事</div>
                         <div class="p-txt" id="music_story"><?php echo $music['story']?></div>
                         <div class="music_lyric" id="music_lyric" style="display:none">
							歌词<?php /*echo $music['lyrics']*/ ?>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>

            </section>
          	
          	<!-- 中央 -->
          	 <section class="center">
          	 
          	     <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
          	     <div class="viewport">   <!-- brought by jquery tinyscrollbar -->
              	     <div class="overview"> <!-- brought by jquery tinyscrollbar -->
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
                        
                        <div id="musician-intro-outer" class="content-outer">
                          <p id="musician-intro"><?php echo $musician['introduction']?></p>
                        </div>
                        
                        <div id="musician-all-music" class="content-outer">
                            <div id="musician-all-music-title" class="content-title">
                                <span class="content-title-inner">
                                    <span class="musician-name"><?php echo $musician['nickname']?></span>的音乐
                                </span>
                            </div>
                                
                            <div id="musician-all-music-list-outer">
                                <ul id="musician-all-music-list">
                                    <?php foreach ($musician['all_music'] as $item): ?>
                                        <li>
                                            <span class="music-name"><?php echo $item['name']; ?></span>
                                            <span class="li-music-controls" mid="<?php echo $item['music_id']; ?>">
                                                <span class="icon-play icon-button li-music-play"></span>
                                                <span class="icon-plus icon-button li-music-add"></span>
                                                <!--span class="icon-heart-empty icon-button li-music-collect"></span>-->
                                                <span class="icon-share icon-button li-music-share"></span>
                                            </span>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            
                        </div>
                          
                        <div id="musician-activities" class="content-outer">
                            <div id="musician-activities-title" class="content-title">
                                <span class="content-title-inner">
                                    <span class="musician-name"><?php echo $musician['nickname']?></span>的活动
                                </span>
                            </div>
                            <div id="musician-activities-outer">
                              <ul id="musician-activities-list">
                              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
                              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
                              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
                              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
                              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
                               </ul>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
          	
          	
          	<section class="right">
                <div id="musician-avatar-outer">
                    <img src="<?php echo base_url().$musician['avatar_src']?>"/>
                </div>
                <div id="musician-name-outer">
                    <span class="musician-name"><?php echo $musician['nickname']?></span>
                </div>
                <div id="musician-attention-outer">
                    <div id="musician-attention-top">
                        <span class="musician-attention"><?php echo $musician['follower_cnt']?></span>人
                    </div>
                    <div id="musician-attention-bottom">
                        正在关注
                    </div>
                </div>
                <div id="musician-controls-outer" mid="<?php echo $musician['musician_id'];?>">
                    <?php if($music['is_follow']):?>
                        <button class="button"  id="follow-button" style="display:none;">未关注</button>
                        <button class="button"  id="unfollow-button" style="display:inline-block;">已关注</button>
                    <?php else:?>
                        <button class="button"  id="follow-button" style="display:inline-block;">未关注</button>
                        <button class="button"  id="unfollow-button" style="display:none;">已关注</button>
                    <?php endif;?>
                    <button href="#private_letter"  data-toggle="modal" class="private_letter button" id="private_letter" ><span class="icon-pencil"></span>私信TA</button>
                </div>
                <div class="owner" style="text-align: left;"> <a href="#">上海交通大学主页</a> <a href="#"> <span>微博主页</span> <img src="<?php echo base_url()?>image/r_weibo.png" width="19" height="16" /></a> </div>
            </section>
        </article>
    
    </div>    
    
    
    
    
    <!-- modals -->

    <!-- 版权申请 -->
  	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close">×</button>
			<h3 id="myModalLabel">版权申请</h3>
		</div>
			
		<div class="modal-body">
			<div class="login_wrong" id="signMessage" ></div> 
            姓名：  *<input type="text" name="name" id="copyright_sign_name" onfocus="copyright_sign_enable()" placeholder="真实姓名" />
			<br/>
			公司：  *<input type="text" name="company" id="copyright_sign_company" onfocus="copyright_sign_enable()" placeholder="公司名称" />
            <br/>
  			身份证号:*<input type="text" name="identity" id="copyright_sign_identity" onfocus="copyright_sign_enable()" placeholder="二代身份证号" />
            <br/> 			                		
			邮箱：  *<input type="email" name="email" id="copyright_sign_email" onfocus="copyright_sign_enable()" placeholder="常用邮箱" />
			<br/>
			联系电话:*<input type="text" name="phone" id="copyright_sign_phone" onfocus="copyright_sign_enable()" placeholder="常用电话号码"/>
			<br/>			
			请求内容：* <input type="text" name="content" id="copyright_sign_content" onfocus="copyright_sign_enable()" placeholder="请描述版权使用范围和目的" />
			<br/>
      (注：有 * 标记的为必填项)<br/>
    </div>
    <div class="modal-footer">
   	<input type="button" data-dismiss="modal" class="btn btn-primary" aria-hidden="true" value="取消"/>
     <input type="submit" onclick="copyright_sign_check()" id="copyright_sign" data-dismiss="modal" class="btn btn-primary" value="提交" />
   </div>
</div>
	
	
		
	<!-- ??? modal -->		
    	<div id="myModal_1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close">×</button>
			<h3 id="myModalLabel">取消申请</h3>
		</div>	
		<div class="modal-body">
            您确定取消申请？
    </div>
    <div class="modal-footer">
   	<input type="button" data-dismiss="modal" class="btn btn-primary" aria-hidden="true" value="点错了"/>
     <input type="submit" id="no_copyright_sign" data-dismiss="modal" class="btn btn-primary" value="确定取消" />
   </div>
</div>


    <!-- 私信 modal -->		
    <!--
	<div id="private_letter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <div style="display:none;">
        <p id ="usernickname" /><?php echo $username; ?> </p>
        </div>
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close">×</button>
			<h3 id="myModalLabel">私信TA</h3>
		</div>
		<div class="modal-body">
			<div class="login_wrong" id="private_letter_Message" ></div> 		
			<br/>
		 <textarea rows=3 style="width:500px"  id="private_letter_content" onfocus="private_letter_enable()"  /></textarea>
			<br/>
    <div class="modal-footer">
   	<input type="button" data-dismiss="modal" class="btn btn-primary" aria-hidden="true" value="取消"/>
     <input type="submit" onclick="private_letter_check()" id="private_letter_sign" data-dismiss="modal" class="btn btn-primary" value="发送" />
   </div>
        </div>
    </div>
    -->
    
    
    <!-- 下载 modal -->
    <div id="download" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    		<h3 id="myModalLabel">下载页面</h3>
    	</div>
        <form name="input" action="<?php echo site_url('success')?>" method="post">
    	<div class="modal-body">
    		根据音乐人要求，下载本音乐需支付6002个比特币^^
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="下载" />
        </div>
        </form>
    	
    </div>
    
    
</body>
</html>