<?php
//$file为文件绝对路径，$tmpname为弹窗的临时文件名（可以不设置，默认为basename）
function download($file,$tmpname=null)
{
    //检测文件是否存在
	if(file_exists($file))
	{
		if(!isset($tmpname)||$tmpname==null)
		{
			$tmpname = basename($file);//获取文件名字
		}
	}
	else
	{
		return false;
	}
    $len = filesize($file);//获取文件大小
    $file_extension = strtolower(substr(strrchr($file,"."),1));//获取文件扩展名
    //根据扩展名 指出输出浏览器格式
    header("Cache-Control:");
    header("Cache-Control: public");
    //设置输出浏览器格式
    header("Content-Type: application/octet-stream");
    if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {//如果是IE浏览器
        $iefilename = preg_replace('/./', '%2e', $file, substr_count($file, '.') - 1);
        header('Content-Disposition: attachment; filename="'.$iefilename.'"');
    } else {
        header('Content-Disposition: attachment; filename="'.$tmpname.'"');
    }
    header("Accept-Ranges: bytes");
    $size=filesize($file);
    //如果有$_SERVER['HTTP_RANGE']参数 
    if(isset($_SERVER['HTTP_RANGE'])) {
		/*---------------------------
		Range头域 　　Range头域可以请求实体的一个或者多个子范围。例如，
		表示头500个字节：bytes=0-499
		表示第二个500字节：bytes=500-999 
		表示最后500个字节：bytes=-500
		表示500字节以后的范围：bytes=500-
		第一个和最后一个字节：bytes=0-0,-1
		同时指定几个范围：bytes=500-600,601-999
		但是服务器可以忽略此请求头，如果无条件GET包含Range请求头，
		响应会以状态码206（PartialContent）返回而不是以200 （OK）。 
		---------------------------*/
		// 断点后再次连接 $_SERVER['HTTP_RANGE'] 的值 bytes=4390912-
		list($a, $range)=explode("=",$_SERVER['HTTP_RANGE']);
		//下载缺失部分
		str_replace($range, "-", $range);
		$size2=$size-1;//文件总字节数
		$new_length=$size2-$range;//获取下次下载的长度
		header("HTTP/1.1 206 Partial Content");
		header("Content-Length: $new_length");//输入总长
		header("Content-Range: bytes $range$size2/$size");//Content-Range: bytes 4908618-4988927/4988928   95%的时候
	}
	else
	 {//第一次连接
        $size2=$size-1;
        header("Content-Range: bytes 0-$size2/$size"); //Content-Range: bytes 0-4988927/4988928
        header("Content-Length: ".$size);//输出总长
    }
    ob_end_clean();
    ob_start();
    //打开文件
    $fp=fopen($file,"rb");
    //设置指针位置
    fseek($fp,$range);
    //虚幻输出
    while(!feof($fp))
    {
        //设置文件最长执行时间
        set_time_limit(0);
        print(fread($fp,1024));//输出文件
        ob_flush();
        flush();//输出缓冲
    }
    fclose($fp);
    return true;
}
?>