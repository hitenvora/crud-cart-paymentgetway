

<main id="main" class="main">

<div class="pagetitle">
  <h1>Manage All Course List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo $mainurl;?>admin-dashboard">Home</a></li>
      <li class="breadcrumb-item active">Manage All contacts data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
         

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">courselist</th>
                <th scope="col">coursename</th>
                <th scope="col">image</th>
                <th scope="col">durations</th>
                <th scope="col">oldprice</th>
                <th scope="col">offerprice</th>
                <th scope="col">description</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($adjoin as $row)
              {
              ?>
              <tr>
                <td><?php echo $row["co_id"];?></td>
                <td><?php echo $row["course_name"];?></td>
                <td><?php echo $row["coursename"];?></td>
                <td><?php echo $row["image"];?></td>
                <td><?php echo $row["duration"];?></td>
                <td><?php echo $row["oldprice"];?></td>
                <td><?php echo $row["offerprice"];?></td>
                <td><?php echo $row["descrptions"];?></td>

                <td><a href="<?php echo $mainurl;?>admin-managecontacts?deletecontactid=<?php echo $row["co_id"];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></a></td>
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
ma