<style>
    input.button {
    border: 0;
    background: unset;
    color: unset;
}
</style>
<?php
if (!defined("ROOT"))
{
	echo "You don't have permission to access this page!"; exit;	
}

$loai = getIndex("id");
?>
<div class="productList">
<?php $sanphamDB=new Sanpham();
$cmts=new Comments();
if(isset($_GET['loai']))
{ 
    //$tam=$db->exeQuery("select count(*) from sanpham where maloai=?",array($_GET['loai']),PDO::FETCH_NUM);
    $tongsanpham=$sanphamDB->tongSosanpham1Loai($_GET['loai']);
}else
{
    //$tam=$db->exeQuery("select count(*) from sanpham",array(),PDO::FETCH_NUM);
    $tongsanpham=$sanphamDB->tongSosanpham();
}
//$tongsanpham=$tam[0][0];
$page=isset($_GET['p'])?$_GET['p']:1;
$bd=($page-1)*sanpham_1_TRANG;
if(isset($_GET['loai']))
{ 
    $sanphams=$db->exeQuery("select mabv,tieude,mota, luotxem,hinh,ngaydang from baiviet where maloai=? limit $bd,".sanpham_1_TRANG,array($_GET['loai']));
}else
{
    $sanphams=$db->exeQuery("select * from sanpham where masp= '$loai' ");
}
foreach($sanphams as $sanpham)
{
    $num=$sanpham['dongia'];
    $formattedNum = number_format($num);
?>	
    
    <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="img/sp/<?php echo $sanpham['hinh'];?>" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?php echo $sanpham['tensp'];?></h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p><?php echo $formattedNum; ?>??</p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="action">
                                            <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                            <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>
                                        <form action="cart.php?mod=cart" method="post">
                                            <fieldset>
                                                <input type="hidden" name="tensanpham" value="<?php echo $sanpham['tensp'] ?>" />
                                                <input type="hidden" name="sanpham_id" value="<?php echo $sanpham['masp'] ?>" />
                                                <input type="hidden" name="giasanpham" value="<?php echo $sanpham['dongia'] ?>" />
                                                <input type="hidden" name="hinhanh" value="<?php echo $sanpham['hinh'] ?>" />
                                                <input type="hidden" name="soluong" value="1" />			
                                                <input type="submit" name="themgiohang" value="Buy Now" class="button" />
                                            </fieldset>
                                        </form>
                                    </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Th??ng tin s???n ph???m</h4>
                                        <p>
                                            <?php echo $sanpham['thongtin'];?> 
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Xu???t s???</h4>
                                        <ul>
                                            <li><?php echo $sanpham['xuatsu'];?></li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                    <?php $cmts = $db->exeQuery("select * from comment where masp like '$loai'");	
                                    foreach($cmts as $cmt)
                                    {
                                        ?>
                                        <div class="reviews-submitted">
                                            <div class="reviewer"><?php echo $cmt['name'];?><span><?php echo $cmt['ngaydang'];?></span></div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                            <?php echo $cmt['comment'];?>
                                            </p>
                                        </div>
                                        <?php }?>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <div class="ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <div class="row form">
                                            <form action="#" method="post" id="commentform">
                                                <div class="col-sm-6">
                                                    <input type="text" id="hoten" name="hoten"  class="form-control" placeholder="T??n c???a b???n">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="email" name="email" size="40" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea name="comment" cols="40" rows="5" class="form-control" placeholder="Th??ng ??i???p"></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" name="submit">Submit</button>
                                                    </form>
                                                    <?php
			try{
				$pdh = new PDO("mysql:host=localhost; dbname=doanchuyennganh"  , "root"  , ""  );
				$pdh->query("  set names 'utf8'"  );
				}
				catch(Exception $e){
						echo $e->getMessage(); exit;
				}
			if (isset($_POST["submit"]))
			{
				$sql="insert into comment(masp, name, email, comment) values(:$loai, :hoten, :email, :comment) ";
				$arr = array($sanpham['masp']=>$loai,":hoten"=>$_POST["hoten"],":email"=>$_POST["email"],":comment"=>$_POST["comment"]);
				$stm= $pdh->prepare($sql);
				$stm->execute($arr);
				$n = $stm->rowCount();
				$message = "Th??m tha??nh c??ng";
                $error = "L????i th??m";
                if ($n>0) echo "<script type='text/javascript'>alert('$message');</script>";
                else echo  "<script type='text/javascript'>alert('$error');</script>";
			}?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


	  <?php } ?>
	  