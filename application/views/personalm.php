<!--<?php echo '这是用户信息：';?>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/style_personal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/example2.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>css/uploadify.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js" ></script>

<script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>js/ajaxfileupload.js"></script>		
<script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>


		
<script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>

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
				case "2": document.getElementById("totalnum").value=<?php echo(((int)((count($downloads)-1)/24))+1);?>;break;
				case "3": document.getElementById("totalnum").value=<?php echo(((int)((count($uploads)-1)/24))+1);?>;
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

	 $("#personal_information").click(function(){
	 	 if(document.getElementById("information_Modal2").style.display==block)
	 	 {
	 	 	 document.getElementById("information_Modal2").style.display==none;
	 	 }
	 });

		//用户修改信息
	 $("#save").click(function(){
	     	$.post("<?php echo base_url('ajax/information_change')?>", 
			{
			 id:<?php echo $musician['musician_id'];?>,
			 type:<?php echo $usertype;?>,
             name:document.getElementById("name").value,
             nickname:document.getElementById("nickname").value,
             gender:document.getElementById("gender").value,
             birthday:document.getElementById("birthday").value,
             identity:document.getElementById("identity").value,
             self_intro:document.getElementById("introduction").value
             },
             function(data,status){
             	 alert("提交成功，您的个人信息已修改！");
			});
   	     })
   	//用户修改密码
   	$("#password_change").click(function(){
   			$.post("<?php echo base_url('ajax/password_change')?>", 
			{
			 id:<?php echo $musician['musician_id'];?>,
			 type:<?php echo $usertype;?>,
             password:document.getElementById("password").value,
             password1:document.getElementById("password1").value,
             password2:document.getElementById("password2").value
             },
             function(data,status){
             	 document.getElementById("password1").value="";
             	 document.getElementById("password2").value="";
             	 if(data==1) 
             	 {
             	 document.getElementById("password").value="";
             	 alert("密码错误，请重新输入！");
             	 }
             	 if(data==2) 
             	 {    	 
             	 alert("两次密码不一致！");
             	 }
             	  if(data==3) 
             	 {    	 
             	 alert("密码位数应大于等于8位");
             	 }
             	 if(data==4) 
             	 {
             	 document.getElementById("password").value="";
             	 alert("密码已修改！");
             	 }
			});

   	     })
   	 	//个人照片上传
   	   $("#button_upload").click(function(){
                $.ajaxFileUpload
                     (
                       	{
                            url:'<?php echo base_url('index.php/upload/upload_image')?>', //你处理上传文件的服务端
                            secureuri:true,
                            fileElementId:'userfile',
                            dataType: 'json',
                            data:
                            {
                            	id:<?php echo $musician['musician_id'];?>,
			                    type:<?php echo $usertype;?>
                            },
                            success: function (data, status)
							{   
								if(typeof(data.error) != 'undefined')
								{
									if(data.error != '')
								{
									alert(data.error);
								}else
								{
									alert(data.msg);
								}
							}
						},
						error: function (data, status, e)
						{
							alert(e);
						}
           	 		}
            	     )
                       return false;
   			}) 
   	//音乐和音乐照片上传
   	 $("#uploadfile").click(function(){
                $.ajaxFileUpload
                     (
                       	{
                            url:'<?php echo base_url('index.php/upload/upload_music')?>', //你处理上传文件的服务端
                            secureuri:true,
                            fileElementId:['userfile1','userfile2'],
                            dataType: 'json',
                            data:
                            {
                            	musician_id:<?php echo $musician['musician_id'];?>,
			                    song_writer:document.getElementById("songwriter").value,
			                    musicby:document.getElementById("musicby").value,
			                    arrangement:document.getElementById("arrangement").value,
			                    disc_company:document.getElementById("disc_company").value,
			                    perform_time:document.getElementById("perform_time").value,
			                    style:document.getElementById("style").value,
			                    story:document.getElementById("story").value
                            },
                            success: function (data, status)
							{   
								if(typeof(data.error) != 'undefined')
								{
									if(data.error != '')
								{
									alert(data.error);
								}else
								{
									alert(data.msg);
								}
							}
						},
						error: function (data, status, e)
						{
							alert(e);
						}
           	 		}
            	     )
                       return false;
   			}) 
