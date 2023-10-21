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
        <li><a href="<?php echo $mainurl;?>manage-profile?deldata=<?php echo $prof[0]["id"];?>"onclick="return confirm('Are you sure to remove Your account ?')">Delete Account</a></li>
        <li><a href="<?php echo $mainurl;?>?logout-here" class="btn btn-sm btn-danger">Logout!</a></li>
        </ul>
     </div>
      
     <div class="col-md-6 shadow ms-5 p-5">   
    <h2 class="text-center">Manage your Profile</h2>
    <form method="post" enctype="multipart/form-data">
  
    
    <div class="form-group mt-3">
        <img src="<?php echo $prof[0]["image"];?>" value="<?php echo $prof[0]["image"]?>" class="img-fluid" style="width:400px; height:180px">
      <input type="file" name="img" required class="form-control"> 
      </div>   
     <div class="form-group mt-3">
        <input type="text" name="email" value="<?php echo $prof[0]["email"];?>" placeholder="Enter email" required class="form-control" required> 
        </div>   

   <div class="form-group mt-3">
      <input type="text" name="phone" value="<?php echo $prof[0]["phone"];?>" placeholder="Phone *" required class="form-control"> 
      </div>   
        
     <div class="form-group mt-3">
        <select name="course"  required class="form-control">
            <option value="">-select course-</option>
            <?php
            foreach($shwcourselist1  as $shw1)
            { 
                if($prof[0]["course_id"]==$shw1["course_id"])
                {
            ?>

            <option value="<?php echo $prof[0]["course_id"];?>" selected='selected'><?php echo $prof[0]["course_name"];?></option>

            <?php 
                }
                else 
                {
                    ?>

            <option value="<?php echo $shw1["course_id"];?>"><?php echo $shw1["course_name"];?></option>
            <?php 
            }
        }
            ?> 
        </select> 
        </div>

        <div class="form-group mt-3">
         <select name="state"  required class="form-control">
             <option value="">-select state-</option>
             <?php
             foreach($shwstate as $shwstate1)
             { 
                if($prof[0]["state_id"]==$shwstate1["state_id"])
                {
            ?>

            <option value="<?php echo $prof[0]["state_id"];?>" selected='selected'><?php echo $prof[0]["state_name"];?></option>

            <?php 
                }
                else 
                {
                    ?>

            <option value="<?php echo $shwstate1["state_id"];?>"><?php echo $shwstate1["state_name"];?></option>
            <?php 
            }
        }
            ?> 
         </select> 
         </div>
        

         
        <div class="form-group mt-3">
         <select name="city"  required class="form-control">
             <option value="">-select city-</option>
             <?php
             foreach($shwcity as $shwcity1)
             { 
                if($prof[0]["city_id"]==$shwcity1["city_id"])
                {
            ?>

            <option value="<?php echo $prof[0]["city_id"];?>" selected='selected'><?php echo $prof[0]["city_name"];?></option>

            <?php 
                }
                else 
                {
                    ?>

            <option value="<?php echo $shwcity1["city_id"];?>"><?php echo $shwcity1["city_name"];?></option>
            <?php 
            }
        }
            ?> 
         </select> 
         </div>

            

   
     <div class="form-group mt-3">
        <input type="submit"  name="upd" value="Update Profile" class="btn btn-lg btn-info"> 
     
        </div>   

</div>

</form>
</div>    
</div>      

</div>      