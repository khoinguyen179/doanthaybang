<!--Loai -->
<script>
function xoa(ml)
{
	con=confirm("Bạn có chắc muốn xóa không?");
	if(con)
	{
		location.href="index.php?mo=loai&ac=xoa&ml="+ml;
	}
}
</script>
<?php
include_once("../classes/Donhang.class.php");
$donhangDB=new Donhang;
if(isset($_POST['btnAdd']))
{
	if($donhang->them($_POST['txtMaLoai'],$_POST['txtTenLoai'])>0)
		echo "Thêm thành công";
	else
		echo "Thêm không thành công";
}
else if(isset($_POST['btnLuu']))
{
	if($donhang->sua($_POST['txtMaLoai'],$_POST['txtTenLoai'])>0)
		echo "Sua thanh cong";
	else
		echo "Sua ko thanh cong";
}
else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="xoa") //thuc hien xoa
{
	if($donhang->xoa($_GET['ml'])>0) //xoa thanh cong
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
}
else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua")
{
	$suadh=$donhangDB->thongTin1Loai($_GET['ml']);
}
$dsdh=$donhangDB->tatCa();
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
        	<input type="hidden" name="mo" value="loai" />
                  <div class="table" style="width:500px !important;"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing form" cellpadding="0" cellspacing="0" width="400">
          <tr>
            <th class="full" colspan="2">Thêm loại mới</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Mã loại</strong></td>
            <td class="last"><input type="text" class="text" name="txtMaLoai" id="txtMaLoai" value="<?php if(isset($loaisua[0]['maloai'])) echo $loaisua[0]['maloai']; ?>" required/></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Tên loại</strong></td>
            <td class="last"><input type="text" class="text" name="txtTenLoai" id="txtTenLoai" value="<?php if(isset($loaisua[0]['maloai'])) echo $loaisua[0]['tenloai']; ?>" required/></td>
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
            <th class="first" >Mã đơn hàng</th>
            <th>Thời điểm đặt hàng</th>
            <th>Tên người nhận</th>
            <th>Email người nhận</th>
            <th>SĐT người nhận</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Trạng thái</th>
            <th>Ghi chú</th>
            <th>Thêm</th>
            <th>Xóa</th>
            <th>Sửa</th>
          </tr>
          <?php
		  $i=1;
		  foreach($dsdh as $donhang)
		  {
		  ?>
          <tr <?php if($i%2==0) echo 'class="bg"' ?>>
            <td ><?php echo $donhang['madh'] ?></td>
            <td><?php echo $donhang['ThoiDiemDatHang'] ?></td>
            <td><?php echo $donhang['tennguoinhan'] ?></td>
            <td><?php echo $donhang['emailnguoinhan'] ?></td>
            <td><?php echo $donhang['sdtnguoinhan'] ?></td>
            <td><?php echo $donhang['diachinhanhang'] ?></td>
            <td><?php echo $donhang['trangthai'] ?></td>
            <td><?php echo $donhang['ghichucuakh'] ?></td>
            <td><img src="../img/add-icon.gif" width="16" height="16" alt="" /></td>
            <td><a href="javascript:xoa('<?php echo $loai['maloai'] ?>')"><img src="../img/hr.gif" width="16" height="16" alt="" /></a></td>
            <td><a href="index.php?mo=loai&ac=sua&ml=<?php echo $loai['maloai'] ?>"><img src="../img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
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