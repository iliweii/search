<?php $widgetInfo = empty($_GET['id']) ? null : queryWidgetInfo($db, $_GET['id']) ?>
<?php $menus = queryMenuList($db) ?>


<h2>Widget <?php echo empty($_GET['id']) ? 'Add' : 'Edit' ?><?php echo empty($widgetInfo) ? '' : ': ' . $widgetInfo->name ?></h2>
<fieldset <?php if (!empty($_GET['id']) && empty($widgetInfo)) echo 'disabled' ?>>
    <div class="form-group">
        <label for="inputId">Id</label>
        <input type="number" class="form-control" id="inputId" value="<?php echo empty($widgetInfo) ? '' : $widgetInfo->id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" value="<?php echo empty($widgetInfo) ? '' : $widgetInfo->name ?>">
    </div>
    <div class="form-group">
        <label for="inputPosition">Position</label>
        <select class="form-control" id="inputPosition">
            <option value="page" <?php echo empty($widgetInfo) ? '' : (strcmp($widgetInfo->position, 'page') == 0 ? 'selected' : '') ?>>
                组件位于页面上（请自行给组件设置定位的样式）</option>
            <option value="menu" <?php echo empty($widgetInfo) ? '' : (strcmp($widgetInfo->position, 'menu') == 0 ? 'selected' : '') ?>>
                组件位于右侧菜单栏上（请选择具体菜单项）</option>
        </select>
    </div>
    <div class="form-group" id="inputMenuIdGroup">
        <label for="inputMenuId">选择具体菜单项</label>
        <select class="form-control" id="inputMenuId">
            <?php for ($i = 0; $i < count($menus); $i++) { ?>
                <option value="<?php echo $menus[$i]['id'] ?>" <?php echo empty($widgetInfo) ? '' : ($widgetInfo->menu_id == $menus[$i]['id'] ? 'selected' : '') ?>><?php echo $menus[$i]['title'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="inputCode">Code</label>
        <textarea class="form-control" id="inputCode" rows="10"><?php echo empty($widgetInfo) ? '' : $widgetInfo->code ?></textarea>
    </div>
    <div class="form-group">
        <label for="inputRemark">Remark</label>
        <textarea class="form-control" id="inputRemark" rows="3"><?php echo empty($widgetInfo) ? '' : $widgetInfo->remark ?></textarea>
    </div>

    <button id="widgetUpdateButton" type="button" class="btn btn-primary"><?php echo empty($_GET['id']) ? 'Save' : 'Update' ?></button>
</fieldset>

<script>
    <?php if (empty($widgetInfo) || (!empty($widgetInfo) && strcmp($widgetInfo->position, 'page') == 0)) { ?>
        $("#inputMenuIdGroup").css("display", "none");
    <?php } ?>
    $("#inputPosition").change(event => {
        const val = $("#inputPosition").val();
        if (val == "menu") $("#inputMenuIdGroup").css("display", "block");
        else $("#inputMenuIdGroup").css("display", "none");
    })
</script>