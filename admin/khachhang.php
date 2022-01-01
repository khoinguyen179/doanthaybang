<!--Loai -->
<script>
function xoa(ml)
{
	con=confirm("Bạn có chắc muốn xóa không?");
	if(con)
	{
		location.href="index.php?mo=kh&ac=xoa&mkh="+ml;
	}
}
</script>
<?php
include_once("../classes/Khachhang.class.php");
$khDB=new Khachhang;
if(isset($_POST['btnAdd']))
{
	if($khDB->them($_POST['txtMaLoai'],$_POST['txtten'])>0)
		echo "Thêm thành công";
	else
		echo "Thêm không thành công";
}
else if(isset($_POST['btnLuu']))
{
	if($khDB->sua($_POST['txtmakh'],$_POST['matkhau'],$_POST['txttenkh'],$_POST['txtdiachi'],$_POST['txtsdt'])>0)
		echo "Sua thanh cong";
	else
		echo "Sua ko thanh cong";
}
else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="xoa") //thuc hien xoa
{
	if($khDB->xoa($_GET['mkh'])>0) //xoa thanh cong
	{
	?>
    	<script>alert("Xóa thành công");</script>
    <?php
	}else
	{
	?>
    <script>alert("Không được xóa vì có sản phẩm trong loại");</script>
    <?php
	}
}else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua")
{
	$khsua=$khDB->thongTin1Khach($_GET['mkh']);
}
$dskh=$khDB->tatCa();
?>
<div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                  <div class="col-md-6">
                  <div class="search">
        <label>
        <input type="text" name="textfield" />
        </label>
        <label>
        <input type="submit" name="Submit" value="Search" />
        </label>
      </div>
      	<form action="" method="post">
        	<input type="hidden" name="mo" value="kh" />
                  <div class="table" style="width:500px !important;"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing form" cellpadding="0" cellspacing="0" width="400">
          <tr>
            <th class="full" colspan="2">Thêm loại mới</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Mã khách hàng</strong></td>
            <td class="last"><input type="text" class="text" name="txtmakh" id="txtmakh" value="<?php if(isset($khsua[0]['makh'])) echo $khsua[0]['makh']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Email khách hàng</strong></td>
            <td class="last"><input type="text" class="text" name="email" id="email" value="<?php if(isset($khsua[0]['makh'])) echo $khsua[0]['email']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Mật khẩu</strong></td>
            <td class="last"><input type="text" class="text" name="matkhau" id="matkhau" value="<?php if(isset($khsua[0]['makh'])) echo $khsua[0]['matkhau']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Tên khách hàng</strong></td>
            <td class="last"><input type="text" class="text" name="txttenkh" id="txttenkh" value="<?php if(isset($khsua[0]['makh'])) echo $khsua[0]['tenkh']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Địa chỉ</strong></td>
            <td class="last"><input type="text" class="text" name="txtdiachi" id="txtdiachi" value="<?php if(isset($khsua[0]['makh'])) echo $khsua[0]['diachi']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Số điện thoại</strong></td>
            <td class="last"><input type="text" class="text" name="txtsdt" id="txtsdt" value="<?php if(isset($khsua[0]['makh'])) echo $khsua[0]['dienthoai']; ?>" required/></td>
          </tr>
          <tr>
            <td class="first" colspan="2"><input type="submit"  
            name="<?php if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua") echo "btnLuu"; else
			echo "btnAdd" ?>" value="<?php if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua") echo "Luu"; else
			echo "Thêm" ?>" /></td>
          </tr>
 			</table>
            </div>	
      </form>
      <div id="ketqua"></div>
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" >Mã khách hàng</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Xóa</th>
            <th>Sửa</th>
          </tr>
          <?php
		  $i=1;
		  foreach($dskh as $kh)
		  {
		  ?>
          <tr <?php if($i%2==0) echo 'class="bg"' ?>>
            <td ><?php echo $kh['makh'] ?></td>
            <td ><?php echo $kh['email'] ?></td>
            <td ><?php echo $kh['matkhau'] ?></td>
            <td ><?php echo $kh['tenkh'] ?></td>
            <td ><?php echo $kh['diachi'] ?></td>
            <td ><?php echo $kh['dienthoai'] ?></td>
            <td><a href="javascript:xoa('<?php echo $kh['makh'] ?>')"><img src="../img/hr.gif" width="16" height="16" alt="" /></a></td>
            <td><a href="index.php?mo=kh&ac=sua&mkh=<?php echo $kh['makh'] ?>"><img src="../img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            
          </tr>
          <?php 
		  	$i++;
		  } ?>
          <!--
          <tr class="bg">
            <td >- Lorem Ipsum </td>
            <td></td>
            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>
            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>
      
            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>
      
          </tr>
      		-->
        </table>
        <div class="select"> <strong>Other Pages: </strong>
          <select>
            <option>1</option>
          </select>
        </div>
      </div>
    </div>
            </div>
        </div>
<!--end loai -->