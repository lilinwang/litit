<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>用户中心</title>
  <link href="<?php echo base_url()?>css/usercenter.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>js/usercenter.js"></script>
</head>

<script type="text/javascript">

</script>

<body>
  <div id="user-wrapper">
    <div id="user-info" class="user-module">
      <br/>
      <div class="title">
        我的信息
        <span id="info-option">
          |<a href="#" id="viewinfo-button">查看</a>
          |<a href="#" id="updateinfo-button">修改</a>|
        </span>
      </div>

      <form id="update-info" method="post" action="update-userinfo.php">
        <div class="fill-in">
          <table class="basic-info">
            <tr><td class="item-name">登录邮箱：</td><td class="item-value"><input type="email" name="email"/></td></tr>
            <tr><td class="item-name">昵称：</td><td class="item-value"><input type="text" name="nickname"/></td></tr>
            <tr><td class="item-name">TEL：</td><td class="item-value"><input type="tel" name="tel"/></td></tr>
            <tr><td class="item-name">破壳日：</td><td class="item-value"><input type="date" name="birthday"/></td></tr>
            <tr><td class="item-name">所在地：</td><td class="item-value"><input type="text" name="location"/></td></tr>
            <tr><td class="item-name">实名信息：</td><td class="item-value"><input type="text" name="identity"/></td></tr>
          </table>
          <div class="user-intro">
            简介：<br/><input type="textarea" name="intro"/><br/>
          </div>
        </div>
        <div id="submit-button">
          <button type="submit" class="submit"><a href="#">保存</a></button>
          <button class="apply"><a href="#">申请成为音乐人</a></button>
        </div>
      </form>

      <div id="view-info">
        <div class="fill-in">
          <table class="basic-info">
            <tr><td class="item-name">登录邮箱：</td><td class="item-value">cqjiangkl@163.com</td></tr>
            <tr><td class="item-name">昵称：</td><td class="item-value">df</td></tr>
            <tr><td class="item-name">TEL：</td><td class="item-value">12345678901</td></tr>
            <tr><td class="item-name">破壳日：</td><td class="item-value">1992-5-10</td></tr>
            <tr><td class="item-name">所在地：</td><td class="item-value">sh</td></tr>
            <tr><td class="item-name">实名信息：</td><td class="item-value">asdf</td></tr>
          </table>
          <div class="user-intro">
            简介：<br/><textarea name="intro">hello,world</textarea><br/>
          </div>
        </div>
      </div>

    </div>

    <div id="view-box" class="user-module">
          <div id="choose">
            <a id="msg-button" class="choose_button" href="#">私信</a>
            <a id="copyright-button" class="choose_button" href="#">查看版权请求</a>
          </div>

          <div class="boxpan" id="msg">这是一封私信</div>
          <div class="boxpan" id="copyright">这里是版权请求</div>
    </div>

    <div id="logo">
      <img src="<?php echo base_url()?>image/music_pic_3.jpg"/>
    </div>
  </div>

  <div id="separator">
    <img src="<?php echo base_url()?>image/separator.jpg">
  </div>

  <div id="songs">
    <div id="navigator">
      <ul>
        <li id="collect-button"><a  href="#">收藏的歌曲</a></li>
        <li id="follow-button"><a href="#">关注的音乐人</a></li>
        <li id="upload-button"><a href="#">上传的音乐</a></li>
        <li id="download-button"><a href="#">下载的歌曲</a></li>
      </ul>
    </div>
    <div id="pans">
      <div id="collect" class="pan">
        <table>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
        </table>
      </div>
      <div id="follow" class="pan">
        <table>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
        </table>
      </div>
      <div id="upload" class="pan">
        <table>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
        </table>
      </div>
      <div id="download" class="pan">
        <table>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td></tr>
        </table>
      </div>
    </div>
    <div id="foot"></div>
  </div>


</body>

</html>