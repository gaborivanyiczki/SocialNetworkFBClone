<?php require_once("../templates/config.php") ?>

<?php include (TEMPLATE_FRONT . DS . "head.php") ?>

<?php if(!isset($_SESSION['email'])){

    redirect("../index.php");

} ?>

<body>

<?php  include (TEMPLATE_FRONT . DS . "top-nav.php") ?>

<?php  include (TEMPLATE_FRONT . DS . "navbar.php") ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="members">
                    <h1 class="page-header">My friends</h1>

                    <?php get_friends_page(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php  include (TEMPLATE_FRONT . DS . "friends.php") ?>

                <?php  include (TEMPLATE_FRONT . DS . "groups.php") ?>
            </div>
        </div>
    </div>
</section>

<?php include (TEMPLATE_FRONT . DS . "footer.php") ?>
