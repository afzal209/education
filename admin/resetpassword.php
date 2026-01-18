<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db/connect.php';

/* ======================
   PASSWORD UPDATE LOGIC
====================== */
if (isset($_POST['submit'])) {

    $email   = mysqli_real_escape_string($con, $_POST['email']);
    $token   = mysqli_real_escape_string($con, $_POST['token']);
    $new     = $_POST['newpassword'];
    $confirm = $_POST['confirmpassword'];

    // Check password match
    if ($new !== $confirm) {
        header("location: resetpassword.php?token=$token&email=$email&response=error&class=danger&message=Passwords do not match");
        exit;
    }

    // Hash password
    $hash = password_hash($new, PASSWORD_DEFAULT);

    // Update password & clear token
    $update = mysqli_query(
        $con,
        "UPDATE user 
         SET password='$hash', token='' 
         WHERE email='$email' AND token='$token'"
    );

    if ($update && mysqli_affected_rows($con) > 0) {
        header("location: login.php?response=success&class=success&message=Password changed successfully");
        exit;
    } else {
        header("location: forgetpassword.php?response=error&class=danger&message=Invalid or expired link");
        exit;
    }
}

/* ======================
   TOKEN VALIDATION
====================== */
if (isset($_GET['email']) && isset($_GET['token'])) {

    $email = mysqli_real_escape_string($con, $_GET['email']);
    $token = mysqli_real_escape_string($con, $_GET['token']);

    $check = mysqli_query(
        $con,
        "SELECT id FROM user WHERE email='$email' AND token='$token'"
    );

    if (mysqli_num_rows($check) == 0) {
        header("location: forgetpassword.php?response=error&class=danger&message=Link expired");
        exit;
    }

} else {
    header("location: login.php");
    exit;
}
?>

<?php
include_once 'includeFile/header.php';
ch_title("Reset Password");
include_once 'includeFile/navbar.php';
?>



            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Reset Password Page				
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
						</div>	
					</div>
				</div>
			</section>
            <div class="whole-wrap">
                <div class="container" >
                    <div class="section-top-border">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <h3 class="mb-30 text-center">Reset Password Form</h3>
                                
									<form class="contactform" method="post" action="#">
                                    <?php
									if(@$_GET['response'] != ''){
                                        echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                    <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                </div>';
                                            }
									   ?>   
                                    <div class="mt-10">
                                        <input type="password" name="newpassword" placeholder="Enter New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter New Password'" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="password" name="confirmpassword" placeholder="Enter Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Confirm Password'" required class="single-input">
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                                    <div class="button-group-area mt-40">
                                        <input class="genric-btn success-border circle" type="submit" name="submit" value="Login">
                                        <!-- <button class="genric-btn success-border circle arrow">Login<span class="lnr lnr-arrow-right"></span></button> -->
                                    </div>                          
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
<?php include_once 'includeFile/footer.php'; ?>
<?php ob_end_flush(); ?>
