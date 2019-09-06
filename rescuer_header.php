<?php  session_start();
$username = $_SESSION['confirm_username'];
 ?>
<header class="header-desktop">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="header-wrap">
<form class="form-header" action="" method="POST">   
</form>
<div class="header-button">
    <div class="noti-wrap">
        <div class="noti__item js-item-menu">
            <i class="zmdi zmdi-comment-more"></i>
            <span class="quantity"></span>
        <div class="mess-dropdown js-dropdown mr-2">                                 
        </div>
        </div>
        <div class="noti__item js-item-menu">
            <i class="zmdi zmdi-email"></i>
            <span class="quantity"></span>                               
        </div>
        <div class="noti__item js-item-menu">
            <i class="zmdi zmdi-notifications"></i>
            <?php 
                include 'include/db.php'; 
                $query = "SELECT * FROM locatorslip_record WHERE username = '$username' AND status= 'unread' ";
                $result = $conn->query($query);
                $count_status = mysqli_num_rows($result);
                if($count_status > 0){
            ?>
            <span class="quantity"><?php echo $count_status; ?></span>
            <?php
                }
            ?>
        </div>
</div>















                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Bruce Real</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">ICDRRMO Admin</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="operation_logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>