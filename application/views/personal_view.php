<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人中心</title>
    <!-- css -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/icon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/personal.css" rel="stylesheet" type="text/css" />

    <!-- javascript global dependencies -->
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>

    <!-- noty javascript -->
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/jquery.noty.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/layouts/topCenter.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/noty/themes/default.js"></script>

    <!-- ____ javascript -->
    <script type="text/javascript">
    /*
    $(document).ready(function(){
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
    });
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
    //申请版权信息更新      
    $("#sendmessage").click(function(){
                var myDate = new Date();
                 var tmp1=myDate.getMonth()+1;
                 var tmp='\n'+myDate.getFullYear()+"-"+tmp1+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes()+":"+myDate.getSeconds()+'\n';
                 var tmp_time=myDate.getFullYear()+"-"+tmp1+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes()+":"+myDate.getSeconds();
                 document.getElementById("story_message").value+=tmp+document.getElementById("copyright_nick_name").innerHTML+":"+document.getElementById("send_message").value;
            $.post("<?php echo base_url('ajax/copyrightm_message')?>", 
            {
             message:document.getElementById("story_message").value,
             copyright_id:document.getElementById("copyright_id").innerHTML,
             copyright_music_id:document.getElementById("copyright_music_id").innerHTML,
             copyright_musician_id:document.getElementById("copyright_musician_id").innerHTML,
             copyright_user_id:document.getElementById("copyright_user_id").innerHTML,
             new_time:tmp_time
             },
             function(data,status){
                 document.getElementById("send_message").value="";
                 alert("信息已发送！");
            });
    })  
        $("#sendletter").click(function(){ 
                var myDate = new Date();
                 var tmp1=myDate.getMonth()+1;
                 var tmp='\n'+myDate.getFullYear()+"-"+tmp1+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes()+":"+myDate.getSeconds()+'\n';
                 var tmp_time=myDate.getFullYear()+"-"+tmp1+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes()+":"+myDate.getSeconds();
                document.getElementById("story_letter").value+=tmp+document.getElementById("letter_nick_name").innerHTML+":"+document.getElementById("send_letter").value;
                 
            $.post("<?php echo base_url('ajax/privatem_letter')?>", 
            {
             letter:document.getElementById("story_letter").value,
             letter_id:document.getElementById("letter_id").innerHTML,
             letter_musician_id:document.getElementById("letter_musician_id").innerHTML,
             letter_user_id:document.getElementById("letter_user_id").innerHTML,
             new_time:tmp_time
             },
             function(data,status){
                 document.getElementById("send_letter").value="";
                 alert("信息已发送！");
            });
         })     
         */
    </script>
    
    <!-- 控件 -->
    <script type="text/javascript">
        $(function(){
            // 标签控件
            $(".global-tab").on('click', function(){
                $('.global-tab').removeClass("global-tab-active");
                $(this).addClass("global-tab-active");
                $(".global-tab-content").hide();
                $(".global-tab-content[for=" + $(this).attr("for") + "]").show();
            });
            // 默认显示收藏的音乐
            $(".global-tab-content[for=collects]").show();
            
            // 方块流控件
            $(".global-tab-content").on("hover", ".square-block", function(){
                $(this).find(".square-block-hoverer").toggle();
            });
            
            // 播放音乐
            $(".global-tab-content").on("click", ".play-button", function(){
                window.opener.player.play_now($(this).attr("mid"));
            });
        });
    </script>
    
    <!-- ajax 读取内容函数 -->
    <script type="text/javascript">
    
        // 绑定tab点击事件
        $(function() { 
            $(".global-tab").bind('click', function(){
                load_tab_content($(this).attr("for"));
            });
        });
        
        // 读取tab内容
        function load_tab_content(tab_for) {
            $.post(
                "<?php echo base_url('ajax/personal_load_tab'); ?>",
                {"tab_for": tab_for},
                function(data, status){
                    if (data) {
                        change_tab_content(tab_for, data);
                    }
                    else {
                    }
                },
                "json"
            );
        }
        
        // 改变tab内容
        function change_tab_content(tab_for, data) {
            $(".global-tab-content[for="+tab_for+"]").html("");
            
            html = '';
            if (tab_for == 'collects') {
                for(i in data) {
                    html += generate_square_block(data[i].image_dir, data[i].name);
                }
            }
            else if (tab_for == 'follows') {
                for(i in data) {
                    html += generate_square_block(data[i].portaitdir, data[i].name);
                }
            }
            else if (tab_for == 'downloads') {
                for(i in data) {
                    html += generate_square_block(data[i].portaitdir, data[i].name);
                }
            }
            else if (tab_for == 'uploads') {
                for(i in data) {
                    html += generate_square_block(data[i].image_dir, data[i].name);
                }
            }
            else if (tab_for == 'copyrights') {
                for(i in data) {
                    html += generate_square_block('#', data[i].name);
                }
            }
            else if (tab_for == 'private_letter') {
                for(i in data) {
                    html += generate_square_block('#', data[i].name);
                }
            }
            
            $(".global-tab-content[for="+tab_for+"]").html(html);
        }
        
        // 生成方块流控件的方块html
        function generate_square_block(bg_url, text) {
            str = 
            '<div class="square-block">' + 
                 '<img class="square-block-bg" src="' + bg_url + '" >' + 
                 '<div class="square-block-hoverer">' + text + '</div>' +
            '</div>';
            return str; 
        }
            
    </script>

    <!-- 上传文件(图片以及音乐)使用的插件 Javascript -->
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
            $("#upload-avatar-button").click(function(){
                $("#fileupload-avatar").trigger("click");
            });

            // fileupload for user avatar 
            $("#fileupload-avatar").fileupload({
                url: "<?php echo base_url(); ?>index.php/upload_ajax/do_upload_image",
                dataType: 'json',
                done: function(e ,data) {
                    $.each(data.result.files, function (index, file) {
                        if ('error' in file){
                            //console.log(file);
                        }
                        else {
                            $.post(
                                "<?php echo base_url('ajax/change_avatar') ?>",
                                {
                                    musician_id: <?php echo $user_id; ?>,
                                    url: file.url
                                },
                                function(data, success){
                                    if (data.errno == 0) {
                                        $("#user-avatar").attr('src', '<?php echo base_url(); ?>' + data.url);
                                    }
                                    else {
                                        alert(data.errmsg);
                                    }
                                },
                                "json"
                            );
                        }
                    });
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
                            //console.log(file.error);
                        }
                        else {
                            $("#music-image").attr('src', '<?php echo base_url(); ?>' + file.url);
                            window.music_image_url = file.url;
                        }
                    });
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
               
            // fileupload for music
            $("#fileupload-music").fileupload({
                url: "<?php echo base_url(); ?>index.php/upload_ajax/do_upload_music",
                dataType: 'json',
                add: function(e, data) {
                    $("#upload-music-status").html("");
                    $("#upload-music-status").show();
                    $("#upload-music-progress .progress-bar").css("width", 0);
                    $("#upload-music-progress").show();
                    data.submit();
                },
                done: function(e ,data) {
                    $.each(data.result.files, function (index, file) {
                        if ('error' in file){
                            $("#upload-music-status").html(file.error);
                        }
                        else {
                            $("#upload-music-status").html("上传音乐成功！" + file.name);
                            window.music_url = file.url;
                            setTimeout(function(){
                                    //$("#upload-music-status").hide();
                                    $("#upload-music-progress").fadeOut();
                                },
                                2000
                            );
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

    <!-- 上传音乐 javascript -->
    <script type="text/javascript">
    $(function(){
        // 绑定 上传 按钮
        $("#music-upload-ok").click(function(){
            $.post(
                "<?php echo base_url('ajax/upload_music')?>", 
                {
                    musician_id: <?php echo $user_id;?>,
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
                    if (data.errno == 0) {
                        alert(data.msg);
                        $("#music_name").val("");
                        $("#music-image").attr("src", "<?php echo base_url('image/public.jpg');?>");
                        $("#upload-music-status").html("");
                        $('#upload-music-progress .progress-bar').css('width',0);
                        $("#album").val("");
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

    <!-- 主页面 -->
    <div id="container">
    
        <!-- 顶部导航栏 -->
        <div id="global-header">
            <!--<div id="header-left">
                <a href="<?php echo base_url(); ?>" role="button" class="btn">
                    返回首页
                </a>
            </div>-->
            <div id="header-right">
                <a href="#upload-music-modal" role="button" data-toggle="modal" class="btn" >
                    上传歌曲
                </a>
                <a href="#user-info-modal" role="button" data-toggle="modal" class="btn" >
                    个人信息
                </a>
            </div>
        </div>
        
        <!-- 页面主要内容 -->
        <div id="global-main">
            <div id="global-tabs">
                <div id="global-tabs">
                    <div class="global-tab" for="collects">收藏的音乐</div>
                    <div class="global-tab" for="follows">关注的音乐人</div>
                    <div class="global-tab" for="downloads">下载的音乐</div>
                    <div class="global-tab" for="uploads">上传的音乐</div>
                    <div class="global-tab" for="copyrights">版权申请</div>
                    <div class="global-tab" for="private_letters">私信</div>
                </div>
            </div>
            <div id="global-tab-contents">
                <div class="global-tab-content" for="collects">
                    <div class="square-stream-outer">
                        <?php foreach($collects as $collect): ?>
                        <div class="square-block">
                            <img class="square-block-bg" src="<?php echo base_url($collect['image_dir']); ?>" >
                            <div class="square-block-hoverer">
                                <span class="music-name"><?php echo $collect['name']; ?></span>
                                <span class="icon-stack play-button" mid="<?php echo $collect['music_id']; ?>">
                                    <i class="icon-circle-blank icon-stack-base"></i>
                                    <i id="icon-to-change" class="icon-play"></i>
                                </span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="global-tab-content" for="follows"></div>
                <div class="global-tab-content" for="downloads"></div>
                <?php if($user_type == '0'): ?>
                <div class="global-tab-content" for="uploads"></div>
                <?php endif; ?>
                <div class="global-tab-content" for="copyrights"></div>
                <div class="global-tab-content" for="private_letters"></div>
            </div>
        </div>
    </div>

    <!-- 用户信息修改modal -->  
    <div id="user-info-modal" class="modal hide fade modal-alter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <!-- modal header -->
        <div class="modal-header">
            <h2>个人信息修改</h2>
        </div>

        <!-- modal body -->
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span4">
                    <div class="row-fluid">
                        <div class="image-uploader">
                            <img id="user-avatar" src="<?php echo empty($user['portaitdir']) ? base_url().'image/public.jpg':base_url().$user['portaitdir'];?>"/>
                            <div id="upload-avatar-button" class="image-upload-button"></div>
                            <div class="hide-child">
                                <input type="file" id="fileupload-avatar" />
                            </div>                
                        </div>
                    </div>                
                    <div id="password-change-wrapper" class="row-fluid">
                        <div class="row-fluid">
                            <label class="password-title">修改密码</label>
                        </div>
                        <div class="row-fluid">
                            <input type="password" name="password" id="password" onfocus="sign_enable()" placeholder="原密码" />
                        </div>
                        <div class="row-fluid">
                            <input type="password" name="password1" id="password1" onfocus="sign_enable()" placeholder="新密码" />
                        </div>
                        <div class="row-fluid">
                            <input type="password" name="password2" id="password2" onfocus="sign_enable()" placeholder="确认新密码" />              
                        </div>
                        <div class="row-fluid">
                            <input type="submit" id="password_change" class="btn" value="确认" />
                        </div>
                    </div> 
                </div>
                <div class="span8">
                    <div class="control-line"> 
                        <label class="control-label">邮箱</label>
                        <div class="controls"><?php echo $user['email'];?></div>
                        <?php if (isset($user['nickname'])): ?>
                        <label class="control-label">昵称</label>
                        <div class="controls">
                            <input type="text" name="nickname" id="nickname" value=<?php echo $user['nickname'];?> /> 
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($user_type == '0'): ?>
                    <div class="control-line">
                        <label class="control-label">身份证号</label>
                        <div class="controls">
                            <input type="text" name="identity" id="identity"  value=<?php echo $user['identity'];?> />
                        </div>
                        <label class="control-label">姓名</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" value=<?php echo $user['name'];?> />
                        </div>
                    </div>
                    <div class="control-line">
                        <label class="control-label">性别</label>
                        <div class="controls">
                            <select id="gender" name="gender" >  
                                <option value="<?php echo $user['gender'];?>">
                                    <?php if($user['gender']==1):?>
                                    男
                                    <?php elseif($user['gender']==0):?>
                                    女
                                    <?php else:?>
                                    保密
                                    <?php endif;?>
                                </option>  
                            </select>
                        </div>
                        <label class="control-label">破壳日</label>
                        <div class="controls">
                            <input type="date" id="birthday" onblur=constellation() name="birthday" value=<?php echo $user['birthday'];?> />
                        </div>
                    </div>
                    <div class="control-line">
                        <div class="control-label">自我介绍</div>
                        <div class="controls">
                            <textarea rows=10 name="introduction" id="introduction"><?php echo $user['introduction'];?></textarea>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- modal footer -->
        <div class="modal-footer">
           <input type="submit" id="save" class="btn" value="保存" />
           <input type="submit" id="exit" data-dismiss="modal" aria-hidden="true"class="btn" value="退出" />
        </div>  
    </div>



    <!-- 上传音乐modal --> 
    <div id="upload-music-modal" class="modal hide fade modal-alter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        <!-- modal header -->
        <div class="modal-header">
            <h2>上传音乐</h2>
            <input type="text" name="music_name" id="music_name" placeholder=" 请输入音乐名称" />
        </div>

        <!-- modal body -->
        <div class="modal-body">
            <div class="row-fluid">

                <div class="span4">
                    <div class="">
                        <div id="upload-music-button" class="button">上传音乐文件</div>
                        <div id="upload-music-status"></div>
                        <div id="upload-music-progress"><div class="progress-bar"></div></div>
                        <div class="hide-child">
                            <input type="file" id="fileupload-music" /> 
                        </div>
                    </div>
                    <div id="music-image-wrapper" class="image-uploader">
                        <img id="music-image" class="img-rounded" 
                        src="<?php echo empty($user['portaitdir']) ? base_url().'image/public.jpg':base_url().$user['portaitdir'];?>"/>
                        <div id="upload-music-image-button" class="image-upload-button"></div>
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
                            <input type="text" name="composed_by" id="composed_by" /> 
                        </div>
                        <label class="control-label">作词</label>
                        <div class="controls">
                            <input type="text" name="lyrics_by" id="lyrics_by" /> 
                        </div>
                    </div>
                    <div class="control-line">
                        <label class="control-label">编曲</label>
                        <div class="controls">
                            <input type="text" name="arranged_by" id="arranged_by" /> 
                        </div>
                        <label class="control-label">所属专辑</label>
                        <div class="controls">
                            <input type="text" name="album" id="album" />
                        </div>
                    </div>
                    <div class="control-line">
                        <label class="control-label">唱片公司</label>
                        <div class="controls">
                             <input type="text" name="disc_company" id="disc_company" /> 
                        </div>
                        <label class="control-label">*演唱时间</label>
                        <div class="controls">
                            <input type="date" style="width:150px;height:15px;" id ="perform_time"  name="perform_time"  />
                        </div>
                    </div>
                    <div class="control-line">
                        <label class="control-label">*音乐风格</label>
                        <div class="controls">
                            <input type="text" name="genre" id="genre" /> 
                        </div>
                    </div>
                    <div class="control-line">
                        <label class="control-label">*自定义标签</label>
                        <div class="controls">
                            <input type="text" name="custom_tag1" id="custom_tag1" />    
                        </div>
                    </div>
                    <div class="control-line">
                        <label class="control-label">歌曲背后的故事</label>
                        <div class="controls">
                            <textarea rows=3 name="story" id="story"  ></textarea>
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
