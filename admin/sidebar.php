<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="<?php echo $mainurl; ?>admin-dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo $mainurl; ?>admin-managecustomer">
        <i class="bi bi-menu-button-wide"></i><span>Manage students</span>
      </a>

    </li><!-- End Components Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-cart"></i><span>Add Category</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?php echo $mainurl; ?>admin-addcategory">
            <i class="bi bi-circle"></i><span>Add Category</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $mainurl; ?>admin-managecategory">
            <i class="bi bi-circle"></i><span>Manage Category</span>
          </a>
        </li>

      </ul>
    </li><!-- End Forms Nav -->



    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
        <i class="bi bi-cart"></i><span>Add Course</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?php echo $mainurl; ?>admin-addcourse">
            <i class="bi bi-circle"></i><span>Add Course</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $mainurl; ?>admin-managecourse">
            <i class="bi bi-circle"></i><span>Manage course</span>
          </a>
        </li>

      </ul>
      <!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo $mainurl; ?>admin-manageorders">
        <i class="bi bi-file-earmark"></i>
        <span>Manage Orders</span>
      </a>
    </li><!-- End Blank Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo $mainurl; ?>admin-managereviews">
        <i class="bi bi-file-earmark"></i>
        <span>Manage Reviews</span>
      </a>
    </li><!-- End Blank Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo $mainurl; ?>">
        <i class="bi bi-power"></i>
        <span>Logout here</span>
      </a>
    </li><!-- End Blank Page Nav -->

  </ul>

</aside><!-- End Sidebar-->