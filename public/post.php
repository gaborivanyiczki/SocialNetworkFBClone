<?php require_once("../templates/config.php"); ?>

<?php
if(isset($_GET['add'])) {

    $msg = $_POST['textarea'];
    $usr = escape_string($_GET['add']);

    $query = query("insert into posts(user_id, message) values('$usr', '$msg')");
    confirm($query);
    if($query){
        redirect("home.php");
    }

}





?>