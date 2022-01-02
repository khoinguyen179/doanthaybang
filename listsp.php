<style>
    input.button {
    border: 0;
    background: unset;
    color: unset;
}
</style>
<?php
$sanphamDB=new Sanpham();
if(isset($_GET['loai']))
{ 
    $tongsanpham=$sanphamDB->tongSosanpham1Loai($_GET['loai']);
}else
{
    $tongsanpham=$sanphamDB->tongSosanpham();
}
$page=isset($_GET['p'])?$_GET['p']:1;
$bd=($page-1)*sanpham_1_TRANG;

$sanphams=$db->exeQuery("select * from sanpham order by masp limit $bd,".sanpham_1_TRANG);

foreach($sanphams as $sanpham)
{
    $num=$sanpham['dongia'];
    $formattedNum = number_format($num);
?>

                        <div class="col-md-4">
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
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
 <?php } ?>
</div>
<!--Hien thi so trang -->
