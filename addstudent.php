<div class="modal fade" role="dialog" id="addst">
 <div class="modal-dialog">
 <div class="modal-content p-5">

    <h2 class="text-center">Add students</h2>
    <form method="post" enctype="multipart/form-data">
     <div class="form-group mt-3">
    <input type="text" name="fnm" placeholder="Enter firstname" required class="form-control"> 
    </div>   
    <div class="form-group mt-3">
        <input type="text" name="lnm" placeholder="Enter lastname" required class="form-control"> 
        </div>   
     <div class="form-group mt-3">
        <input type="text" name="em" placeholder="Enter email" required class="form-control"> 
        </div>   
            
     <div class="form-group mt-3">
      <input type="password" name="password" placeholder="Enter password" required class="form-control"> 
      </div>   

     <div class="form-group mt-3">
      <input type="file" name="img" required class="form-control"> 
      </div>   
            
     <div class="form-group mt-3">
      Male :<input type="radio" name="gender" value="male"> 
      Female<input type="radio" name="gender" value="female"> 
       
   </div>   

     <div class="form-group mt-3">
      Reading <input type="checkbox" name="chk[]" value="reading"> 
      Playing <input type="checkbox" name="chk[]" value="playing">
      surfing <input type="checkbox" name="chk[]" value="surfing"> 
      Cooking<input type="checkbox" name="chk[]" value="cooking" >  
   </div>   

   

   <div class="form-group mt-3">
      <input type="text" name="phone" placeholder="Phone *" required class="form-control"> 
      </div>   
        
     <div class="form-group mt-3">
        <select name="course"  required class="form-control">
            <option value="">-select course-</option>
            <?php
            foreach($shw as $shw1)
            { 
            ?>
            <option value="<?php echo $shw1["course_id"];?>"><?php echo $shw1["course_name"];?></option>
            <?php 
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
             ?>
             <option value="<?php echo $shwstate1["state_id"];?>"><?php echo $shwstate1["state_name"];?></option>
             <?php 
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
             ?>
             <option value="<?php echo $shwcity1["city_id"];?>"><?php echo $shwcity1["city_name"];?></option>
             <?php 
             }
             ?> 
         </select> 
         </div>
        
     <div class="form-group mt-3">
        <input type="submit"  name="addstudent" value="AddStdents" class="btn btn-lg btn-info"> 
        
        <input type="reset"  name="reset" value="Reset" class="btn btn-lg btn-danger"> 
        </div>   
</div>
</div>        