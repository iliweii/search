<?php

include 'function.php';

$db = db();

// session
session_start();


// 错误情况下
if (empty($_POST['op'])) {
    error500("请求参数错误，op为空");
    $db->close();
    return;
}

// 登录接口
else if (strcmp($_POST["op"], "login") == 0) {
    // 用户名为空
    if (empty($_POST['username']) || empty($_POST['password'])) {
        error500("请求参数错误");
        $db->close();
        return;
    }
    $query = $db->prepare("SELECT * FROM `t_user` WHERE `username` = ? AND `password` = ?");
    $query->bind_param("ss", $username, $password);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    if (count($result)) {
        $userinfo = (object)$result[0];
        unset($userinfo->password);
        success($userinfo);

        $_SESSION['user'] = $userinfo;
    } else {
        error500("用户名或密码错误！");
    }

    $query->close();
    $db->close();
    exit();
}
// 退出登录
else if (strcmp($_POST["op"], "logout") == 0) {
    session_destroy();
    success(true);
    $db->close();
    exit();
}
// 修改用户信息
else if (strcmp($_POST["op"], "updateUser") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    $user = (object)null;
    $user->id = empty($_POST['id']) ? null : $_POST['id'];
    $user->username = empty($_POST['username']) ? null : $_POST['username'];
    $user->nickname = empty($_POST['nickname']) ? null : $_POST['nickname'];
    $user->password = empty($_POST['password']) ? null : $_POST['password'];
    $result = updateUserInfo($db, $user);
    if ($result) {
        session_destroy();
        success($result, "更新用户信息成功，请重新登录！");
    } else {
        error500("更新用户信息失败，请重试！");
    }
    $db->close();
    exit();
}


// 新增/编辑 菜单
else if (strcmp($_POST["op"], "updateMenu") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['title'])) {
        error500("菜单title不能为空");
        $db->close();
        return;
    }
    $menuinfo = (object)null;
    $menuinfo->id = empty($_POST['id']) ? null : $_POST['id'];
    $menuinfo->title = empty($_POST['title']) ? null : $_POST['title'];
    $menuinfo->icon = empty($_POST['icon']) ? null : $_POST['icon'];
    $menuinfo->color = empty($_POST['color']) ? null : $_POST['color'];
    $menuinfo->is_nav = empty($_POST['is_nav']) ? null : $_POST['is_nav'];
    $menuinfo->orders = empty($_POST['orders']) ? null : $_POST['orders'];
    $result = updateMenuInfo($db, $menuinfo);
    if ($result) {
        success($result, (empty($_POST['id']) ? "新增" : "更新") . "菜单项成功！");
    } else {
        error500((empty($_POST['id']) ? "新增" : "更新") . "菜单项失败，请重试！");
    }
    $db->close();
    exit();
} else if (strcmp($_POST["op"], "removeMenu") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['id'])) {
        error500("id不能为空");
        $db->close();
        return;
    }
    $id = $_POST['id'];
    $result = removeMenuInfo($db, $id);
    if ($result) {
        success($result, "删除菜单项成功！");
    } else {
        error500("删除菜单项失败，请重试！");
    }
    $db->close();
    exit();
}
// 新增/编辑/删除 菜单项
else if (strcmp($_POST["op"], "updateMenuItem") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['name'])) {
        error500("菜单name不能为空");
        $db->close();
        return;
    }
    if (empty($_POST['menu_id'])) {
        error500("菜单父项不能为空");
        $db->close();
        return;
    }
    $menuinfo = (object)null;
    $menuinfo->id = empty($_POST['id']) ? null : $_POST['id'];
    $menuinfo->menu_id = empty($_POST['menu_id']) ? null : $_POST['menu_id'];
    $menuinfo->name = empty($_POST['name']) ? null : $_POST['name'];
    $menuinfo->link = empty($_POST['link']) ? null : $_POST['link'];
    $menuinfo->icon = empty($_POST['icon']) ? null : $_POST['icon'];
    $menuinfo->color = empty($_POST['color']) ? null : $_POST['color'];
    $menuinfo->is_nav = empty($_POST['is_nav']) ? null : $_POST['is_nav'];
    $menuinfo->orders = empty($_POST['orders']) ? null : $_POST['orders'];
    $result = updateMenuItemInfo($db, $menuinfo);
    if ($result) {
        success($result, (empty($_POST['id']) ? "新增" : "更新") . "菜单项成功！");
    } else {
        error500((empty($_POST['id']) ? "新增" : "更新") . "菜单项失败，请重试！");
    }
    $db->close();
    exit();
} else if (strcmp($_POST["op"], "removeMenuItem") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['id'])) {
        error500("id不能为空");
        $db->close();
        return;
    }
    $id = $_POST['id'];
    $result = removeMenuItemInfo($db, $id);
    if ($result) {
        success($result, "删除菜单项成功！");
    } else {
        error500("删除菜单项失败，请重试！");
    }
    $db->close();
    exit();
}




