<?php

if (isset($_POST['submit'])) {
    include('../db/connect.php');
    if( empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ){
       header('location:../adminregistration.php?response=error&class=danger&message=All fields are mandatory.');
   }
   else{  
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $role='admin';
    $activation_code= md5(time() .$username);
    $email_status='0';
    $query=mysqli_query($con,"insert into user(username,email,password,role,activation_code,status) values('$username','$email','$password','$role','$activation_code','$email_status')");
    if($query){
        $user_permission=mysqli_query($con,"insert into user_permission(user_id) values(1)");
            //echo $user_permission;    
        // if ($user_permission) {
        //     $to = $email;
        //     $subject = "Email Verification";
        //     $message = "<a href='https://mutaala.com/verifyEmail.php?activation_code=$activation_code'>Register Account</a>";
        //     $headers = "From: afzal1503a@aptechgdn.net";
        //     $headers .= "MIME-Version: 1.0" . "\r\n";
        //     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //     mail($to,$subject,$message,$headers);
        //         header('location:../login.php?response=success&class=success&message=Check Your email for verification');
        //     }
        //     else {
        //         header('location:../adminregistration.php?response=error&class=danger&message=User Permission Query Error');                   
        //     }  
        
        
        if ($permission) {

    $to = $email;
    $subject = "Email Verification";

    // Base URL
    $base_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

    // Verification URL
    $verify_url = $base_url . "/admin/verifyEmail.php?activation_code=" . urlencode($activation_code);

    // Email message
    $message = "
    <html>
    <body>
        <p>Hello,</p>
        <p>Please click the button below to verify your account:</p>
        <p>
            <a href='$verify_url'
               style='background:#026502;color:#fff;padding:10px 15px;
                      text-decoration:none;border-radius:5px;display:inline-block;'>
                Verify Email
            </a>
        </p>
        <p>If you did not create this account, please ignore this email.</p>
    </body>
    </html>
    ";

    // Headers
    $headers  = "From: Afzal <afzal1503a@aptechgdn.net>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    mail($to, $subject, $message, $headers);

    header('Location: ../login.php?response=success&class=success&message=Check your email for verification');
    exit;

} else {
    header('Location: ../adminregistration.php?response=error&class=danger&message=User Permission Query Error');
    exit;
}

        }
        else {
			header('location:../adminregistration.php?response=error&class=danger&message=Insert Query Error');                   
        }
    }
}

?>