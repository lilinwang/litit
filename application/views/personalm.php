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
			switch (showContent.substring(30)){
				case "0": $("#music2_right_tab").width(<?php echo((((int)((count($collects)-1)/24))+1)*1360);?>);break;
				case "1": $("#music2_right_tab").width(<?php echo((((int)((count($follows)-1)/24))+1)*1360);?>);break;
				case "2": $("#music2_right_tab").width(<?php echo((((int)((count($uploads)-1)/24))+1)*1360);?>);break;
				case "3": $("#music2_right_tab").width(<?php echo((((int)((count($downloads)-1)/24))+1)*1360);?>);
			}
			
        }
    </script>
<script type="text/javascript">
	$(document).ready(function(){
	$("#music2_right_tab").width(<?php echo((((int)((count($collects)-1)/24))+1)*1360);?>);
	       
	$(".prev").click(function(){
		 y=$("#music2_right_tab").position();
		 if (y.left<0) $("#music2_right_tab").animate({left: '+=1360px'},"slow");
	});
	$(".next").click(function(){
		 x=$("#music2_right_tab").position();
		 y=$("#music2_right_tab").width();
		 if ((x.left+y)>2720) $("#music2_right_tab").animate({left: '-=1360px'},"slow");
		 
	});
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
	#music2_right_tags li A { font-size:12px; float: left; padding-bottom: 0px; color: #fff; line-height: 30px; padding-top: 0px; height: 30px; text-align:center; width:100%; text-decoration:none; background:url('<?php echo base_url()?>image/music2_10.jpg') no-repeat;}
	#music2_right_tags li.music2_right_detail_selectTag A { background-position: right top; color:#fff; line-height: 30px; height:30px; background:url('<?php echo base_url()?>image/music2_9.jpg') no-repeat;}
</style> 
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
  <source src="" type="audio/mp3" preload="meta">
  Your browser does not support HTML5 audio.
</audio>

<!---------    <div class="music2_right_1">
    <a href=""><button class="btn" /></a>
	</div>
	<div class="music2_right1">
	<a href="#"><button class="btn" />上传新歌</a>
    </div>--------->
<div class="music_all">
  <div class="music2_right">
	<div class="music_right_1">
	<form name="input" action="<?php echo site_url('home')?>" method="post">
	<input type="submit" class="btn" value="返回首页"/>
	</div>
    </form>
	<div class="music_right1">
	<form name="input" action="<?php echo site_url('newsong')?>" method="post">
    <input type="submit" class="btn" value="上传新歌"/>
    </form>
	</div>
	<ul id="music2_right_tags" >
        <li class="music2_right_detail_selectTag"><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent0',this)" href="javascript:void(0)">收藏的歌曲</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent1',this)" href="javascript:void(0)">关注的音乐人</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent2',this)" href="javascript:void(0)">上传的音乐</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent3',this)" href="javascript:void(0)">下载的歌曲</a> </li>
    </ul>
    <div id="music2_right_tab">
		
      <div class="music_clear"></div>
      <div id="music2_right_detail_tagContent">
        <div class="music2_right_detail_tagContent music2_right_detail_selectTag" id="music2_right_detail_tagContent0">
		<ul class="li_play_0">
		  <?php if (count($collects)>0){$num=(((int)((count($collects)-1)/24))+1)*24;$i=0; while ($i<$num){foreach ($collects as $collect):?>
		  <li>
              <div class="li_play_1"><a href="<?php echo(site_url('home/playmusic?id=').$collect['music_id']);?>"><img src="<?php echo base_url().$collect['image_dir'];?>" /></a>
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
		  <?php $i++; endforeach;}}?>
		</ul>
		</div>
		
		<div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent1">
		<ul class="li_play_0">
		  <?php if (count($follows)>0){$num=(((int)((count($follows)-1)/24))+1)*24;$i=0;while ($i<$num) {foreach ($follows as $follow):?>
		  <li>
              <div class="li_play_1"><a href="<?php echo(site_url('home/playmusic?id=').$follow['famousfor']);?>"><img src="<?php echo base_url().$follow['portaitdir'];?>" /></a>
                <div class="li_play" style="display:none;">
                  <dl class="li_play_left">
                    <dt class="li_play_left_1"><?php echo $follow['name']; ?></dt>
                    <dt class="li_play_left_2"><?php echo $follow['nickname']; ?></dt>
                  </dl>
                  <dl class="li_play_right">
				   <a href="#"><img onclick="music('<?php echo base_url().$follow['dir']?>')" src="<?php echo base_url()?>image/li_play.png"/></a>
                  </dl>
                </div>
              </div>
		  </li>
		  <?php $i++; endforeach;}} ?>
		</ul>
		</div>
		
		<div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent2">
         <ul class="li_play_0">
		  <?php if (count($uploads)>0){$num=(((int)((count($uploads)-1)/24))+1)*24;$i=0;while ($i<$num) {foreach ($uploads as $upload):?>
		  <li>
              <div class="li_play_1"><a href="<?php echo(site_url('home/playmusic?id=').$upload['music_id']);?>"><img src="<?php echo base_url().$upload['image_dir'];?>" /></a>
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
		  <?php $i++; endforeach;}} ?>
		</ul>
		</div>
		
		<div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent3">
         <ul class="li_play_0">
		  <?php if (count($downloads)>0){$num=(((int)((count($downloads)-1)/24))+1)*24;$i=0;while ($i<$num) {foreach ($downloads as $download):?>
		  <li>
              <div class="li_play_1"><a href="<?php echo(site_url('home/playmusic?id=').$download['music_id']);?>"><img src="<?php echo base_url().$download['image_dir'];?>" /></a>
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
		  <?php $i++; endforeach;}}?>
		</ul>
		</div>
		
		
    </div>
  </div>
   <a  class="prev" href="#"></a>
	<a  class="next" href="#"></a>
</div>
</div>
</body>
</html>
