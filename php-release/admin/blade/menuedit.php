<?php $menuInfo = empty($_GET['id']) ? null : queryMenuInfo($db, $_GET['id']) ?>


<h2>Menu <?php echo empty($_GET['id']) ? 'Add' : 'Edit' ?><?php echo empty($menuInfo) ? '' : ': ' . $menuInfo->title ?></h2>
<fieldset <?php if (!empty($_GET['id']) && empty($menuInfo)) echo 'disabled' ?>>
    <div class="form-group">
        <label for="inputId">Id</label>
        <input type="number" class="form-control" id="inputId" value="<?php echo empty($menuInfo) ? '' : $menuInfo->id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="inputTitle">Title</label>
        <input type="text" class="form-control" id="inputTitle" value="<?php echo empty($menuInfo) ? '' : $menuInfo->title ?>">
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
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="inputIsNav" <?php echo empty($menuInfo) ? '' : ($menuInfo->is_nav == 1 ?  'checked' : '') ?>>
            <label class="form-check-label" for="inputIsNav">IsNav</label>
        </div>
    </div>
    <div class="form-group">
        <label for="inputOrders">Orders</label>
        <input type="number" class="form-control" id="inputOrders" value="<?php echo empty($menuInfo) ? '' : $menuInfo->orders ?>">
    </div>

    <button id="menuUpdateButton" type="button" class="btn btn-primary"><?php echo empty($_GET['id']) ? 'Save' : 'Update' ?></button>
</fieldset>
<script>
    $('#inputColor').colorpicker();
</script>