<?php session_start();?>
<!--<?php echo '这是音乐信息：';print_r($music);echo '这是相应音乐人信息：';var_dump($id);?>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Litit</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php echo base_url()?>css/lititRightBar.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/example2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>
<script type="text/javascript" src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/lititRightBarPlugin.js"></script>
<script type="text/javascript"> 
var music_id_html=<?php echo $music_id;?>;
var music_list = "hahahahaha";
var musician_id_html=<?php echo $musician_id;?>;
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
	        $.get("<?php echo base_url('ajax/getmusic')?>", 
             function(data, $status){
	            data = eval("(" + data + ")");
	            var innerHTML = "";
	            console.log(data);
	            music_list = data.list;
	            for(var i = 0; i < data.list.length; i++)
	            {
	            	innerHTML += "<li><img class=\"play\" onclick=\"changemusic(" + i + ")\" style=\"cursor:pointer;\" src=<?php echo base_url()?>" + data.list[i].album_dir + " /><span class=\"title\">Try Another One</span></li>\n";
	            }
	            document.getElementById("example2").innerHTML = innerHTML;
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
		        $("#player source").attr("src","<?php echo base_url()?>"+data.dir);
		        $("#player").get(0).load();
		        $("#player").get(0).play();
		        $("#left_1 img").attr("src","<?php echo base_url()?>"+data.image_dir);
		        $("#name b").html(data.name);
		        $("#story").html(data.story);
                $("#musicianintro").html(data.musician.introduction);
                $("#musicianpt img").attr("src", "<?php echo base_url();?>"+data.musician.portaitdir);
                $("#musiciannick span").html(data.musician.nickname);
                $("#attention_2 b").html(data.musician.attention);
			    document.play_button.src="<?php echo base_url()?>image/Pause_Button.png";
			    music_id_html=data.music_id;
			    musician_id_html=data.musician_id;
			    $.post("<?php echo base_url('ajax/islike_follow')?>", 
		     	{
			    user_id:<?php echo $userid;?>,
                musician_id:data.musician_id,
                music_id:data.music_id ,
				user_type:<?php echo $usertype;?>
                },
                function(data,status){
             	 data = eval("(" + data + ")");        	  
                 if(data.follow==0){	
             	 document.getElementById("attention_1").innerHTML="关注";
             	 }
             	 else{
             	 document.getElementById("attention_1").innerHTML="取消关注";
             	 }
             	 if(data.collect==0){
             	 document.like.src="<?php echo base_url()?>image/like_button1.png";
             	 }
             	 else{
             	 document.like.src="<?php echo base_url()?>image/like_button2.png";	 
             	 } 
	       	     });
	       	  	$.post("<?php echo base_url('ajax/iscopyright_sign')?>", 
			   {
			    user_id:<?php echo $userid;?>,
                 music_id:data.music_id 	 	 
                 },
                function(data,status){
                	if(data==0)
                	{
             	     document.getElementById("copyright").innerHTML="版权申请";
             	     document.getElementById("copyright").href="#myModal";
             	    }
             	    else
             	    {
             	   	document.getElementById("copyright").innerHTML="取消申请";
             	    document.getElementById("copyright").href="#myModal_1";
             	    }
		    	});
	       });
		};	
		$(".next_song").click(next_song);
		$("#player").bind("ended", next_song);
	/********************************************************/		
	  	     $("#no_copyright_sign").click(function(){
	     	$.post("<?php echo base_url('ajax/no_copyright_sign')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:musician_id_html,
             music_id:music_id_html 
             },
             function(data,status){
             	 document.getElementById("copyright").innerHTML="版权申请";
             	 document.getElementById("copyright").href="#myModal";
             	 alert("提交成功，已经取消您的申请");
			});
   	     })
	/********************************************************/
		$(".like").click(function(){
	      if(document.like.src=="<?php echo base_url()?>image/like_button1.png")
	       {
	     	$.post("<?php echo base_url('ajax/likemusic')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:musician_id_html,
             music_id:music_id_html,
			 user_type:<?php echo $usertype;?>
             },
             function(data,status){
             	 document.getElementById("likemusic").style.left=$('.like').css('left');
             	 document.getElementById("likemusic").style.top="-33px";
             	 document.getElementById("likemusic").style.display="block";
             	 $("p.likemusic").fadeToggle(1000);
			});
			document.like.src="<?php echo base_url()?>image/like_button2.png";
		   }
		    else
		   {
		   	$.post("<?php echo base_url('ajax/no_likemusic')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:musician_id_html,
             music_id:music_id_html,
			 user_type:<?php echo $usertype;?>
             },
             function(data,status){
             	 document.getElementById("no_likemusic").style.left=$('.like').css('left');
             	 document.getElementById("no_likemusic").style.top="-33px";
             	 document.getElementById("no_likemusic").style.display="block";
             	 $("p.no_likemusic").fadeToggle(1000);
			});
			document.like.src="<?php echo base_url()?>image/like_button1.png";
		   }
			
		});
		/********************************************************/
			$(".attention").click(function(){
				if(document.getElementById("attention_1").innerHTML=="关注")
				{
	     	$.post("<?php echo base_url('ajax/attention_musician')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:musician_id_html,
             music_id:music_id_html,
			 user_type:<?php echo $usertype;?>
             },
             function(data,status){
             	 document.getElementById("attention_2").innerHTML="人气："+"<b>"+data+"</b>";
             	 document.getElementById("attention_1").innerHTML="取消关注";
                 document.getElementById("musician_attention").style.display="block";
             	 $("p.musician_attention").fadeToggle(1000);
           	});
	          }
	         else
	          {
	          $.post("<?php echo base_url('ajax/no_attention_musician')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:musician_id_html,
             music_id:music_id_html,
			 user_type:<?php echo $usertype;?>
             },
             function(data,status){
             	 document.getElementById("attention_2").innerHTML="人气："+"<b>"+data+"</b>";
             	 document.getElementById("attention_1").innerHTML="关注";
                 document.getElementById("no_musician_attention").style.display="block";
             	 $("p.no_musician_attention").fadeToggle(1000);
           	});	  
	          }
			
		});
		/********************************************************/
		$("#player").get(0).addEventListener("ended",function(){
			$("#player").get(0).src="<?php echo base_url().$dir?>";
			$("#player").get(0).load();
			$("#player").get(0).play();
		});

		$(".demo").click(function(){
			function generate(layout) {
				var push_interva = 10000;
				if(!$("#home_hover").is(":visible")) {
					$.post("<?php echo base_url('ajax/get_message_push')?>", 
						{
							user_id:<?php echo $userid;?>,
							musician_id:musician_id_html,
							user_type:<?php echo $usertype;?>
						},
						function(data, status){
							if(! status == 'success' ){
								return;
							}
							data = eval("(" + data + ")");
							if(! data.status == 'success' ){
								return;
							}
							var n = noty({
								text: data.label + ' : <a href="' + data.url + '">' + data.brief + '</a>',
								type: 'alert',
								dismissQueue: true,
								layout: layout,
								theme: 'defaultTheme'
							});
							// Close after 'duration' ms.
							var duration = 5000;
							setTimeout(function() {
								$.noty.close(n.options.id);
							}, duration);
						}
					);
				}else{
					push_interva = 5000;
				}
				// Pop up after 'interval' ms.
				setTimeout(function() {
					generate('topCenter');
				}, push_interva);
			}
			if(!$("#home_hover").is(":visible")) { 			// The hover is not visible when the click is triggered.										
				$.noty.closeAll();							// Thus all visible notys should be closed.
			}
			if(typeof noty.alreadySet === "undefined"){		// Avoid repetition of noty alert.
				noty.alreadySet = 1;
				generate('topCenter');
			}
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
	document.getElementById("name").innerHTML=music_list[num].name;			
	document.getElementById("story").innerHTML=music_list[num].story;
	document.getElementById("player").src=music_list[num].dir;
	music_id_html=music_list[num].music_id;
	musician_id_html=music_list[num].musician_id;	
	$.post("<?php echo base_url('ajax/islike_follow')?>", 
		{
			user_id:<?php echo $userid;?>,
			musician_id:music_list[num].musician_id,
			music_id:music_list[num].music_id,
			user_type:<?php echo $usertype;?>
		},
		function(data,status){
			data = eval("(" + data + ")");
			if(data.follow==0){	
				document.getElementById("attention_1").innerHTML="关注";
			}
			else{
				document.getElementById("attention_1").innerHTML="取消关注";
			}        	  
			if(data.collect==0){
				document.like.src="<?php echo base_url()?>image/like_button1.png";
			}
			else{
				document.like.src="<?php echo base_url()?>image/like_button2.png";	 
			} 
		});
	$.post("<?php echo base_url('ajax/iscopyright_sign')?>", 
		{
			user_id:<?php echo $userid;?>,
			music_id:music_list[num].music_id 	 	 
		},
		function(data,status){
			if(data==0){
				document.getElementById("copyright").innerHTML="版权申请";
				document.getElementById("copyright").href="#myModal";
			}
			else{
				document.getElementById("copyright").innerHTML="取消申请";
				document.getElementById("copyright").href="#myModal_1";
			}
		});
	document.getElementById("player").load();
	document.getElementById("player").play();
} 
	/********************************************************/
		function copyright_sign(){
	     	$.post("<?php echo base_url('ajax/copyright_sign')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:<?php echo $musician['musician_id'];?>,
             music_id:<?php echo $music_id ;?>,
          	  name:document.getElementById("copyright_sign_name").value,	 
             company:document.getElementById("copyright_sign_company").value,
             identity:document.getElementById("copyright_sign_identity").value,
             email:document.getElementById("copyright_sign_email").value,
             phone:document.getElementById("copyright_sign_phone").value,
             content:document.getElementById("copyright_sign_content").value 	 	 
             },
             function(data,status){
             	 document.getElementById("copyright").innerHTML="取消申请";
             	 document.getElementById("copyright").href="#myModal_1";
             	 alert("提交成功，音乐人会通过电话或邮件回复您");
			});
		};

	/********************************************************/