//申请版权信息更新		
   	$("#sendmessage").click(function(){
   				var myDate = new Date();
             	 var tmp1=myDate.getMonth()+1;
             	 var tmp='\n'+myDate.getFullYear()+"-"+tmp1+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes()+":"+myDate.getSeconds()+'\n';
          	     document.getElementById("story_message").value+=tmp+document.getElementById("musician_name").innerHTML+":"+document.getElementById("send_message").value;
	     	$.post("<?php echo base_url('ajax/copyright_message')?>", 
			{
			 message:document.getElementById("story_message").value,
			 copyright_id:document.getElementById("copyright_id").innerHTML
             },
             function(data,status){
             	 document.getElementById("send_message").value="";
             	 alert("信息已发送！");
			});
   	     })			
   				
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
	
$(function(){
	$(".li_play_1").hover(function(){
		$(this).find(".li_play").show();
	},function(){
		$(this).find(".li_play").hide();
	});
}); 
</script>

<!--上传文件--><!--	
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(document).ready(function()
{
		$('#file_upload1').uploadify({
			'formData'     : 
			{
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
			},
			'swf'      : '<?php echo base_url()?>uploadify/uploadify.swf',
			'uploader' : '<?php echo base_url()?>uploadify/uploadify.php/upload_music',
			'onComplete': callback
		});
		$('#file_upload2').uploadify({
			'formData'     : 
			{
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
			},
			'swf'      : '<?php echo base_url()?>uploadify/uploadify.swf',
			'uploader' : '<?php echo base_url()?>uploadify/uploadify.php/upload_image',
			'onComplete': callback
		});
});
function callback(event, queueID, fileObj, response, data) {
        if (response != "") {
            alert(response + "成功上传!");
        }
        else {
            alert("文件上传出错!");
        }
}
</script>-->
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
  function constellation()
   	 {
	     	$.post("<?php echo base_url('ajax/check_constellation')?>", 
			{
             birthday:document.getElementById("birthday").value
             },
             function(data,status){
             	 document.getElementById("constellation").innerHTML="星座："+data;
			});
   	  }
   function li_id(object)
   	  {
   	      alert(1);
   	  	  var tmp=object.id;  	  				
   	  	  	$.post("<?php echo base_url('ajax/copyright_click');?>", 
			{
			 copyright_id:<?php echo $copyrights[$_POST['click_id']]['copyright_id']; ?>,
			 name_message:<?php echo $copyrights[$_POST['click_id']]['name']; ?>,
			 phone_message:<?php echo $copyrights[$_POST['click_id']]['phone']; ?>	 
			 email_message:<?php echo $copyrights[$_POST['click_id']]['email']; ?>
			 company_message:<?php echo $copyrights[$_POST['click_id']]['company']; ?>,
			 copyright_time:<?php echo $copyrights[$_POST['click_id']]['created']; ?>,
			 copyright_info:申请名字为《<?php echo $copyrights[$_POST['click_id']]['music_name']; ?>》的音乐的版权，音乐编号为<?php echo $copyrights[$_POST['click_id']]['music_id']; ?>,
			 copyright_content:<?php echo $copyrights[$_POST['click_id']]['content']; ?>,
			 story_message:<?php echo $copyrights[$_POST['click_id']]['copyright_message']; ?>
			 	 
             },
             function(data,status){
             	 data = eval("(" + data + ")");
             	document.getElementById("copyright_id").innerHTML=data.copyright_id;
             	document.getElementById("name_message").innerHTML="姓名"+data.name_message;
             	document.getElementById("phone_message").innerHTML="电话"+data.phone_message;
             	document.getElementById("email_message").innerHTML="邮箱"+data.email_message;
             	document.getElementById("company_message").innerHTML="公司"+data.company_message;
             	document.getElementById("copyright_time").innerHTML="申请时间"+data.copyright_time;
             	document.getElementById("copyright_info").innerHTML=data.copyright_info;
             	document.getElementById("copyright_content").innerHTML=data.copyright_content;
             	document.getElementById("story_message").innerHTML=data.story_message;
			});

   	  	  
   	  }   	
</script>
<audio id="video1">
  <source src="" type="audio/mp3" preload="meta">
  Your browser does not support HTML5 audio.
</audio>

