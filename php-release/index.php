<?php
include './admin/function.php';

$db = db();
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="Cache-Control" content="no-siteapp">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-touch-fullscreen" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="full-screen" content="yes">
      <!-- UC强制全屏 -->
      <meta name="browsermode" content="application">
      <!-- UC应用模式 -->
      <meta name="x5-fullscreen" content="true">
      <!-- QQ强制全屏 -->
      <meta name="x5-page-mode" content="app">
      <!-- QQ应用模式 -->
      <title>Search | by Cat. Lucki~</title>
      <meta name="keywords" content="Lucki,Cat,lucki.top,happy family,search">
      <meta name="description" content="Cat Lucki's Website.">
      <!-- 图标 -->
      <link rel="icon" href="//s1.ax1x.com/2023/08/07/pPEPA0K.png" sizes="32x32">
      <link rel="icon" href="//s1.ax1x.com/2023/08/07/pPEPA0K.png" sizes="192x192">
      <link rel="shortcut icon" href="//s1.ax1x.com/2023/08/07/pPEPA0K.png" type="image/x-icon">
      <link rel="apple-touch-icon" href="//s1.ax1x.com/2023/08/07/pPEPA0K.png">
      <meta name="msapplication-TileImage" content="//s1.ax1x.com/2023/08/07/pPEPA0K.png">


      <!-- JavaScript -->
      <script src="/js/jquery.min.js"></script>
      <script src="//at.alicdn.com/t/font_400990_j21lstb4wx.js"></script>
      <!-- index.js -->
      <script src="/js/index.js"></script>
      <!-- fontawesome -->
      <script src="https://kit.fontawesome.com/c5d51d0008.js" crossorigin="anonymous"></script>
      <script>
            // 优先加载壁纸
            document.querySelector("body").style.backgroundImage = `url("${window.localStorage.getItem("superSearchBg")}")`
      </script>

      <!-- CSS stylesheet -->
      <link rel="stylesheet" href="//at.alicdn.com/t/font_1230786_gdvd1b4wlz.css">
      <link rel="stylesheet" href="//at.alicdn.com/t/font_1572019_yrk10qvz.css">
      <!--引入霞鹜文楷字体-->
      <link rel="stylesheet" href="https://npm.elemecdn.com/lxgw-wenkai-webfont@1.1.0/lxgwwenkai-regular.css">
      <!-- 引用下载的图标css -->
      <link rel="stylesheet" href="/css/font/iconfont.css">
      <!-- index.css -->
      <link rel="stylesheet" href="/css/style.css">


</head>

