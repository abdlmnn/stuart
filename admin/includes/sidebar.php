<?php if(isset($_SESSION['authenticated'])) : ?>
<?php
    $title = 'Sidenav';

    include_once 'codes/authentication-code.php';
    
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
?>
<div class="main-content">
    <aside id="sidebar">
        <?php if(isset($_SESSION['authenticated'])) : ?>
        <ul>
            <li>
                <span class="logo">Stuart Boutique</span>
                <button onclick="toggleSidebar()" id="toggle-btn">
                    <ion-icon name="chevron-back-outline" class="open-icon"></ion-icon>
                </button>
            </li>
            <li class="<?= $page == 'view-dashboard.php' ? 'active':'' ?>">
                <a href="view-dashboard.php">
                    <ion-icon name="tv-outline" class="icons"></ion-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="<?= $page == 'view-orders.php' ? 'active':'' ?>">
                <a href="view-order.php">
                    <ion-icon name="bag-outline" class="icons"></ion-icon>
                    <!-- <i class="fa-solid fa-bag-shopping icons"></i> -->
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <button onclick="toggleSubMenu(this)" class="dropdown-btn">
                    <ion-icon name="shirt-outline" class="icons"></ion-icon>
                    <!-- <i class="fa-solid fa-shirt icons"></i> -->
                    <span>Categories</span>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </button>
                <ul class="sub-menu">
                    <div class="child-menu">
                        <li class="<?= $page == 'add-categories.php' ? 'active':'' ?>">
                            <a href="add-categories.php">Add Category</a>
                        </li>
                        <li class="<?= $page == 'add-subcategories.php' ? 'active':'' ?>">
                            <a href="add-subcategories.php">Add Subcategory</a>
                        </li>
                        <li class="<?= $page == 'view-categories.php' ? 'active':'' ?>">
                            <a href="view-categories.php">View</a>
                        </li>
                    </div>
                </ul>
            </li>
            <li>
                <button onclick="toggleSubMenu(this)" class="dropdown-btn">
                    <!-- <ion-icon name="shirt-outline" class="icons"></ion-icon> -->
                    <!-- <i class="fa-solid fa-ruler-horizontal"></i> -->
                    <ion-icon name="resize-outline" class="icons"></ion-icon>
                    <span>Sizes</span>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </button>
                <ul class="sub-menu">
                    <div class="child-menu">
                        <li class="<?= $page == 'add-size.php' ? 'active':'' ?>">
                            <a href="add-size.php">Add</a>
                        </li>
                        <li class="<?= $page == 'view-size.php' ? 'active':'' ?>">
                            <a href="view-size.php">View</a>
                        </li>
                    </div>
                </ul>
            </li>
            <li>
                <button onclick="toggleSubMenu(this)" class="dropdown-btn">
                    <ion-icon name="cube-outline" class="icons"></ion-icon>
                    <span>Inventory</span>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </button>
                <ul class="sub-menu">
                    <div class="child-menu">
                        <li class="<?= $page == 'add-inventory.php' ? 'active':'' ?>">
                            <a href="add-inventory.php">Add</a>
                        </li>
                        <li class="<?= $page == 'view-inventory.php' ? 'active':'' ?>">
                            <a href="view-inventory.php">View</a>
                        </li>
                    </div>
                </ul>
            </li>
            <li>
                <button onclick="toggleSubMenu(this)" class="dropdown-btn">
                    <ion-icon name="stats-chart-outline" class="icons"></ion-icon>
                    <span>Reports</span>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </button>
                <ul class="sub-menu">
                    <div class="child-menu">
                        <li class="<?= $page == 'view-sales-report.php' ? 'active':'' ?>">
                            <a href="view-sales-report.php">Sales</a>
                        </li>
                        <li class="<?= $page == 'view-inventory-report.php' ? 'active':'' ?>">
                            <a href="view-inventory-report.php">Inventory</a>
                        </li>
                    </div>
                </ul>
            </li>
                <button onclick="toggleSubMenu(this)" class="dropdown-btn">
                    <ion-icon name="people-outline" class="icons"></ion-icon>
                    <span>Users</span>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </button>
                <ul class="sub-menu">
                    <div class="child-menu">
                        <li class="<?= $page == 'add-users.php' ? 'active':'' ?>">
                            <a href="add-users.php">Add</a>
                        </li>
                        <li class="<?= $page == 'view-users.php' ? 'active':'' ?>">
                            <a href="view-users.php">View</a>
                        </li>
                    </div>
                </ul>
            </li>
            <li class="<?= $page == 'view-profile.php' ? 'active':'' ?>">
                <a href="view-profile.php">
                    <ion-icon name="person-outline" class="icons"></ion-icon>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <form action="" method="post">
                    <button type="submit" name="logout-button" class="dropdown-btn">
                        <ion-icon name="log-out-outline" class="icons"></ion-icon>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
        <?php
            endif;
        ?>
    </aside>
<?php endif; ?>