<?php
function db()
{
    // 连接数据库文件
    $host = '127.0.0.1:3306';
    $dbuser = 'root';
    $pwd = '';
    $dbname = 'lucki_search';

    // 创建数据库连接
    $db = new mysqli($host, $dbuser, $pwd, $dbname);
    if ($db->connect_errno) {
        error500("数据库错误，请检查数据库连接");
        exit();
    }

    //设定数据可数据传输的编码
    $db->query("SET NAMES UTF8");
    //矫正时间
    date_default_timezone_set("prc");
    return $db;
}

function success($result, $message = "操作成功！")
{
    $res = (object)null;
    $res->code = 200;
    $res->message = $message;
    $res->success = true;
    $res->result = $result;
    $res->timestamp = time();
    echo json_encode($res);
}

function error500($message = "请求失败")
{
    $res = (object)null;
    $res->code = 500;
    $res->message = $message;
    $res->success = false;
    $res->result = null;
    $res->timestamp = time();
    echo json_encode($res);
}

// 业务方法
// 用户信息
function updateUserInfo($db, $user)
{
    $query = null;
    if (empty($user->password)) {
        $query = $db->prepare("UPDATE `t_user` SET `username` = ?, `nickname` = ? WHERE `id` = ?");
        $query->bind_param("ssi", $user->username, $user->nickname, $user->id);
    } else {
        $query = $db->prepare("UPDATE `t_user` SET `username` = ?, `nickname` = ?, `password` = ? WHERE `id` = ?");
        $query->bind_param("sssi", $user->username, $user->nickname, $user->password, $user->id);
    }
    return $query->execute();
}