<body>


      <!-- 右侧菜单图标 -->
      <div id="menu"><i></i></div>

      <!-- 右侧菜单内容体 -->
      <div class="menu-body closed">
            <?php $menuList = queryMenuList($db); ?>

            <!-- 右侧菜单内容体-顶部 -->
            <header>

                  <!-- 导航 -->
                  <nav class=" menu-nav">
                        <ul class="menu-nav-list">

                              <?php /********** 菜单项导航 ************/ ?>
                              <?php for ($i = 0; $i < count($menuList); $i++) {
                                    $menuInfo = (object)$menuList[$i];
                                    if ($menuInfo->is_nav == 0) continue;
                              ?>
                                    <li><a href="#<?php echo $menuInfo->title ?>"><span size="2" style="color: <?php echo $menuInfo->color ?>;"><?php echo $menuInfo->title ?></span></a></li>
                              <?php } ?>

                        </ul>
                  </nav>

            </header>

            <?php /********** 菜单项列表 ************/ ?>
            <?php for ($i = 0; $i < count($menuList); $i++) {
                  $menuInfo = (object)$menuList[$i];
                  $menuItemList = queryMenuItemList($db, $menuInfo->id);
                  $widgetList = queryWidgetListWithQuery($db, $menuInfo->id);
            ?>
                  <!-- <?php echo $menuInfo->title ?> -->

                  <section>
                        <header class="title" id="<?php echo $menuInfo->title ?>">
                              <?php if (preg_match('/^icon-/', $menuInfo->icon) == 1) { ?><i class="iconfont <?php echo $menuInfo->icon ?>"></i><?php } ?>
                              <?php if (preg_match('/^fa-/', $menuInfo->icon) == 1) { ?><i class="<?php echo $menuInfo->icon ?>"></i><?php } ?>
                              <?php if (preg_match('/^http/', $menuInfo->icon) == 1) { ?><i class="online-icon" style="background-image: url('<?php echo $menuInfo->icon ?>');"></i><?php } ?>
                              <?php echo $menuInfo->title ?>
                        </header>
                        <ul>

                              <?php /********** 菜单项列表详情 ************/ ?>
                              <?php for ($j = 0; $j < count($menuItemList); $j++) {
                                    $menu = (object)$menuItemList[$j];
                              ?>
                                    <li>
                                          <a rel="nofollow" href="<?php echo $menu->link ?>" target="_blank">
                                                <?php if (preg_match('/^icon-/', $menu->icon) == 1) { ?><i class="iconfont <?php echo $menu->icon ?>" style="color: <?php echo $menu->color ?>;"></i><?php } ?>
                                                <?php if (preg_match('/^fa-/', $menu->icon) == 1) { ?><i class="<?php echo $menu->icon ?>" style="color: <?php echo $menu->color ?>;"></i><?php } ?>
                                                <?php if (preg_match('/^http/', $menu->icon) == 1) { ?><i class="online-icon" style="background-image: url('<?php echo $menu->icon ?>');"></i><?php } ?>
                                                <?php echo $menu->name ?>
                                          </a>
                                    </li>
                              <?php } ?>

                        </ul>

                        <?php /********** 菜单项下的小组件 ************/ ?>
                        <?php for ($k = 0; $k < count($widgetList); $k++) {
                              echo "<!-- 小组件：" . $widgetList[$k]['name'] . " -->";
                              echo $widgetList[$k]['code'];
                        } ?>

                  </section>

            <?php } ?>

            <!-- 背景图 -->
            <section>

                  <?php /********** 背景图列表 ************/ ?>
                  <?php $wallpapers = read_dir("./upload/"); ?>
                  <?php foreach ($wallpapers as $key => $wallpaper) { ?>
                        <?php if (!is_array($wallpaper)) { ?>
                              <img src="/upload/<?php echo $wallpaper ?>" class="bgimg" width="75" height="40">
                        <?php } ?>
                  <?php } ?>

            </section>

            <section>
                  <label><strong><a href="/admin" style="color: #FFF">后台管理</a></strong></label>
            </section>

      </div>


      <!-- 搜索栏 -->
      <div id="search" class="s-search">
            <?php $classList = queryEngineClassList($db); ?>

            <!-- 搜索引擎选择 -->
            <div id="search-list" class="hide-type-list">
                  <div class="s-type">
                        <div class="s-type-list">

                              <?php /********** 搜索引擎分类列表 ************/ ?>
                              <?php for ($i = 0; $i < count($classList); $i++) { ?>
                                    <label for="engine-type-<?php echo $classList[$i]['id'] . '-' . str_replace(' ', '', $classList[$i]['first_engine']) ?>"><?php echo $classList[$i]['title'] ?></label>
                              <?php } ?>

                        </div>
                  </div>


                  <?php /********** 搜索引擎分类列表 ************/ ?>
                  <?php for ($i = 0; $i < count($classList); $i++) {
                        $engineList = queryEngineList($db, $classList[$i]['id']);
                  ?>

                        <div class="search-group group-<?php echo $i ?> <?php if ($i == 0) echo 's-current' ?>">

                              <span class="type-text"><?php echo $classList[$i]['title'] ?></span>
                              <ul class="search-type">

                                    <?php /********** 搜素引擎列表 ************/ ?>
                                    <?php for ($j = 0; $j < count($engineList); $j++) {
                                          $engine = (object)$engineList[$j];
                                    ?>
                                          <li>
                                                <input type="radio" name="type" id="engine-type-<?php echo $classList[$i]['id'] . '-' . str_replace(' ', '', $engine->id) ?>" value="<?php echo $engine->link ?>" data-placeholder="<?php echo $engine->placeholder ?>">
                                                <label for="engine-type-<?php echo $classList[$i]['id'] . '-' . str_replace(' ', '', $engine->id) ?>">
                                                      <span><?php echo $engine->name ?></span>
                                                </label>
                                          </li>
                                    <?php } ?>

                              </ul>
                        </div>

                  <?php } ?>

            </div>

            <!-- 搜索输入框 -->
            <form id="super-search-fm" action="" method="get" target="_blank">
                  <input id="search-text" type="text" autocomplete="off">
                  <button type="submit"><i class="online-icon" style="background-image: url(/image/search.png);"></i></button>
                  <ul id="search-sug"></ul>
            </form>
      </div>


      <!-- 网页底部 -->
      <footer id="footer">
            <p id="copyright"> Copyright © 2023. All rights reserved. </p>
      </footer>

      <!-- 网页组件 -->
      <div id="plugin">

            <?php /********** 小组件列表 ************/ ?>
            <?php $pluginList = queryWidgetListWithQuery($db);
            for ($k = 0; $k < count($pluginList); $k++) {
                  echo "<!-- 小组件：" . $pluginList[$k]['name'] . " -->";
                  echo $pluginList[$k]['code'];
            } ?>

      </div>

</body>

</html>