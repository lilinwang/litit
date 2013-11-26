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
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>
<script type="text/javascript" src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=" charset="utf-8"></script>

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
	function next_song(){
	        $.get("<?php echo base_url('ajax/getmusic')?>", function(data, $status){
	            data = eval ("(" + data + ")");
		        $("#player source").attr("src","<?php echo base_url()?>"+data.dir);
		        $("#player").get(0).load();
		        $("#player").get(0).play();
		        $("#left_1 img").attr("src","<?php echo base_url()?>"+data.image_dir);
		        $("#name b").html(data.name);
		        $("#story").html(data.story);
                $("#musicianintro").html(data.musician.introduction);
                $("#musicianpt").attr("src", "<?php echo base_url();?>"+data.musician.portaitdir);
                $("#musiciannick span").html(data.musician.nickname);
                $("#musicianatt span").html(data.musician.attention);
			    document.play_button.src="<?php echo base_url()?>image/Pause_Button.png";
	        });
		};
		$(".next_song").click(next_song());
		$("#player").bind("ended", next_song());
		
		$(".like").click(function(){
			$(".panel_login").slideToggle("slow");
		});
		$("#player").get(0).addEventListener("ended",function(){
			$("#player").get(0).src="<?php echo base_url().$dir?>";
			$("#player").get(0).load();
			$("#player").get(0).play();
		});             
		/*$(".demo").click(function(){
			$("#home_hover").fadeToggle("quick");
			if ($("#player").get(0).paused) 
			{               
				document.play_button.src="<?php echo base_url()?>image/Play_Button.png";         
			}            
			else {                
				document.play_button.src="<?php echo base_url()?>image/Pause_Button.png";
			}
		});*/
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

