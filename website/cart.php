<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
      <link  rel="stylesheet" type="text/css" href="cart.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
      *{
        font-family: 'Poppins', sans-serif;
       }
       .logo img{
        float: left;
        width: 170px;
        height: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="logo">
    <img src="/website/images/logo1.png">
  </div>
  <div class="container-fluid justify-content-end">
    <a href="/website/index.php" class="btn btn-outline-primary me-2" type="button">Home</a>
    <a href="/website/shop.php" class="btn btn-outline-secondary" type="button">Shop More</a>
  </div>
</nav>
    <div class="container">
      <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>My Cart</h1>
            </div>
        <div class="colo-lg-8">
            <table class="table">
              <thead class="text-center">
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Item Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="text-center">

                <?php
                if(isset($_SESSION['cart']))
                {
                  foreach($_SESSION['cart'] as $key => $value)
                  {
                    $sr=$key+1;
                    //print_r($value);
                    echo "
                    <tr>
                    <td>$sr</td>
                    <td>$value[item_name]</td>
                    <td>$$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                    <td>
                    <form action='manage_cart.php' method='POST'>
                      <input class='text-center iquantity' name='mod_quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                      <input type='hidden' name='item_name' value='$value[item_name]'>
                    </form>
                    </td>
                    <td class='itotal'></td>
                    <td>
                      <form action='manage_cart.php' method='POST'>
                        <button name='remove_item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                        <input type='hidden' name='item_name' value='$value[item_name]'>
                      </form>
                    </td> 
                    </tr>
                    ";
                  }
                }    
                ?>
                </tbody>
              </table>
        </div>
        <div class="col-lg-3">
          <div class="border bg-light rounded p-4">
          <h4>Grand Total:</h4>
          <h5 class="text-right" id="gtotal"></h5><br>
          <?php
            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
            {
          ?>
          <form action="purchase.php" method="post">
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone No.</label>
              <input type="number" name="phone_no" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" required>
            </div><br>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Cash On Delivery
              </label>
            </div>
            <div class="form-check">
               <input class="form-check-input" type="radio" name="pay_mode" value="UPI" id="flexRadioDefault2">
               <label class="form-check-label" for="flexRadioDefault2">
                 UPI
               </label>
            </div>
            <div class="form-check">
               <input class="form-check-input" type="radio" name="pay_mode" value="GPay" id="flexRadioDefault3">
               <label class="form-check-label" for="flexRadioDefault3">
                 Google Pay (GPay)
               </label>
            </div>
            <br>
            <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
          </form>
          <?php 
            }
          ?>
          </div>
        </div>
      </div>
    </div>

    <script>

      var gt=0;
      var iprice=document.getElementsByClassName('iprice');
      var iquantity=document.getElementsByClassName('iquantity');
      var itotal=document.getElementsByClassName('itotal');
      var gtotal=document.getElementById('gtotal');

      function subTotal()
      {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
          itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
          gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
      }

      subTotal();

    </script>

    </body>
</html>