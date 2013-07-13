<!--<?php echo '这是用户信息：';print_r($nickname);?>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/style_personal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$("#update-info").hide();
	$("#viewinfo-button").click(function(){
		$("#update-info").hide();
		$("#view-info").show();
	});

	$("#updateinfo-button").click(function(){
		$("#view-info").hide();
		$("#update-info").show();
	});
	$(".demo").click(function(){
			$("#home_hover").fadeToggle("quick");
			if ($("#player").get(0).paused) 
			{               
				document.play_button.src="<?php echo base_url()?>image/Play_Button.png";         
			}            
			else {                
				document.play_button.src="<?php echo base_url()?>image/Pause_Button.png";
			}
		});
	});	
$(function(){
	$(".li_play_1").hover(function(){
		$(this).find(".li_play").show();
	},function(){
		$(this).find(".li_play").hide();
	});
});
</script>
<style type="text/css">
	#music2_left_tags li.music2_left_detail_selectTag a { background-position: right top; color:#fff; line-height: 30px; height:30px; background:url('<?php echo base_url()?>image/music2_7.jpg') no-repeat;}
	#music2_left_tags li A { font-size:12px; float: left; padding-bottom: 0px; color: #fff; line-height: 30px; padding-top: 0px; height: 30px; text-align:center; width:100%; text-decoration:none; background:url('<?php echo base_url()?>image/music2_8.jpg') no-repeat;}
	#music2_right_tags li A { font-size:12px; float: left; padding-bottom: 0px; color: #fff; line-height: 30px; padding-top: 0px; height: 30px; text-align:center; width:100%; text-decoration:none; background:url('<?php echo base_url()?>image/music2_10.jpg') no-repeat;}
	#music2_right_tags li.music2_right_detail_selectTag A { background-position: right top; color:#fff; line-height: 30px; height:30px; background:url('<?php echo base_url()?>image/music2_9.jpg') no-repeat;}
	
</style> 
<script type="text/javascript">
	document.getElementById("left_3").style.height = document.getElementById("right_3").offsetHeight + "px";
</script>
</head>
<body>
<!------------------>
<script>
function music(source)
  {
	var myaudio=document.getElementById("video1");
	if(source!=myaudio.currentSrc){	
		myaudio.src=source;
		myaudio.load();
		myaudio.play();
	}else{
		if (myaudio.paused) {myaudio.play();} else myaudio.pause();
	}
	
  }
</script>
<audio id="video1">
  <source src="" type="audio/mp3" preload="load">
  Your browser does not support HTML5 audio.
</audio>

