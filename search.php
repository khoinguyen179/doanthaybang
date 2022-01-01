<?php
$tieude = getIndex("proname");	
$sql_product=$db->exeQuery("select * from sanpham where tensp like '%$tieude%'" );
foreach($sql_product as $sp)
{
    $num=$sp['dongia'];
    $formattedNum = number_format($num);
?>

                        <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?mod=product&ac=catalog&id=<?php echo $sp["masp"];?>"><?php echo $sp['tensp'];?></a>
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
                                            <img src="img/sp/<?php echo $sp['hinh'];?>" alt="Product Image">
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
</div>