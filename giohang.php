<style>
.capnhat{
  display: block;
  margin-right: auto;
  margin-left: auto;
  margin-top: 10px;
}
</style>
<?php
 if(isset($_POST['themgiohang'])){
 	$tensanpham = $_POST['tensanpham'];
 	$sanpham_id = $_POST['sanpham_id'];
 	$hinhanh = $_POST['hinhanh'];
 	$gia = $_POST['giasanpham'];
 	$soluong = $_POST['soluong'];	
 	$sql_select_giohang = $db->exeQuery("SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
  
 	if($sql_select_giohang!=null){
    $n = $db->getRowCount($sql_select_giohang);
 		$soluong = $n['soluong'] + 1;
 		$sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
 	}else{
 		$soluong = $soluong;
 		$sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong')";

 	}
   $db->exeQuery($sql_giohang);
 	//$insert_row = mysqli_query($con,$sql_giohang);
 	// if($insert_row==0){
 	// 	header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);	
 	// }

 }elseif(isset($_POST['capnhatsoluong'])){
 	
 	for($i=0;$i<count($_POST['product_id']);$i++){
 		$sanpham_id = $_POST['product_id'][$i];
 		$soluong = $_POST['soluong'][$i];
 		if($soluong<=0){
 			$sql_delete = $db->exeQuery("DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
 		}else{
 			$sql_update = $db->exeQuery("UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
 		}
 	}

 }elseif(isset($_GET['xoa'])){
 	$id = $_GET['xoa'];
 	$sql_delete = $db->exeQuery("DELETE FROM tbl_giohang WHERE giohang_id='$id'");

 }elseif(isset($_GET['dangxuat'])){
 	$id = $_GET['dangxuat'];
 	if($id==1){
 		unset($_SESSION['dangnhap_home']);
 	}

 
	}
		
	elseif(isset($_POST['thanhtoandangnhap'])){
	$sql_lay_giohang = $db->exeQuery("SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
	$i = 0;
	$total = 0;
	foreach($sql_lay_giohang as $row_fetch_giohang){ 

		$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
		$total+=$subtotal;
		$i++;}
	$name = $_POST['name'];
 	$phone = $_POST['phone'];
 	$email = $_POST['email'];
 	$note = $_POST['note'];
 	$address = $_POST['address'];
 	$emailkhachhang = $_SESSION['email'];
	$random=rand(0,9999);	
 	$madonhang = "dh".$random;
	 $sql_donhang = $db->exeQuery("INSERT INTO donhang(madh,email,tennguoinhan,emailnguoinhan,sdtnguoinhan,diachinhanhang,ghichucuakh,tongtien) values ('$madonhang','$emailkhachhang','$name','$email','$phone','$address','$note',$total)");
 	for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
	 		$soluong = $_POST['thanhtoan_soluong'][$i];
	 		
	 		$sql_chitietdh = $db->exeQuery("INSERT INTO chitietdonhang(madh,masp,soluong) values ('$madonhang','$sanpham_id','$soluong')");
	 		
 		}
		 
		 $sql_delete_thanhtoan = $db->exeQuery("DELETE FROM tbl_giohang ");
 	
 }
?>

<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Gi??? h??ng c???a b???n
			</h3>
				
				
			<!-- //tittle heading -->
			<div class="checkout-right">
			<?php
			$sql_lay_giohang = $db->exeQuery("SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");

			?>

				<div class="table-responsive">
					<form action="" method="POST">
					
					<table class="table table-bordered">
          <thead class="thead-dark">
          <tr>
            <th>STT</th>
            <th>S???n ph???m</th>
            <th>S??? l?????ng</th>
            <th>T??n s???n ph???m</th>
            <th>????n gi??</th>
            <th>T???ng c???ng</th>
            <th>X??a s???n ph???m</th>
          </tr>
          </thead>
          <tbody class="align-middle">
						<?php
						$i = 0;
						$total = 0;
						foreach($sql_lay_giohang as $row_fetch_giohang){ 

							$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
							$total+=$subtotal;
							$i++;
						?>
            <tr >
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img src="img/sp/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " height="50" class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
									<input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>">
								
									
								</td>
								<td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
								<td class="invert"><?php echo number_format($row_fetch_giohang['giasanpham']).'vn??' ?></td>
								<td class="invert"><?php echo number_format($subtotal).'vn??' ?></td>
								<td class="invert">
									<a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>"><i class='far fa-trash-alt'></i></a>
								</td>
							</tr>
							<?php
							} 
							?>
              				<tr>
								<td colspan="7">T???ng ti???n : <?php echo number_format($total).'vn??' ?></td>
							</tr>
								</tbody>
							</table>
							<input type="submit"  value="C???p nh???t gi??? h??ng" name="capnhatsoluong"  class="capnhat">
          					</form>
							<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Th??m ?????a ch??? giao h??ng</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="T??n ng?????i nh???n" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Email ng?????i nh???n" name="email" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="S??? ??i???n tho???i ng?????i nh???n" name="phone" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="?????a ch??? nh???n h??ng" name="address" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<textarea style="resize: none;" class="form-control" placeholder="Ghi ch??" name="note" required=""></textarea>  
									</div>
								</div>
								
								<?php 
								$sql_giohang_select = $db->exeQuery("SELECT * FROM tbl_giohang");

								if(isset($_SESSION['email']) && $sql_giohang_select!=null){
									foreach($sql_giohang_select as $row_1){
											?>
											
											<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
											<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
											<?php 
										}
											?>
											<input type="submit" class="btn btn-primary" value="Thanh to??n gi??? h??ng" name="thanhtoandangnhap">
					
											<?php
											} 
											?>
								
								</td>
							
							</tr>
					</form>
				</div>
			</div>
			<?php
			if(!isset($_SESSION['email'])){ 
			?>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3"><?php echo "B???n ch??a c?? t??i kho???n! B???n c?? mu???n ????ng k?? t??i kho???n kh??ng?";?></h4>
							<a  href="index.php" class="btn btn-success" >< Quay l???i trang ch???</a>
							<a  href="register.php" class="btn btn-success" >????ng k?? t??i kho???n</a>
							<a  href="login.php" class="btn btn-success" >????ng nh???p ></a>				
				</div>
			</div>
			<?php
			} 
			?>
		</div>
	</div>
	<!-- //checkout page -->