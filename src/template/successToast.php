<div aria-live="" aria-atomic="true" class="m-3" style="position: absolute; min-height: 200px; z-index:5">
    <div class="toast bg-4" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3300">
        <div class="toast-header bg-3">
            <img src="<?php echo UPLOAD_DIR . "icons/success.png" ?>" class="rounded mr-2 alert-icon" alt="post published icon" style="width:25px">
            <strong class="mr-auto">Avviso</strong>
        </div>
        <div class="toast-body">
            <p><?php echo $templateParams["successWords"] ?></p>
        </div>
    </div>
</div>