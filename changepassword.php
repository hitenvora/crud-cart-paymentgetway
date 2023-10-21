<?php 
if(!isset($_SESSION["id"]))
{
    echo "<script>
    window.location='login';
    </script>";
}
?>
<div class="container-fluid p-5 mt-2">
    <div class="row">
     <div class="col-md-4 p-5 shadow manage-sidebar">
        <ul>
        <li><a href="" class="text-success">Welcome To :<?php echo $_SESSION["fnm"];?></a></li>   
        <li><a href="<?php echo $mainurl;?>manage-profile">Manage Profile</a></li>
        <li><a href="<?php echo $mainurl;?>manage-notifications">Manage Notifications</a></li>
        <li><a href="<?php echo $mainurl;?>manage-orders">Manage Orders</a></li>
        <li><a href="<?php echo $mainurl;?>change-password">Change Password</a></li>
        <li><a href="">Delete Account</a></li>
        <li><a href="<?php echo $mainurl;?>?logout-here" class="btn btn-sm btn-danger">Logout!</a></li>
        </ul>
     </div>
     
     <div class="col-md-6 shadow ms-5 p-5">   
    <h2 class="text-center">Change Your Password</h2>
    <form method="post" enctype="multipart/form-data">
    
     <div class="form-group mt-3">
        <input type="password" name="opass"  placeholder="Enter old password" required class="form-control" required> 
        </div>   
        
     <div class="form-group mt-3">
        <input type="password" name="npass"  placeholder="Enter new password" required class="form-control" required> 
        </div>   

        <div class="form-group mt-3">
        <input type="password" name="cpass"  placeholder="Enter confirm password" required class="form-control" required> 
        </div>   

     <div class="form-group mt-3">
        <input type="submit"  name="changepass" value="Submit" class="btn btn-lg btn-info"> 
     
        </div>   

</div>

</form>
</div>    
</div>      

</div>      