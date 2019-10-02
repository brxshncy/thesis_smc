<!-- MENU SIDEBAR-->
<?php  
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['confirm_username'];


 ?>
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                         <li>
                           <a href="rescuer_index.php">
                            <i class="fas fa-tachometer-alt"></i></i>Dashboard
                        </a>
                        </li>
                        <li>
                           <a href="pcr-form.php">
                            <i class="fas fa-files-o"></i>Patient Care Report
                        </a>
                        </li>
                        <li>
                           <a href="locator_slip.php">
                            <i class="fas  fa-archive"></i>Request Locator Slip
                        </a>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-bell"></i>
                                Notification
                                <?php 
                                include 'include/db.php'; 
                                $query = "SELECT * FROM locatorslip_record WHERE username = '$username' AND status= 'unread' ";
                                $result = $conn->query($query);
                                $count_status = mysqli_num_rows($result);
                                if($count_status > 0){
                            ?>
                                 <span class="badge badge-danger"><?php echo $count_status; ?></span>
                            <?php } ?> 
                        </a>
                        </li>
                        <li>
                           <a href="rescuer_profile.php">
                            <i class="fas  fa-user"></i>View Profile
                        </a>
                        </li>
                        <li>
                           <a href="rescuer_logout.php">
                           <i class="fas fa-sign-out-alt"></i></i>Log Out
                        </a>
                        </li>


                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->