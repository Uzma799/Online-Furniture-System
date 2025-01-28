<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link  rel="stylesheet" href="style.css">
</head>
<body>
    <section class="message" id="message">
        <form method="POST"> 
            <div class="msg">
                <h3>Get In <span>Touch</span></h3>
            </div>
            <input type="text" name="name" placeholder="Full Name" class="box" required>
            <input type="email" name="email" placeholder="E-mail" class="box" required>
            <input type="number" name="phone" placeholder="Phone Number" class="box" required>
            <textarea name="message" placeholder="Message" class="box" cols="30" rows="10" required></textarea>
            <button type="submit" name="submit" class="message-btn">Message</button>
        </form>
    </section>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require('C:\xampp\htdocs\website\PHPMailer\Exception.php');
    require('C:\xampp\htdocs\website\PHPMailer\SMTP.php');
    require('C:\xampp\htdocs\website\PHPMailer\PHPMailer.php');

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $message=$_POST['message'];

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
      $mail->addAddress('uzma.shaikh_it@scct.edu.in');     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Contact Us';
      $mail->Body    = "Name: $name <br> Email: $email <br> PhoneNo.: $phone <br> Message: $message";

      $mail->send();
      echo "<script>alert('Message has been sent')</script>";
         } catch (Exception $e) 
           {
             echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
           }
    }
    ?>
    
</body>
</html>