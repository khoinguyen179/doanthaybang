
<?php
$sanphamDB=new Sanpham();
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

$sanphams=$db->exeQuery("select * from sanpham order by luotxem limit 5");

foreach($sanphams as $sanpham)
{
    $num=$sanpham['dongia'];
    $formattedNum = number_format($num);
?>

<div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?mod=product&ac=catalog&id=<?php echo $sanpham["masp"];?>"><?php echo $sanpham['tensp'];?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/sp/<?php echo $sanpham['hinh'];?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                    <h3><?php echo $formattedNum; ?><span>đ</span></h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i><form action="cart.php?mod=cart" method="post">
                                            <fieldset>
                                                <input type="hidden" name="tensanpham" value="<?php echo $sanpham['tensp'] ?>" />
                                                <input type="hidden" name="sanpham_id" value="<?php echo $sanpham['masp'] ?>" />
                                                <input type="hidden" name="giasanpham" value="<?php echo $sanpham['dongia'] ?>" />
                                                <input type="hidden" name="hinhanh" value="<?php echo $sanpham['hinh'] ?>" />
                                                <input type="hidden" name="soluong" value="1" />			
                                                <input type="submit" name="themgiohang" value="Buy Now" class="button" />
                                            </fieldset>
                                        </form></a>
                                    </div>
                                </div>
 <?php } ?>

<!--Hien thi so trang -->