<!------------------>
<div class="music_all">
<!------------------------用户信息修改界面------------------------------->	
	<div id="information_Modal1" class="information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
    	<div id="personal_hover">
		<div class="modal-header">
		<h2>
				<?php if($musician['name']!=""):?>
		   <div id="musician_name"> <?php echo $musician['name'];?></div>
				<?php else:?>
			? ? ?
				<?php endif;?>
		
	   	</h2>
		</div>
		<div id="information_left">
		<div class="modal-body">
			<div class="login_wrong" id="signMessage" ></div>
			</div>
				<?php if(!$check_photo):?>
			<p><img src="<?php echo base_url().'image/public.jpg'?>"style="width:220px;height:200px;"/></p>
				<?php else:?>
			<p>	<img src="<?php echo base_url().$musician['portaitdir']?>" style="width:220px;height:200px;"/>	</p>
				<?php endif;?>
		<div id="select">
			<form>
		    <div id="queue2"></div> 
	        <p><input id="userfile" name="userfile"  style="height:25px;"type="file" multiple="true" /><p>
        	</form>
        	<div id="upload">
	     	<input type="button" id="button_upload"  style="width:50px;height:25px;"value="上传" />
            </div>
        </div>
			<!-- -->
		    <p> 修改密码<br/></p>
			<div id="information_left_1">
			
			<p>
				原密码：
				<br/><br/>
				新密码：
				<br/><br/>
		    	确认密码：
		    	<br/>		    	
			</p>
			</div>
			<div id="information_left_2">
			<p>
			<input type="password" name="password" id="password" style="width:100px;height:12px;" placeholder="原密码" />
			<input type="password" name="password1" id="password1" style="width:100px;height:12px;"  placeholder="新密码" />
			<input type="password" name="password2" id="password2" style="width:100px;height:12px;"  placeholder="确认密码" />              
			<br/>
			<input type="submit" id="password_change" class="btn" value="确认" />
			</p>
			</div>	
      </div>
      <div id="information_right">
      	  <br/><br/>
			邮箱：<?php echo $musician['email'];?>
			<br/>
			<br/>
			<br/>
		身份证号：<input type="text" name="identity" id="identity"  style="width:150px" value=<?php echo $musician['identity'];?> />
			<br/>
			<br/>
		姓名：<input type="text" name="name" id="name"  style="width:100px" value=<?php echo $musician['name'];?> />
		  	&nbsp;&nbsp;&nbsp;&nbsp;
		昵称：<input type="text" name="nickname" id="nickname"  style="width:100px" value=<?php echo $musician['nickname'];?> /> 
		  <br/><br/>
		性别：<select style='width:100px' id="gender" name="gender" >  
          <option value=<?php echo $musician['gender'];?>>
            <?php if($musician['gender']==1):?>
			男
			<?php elseif($musician['gender']==0):?>
			女
			<?php else:?>
			保密
			<?php endif;?>
            </option>  
          <?php if($musician['gender']!=1):?>
          <option value="1">男</option> 
          <?php endif;?> 
          <?php if($musician['gender']!=0):?>
          <option value="0">女</option> 
          <?php endif;?> 
          <?php if($musician['gender']!=-1):?>
          <option value="-1">保密</option> 
          <?php endif;?>   
          </select>  
       	&nbsp;&nbsp;&nbsp;&nbsp;
      破壳日：<input type="date" style="width:150px" id ="birthday" onblur=constellation() name="birthday" value=<?php echo $musician['birthday'];?> />
		  	<br/>
		  	<br/> 
        <p id=constellation>星座：<?php echo $constellation;?><p>
          <br/> 
           
       自我介绍
        	<br/> 
        	<br/> 
       	<textarea rows=4 style="width:700px" name="introduction" id="introduction"  ><?php echo $musician['introduction'];?></textarea>
            <br/>   
    </div>
    <div id="head_foot">
     <input type="submit" id="save" class="btn" value="保存" />
     <input type="submit" id="exit" data-dismiss="modal" aria-hidden="true"class="btn" value="退出" />
    </div>	