function copyright_sign_check()
{ 
	var	dataString;
	dataString=document.getElementById("copyright_sign_name").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "姓名不能为空";?>";document.getElementById("copyright_sign").disabled=true;return;}

    dataString=document.getElementById("copyright_sign_company").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "公司名称不能为空";?>";document.getElementById("copyright_sign").disabled=true;return;}

	dataString=document.getElementById("copyright_sign_identity").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "身份证号不能为空";?>";document.getElementById("copyright_sign").disabled=true;return;}
	if(!((dataString.length==15) && (dataString.search(/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/)==-1) || (dataString.length==18)&&(dataString.search(/^[0-9]{17}([0-9]|X)$/)!=-1)))
	{document.getElementById("signMessage").innerHTML="<?php echo "身份证号不合法";?>";document.getElementById("copyright_sign").disabled=true;return;}
		
    dataString=document.getElementById("copyright_sign_email").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "邮箱不能为空";?>";document.getElementById("copyright_sign").disabled=true;return;}
	if (dataString.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
	{document.getElementById("signMessage").innerHTML="<?php echo "邮箱格式错误";?>";document.getElementById("copyright_sign").disabled=true;return;}
	
    dataString=document.getElementById("copyright_sign_phone").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "联系电话不能为空";?>";document.getElementById("copyright_sign").disabled=true;return;}
	if (dataString.length<5)
	{document.getElementById("signMessage").innerHTML="<?php echo "联系电话长度太短";?>";document.getElementById("copyright_sign").disabled=true;return;}

	dataString=document.getElementById("copyright_sign_content").value;
	if (dataString=="") {document.getElementById("signMessage").innerHTML="<?php echo "请求内容不能为空";?>";document.getElementById("copyright_sign").disabled=true;return;}
	document.getElementById("copyright_sign").disabled=false;
	copyright_sign();return;
}
function copyright_sign_enable(){
document.getElementById("copyright_sign").disabled=false;
}
<!------------------>
</script>
<script>
$(function() {
    lititRbar = lititRightBarPlugin("#Rbar")
        .setDefaultImg("<?php echo base_url()?>image/li_play.png")
        .load([//载入数据
            {"img":"<?php echo base_url()?>image/music2_15.jpg","text":"album1's intro","href":"/1"},
            {"img":"<?php echo base_url()?>image/music2_16.jpg","text":"album2's intro","href":"/2"},
            {"img":"<?php echo base_url()?>image/music2_17.jpg","text":"album3's introduction","href":"/3"},
            {"img":"<?php echo base_url()?>image/music2_11.jpg","text":"album4's intro","href":"/4"},
            {"text":"album5's intro","href":"/5"},
            {"img":"<?php echo base_url()?>image/music2_15.jpg","text":"album1's intro","href":"/1"},
            {"img":"<?php echo base_url()?>image/music2_16.jpg","text":"album2's intro","href":"/2"},
            {"img":"<?php echo base_url()?>image/music2_17.jpg","text":"album3's intro","href":"/3"},
            {"img":"<?php echo base_url()?>image/music2_11.jpg","text":"album4's intro","href":"/4"},
            {"text":"album5's intro","href":"/5"}
            ])
        .locate({"position":"absolute","right":0,"top":0,"bottom":0})//对rightBar重新定位
        .itemClick(function(){
                    var href = $(this).attr("href");
                    if(href=="undefined")return;
                    if(this.hrefMode=="_blank")
                        window.open(href);
                    else
                        location.href=href;
                });
        //.display("slideLeft");


    $('#home_search_input').blur(function() {
        $('#home_search_input').animate({"width":0},300, "linear", function(){
            $(this).hide();
        });
    });
});
function show_home_search() {
    $('#home_search_input').show().animate({"width":400},300);
    $("#home_search_input").focus();
}
</script>
</head>
<body >
<div class="music_all">
<div class="all_hover">
	<div id="home_hover">		
        <div id="home_nav">
            <a href="<?php echo base_url('personal'); ?>"><i class="icon-home icon-white"></i></a>
            <a href="#" onclick="lititRbar.display('slideLeft');"><i class="icon-heart icon-white"></i></a>
            <a href="#" onclick=""><i class="icon-signal icon-white"></i></a>
            <a href="#" onclick="show_home_search();"><i class="icon-search icon-white"></i></a>
            <div id="home_search">
                <input id="home_search_input" type="text">
            </div>
        </div>
		<div id="Rbar"></div>
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
		
	</div>
  
  <div class="music_left">
    <div class="music_left_1">
      <div class="music_left_1_left" id="left_1"><img src="<?php echo base_url().$image_dir?>" /></div>
      <div class="music_left_1_right" id="right_1">
         
        <div class="music_left_1_right_1" id="name"><b><?php echo $name ?></b></div>
        <div class="music_left_1_right_btm">
            <p class=likemusic id=likemusic>+1</p>
            <p class=no_likemusic id=no_likemusic>-1</p>
            <?php if($collect==0):?>
			<span><img class="like" name="like" src="<?php echo base_url()?>image/like_button1.png" href="#" class="music_left_1_right_btm_2"></span>
			<?php else:?>
			<span><img class="like" name="like" src="<?php echo base_url()?>image/like_button2.png" href="#" class="music_left_1_right_btm_2"></span>
			<?php endif;?>
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
		<?php if($copyright==0):?>
		<a href="#myModal" role="button" data-toggle="modal" class="copyright" id="copyright" >版权申请</a>		
		<?php else:?>
	    <a 	href="#myModal_1" role="button" data-toggle="modal" class="copyright" id="copyright" >取消申请</a>
		<?php endif;?>
		</div>
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
	<!------------------------------------------------------------------------------>		
			
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
            <div id="musicianintro" style="text-indent:20px"><?php echo $musician['introduction']?>  </div>
            <div class="music_clear"></div>
          </div>
        <div class="music_clear"></div>
      </div>
      <div class="music_right_2_right" id="right_2">
        <div class="music_right_2_right_1" id="musicianpt">
			<img src="<?php echo base_url().$musician['portaitdir']?>" />
			<div class="music_right_2_right_1_yyr" id="musiciannick" >
				<p class=musician_attention id=musician_attention>+1</p>
			    <p class=no_musician_attention id=no_musician_attention>-1</p>
				<b>音乐人：</b><span><?php echo $musician['nickname']?></span>
				</div>
		</div>
        <div class="music_clear"></div>
        <div class="music_right_2_right_2">	
          <div class="music_right_2_right_3">
          	        <?php if($follow==0):?>
          			<a class=attention id=attention_1 href="#">关注</a>
          	        <?php else:?>
          	        <a class=attention id=attention_1 href="#">取消关注</a>
          	        <?php endif;?>
          			<a href="#">私信TA</a>
          			</div>
          <div class="music_clear"></div>
          <div class="music_right_2_right_4" id="attention_2">人气：<b ><?php echo $musician['attention']?></b></div>
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
