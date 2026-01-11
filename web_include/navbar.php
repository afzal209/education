<div class="container">
    <div class="row">
        <div class="pull-left logo"><img src="web_asset/images/logo.png" alt=""></div>
        <div class="pull-right login"><a href="login.php" class="btn">Student Login</a></div>
    </div>
</div>
<section class="menubar">
    <div class="container">
        <div class="row">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <div class="pull-left hidden-md hidden-sm hidden-lg">
                        <form action="" class="search-form">
                            <div class="form-group has-feedback">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </form>
                    </div>

                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="academic.php">Academic</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Entery Test <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Page 1-1</a></li>
                                    <li><a href="#">Page 1-2</a></li>
                                    <li><a href="#">Page 1-3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Test Preparation</a></li>
                            <li><a href="#">Scholarship</a></li>
                            <li><a href="#">Jobs Ads</a></li>
                            <?php 
                            // echo $_SESSION['user_token'];
                            // exit;
                            
                            if(isset($_SESSION['data'])!=null)
                            {
                                echo '<li><a href="logout.php">Logout</a></li>';
                            }
                            ?>
                            
                        </ul>

                    </div>
                    <div class="pull-right hidden-xs">
                        <form action="" class="search-form">
                            <div class="form-group has-feedback">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>

        </div>
    </div>
</section>