<?php
include 'function.php';

$db = db();

// session
session_start();
?>
<html lang="zh-CN">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link bootstrap4 css -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- link style css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- 图标 -->
    <link rel="stylesheet" href="/css/font/iconfont.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1230786_gdvd1b4wlz.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1572019_yrk10qvz.css">

    <!-- script bootstrap4 js -->
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- script sweetalert js -->
    <script src="./js/sweetalert.min.js"></script>
    <!-- script GVerify js -->
    <script src="./js/gVerify.js"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/c5d51d0008.js" crossorigin="anonymous"></script>

    <?php if (empty($_SESSION['user']) || empty($_SESSION['user']->username)) { ?>

        <link href="./css/login.css" rel="stylesheet">
        <script src="./js/login.js"></script>
        <title>登录</title>

    <?php } else {  ?>

        <link href="./css/dashboard.css" rel="stylesheet">
        <script src="./js/main.js"></script>
        <!-- 颜色选择器 -->
        <link rel="stylesheet" href="./css/bootstrap-colorpicker.css">
        <script src="./js/bootstrap-colorpicker.js"></script>
        <title><?php echo empty($_GET['page']) ? '' : ($_GET['page'] . ' | ') ?>后台管理</title>

    <?php } ?>
</head>

<body>

    <?php if (empty($_SESSION['user']) || empty($_SESSION['user']->username)) {

        include './blade/login.php';
    } else {

        include './blade/nav.php';
    ?>
        <div class="container-fluid">
            <div class="row">

                <?php include './blade/sidebar.php' ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <?php
                    // 主页
                    if (empty($_GET['page'])) {

                        include './blade/dashboard.php';
                    }

                    // 菜单管理
                    else if (strcmp($_GET['page'], 'menu') == 0) {

                        include './blade/menu.php';
                    } else if (strcmp($_GET['page'], 'menuedit') == 0) {

                        include './blade/menuedit.php';
                    } else if (strcmp($_GET['page'], 'menu-item') == 0) {

                        include './blade/menu-item.php';
                    } else if (strcmp($_GET['page'], 'menu-itemedit') == 0) {

                        include './blade/menu-itemedit.php';
                    }

                    // 搜索引擎管理
                    else if (strcmp($_GET['page'], 'engine-class') == 0) {

                        include './blade/engine-class.php';
                    } else if (strcmp($_GET['page'], 'engine-classedit') == 0) {

                        include './blade/engine-classedit.php';
                    } else if (strcmp($_GET['page'], 'engine') == 0) {

                        include './blade/engine.php';
                    } else if (strcmp($_GET['page'], 'engineedit') == 0) {

                        include './blade/engineedit.php';
                    }

                    // 壁纸管理
                    else if (strcmp($_GET['page'], 'wallpaper') == 0) {

                        include './blade/wallpaper.php';
                    }

                    // 小组件管理
                    else if (strcmp($_GET['page'], 'widget') == 0) {

                        include './blade/widget.php';
                    } else if (strcmp($_GET['page'], 'widgetedit') == 0) {

                        include './blade/widgetedit.php';
                    }

                    // 错误页
                    else { ?>
                        <h2>Error page</h2>
                        <p>这里什么都没有...</p>
                    <?php } ?>
                </main>
            </div>
        </div>
    <?php } ?>
</body>

</html>