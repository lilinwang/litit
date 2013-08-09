<?php session_start();?>
<!--<?php echo '这是音乐信息：';print_r($music);echo '这是相应音乐人信息：';var_dump($id);?>-->
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
	            document.like.src="<?php echo base_url()?>image/like_button1.png"; 
	       });
//<<<<<<< HEAD
	        
		};
		/********************************************************/
//=======
	//	});
		$(".next_song").click(next_song);
		$("#player").bind("ended", next_song);
//>>>>>>> 4239c438521c07e4aef0763ad5e73ccf3d74b14f
		$(".like").click(function(){
	      if(document.like.src=="<?php echo base_url()?>image/like_button1.png")
	       {
	     	$.post("<?php echo base_url('ajax/likemusic')?>", 
			{
             musician_id:<?php echo $musician['musician_id'];?>,
             music_id:<?php echo $music_id ;?>
             },
             function(data,status){
             	 document.getElementById("likemusic").style.left=$('.like').css('left');
             	 document.getElementById("likemusic").style.top="-33px";
             	 document.getElementById("likemusic").style.display="block";
             	 $("p.likemusic").fadeToggle(1000);
			});
			document.like.src="<?php echo base_url()?>image/like_button2.png";
		   }
			
		});
		/********************************************************/
			$(".attention").click(function(){
		$.post("<?php echo base_url('ajax/attention_musician')?>", 
			{
             musician_id:<?php echo $musician['musician_id'];?>,
             music_id:<?php echo $music_id ;?>
             },
             function(data,status){
             	 document.getElementById("attention").innerHTML="人气："+"<b>"+data+"</b>";
                 document.getElementById("musician_attention").style.display="block";
             	 $("p.musician_attention").fadeToggle(1000);
             	 
             	 
			});
			
		});
		/********************************************************/
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
			$('#example2').click(function(){
				document.like.src="<?php echo base_url()?>image/like_button1.png";
			})
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
<!------------------>
</script>
</head>
<body oncontextmenu=window.event.returnValue=false onselectstart=event.returnValue=false ondragstart=window.event.returnValue=false onsource="event.returnValue=false">
<div class="music_all">
<div class="all_hover">
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
		</form>
	</div>
  
  <div class="music_left">
    <div class="music_left_1">
      <div class="music_left_1_left" id="left_1"><img src="<?php echo base_url().$image_dir?>" /></div>
      <div class="music_left_1_right" id="right_1">
         
        <div class="music_left_1_right_1" id="name"><b><?php echo $name ?></b></div>
        <div class="music_left_1_right_btm">
            <p class=likemusic id=likemusic>+1</p>
			<span><img class="like" name="like" src="<?php echo base_url()?>image/like_button1.png" href="#" class="music_left_1_right_btm_2"></span>
			<span><wb:share-button title="litit独立音乐" url='<?php echo site_url("litit.me"); ?>'>
			</wb:share-button></span>
		</div>
        <div class="music_clear"></div>
        <div class="music_left_1_right_2">
			<audio id="player" controls="controls" >
				<source name="player" src="<?php echo base_url().$dir?>" type="audio/mp3" preload="load">
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
        <div class="music_left_1_right_4">
		<a href="#download" role="button" data-toggle="modal">我要下载</a>
		<a href="#">版权申请</a></div>
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
        <div class="music_left_2_right_2" id="story"><?php echo $story?></div>
      </div>
    </div>
	<div class="music_left_3">
			<img src="<?php echo base_url()?>image/music2_logo.png">
			 <button class="demo"></button>
	</div>
  </div>
  <div class="music_right">
	<div class="music_right_1">
	<form name="input" action="<?php echo site_url('logout')?>" method="post">
	<input type="submit" class="btn" value="注销"/>
	</div>
    </form>
	<div class="music_right1">
	<form name="input" action="<?php echo site_url('personal')?>" method="post">
    <input type="submit" class="btn" value="我的Litit"/>
    </form>
	</div>
    <div class="music_clear"></div>
    <div class="music_right_2">
      <div class="music_right_2_left" id="left_2">
        <div class="music_right_2_left_1"><b>音乐人介绍</b></div>
          <div class="music_right_2_left_2">
            <div style="text-indent:20px"><?php echo $musician['introduction']?>  </div>
            <div class="music_clear"></div>
          </div>
        <div class="music_clear"></div>
      </div>
      <div class="music_right_2_right" id="right_2">
        <div class="music_right_2_right_1">
			<img src="<?php echo base_url().$musician['portaitdir']?>" />
			<div class="music_right_2_right_1_yyr">
				<p class=musician_attention id=musician_attention>+1</p>
				<b>音乐人：</b><?php echo $musician['nickname']?>
				</div>
		</div>
        <div class="music_clear"></div>
        <div class="music_right_2_right_2">	
          <div class="music_right_2_right_3">
          	    
          			<a class=attention href="#">关注</a><a href="#">私信TA</a>
          			</div>
          <div class="music_clear"></div>
          <div class="music_right_2_right_4" id=attention>人气：<b ><?php echo $musician['attention']?></b></div>
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
			echo "<li><img class=\"play\" onclick=\"changemusic(".$num.")\" style=\"cursor:pointer;\" src=".base_url().$key['album_dir']." /><span class=\"title\">Try Another One</span></li>\n";
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
