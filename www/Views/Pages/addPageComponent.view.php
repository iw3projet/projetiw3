<h1>AddPage</h1>
<div class="wizwig">
    <div class="left-section">
        <!-- <h1>AddPage</h1> -->
        <?php $this->modal("form", $form,$formErrors)?>
    </div>
    <div class="right-section">
        <iframe src="/previewpage?preview=<?php echo($_GET["tpl"])?>" frameborder="0"></iframe>
    </div>
</div>

        

