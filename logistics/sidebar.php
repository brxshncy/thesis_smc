  <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/icddrmo.png" width="150" height="30" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li><a href="logistics_index.php">
                                <i class="fas fa-tasks"></i>Dashboard
                            </a>
                        </li>
                         <li><a href="logistics_in_items.php">
                                <i class="fas fa-arrow-circle-right"></i>In-Items
                            </a>
                        </li>
                        <li><a href="logistics_out_items.php">
                                <i class="fas fa-arrow-circle-left"></i>Out-Items
                            </a>
                        </li>
                        <li><a href="inventory_logs.php">
                                <i class="fas fa-folder-open"></i>Activity Logs
                            </a>
                        </li>
                        <li><a href="logistics_requestitem.php">
                                <i class="fas fa-bell"></i>Request
                                <?php 
                                    $select = "SELECT * FROM opr_item_request WHERE status = 'unread' ";
                                    $result = $conn->query($select) OR trigger_error(mysqli_error($conn)." ".$select);
                                    $notification = mysqli_num_rows($result);
                                ?>
                                <span class="badge badge-danger"> <?php echo $notification; ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->