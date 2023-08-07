<?php $menuList = queryMenuList($db); ?>


<h2>Menu Manage
    <button class="btn btn-primary btn-sm" onclick="window.location.href='?page=menuedit'">新增</button>
</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>标题</th>
                <th>图标</th>
                <th>颜色</th>
                <th>是否展示</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($menuList); $i++) { ?>
                <?php $menuInfo = (object)$menuList[$i]; ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td style="color: <?php echo $menuInfo->color ?>;<?php if (in_array($menuInfo->color, array('#FFF', '#FFFFFF', '#fff', '#ffffff'))) echo "text-shadow:0 0 4px black;" ?>"><?php echo $menuInfo->title ?></td>
                    <td>
                        <?php if (preg_match('/^icon-/', $menuInfo->icon) == 1) { ?><i class="iconfont <?php echo $menuInfo->icon ?> mr-2"></i><?php } ?>
                        <?php if (preg_match('/^fa-/', $menuInfo->icon) == 1) { ?><i class="<?php echo $menuInfo->icon ?> mr-2"></i><?php } ?>
                        <?php if (preg_match('/^http/', $menuInfo->icon) == 1) { ?><i class="online-icon mr-2" style="background-image: url('<?php echo $menuInfo->icon ?>');"></i><?php } ?>
                        <?php echo $menuInfo->icon ?></td>
                    <td>
                        <span style="padding: 6px;display: inline-block;border: solid 1px;background: <?php echo $menuInfo->color ?>"></span>
                        <?php echo $menuInfo->color ?>
                    </td>
                    <td><?php echo $menuInfo->is_nav == 1 ? '✔️' : '❌' ?></td>
                    <td><?php echo $menuInfo->orders ?></td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm" onclick="window.location.href='?page=menu-item&menuid=<?php echo $menuInfo->id ?>'">子项</button>
                        <button type="button" class="btn btn-link btn-sm" onclick="window.location.href='?page=menuedit&id=<?php echo $menuInfo->id ?>'">编辑</button>
                        <button type="button" class="btn btn-link btn-sm removeBtn">删除</button>
                        <span class="removeNext">
                            <button type="button" class="btn btn-link btn-sm removeOk" op="removeMenu" for="<?php echo $menuInfo->id ?>">确定删除</button>
                            <button type="button" class="btn btn-link btn-sm removeExit">取消删除</button>
                        </span>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<hr>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Warning：</h4>
    <p>菜单，右侧菜单抽屉页面，即为点击页面右上角三条横杠弹出的抽屉页面。</p>
    <p>关于图标：图标有三种模式，Iconfont，Font Awesome，图片网址；</p>
    <p class="ml-4">- Iconfont图标配置参考：https://www.iconfont.cn/help/detail?helptype=code，需自行添加代码引用后使用，方可生效。</p>
    <p class="ml-4">- Font Awesome图标，进入：https://fontawesome.com/icons，直接找图标就行，找到图标后复制代码，例如：<code>&lt;i class="fa-solid fa-house"&gt;&lt;/i&gt;</code>，但是输入框里请只输入：<code>fa-solid fa-house</code>部分。</p>
    <p class="ml-4">- 图片网址，直接输入图片地址就行，可以使用免费图床上传图标，也可以某网站看其<code>&lt;header&gt;</code>中的图标，若无则默认为<code>https://xxx.com/favicon.ico</code>，填入输入框即可。</p>
    <p class="ml-4">注意：图标输入框前不要有空格。</p>
    <p>是否展示：右侧菜单顶部为菜单导航，展示的是所有菜单分类，若某个菜单分类不希望展示为导航（例如第一个Abort），则选择不展示。</p>
    <p>排序：序号越小，展示越靠前。</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>