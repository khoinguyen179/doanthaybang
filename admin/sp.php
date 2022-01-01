<!--Loai -->
<script>
function xoa(ml)
{
	con=confirm("Bạn có chắc muốn xóa không?");
	if(con)
	{
		location.href="index.php?mo=sp&ac=xoa&msp="+ml;
	}
}
</script>
<?php

  include_once("../classes/Sach.class.php");
  $spDB=new Sach;
  if(isset($_POST['btnAdd']))
  {
    $arrImg = array("image/png", "image/jpeg", "image/bmp");
  $err = "";
  $errFile = $_FILES["filehinh"]["error"];
  if ($errFile<0)
    $err .="Lỗi file hình <br>";
  else
  {
	$type = $_FILES["filehinh"]["type"];
	if (!in_array($type, $arrImg))
		$err .="Không phải file hình <br>";
	else
	{	$temp = $_FILES["filehinh"]["tmp_name"];
		$name = $_FILES["filehinh"]["name"];
		if (!move_uploaded_file($temp, "../img/sp"))
			$err .= "Không thể lưu file<br>";
		
	}
}
$image = implode("",$_FILES["filehinh"]["name"]);
	if($spDB->them($_POST['txtmasp'],$_POST['txttensp'],$_POST['txtdonvitinh'],$_POST['txtdongia'],$image,$_POST['txttonkho'],$_POST['txtmaloai'],$_POST['txtxuatsu'],$_POST['txtluotxem'],$_POST['txtthongtin'])>0)
		echo "Thêm thành công";
	else
		echo "Thêm không thành công";
}
else if(isset($_POST['btnLuu']))
{
	if($spDB->sua($_POST['txtmasp'],$_POST['txttensp'],$_POST['txtdonvitinh'],$_POST['txtdongia'],$_POST['filehinh'],$_POST['txttonkho'],$_POST['txtmaloai'],$_POST['txtxuatsu'],$_POST['txtluotxem'],$_POST['txtthongtin'])>0)
		echo "Sua thanh cong";
	else
		echo "Sua ko thanh cong";
}
else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="xoa") //thuc hien xoa
{
	if($spDB->xoa($_GET['msp'])>0) //xoa thanh cong
	{
	?>
    	<script>alert("Xóa thành công");</script>
    <?php
	}else
	{
	?>
    <script>alert("Xóa không thành công");</script>
    <?php
	}
}else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua")
{
	$spsua=$spDB->thongTin1Sach($_GET['msp']);
}
$dssp=$spDB->tatCa();
?>
<div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                  <div class="col-md-6">
      	<form action="" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="mo" value="sp" />
                  <div class="table" style="width:500px !important;"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing form" cellpadding="0" cellspacing="0" width="400">
          <tr>
            <th class="full" colspan="2">Thêm sản phẩm mới</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Mã sản phẩm</strong></td>
            <td class="last"><input type="text" class="text" name="txtmasp" id="txtmasp" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['masp']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Tên Sản phẩm</strong></td>
            <td class="last"><input type="text" class="text" name="txttensp" id="txttensp" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['tensp']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Đơn vị tính</strong></td>
            <td class="last"><input type="text" class="text" name="txtdonvitinh" id="txtdonvitinh" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['donvitinh']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Đơn giá</strong></td>
            <td class="last"><input type="text" class="text" name="txtdongia" id="txtdongia" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['dongia']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Hình</strong></td>
            <td class="last"><input type="file" class="text" name="filehinh[]" id="filehinh" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['hinh']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>STT tồn kho</strong></td>
            <td class="last"><input type="text" class="text" name="txttonkho" id="txttonkho" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['stttonkho']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Mã loại</strong></td>
            <td class="last"><input type="text" class="text" name="txtmaloai" id="txtmaloai" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['maloai']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Xuất sứ</strong></td>
            <td class="last"><input type="text" class="text" name="txtxuatsu" id="txtxuatsu" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['xuatsu']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Lượt xem</strong></td>
            <td class="last"><input type="text" class="text" name="txtluotxem" id="txtluotxem" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['luotxem']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Thông tin</strong></td>
            <td class="last"><input type="text" class="text" name="txtthongtin" id="txtthongtin" value="<?php if(isset($spsua[0]['masp'])) echo $spsua[0]['tensp']; ?>" required/></td>
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
            <th class="first" >Mã loại</th>
            <th>Tên sản phẩm</th>
            <th>Đơn vị tính</th>
            <th>Đơn giá</th>
            <th>Hình</th>
            <th>STT tồn kho</th>
            <th>Mã loại</th>
            <th>Xuất sứ</th>
            <th>Lượt xem</th>
            <th>Thông tin</th>
            <th>Thêm</th>
            <th>Xóa</th>
            <th>Sửa</th>
          </tr>
          <?php
		  $i=1;
		  foreach($dssp as $sp)
		  {
		  ?>
          <tr <?php if($i%2==0) echo 'class="bg"' ?>>
            <td ><?php echo $sp['masp']; ?></td>
            <td><?php echo $sp['tensp']; ?></td>
            <td><?php echo $sp['donvitinh']; ?></td>
            <td><?php echo $sp['dongia']; ?></td>
            <td><?php echo $sp['hinh']; ?></td>
            <td><?php echo $sp['stttonkho']; ?></td>
            <td><?php echo $sp['maloai']; ?></td>
            <td><?php echo $sp['xuatsu']; ?></td>
            <td><?php echo $sp['luotxem']; ?></td>
            <td><?php echo substr($sp['thongtin'],0,50); ?></td>
            <td><img src="../img/add-icon.gif" width="16" height="16" alt="" /></td>
            <td><a href="javascript:xoa('<?php echo $sp['masp'] ?>')"><img src="../img/hr.gif" width="16" height="16" alt="" /></a></td>
            
            <td><a href="index.php?mo=sp&ac=sua&msp=<?php echo $sp['masp'] ?>"><img src="../img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            
          </tr>
          <?php 
		  	$i++;
		  } ?>
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
