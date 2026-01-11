<?php 
include('includes/header.php');
ch_title("Moalym", "Login");
include('../db/connect.php');
include('../socialLogin/config.php');


if (isset($_SESSION['user_token'])) {
    header("Location: register.php");
    ob_end_clean();
    // exit; // Always exit after redirect
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // Store user information or perform other actions as needed
    $email = $google_account_info->email;
    $name = $google_account_info->name;

    // Store the token in the session variable
    $_SESSION['user_token'] = $token;

    // Redirect to the registration page
    header('Location: register.php');
    ob_end_clean();

}

// Rest of your code for the login form
?>


<div class="container mt-5" style="margin: auto;">
        <div class="row ">
            <div class="col-10" >
                <div class="card" >
                    <div class="card-header">
                        <h2 style="text-align:center">Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="../admin/phpScript/login_script.php">
                            
                            <!-- <div class="form-floating mb-3">
                                <textarea type="text" class="form-control" id="floatingInput"
                                    placeholder="Add question here..." rows="2"></textarea>
                                <label for="floatingInput">Question</label>
                            </div> -->
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
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-1">
                                        <input type="submit" name="submit" value="Login" class="btn btn-primary" />
                                    </div>
                                    <div class="col-1">
                                        <a href="javascript:void(0)"   onclick="window.location ='<?php echo $authUrl ?>';" class="btn btn-secondary"><i class="fa fa-google" aria-hidden="true"></i></a>
                                    </div>
                                </div>
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