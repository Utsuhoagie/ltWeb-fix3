    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="landingPage.php">
            Carworld
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="carList.php">Product list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutUs.php">About us</a>
                </li>

            </ul>
            
            <?php 
            if (!isset($_SESSION["id"])) { ?>
            
            <a href="login.php" class="button" id="in">Sign in</a>
            <a href="register.php" class="button" id="up">Sign up</a>
            
            <?php 
            } 
            else { ?>
            <a href="userCart.php" class="button" id="in">Your Cart</a>
            <a href="profile.php" class="button" id="up">Profile</a>
            
            <?php
            } ?>
        
        </div>
    </nav>