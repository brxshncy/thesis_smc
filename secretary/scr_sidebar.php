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
                            <a href="operation_secretary.php">
                                <i class="fas fa-files-o"></i>PCR Records
                            </a>
                        </li>
                          <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Statistics Reports</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="brgy_stats.php">Barangay Responses</a>
                                </li>
                                <li>
                                    <a href="incident_stats.php">Incident Reports</a>
                                </li>
                            </ul>
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