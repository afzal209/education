<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/education/config.php';
// echo BASE_PATH;
// exit;


    include(BASE_PATH.'db/connect.php');
    
    if(isset($_SESSION['user']['email'])){

        header('location: adduser.php');

    }
	include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Admin Login");
   
?>

          <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <?php 
                        if (!empty($_GET['response'])) {
                            echo '<div class="alert alert-' . htmlspecialchars($_GET['class']) . '">
                                    <strong>' . ucfirst(htmlspecialchars($_GET['response'])) . '!</strong> ' . htmlspecialchars($_GET['message']) . '
                                  </div>';
                        }
                    ?>
                    <form method="POST" action="phpScript/login_script.php">
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email..." />
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                            <label for="password">Password</label>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" name="submit" class="btn btn-primary flex-grow-1">Login</button>
                            <a href="forgetpassword.php" class="btn btn-success flex-grow-1">Forget Password</a>
                            <!-- <a href="register.php" class="btn btn-success flex-grow-1">Register</a> -->
                            <!-- <a href="javascript:void(0)" onclick="window.location ='<?php echo $authUrl ?>';" 
                               class="btn btn-secondary flex-grow-1">
                                <i class="fa fa-google"></i> Login with Google
                            </a> -->    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once(BASE_PATH.'/includes/footer.php'); 
?>