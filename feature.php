
<?php
$sachDB=new Sach();
if(isset($_GET['loai']))
{ 
    //$tam=$db->exeQuery("select count(*) from sach where maloai=?",array($_GET['loai']),PDO::FETCH_NUM);
    $tongSach=$sachDB->tongSoSach1Loai($_GET['loai']);
}else
{
    //$tam=$db->exeQuery("select count(*) from sach",array(),PDO::FETCH_NUM);
    $tongSach=$sachDB->tongSoSach();
}
//$tongSach=$tam[0][0];
$page=isset($_GET['p'])?$_GET['p']:1;
$bd=($page-1)*SACH_1_TRANG;

$sachs=$db->exeQuery("select * from sanpham order by luotxem desc  limit 5");

foreach($sachs as $sach)
{
    $num=$sach['dongia'];
    $formattedNum = number_format($num);
?>

                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="product-detail.php?mod=product&ac=catalog&id=<?php echo $sach["masp"];?>"><?php echo $sach['tensp'];?></a>
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
                                    <img src="img/sp/<?php echo $sach['hinh'];?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo $formattedNum; ?><span>đ</span></h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
 <?php } ?>
<!--Hien thi so trang -->
