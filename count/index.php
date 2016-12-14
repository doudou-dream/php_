<?php 
	if (!@$i_Read = fopen("num.txt","r")) {
		echo "不存在";
		$num = 0;
	}else{
		$num = fgets($i_Read,10);//函数从文件指针中读取一行
		echo "获取的值".$num.'<br>';
		fclose($i_Read);
	}
	$num++;
	$i_Read2 = fopen("num.txt","w");//打开
	fwrite($i_Read2, $num);//写入
	fclose($i_Read2);//关闭
	echo $num;