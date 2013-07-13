<?php
	function scand($dir)
	{
		if (is_dir($dir))
		{
			if ($dh = opendir($dir))
			{
				echo "<table border=1>";
				while (($file = readdir($dh)) !== false)
				{
					echo "<tr>";
					$type = filetype($dir.$file);
					if($type=="dir")
					{
						if($file=='.')
							continue;
						else if($file=='..')
						{
							$based=basedir($dir.$file);
							if($based!=false)
							{
								echo "<td>";
								//echo "<a class=dirlink href=#  onclick=showdir('".$based."/')>"."返回上层目录"."</a>";
								echo "<button class=dirlink onclick=showdir('".$based."/')>"."返回上层目录"."</button>";
								echo "</td>";
							}else{
								continue;
							}
							echo "<td>"."文件夹"."</td>";
						}else{
							echo "<td>";
							//echo "<a class=dirlink href=#  onclick=showdir('".$dir.$file."/"."')>".$file."</a>";
							echo "<button class=dirlink onclick=showdir('".$dir.$file."/"."')>".$file."</button>";
							echo "</td>";
							echo "<td>"."文件夹"."</td>";
						}
					}
					else
					{
						echo "<td>".$file."</td>";
						echo "<td>".pathinfo($dir.$file, PATHINFO_EXTENSION)."文件"."</td>";
					}
					echo "<td>".filesize($dir.$file)."</td>";
					echo "<td>".date('r', filemtime($dir.$file))."</td>";
					$perms = stat($dir.$file);
					/*
		 			foreach($perms as $key=>$value)
		 			{
					echo "<td>".$key.":".$value."</td>";
					}
					*/
					echo "</tr>";
				}
				echo "</table>";
				closedir($dh);
			}
		}
	}
	function basedir($dir)
	{
		$basecnt=strrpos($dir, '/');
		if($basecnt==false)
			return false;
		$tmp=substr($dir, 0,$basecnt);
		$basecnt=strrpos($tmp, '/');
		if($basecnt==false)
			return false;
		return substr($dir, 0,$basecnt);
	}
	scand($dir);
?>