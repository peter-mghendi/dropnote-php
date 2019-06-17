<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">DropNote</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dropnote.php">Drop Note<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dropcode.php">Drop Code</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#shareModal" data-toggle="modal">Share</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$_SESSION['user']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#profileModal" data-toggle="modal">View Profile</a>
                    <a class="dropdown-item" href="drops.php">My Drops</a>
                    <a class="dropdown-item" href="private.php">Private Notes</a>
                    <a class="dropdown-item" href="#logoutModal" data-toggle="modal">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>