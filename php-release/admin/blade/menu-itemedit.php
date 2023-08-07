<?php $menuInfo = empty($_GET['id']) ? null : queryMenuItemInfo($db, $_GET['id']) ?>


<h2>Menu Item <?php echo empty($_GET['id']) ? 'Add' : 'Edit' ?><?php echo empty($menuInfo) ? '' : ': ' . $menuInfo->name ?></h2>
<fieldset <?php if (!empty($_GET['id']) && empty($menuInfo)) echo 'disabled' ?>>
    <div class="form-group">
        <label for="inputId">Id</label>
        <input type="number" class="form-control" id="inputId" value="<?php echo empty($menuInfo) ? '' : $menuInfo->id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="inputMenuId">MenuId</label>
        <input type="number" class="form-control" id="inputMenuId" value="<?php echo empty($menuInfo) ? (empty($_GET['menu_id']) ? '' : $_GET['menu_id']) : $menuInfo->menu_id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" value="<?php echo empty($menuInfo) ? '' : $menuInfo->name ?>">
    </div>
    <div class="form-group">
        <label for="inputLink">Link</label>
        <input type="text" class="form-control" id="inputLink" value="<?php echo empty($menuInfo) ? '' : $menuInfo->link ?>">
    </div>
    <div class="form-group">
        <label for="inputIcon">Icon</label>
        <input type="text" class="form-control" id="inputIcon" value="<?php echo empty($menuInfo) ? '' : $menuInfo->icon ?>">
    </div>
    <div class="form-group">
        <label for="inputColor">Color</label>
        <input type="text" class="form-control" id="inputColor" value="<?php echo empty($menuInfo) ? '' : $menuInfo->color ?>">
    </div>
    <div class="form-group">
        <label for="inputOrders">Orders</label>
        <input type="number" class="form-control" id="inputOrders" value="<?php echo empty($menuInfo) ? '' : $menuInfo->orders ?>">
    </div>

    <button id="menuItemUpdateButton" type="button" class="btn btn-primary"><?php echo empty($_GET['id']) ? 'Save' : 'Update' ?></button>
</fieldset>
<script>
    $('#inputColor').colorpicker();
</script>