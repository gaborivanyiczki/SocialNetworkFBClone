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
                 <?php get_user_profile(); ?>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Profile Wall</h3>
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Write on the wall"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <div class="pull-right">
                                            <div class="btn-toolbar">
                                                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text</button>
                                                <button type="button" class="btn btn-default"><i class="fa fa-file-image-o"></i>Image</button>
                                                <button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php  include (TEMPLATE_FRONT . DS . "friends.php") ?>

                <?php  include (TEMPLATE_FRONT . DS . "groups.php") ?>

            </div>
        </div>
    </div>
</section>

<?php  include (TEMPLATE_FRONT . DS . "footer.php") ?>

