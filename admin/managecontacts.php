

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage All Contacts</h1>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($shwcontact as $row)
                  {
                  ?>
                  <tr>
                    <td><?php echo $row["id"];?></td>
                    <td><?php echo $row["first_name"];?></td>
                    <td><?php echo $row["last_name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["phone "];?></td>
                    <td><?php echo $row["image"];?></td>
                    <td><?php echo $row["gender"];?></td>
                    <td><?php echo $row["hobbies"];?></td>
                    <td><?php echo $row["	gender"];?></td>
                    <td><?php echo $row["	gender"];?></td>


                    <td><a href="<?php echo $mainurl;?>admin-managecontacts?deletecontactid=<?php echo $row["contact_id"];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></a></td>
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
