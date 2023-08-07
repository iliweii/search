<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo empty($_GET['page']) ? 'active' : '' ?>" href="./">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo !empty($_GET['page']) && strcmp($_GET['page'], 'menu') == 0 ? 'active' : '' ?>" href="?page=menu">
                    <span data-feather="file"></span>
                    Menu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo !empty($_GET['page']) && strcmp($_GET['page'], 'engine-class') == 0 ? 'active' : '' ?>" href="?page=engine-class">
                    <span data-feather="file"></span>
                    Engine
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo !empty($_GET['page']) && strcmp($_GET['page'], 'wallpaper') == 0 ? 'active' : '' ?>" href="?page=wallpaper">
                    <span data-feather="file"></span>
                    Wallpaper
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo !empty($_GET['page']) && strcmp($_GET['page'], 'widget') == 0 ? 'active' : '' ?>" href="?page=widget">
                    <span data-feather="file"></span>
                    Widget
                </a>
            </li>
        </ul>
    </div>
</nav>