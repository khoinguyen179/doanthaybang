<?php

class Donhang extends Db{
	public function chuaduyet()
	{
		$sql="select * from donhang where trangthai=0";
		return $this->exeQuery($sql);	
	}
	public function daduyet()
	{
		$sql="select * from donhang where trangthai=1";
		return $this->exeQuery($sql);	
	}
	public function duyet($status)
	{	
		$sql="update donhang set trangthai=? ";
		return $this->exeNoneQuery($sql,array($status));
	}
	public function thongTin1Don($ma)
	{
		$sql="select * from loai where maloai=?";
		return $this->exeQuery($sql, array($ma));
	}
}
?>