</div>
    </div>
 <!----------上传音乐-------------> 
 <div id="information_Modal2" class="information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
    	<div id="personal_hover">
		<div class="modal-header">
		<h2>	
        <p>*专曲名：<input type="text" name="music_name" id="music_name"  style="width:150px；hight:15px"  /></p>		
	   	</h2>
		</div>
		<div id="information_left">
		<div class="modal-body">
			<div class="login_wrong" id="signMessage" ></div>
			</div>
			<p>	<img src="<?php echo base_url().'image/public.jpg'?>"style="width:220px;height:200px;"/></p>
	        <div id="select1">
	        <form>
		    <div id="queue2"></div> 
	     	<p><input id="userfile2" name="userfile2"  type="file" multiple="true" /></p>
        	</form>
			</div>
      </div>
      <div id="information_right">
		所属专辑：<input type="text" name="album" id="album"  style="width:120px;height:15px;"  />
		  <br/>
		词作者：<input type="text" name="songwriter" id="songwriter"  style="width:120px;height:15px;"  /> 
		 	&nbsp;&nbsp;&nbsp;&nbsp;
	    曲作者：<input type="text" name="musicby" id="musicby"  style="width:120px;height:15px;"  /> 
			&nbsp;&nbsp;&nbsp;&nbsp;
	    编曲：<input type="text" name="arrangement" id="arrangement"  style="width:120px;height:15px;"  /> 
		<br/>
	     唱片公司：<input type="text" name="disc_company" id="disc_company"  style="width:120px;height:15px;"  /> 
			<br/>
		*演唱时间：<input type="date" style="width:150px;height:15px;" id ="perform_time"  name="perform_time"  />
		  	<br/>
        *音乐风格：<input type="text" name="style" id="style"  style="width:120px;height:15px;"  /> 
          <br/> 
         *自定义标签：<input type="text" name="custom_tag1" id="custom_tag1"  style="width:100px;height:15px;"  />    
          <input type="text" name="custom_tag2" id="custom_tag2"  style="width:100px;height:15px;"  />
          <input type="text" name="custom_tag3" id="custom_tag3"  style="width:100px;height:15px;"  />
          <input type="text" name="custom_tag4" id="custom_tag4"  style="width:100px;height:15px;"  />
          <input type="text" name="custom_tag5" id="custom_tag5"  style="width:100px;height:15px;"  />
          <br/> <br/> 
            <form>
         *上传音乐文件：<input type="file" name="userfile1" id="userfile1"  style="width:300px;height:20px;" multiple="true" />
	    	<br/>
	    	</form>	
	    歌曲背后的故事：
        	<br/><br/> 
       	<textarea rows=3 style="width:700px" name="story" id="story"  ></textarea>
            <br/>   
	    </div>
    <div id="head_foot">
     <input type="submit" id="uploadfile" class="btn" value="上传" />
     <input type="submit" id="exit" data-dismiss="modal" aria-hidden="true"class="btn" value="退出" />
    </div>	
</div>
    </div>
 <!-------版权申请信息----------------> 
  <div id="message" class="information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
    	<div id="personal_hover">
		<div class="modal-header">
		<h2>	
        <p>版权申请</p>		
	   	</h2>
		</div>
		<div id="message_left">
		 <div style="display:none;"><p id ="copyright_id"  name="copyright_id"/><?php echo $copyrights[0]['copyright_id']; ?> </p></div>
		 <p name="name_message" id="name_message">姓名：<?php echo $copyrights[0]['name']; ?> </p> 
		 <p name="phone_message" id="phone_message"/>电话：<?php echo $copyrights[0]['phone']; ?> </p> 
		 <p name="email_message" id="email_message" /> 邮箱：<?php echo $copyrights[0]['email']; ?> </p>
		 <p name="company_message" id="company_message"/> 公司：<?php echo $copyrights[0]['company']; ?> </p>
    	 <p id ="copyright_time"  name="copyright_time"/>申请时间：<?php echo $copyrights[0]['created']; ?> </p>
        申请信息：<br/><br/> 
        <textarea  rows="3" id="copyright_info"/>申请名字为《<?php echo $copyrights[0]['music_name']; ?>》的音乐的版权，音乐编号为<?php echo $copyrights[0]['music_id']; ?></textarea>
        <br/> 
        申请说明：<br/><br/>
        <textarea rows="5" id="copyright_content"/> <?php echo $copyrights[0]['content']; ?></textarea>
 
       	</div>
      <div id="information_right">
	    历史消息：
        <br/><br/> 
       	<textarea rows=7 style="width:500px" name="story_message" id="story_message"  ><?php echo $copyrights[0]['copyright_message']; ?></textarea>
        <br/><br/> <br/> <br/> 
        发送消息：
        <br/><br/> 
       	<textarea rows=3 style="width:500px" name="send_message" id="send_message"  ></textarea>
        <br/>  
	    </div>
    <div id="head_foot">
     <input type="submit" id="sendmessage" class="btn" value="发送" />
     <input type="submit" id="messagexit" data-dismiss="modal" aria-hidden="true"class="btn" value="退出" />
    </div>	
