<?php
    require("connection.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($email, $reset_token)
    {
        require('C:\xampp\htdocs\website\PHPMailer\Exception.php');
        require('C:\xampp\htdocs\website\PHPMailer\SMTP.php');
        require('C:\xampp\htdocs\website\PHPMailer\PHPMailer.php');

        $mail = new PHPMailer(true);
        try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'uzmashaikh799@gmail.com';                     //SMTP username
                $mail->Password   = 'efwukqvezhyxlwve';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                //Recipients
                $mail->setFrom('uzmashaikh799@gmail.com', 'Uzma Shaikh');
                $mail->addAddress($email);     //Add a recipient
        
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Password Reset Link';
                $mail->Body    = "We got a request from you to reset your password! <br>
                Click the link below: <br>
                <a href='http://localhost/website/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
        
                $mail->send();
                return true;
            } 
            catch (Exception $e) {
                return false;
                }
    }

    if(isset($_POST['send-reset-link']))
    {
        $query="SELECT * FROM `users` WHERE `email`='$_POST[email]'";
        $result=mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                // email found
                $reset_token=bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/kolkata');
                $date=date("Y-m-d");
                $query="UPDATE `users` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `email`='$_POST[email]'";
                if(mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token))
                {
                    echo"
                    <script>
                    alert('Password Reset Link Sent To Mail');
                    window.location.href='/website/index.php';
                    </script>
                    ";
                }
                else
                {
                    echo"
                    <script>
                    alert('Server Down! Try Again Later!');
                    window.location.href='/website/index.php';
                    </script>
                    ";                
                }
            }
            else
            {
                echo"
                <script>
                alert('Email Not Registered!');
                window.location.href='/website/index.php';
                </script>
                ";
            }
        }
        else
        {
            echo"
            <script>
            alert('cannot run query');
            window.location.href='/website/index.php';
            </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link  rel="stylesheet" href="forgot.css">
</head>
<body>
    <div class="container">
        <div class="myform">
            <form method="POST">
                <h2>RESET PASSWORD</h2>
                <input type="email" placeholder="please enter valid email-id" name="email" required>
                <button type="submit" name="send-reset-link">Send Link</button>
            </form>
        </div>
        <div class="image">
            <img src="/website/images/forgot.jpg">
        </div>
    </div>