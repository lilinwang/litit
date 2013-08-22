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
				case "0": document.getElementById("totalnum").value=<?php echo(((int)((count($collects)-1)/24))+1);?>;break;
				case "1": document.getElementById("totalnum").value=<?php echo(((int)((count($follows)-1)/24))+1);?>;break;
				case "2": document.getElementById("totalnum").value=<?php echo(((int)((count($downloads)-1)/24))+1);?>;
			}
			//alert(document.getElementById("totalnum").value);
			$("#music2_right_tab").css({left:0});
			$("#music2_right_tab").width(document.getElementById("totalnum").value*1360);
        }
		function page_selectTag(showNum,selfObj){
            var tag = document.getElementById("page").getElementsByTagName("li");
            var taglength = tag.length;
            for(i=0; i<taglength; i++){
                tag[i].className = "";
            }
            selfObj.parentNode.className = "page_selectTag";
			document.getElementById("pagenum").value=showNum;
			$("#music2_right_tab").animate({left: -1360*showNum},"slow");
        }
    </script>
<script type="text/javascript">
	$(document).ready(function(){
	$("#music2_right_tab").width(<?php echo((((int)((count($collects)-1)/24))+1)*1360);?>);
	$(".prev").click(function(){
		 //y=$("#music2_right_tab").position();
		// if (y.left<0) 		 		 
		 pagenum=parseInt(document.getElementById("pagenum").value);
         if (pagenum>0) {
			pagenum=pagenum-1;
			$("#music2_right_tab").animate({left: '+=1360px'},"slow");
			tag = document.getElementById("page").getElementsByTagName("li");
			taglength = tag.length;
			for(i=0; i<taglength; i++){
				tag[i].className = "";
			}
			document.getElementById(pagenum).className = "page_selectTag";
			document.getElementById("pagenum").value=pagenum;
		 }
	});
	$(".next").click(function(){
		var pagenum=parseInt(document.getElementById("pagenum").value);
        if ((pagenum+1)<document.getElementById("totalnum").value) {
			pagenum=pagenum+1;
			$("#music2_right_tab").animate({left: '-=1360px'},"slow");
			tag = document.getElementById("page").getElementsByTagName("li");
			taglength = tag.length;
			for(i=0; i<taglength; i++){
				tag[i].className = "";
			}
			//alert(pagenum);
			document.getElementById(pagenum).className = "page_selectTag";
			document.getElementById("pagenum").value=pagenum;
		 }
		 
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
	#page li A { float: left; padding-bottom: 0px; color: #fff; line-height: 30px; padding-top: 0px; height: 10px; text-align:center; width:10px; text-decoration:none; background:transparent url('<?php echo base_url()?>image/carousel_control.png') no-repeat -2px -32px;}
	#page li.page_selectTag A { background-position: right top; color:#fff; line-height: 30px; height:10px; background:transparent url('<?php echo base_url()?>image/carousel_control.png') no-repeat -12px -32px;}
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

<!------------------>
<div class="music_all">
  <div class="music2_right">
    <div class="music2_right_1">
    <a href="<?php echo site_url('home')?>"><button class="btn" />返回首页</a>
    </div>
	<ul id="music2_right_tags" >
        <li class="music2_right_detail_selectTag"><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent0',this)" href="javascript:void(0)">收藏的歌曲</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent1',this)" href="javascript:void(0)">关注的音乐人</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent2',this)" href="javascript:void(0)">下载的歌曲</a> </li>
    </ul>
    <div id="music2_right_tab">
		
      <div class="music_clear"></div>
      <div id="music2_right_detail_tagContent">
        <div class="music2_right_detail_tagContent music2_right_detail_selectTag" id="music2_right_detail_tagContent0">
		<ul class="li_play_0">
		  <?php if (count($collects)>0){$num=(((int)((count($collects)-1)/24))+1)*24;$i=0; while ($i<$num){foreach ($collects as $collect):$i++; if ($i>$num) break;?>
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
		  <?php endforeach;}}?>
		</ul>
		<a  class="prev" href="#"></a>
		<ul id="page">
		<li id="0" class="page_selectTag"><a onclick="page_selectTag(0,this)" href="javascript:void(0)"></a> </li>
		<?php for ($i=1;$i<($num/24);$i++):?>
        <li id="<?php echo $i;?>"><a onclick="page_selectTag(<?php echo $i;?>,this)" href="javascript:void(0)"></a> </li>
		<?php endfor;?>
		</ul>
		<a  class="next" href="#"></a>
		</div>
		
		<div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent1">
		<ul class="li_play_0">
		  <?php if (count($follows)>0){$num=(((int)((count($follows)-1)/24))+1)*24;$i=0;while ($i<$num) {foreach ($follows as $follow):$i++; if ($i>$num) break;?>
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
		  <?php endforeach;}} ?>
		</ul>
		<a  class="prev" href="#"></a>
		<ul id="page">
		<li id="0" class="page_selectTag"><a onclick="page_selectTag(0,this)" href="javascript:void(0)"></a> </li>
		<?php for ($i=1;$i<($num/24);$i++):?>
        <li id="<?php echo $i;?>"><a onclick="page_selectTag(<?php echo $i;?>,this)" href="javascript:void(0)"></a> </li>
		<?php endfor;?>
		</ul>
		<a  class="next" href="#"></a>
		</div>
		
		<div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent2">
         <ul class="li_play_0">
		  <?php if (count($downloads)>0){$num=(((int)((count($downloads)-1)/24))+1)*24;$i=0;while ($i<$num) {foreach ($downloads as $download):$i++; if ($i>$num) break;?>
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
		  <?php  endforeach;}}?>
		</ul>
		<a  class="prev" href="#"></a>
		<ul id="page">
		<li id="0" class="page_selectTag"><a onclick="page_selectTag(0,this)" href="javascript:void(0)"></a> </li>
		<?php for ($i=1;$i<($num/24);$i++):?>
        <li id="<?php echo $i;?>"><a onclick="page_selectTag(<?php echo $i;?>,this)" href="javascript:void(0)"></a> </li>
		<?php endfor;?>
		</ul>
		<a  class="next" href="#"></a>
		</div>
    </div>
  </div>
  <input id="pagenum" type="hidden" value=0>
  <input id="totalnum" type="hidden" value=<?php echo(((int)((count($collects)-1)/24))+1);?>>
</div>
</div>
</body>
</html>
