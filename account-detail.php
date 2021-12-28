<?php 

$sachDB=new Sach();
        if (isset($_SESSION['email']) && $_SESSION['email']){
            $email=$_SESSION['email'];
            $sachs=$db->exeQuery("select * from khachhang where email = '$email'");
            foreach ($sachs as $sach){?>
<div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="<?php echo $sach['tenkh'];?>">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="<?php echo $sach['dienthoai'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="<?php echo $sach['email'];?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="<?php echo $sach['diachi'];?>">
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