<!------------------>
<div class="music_all">
	<div id="home_hover">
		<div id="play_button_background"></div>
		<img class="motto" src="<?php echo base_url()?>image/motto.png">
		<img class="play_button" name="play_button" src="<?php echo base_url()?>image/Play_Button.png">
		<img class="next_song" src="<?php echo base_url()?>image/Next_Song.png">
		<div id="logo_hover">
			<img src="<?php echo base_url()?>image/music2_logo_hover.png">
			 <button class="demo"></button>
		</div>
	</div>
  <div class="music2_left" id="left_3">
    <div class="music2_left_1">
      <div class="music2_left_1_1"><img src="<?php echo base_url()?>image/music2_4.jpg" /></div>
      <div class="music2_left_1_2">
        <div class="music2_left_1_2_1">
			我的信息
			<span id="info-option">
				|<a href="#" id="viewinfo-button">查看</a>
				|<a href="#" id="updateinfo-button">修改</a>|
			</span>
		</div>
		<form class="music2_left_1_2_2" id="update-info" method="post" action="update-userinfo.php">
          <table class="basic-info">
            <tr><td class="item-name">登录邮箱：</td><td class="item-value"><input type="email" name="email"/></td></tr>
            <tr><td class="item-name">昵称：</td><td class="item-value"><input type="text" name="nickname"/></td></tr>
            <tr><td class="item-name">TEL：</td><td class="item-value"><input type="tel" name="tel"/></td></tr>
            <tr><td class="item-name">破壳日：</td><td class="item-value"><input type="date" name="birthday"/></td></tr>
            <tr><td class="item-name">所在地：</td><td class="item-value"><input type="text" name="location"/></td></tr>
            <tr><td class="item-name">实名信息：</td><td class="item-value"><input type="text" name="identity"/></td></tr>
			<tr><td class="item-name">简介：</td><td class="item-value"><textarea name="intro"/>hello 6002</textarea></td></tr>
          </table>
        <div id="submit-button">
          <button type="submit" class="submit"><a href="#">保存</a></button>
          <button class="apply"><a href="#">申请成为音乐人</a></button>
        </div>
		</form>
      <div id="view-info" class="music2_left_1_2_2">
          <table class="basic-info">
            <tr><td class="item-name">登录邮箱：</td><td class="item-value"><?php echo $email ?></td></tr>
            <tr><td class="item-name">昵称：</td><td class="item-value"><?php echo $nickname ?></td></tr>
            <tr><td class="item-name">TEL：</td><td class="item-value">12345678901</td></tr>
            <tr><td class="item-name">破壳日：</td><td class="item-value"><?php echo $birthday ?></td></tr>
            <tr><td class="item-name">所在地：</td><td class="item-value">sh</td></tr>
            <tr><td class="item-name">实名信息：</td><td class="item-value"><?php echo $name ?></td></tr>
			<tr><td class="item-name">简介：</td><td class="item-value"><textarea name="intro"/>hello 6002</textarea></td></tr>
          </table>
      </div>	
      </div>
      <div class="music2_left_1_3"><img src="<?php echo base_url()?>image/music2_4_1.jpg" /></div>
    </div>
    <div class="music_height10"></div>
    <div class="music2_left_2">
      <div class="music2_left_2_1"><img src="<?php echo base_url()?>image/music2_12.jpg" /></div>
      <div id="music2_left_tab">
        <ul id="music2_left_tags">
          <li class="music2_left_detail_selectTag"><a onclick="music2_left_detail_selectTag('music2_left_detail_tagContent0',this)" href="javascript:void(0)">查看私信</a> </li>
          <li><a onclick="music2_left_detail_selectTag('music2_left_detail_tagContent1',this)" href="javascript:void(0)">查看版权请求</a> </li>
        </ul>
        <div class="music_clear"></div>
        <div id="music2_left_detail_tagContent">
          <div class="music2_left_detail_tagContent music2_left_detail_selectTag" id="music2_left_detail_tagContent0">
            <textarea name="" cols="" rows="">查看私信</textarea>
          </div>
          <div class="music2_left_detail_tagContent" id="music2_left_detail_tagContent1">
            <textarea name="" cols="" rows="">查看版权请求</textarea>
          </div>
        </div>

          <script type="text/javascript">
        function music2_left_detail_selectTag(showContent,selfObj){
            var tag = document.getElementById("music2_left_tags").getElementsByTagName("li");
            var taglength = tag.length;
            for(i=0; i<taglength; i++){
                tag[i].className = "";
            }
            selfObj.parentNode.className = "music2_left_detail_selectTag";
            for(i=0; j=document.getElementById("music2_left_detail_tagContent"+i); i++){
                j.style.display = "none";
            }
            document.getElementById(showContent).style.display = "block";
        }
		</script>

      </div>
    <div class="music2_left_2_3">
		<img src="<?php echo base_url()?>image/music2_12_1.jpg" /></div>
    </div>
	
    <div class="music2_left_3">
		<img src="<?php echo base_url()?>image/music2_logo.png">
	</div>
  </div>
  <div class="music2_left2" id="right_3">
    <div><img src="<?php echo base_url()?>image/music2_13.jpg" /></div>
    <div class="music2_left2_2"></div>
    <div><img src="<?php echo base_url()?>image/music2_14.jpg" /></div>
  </div>
  <div class="music2_right">
    <div class="music2_right_1">
    <a href="<?php echo site_url('home')?>"><button class="btn" />返回首页</a>
    </div>
    <div id="music2_right_tab">
      <ul id="music2_right_tags">
        <li class="music2_right_detail_selectTag"><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent0',this)" href="javascript:void(0)">收藏的歌曲</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent1',this)" href="javascript:void(0)">关注的音乐人</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent2',this)" href="javascript:void(0)">上传的音乐</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent3',this)" href="javascript:void(0)">下载的歌曲</a> </li>
      </ul>
      <div class="music_clear"></div>
      <div id="music2_right_detail_tagContent">
        <div class="music2_right_detail_tagContent music2_right_detail_selectTag" id="music2_right_detail_tagContent0">
		<ul class="li_play_0">
		  <?php foreach ($collects as $collect):?>
		  <li>
              <div class="li_play_1"><a href="#"><img src="<?php echo base_url().$collect['image_dir'];?>" /></a>
                <div class="li_play" style="display:none;">
                  <dl class="li_play_left">
                    <dt class="li_play_left_1"><?php echo $collect['name']; ?></dt>
                    <dt class="li_play_left_2"><?php echo $collect['nickname']; ?></dt>
                  </dl>
                  <dl class="li_play_right">
                    <a href="#"><img onclick="music('<?php echo base_url().$collect['dir']?>')" src="<?php echo base_url()?>image/li_play.png"/></a>
                  </dl>
                </div>
              </div>
		  </li>
		  <?php endforeach;?>
		  </ul>
         <div class="music_clear"></div>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input id="addmusic" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
          <div class="music_clear"></div>
        </div>
        <div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent1">
		<ul >
		  <?php foreach ($follows as $follow):?>
		  <li>
              <div class="li_play_1"><a href="#"><img src="<?php echo base_url().$follow['portaitdir'];?>" /></a>
                <div class="li_play" style="display:none;">
                  <dl class="li_play_left">
                    <dt class="li_play_left_1"><?php echo $follow['name']; ?></dt>
                    <dt class="li_play_left_2"><?php echo $follow['nickname']; ?></dt>
                  </dl>
                  <dl class="li_play_right">
                    
                  </dl>
                </div>
              </div>
		  </li>
		  <?php endforeach;?>
		  </ul>
          <div class="music_clear"></div>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input name="" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
          <div class="music_clear"></div>
        </div>
        <div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent2">
          <ul >
		  <?php foreach ($uploads as $upload):?>
		  <li>
              <div class="li_play_1"><a href="#"><img src="<?php echo base_url().$upload['image_dir'];?>" /></a>
                <div class="li_play" style="display:none;">
                  <dl class="li_play_left">
                    <dt class="li_play_left_1"><?php echo $upload['name']; ?></dt>
                    <dt class="li_play_left_2"><?php echo $upload['nickname']; ?></dt>
                  </dl>
                  <dl class="li_play_right">
                    <a href="#"><img onclick="music('<?php echo base_url().$upload['dir']?>')" src="<?php echo base_url()?>image/li_play.png"/></a>
                  </dl>
                </div>
              </div>
		  </li>
		  <?php endforeach;?>
		  </ul>
		  <div class="music_clear"></div>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input name="" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
          <div class="music_clear"></div>
        </div>
        <div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent3">
          <ul >
		  <?php foreach ($downloads as $download):?>
		  <li>
              <div class="li_play_1"><a href="#"><img src="<?php echo base_url().$download['image_dir'];?>" /></a>
                <div class="li_play" style="display:none;">
                  <dl class="li_play_left">
                    <dt class="li_play_left_1"><?php echo $download['name']; ?></dt>
                    <dt class="li_play_left_2"><?php echo $download['nickname']; ?></dt>
                  </dl>
                  <dl class="li_play_right">
                    <a href="#"><img onclick="music('<?php echo base_url().$download['dir']?>')" src="<?php echo base_url()?>image/li_play.png"/></a>
                  </dl>
                </div>
              </div>
		  </li>
		  <?php endforeach;?>
		  </ul><div class="music_clear"></div>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input name="" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
          <div class="music_clear"></div>
        </div>
      </div>
      <p>
        <script type="text/javascript">
        function music2_right_detail_selectTag(showContent,selfObj){
            var tag = document.getElementById("music2_right_tags").getElementsByTagName("li");
            var taglength = tag.length;
            for(i=0; i<taglength; i++){
                tag[i].className = "";
            }
            selfObj.parentNode.className = "music2_right_detail_selectTag";
            for(i=0; j=document.getElementById("music2_right_detail_tagContent"+i); i++){
                j.style.display = "none";
            }
            document.getElementById(showContent).style.display = "block";
        }
    </script>
      </p>
    </div>
  </div>
</div>
</body>
</html>