</div>
    </div>
 <!-----------------------> 
 	 <div class="music2_right">
    <div class="music2_right_1">
    <form name="input" action="<?php echo site_url('home')?>" method="post">
	<input type="submit" class="btn" value="返回首页"/>
    </form>
    </div>
    <div class="music_right_1">
    <a href="#information_Modal1" role="button" data-toggle="modal" class="btn" id="personal_information" >个人信息</a>
    </div>
	<div class="music_right1">
	<a href="#information_Modal2" role="button" data-toggle="modal" class="btn" id="musicupload" >上传音乐</a>
	</div>
	<ul id="music2_right_tags" >
        <li class="music2_right_detail_selectTag"><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent0',this)" href="javascript:void(0)">收藏的歌曲</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent1',this)" href="javascript:void(0)">关注的音乐人</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent2',this)" href="javascript:void(0)">下载的音乐</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent3',this)" href="javascript:void(0)">上传的歌曲</a> </li>
        <li><a onclick="music2_right_detail_selectTag('music2_right_detail_tagContent4',this)" href="javascript:void(0)">版权申请</a> </li>
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
		<?php for ($i=1;$i<(((int)((count($downloads)-1)/24))+1);$i++):?>
        <li id="<?php echo $i;?>"><a onclick="page_selectTag(<?php echo $i;?>,this)" href="javascript:void(0)"></a> </li>
		<?php endfor;?>
		</ul>
		<a  class="next" href="#"></a>
		</div>
		
		<div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent3">
         <ul class="li_play_0">
		  <?php if (count($uploads)>0){$num=(((int)((count($uploads)-1)/24))+1)*24;$i=0;while ($i<$num) {foreach ($uploads as $upload):$i++; if ($i>$num) break;?>
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
<!-------------------------------------------------------->			
		<div class="music2_right_detail_tagContent" id="music2_right_detail_tagContent4">
         <ul class="li_play_0">
		    <?php if (count($copyrights)>0){$num=(((int)((count($copyrights)-1)/24))+1)*24;$i=0;while ($i<$num) {foreach ($copyrights as $copyright):$i++; if ($i>$num) break;?>
		  <li id="<?php echo ($i-1)%count($copyrights)?>" onclick=li_id(this)>
              <div class="li_play_1"><a href="#message" data-toggle="modal" id="user_image"><img src="<?php echo base_url().$copyright['user_image']?>" /></a>
                <div class="li_play" style="display:none;">
                  <dl class="li_play_left">
                    <dt class="li_play_left_1"><?php echo $copyright['name'];?></dt>
                    <dt class="li_play_left_2"><?php echo $copyright['company'];?></dt>
                  </dl>
                  <dl class="li_play_right">
                    <a href="#"><img src="<?php echo base_url()?>image/li_play.png"/></a>
                  </dl>
                </div>
              </div>
		  </li>
		  <?php  endforeach;}}?>
		</ul>
		<a  class="prev" href="#"></a>
		<ul id="page">
		<li id="0" class="page_selectTag"><a onclick="page_selectTag(0,this)" href="javascript:void(0)"></a> </li>
		<?php for ($i=1;$i<(((int)((count($copyrights)-1)/24))+1);$i++):?>
        <li id="<?php echo $i;?>"><a onclick="page_selectTag(<?php echo $i;?>,this)" href="javascript:void(0)"></a> </li>
		<?php endfor;?>
		</ul>
		<a  class="next" href="#"></a>
		</div>
<!--------------------------------------------------------->						
    </div>
  </div>
  <input id="pagenum" type="hidden" value=0>
  <input id="totalnum" type="hidden" value=<?php echo(((int)((count($collects)-1)/24))+1);?>>
</div>
</div>
</body>
</html>
