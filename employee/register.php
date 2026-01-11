<?php 
include('includes/header.php');
ch_title("Moalym","Register");
include('../db/connect.php');
require_once '../socialLogin/config.php';


if (!isset($_SESSION['user_token'])) {
    header("Location: index.php");
    ob_end_clean();
}
?>



<div class="container mt-5" style="margin: auto;">
        <div class="row ">
            <div class="col-10" >
                <div class="card" >
                    <div class="card-header">
                        <h2 style="text-align:center">Register</h2>
                    </div>
                    <div class="card-body">

                    <a href="logout.php">Logout</a>
                        <form method="POST" action="../admin/phpScript/user_script.php">
                            
                            <!-- <div class="form-floating mb-3">
                                <textarea type="text" class="form-control" id="floatingInput"
                                    placeholder="Add question here..." rows="2"></textarea>
                                <label for="floatingInput">Question</label>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="username..." />
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Email..." />
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" />
                                <label for="password">Password</label>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







<?php 
include('includes/footer.php');
?>