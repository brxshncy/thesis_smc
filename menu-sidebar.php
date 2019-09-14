  <!-- MENU SIDEBAR-->
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
                            <a href="pcr-record.php">
                                <i class="fas fa-files-o"></i>Patient Care Report
                            </a>
                        </li>

                        <li>
                            <a href="pcr-addteam.php">
                            <i class="fas fa-ambulance"></i>Assign Team
                        </a>
                        </li>

                        <li>
                            <a href="operation_attendance.php">
                            <i class="far fa-clipboard"></i>Rescuer Attendance
                        </a>
                        </li>

                         <li>
                            <a href="operation_logbook.php">
                                <i class="fas fa-user-md"></i>Rescuer Activity Log </a>
                        </li>
                       <li>
                            <a href="locator_request.php">
                                <i class="fa fa-archive"></i>
                                    Locator Slip Requests 
                                    <?php
                                        include 'include/db.php';
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
                            <a href="operation_chart.php">
                            <i class="fas  fa-bar-chart-o"></i>Chart
                        </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->