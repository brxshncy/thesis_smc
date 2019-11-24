  <!-- MENU SIDEBAR-->
  <?php include 'include/db.php';?>
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/icddrmo.png" width="150" height="30" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="operation_index.php">
                                <i class="fas fa-tasks"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="rescuer_registration.php">
                                <i class="fas fa-user"></i>
                                Add Rescuers
                            </a>
                         </li>
                          <li>
                            <a href="pcr-addteam.php">
                                <i class="fas fa-ambulance"></i>Manage Team
                            </a>
                        </li>
                         <li>
                            <a href="pcr-record.php">
                                <i class="fas fa-files-o"></i>PCR Records
                            </a>
                        </li>
                        <li>
                            <a href="operation_attendance.php">
                            <i class="fas fa-clipboard"></i>Rescuer Attendance
                        </a>
                        </li>
                       <li>
                            <a href="locator_request.php">
                                <i class="fa fa-archive"></i>
                                    Locator Slip Requests 
                                    <?php
                                        $qry = "SELECT * FROM locatorslip_request WHERE status = 'unread' ";
                                        $result = $conn->query($qry);
                                        $count_status = mysqli_num_rows($result);
                                        if($count_status>0){
                                    ?>
                                    <span class="badge badge-danger"><?php echo $count_status; ?> </span>
                                    <?php
                                         }
                                    ?>
                            </a>
                        </li>
                        <li>
                            <a href="locator_request.php">
                               <i class="fas fa-chart-bar"></i>
                                    Statistics Report
                            </a>
                        </li>
                        <li>
                           <a href="operation_logout.php">
                           <i class="fas fa-sign-out-alt"></i></i>Log Out
                        </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->