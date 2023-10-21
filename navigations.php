<?php 
$mainurl="http://localhost/phpprectices/crud-cart-paymentgetway/";
$baseurl="http://localhost/phpprectices/crud-cart-paymentgetway/assets/";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Document</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Add students mangements</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse float-right" id="navbarNav" style="margin-left:45%">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo $mainurl;?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $mainurl;?>course-list-data">Courses</a>
              </li>
              <?php 
               if(!isset($_SESSION["id"]))
               {      
              ?>

              <li class="nav-item">
                <a href="<?php echo $mainurl;?>login" class="nav-link">Account!</a>
              </li>
              <?php 
               }
               else 
               {
                ?>

             
        <li class="nav-item dropdown">
                <a class="nav-link text-success dropdown-toggle" data-bs-toggle="dropdown" href="#">Welcome To :<?php echo ucfirst($_SESSION["fnm"]);?></a>

        <ul class="dropdown-menu p-4" style="width:250px">
        <li><a href="<?php echo $mainurl;?>manage-profile">Manage Profile</a></li>
        <li><a href="<?php echo $mainurl;?>manage-notifications">Manage Notifications</a></li>
        <li><a href="<?php echo $mainurl;?>manage-orders">Manage Orders</a></li>
        <li><a href="<?php echo $mainurl;?>change-password">Change Password</a></li>
        <li><a href="">Delete Account</a></li>
        <li><a href="<?php echo $mainurl;?>?logout-here" class="btn btn-sm btn-danger">Logout!</a></li>
               </ul>
                      
              
              
               </li>

             
              <?php 
               }
               ?>
  <?php 
               if(!isset($_SESSION["id"]))
               {      
              ?>
<li class="nav-item">
<a class="nav-link" href="#">View Cart <i class="bi bi-cart"><span class="badge badge-danger badge-sm bg-danger text-white">0</span></i></a>
</li>  

<?php 
               }
               else 
               {

 ?>               


<li class="nav-item">
<a class="nav-link" href="<?php echo $mainurl;?>view-cart">View Cart <i class="bi bi-cart"><span class="badge badge-danger badge-sm bg-danger text-white"><?php echo $totalcartcount[0]["total"];?></span></i></a>
</li>

<?php 
               }
               ?>
            </ul>
          </div>
        </div>
      </nav>


    
</body>
</html>