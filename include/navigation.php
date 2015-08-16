<?php 
    $page = basename($_SERVER['PHP_SELF']);
    if(preg_match("/-post/", $page)) {
        $page = "post.php";
    }
?>
<div id="container">
<nav id="nav-sidebar" class="z-depth-1 closed">
        <a class="nav-sidebar-header" href="index.php">
            <img src="img/companylogo.png">
            <div class="nav-sidebar-company">jAdmin</div>
        </a>
    
        <ul class="nav-sidebar-nav">
            <li class="list-item <?php echo $page == 'index.php' ? 'nav-active' : ''; ?>">
                <a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            
            <li class="list-item <?php echo $page == 'post.php' ? 'nav-active' : ''; ?>">
                <a href="post.php"><i class="fa fa-thumb-tack fa-rotate-45"></i>Inlägg</a>
            </li>

            <li class="list-item <?php echo $page == 'settings.php' ? 'nav-active' : ''; ?>">
                <a href="settings.php"><i class="fa fa-wrench"></i>Inställningar</a>
            </li>
        </ul>
    
    <!-- Nav submenu
        <ul class="nav-sidebar-nav">
            <li class="list-header">Components</li>

            <li class="list-item nav-submenu">
                <a href="#"><i class="fa fa-briefcase"></i>Dashboard<i class="fa fa-angle-right"></i></a>
                
                <ul class="">
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Modals</a></li>
                    <li><a href="#">Progress Bars</a></li>
                </ul>
            </li>
        </ul>-->
</nav>




<div id="nav-right-container" class="closed">
    <nav id="nav-topbar" class="z-depth-1">
        <ul class="nav-left">
            <li class="navicon"><a href="#"><i class="fa fa-navicon fa-lg"></i></a></li>
        </ul>
        <div class="nav-right">
            <a href="#">Jens Andersson<img class="portrait" src="img/adminphoto.png"></a>
            <div class="nav-top-dropdown z-depth-1">
                <div class="dropdown-bandwidth"></div>
                <ul>
                    <li><a href="#"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a href="settings.php"><i class="fa fa-wrench"></i>Inställningar</a></li>
                </ul>
                <div class="dropdown-button">
                    <a href="logout.php"><i class="fa fa-sign-out"></i>Logga Ut</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </nav>