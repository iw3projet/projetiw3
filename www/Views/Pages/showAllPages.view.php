<h1>Vos Pages</h1>

<?php

foreach ($this->data["pages"] as $key => $value) {

    echo ("<a href=" . $this->data["pages"][$key]["slug"] . ">" . $this->data["pages"][$key]["title"] . "</a> <a href=/deletepage?id=" . $this->data["pages"][$key]["id"] . ">Supprimer cette page</a></a> <a href=/updatepage?id=" . $this->data["pages"][$key]["id"] . "&tpl=" . $this->data["pages"][$key]["template"] . "&content=" . urlencode(strip_tags($this->data["pages"][$key]["content"])) . ">modifier cette page</a></br>");
}
?>