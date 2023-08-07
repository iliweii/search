<?php $classInfo = empty($_GET['classid']) ? null : queryEngineClassInfo($db, $_GET['classid']) ?>
<?php $engineList = empty($_GET['classid']) ? array() : queryEngineList($db, $_GET['classid']) ?>


<h2>Engine Manage <?php echo empty($classInfo->title) ? '' : (' > ' . $classInfo->title) ?>
    <?php if (!empty($classInfo->title)) { ?>
        <button class="btn btn-primary btn-sm" onclick="window.location.href='?page=engineedit&class_id=<?php echo $classInfo->id ?>'">新增</button>
    <?php } ?>
</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>搜索引擎名称</th>
                <th>搜索引擎链接</th>
                <th>搜索引擎描述</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($engineList); $i++) { ?>
                <?php $engineInfo = (object)$engineList[$i]; ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $engineInfo->name ?></td>
                    <td><a href="<?php echo $engineInfo->link ?>" target="_blank" rel="noopener noreferrer"><?php echo $engineInfo->link ?></a></td>
                    <td><?php echo $engineInfo->placeholder ?></td>
                    <td><?php echo $engineInfo->orders ?></td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm" onclick="window.location.href='?page=engineedit&id=<?php echo $engineInfo->id ?>'">编辑</button>
                        <button type="button" class="btn btn-link btn-sm removeBtn">删除</button>
                        <span class="removeNext">
                            <button type="button" class="btn btn-link btn-sm removeOk" op="removeEngine" for="<?php echo $engineInfo->id ?>">确定删除</button>
                            <button type="button" class="btn btn-link btn-sm removeExit">取消删除</button>
                        </span>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>