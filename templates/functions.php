<?php


//helpers

function set_message($msg){

    if(!empty($msg)){

        $_SESSION['message'] = $msg;

    }else {

        $msg = "";
    }

}

function display_message(){

    if(isset($_SESSION['message'])){

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

}



function redirect ($location){
    header("Location: $location");
}

function query($sql){

    global $connection;
    return mysqli_query($connection,$sql);
}

function confirm($result){
    global $connection;

    if(!$result){
        die("Problema accesare db." . mysqli_error($connection));
    }
}

function escape_string($string){
    global  $connection;
    return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

//functions

function login(){

    if(isset($_POST['login'])){

        $mail = escape_string($_POST['login-mail']);
        $password = escape_string($_POST['login-pass']);

        $query = query("select * from users where email= '{$mail}' and password= '{$password}' ");
        confirm($query);
        if(mysqli_num_rows($query) == 1){
            $_SESSION['email']=$mail;
            redirect("public/home.php");

        }else {
            $message = "Email sau parola incorecta";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }


    }



}

function register() {

    if(isset($_POST['register'])){

        $username = escape_string($_POST['username']);
        $fname = escape_string($_POST['fname']);
        $lname = escape_string($_POST['lname']);
        $email = escape_string($_POST['email']);
        $confemail = escape_string($_POST['confemail']);
        $password = escape_string($_POST['password']);
        $confpassword = escape_string($_POST['confpass']);

        if($email == $confemail && $password == $confpassword) {
            $query = query("insert into users(username,email,password,firstname,lastname) values('$username', '$email', '$password', '$fname', '$lname')");
            confirm($query);
        }else{
            $message = "Probleme la inregistrare";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }


    }


}

function get_user_details (){

         $user_check=$_SESSION['email'];
         $sql=query("select * from users join user_details on users.id = user_details.id where users.email = '$user_check'");

         while($row = fetch_array($sql)){

             $loggedin = <<<DELIMITER

          <img src="{$row['profile_picture']}" alt="HTML5 Icon" style="width:50px;height:50px">
          <b> {$row['firstname']}</b>




DELIMITER;


             echo $loggedin;

         }



}


function profile_nav(){

    $user_check=$_SESSION['email'];
    $sql=query("select * from users join user_details on users.id = user_details.id where users.email = '$user_check'");

    while($row = fetch_array($sql)){

        echo "{$row['id']}";

    }


}

function get_user_profile ()
{
    $user_check = $_SESSION['email'];
    $sql = query("select * from users join user_details on users.id = user_details.id where users.id=" . escape_string($_GET['id']) . " ");

    while ($row = fetch_array($sql)) {

        $profile = <<<DELIMITER

          <div class="profile">
                    <h1 class="page-header">{$row['firstname']} {$row['lastname']}</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{$row['profile_picture']}" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li><strong>Firstname:</strong> {$row['firstname']}</li>
                                <li><strong>Lastname:</strong> {$row['lastname']}</li>
                                <li><strong>Email:</strong> {$row['email']}</li>
                                <li><strong>Adress:</strong> {$row['adress']}</li>
                                <li><strong>Alternative Mail:</strong> {$row['alternative_email']}</li>
                                <li><strong>Gender:</strong> {$row['sex']}</li>
                                <li><strong>Age:</strong> {$row['age']}</li>
                                <li><strong>Register Date: </strong>{$row['date']}</li>
                        </ul>
                    </div>



DELIMITER;


        echo $profile;


    }


}


function friends_home(){

    $user_check = $_SESSION['email'];
    $sql = query("select * from friends join user_details on friends.user_id2 = user_details.id join users on users.id=friends.user_id1 where email='$user_check'");
    while ($row = fetch_array($sql)) {

        $profile = <<<DELIMITER

             <li><a href="profile.php?id={$row['user_id2']}" class="thumbnail"><img src=" {$row['profile_picture']}" alt=""></a></li>



DELIMITER;


        echo $profile;


    }

}



function get_posts(){

    $sql = query("select * from posts join user_details on user_details.user_id=posts.id_user join users on users.id=posts.id_user order by data desc");
    confirm($sql);

    while ($row = fetch_array($sql)) {

        $profile = <<<DELIMITER

            <div class="panel panel-default post">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <a href="profile.php?id={$row['id_user']}" class="post-avatar thumbnail"><img src="{$row['profile_picture']}" alt=""><div class="text-center">{$row['username']}</div></a>
                                <div class="likes text-center">{$row['likes']} Likes</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="bubble">
                                    <div class="pointer">
                                        {$row['message']}
                                    </div>
                                    <div class="pointer-border"></div>
                                </div>
                                <p class="post-actions"><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a> - <a href="#" ><i class="fa fa-comment-o"></i> Comment</a> - <a href="#"><i class="fa fa-share" aria-hidden="true"></i> Share</a></p>
                                <div class="comment-form">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="enter comment">
                                        </div>
                                        <button type="submit" class="btn btn-default">Add</button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                                <div class="comments">
                                    <?php get_comments_posts(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



DELIMITER;


        echo $profile;


    }

}

function get_comments_posts(){


    $user_check = $_SESSION['email'];
    $sql = query("select * from comments");

    while ($row = fetch_array($sql)) {

        $comments = <<<DELIMITER

            <div class="comment">
                <a href="#" class="comment-avatar pull-left"><img src="img/user.png" alt=""></a>
                   <div class="comment-text">
                    <p>{$row['comment']}</p>
                     </div>
                        </div>
           <div class="clearfix"></div>



DELIMITER;


        echo $comments;


    }


}

function get_members(){

    $sql = query("select * from users join user_details on users.id = user_details.id");
    confirm($sql);
    while ($row = fetch_array($sql)) {

        $members = <<<DELIMITER

            <div class="row member-row">
                        <div class="col-md-3">
                            <img src="{$row['profile_picture']}" class="img-thumbnail" alt="">
                            <div class="text-center">
                                <h3>{$row['username']}</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p><a href="add-friend.php?add={$row['id']}" class="btn btn-success btn-block"><i class="fa fa-user-plus"></i> Add Friend</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="#" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Send Message</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="profile.php?id={$row['id']}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
                        </div>
                    </div>



DELIMITER;


        echo $members;


    }



}
function get_user_settings ()
{
    $sql = query("select * from users join user_details on users.id = user_details.id where users.id=" . escape_string($_GET['id']) . " ");

    while ($row = fetch_array($sql)) {

        $profile = <<<DELIMITER

          <div class="profile">
                    <h1 class="page-header">Account Settings</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{$row['profile_picture']}" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <h4><li><strong>Firstname:</strong> {$row['firstname']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                                <h4><li><strong>Lastname:</strong> {$row['lastname']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                                <h4><li><strong>Email:</strong> {$row['email']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                                <h4><li><strong>Adress:</strong> {$row['adress']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                                <h4><li><strong>Alternative Mail:</strong> {$row['alternative_email']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                                <h4><li><strong>Gender:</strong> {$row['sex']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                                <h4><li><strong>Age:</strong> {$row['age']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                                <h4><li><strong>Register Date: </strong>{$row['date']} <a href="#" type="button" class="btn btn-default btn-sm">Edit</a></li></h4>
                        </ul>
                    </div>



DELIMITER;


        echo $profile;


    }


}

function get_friends_page(){

    $sql = query("select * from friends join user_details on friends.user_id2 = user_details.id join users on users.id=friends.user_id2 where user_id1=" . escape_string($_GET['id']) . " ");
    while ($row = fetch_array($sql)) {

        $friends = <<<DELIMITER

            <div class="row member-row">
                        <div class="col-md-3">
                            <img src="{$row['profile_picture']}" class="img-thumbnail" alt="">
                            <div class="text-center">
                                <h3>{$row['username']}</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p><a href="user_controler.php?remove={$row['id']}" class="btn btn-danger btn-block"><i class="fa fa-remove"></i> Remove</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="#" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Send Message</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="profile.php?id={$row['id']}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
                        </div>
                    </div>



DELIMITER;


        echo $friends;



    }

}




?>