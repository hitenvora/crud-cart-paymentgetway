 <?php
    require_once("model/adminmodel.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class AdminController extends AdminModel
    {
        public function __construct()
        {
            //logic : WAP to print your name take input from users
            parent::__construct();

            // show or manage all contacts in admin
            $shwcontact = $this->showalldata('tbl_sirtask');
            // count total contact in admin dashboard
            // $totalcontact=$this->countdata('tbl_contact','contact_id'); 

            $totalcustomer = $this->countdata('tbl_sirtask', 'id');
            // admin login here 
            if (isset($_POST["adminlogin"])) {
                $em = $_POST["email"];
                $pass = $_POST["password"];
                $log = $this->adminlogin('tbl_sirtask', $em, $pass);
                if ($log) {
                    echo "<script>
                    alert('You are successfully Logged In!')
                    window.location='admin-dashboard';
                    </script>";
                } else {

                    echo "<script>
                    alert('Your email and password incorrect try again!')
                    window.location='./';
                    </script>";
                }
            }

            // add course list  in admin 
            if (isset($_POST["addcourse"])) {
                $catnm = $_POST["coursecategory"];
                $cname = $_POST["cname"];
                $tmp_name = $_FILES["cimg"]["tmp_name"];
                $path = "uploads/courses/" . $_FILES["cimg"]["name"];
                move_uploaded_file($tmp_name, $path);

                $duration = $_POST["duration"];
                $price = $_POST["price"];
                $newprice = $_POST["newprice"];
                $catnm = $_POST["coursecategory"];
                $cdesc = $_POST["coursedesc"];
                $data = array("coursecategory_id" => $catnm, "coursename" => $cname, "courseimage" => $path, "duration" => $duration, "oldprice" => $price, "offerprice" => $newprice, "coursedescriptions" => $cdesc);
                $chk = $this->insertalladata($data, 'course_list');
                if ($chk) {
                    echo "<script>
                    alert('Your Course List  addedd successfully!')
                    window.location='admin-addcourse';
                    </script>";
                }
            }

            //manage all course list data  
            $shwcourse = $this->showalldata('course_cetegory');

            // manage all customers data
            $prof = $this->manageprofilealldata('tbl_sirtask', 'tbl_sirtask1', 'state_name', 'city_name', 'tbl_sirtask.course_id=tbl_sirtask1.course_id', 'tbl_sirtask.state_id=state_name.state_id', 'tbl_sirtask.city_id=city_name.city_id');

            // $adjoin=$this->adminjoindata('course_list','course_cetegory','course_list.co_id=course_cetegory.co_id');

            // logout here
            if (isset($_GET["logout"])) {
                $lg = $this->logout();
                if ($lg) {
                    echo "<script>
                    alert('Logout successfully!')
                    window.location='./';
                    </script>";
                }
            }
            // load templates routing 

            if ($_SERVER["PATH_INFO"]) {
                switch ($_SERVER["PATH_INFO"]) {
                    case '/':
                        require_once("index.php");
                        require_once("login.php");
                        break;
                    case '/admin-dashboard':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("dashboard.php");
                        require_once("footer.php");
                        break;

                    case '/admin-managecustomer':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("managecustomer.php");
                        require_once("footer.php");
                        break;
                    case '/admin-addcategory':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("addcategory.php");
                        require_once("footer.php");
                        break;


                    case '/admin-addsubcategory':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("addsubcategory.php");
                        require_once("footer.php");
                        break;

                    case '/admin-addcourse':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("addcourse.php");
                        require_once("footer.php");
                        break;

                    case '/admin-managecourse':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("managecourse.php");
                        require_once("footer.php");
                        break;

                    case '/admin-managecategory':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("managecategory.php");
                        require_once("footer.php");
                        break;


                    case '/admin-managecontact':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("sidebar.php");
                        require_once("managecontacts.php");
                        require_once("footer.php");
                        break;
                    default:
                        require_once("index.php");
                        require_once("header.php");
                        // require_once("404.php");
                        require_once("footer.php");
                }
            }
        }
    }
    $obj = new AdminController;

    ?>