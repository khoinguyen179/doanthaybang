<?php

if (!defined("ROOT"))
{
	echo "You don't have permission to access this page!"; exit;	
}
	$path =ROOT."/listsp.php";//mac dinh
	$mod = isset($_GET["mod"])?$_GET["mod"]:"";
	$ac = isset($_GET["ac"])?$_GET["ac"]:"";
	if($mod=="info")
	{
		include ROOT."/module/info/index.php";
	}
	elseif ($mod=="product")
	{
		include ROOT."/module/product/index.php";
		
	}
	elseif ($mod=="new")
	{
		include ROOT."/new.php";
	}
	elseif($mod=="bestselling")
	{
		include ROOT."/bestselling.php";
	}
	elseif ($mod=="cart")
	{
		include ROOT."/giohang.php";
	}
	elseif ($mod=="search")
	{
		$path =ROOT."/search.php";
	}
    else{
		include $path;
	}
	
    

?>