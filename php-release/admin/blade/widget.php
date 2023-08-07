<?php $widgetList = queryWidgetList($db); ?>


<h2>Widget Manage
    <button class="btn btn-primary btn-sm" onclick="window.location.href='?page=widgetedit'">新增</button>
</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>名称</th>
                <th>位置</th>
                <th>代码预览</th>
                <th>备注</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($widgetList); $i++) { ?>
                <?php $widgetInfo = (object)$widgetList[$i]; ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $widgetInfo->name ?></td>
                    <td><?php echo $widgetInfo->position_info ?></td>
                    <td>
                        <pre class="pre-scrollable code-pre"><code><?php echo $widgetInfo->code_preview ?></code></pre>
                    </td>
                    <td>
                        <pre class="pre-scrollable code-pre"><code><?php echo $widgetInfo->remark ?></code></pre>
                    </td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm" onclick="window.location.href='?page=widgetedit&id=<?php echo $widgetInfo->id ?>'">编辑</button>
                        <button type="button" class="btn btn-link btn-sm removeBtn">删除</button>
                        <span class="removeNext">
                            <button type="button" class="btn btn-link btn-sm removeOk" op="removeWidget" for="<?php echo $widgetInfo->id ?>">确定删除</button>
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
    <p>小组件有两种位置可选，一种是 menu:菜单中，一种是 page:页面中。</p>
    <p><code>position:menu</code>，需要再选择一个菜单项，届时小组件将会展示在该菜单项后方。</p>
    <p><code>position:page</code>，小组件将直接展示在页面上，为防止样式变形，请为组件设置定位或浮动样式。</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <p>组件的制作可参考已存在的几种：</p>
    <p class="ml-4">- iframe标签嵌入；可引用本地地址或外部地址，推荐位置选择菜单中(position:menu)；</p>
    <p class="ml-4">- 专为网站提供的功能性插件：如和风天气、音乐播放器，或组件世界(https://cn.widgetstore.net/#/home)提供的网页组件等；</p>
    <p class="ml-4">- 自己写的~</p>
</div>