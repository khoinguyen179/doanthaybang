<?php
class Khachhang extends Db
{
    public function login($email,$pass)
    {
        $sql="select count(*) from khachhang where email=? and matkhau=md5(?)";
        $kq =$this->exeQuery($sql,array($email,$pass),PDO::FETCH_NUM);
        if($kq[0][0]>0)
        return true;
        else
        return false;
    }
    public function create($email,$pass)
    {
        $sql="insert into khachhang(email,matkhau) value(?,?)";
        return $this->exeNoneQuery($sql,array($email,md5($pass)));

    }
    public function checkEmail($email)
    {
        $sql="select count(email) from khachhang where email=?";
        $kq =$this->exeQuery($sql,array($email),PDO::FETCH_NUM);
        if($kq[0][0]>0)
        return true;
        else
        return false;
    }
    public function tatCa()
	{
		$sql="select * from khachhang";
		return $this->exeQuery($sql);	
	}
	
	public function sua($ma,$matkhau,$tenkh,$diachi,$dienthoai)
	{
		$sql="update khachhang set matkhau=?,tenkh=?,diachi=?,dienthoai=? where makh=?";
		return $this->exeNoneQuery($sql,array($matkhau,$tenkh,$diachi,$dienthoai,$ma));
	}
	public function xoa($ma)
	{
		$kq=$this->exeQuery($sql,array($ma));
		if($kq[0]['dem']>0)
			return -1; //tu quy dinh -1 la ko xoa dc vi co sach
		$sql="delete from khachhang where makh=? ";
		return $this->exeNoneQuery($sql,array($ma));
	}
    public function thongTin1Khach($ma)
	{
		$sql="select * from khachhang where makh=?";
		return $this->exeQuery($sql, array($ma));
	}
}