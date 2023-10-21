<script>
  // jquery bvalidator validation
  $(document).ready(function() {
    $("#frm1").bValidator();
  })
</script>

<!-- tiny text -->



<main id="main" class="main">
  <div class="pagetitle">
    <h1>Admin Add Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $mainurl; ?>admin-dashboard">Home</a></li>
        <li class="breadcrumb-item">Add Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Courses</h5>

            <!-- Horizontal Form -->
            <form method="post" id="frm1" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Select Course Category*</label>
                <div class="col-sm-9">
                  <select class="form-control" name="coursecategory" id="inputText" data-bvalidator="required">
                    <option value="">-select Category-</option>
                    <?php
                    foreach ($shwcourse as  $shwcourse1) {
                    ?>
                      <option value="<?php echo $shwcourse1["course_id"]; ?>"><?php echo $shwcourse1["corse_name"]; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Course Name *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="cname" id="inputText" data-bvalidator="required,alpha">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Course Image *</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control" name="cimg" id="inputText" data-bvalidator="required">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Course duration *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="duration" id="inputText" data-bvalidator="required">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Course price *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="price" id="inputText" data-bvalidator="required">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Offer price *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="newprice" id="inputText" data-bvalidator="required">
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Course Descriptions</label>
                <div class="col-sm-9">
                  <textarea name="coursedesc" id="mytextarea" data-bvalidator="required" style="height:80px !important"></textarea>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="addcourse" class="btn btn-primary">Add Course</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Horizontal Form -->

          </div>
        </div>


      </div>


  </section>

</main><!-- End #main -->

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>