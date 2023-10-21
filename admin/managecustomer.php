<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage All Customers </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $mainurl; ?>admin-dashboard">Home</a></li>
        <li class="breadcrumb-item active">Manage All Customers</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body" style="overflow:auto">
            <!-- Table with stripped rows -->
            <table class="table datatable" style="overflow:auto">
              <thead>
                <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Firstname</th>
                  <th scope="col">Lastname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Hobby</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Course</th>
                  <th scope="col">state</th>
                  <th scope="col">city</th>
                  <th scope="col">Register datetime</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($prof as $row) {
                ?>
                  <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><img src="../<?php echo $row["image"]; ?>" style="width:85px; height:85px"></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["hobbies"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["course_name"]; ?></td>
                    <td><?php echo $row["state_name"]; ?></td>
                    <td><?php echo $row["city_name"]; ?></td>
                    <td><?php echo $row["date_time"]; ?></td>

                    <td colspan="2">
                      <div style="width:85px">
                        <a href="<?php echo $mainurl; ?>admin-managecustomer?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a> | <a href="<?php echo $mainurl; ?>admin-managecustomer?editid=<?php echo $row["id"]; ?>" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>

                      </div>
                    </td>
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