// 菜单项
function queryMenuList($db)
{
    $query = $db->prepare("SELECT * FROM `t_menu` ORDER BY `orders`");
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function queryMenuInfo($db, $id)
{
    if (empty($id)) return null;
    $query = $db->prepare("SELECT * FROM `t_menu` WHERE `id` = ?");
    $query->bind_param("i", $id);
    $query->execute();
    return $query->get_result()->fetch_object();
}

function updateMenuInfo($db, $menuinfo)
{
    $query = null;
    if (empty($menuinfo->id)) {
        $query = $db->prepare("INSERT INTO `t_menu`(`title`, `icon`, `color`, `is_nav`, `orders`) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sssii", $menuinfo->title, $menuinfo->icon, $menuinfo->color, $menuinfo->is_nav, $menuinfo->orders);
    } else {
        $query = $db->prepare("UPDATE `t_menu` SET `title` = ?, `icon` = ?, `color` = ?, `is_nav` = ?, `orders` = ? WHERE `id` = ?");
        $query->bind_param("sssiii", $menuinfo->title, $menuinfo->icon, $menuinfo->color, $menuinfo->is_nav, $menuinfo->orders, $menuinfo->id);
    }
    return $query->execute();
}

function removeMenuInfo($db, $id)
{
    $query = null;
    $query = $db->prepare("DELETE FROM `t_menu` WHERE `id` = ?");
    $query->bind_param("i", $id);
    return $query->execute();
}

// 菜单项详情
function queryMenuItemList($db, $menuId)
{
    $query = $db->prepare("SELECT * FROM `t_menu_item` WHERE `menu_id` = ? ORDER BY `orders`");
    $query->bind_param("i", $menuId);
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function queryMenuItemInfo($db, $id)
{
    if (empty($id)) return null;
    $query = $db->prepare("SELECT * FROM `t_menu_item` WHERE `id` = ?");
    $query->bind_param("i", $id);
    $query->execute();
    return $query->get_result()->fetch_object();
}

function updateMenuItemInfo($db, $menuinfo)
{
    $query = null;
    if (empty($menuinfo->id)) {
        $query = $db->prepare("INSERT INTO `t_menu_item`(`menu_id`, `name`, `icon`, `color`, `link`, `orders`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("issssi", $menuinfo->menu_id, $menuinfo->name, $menuinfo->icon, $menuinfo->color, $menuinfo->link, $menuinfo->orders);
    } else {
        $query = $db->prepare("UPDATE `t_menu_item` SET `menu_id` = ?,`name` = ?, `icon` = ?, `color` = ?, `link` = ?, `orders` = ? WHERE `id` = ?");
        $query->bind_param("issssii", $menuinfo->menu_id, $menuinfo->name, $menuinfo->icon, $menuinfo->color, $menuinfo->link, $menuinfo->orders, $menuinfo->id);
    }
    return $query->execute();
}

function removeMenuItemInfo($db, $id)
{
    $query = null;
    $query = $db->prepare("DELETE FROM `t_menu_item` WHERE `id` = ?");
    $query->bind_param("i", $id);
    return $query->execute();
}




// 搜索引擎分类
function queryEngineClassList($db)
{
    $query = $db->prepare("SELECT clazz.*, (SELECT `id` FROM `t_engine` e WHERE e.class_id = clazz.id ORDER BY `orders` LIMIT 1) first_engine FROM `t_engine_class` clazz ORDER BY `orders`");
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function queryEngineClassInfo($db, $id)
{
    if (empty($id)) return null;
    $query = $db->prepare("SELECT * FROM `t_engine_class` WHERE `id` = ?");
    $query->bind_param("i", $id);
    $query->execute();
    return $query->get_result()->fetch_object();
}

function updateEngineClassInfo($db, $classinfo)
{
    $query = null;
    if (empty($classinfo->id)) {
        $query = $db->prepare("INSERT INTO `t_engine_class`(`title`, `orders`) VALUES (?, ?)");
        $query->bind_param("si", $classinfo->title, $classinfo->orders);
    } else {
        $query = $db->prepare("UPDATE `t_engine_class` SET `title` = ?, `orders` = ? WHERE `id` = ?");
        $query->bind_param("sii", $classinfo->title, $classinfo->orders, $classinfo->id);
    }
    return $query->execute();
}

function removeEngineClassInfo($db, $id)
{
    $query = null;
    $query = $db->prepare("DELETE FROM `t_engine_class` WHERE `id` = ?");
    $query->bind_param("i", $id);
    return $query->execute();
}

// 搜索引擎详情
function queryEngineList($db, $classId)
{
    $query = $db->prepare("SELECT * FROM `t_engine` WHERE `class_id` = ? ORDER BY `orders`");
    $query->bind_param("i", $classId);
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function queryEngineInfo($db, $id)
{
    if (empty($id)) return null;
    $query = $db->prepare("SELECT * FROM `t_engine` WHERE `id` = ?");
    $query->bind_param("i", $id);
    $query->execute();
    return $query->get_result()->fetch_object();
}

function updateEngineInfo($db, $engineinfo)
{
    $query = null;
    if (empty($engineinfo->id)) {
        $query = $db->prepare("INSERT INTO `t_engine`(`class_id`, `name`, `placeholder`, `link`, `orders`) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("isssi", $engineinfo->class_id, $engineinfo->name, $engineinfo->placeholder, $engineinfo->link, $engineinfo->orders);
    } else {
        $query = $db->prepare("UPDATE `t_engine` SET `class_id` = ?,`name` = ?, `placeholder` = ?, `link` = ?, `orders` = ? WHERE `id` = ?");
        $query->bind_param("isssii", $engineinfo->class_id, $engineinfo->name, $engineinfo->placeholder, $engineinfo->link, $engineinfo->orders, $engineinfo->id);
    }
    return $query->execute();
}

function removeEngineInfo($db, $id)
{
    $query = null;
    $query = $db->prepare("DELETE FROM `t_engine` WHERE `id` = ?");
    $query->bind_param("i", $id);
    return $query->execute();
}





// 小组件
function queryWidgetList($db)
{
    $query = $db->prepare("SELECT `t_widget`.*,
	    IF(`position` = 'menu', CONCAT('位于右侧菜单：', `t_menu`.`title`),
	    IF(`position` = 'page', '位于主页面上', '')) position_info, REPLACE(REPLACE(`code`,'<','&lt;'), '>', '&gt;') code_preview
        FROM `t_widget`
        LEFT JOIN `t_menu` ON `t_widget`.`menu_id` = `t_menu`.`id` AND `t_widget`.`position` = 'menu'
    ");
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}
function queryWidgetListWithQuery($db, $menuId = -1)
{
    /**
     * 当 $menuId=-1 时，查询 posistion=page 的数据；
     * 否则，查询 position=menu 的数据。
     */
    $query = null;
    if ($menuId == -1) {
        $query = $db->prepare("SELECT * FROM `t_widget` WHERE `position` = 'page'");
    } else {
        $query = $db->prepare("SELECT * FROM `t_widget` WHERE `position` = 'menu' AND `menu_id` = ?");
        $query->bind_param("i", $menuId);
    }
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function queryWidgetInfo($db, $id)
{
    if (empty($id)) return null;
    $query = $db->prepare("SELECT * FROM `t_widget` WHERE `id` = ?");
    $query->bind_param("i", $id);
    $query->execute();
    return $query->get_result()->fetch_object();
}

function updateWidgetInfo($db, $widgetinfo)
{
    $query = null;
    if (empty($widgetinfo->id)) {
        $query = $db->prepare("INSERT INTO `t_widget`(`position`, `menu_id`, `name`, `code`, `remark`) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sisss", $widgetinfo->position, $widgetinfo->menu_id, $widgetinfo->name, $widgetinfo->code, $widgetinfo->remark);
    } else {
        $query = $db->prepare("UPDATE `t_widget` SET `position` = ?, `menu_id` = ?, `name` = ?, `code` = ?, `remark` = ? WHERE `id` = ?");
        $query->bind_param("sisssi", $widgetinfo->position, $widgetinfo->menu_id, $widgetinfo->name, $widgetinfo->code, $widgetinfo->remark, $widgetinfo->id);
    }
    return $query->execute();
}

function removeWidgetInfo($db, $id)
{
    $query = $db->prepare("DELETE FROM `t_widget` WHERE `id` = ?");
    $query->bind_param("i", $id);
    return $query->execute();
}




// 统计
function statistics($db)
{
    $query = $db->prepare("SELECT '菜单数量' title, COUNT(*) count FROM t_menu
        UNION SELECT '菜单项数量', COUNT(*) FROM t_menu_item
        UNION SELECT '搜索引擎分类数量', COUNT(*) FROM t_engine_class
        UNION SELECT '搜索引擎数量', COUNT(*) FROM t_engine
        UNION SELECT '小组件数量', COUNT(*) FROM t_widget
    ");
    $query->execute();
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}




// 获取文件
function read_dir($dir)
{
    $files = array();
    if (@$handle = opendir($dir)) { //注意这里要加一个@，不然会有warning错误提示：）
        while (($file = readdir($handle)) !== false) {
            if ($file != ".." && $file != ".") { //排除根目录；
                if (is_dir($dir . "/" . $file)) { //如果是子文件夹，就进行递归
                    $files[$file] = read_dir($dir . "/" . $file);
                } else { //不然就将文件的名字存入数组；
                    $files[] = $file;
                }
            }
        }
        closedir($handle);
        return $files;
    }
}
