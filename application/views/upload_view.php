<html>
<head>
<title>Upload Form</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script>
$(document).ready(function(){
	$("#button_sub").click(function(){
		$("#subform").submit();
	  });
	});
</script>
</head>
<body>
<?php
	if(!isset($id))
		$id=0;
?>
<div id="upload_form" >
<?php
	if(isset($info)&&isset($html))
	{
		echo $info;
		echo $html;
	}else{
		echo '<form id="subform" action="'.base_url().'index.php/upload/do_upload_music/'.$id.'" method="post" accept-charset="utf-8" enctype="multipart/form-data">';
?>
����<input type="file" name="userfile" size="20" />
<input id="button_sub" type="button" value="�ϴ�����" />
</form>
<?php } ?>
</div>
</body>
</html>