    <div class="container-fluid p-4 mt-2">

        <div class="row">
            <div class="col-md-3 shadow p-4 h-75">
                <h4 class="text-center mt-5">Select course Hurry Up!</h4>
                <hr class="border border-1 w-25 mx-auto">
                <ul class="sidebar-link">
                    <li><a href="<?php echo $mainurl; ?>course-list-data">All Courses</a></li>
                    <?php
                    foreach ($shwcourse as $shwcourse1) {
                    ?>
                        <li><a href="<?php echo $mainurl; ?>course-details?coursedetails=<?php echo $shwcourse1["course_id"]; ?>"><?php echo $shwcourse1["course_name"]; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="col-md-8 p-3 shadow ms-2" style="overflow:auto">
                <h3 class="text-center mt-4 bg-dark text-white p-3">50% off in fee on register Today's</h3>
                <hr class="border border-1 border-danger w-25 mx-auto">
                <div class="row">


                    <?php
                    //    foreach($addtocart as $row)
                    //    {
                    ?>
                    <form method="post">
                        <input type="text" name="coid" value="<?php echo $addtocart[0]["co_id"]; ?>">
                        <div class="col-md-5 p-3">
                            <!-- <img src="admin/<?php echo $row["coursephoto"]; ?>" style="width:100%; height:100px"> -->
                        </div>

                        <div class="col-md-6 ms-2 p-3">
                            <h5><?php echo $row["coursename"]; ?></h5>
                            <p><b>Duration :</b><?php echo $row["duration"]; ?></p>
                            <p><b>Course Price:</b>Rs.<del><?php echo $row["oldprice"]; ?></del>
                                <input type="text" name="subtotal" value="<?php echo $row["offerprice"]; ?>" style="border:none" readonly>
                            </p>
                            <p><b>Course Descriptions:</b>
                            <details>
                                <summary>Click to See More details</summary>
                                <?php echo $row["coursedescriptions"]; ?>
                            </details>
                            </p>
                            <?php
                            if (!isset($_SESSION["id"])) {
                            ?>
                                <p><button type="button" class="btn btn-sm btn-primary" onclick='return abc(this.value)'>Book your seat</button></p>
                            <?php
                            } else {
                            ?>
                                <p><button type="submit" name="addtocart" class="btn btn-sm btn-primary">Book your seat</button></p>
                            <?php
                            }
                            ?>
                        </div>

                        <?php
                        //  }
                        ?>
                </div>
            </div>



        </div>
    </div>
    </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#tbl').DataTable();
        });
    </script>
    <script>
        // book your seat

        function abc() {
            alert('want to book your seat Login to continue..')
            window.location = 'login';
        }
    </script>