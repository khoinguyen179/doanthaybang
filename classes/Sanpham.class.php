<?php
class Sanpham extends Db{
	public function tatCa()
	{
		$sql="select * from sanpham";
		return $this->exeQuery($sql);	
	}
	public function sanpham1Loai($maloai)
	{
		$sql="select * from sanpham where maloai=?";
		return $this->exeQuery($sql,array($maloai));	
	}
	public function tongSosanpham()
	{
		$sql="select count(*) from sanpham";
		$t=$this->exeQuery($sql,array(),PDO::FETCH_NUM);	
		return $t[0][0];
	}
	public function tongSosanpham1Loai($maloai)
	{
		$sql="select count(*) from sanpham where maloai=?";
		$t=$this->exeQuery($sql,array($maloai),PDO::FETCH_NUM);	
		return $t[0][0];
	}
	public function thongTin1sanpham($ma)
	{
		$sql="select * from sanpham where masp=?";
		return $this->exeQuery($sql,array($ma));	
	}	
	public function thongTinNhieusanpham($arr_ma)
	{
		
		for($i=0;$i<count($arr_ma);$i++)
		$arr_ma[$i]="'".$arr_ma[$i]."'";
		$dsma=implode(",",$arr_ma);
		$sql="select * from sanpham where masp in (".$dsma.")";
		
		return $this->exeQuery($sql);	
	}
	public function giasanpham($masanpham)
	{
		
		
		if(is_array($masanpham))
		{
			for($i=0;$i<count($masanpham);$i++)
		$masanpham[$i]="'".$masanpham[$i]."'";
		$dsma=implode(",",$masanpham);
		$sql="select masanpham,gia from sanpham where mabaiviet in (".$dsma.")";
		return $this->exeQuery($sql);
		}else
		{
			$sql="select masp,dongia from sanpham where masp = ?";
		return $this->exeQuery($sql,array($masanpham));
		}
	}
	public function hot()
	{
		$sql="select tensp,dongia  from sanpham";
		return $this->exeQuery($sql);	
	}
	public function tenloai()
	{
		$sql="select tieude,luotxem, loai.tenloai as ten from baiviet inner join loai on baiviet.maloai = loai.maloai order by luotxem desc limit 5";
		return $this->exeQuery($sql);
	}
	public function search($search)
	{
		$sql="select *  from sanpham where tensp='%$search%'";
		return $this->exeQuery($sql);	
	}
	public function them($ma,$ten,$donvitinh,$dongia,$hinh,$stttonkho,$maloai,$xuatsu,$luotxem,$thongtin)
	{
		$sql="INSERT INTO sanpham VALUES (?,?,?,?,?,?,?,?,?,?)";
		return $this->exeNoneQuery($sql,array($ma,$ten,$donvitinh,$dongia,$hinh,$stttonkho,$maloai,$xuatsu,$luotxem,$thongtin));
	}
	public function sua($ma,$ten,$donvitinh,$dongia,$hinh,$stttonkho,$maloai,$xuatsu,$luotxem,$thongtin)
	{
		$sql="update sanpham set tensp=?,donvitinh=?,dongia=?,hinh=?,stttonkho=?,maloai=?,xuatsu=?,luotxem=?,thongtin=? where masp=?";
		return $this->exeNoneQuery($sql,array($ten,$donvitinh,$dongia,$hinh,$stttonkho,$maloai,$xuatsu,$luotxem,$thongtin,$ma));
	}
	public function xoa($ma)
	{
		
		$sql="delete from sanpham where masp=? ";
		return $this->exeNoneQuery($sql,array($ma));
	}
}
?>