<script>
// jquery bvalidator validation
$(document).ready(function(){
  $("#frm").bValidator();
})
</script>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Admin Add Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">AddCategory</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Category</h5>

              <!-- Horizontal Form -->
              <form method="post" id="frm">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="catname" id="inputText" data-bvalidator="required,alpha">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Added Date</label>
                  <div class="col-sm-9">
                    <input type="date"  name="addate" class="form-control" id="inputEmail" data-bvalidator="required">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Descriptions</label>
                  <div class="col-sm-9">
                    <textarea class="form-control"  name="catdesc" id="inputPassword" data-bvalidator="required"></textarea>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" name="addcat" class="btn btn-primary">Add Category</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


        </div>

    
    </section>

  </main><!-- End #main -->