<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <title>Litit</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- css -->
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
    <!--<script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script> -->
    <!-- <script type="text/javascript" src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=" charset="utf-8"></script> -->
    <!--<script type="text/javascript" src="<?php echo base_url()?>js/jQuery-1.7.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jQuery.textSlider.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.SuperSlide.2.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.SuperSlide.2.1.source.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/view.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>css/website.css" type="text/css" media="screen"/>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.tinyscrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/cufon.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/website.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui-1.10.3.custom.min.js"></script>
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
	/* 
 * 去掉面纱
 * by 徐佳琛
 * 
 * 1.$('.demo').click 直接注册到这个函数
 * 2.点击RBar中的音乐后会调用这个函数
 *
 */
function demo_click() {
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
		}//);
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
			    $.get("<?php echo base_url('ajax/play_song')?>", 
						{
							user_id:<?php echo $userid;?>,
							music_id:music_id_html 	 	 
						});
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
             	 document.getElementById("like").style.display="inline-block";
             	 document.getElementById("like_on").style.display="none";
             	 }
             	 else{
             	 document.getElementById("like").style.display="none";
             	 document.getElementById("like_on").style.display="inline-block";	 
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
		function skip_song()
		{
			$.get("<?php echo base_url('ajax/skip_song')?>", 
					{
						user_id:<?php echo $userid;?>,
						music_id:music_id_html 	 	 
					});
			next_song();
		};
		$(".next_song").click(skip_song);
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
	     	$.post("<?php echo base_url('ajax/likemusic')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:musician_id_html,
             music_id:music_id_html,
			 user_type:<?php echo $usertype;?>
             },
             function(data,status){
             	 document.getElementById("likemusic").style.left=$('.like').css('left');
             	 document.getElementById("likemusic").style.top="155px";
             	 document.getElementById("likemusic").style.left="210px";
             	 document.getElementById("likemusic").style.display="block";
             	 $("p.likemusic").fadeToggle(1000);
			});
			document.getElementById("like_on").style.display="inline-block";
			document.getElementById("like").style.display="none";
            
		   });
			$(".like_on").click(function(){
		   	$.post("<?php echo base_url('ajax/no_likemusic')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:musician_id_html,
             music_id:music_id_html,
			 user_type:<?php echo $usertype;?>
             },
             function(data,status){
                 console.log(data);//wll merge
             	 document.getElementById("no_likemusic").style.left=$('.like').css('left');
             	 document.getElementById("no_likemusic").style.top="155px";
             	 document.getElementById("no_likemusic").style.left="210px";
             	 document.getElementById("no_likemusic").style.display="block";
             	 $("p.no_likemusic").fadeToggle(1000);
			});
			document.getElementById("like").style.display="inline-block";
            document.getElementById("like_on").style.display="none";
			
		});
		/********************************************************/
			$("#attention_1").click(function(){
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
             	 document.getElementById("musician_attention").style.top="0px";
             	 document.getElementById("musician_attention").style.right="0px";
                 document.getElementById("musician_attention").style.display="block";
             	 $("#musician_attention").fadeToggle(1000);
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
             	 document.getElementById("no_musician_attention").style.top="0px";
             	 document.getElementById("no_musician_attention").style.right="0px";
                 document.getElementById("no_musician_attention").style.display="block";
             	 $("#no_musician_attention").fadeToggle(1000);
           	});	  
	          }
			
		});
		/********************************************************/
		$("#player").get(0).addEventListener("ended",function(){
			$("#player").get(0).src="<?php echo base_url().$dir?>";
			$("#player").get(0).load();
			$("#player").get(0).play();
		});
                
		$(".demo").bind('click', demo_click);
	
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
function changemusic(num){
	document.getElementById("name").innerHTML=music_list[num].name;			
	document.getElementById("story").innerHTML=music_list[num].story;
	document.getElementById("player").src=music_list[num].dir;
	$.get("<?php echo base_url('ajax/skip_song')?>", 
			{
				user_id:<?php echo $userid;?>,
				music_id:music_id_html 	 	 
			});
	music_id_html=music_list[num].music_id;
	musician_id_html=music_list[num].musician_id;	
	$.get("<?php echo base_url('ajax/play_song')?>", 
			{
				user_id:<?php echo $userid;?>,
				music_id:music_id_html 	 	 
			});
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
			if(data.collect!=0){
				document.like.class="like_on";	 
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
//******************************************************************/
function private_letter_sign()
{
				var myDate = new Date();
             	 var tmp1=myDate.getMonth()+1;
             	 var tmp='\n'+myDate.getFullYear()+"-"+tmp1+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes()+":"+myDate.getSeconds()+'\n';
          	    var tmp_content=tmp+document.getElementById("usernickname").innerHTML+":"+document.getElementById("private_letter_content").value;
		$.post("<?php echo base_url('ajax/private_letter_sign')?>", 
			{
			 user_id:<?php echo $userid;?>,
             musician_id:<?php echo $musician['musician_id'];?>,
             content:tmp_content	 	 
             },
             function(data,status){
             	 alert("发送成功！");
			});	
};
function private_letter_check()
{
	var	dataString;
	dataString=document.getElementById("private_letter_content").value;
	if (dataString=="") {document.getElementById("private_letter_Message").innerHTML="<?php echo "私信内容不能为空";?>";document.getElementById("private_letter_sign").disabled=true;return;}
	document.getElementById("private_letter_sign").disabled=false;
	private_letter_sign();return;
}
function private_letter_enable(){
document.getElementById("private_letter_sign").disabled=false;
}
/*
 * Rbar 插件
 */
$(function() {
    lititRbar = lititRightBarPlugin("#Rbar")
        .setDefaultImg("<?php echo base_url()?>image/li_play.png")
        .load(
                <?php
                $collect_array = array();
                foreach ($collections as $music) {
                    $item['img'] = $music['image_dir'];
                    $item['text'] = $music['name'];
                    $item['href'] = 'javascript:play_collection(' . $music['music_id'] . ');';
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
  
});

/*
 * 播放收藏的音乐
 * by 徐佳琛
 *
 * 直接copy的next_song中的代码，做了三件事
 * 1.改变杂志页的信息
 * 2.播放音乐
 * 3.去掉面纱
 *
 * 在Rbar中点击音乐的时候调用
 *
 */
function play_collection(music_id) {
    // change magazine page, and play the music
    $.post(
        "<?php echo base_url('ajax/get_music_by_id')?>", 
        {
            music_id: music_id
        },
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
                container_width:	400,
                front_img_width:	150,
                front_img_height:	150,
                behind_opac:		1,
                back_opac:			1,
                behind_size:		0.7,
                back_size:			0.5,
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
             document.like.class="like";
             }
             else{
             document.like.class="like_on";	 
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

    // 去掉面纱
    demo_click();
}
/*
 * toggle首页的搜索框
 ＊by 徐佳琛
 *
 * 1.注册搜索框的blur事件，搜索框失去焦点之后隐藏
 * 2.定义show_home_search函数，点击收藏中的音乐时直接调用
 *
 */
 
 </script>
 <script type="text/javascript">
$(function(){
    $('#mask-search-input').blur(function() {
        $('#mask-search-input').animate({"width":0},300, "linear", function(){
            $(this).hide();
        });
    });   

});

function show_home_search() {
    $('#mask-search-input').show().animate({"width":400},300);
    $("#mask-search-input").focus();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
/*
    $("#scrolldiv").textSlider({line:1,speed:500,timer:3000});
	
	 var myCanvas = document.getElementById("myCanvas");  
    if (!myCanvas.getContext){
			 $("#html5").css({display : 'none'});
			 $("#html5txt").css({display : 'block'})
     }  
 */
});
</script>


    <!-- 控件 -->
    <script type="text/javascript">
        // 登陆和注册的tab
        $(function() {
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
        });
        
    
        <?php if($this->session->userdata('is_logged_in')): ?>
        // 点亮按钮,登陆的时候才出现 
        $(function(){
            $("#light-button").click(function(){
                $("#container-mask").hide();
                $("#container-main").removeClass("mask-blur");
            });
        });
        <?php endif; ?>
        
        
    </script>
</head>
<body >
    <!--判断浏览器是否支持html5标签-->
    <canvas id="myCanvas" width="300" height="200" style=" display:none;"></canvas>
    <div id="html5txt"  style="display:none">555~您的浏览器版本已经旧了，请升级到最新版本！</div>
    
    <!-- logo -->
    <div id="container-logo">
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
                        <input type="submit" value="登陆">
                    </form>
                </div>
                <div id="sign-up-form-outer">
                    <form id="sign-up-form" action="<?php echo base_url('sign_up');?>" method="post" class="hover-form">
                        <input placeholder="邮箱" type="text" id="sign-up-email" name="email">
                        <input placeholder="密码" type="password" id="sign-up-password" name="password">
                        <input placeholder="密码确认" type="password" id="sign-up-password-confirm" name="password_confirm">
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
    
    <!-- 面纱 -->
    <div id="container-mask">
    		
    	<div id="mask-top">
        	<div id="mask-nav">
        	    <a href="<?php echo base_url('personal'); ?>"><i class="icon-home icon-white"></i></a>
        	    <a href="#" onclick="lititRbar.display('slideLeft');"><i class="icon-heart icon-white"></i></a>
        	    <a href="#" onclick=""><i class="icon-signal icon-white"></i></a>
        	    <a href="#" onclick="show_home_search();"><i class="icon-search icon-white"></i></a>
        	    <div id="mask-search">
        	        <input id="mask-search-input" type="text">
        	    </div>
        	</div>
    	</div>
        
		<div id="Rbar"></div>
		
		<div id="mask-center">
		    <div id="mask-motto">
		    </div>
		    <div id="mask-play"></div>
		</div>
	</div>
	
	
	<!-- 主页面 -->
    <div id="container-main" class="mask-blur">
        <!-- 顶部导航 -->
        <header class="header">
     	    <span class="user"><?php echo $user['name']?>的Litit</span> 
     	</header>
     	
     	<!-- 正文内容 -->
        <article>
            <!-- 左侧-->
            <section class="left">
                <div id="music-player-outer">
                    <div class="row-fluid"> 
                        <div id="music-image-outer" class="">
                            <img src="<?php echo base_url().$music['image_dir']?>" />
                        </div>
                        <div id="music-image-sidebar" class="">
                            <div id="music-name">
                                <?php echo substr($music['name'],0,21); ?>
                            </div>
                            <div id="music-controls">
                                <!--
                               <p class="likemusic" id="likemusic">+1</p>
                                <p class="no_likemusic" id="no_likemusic">-1</p>
                                -->
                                <span id="like-button" class="icon-heart icon-large music-control-button"></span>
                                <span id="share-button" class="icon-share icon-large music-control-button"></span>
                                <!--
                                <?php if($music['is_collect']==0):?>
                            	<span class="like" id="like"style="display:inline-block"></span>
                            	<span class="like_on" id="like_on" style="display:none"></span>
                            	<?php else:?>
                            	<span class="like_on" id="like_on" style="display:inline-block"></span>
                            	<span class="like" id="like" style="display:none"></span>
                            	<?php endif;?>
                            	-->
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
                                <span id="volume" class="">
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
        				    <source name="player" src="<?php echo base_url().$music['dir']?>" type="audio/mp3" preload="load">
        				Your browser does not support this audio format.
        			    </audio>
                    </div>
        		  
                    <div class="row-fluid"> 
                        <span class="ico_pause"></span> <span class="ico_next"></span> <span class="ico_sound"></span>
                        <?php if($music['is_copyright_sign']==0):?>
            		    <a href="#myModal" class="button" type="button" data-toggle="modal" class="copyright" id="copyright" >版权申请</a>		
            		    <?php else:?>
            	        <a href="#myModal_1" class="" type="button" data-toggle="modal" class="copyright" id="copyright" >取消申请</a>
            		    <?php endif;?>
            		    <button type="button" id="music_lyric_btn">歌词</button>
                        <button type="button" id="music_story_btn" style="display:none">音乐故事</button>
                        <a href="#download" type="button" data-toggle="modal">下载</a>
                    </div>
                </div>
              
                <div class="music-text-outer">
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
                         <div class="p-txt"><?php echo $music['story']?></div>
                         <div class="music_lyric" id="music_lyric">
                            <pre>Chill out whatcha yelling for
                    Lay back it's all been done before
                    And if you could only let it be
                    You will see
                    I like you the way you are
                    When we're driving in your car
                    And you're talking to me one on </pre>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="tag"><?php foreach ($tag as $key) echo "<span><a href=\"#\">".$key."</a><span>";?></div> -->
            </section>
          	
          	<!-----------------------center--------------------------------->
          	 <section class="center">
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
            <div class="txt">
              <p><?php echo $musician['introduction']?></p>
                </div>
                <div class="album">
              <div class="list"> <span><?php echo $musician['nickname']?>的歌曲列表</span>
                <div class="txtScroll-top">
                    <div class="bd">
                      <ul class="infoList">
                       	<!-- <li><a href="#" class="current" target="_blank">1. 追梦赤子心</a></li>
                        <li><a href="#" target="_blank">2. Keep holding on</a></li>
                        <li><a href="#" target="_blank">3. 追梦赤子心</a></li>
                        <li><a href="#" target="_blank">4. 其他~</a></li>
                        <li><a href="#" target="_blank">5. 其他~</a></li>
                        <li><a href="#" target="_blank">6. 其他~</a></li>-->
                	<?php 
        	        	$num=0;
        	        	foreach ($musician['all_music'] as $key) {
        			    echo "<li onclick=\"changemusic(".$num.")\"><a herf=\"#\" target=\"_blank\">".($num+1).".".substr($key['name'],0,16)."</li>\n";
        		    	$num++;
        		    	if($num==6)break;
        	        	}?>
                      </ul>
                    </div>
                    <div class="hd"> <a class="prev"></a> <a class="next"></a> </div>
                  </div>
                  <!--
                  <script type="text/javascript">
        		jQuery(".txtScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:false,vis:3});
        		</script>
        		--> 
                
              </div>
            </div>
            <div class="list-activity">
              <h3><?php echo $musician['nickname']?>的活动</h3>
               <div id="scrolldiv">
              <div class="scrolltext">
              <ul>
              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
              <li><span class="la-left"><a href="#">同济大学一二九大礼堂演出</a></span> <span class="la-right">11月01号 周六19:00-21:00   同济大学一二九礼堂</span></li>
               </ul>
              </div>
              <button type="button" class="up" ></button>
              <button type="button" class="down"></button>
            </div>
            		   </div>
          </section>
          	 <section class="right">
            <div><a href="#"><img src="<?php echo base_url().$musician['portaitdir']?>" width="204" height="204" /></a></div>
            <h1 id="musiciannick"><?php echo $musician['nickname']?></h1>
            <div class="attention"id="attention_2">人气<b ><?php echo $musician['attention']?></b>	
            </div>
            <div class="musician_attention" id="musician_attention">+1</div>
        	<div class="no_musician_attention" id="no_musician_attention">-1</div>
            <div  class="btncss">
            <?php if($music['is_follow']==0):?>
            <button class="attention"  id="attention_1">关注</button>
            <?php else:?>
             <button class="attention"  id="attention_1">取消关注</button>
             <?php endif;?>
            <button href="#private_letter"  data-toggle="modal" class="private_letter" id="private_letter" >私信TA</button>		
            </div>
            <div  class="txt">
              <p>hi!</p>
            </div>
            <div class="owner"> <a href="#">上海交通大学主页</a> <a href="#"> <span>微博主页</span> <img src="<?php echo base_url()?>image/r_weibo.png" width="19" height="16" /></a> </div>
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
<script type="text/javascript">
    
    // 播放控件
    $(function(){
        $('#player-audio').hide();
        //audio = new Audio();
        //audio.src = "<?php echo $music['dir']; ?>";
        
        // get html elements
        audio = $('#player-audio').get(0);
        
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
                var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
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
        
        // bind play, pause and ended
        $(audio).bind('play',function() {
            $("#play-toggle").find("#icon-to-change").removeClass("icon-play").addClass("icon-pause");		
        }).bind('pause ended', function() {
            $("#play-toggle").find("#icon-to-change").removeClass("icon-pause").addClass("icon-play");	
        });
        		
        $("#play-toggle").click(function() {			
            if (audio.paused) { audio.play(); } 
            else { audio.pause(); }			
        });
    });
    
</script>