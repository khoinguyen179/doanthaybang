<?php 

$sanphamDB=new Sanpham();
        if (isset($_SESSION['email']) && $_SESSION['email']){
            $email=$_SESSION['email'];
            $sanphams=$db->exeQuery("select * from khachhang where email = '$email'");
            foreach ($sanphams as $sanpham){?>
<div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="<?php echo $sanpham['tenkh'];?>">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="<?php echo $sanpham['dienthoai'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="<?php echo $sanpham['email'];?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="<?php echo $sanpham['diachi'];?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                            ?>