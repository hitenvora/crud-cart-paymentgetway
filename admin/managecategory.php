

<main id="main" class="main">

<div class="pagetitle">
  <h1>Manage All Category</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo $mainurl;?>admin-dashboard">Home</a></li>
      <li class="breadcrumb-item active">Manage All category data</li>
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
                <th scope="col">Categoryname</th>
                <th scope="col">Added date</th>
                <th scope="col">descriptions</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($shwcat as $row)
              {
              ?>
              <tr>
                <td><?php echo $row["category_id"];?></td>
                <td><?php echo $row["categoryname"];?></td>
                <td><?php echo $row["added_date"];?></td>
                <td><?php echo $row["category_description"];?></td>
             
                <td><a href="<?php echo $mainurl;?>admin-managecategory?deletecategoryid=<?php echo $row["category_id"];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a> | <a href="<?php echo $mainurl;?>admin-managecategory?editcategoryid=<?php echo $row["category_id"];?>" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a></td>
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
