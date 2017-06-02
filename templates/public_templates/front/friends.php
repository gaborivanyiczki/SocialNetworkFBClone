<div class="panel panel-default friends">
    <div class="panel-heading">
        <h3 class="panel-title">My Friends</h3>
    </div>
    <div class="panel-body">
        <ul>
            <?php friends_home(); ?>
        </ul>
        <div class="clearfix"></div>
        <a class="btn btn-primary" href="friends.php?id=<?php profile_nav();  ?>">View All Friends</a>
    </div>
</div>