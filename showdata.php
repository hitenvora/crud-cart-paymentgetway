<div class="container-fluid p-5 mt-2">
<div class="row">
<div class="col-md-4">
    <h4 class="text-center mt-5">Student management systems</h4>
    <img src="https://st3.depositphotos.com/1907633/19504/i/600/depositphotos_195048738-stock-photo-data-management-system-dms-business.jpg" style="width:90%">
</div>    
<div class="col-md-8" style="overflow:auto">
<button type="button" data-bs-toggle="modal" data-bs-target="#addst" class="btn btn-info btn-lg float-right" style="float: right;">Add student</button>
<h1 class="text-center mt-4">Show all students Data</h1>
<hr class="border border-1 border-danger w-25 mx-auto">
<table id="tbl" class="display mt-4" style="width:100%">
    <thead>
        <tr>
        <th>id</th>

            <th>FirtName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>photo</th>
            <th>Phone</th>
            <th>Hobby</th>
            <th>Gender</th>
            <th>Course</th>
            <th>state</th>
            <th>city</th>
            <th>Register Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
         foreach($jointable as $row)
         {
        ?>
        <tr>
        <td><?php echo $row["id"]; ?> </td>
         <td><?php echo $row["first_name"]; ?> </td>
         <td><?php echo $row["last_name"]; ?> </td>
         <td><?php echo $row["email"]; ?> </td>
         <td><?php echo $row["phone"]; ?> </td>
         <td><img src="<?php echo $row["image"]; ?>"style="width:125px; height:125px" >  </td>
         <td><?php echo $row["gender"]; ?>  </td>
         <td><?php echo $row["hobbies"]; ?>  </td>
         <td><?php echo $row["state_name"]; ?>  </td>
         <td><?php echo $row["course_name"]; ?>  </td>
         <td><?php echo $row["city_name"]; ?>  </td>
         <td><?php echo $row["date_time"]; ?>  </td>
            <td><a href="<?php echo $row["course_id"]; ?>" class="btn btn-sm btn-danger"><span class="bi bi-trash"></span></a> | <a href="<?php echo $row["course_id"]; ?>" class="btn btn-sm btn-info"><span class="bi bi-pencil"></span></a></td>
        </tr>
    
         <?php 
    }
    ?>
    </tbody>
</table>


</div>
</div>
</div>
</div>

<!-- <script>
    $(document).ready(function () {
        $('#tbl').DataTable();
});
</script> -->