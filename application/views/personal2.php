<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<link href="<?php echo base_url()?>css/style_personal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script type="text/javascript">
var n=1;
function music(source)
  {
	var myaudio=document.getElementById("video1");
	var s=myaudio.currentSrc;
	var m=source.lastIndexOf('/');
	var str;
	if(m!=-1){
		str=source.substring(m+1);

	}else{
		str=source;
	}
	var compare=s.indexOf(str);
	if(compare==-1){	
		myaudio.src=source;
		myaudio.load();
		myaudio.play();
		n=2;
	}else{
		if(n==1){
			myaudio.play();
			n=2;
		}else{
			myaudio.pause();
			n=1;
		}
	}
  }
$(document).ready(function(){

	loadSongs("collect","陈奕迅","因为爱情","image/music2_11.jpg","http://localhost/litit/1.mp3");
	loadSongs("follow","歌手","歌名","image/music2_15.jpg","http://localhost/litit/1.mp3");
	loadSongs("upload","彭佳慧","****","image/music2_16.jpg","http://localhost/litit/1.mp3");
	loadSongs("download","陈奕迅","因为爱情","image/music2_17.jpg","http://localhost/litit/1.mp3");
});

function loadSongs(id,singer,name,img,mus){
	var content="<div class=\"li_play_1\"><a href=\"#\"><img src=\"<?php echo base_url()?>";
	content=content+img+"\"/></a><div class=\"li_play\" style=\"display:none;\"><dl class=\"li_play_left\"><dt class=\"li_play_left_1\">";
	content=content+name+"</dt><dt class=\"li_play_left_2\">";
	content=content+singer+"</dt></dl><dl class=\"li_play_right\"><a href=\"#\"><img onclick=\"music(mus)\" src=\"<?php echo base_url()?>image/li_play.png\"/></a></dl> </div></div>";
	
	var tables=document.getElementById(id).getElementsByTagName("table");
	var table=tables[0];
	for (var i = 0; i < 3; i++) {
		for (var j = 0; j < 4; j++) {
			table.rows[i].cells[j].innerHTML=content;
		};
	};
}
</script> 
<script type="text/javascript">
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
<audio id="video1">
  <source src="" type="video/mp3">
  <source src="" type="video/ogg">
  Your browser does not support HTML5 audio.
</audio>
<div class="music_all">
  <div class="music2_left" id="left_3">
    <div class="music2_left_1">
      <div class="music2_left_1_1"><img src="<?php echo base_url()?>image/music2_4.jpg" /></div>
      <div class="music2_left_1_2">
        <div class="music2_left_1_2_1">我的信息</div>
        <div class="music2_left_1_2_2">
          <p>邮箱（登录名）：<?php echo $email ?><span>
            <input name="提交" type="submit" value="修改信息" />
            <input name="" type="submit" value="申请成为音乐人" />
            </span></p>
          <p>昵称（用户名）：<?php echo $nickname ?></p>
          <p>TEL：138-8888-8888</p>
          <p>破壳日：<?php echo $nickname ?></p>
          <p>实名信息：<?php echo $name ?></p>
          <p>介绍：呵呵</p>
          <p>
            <textarea name="" cols="" rows=""></textarea>
          </p>
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
        <p>
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
        </p>
      </div>
      <div class="music2_left_2_3"><img src="<?php echo base_url()?>image/music2_12_1.jpg" /></div>
    </div>
    <div class="music2_left_3">
			<img src="<?php echo base_url()?>image/music2_logo.png">
			 <button class="demo"></button>
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
    <div class="music_height10"></div>
    <div id="music2_right_tab">
      <ul id="music2_right_tags">
        <li class="music2_right_detail_selectTag"><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent0',this)" href="javascript:void(0)">收藏的歌曲</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent1',this)" href="javascript:void(0)">关注的音乐人</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent2',this)" href="javascript:void(0)">上传的音乐</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent3',this)" href="javascript:void(0)">下载的歌曲</a> </li>
      </ul>
      <div class="music_clear"></div>
      <div id="music2_right_detail_tagContent">
	  <div id="collect">
        <div class="music2_right_detail_tagContent music2_right_detail_selectTag" id="music2_right_detail_tagContent0">
          <table>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          </table>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input name="" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
        </div>
		</div>
		<div id="follow">
        <div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent1">
          <ul class="li_play_0">
		  <?php foreach $collects as $collect:?>
		  <li>
              <div class="li_play_1"><a href="#"><img src="<?php echo base_url().$collect['image_dir'];?>" /></a>
                <div class="li_play" style="display:none;">
                  <dl class="li_play_left">
                    <dt class="li_play_left_1"><?php echo $collect['name']; ?></dt>
                    <dt class="li_play_left_2"><?php echo $collect['musicianid']; ?></dt>
                  </dl>
                  <dl class="li_play_right">
				  <!------------------>
                    <a href="#"><img onclick="music('<?php echo base_url().$collect['dir']?>')" src="<?php echo base_url()?>image/li_play.png"/></a>
					<!------------------>
                  </dl>
                </div>
              </div>
			
		  </li>
		  <?php endforeach;?>
		  </ul>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input name="" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
        </div>
		<div id="download">
        <div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent2">
          <table>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          </table>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input name="" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
        </div>
		</div>
		<div id="upload">
        <div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent3">
           <table>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          </table>
          <div class="li_fanye"><dt><a href="#">上一页</a><a href="#" class="li_fanye_now">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">下一页</a></dt><dd><input name="" type="button" value="添加音乐" style="width:100px; height:30px; line-height:30px; text-align:center;"  /></dd></div>
         
        </div>
		</div>
      </div>
      <p>
        <script type="text/javascript">
        function music2_right_detail_selectTag(showContent,selfObj){
            var tag = document.getElementById("music2_right_tags").getElementsByTagName("td");
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
