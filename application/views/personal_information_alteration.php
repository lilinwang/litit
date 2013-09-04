<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Litit修改个人信息</title>
<link href="<?php echo base_url()?>css/style_personal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>css/example2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.boutique_min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-migrate-1.1.1.js"></script>
<script type="text/javascript" src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=" charset="utf-8"></script>
</head>
<body >
<div class="music_all">
<!--所有的悬浮在表面的页面，包括黑色面纱，注册登录页面-->

	<a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary">注册</a>
	<div id="personal_hover">
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
     <input type="submit"  id="sign" class="btn btn-primary" value="注册" />
   </div>
 </form>
</form>
	</div>	
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true" data-show="true">
        

	</div>

</div>			
</body>
</html>
