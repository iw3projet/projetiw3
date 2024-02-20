<?php if (!empty($errors)) : ?>
        <div style="background-color: red;">
                <?php echo implode("<br>", $errors); ?>
        </div>
<?php endif; ?>



<form action="<?= $config["config"]["action"] ?? "" ?>" method="<?= $config["config"]["method"] ?? "POST" ?>" id="<?= $config["config"]["id"] ?? "" ?>" class="<?= $config["config"]["class"] ?? "" ?>">

        <?php foreach ($config["elements"]["inputs"] as $name => $input) : ?>
                <label class="labelForm"> <?= $input["label"] ?>
                </label>
                <br>
                <input 
                name="<?= $name ?>" 
                type="<?= $input["type"] ?? "text" ?>" 
                class="<?= $input["class"] ?? "" ?>" 
                value="<?= $input["value"] ?? "" ?>" 
                id="<?= $input["id"] ?? "" ?>" 
                placeholder="<?= $input["placeholder"] ?? "" ?>" 
                list="<?= $input["list"] ?? "" ?>" 
                autocomplete="<?= $input["autocomplete"] ?? "on" ?>" 
                <?= $input["required"] ? "required" : ""  ?>><br>
        <?php endforeach; ?>
        
        <?php if (array_key_exists("selects",$config["elements"])) : ?>
                <?php foreach ($config["elements"]["selects"] as $name => $select) : ?>
                        <label class="labelForm"> <?= $select["label"] ?></label>
                        <br>
                        <select 
                        name="<?= $name ?>" 
                        class="<?= $select["class"] ?? "" ?>" 
                        id="<?= $select["id"] ?? "" ?>" 
                        <?= $select["required"] ? "required" : ""  ?>>

                        <?php
                                foreach ($select["options"] as $key => $value) {
                                        echo "<option value=" .$value."> $value </option>";
                                }
                        ?>
                        
                        </select>
                <?php endforeach; ?>
        <?php endif; ?>
        

        <?php if (array_key_exists("datalist", $config["elements"])) : ?>
                <datalist id="<?= $config["elements"]["datalist"]["id"] ?>">
                        <?php
                        foreach ($config["elements"]["datalist"]["options"] as $key => $value) {
                                echo "<option value=" . $value . "></option>";
                        }
                        ?>

                </datalist>
        <?php endif; ?>


        <input type="submit" class="<?= $config["config"]["class"] ?? "" ?>" value="<?= $config["config"]["submit"] ?? "Envoyer" ?>">
</form>