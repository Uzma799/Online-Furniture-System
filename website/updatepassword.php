<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: white;
            padding: 50px;
            box-shadow: 0 50px 50px -50px darkslategray;
        }
        form h3{
            color: #1c1c1e;
            margin-bottom: 25px;
        }
        form input{
            border: none;
            outline: none;
            border-radius: 0;
            width: 100%;
            border-bottom: 2.5px solid #1c1c1e;
            margin-bottom: 25px;
            padding: 7px 0;
            font-size: 14px;
        }
        form button{
            color: white;
            background-color: #1c1c1e;
            border: none;
            outline: none;
            border-radius: 2px;
            font-size: 18px;
            padding: 5px 12px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    
<?php

    require("connection.php");

    if(isset($_GET['email']) && isset($_GET['reset_token']))
    {
       date_default_timezone_set('Asia/kolkata');
       $date=date("Y-m-d");
       $query="SELECT * FROM `users` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
       $result=mysqli_query($con,$query);
       if($result)
       {
        if(mysqli_num_rows($result)==1)
        {
            echo"
            <form method='POST'>
            <h3>Create New Password</hr><br><br>
            <input type='password' placeholder='Enter New Password' name='password' required>
            <button type='submit' name='updatepassword'>UPDATE</button>
            <input type='hidden' name='email' value='$_GET[email]'>
            </form>
            ";
        }
        else
        {
        echo"
        <script>
        alert('Invalid or Expired Link');
        window.location.href='/website/index.php';
        </script> 
        ";
        }
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

?>

<?php 

  if(isset($_POST['updatepassword']))
  {
    $pass=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $update="UPDATE `users` SET `password`='$pass',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$_POST[email]'";
    if(mysqli_query($con,$update))
    {
        echo"
        <script>
        alert('Password Updated Successfully');
        window.location.href='/website/reg-form.php';
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

?>

</body>
</html>