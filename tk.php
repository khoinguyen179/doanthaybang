<?php
                                    if ($db->getrowcount($KQ) <> 0) {
                                        foreach($KQ as $sach)
                                        {
                                            $num=$sach['dongia'];
                                            $formattedNum = number_format($num);
                                            ?>

                                                <div class="col-md-4">
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
                                                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i><form action="cart.php?mod=cart" method="post">
                                                                    <fieldset>
                                                                        <input type="hidden" name="tensanpham" value="<?php echo $sach['tensp'] ?>" />
                                                                        <input type="hidden" name="sanpham_id" value="<?php echo $sach['masp'] ?>" />
                                                                        <input type="hidden" name="giasanpham" value="<?php echo $sach['dongia'] ?>" />
                                                                        <input type="hidden" name="hinhanh" value="<?php echo $sach['hinh'] ?>" />
                                                                        <input type="hidden" name="soluong" value="1" />			
                                                                        <input type="submit" name="themgiohang" value="Buy Now" class="button" background=""/>
                                                                    </fieldset>
                                                                </form></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                        } ?>
                        </div>