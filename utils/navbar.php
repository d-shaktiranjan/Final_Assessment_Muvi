<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="/final">
            <img src="https://pbs.twimg.com/profile_images/1115520000511463424/tEUYLRJU_400x400.jpg" alt="" width="30"
                height="24" class="d-inline-block align-text-top">
            Final Assessment by:- Shakti Ranjan Debata
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="er.php">Add ER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="view.php">View ER</a>
                </li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger active text-light" aria-current="page"
                            href="logout.php">Logout</a>
                    </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>