<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf8" />
<title>File Download</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/download.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/download.js"></script>
</head>
<body>
<h1>File Download</h1>
<h2>Go back to </h2>
<div id="file-manager">
    <ul class="manager">
    <?php
        foreach($files_array as $key=>$val)
        {
            echo '<li><a href="index.php/download/do_download?file='.urlencode($val).'">'.$val.' 
                    <span class="download-count" title="Times Downloaded">'.(int)$file_downloads[$val].'</span> <span class="download-label">download</span></a>
                    </li>';
        }
    ?>
  </ul>
</div>
<p class="tutInfo">Powered By Wangjian</p>
</body>
</html>
