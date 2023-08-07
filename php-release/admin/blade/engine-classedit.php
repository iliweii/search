<?php $engineClassInfo = empty($_GET['id']) ? null : queryEngineClassInfo($db, $_GET['id']) ?>


<h2>Engine Class <?php echo empty($_GET['id']) ? 'Add' : 'Edit' ?><?php echo empty($engineClassInfo) ? '' : ': ' . $engineClassInfo->title ?></h2>
<fieldset <?php if (!empty($_GET['id']) && empty($engineClassInfo)) echo 'disabled' ?>>
    <div class="form-group">
        <label for="inputId">Id</label>
        <input type="number" class="form-control" id="inputId" value="<?php echo empty($engineClassInfo) ? '' : $engineClassInfo->id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="inputTitle">Title</label>
        <input type="text" class="form-control" id="inputTitle" value="<?php echo empty($engineClassInfo) ? '' : $engineClassInfo->title ?>">
    </div>
    <div class="form-group">
        <label for="inputOrders">Orders</label>
        <input type="number" class="form-control" id="inputOrders" value="<?php echo empty($engineClassInfo) ? '' : $engineClassInfo->orders ?>">
    </div>

    <button id="engineClassUpdateButton" type="button" class="btn btn-primary"><?php echo empty($_GET['id']) ? 'Save' : 'Update' ?></button>
</fieldset>