<?php $engineClassList = queryEngineClassList($db); ?>


<h2>Engine Class Manage
    <button class="btn btn-primary btn-sm" onclick="window.location.href='?page=engine-classedit'">新增</button>
</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>标题</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($engineClassList); $i++) { ?>
                <?php $engineClassInfo = (object)$engineClassList[$i]; ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $engineClassInfo->title ?></td>
                    <td><?php echo $engineClassInfo->orders ?></td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm" onclick="window.location.href='?page=engine&classid=<?php echo $engineClassInfo->id ?>'">搜索引擎</button>
                        <button type="button" class="btn btn-link btn-sm" onclick="window.location.href='?page=engine-classedit&id=<?php echo $engineClassInfo->id ?>'">编辑</button>
                        <button type="button" class="btn btn-link btn-sm removeBtn">删除</button>
                        <span class="removeNext">
                            <button type="button" class="btn btn-link btn-sm removeOk" op="removeEngineClass" for="<?php echo $engineClassInfo->id ?>">确定删除</button>
                            <button type="button" class="btn btn-link btn-sm removeExit">取消删除</button>
                        </span>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>