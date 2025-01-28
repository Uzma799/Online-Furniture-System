<?php
require("connection.php");
session_start();

       //For Login
       if(isset($_POST['login_btn']))
       {
        $query="SELECT * FROM `users` WHERE `email`='$_POST[userid]' OR `user_id`='$_POST[userid]'";
        $result=mysqli_query($con,$query);

        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
               $result_fetch=mysqli_fetch_assoc($result); 
               if(password_verify($_POST['password'], $result_fetch['password']))
               {
                //If password matched
                $_SESSION['logged_in']=true;
                $_SESSION['user_id']=$result_fetch['user_id'];
                header("location: index.php");
               }
               else
               {
                //If incorrect password
                 echo"
                  <script>
                    alert('Incorrect Password!');
                    window.location.href='reg-form.php';
                  </script>
              ";
               }
            }
            else
            {
              echo"
                <script>
                  alert('Email Or UserID Not Registered!');
                  window.location.href='reg-form.php';
                </script>
              ";
            }
        }
        else
        {
          echo"
            <script>
              alert('Cannot Run Query');
              window.location.href='reg-form.php';
            </script>
          ";
        }
       }


    //For Registration
    if(isset($_POST['register_btn']))
    {
        $user_exist_query="SELECT * FROM `website`.`users` WHERE `user_id`='$_POST[user_id]' OR `email`='$_POST[email]'" ;
        $result = mysqli_query($con,$user_exist_query);

        if($result)
        {
            if(mysqli_num_rows($result)>0)                // If any user has already taken password or email
            {
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['user_id']==$_POST['user_id'])
                {
                    // error for password already registered
                    echo"
                    <script>
                      alert('$result_fetch[user_id] - UserID Already Taken');
                      window.location.href='reg-form.php';
                    </script>";
                }
                else
                {
                    // error for email already registered
                    echo"
                    <script>
                      alert('$result_fetch[email] - E-mail Already Taken');
                      window.location.href='reg-form.php';
                    </script>";
                }
            }
            else // It will be executed if no one has taken password or email
            {
                $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
                $query = "INSERT INTO `users` (`user_id`, `password`, `email`, `phone`) VALUES ('$_POST[user_id]', '$password', '$_POST[email]', '$_POST[phone]');";
                if(mysqli_query($con,$query))
                {
                    // If data inserted successfully
                    echo"
                    <script>
                      alert('Registration Successfull');
                      window.location.href='reg-form.php';
                    </script>
                  ";
                }
                else
                {
                    // If data cannot be inserted
                    echo"
                    <script>
                      alert('Cannot Register');
                      window.location.href='reg-form.php';
                    </script>
                  ";
                }
            }      
        }
        else
        {
            echo"
              <script>
                alert('Cannot Run Query');
                window.location.href='reg-form.php';
              </script>
            ";
        }
    }

?>
<html>
<html lang="en">
<head>
    <title>Registration & Login Form</title>
    <link rel="stylesheet" type="text/css" href="/website/reg-form.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
              <div id="btn"></div>
                  <button type="button" class="toggle-btn" onclick="login()">Login</button>
                  <button type="button" class="toggle-btn" onclick="register()">Register</button>
              </div>
            <form id="login" class="input-group" method="post">
                <p><b>User Id: <input type="text" name="userid" class="input-field" placeholder="Enter User Id" required></b></p><br>
                <p><b>Password: <input type="password" name="password" class="input-field" placeholder="Enter Password" id="password" required></b></p><br><br>
                    <input type="submit" class="submit-btn" name="login_btn" value="Log In">
                    <br><br>
                    <a href="/website/forgot.php" style="color:black; padding: 10px 75px;">Forgot Password?</a>
            </form> <br>
            <form id="register" class="input-group" method="post">
                <p><b>User Id: <input type="text" class="input-field" name="user_id" placeholder="Enter User Id" required></b></p><br>
                <p><b>Password: <input type="password" class="input-field" name="password" placeholder="Enter Password" id="password" required></b></p><br>
                <p><b>Email: </b></p> <input type="email" placeholder="Enter Email-id" name="email" id="email" style="width: 250px; height: auto; background: linear-gradient(rgb(0,0,00,0.2),rgb(0,0,0,0.2));" required><br><br>
                <p><b>Phone No.: <input type="number" class="input-field" name="phone" placeholder="Enter Phone No." required></b></p><br>
                    <input type="submit" class="submit-btn" name="register_btn" value="Register">
            </form> <br>
        </div>
    </div>

<?php

   function input_filter($data)
   {
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
   }

  if(isset($_POST['login_btn']))
  {
    //Filtering user input
    $AdminName=input_filter($_POST['userid']);
    $AdminPass=input_filter($_POST['password']);

    //Escaping special symbols used in SQL statement
    $AdminName=mysqli_real_escape_string($con,$AdminName);
    $AdminPass=mysqli_real_escape_string($con,$AdminPass);

    //Query template
    $query="SELECT * FROM `admin_login` WHERE `Admin_Name`=? AND `Admin_Password`=?";

    //Prepare statement
    if($stmt=mysqli_prepare($con,$query))
    {
        mysqli_stmt_bind_param($stmt,"ss",$AdminName,$AdminPass); //binding value to template
        mysqli_stmt_execute($stmt); //execute prepared statement
        mysqli_stmt_store_result($stmt); //transfering the result of execution in $stmt
        if(mysqli_stmt_num_rows($stmt)==1)
        {
            session_start();
            $_SESSION['AdminLoginId']=$AdminName;
            header("location: admin_panel.php");
        }
        else
        {
            echo"<script>
            alert('Invalid Admin Name or Password!');
            </script>";
        }
        mysqli_stmt_close($stmt);
    }
    else
    {
        echo"<script>
            alert('SQL Query cannot be Preared');
            </script>";
    }
  }

?>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left="-400px"
            y.style.left="170px"
            z.style.left="120px"
        }

        function login(){
            x.style.left="170px"
            y.style.left="700px"
            z.style.left="0px"
        }
    </script>
</body>
</html>