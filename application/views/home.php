<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Litit</title>
<link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/example2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	document.getElementById("right_1").style.height = document.getElementById("left_1").offsetHeight + "px";
	document.getElementById("left_2").style.height = document.getElementById("right_2").offsetHeight + "px";
</script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>
<script type="text/javascript" src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=" charset="utf-8"></script>
<!--用户登陆检测-->
<script type="text/javascript" src="<?php echo base_url()?>js/jlogin_wrong.js" charset="utf-8"></script>
<!--用户注册检测-->
<script type="text/javascript" src="<?php echo base_url()?>js/jsignup_wrong.js" charset="utf-8"></script>
<script type="text/javascript"> 


	$(document).ready(function(){
    $("#musician-option").hide();
    $("#choose-musician").click(function(){
       $("#musician-option").show();
    });

    $("#choose-audience").click(function(){
       $("#musician-option").hide();
    });
		$(".btn-login").click(function(){
			$(".panel_login").slideToggle("slow");
		});
		$(".play_button").click(function(){
			if ($("#player").get(0).paused) 
			{               
				document.play_button.src="<?php echo base_url()?>image/Pause_Button.png";
				$("#player").get(0).play();            
			}            
			else {                
				document.play_button.src="<?php echo base_url()?>image/Play_Button.png";
				$("#player").get(0).pause();    
			}
		});
		$(".next_song").click(function(){
			    document.play_button.src="<?php echo base_url()?>image/Pause_Button.png";
				document.play_button.src="<?php echo base_url()?>image/Pause_Button.png";
				$("#player").get(0).play();            
		});
		$(".like").click(function(){
			$(".panel_login").slideToggle("slow");
		});
		$("#player").get(0).addEventListener("ended",function(){
			$("#player").get(0).src="<?php echo base_url().$dir?>";
			$("#player").get(0).load();
			$("#player").get(0).play();
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
		$(document).ready(function(){
			$("#home_hover").fadeIn("quick");
		});
		$(".play_button").mouseover(function(){
			$("#play_button_background").css("box-shadow","0 0 60px #ccc");
		});
		$(".play_button").mouseout(function(){
			$("#play_button_background").css("box-shadow","0 0 5px #ccc");
		});
		$(".play_button").mouseout(function(){
			$(".musician_additional_info").slideDown("slow");
		});
		$(document).ready(function(){
			$('#example2').boutique({
				starter:			1,
				speed:				800,
				hoverspeed:			300,
				hovergrowth:		0.15,
				container_width:	655,
				front_img_width:	260,
				front_img_height:	260,
				behind_opac:		1,
				back_opac:			1,
				behind_size:		0.6,
				back_size:			0.4,
				autoplay:			false,
				autointerval:		4000,
				freescroll:			true,
				easing:				'easeOutQuart',
				move_twice_easein:	'easeInQuart',
				move_twice_easeout:	'easeOutQuart',
				text_front_only:	true,
			});
			});
		
	});
</script>
<script>
function changemusic(num){
	switch (num){
		case 0:
			document.getElementById("name").innerHTML="<?php echo $list[0]['name']?>";			
			document.getElementById("story").innerHTML="<?php echo $list[0]['story']?>";
			document.getElementById("player").src="<?php echo base_url().$list[0]['dir']?>";
			break;
		case 1:
			document.getElementById("name").innerHTML="<?php echo $list[1]['name']?>";			
			document.getElementById("story").innerHTML="<?php echo $list[1]['story']?>";			
			document.getElementById("player").src="<?php echo base_url().$list[1]['dir']?>";
			break;	
	}
	document.getElementById("player").load();
	document.getElementById("player").play();
} 
//------------------------------------------------------------
</script>
<script>
/*function submitcheck()
{
  var pwd = document.getElementByName("password").value
  var pwd2 = document.getElementByName("password2").value
  if(pwd!=pwd2){
					document.getElementById("errormessage").innerHTML=“密码不一致”;
					document.getElementById("errormessage").type="input";
					return false;
  } else
  $.ajax({
                type: "POST",
                url: <?php echo site_url('sign_up')?>,
                data: dataString,
  });
  
}*/
function login_check()
{
	var	dataString1;
	var	dataString1
    dataString1=document.getElementById("login_email").value;
    dataString2=document.getElementById("login_password").value;
    
    $.ajax({
                type: "POST",
                url: <?php echo site_url('login')?>,
                data: {dataString1,dataString2},
               //	success:function(data){}
  });
    document.getElementById("errorMessage").style.display="block";
    return;	
}
</script>
</head>

<body>
<div class="music_all">
<div class="all_hover">
	<div id="home_hover">
		
	    <!------------登陆界面------------------>
	    
	    <div class="panel_login">
	    
		<form  name='input' class="infobox-login" action="<?php echo site_url('login')?>" method="post">
	    <input  type="email" name="email" id="login_email" placeholder="邮箱" />
		</br>
		<input type="password" name="password"  id="login_password" placeholder="密码"  />
		</br>
        听众：<input type="radio" checked="checked" name="type" value="1" />
        音乐人：<input type="radio" name="type" value="0" />
        </br>
        </br>
       	<input type="button" class="btn btn-primary" onclick="login_check()"  value="登陆" />
		<!--<input class="btn btn-primary" type="submit" value="登陆" />-->
    	<a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary">注册</a>
		</form>
        	<p class="login_wrong" id="errorMessage">您的用户名和密码不匹配</p>
	     </div>
		<!------------------------------>
		<img class="motto" src="<?php echo base_url()?>image/motto.png">	
		<div id="play_button_background"></div>
		<img class="play_button" name="play_button" src="<?php echo base_url()?>image/Play_Button.png">
		<img class="next_song" src="<?php echo base_url()?>image/Next_Song.png">
		<div id="logo_hover">
			<img src="<?php echo base_url()?>image/music2_logo_hover.png">
			 <button class="demo"></button>
		</div>
	</div>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Litit账号注册</h3>
		</div>
        <form name="input" action="<?php echo site_url('sign_up')?>" method="post">
		<div class="modal-body">
            <div class="choose-line">
				听众：<input id="choose-audience" type="radio" checked="checked" name="type" value="1" />
				音乐人：<input id="choose-musician" type="radio" name="type" value="0" />
				<br/><br/>
			</div>  
			邮箱：*<input type="email"name="email" onkeyup="email_sign_wrong(this.value)" placeholder="邮箱" />
	               <span id="signup_wrong1"></span>
			<br/>
			密码：*<input type="password" name="password" onkeyup="password_sign_wrong(this.value)" placeholder="密码" />
	               <span id="signup_wrong2"></span>
			<br/>
			确认：*<input type="password" name="password2" onkeyup="password2_sign_wrong(this.value,)" placeholder="确认密码" />              
	              <span id="signup_wrong3"></span>
			<br/>		
			<div class="choose-line">
			</div>
      <div id="musician-option">
			姓名：*<input type="text" name="name2" onkeyup="name2_sign_wrong(this.value)" placeholder="姓名" />
	               <span id="signup_wrong4"></span>
			<br/>
			昵称： <input type="text" name="name" placeholder="昵称" />
			<br/>
			生日：  <input type="date" name="birthday"/>
			<br/>
        身份证号:*<input type="text" name="identity" onkeyup="identity_sign_wrong(this.value)" placeholder="身份证号" />
                  <span id="signup_wrong5"></span>
            <br/> 
        介绍：*<input type="text" name="introduction" onkeyup="introduction_sign_wrong(this.value)" placeholder="介绍" />
               <span id="signup_wrong6"></span>
            <br/>
				男：<input type="radio" checked="checked" name="gender" value="1" />
				女：<input type="radio" name="gender" value="0" />
				<br/>
      </div>
      (注：有 * 标记的为必填项)<br/>
    </div>
    <div class="modal-footer">
     <input type="button" onclick="submitcheck()" class="btn btn-primary" value="注册" />
   </div>
 </form>
</form>
</div>

  <div class="music_left">
    <div class="music_left_1">
      <div class="music_left_1_left" id="left_1"><img src="<?php echo base_url().$image_dir?>" /></div>
      <div class="music_left_1_right" id="right_1">
        <div class="music_left_1_right_1" id="name"><b><?php echo $name ?></b></div>
        <div class="music_left_1_right_btm">
			<span><img class="like" name="like" src="<?php echo base_url()?>image/like_button1.png" href="#" class="music_left_1_right_btm_2"></span>
			<span><wb:share-button ></wb:share-button></span>
		</div>
        <div class="music_clear"></div>
        <div class="music_left_1_right_2">
			<audio id="player" controls="controls" >
				<source name="player" src="<?php echo base_url().$dir ?>" type="audio/mp3" preload="load">
				Your browser does not support this audio format.
			</audio>
		</div>
        <div class="music_clear"></div>
        <div class="music_left_1_right_3"><b>歌词：</b><br />
          oh oh, oh oh, So much for my happy ending<br />
          Let's talk this over<br />
          It's not like we're dead<br />
          Was it something I did?<br />
          Was it something You said?<br />
          Don't leave me hanging<br />
          In a city so dead<br />
          Don't leave me hanging<br />
          In a city so dead<br />
          Don't leave me hanging<br />
          In a city so dead<br />
        </div>
        <div class="music_left_1_right_4"><a href="#">我要下载</a><a href="#">版权申请</a></div>
        <div class="music_clear"></div>
      </div>
      <div class="music_clear"></div>
    </div>
    <div class="music_clear"></div>
    <div class="music_left_2" id="left_2">
      <div class="music_left_2_left">
        <div class="music_left_2_left_1">标签</div>
		 <div class="music_left_2_left_2">
		<?php foreach ($tag as $key) echo "<a href=\"#\">".$key."</a>";?>
		</div>
      </div>
      <div class="music_left_2_right">
        <div class="music_left_2_right_1">音乐故事</div>
        <div class="music_left_2_right_2" id="story" ><?php echo $story ?></div>
      </div>
    </div>

	<div class="music_left_3">
			<img src="<?php echo base_url()?>image/music2_logo.png">
			 <button class="demo"></button>
	</div>	

   
  </div>
  <div class="music_right">
  <div class="music_right_1_hover">
    <!--
    <div class="panel_login">
		<form  name='input' class="infobox-login" action="<?php echo site_url('login')?>" method="post">
		邮箱: 
		<input  type="text" name="email" placeholder="邮箱" />
		<span id="login_wrong1"></span>
		</br>
		密码: 
		<input type="password" name="password"  placeholder="密码" />
		<span id="login_wrong2"></span>
		</br>
        听众：<input type="radio" checked="checked" name="type" value="1" />
        音乐人：<input type="radio" name="type" value="0" />
        <br/>
		<input class="btn btn-primary" type="submit" value="登陆" />
		</form>
	</div>
	-->
  </div>
    <div class="music_clear"></div>
    <div class="music_right_2">
      <div class="music_right_2_left" id="left_2">
        <div class="music_right_2_left_1"><b>音乐人介绍</b></div>
          <div class="music_right_2_left_2">
            <div style="text-indent:20px"><?php echo $musician['introduction']?> </div>
            <div class="music_clear"></div>
          </div>
        <div class="music_clear"></div>
      </div>
      <div class="music_right_2_right" id="right_2">
        <div class="music_right_2_right_1">
			<img src="<?php echo base_url().$musician['portaitdir']?>" />
			<div class="music_right_2_right_1_yyr"><b>音乐人：</b><?php echo $musician['nickname']?></div>
		</div>
        <div class="music_clear"></div>
        <div class="music_right_2_right_2">
          <div class="music_right_2_right_3"><a href="#">关注</a><a href="#">私信TA</a></div>
          <div class="music_clear"></div>
          <div class="music_right_2_right_4">人气：<b><?php echo $musician['attention']?></b></div>
          <div class="music_clear"></div>
        </div>
      </div>
      <div class="music_clear"></div>
    </div>
    <div class="music_clear"></div>
    <div class="music_right_3">
     <div id="wrapper">
        <ul id="example2">
		<?php 
		$num=0;
		foreach ($list as $key) {
			echo "<li style=\"cursor:pointer;\"><img class=\"play\" onclick=\"changemusic(".$num.")\"  src=".base_url().$key['album_dir']." /><span class=\"title\">Try Another One</span></li>\n";
			$num++;
		}?>
        </ul>
      </div>
    </div>
    <div class="music_clear"></div>
  </div>
</div>
</div>
</body>
</html>