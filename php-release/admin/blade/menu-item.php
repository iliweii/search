<?php $menuInfo = empty($_GET['menuid']) ? null : queryMenuInfo($db, $_GET['menuid']) ?>
<?php $menuList = empty($_GET['menuid']) ? array() : queryMenuItemList($db, $_GET['menuid']) ?>


<h2>Menu Item Manage <?php echo empty($menuInfo->title) ? '' : (' > ' . $menuInfo->title) ?>
    <?php if (!empty($menuInfo->title)) { ?>
        <button class="btn btn-primary btn-sm" onclick="window.location.href='?page=menu-itemedit&menu_id=<?php echo $menuInfo->id ?>'">新增</button>
    <?php } ?>
</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>名称</th>
                <th>链接</th>
                <th>图标</th>
                <th>颜色</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($menuList); $i++) { ?>
                <?php $menuInfo = (object)$menuList[$i]; ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $menuInfo->name ?></td>
                    <td><a href="<?php echo $menuInfo->link ?>" target="_blank" rel="noopener noreferrer"><?php echo $menuInfo->link ?></a></td>
                    <td>
                        <?php if (preg_match('/^icon-/', $menuInfo->icon) == 1) { ?><i class="iconfont <?php echo $menuInfo->icon ?> mr-2" style="color: <?php echo $menuInfo->color ?>"></i><?php } ?>
                        <?php if (preg_match('/^fa-/', $menuInfo->icon) == 1) { ?><i class="<?php echo $menuInfo->icon ?> mr-2" style="color: <?php echo $menuInfo->color ?>"></i><?php } ?>
                        <?php if (preg_match('/^http/', $menuInfo->icon) == 1) { ?><i class="online-icon mr-2" style="background-image: url('<?php echo $menuInfo->icon ?>');"></i><?php } ?>
                        <?php echo $menuInfo->icon ?>
                    </td>
                    <td>
                        <span style="padding: 6px;display: inline-block;border: solid 1px;background: <?php echo $menuInfo->color ?>"></span>
                        <?php echo $menuInfo->color ?>
                    </td>
                    <td><?php echo $menuInfo->orders ?></td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm" onclick="window.location.href='?page=menu-itemedit&id=<?php echo $menuInfo->id ?>'">编辑</button>
                        <button type="button" class="btn btn-link btn-sm removeBtn">删除</button>
                        <span class="removeNext">
                            <button type="button" class="btn btn-link btn-sm removeOk" op="removeMenuItem" for="<?php echo $menuInfo->id ?>">确定删除</button>
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
    <p>关于图标：图标有三种模式，Iconfont，Font Awesome，图片网址；</p>
    <p class="ml-4">- Iconfont图标配置参考：https://www.iconfont.cn/help/detail?helptype=code，需自行添加代码引用后使用，方可生效。</p>
    <p class="ml-4">- Font Awesome图标，进入：https://fontawesome.com/icons，直接找图标就行，找到图标后复制代码，例如：<code>&lt;i class="fa-solid fa-house"&gt;&lt;/i&gt;</code>，但是输入框里请只输入：<code>fa-solid fa-house</code>部分。</p>
    <p class="ml-4">- 图片网址，直接输入图片地址就行，可以使用免费图床上传图标，也可以某网站看其<code>&lt;header&gt;</code>中的图标，若无则默认为<code>https://xxx.com/favicon.ico</code>，填入输入框即可。</p>
    <p class="ml-4">注意：图标输入框前不要有空格。</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>