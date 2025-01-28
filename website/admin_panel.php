<?php
  require("connection.php");
  session_start();
  session_regenerate_id(true);
  if(!isset($_SESSION['AdminLoginId'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body{
            margin: 0;
        }
        .header a{
            position: relative;
            display: inline-block;
            margin: 15px;
            padding: 12px 28px;
            text-align: center;
            font-size: 18px;
            letter-spacing: 1px;
            text-decoration: none;
            color:  #6f9ee6;
            background: transparent;
            cursor: pointer;
            transition: ease-out 0.5s;
            border: 2px solid #6f9ee6;
            border-radius: 10px;
            box-shadow: inset 0 0 0 0  #6f9ee6;
        }
        .header a:hover{
            color: white;
            box-shadow: inset 0 -100px 0 0 #6f9ee6;
        }
        div.header{
            color: #f0f0f0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            background-color: #2e2e2e;
        }
        button {
            position: relative;
            display: inline-block;
            margin: 15px;
            padding: 12px 28px;
            text-align: center;
            font-size: 18px;
            letter-spacing: 1px;
            text-decoration: none;
            color:  #6f9ee6;
            background: transparent;
            cursor: pointer;
            transition: ease-out 0.5s;
            border: 2px solid #6f9ee6;
            border-radius: 10px;
            box-shadow: inset 0 0 0 0  #6f9ee6;
        }

        button:hover {
            color: white;
            box-shadow: inset 0 -100px 0 0 #6f9ee6;
        }

    </style>
</head>
<body>
    <div class="header">
        <h1>ADMIN PANEL - <?php echo $_SESSION['AdminLoginId'] ?></h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <a href="/website/admin_crud.php" name="manage_products">Manage Products</a>
          <button type="submit" name="Logout">LOG OUT</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Phone No.</th>
                <th scope="col">Address</th>
                <th scope="col">Pay Mode</th>
                <th scope="col">Orders</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $query="SELECT * FROM `order_manager`";
              $user_result=mysqli_query($con,$query);
              while($user_fetch=mysqli_fetch_assoc($user_result))
              {
                echo"
                <tr>
                  <td>$user_fetch[order_id]</td>
                  <td>$user_fetch[full_name]</td>
                  <td>$user_fetch[phone_no]</td>
                  <td>$user_fetch[address]</td>
                  <td>$user_fetch[pay_mode]</td>
                  <td>            
                    <table class='table text-center'>
                    <thead class='thead-dark'>
                      <tr>
                        <th scope='col'>Item Name</th>
                        <th scope='col'>Price</th>
                        <th scope='col'>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                  ";
                   $order_query="SELECT * FROM `user_orders` WHERE `order_id`='$user_fetch[order_id]'";
                   $order_result=mysqli_query($con,$order_query);
                   while($order_fetch=mysqli_fetch_assoc($order_result))
                   {
                      echo"
                        <tr>
                          <td>$order_fetch[item_name]</td>
                          <td>$$order_fetch[price]</td>
                          <td>$order_fetch[Quantity]</td>
                        </tr>
                      ";
                   }
            echo"
                     </tbody>
                    </table>
                  </td>
                </tr>
                ";
              }
            ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
    <?php
      if(isset($_POST['Logout']))
      {
        session_destroy();
        header("location: index.php");
      }
    ?>
</body>
</html>