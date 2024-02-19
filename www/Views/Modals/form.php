<?php if(!empty($errors)):?>
<div style="background-color: red;">
    <?php echo implode("<br>",$errors);?>
</div>
<?php endif;?>


<form
        action="<?= $config["config"]["action"]??"" ?>"
        method="<?= $config["config"]["method"]??"POST" ?>"
        id="<?= $config["config"]["id"]??"" ?>"
        class="<?= $config["config"]["class"]??"" ?>"
>

    <?php foreach ($config["inputs"] as $name=>$input):?>
            <label class="labelForm"
                    > <?= $input["label"] ?>
            </label>
            <br>
            <input
                    name="<?= $name ?>"
                    type="<?= $input["type"]??"text"?>"
                    class="<?= $input["class"]??""?>"
                    value="<?= $input["value"]??""?>"
                    id="<?= $input["id"]??""?>"
                    placeholder="<?= $input["placeholder"]??""?>"
                    <?= $input["required"]?"required":""  ?>
                    ><br>
    <?php endforeach;?>


    <input type="submit" value="<?= $config["config"]["submit"]??"Envoyer" ?>">

    <?php if(array_key_exists("delete", $config)):?>
        <input type="submit" value="Supprimer">
    <?php endif;?>
</form>