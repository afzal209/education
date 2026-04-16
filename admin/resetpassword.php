<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/education/config.php';
   include(BASE_PATH.'db/connect.php');
   ob_start();
    if(isset($_GET['email']) && isset($_GET['token'])){
        
    $email=$_GET['email'];
    $token=$_GET['token'];
    $select=mysqli_query($con,"select id from user where email='$email' and token='$token'");
    if(mysqli_num_rows($select) > 0){
       include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Reset Passward");
        // include_once 'includeFile/navbar.php';
        // include 'phpScript/resetpassword_script.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">    
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Reset Password</h2>
                </div>
                <div class="card-body">
                    <?php 
                        if (!empty($_GET['response'])) {
                            echo '<div class="alert alert-' . htmlspecialchars($_GET['class']) . '">
                                    <strong>' . ucfirst(htmlspecialchars($_GET['response'])) . '!</strong> ' . htmlspecialchars($_GET['message']) . '
                                  </div>';
                        }
                    ?>
                    <form method="POST" >

                        <div class="form-floating mb-3">
                            <input type="password" name="newpassword" class="form-control" id="newpassword"
                                placeholder="Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter New Password'" required />
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="confirmpassword" class="form-control" id="confirmpassword"
                                placeholder="Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter Confirm Password'" required />
                            <label for="password">Password</label>
                        </div>

                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <div class="d-flex flex-wrap gap-2">
                            <!-- <button type="submit" name="submit" class="btn btn-primary flex-grow-1">Reset
                                Password</button> -->
                             <input class="btn btn-primary flex-grow-1" type="submit" name="submit" value="Login">
                            <!-- <a href="register.php" class="btn btn-success flex-grow-1">Register</a> -->
                            <!-- <a href="javascript:void(0)" onclick="window.location ='<?php echo $authUrl ?>';" 
                               class="btn btn-secondary flex-grow-1">
                                <i class="fa fa-google"></i> Login with Google
                            </a> -->
                        </div>
                    </form>
                    <?php
									   if (isset($_POST['submit'])) {
                                        // print_r($_POST);
                                        // exit;
                                        $email=$_POST['email'];
                                        $token=$_POST['token'];
                                    
                                    
                                        
                                        $new=$_POST['newpassword'];
                                        $confirm=$_POST['confirmpassword'];
                                    
                                        $hash = password_hash($new ,PASSWORD_DEFAULT);
                                    
                                         if (password_verify($confirm,$hash)) {
                                            //  echo 'equal';
                                            //$hash = password_hash($new,PASSWORD_BCRYPT);
                                            $query=mysqli_query($con,"update user set password='$hash',token='' where email='$email'");
                                            // echo $query;
                                            if ($query) {
                                                //echo $query;
                                                header('location:index.php?response=success&class=success&message=Password Change Successfully!');
                                            } else {
                                                //echo $query;
                                    
                                                header('location:forgetpassword.php?response=error&class=danger&message=Kindly forgot Password Again');
                                            }
                                            
                                         } 
                                        //  else {
                                        //      header('location: ../resetpassword.php?token='.$token.'&email='.$email.'&response=error&class=danger&message=Password not Match!');
                                        //  }
                                    
                                    } 
                                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

    include_once(BASE_PATH.'/includes/footer.php'); 
    }
    else {
        header('location: forgetpassword.php?response=error&class=danger&message=Link expired');
    } 
        }
        else {
        header("location: index.php");
        exit();
    }
    ob_end_flush();
?>
