<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.uploadify.min.js"></script>
<link href="<?php echo base_url()?>css/uploadify.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    .uploadify-button {
        background-color: transparent;
        border: none;
        padding: 0;
    }
    .uploadify:hover .uploadify-button {
        background-color: transparent;
    }
</style>
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
	<h1>上传新歌</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">		
	</form>
	  
<!--'onQueueComplete' : function(queueData) {
					alert(queueData.uploadsSuccessful + ' files were successfully uploaded.');
				}, --->
  
  	 <div id="musician-option">
			作品名：*<input type="text" name="name" id="music_name"  placeholder="请输入作品名" />
			<br/>
			故事： <input type="text" name="story" id="music_story" placeholder="请分享作品背后的故事" />
    </div>
<a href="javascript:$('#file_upload').uploadify('upload','*');">上传音乐并保存信息</a> | <a href="javascript:$('#file_upload').uploadify('cancel','*');">取消</a>
	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'buttonText': '选择文件',
				'method': 'POST',
				'swf'      : '<?php echo base_url()?>plugin/uploadify.swf',
				'uploader' : '<?php echo base_url()?>uploadify',
				'script': 'UploadFileForm.aspx',         //上传文件的后台处理页面
				'cancelImg': '<?php echo base_url()?>plugin/uploadify-cancel.png',     //取消上传的图片
				'checkExisting' : '<?php echo base_url()?>plugin/check-exists.php',
				'removeCompleted' : false,
				'auto':false,
				'multi': true,
				'FileSizeLimit': '20MB',                   //上传文件大小的限制
				
				'onUploadSuccess' : function(file, data, response) {
            alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
        },
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
					'userid':<?php echo $userid;?>,
					'name': document.getElementById("music_name").value,
					'story':document.getElementById("music_story").value
				}				
			});
		});
	</script>
</body>
</html>