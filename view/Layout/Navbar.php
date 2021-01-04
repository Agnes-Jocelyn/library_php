<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../author/index_author.php">Author <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../book/index_book.php">Book</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-sm-2">
            <?php if (isset($_SESSION['role'])): ?>
                <li class="nav-item"> 
                    <a href="" class="nav-link">
                    <p>
                    Welcome 
                    <?php echo $_SESSION['name']; ?>
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../model/auth/LogoutController.php" class="nav-link">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item"> 
                    <a href="../Auth/register.php" class="nav-link">Register</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>