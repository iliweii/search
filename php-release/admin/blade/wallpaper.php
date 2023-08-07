<?php $wallpapers = read_dir("../upload/"); ?>


<h2>Wallpaper Manage
    <span class="badge badge-primary"><?php echo count($wallpapers) ?></span>
    <div class="input-group col-form-label-lg">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputUploadFile" accept="image/*" required>
            <label class="custom-file-label" for="inputUploadFile">Choose file...</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" id="uploadBtn" type="button">上传背景图片</button>
        </div>
    </div>
</h2>


<div class="card mb-3">
    <div class="card-body">
        <div class="media bg-selected-media">
            <div class="bg-selected-img"></div>
            <div class="media-body ml-3">
                <h5 class="mt-0">Selected</h5>
                <p class="bg-selected-name">还尚未设置背景图片</p>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="pr-2">自定义图片</span>
                    <input type="checkbox" id="inputImageCheckbox" disabled aria-label="Checkbox for following text input">
                </div>
            </div>
            <input type="text" class="form-control" id="inputImageUrl" aria-label="Text input with checkbox" placeholder="输入图片地址以使用自定义图片，输入后请按回车，地址例如：https://.../xxx.img">
        </div>
    </div>
</div>


<div id="wallpaperManagePage" class="card-columns">

    <?php foreach ($wallpapers as $key => $wallpaper) { ?>
        <?php if (!is_array($wallpaper)) { ?>
            <div class="bgcard card text-white">
                <img src="/upload/<?php echo $wallpaper ?>" class="bgimg card-img" alt="<?php echo $wallpaper ?>">
                <div class="card-img-overlay" index="<?php echo $key ?>">
                    <span class="card-text">/upload/<?php echo $wallpaper ?></span>
                    <button type="button" class="btn btn-link btn-sm removeFileBtn" for="<?php echo $wallpaper ?>">删除</button>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

</div>