<?php
include_once 'db/connect.php';
include('includes/header.php');
ch_title("Moalym", "Login");
// include('db/connect.php');
include('socialLogin/config.php');
// @session_start();
// if (!empty($_SESSION['user_token'])) {
//     echo "<script>location.href='add_academic.php';</script>";
//     // ob_end_clean();
// }
// elseif(!empty($_SESSION['data']['email']))
// {
//     echo "<script>location.href='add_academic.php';</script>";

//     // header('location:index.php');
//     // ob_end_clean();
// }


if (isset($_SESSION['data']) !=null) {
    echo "<script>location.href='add_academic.php';</script>";
    // ob_end_clean();
}


if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // Store user information or perform other actions as needed
    $userinfo = [
        'email' => $google_account_info['email'],
        'first_name' => $google_account_info['givenName'],
        'last_name' => $google_account_info['familyName'],
        'gender' => $google_account_info['gender'],
        'full_name' => $google_account_info['name'],
        'picture' => $google_account_info['picture'],
        'verifiedEmail' => $google_account_info['verifiedEmail'],
        'token' => $google_account_info['id'],
      ];


      $user_email=$userinfo['email'];
      $user_name=$userinfo['full_name'];
      $user_image=$userinfo['picture'];

      $query2="SELECT * FROM `user` WHERE email='$user_email'";
      $query4=mysqli_query($con,$query2);
      $row=mysqli_num_rows($query4);
      //echo $row;
      //exit;
      if($row>0)
      {
          
        $update="UPDATE `user` SET username='$user_name', user_image='$user_image' where email ='$user_email'";
        
        $query3=mysqli_query($con,$update);
        // echo $update;
        // exit;
      }
      else
      {
        //   echo 'yes';
        //   exit;
        $insert_query="insert into user(email,username,user_image) values('$user_email','$user_name','$user_image')";
        $query1=mysqli_query($con,$insert_query);
        // echo $insert_query;
        // exit;
      }
    $email = $google_account_info['email'];
    $name = $google_account_info['name'];
    // print_r($userinfo);
    // exit;
    // Store the token in the session variable
    $_SESSION['data']['social'] = $userinfo;
    
    
    // print_r($_SESSION['data']['social']);
    // exit;
    // Redirect to the registration page
    if ($_SESSION['url'] == null) {
        // print_r($_SESSION['data']['social']);
        // exit;
        echo "<script>location.href='add_test_subject.php';</script>";

    }
    else{
        echo "<script>location.href='$_SESSION[url]';</script>";

    }

}


if(isset($_POST['submit'])){

	// echo 'test';
	// exit;

    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>location.href='login.php?response=error&class=danger&message=Field Empty.';</script>";
    }


    else{
        $email=$_POST['email'];

        $password=$_POST['password'];
        $nemail = false; 
    
        $npass = false;
        $select=mysqli_query($con,"SELECT * FROM user WHERE (username ='$email' OR email = '$email' ) AND status = 1 ");
        
    
        // while($row=mysqli_fetch_assoc($select)){
            $row=mysqli_fetch_assoc($select);
            // $user = mysqli_fetch_assoc($select);
        $user_id = $row['id'];
        // // $permissionQuery = mysqli_query($con,"SELECT * FROM user_permission where user_id = ". $user_id );
        $password_hash = $row['password'];
        if (password_verify($password,$password_hash)) {
        	
                
                $_SESSION['data']['local']   = $row;
    
              

                // echo "<script>location.href='add_academic.php';</script>";
                if ($_SESSION['url'] == null) {
                    echo "<script>location.href='add_test_subject.php';</script>";
            
                }
                else{
                    echo "<script>location.href='$_SESSION[url]';</script>";
            
                }
            }
            else{
                echo "<script>location.href='login.php?response=error&class=danger&message=Invalid Credentials!.';</script>";
            }
            
      
    }

	

			

}


// Rest of your code for the login form
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
                    <form method="POST" action="#">
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
                            <a href="register.php" class="btn btn-success flex-grow-1">Register</a>
                            <a href="javascript:void(0)" onclick="window.location ='<?php echo $authUrl ?>';" 
                               class="btn btn-secondary flex-grow-1">
                                <i class="fa fa-google"></i> Login with Google
                            </a>
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