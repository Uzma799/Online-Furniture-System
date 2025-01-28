<?php
session_start();
$con=mysqli_connect("localhost","root","","website");

if(mysqli_connect_error()){
    echo"<script>
    alert('Cannot connect to database');
      window.location.href='cart.php';
    </script>";
    exit();
} 

if($_SERVER["REQUEST_METHOD"]== "POST")
{
    if(isset($_POST['purchase']))
    {
        $query1="INSERT INTO `order_manager`(`full_name`, `phone_no`, `address`, `pay_mode`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";
        if(mysqli_query($con,$query1))
        {
            $order_id=mysqli_insert_id($con);
            $query2="INSERT INTO `user_orders`(`order_id`, `item_name`, `price`, `Quantity`) VALUES (?,?,?,?)";
            $stmt=mysqli_prepare($con,$query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isii",$order_id,$item_name,$price,$Quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $item_name=$values['item_name'];
                    $price=$values['price'];
                    $Quantity=$values['Quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo"<script>
                  alert('Order Placed');
                  window.location.href='shop.php';
                </script>";
            }
            else
            {
                echo"<script>
                  alert('SQL Query Prepare Error');
                  window.location.href='cart.php';
                </script>";
            }
        }        
        else
        {
            echo"<script>
              alert('SQL Error');
              window.location.href='cart.php';
            </script>";
        }
    }
}

?>