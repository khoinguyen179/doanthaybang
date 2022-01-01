<?php

class Donhang extends Db{
	public function tatCa()
	{
		$sql="select * from donhang";
		return $this->exeQuery($sql);	
	}
	
}
?>