function login_check()
{
	var	dataString;
    dataString=document.getElementById("login_email").value;
	if (dataString=="") {document.getElementById("errorMessage").innerHTML="<?php echo "邮箱不能为空";?>";document.getElementById("login").disabled=true;return;}
	if (dataString.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
	{document.getElementById("errorMessage").innerHTML="<?php echo "邮箱格式错误";?>";document.getElementById("login").disabled=true;return;}
	//document.getElementById("errorMessage").innerHTML="<?php echo "";?>"; 

    dataString=document.getElementById("login_password").value;
	if (dataString=="") {document.getElementById("errorMessage").innerHTML="<?php echo "密码不能为空";?>";document.getElementById("login").disabled=true;return;}
	if ((dataString.length>12) || (dataString.length<8))
	{document.getElementById("errorMessage").innerHTML="<?php echo "密码长度为8-12位";?>";document.getElementById("login").disabled=true;return;}
	document.getElementById("login").disabled=false;return;
}
function sign_check()
{   
	var	dataString;
    dataString=document.getElementById("sign_email").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "邮箱不能为空";?>";document.getElementById("sign").disabled=true;return;}
	if (dataString.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
	{document.getElementById("signMessage").innerHTML="<?php echo "邮箱格式错误";?>";document.getElementById("sign").disabled=true;return;}
	
    dataString=document.getElementById("sign_password").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "密码不能为空";?>";document.getElementById("sign").disabled=true;return;}
	if ((dataString.length>12) || (dataString.length<8))
	{document.getElementById("signMessage").innerHTML="<?php echo "密码长度为8-12位";?>";document.getElementById("sign").disabled=true;return;}
	
	dataString=document.getElementById("sign_password2").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "请再次输入密码";?>";document.getElementById("sign").disabled=true;return;}
	if ((dataString.length>12) || (dataString.length<8))
	{document.getElementById("signMessage").innerHTML="<?php echo "两次密码长度都为8-12位";?>";document.getElementById("sign").disabled=true;return;}
	if (document.getElementById("sign_password2").value!=dataString) 
	{document.getElementById("signMessage").innerHTML="<?php echo "两次的密码不一致";?>"; document.getElementById("sign").disabled=true;return;}
	
	if (document.getElementById("choose-audience").checked==0){
	dataString=document.getElementById("sign_name").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "姓名不能为空";?>";document.getElementById("sign").disabled=true;return;}
	
	dataString=document.getElementById("sign_id").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "身份证号不能为空";?>";document.getElementById("sign").disabled=true;return;}
	if(!((dataString.length==15) && (dataString.search(/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/)==-1) || (dataString.length==18)&&(dataString.search(/^[0-9]{17}([0-9]|X)$/)!=-1)))
	{document.getElementById("signMessage").innerHTML="<?php echo "身份证号不合法";?>";document.getElementById("sign").disabled=true;return;}
	
	dataString=document.getElementById("sign_intro").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "介绍不能为空";?>";document.getElementById("sign").disabled=true;return;}
	}
	document.getElementById("sign").disabled=false;return;
}
function login_enable(){document.getElementById("login").disabled=false;}
function sign_enable(){document.getElementById("sign").disabled=false;}

</script>
</head>
<body >
<div class="music_all">
<!--所有的悬浮在表面的页面，包括黑色面纱，注册登录页面-->
<div class="all_hover">
	<!--所有的悬浮在表面的页面，包括黑色面纱，注册登录页面-->
	<div id="home_hover">
		
	    <!------------登陆界面------------------>
	    
	    <div class="panel_login">
	    <p class="login_wrong" id="errorMessage"><?php echo $message;?></p>
		<form  name='input' class="infobox-login" action="<?php echo site_url('login')?>" method="post">
	    <input  type="email" name="email" id="login_email" onfocus="login_enable()" placeholder="邮箱" />
		</br>
		<input type="password" name="password"  id="login_password" onfocus="login_enable()" placeholder="密码"  />
		</br>
        听众：<input type="radio" checked="checked" name="usertype" value="1" />
        音乐人：<input type="radio" name="usertype" value="0" />
        </br>
        </br>
       <!--	<input type="button" class="btn btn-primary"  value="登陆" />-->
		<input class="btn btn-primary" type="submit" id="login" onclick="login_check()" value="登陆" />
    	<a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary">注册</a>
		</form>
        
	     </div>
		<!------------------------------>
		<img class="motto" src="<?php echo base_url()?>image/motto.png">	
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
			<div class="login_wrong" id="signMessage" ></div>
            <div class="choose-line">
				听众：<input id="choose-audience" type="radio" checked="checked" name="usertype" value="1" />
				音乐人：<input id="choose-musician" type="radio" name="usertype" value="0" />
				<br/><br/>
			</div>  
			邮箱：*<input type="email" name="email" id="sign_email" onfocus="sign_enable()" placeholder="邮箱" />
			<br/>
			密码：*<input type="password" name="password" id="sign_password" onfocus="sign_enable()" placeholder="密码" />
			<br/>
			确认：*<input type="password" name="password2" id="sign_password2" onfocus="sign_enable()" placeholder="确认密码" />              
			<br/>		

      <div id="musician-option">
			姓名：*<input type="text" name="name2" id="sign_name" onfocus="sign_enable()" placeholder="姓名" />
			<br/>
			昵称： <input type="text" name="name"  placeholder="昵称" />
			<br/>
			生日：  <input type="date" name="birthday" />
			<br/>
        身份证号:*<input type="text" name="identity" id="sign_id" onfocus="sign_enable()" placeholder="身份证号" />
            <br/> 
        介绍：*<input type="text" name="introduction" id="sign_intro" onfocus="sign_enable()" placeholder="介绍" />
            <br/>
				男：<input type="radio" checked="checked" name="gender" value="1" />
				女：<input type="radio" name="gender" value="0" />
				<br/>
      </div>
      (注：有 * 标记的为必填项)<br/>
    </div>
    <div class="modal-footer">
     <input type="submit" onclick="sign_check()" id="sign" class="btn btn-primary" value="注册" />
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
			<span><wb:share-button title="litit独立音乐" url='<?php echo site_url("litit.me"); ?>'>
			</wb:share-button></span>
		</div>
        <div class="music_clear"></div>
        <div class="music_left_1_right_2">
			<audio id="player" controls="controls">
				<source name="player" src="<?php echo base_url().$dir ?>" type="audio/mp3" preload="auto">
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
  </div>
    <div class="music_clear"></div>
    <div class="music_right_2">
      <div class="music_right_2_left" id="left_2">
        <div class="music_right_2_left_1"><b>音乐人介绍</b></div>
          <div class="music_right_2_left_2">
            <div style="text-indent:20px" id="musicianintro"><?php echo $musician['introduction']?> </div>
            <div class="music_clear"></div>
          </div>
        <div class="music_clear"></div>
      </div>
      <div class="music_right_2_right" id="right_2">
        <div class="music_right_2_right_1">
			<img id="musicianpt" src="<?php echo base_url().$musician['portaitdir']?>" />
			<div id="musiciannick" class="music_right_2_right_1_yyr"><b>音乐人：</b><span><?php echo $musician['nickname']?></span></div>
		</div>
        <div class="music_clear"></div>
        <div class="music_right_2_right_2">
          <div class="music_right_2_right_3"><a href="#">关注</a><a href="#">私信TA</a></div>
          <div class="music_clear"></div>
          <div id="musicianatt" class="music_right_2_right_4">人气：<b><span><?php echo $musician['attention']?></span></b></div>
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
