<?php $statis = statistics($db); ?>


<h2>统计数值</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>名称</th>
                <th>数量</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($statis); $i++) { ?>
                <?php $stat = (object)$statis[$i]; ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $stat->title ?></td>
                    <td><?php echo $stat->count ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<hr>

<h2>用户设置</h2>
<fieldset>
    <div class="form-group">
        <label for="inputId">Id</label>
        <input type="text" class="form-control" id="inputId" value="<?php echo $_SESSION['user']->id ?>" disabled>
    </div>
    <div class="form-group">
        <label for="inputNickname">Nickname</label>
        <input type="text" class="form-control" id="inputNickname" value="<?php echo $_SESSION['user']->nickname ?>">
    </div>
    <div class="form-group">
        <label for="inputUsername">Username</label>
        <input type="text" class="form-control" id="inputUsername" value="<?php echo $_SESSION['user']->username ?>">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="text" class="form-control" id="inputPassword" placeholder="密码为空则不修改密码">
    </div>

    <button id="userUpdateButton" type="button" class="btn btn-primary">Update</button>
</fieldset>

<hr>

<?php if (strcmp($_SESSION['user']->username, 'admin') == 0) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Danger：</h4>
        <p>请尽快修改账号密码！</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Warning：</h4>
    <p>密码暂时为明文传输、明文保存，请务必修改默认的用户名和密码，避免在未加密的http协议上进行登录！</p>
    <p>暂时只提供一个用户，多用户请直接去数据库添加。</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>