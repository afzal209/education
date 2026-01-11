<?php 
include('includes/header.php');
ch_title("Moalym","Register");
include('db/connect.php');
// require_once 'socialLogin/config.php';


// if (!isset($_SESSION['user_token'])) {
//     header("Location: index.php");
//     ob_end_clean();
// }

if (isset($_POST['submit'])) {

    // print_r($_POST);
    // exit;

    if( empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])  ){
        echo "<script>location.href='register.php?response=error&class=danger&message=All fields are mandatory.';</script>";
    //    header('location:register.php?response=error&class=danger&message=All fields are mandatory.');
    //    ob_end_clean();
   }

   else{
       $id=$_POST['id'];
       $username=$_POST['username'];

       $email=$_POST['email'];

       $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
       
       $activation_code= md5(time() .$username);
       $email_status= 0;
       
       //$assign=implode(',', $assignacademic);
       $email_check=mysqli_query($con,"select * from user where email='$email'");
       $num_row=mysqli_num_rows($email_check);
       if($num_row > 0){
           $username = '';
           $email = '';
        echo "<script>location.href='register.php?response=error&class=danger&message=Email Already Exist.';</script>";
           
        //    header('location:register.php?response=error&class=danger&message=Email Already Exist');
        //    ob_end_clean();
       }
       else{
           $user_check=mysqli_query($con,"select * from user where username='$username'");
           $num_row_user=mysqli_num_rows($user_check);
           if($num_row_user > 0){
               $username = '';
               $email = '';
               $role = '';
            echo "<script>location.href='register.php?response=error&class=danger&message=Username Already Exist.';</script>";

            //    header('location:register.php?response=error&class=danger&message=Username Already Exist');
            //    ob_end_clean();
           }
           else{
                $to = $email;
                $subject = "Email Verification";
                $message = "<a href='http://mubalig.com/verifyEmail.php?activation_code=$activation_code'>Register Account</a>";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: danialjafri88@gmail.com";
                $mail = mail($to,$subject,$message,$headers);
                // print_r($to.':'.$subject.':'.$message.':'.$headers);
                // exit;
                if ($mail) {
                    $query=mysqli_query($con,"insert into user(username,email,password,role,activation_code,status) values('$username','$email','$password','$role','$activation_code','$email_status')");
                    $last_id = mysqli_insert_id($con);
                    if ($query) {
                        echo "<script>location.href='register.php?response=success&class=success&message=Check Your email for verification.';</script>";

                    }
                    else{
                        echo "<script>location.href='register.php?response=error&class=danger&message=error.';</script>";

                    }
                }
                else{
                    echo "<script>location.href='register.php?response=error&class=danger&message=Error in Mail.';</script>";
                }
           }
       }
   }

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

                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                        <form method="POST" action="">
                            
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
                            <button type="submit" class="btn btn-primary" name="submit">Register</button>

                                <!-- <input type="submit" name="submit" value="Login" class="btn btn-primary" /> -->
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