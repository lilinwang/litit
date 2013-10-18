<!--<?php echo '这是用户信息：';print_r($nickname);?>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人中心</title>


    <!-- css -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/style_personal.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/example2.min.css" rel="stylesheet" type="text/css">


    <!-- javascript global dependencies -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>

    <!-- noty javascript -->
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>

    <!-- ____ javascript -->
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

    <!-- ____ javascript -->
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


    <!-- 上传文件(图片以及音乐) Javascript -->
    <!-- dependencies -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/fileupload/vendor/jquery.ui.widget.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/fileupload/jquery.iframe-transport.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/fileupload/jquery.fileupload.js" ></script>
    <!-- inline script -->
    <script type="text/javascript">
        $(function() {
            'use strict';
            $("#upload-music-button").click(function(){
                $("#fileupload-music").trigger("click");
            });
            $("#upload-music-image-button").click(function(){
                $("#fileupload-music-image").trigger("click");
            });

            // fileupload for user avatar 
            $("#fileupload-avatar").fileupload({
                url: "<?php echo base_url(); ?>index.php/upload_ajax/do_upload_image",
                dataType: 'json',
                done: function(e ,data) {
                    $.each(data.result.files, function (index, file) {
                        if ('error' in file){
                            console.log(file);
                        }
                        else {
                            $("#user-avatar").attr('src', '<?php echo base_url(); ?>' + file.url);
                            window.avatar_url = file.url;
                        }
                    });
                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#upload-image .progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
               
            // fileupload for music image
            $("#fileupload-music-image").fileupload({
                url: "<?php echo base_url(); ?>index.php/upload_ajax/do_upload_image",
                dataType: 'json',
                done: function(e ,data) {
                    $.each(data.result.files, function (index, file) {
                        if ('error' in file){
                            console.log(file);
                        }
                        else {
                            $("#music-image").attr('src', '<?php echo base_url(); ?>' + file.url);
                            window.music_image_url = file.url;
                        }
                    });
                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#upload-image .progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
               
            // fileupload for music
            $("#fileupload-music").fileupload({
                url: "<?php echo base_url(); ?>index.php/upload_ajax/do_upload_music",
                dataType: 'json',
                done: function(e ,data) {
                    $.each(data.result.files, function (index, file) {
                        if ('error' in file){
                            $("#upload-music-status").html(file.error);
                        }
                        else {
                            $("#upload-music-status").html("上传成功啦！撒花！" + file.name);
                            window.music_url = file.url;
                        }
                    });
                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#upload-music-progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    </script>

    <script type="text/javascript">
    $(function(){
        $("#music-upload-ok").click(function(){
            $.post(
                "<?php echo base_url('ajax/upload_music')?>", 
                {
                    musician_id: <?php echo $musician['musician_id'];?>,
                    music_name: $("#music_name").val(),
                    music_url: window.music_url,
                    music_image_url: window.music_image_url,
                    album: $("#music_name").val(),
                    lyrics_by: $("#lyrics_by").val(),
                    composed_by: $("#composed_by").val(),
                    arranged_by: $("#arranged_by").val(),
                    disc_company: $("#disc_company").val(),
                    perform_time: $("#perform_time").val(),
                    genres: $("#genre").val(),
                    tags: $("#custom_tag1").val(),
                    story: $("#story").val(),
                },
                function(data,status){
                    console.log(data);
                    if (data.errno == 0) {
                        alert(data.msg);
                        $("#music_name").val("");
                        $("#music-image").attr("src", "<?php echo base_url('image/public.jpg');?>");
                        $("#upload-music-status").html("");
                        $('#upload-music-progress .progress-bar').css('width',0);
                        $("#lyrics_by").val("");
                        $("#composed_by").val("");
                        $("#arranged_by").val("");
                        $("#disc_company").val("");
                        $("#perform_time").val("");
                        $("#genre").val("");
                        $("#custom_tag1").val("");
                        $("#story").val("");
                    }
                    else {
                        alert(data.errmsg);
                    }
                },
                "json"
            )
        });
    });
	</script>

</head>
<body>

    <!-- _____ javascript -->
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
    </script>
    <audio id="video1">
      <source src="" type="audio/mp3" preload="meta">
      Your browser does not support HTML5 audio.
    </audio>

    <!-- -->
    <div class="music_all">
    <!-- 用户信息修改modal -->  
    <div id="information_Modal1" class="information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <div id="personal_hover">
        <div class="modal-header">
            <h2>
                <?php if($musician['name']!=""):?>
                    <?php echo $musician['name'];?>
                <?php else:?>
                    ? ? ?
                <?php endif;?>
            
            </h2>
        </div>
        <div id="information_left">
            <div class="modal-body">
                <div class="login_wrong" id="signMessage" ></div>
            </div>
                
            <p> <img id="user-avatar" src="<?php echo $check_photo==0 ? base_url().'image/public.jpg':base_url().$musician['portaitdir'];?>" style="width:220px;height:200px;"/></p>
            <div id="select">
                <div id="upload">
                    <input type="file" id="fileupload-avatar" />
                </div>
            <form>
                <div id="queue1"></div> 
            </form>
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
            <input type="password" name="password" id="password" style="width:100px;height:12px;" onfocus="sign_enable()" placeholder="原密码" />
            <input type="password" name="password1" id="password1" style="width:100px;height:12px;" onfocus="sign_enable()" placeholder="新密码" />
            <input type="password" name="password2" id="password2" style="width:100px;height:12px;" onfocus="sign_enable()" placeholder="确认密码" />              
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



    


     <!-- 主页面 --> 
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
        </div>
      </div>
      <input id="pagenum" type="hidden" value=0>
      <input id="totalnum" type="hidden" value=<?php echo(((int)((count($collects)-1)/24))+1);?>>
    </div>
    </div>


    <!-- 上传音乐modal --> 
    <div id="information_Modal2" class="modal hide fade modal-alter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
            <!-- modal header -->
            <div class="modal-header">
                <h2>上传音乐</h2>
                <input type="text" name="music_name" id="music_name" placeholder="音乐名称" />
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <div class="row-fluid">
                    
                    <div class="span4">
                        <div class="">
                            <div class="hide-child">
                                <input type="file" id="fileupload-music" /> 
                            </div>
                            <div id="upload-music-button" class="button">上传音乐文件</div>
                            <div id="upload-music-status"></div>
                            <div id="upload-music-progress"><div class="progress-bar"></div></div>
                        </div>
                        <div class="inline-block">
                            <div id="music-image-wrapper">
                                <img id="music-image" class="img-rounded" 
                                src="<?php echo $check_photo==0 ? base_url().'image/public.jpg':base_url().$musician['portaitdir'];?>"/>
                                <div id="upload-music-image-button">上传该音乐的图片</div>
                            </div>
                            <div class="hide-child">
                                <input type="file" id="fileupload-music-image" />
                            </div>
                        </div>
                    </div>

                    <div class="span8">
                    <div class="row-fluid">
                        <div class="control-line">
                            <label class="control-label">作曲</label>
                            <div class="controls">
                                <input type="text" name="composed_by" id="composed_by"  style="width:120px;height:15px;"  /> 
                            </div>
                            <label class="control-label">作词</label>
                            <div class="controls">
                                <input type="text" name="lyrics_by" id="lyrics_by"  style="width:120px;height:15px;"  /> 
                            </div>
                        </div>
                        <div class="control-line">
                            <label class="control-label">编曲</label>
                            <div class="controls">
                                <input type="text" name="arranged_by" id="arranged_by"  style="width:120px;height:15px;"  /> 
                            </div>
                            <label class="control-label">所属专辑</label>
                            <div class="controls">
                                <input type="text" name="album" id="album"  style="width:120px;height:15px;"  />
                            </div>
                        </div>
                        <div class="control-line">
                            <label class="control-label">唱片公司</label>
                            <div class="controls">
                                 <input type="text" name="disc_company" id="disc_company"  style="width:120px;height:15px;"  /> 
                            </div>
                            <label class="control-label">*演唱时间</label>
                            <div class="controls">
                                <input type="date" style="width:150px;height:15px;" id ="perform_time"  name="perform_time"  />
                            </div>
                        </div>
                        <div class="control-line">
                            <label class="control-label">*音乐风格</label>
                            <div class="controls">
                                <input type="text" name="genre" id="genre"  style="width:120px;height:15px;"  /> 
                            </div>
                        </div>
                        <div class="control-line">
                            <label class="control-label">*自定义标签</label>
                            <div class="controls">
                                <input type="text" name="custom_tag1" id="custom_tag1"  style="width:100px;height:15px;"  />    
                            </div>
                        </div>
                        <div class="control-line">
                            <label class="control-label">歌曲背后的故事</label>
                            <div class="controls">
                                <textarea rows=3 style="width:500px" name="story" id="story"  ></textarea>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>

            <!-- modal footer -->
            <div class="modal-footer">
                <button id="music-upload-ok" class="btn">保存</button>
                <button id="music-upload-cancel" class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
            </div>  

    </div>


</body>
</html>
