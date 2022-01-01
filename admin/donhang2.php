<!--Loai -->
<script>
function xoa(ml)
{
	con=confirm("Bạn có chắc muốn xóa không?");
	if(con)
	{
		location.href="index.php?mo=loai&ac=xoa&mdh="+ml;
	}
}
</script>
<?php
include_once("../classes/Donhang.class.php");
$donhangDB=new Donhang;
if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="duyet")
{
	if($donhangDB->duyet(0,$_GET['mdh'])>0)
		echo "Bỏ duyệt thành công";
	else
		echo "Bỏ duyệt không thành công";
}


$dsdh=$donhangDB->daduyet();
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
            <th>Tổng tiền</th>
            <th>Duyệt đơn hàng</th>
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
                
              <td><a href="index.php?mo=dh2&ac=duyet&mdh=<?php echo $donhang['madh'] ?>"><img src="../img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
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
