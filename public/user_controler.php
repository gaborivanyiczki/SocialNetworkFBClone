<?php require_once("../templates/config.php"); ?>


<?php

if(isset($_GET['remove'])) {

    $sql = query("delete from friends where user_id2=" . escape_string($_GET['id']) . " ");
    confirm($sql);

    redirect("home.php");
}


?>