// 新增/编辑 引擎分类
else if (strcmp($_POST["op"], "updateEngineClass") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['title'])) {
        error500("分类title不能为空");
        $db->close();
        return;
    }
    $engineClassinfo = (object)null;
    $engineClassinfo->id = empty($_POST['id']) ? null : $_POST['id'];
    $engineClassinfo->title = empty($_POST['title']) ? null : $_POST['title'];
    $engineClassinfo->orders = empty($_POST['orders']) ? null : $_POST['orders'];
    $result = updateEngineClassInfo($db, $engineClassinfo);
    if ($result) {
        success($result, (empty($_POST['id']) ? "新增" : "更新") . "搜索引擎分类成功！");
    } else {
        error500((empty($_POST['id']) ? "新增" : "更新") . "搜索引擎分类失败，请重试！");
    }
    $db->close();
    exit();
} else if (strcmp($_POST["op"], "removeEngineClass") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['id'])) {
        error500("id不能为空");
        $db->close();
        return;
    }
    $id = $_POST['id'];
    $result = removeEngineClassInfo($db, $id);
    if ($result) {
        success($result, "删除搜索引擎分类成功！");
    } else {
        error500("删除搜索引擎分类失败，请重试！");
    }
    $db->close();
    exit();
}
// 新增/编辑/删除 搜索引擎
else if (strcmp($_POST["op"], "updateEngine") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['name'])) {
        error500("引擎name不能为空");
        $db->close();
        return;
    }
    if (empty($_POST['link'])) {
        error500("引擎link不能为空");
        $db->close();
        return;
    }
    if (empty($_POST['class_id'])) {
        error500("引擎分类不能为空");
        $db->close();
        return;
    }
    $engineInfo = (object)null;
    $engineInfo->id = empty($_POST['id']) ? null : $_POST['id'];
    $engineInfo->class_id = $_POST['class_id'];
    $engineInfo->name = $_POST['name'];
    $engineInfo->link = $_POST['link'];
    $engineInfo->placeholder = empty($_POST['placeholder']) ? null : $_POST['placeholder'];
    $engineInfo->orders = empty($_POST['orders']) ? null : $_POST['orders'];
    $result = updateEngineInfo($db, $engineInfo);
    if ($result) {
        success($result, (empty($_POST['id']) ? "新增" : "更新") . "搜索引擎成功！");
    } else {
        error500((empty($_POST['id']) ? "新增" : "更新") . "搜索引擎失败，请重试！");
    }
    $db->close();
    exit();
} else if (strcmp($_POST["op"], "removeEngine") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['id'])) {
        error500("id不能为空");
        $db->close();
        return;
    }
    $id = $_POST['id'];
    $result = removeEngineInfo($db, $id);
    if ($result) {
        success($result, "删除搜索引擎成功！");
    } else {
        error500("删除搜索引擎失败，请重试！");
    }
    $db->close();
    exit();
}






// 新增/编辑 小组件
else if (strcmp($_POST["op"], "updateWidget") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 名称为空
    if (empty($_POST['name'])) {
        error500("组件name不能为空");
        $db->close();
        return;
    }
    // 名称为空
    if (empty($_POST['position'])) {
        error500("请选择组件位置");
        $db->close();
        return;
    }
    $widgetinfo = (object)null;
    $widgetinfo->id = empty($_POST['id']) ? null : $_POST['id'];
    $widgetinfo->name = empty($_POST['name']) ? null : $_POST['name'];
    $widgetinfo->position = empty($_POST['position']) ? null : $_POST['position'];
    $widgetinfo->menu_id = empty($_POST['menu_id']) ? null : $_POST['menu_id'];
    $widgetinfo->code = empty($_POST['code']) ? null : $_POST['code'];
    $widgetinfo->remark = empty($_POST['remark']) ? null : $_POST['remark'];
    $result = updateWidgetInfo($db, $widgetinfo);
    if ($result) {
        success($result, (empty($_POST['id']) ? "新增" : "更新") . "小组件成功！");
    } else {
        error500((empty($_POST['id']) ? "新增" : "更新") . "小组件失败，请重试！");
    }
    $db->close();
    exit();
} else if (strcmp($_POST["op"], "removeWidget") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 用户名为空
    if (empty($_POST['id'])) {
        error500("id不能为空");
        $db->close();
        return;
    }
    $id = $_POST['id'];
    $result = removeWidgetInfo($db, $id);
    if ($result) {
        success($result, "删除小组件成功！");
    } else {
        error500("删除小组件失败，请重试！");
    }
    $db->close();
    exit();
}





// 图片上传
else if (strcmp($_POST["op"], "upload") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if ($_FILES["file"]["error"] > 0) {
        error500("错误：: " . $_FILES["file"]["error"]);
        $db->close();
        exit();
    }
    // 判断 upload 目录是否存在该文件
    // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
    if (file_exists("../upload/" . $_FILES["file"]["name"])) {
        error500($_FILES["file"]["name"] . " 文件已经存在。 ");
        $db->close();
        exit();
    } else {
        // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"]);
        success($_FILES["file"]["name"], "文件：" .  $_FILES["file"]["name"] . "  上传成功！");
    }

    $db->close();
    exit();
}
// 图片删除
else if (strcmp($_POST["op"], "removeFile") == 0) {
    if (empty($_SESSION['user'])) {
        error500("操作失败，登录状态已失效，请刷新页面后重新登录！");
        $db->close();
        exit();
    }
    // 为空
    if (empty($_POST['file'])) {
        error500("文件名不能为空");
        $db->close();
        return;
    }
    $path = "../upload/" . $_POST['file'];
    if (file_exists($path)) {
        $res = unlink($path);
    }
    if ($res) {
        success($res, "删除成功！");
    } else {
        error500("文件删除失败，请重试！[" . json_encode($res) . "]");
    }

    $db->close();
    exit();
}





// 查询不到op对应的方法
else {
    error500("请求参数错误，op不匹配");
    $db->close();
    return;
}

$db->close();
return;
