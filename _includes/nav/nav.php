<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-hand-down"></span> DropNote</a>
            <a class="navbar-brand" id="btn_share" href="javascript:void(0);"><span class="glyphicon glyphicon-share"></span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="dropnote.php"><span class="glyphicon glyphicon-bookmark"></span> Drop Note</a></li>
                <li><a href="dropcode.php"><span class="glyphicon glyphicon-barcode"></span> Drop Code</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span> <?Php echo $_SESSION['username'] ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
                        <li><a href="drops.php"><span class="glyphicon glyphicon-send"></span> My Drops</a></li>
                        <li><a href="private.php"><span class="glyphicon glyphicon-inbox"></span> Private Notes</a></li>
                        <li><a href="_includes/_logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>