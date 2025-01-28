<?php 
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manange Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container bg-dark text-light p-3 rounded my-4">
      <div class="d-flex align-item-center justify-content-between px-3">
        <h2>
            <a href="admin_crud.php" class="text-white text-decoration-none"><i class="bi bi-bar-chart-fill"></i> Manage Products</a>
        </h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct">
            <i class="bi bi-plus-lg"></i> Add Product
        </button>
      </div>
    </div>

    <?php 
      
      if(isset($_GET['alert']))
      {
        if($_GET['alert']=='img_upload')
        {
          echo<<<alert
            <div class="container alert alert-danger alert-dismissible text-center" role="alert">
              <strong>Image Upload Failed! Server Down!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
        if($_GET['alert']=='img_rem_fail')
        {
          echo<<<alert
            <div class="container alert alert-danger alert-dismissible text-center" role="alert">
              <strong>Image Removal Failed! Server Down!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
        if($_GET['alert']=='add_failed')
        {
          echo<<<alert
            <div class="container alert alert-danger alert-dismissible text-center" role="alert">
              <strong>Cannot Add Product! Server Down!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
        if($_GET['alert']=='remove_failed')
        {
          echo<<<alert
            <div class="container alert alert-danger alert-dismissible text-center" role="alert">
              <strong>Cannot Remove Product! Server Down!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
        if($_GET['alert']=='update_failed')
        {
          echo<<<alert
            <div class="container alert alert-danger alert-dismissible text-center" role="alert">
              <strong>Cannot Update Product! Server Down!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
      }
      else if(isset($_GET['success']))
      {
        if($_GET['success']=='updated')
        {
          echo<<<alert
            <div class="container alert alert-success alert-dismissible text-center" role="alert">
              <strong>Product Updated Successfully!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
        if($_GET['success']=='added')
        {
          echo<<<alert
            <div class="container alert alert-success alert-dismissible text-center" role="alert">
              <strong>Product Added Successfully!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
        if($_GET['success']=='removed')
        {
          echo<<<alert
            <div class="container alert alert-success alert-dismissible text-center" role="alert">
              <strong>Prodect Removed Successfully!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          alert;
        }
      }

    ?>

    <div class="container mt-4 p-0">
      <table class="table table-hover text-center">
        <thead class="bg-dark text-light">
          <tr>
            <th width="10%" scope="col" class="rounded-start">Sr. No.</th>
            <th width="15%" scope="col">Image</th>
            <th width="10%" scope="col">Name</th>
            <th width="10%" scope="col">Price</th>
            <th width="20%" scope="col" class="rounded-end">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <?php 
          
          $query="SELECT * FROM `products`";
          $result=mysqli_query($con,$query);
          $i=1;
          $fetch_src=FETCH_SRC;

          while($fetch=mysqli_fetch_assoc($result))
          {
            echo<<<product
              <tr class="align-middle">
                <th scope="row">$i</th>
                <td><img src="$fetch_src$fetch[image]" width="150px"></td>
                <td>$fetch[name]</td>
                <td>$$fetch[price]</td>
                <td>
                  <a href="?edit=$fetch[id]" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                  <button onclick="confirm_rem($fetch[id])" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            product;
            $i++;
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/website/crud.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Product</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="number" class="form-control" name="price" min="1" required>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Image</label>
                            <input type="file" class="form-control" name="image" accept=".jpg, .png, .svg" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary" name="addproduct">Add</button>
                    </div>
                  </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/website/crud.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Product</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" id="editname" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="number" class="form-control" name="price" id="editprice" min="1" required>
                        </div>
                        <img src="" id="editimg" width="100%" class="mb-3"></br>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Image</label>
                            <input type="file" class="form-control" name="image" accept=".jpg, .png, .svg">
                        </div>
                        <input type="hidden" name="editpid" id="editpid">
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary" name="editproduct">Edit</button>
                    </div>
                  </div>
            </form>
        </div>
    </div>

<?php 
  if(isset($_GET['edit']) && $_GET['edit']>0)
  {
    $query="SELECT * FROM `products` WHERE `id`='$_GET[edit]'";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);
    echo"
      <script>
        var editproduct = new bootstrap.Modal(document.getElementById('editproduct'), {
          keyboard: false
        });
        document.querySelector('#editname').value=`$fetch[name]`;
        document.querySelector('#editprice').value=`$fetch[price]`;
        document.querySelector('#editimg').src=`$fetch_src$fetch[image]`;
        document.querySelector('#editpid').value=`$_GET[edit]`;
        editproduct.show();
      </script>
      ";
  }
?>

<script>
  function confirm_rem(id){
    if(confirm("Are you sure, you want to delete this item ?")){
      window.location.href="crud.php?rem="+id;
    }
  }

</script>

</body>
</html>