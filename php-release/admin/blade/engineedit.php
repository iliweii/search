<?php $engineInfo = empty($_GET['id']) ? null : queryEngineInfo($db, $_GET['id']) ?>


<h2>Engine <?php echo empty($_GET['id']) ? 'Add' : 'Edit' ?><?php echo empty($engineInfo) ? '' : ': ' . $engineInfo->name ?></h2>
<fieldset <?php if (!empty($_GET['id']) && empty($engineInfo)) echo 'disabled' ?>>
    <div class="form-group">
        <label for="inputId">Id</label>
        <input type="number" class="form-control" id="inputId" value="<?php echo empty($engineInfo) ? '' : $engineInfo->id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="inputClassId">ClassId</label>
        <input type="number" class="form-control" id="inputClassId" value="<?php echo empty($engineInfo) ? (empty($_GET['class_id']) ? '' : $_GET['class_id']) : $engineInfo->class_id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" value="<?php echo empty($engineInfo) ? '' : $engineInfo->name ?>">
    </div>
    <div class="form-group">
        <label for="inputLink">Link</label>
        <input type="text" class="form-control" id="inputLink" value="<?php echo empty($engineInfo) ? '' : $engineInfo->link ?>">
    </div>
    <div class="form-group">
        <label for="inputIcon">Placeholder</label>
        <input type="text" class="form-control" id="inputPlaceholder" value="<?php echo empty($engineInfo) ? '' : $engineInfo->placeholder ?>">
    </div>
    <div class="form-group">
        <label for="inputOrders">Orders</label>
        <input type="number" class="form-control" id="inputOrders" value="<?php echo empty($engineInfo) ? '' : $engineInfo->orders ?>">
    </div>

    <button id="engineUpdateButton" type="button" class="btn btn-primary"><?php echo empty($_GET['id']) ? 'Save' : 'Update' ?></button>
</fieldset>