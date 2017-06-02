<header>
    <div class="container">
        <img src="img/logo.png" class="logo" alt="">
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php get_user_details(); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li>
                        <a href="profile.php?id=<?php profile_nav(); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="friends.php?id=<?php profile_nav(); ?>"><i class="fa fa-fw fa-group"></i> Friends</a>
                    </li>
                    <li>
                        <a href="settings.php?id=<?php profile_nav(); ?>"><i class="fa fa-fw fa-cog"></i> Settings</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>